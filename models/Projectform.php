<?php

namespace infoweb\projectform\models;

use Yii;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;
use yii\behaviors\TimestampBehavior;
use infoweb\projectform\behaviors\EncodeBehavior;
use infoweb\projectform\models\Image;

/**
 * This is the model class for table "projectforms".
 *
 * @property string $id
 * @property string $project_id
 * @property string $name
 * @property string $settings
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 */
class Projectform extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'projectforms';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['project_id', 'user_id', 'name', 'settings'], 'required'],
            [['project_id'], 'string', 'max' => 25],
            [['name'], 'string', 'max' => 255],
            [['project_id', 'user_id'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'project_id' => 'Projectnummer',
            'user_id' => 'Gebruiker',
            'name' => 'Naam',
            'settings' => 'Configuratie',
            'created_at' => 'Aangemaakt op',
            'updated_at' => 'Gewijzigd op'
        ];
    }
    
    public function behaviors()
    {
        return ArrayHelper::merge(parent::behaviors(), [
            'timestamp' => [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => 'updated_at',
                ],
                'value' => function() { return time(); },
            ],
            'encode'    => [
                'class' => EncodeBehavior::className(),
                'attributes' => ['settings']    
            ]
        ]);
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getImages()
    {
        return $this->hasMany(Image::className(), ['projectform_id' => 'id']);
    }
}
