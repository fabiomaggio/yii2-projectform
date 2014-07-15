<?php
namespace infoweb\projectform;

use yii\web\AssetBundle as AssetBundle;

class BackendAsset extends AssetBundle
{
    public $sourcePath = '@infoweb/projectform/assets/';
    public $css = [
        'css/style.css'
    ];
    public $js = [
        'js/bootbox.min.js',
        'js/main.js'
    ];
    public $depends = [
        'backend\assets\AppAsset',
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}