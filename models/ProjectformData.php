<?php

namespace infoweb\projectform\models;

use Yii;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;
use yii\behaviors\TimestampBehavior;
use infoweb\projectform\behaviors\EncodeBehavior;

/**
 * This is the model class for table "projectforms_data".
 *
 * @property string $projectform_id
 * @property string $entries
 * @property string $created_at
 * @property string $updated_at
 */
class ProjectformData extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'projectforms_data';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['projectform_id', 'entries'], 'required'],
            [['projectform_id'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'projectform_id' => 'Formulier ID',
            'entries' => 'Data',
            'created_at' => 'Aangemaakt op',
            'updated_at' => 'Gewijzigd op',
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
                'attributes' => ['entries']    
            ]
        ]);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getForm()
    {
        return $this->hasOne(Projectform::className(), ['id' => 'projectform_id']);
    }
}
