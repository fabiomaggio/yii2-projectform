<?php

namespace infoweb\projectform\models;

use Yii;

/**
 * This is the model class for table "projectforms_images".
 *
 * @property string $id
 * @property string $projectform_id
 * @property string $name
 * @property string $description
 * @property string $created_at
 *
 * @property Projectforms $projectform
 */
class Image extends \yii\db\ActiveRecord
{    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'projectforms_images';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['projectform_id'], 'integer'],
            [['name'], 'required'],
            [['description'], 'string'],
            [['name'], 'string', 'max' => 255],
            [['name'], 'safe'],
            //[['name'], 'file', 'extensions'=>'jpg, gif, png'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'projectform_id' => 'Formulier',
            'name' => 'Naam',
            'description' => 'Beschrijving',
            'created_at' => 'Toegevoegd op',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProjectform()
    {
        return $this->hasOne(Projectform::className(), ['id' => 'projectform_id']);
    }
    
    public function delete()
    {
        if (parent::delete())
        {
            // Remove the files on the server
            foreach (\infoweb\projectform\Module::getInstance()->thumbnailDimensions as $dimension)
            {
                if (file_exists(Yii::$app->params['uploadPath'] . "/images/{$dimension['x']}x{$dimension['y']}/{$this->name}"))
                    unlink(Yii::$app->params['uploadPath'] . "/images/{$dimension['x']}x{$dimension['y']}/{$this->name}");
            }
        }
    }
}
