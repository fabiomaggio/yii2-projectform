<?php
namespace infoweb\projectform\models;

use yii\base\Model;
use yii\web\UploadedFile;

/**
 * UploadForm is the model behind the upload form.
 */
class UploadForm extends Model
{
    /**
     * @var UploadedFile|Null file attribute
     */
    public $images;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['images'], 'image'],
        ];
    }
}