<?php

use yii\helpers\Html;
use infoweb\projectform\ProjectformAsset;

// Register assets
ProjectformAsset::register($this);

/* @var $this yii\web\View */
/* @var $model infoweb\projectform\models\Projectform */

$this->title = 'Formulier wijzigen: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Formulieren', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Formulier wijzigen';
?>
<div class="projectform-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
