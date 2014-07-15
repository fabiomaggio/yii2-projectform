<?php

namespace infoweb\projectform;

class Module extends \yii\base\Module
{
    public $controllerNamespace = 'infoweb\projectform\controllers';
    
    /**
     * @var array The dimensions in which the thumbnails are created
     */
    public $thumbnailDimensions = [];
    
    public function init()
    {
        parent::init();
        
        // initialize the module with the configuration loaded from config.php
        \Yii::configure($this, require(__DIR__ . '/config.php'));
    }
}
