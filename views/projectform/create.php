<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model infoweb\projectform\models\Projectform */

$this->title = 'Create Projectform';
$this->params['breadcrumbs'][] = ['label' => 'Projectforms', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="projectform-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>