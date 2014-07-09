<?php

namespace infoweb\projectform\models;

use Yii;

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
            [['project_id', 'name', 'settings', 'created_at', 'updated_at', 'deleted_at'], 'required'],
            [['settings'], 'string'],
            [['created_at', 'updated_at', 'deleted_at'], 'integer'],
            [['project_id'], 'string', 'max' => 25],
            [['name'], 'string', 'max' => 255],
            [['project_id'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'project_id' => 'Project ID',
            'name' => 'Name',
            'settings' => 'Settings',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'deleted_at' => 'Deleted At',
        ];
    }
}
