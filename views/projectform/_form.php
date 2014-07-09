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
    
    <div class="row">
        <div class="col-lg-4">
            <h3>SEO</h3>
            <div class="form-group checkbox">
                <label class="control-label">
                    <input type="checkbox" name="Projectform[settings][seo][title]" value="1"> Website titel
               </label> 
            </div>
            <div class="form-group checkbox">
                <label class="control-label">
                    <input type="checkbox" name="Projectform[settings][seo][description]" value="1"> Website beschrijving
               </label> 
            </div>
            <div class="form-group checkbox">
                <label class="control-label">
                    <input type="checkbox" name="Projectform[settings][seo][keywords]" value="1"> Keywords
               </label> 
            </div>
            <div class="form-group checkbox">
                <label class="control-label">
                    <input type="checkbox" name="Projectform[settings][seo][google-account]" value="1"> E-mailadres Google account
               </label> 
            </div>    
        </div>
        
        <div class="col-lg-4">
            <h3>Social</h3>
            <div class="form-group checkbox">
                <label class="control-label">
                    <input type="checkbox" name="Projectform[settings][social][facebook]" value="1"> Facebook
               </label> 
            </div>
            <div class="form-group checkbox">
                <label class="control-label">
                    <input type="checkbox" name="Projectform[settings][social][twitter]" value="1"> Twitter
               </label> 
            </div>
            <div class="form-group checkbox">
                <label class="control-label">
                    <input type="checkbox" name="Projectform[settings][social][google+]" value="1"> Google+
               </label> 
            </div>
            <div class="form-group checkbox">
                <label class="control-label">
                    <input type="checkbox" name="Projectform[settings][social][linkedin]" value="1"> LinkedIn
               </label> 
            </div>     
        </div>
        
        <div class="col-lg-4">
            <h3>Ogone</h3>
            <div class="form-group checkbox">
                <label class="control-label">
                    <input type="checkbox" name="Projectform[settings][ogone][username]" value="1"> Gewenste gebruikersnaam
               </label> 
            </div>
            <div class="form-group checkbox">
                <label class="control-label">
                    <input type="checkbox" name="Projectform[settings][ogone][password]" value="1"> Gewenste paswoord
               </label> 
            </div>    
        </div>                
    </div>
    
    <h3>Opties</h3>
    <div class="form-group checkbox">
        <label class="control-label">
            <input type="checkbox" name="Projectform[settings][emailaddresses]" value="1"> E-mailadres(sen)
        </label> 
    </div>
    <div class="form-group checkbox">
        <label class="control-label">
            <input type="checkbox" name="Projectform[settings][forms]" value="1"> Formulieren
        </label> 
    </div>
    
    
        

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Opslaan' : 'Wijzigen', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
