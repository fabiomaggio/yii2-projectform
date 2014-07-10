<?php
namespace infoweb\projectform;

use yii\web\AssetBundle as AssetBundle;

class ProjectformAsset extends AssetBundle
{
    public $sourcePath = '@infoweb/projectform/assets/';
    public $js = [
        'js/projectform.js',
        'js/underscore-min.js'
    ];
    public $css = [
        'css/style.css'
    ];
    public $depends = [
        'backend\assets\AppAsset',
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}