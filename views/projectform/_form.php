<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model infoweb\projectform\models\Projectform */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="projectform-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'project_id')->textInput(['maxlength' => 25]) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'settings')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'created_at')->textInput(['maxlength' => 10]) ?>

    <?= $form->field($model, 'updated_at')->textInput(['maxlength' => 10]) ?>

    <?= $form->field($model, 'deleted_at')->textInput(['maxlength' => 10]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
