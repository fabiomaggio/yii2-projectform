<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model infoweb\projectform\models\Projectform */

$this->title = 'Afbeeldingen beheren: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Formulieren', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Afbeeldingen beheren';
?>
<div class="projectform-images">

    <h1><?= Html::encode($this->title) ?></h1>

</div>
