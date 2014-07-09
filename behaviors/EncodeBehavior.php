<?php
namespace infoweb\projectform\behaviors;

use yii\base\Behavior;
use yii\helpers\Json;
use yii\db\ActiveRecord;

class EncodeBehavior extends Behavior
{
    public $attributes;

    public function events()
    {
        return [
            ActiveRecord::EVENT_BEFORE_INSERT => 'encode',
            ActiveRecord::EVENT_BEFORE_UPDATE => 'encode',
            ActiveRecord::EVENT_AFTER_INSERT  => 'decode',
            ActiveRecord::EVENT_AFTER_UPDATE  => 'decode',
            ActiveRecord::EVENT_AFTER_FIND    => 'decode',
        ];
    }

    public function encode($event)
    {
        foreach ($this->attributes as $attribute) {
            $this->owner->$attribute = base64_encode(Json::encode($this->owner->$attribute));
        }
    }

    public function decode($event)
    {
        foreach ($this->attributes as $attribute) {
            $this->owner->$attribute = Json::decode(base64_decode($this->owner->$attribute));
        }
    }

}