<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model infoweb\projectform\models\Projectform */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="projectform-form">
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'project_id')->textInput(['maxlength' => 25]) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => 255]) ?>
    
    <?= $form->field($model, 'user_id')->dropDownList(ArrayHelper::map($users, 'id', 'username'), ['prompt' => '-- Kies een gebruiker --']); ?>
    
    <div class="row">
        <div class="col-sm-4">
            
            <h3>
                <input type="checkbox" value="1" class="toggler" data-toggle="seo"<?php if (count($model->settings['seo']) == 4) : ?> checked<?php endif; ?>> SEO
            </h3>
            <div class="form-group checkbox">
                <label class="control-label">
                    <input type="checkbox" name="Projectform[settings][seo][title]" value="1"<?php if ($model->settings['seo']['title']) : ?> checked<?php endif; ?> data-toggler="seo"> Website titel
                </label> 
            </div>
            <div class="form-group checkbox">
                <label class="control-label">
                    <input type="checkbox" name="Projectform[settings][seo][description]" value="1"<?php if ($model->settings['seo']['description']) : ?> checked<?php endif; ?> data-toggler="seo"> Website beschrijving
                </label> 
            </div>
            <div class="form-group checkbox">
                <label class="control-label">
                    <input type="checkbox" name="Projectform[settings][seo][keywords]" value="1"<?php if ($model->settings['seo']['keywords']) : ?> checked<?php endif; ?> data-toggler="seo"> Keywords
                </label> 
            </div>
            <div class="form-group checkbox">
                <label class="control-label">
                    <input type="checkbox" name="Projectform[settings][seo][google-account]" value="1"<?php if ($model->settings['seo']['google-account']) : ?> checked<?php endif; ?> data-toggler="seo"> E-mailadres Google account
                </label> 
            </div>    
        </div>
        
        <div class="col-sm-4">
            <h3>
                <input type="checkbox" value="1" class="toggler" data-toggle="social"<?php if (count($model->settings['social']) == 4) : ?> checked<?php endif; ?>> Social
            </h3>
            <div class="form-group checkbox">
                <label class="control-label">
                    <input type="checkbox" name="Projectform[settings][social][facebook]" value="1"<?php if ($model->settings['social']['facebook']) : ?> checked<?php endif; ?> data-toggler="social"> Facebook
                </label> 
            </div>
            <div class="form-group checkbox">
                <label class="control-label">
                    <input type="checkbox" name="Projectform[settings][social][twitter]" value="1"<?php if ($model->settings['social']['twitter']) : ?> checked<?php endif; ?> data-toggler="social"> Twitter
                </label> 
            </div>
            <div class="form-group checkbox">
                <label class="control-label">
                    <input type="checkbox" name="Projectform[settings][social][google+]" value="1"<?php if ($model->settings['social']['google+']) : ?> checked<?php endif; ?> data-toggler="social"> Google+
                </label> 
            </div>
            <div class="form-group checkbox">
                <label class="control-label">
                    <input type="checkbox" name="Projectform[settings][social][linkedin]" value="1"<?php if ($model->settings['social']['linkedin']) : ?> checked<?php endif; ?> data-toggler="social"> LinkedIn
                </label> 
            </div>     
        </div>
        
        <div class="col-sm-4">
            <h3>
                <input type="checkbox" value="1" class="toggler" data-toggle="ogone"<?php if (count($model->settings['ogone']) == 2) : ?> checked<?php endif; ?>> Ogone
            </h3>
            <div class="form-group checkbox">
                <label class="control-label">
                    <input type="checkbox" name="Projectform[settings][ogone][username]" value="1"<?php if ($model->settings['ogone']['username']) : ?> checked<?php endif; ?> data-toggler="ogone"> Gewenste gebruikersnaam
                </label> 
            </div>
            <div class="form-group checkbox">
                <label class="control-label">
                    <input type="checkbox" name="Projectform[settings][ogone][password]" value="1"<?php if ($model->settings['ogone']['password']) : ?> checked<?php endif; ?> data-toggler="ogone"> Gewenste paswoord
                </label> 
            </div>    
        </div>                
    </div>
    
    <div class="row">
        <div class="col-sm-4">
            <h3>
                <input type="checkbox" value="1" class="toggler" data-toggle="dns"<?php if (count($model->settings['dns']) == 4) : ?> checked<?php endif; ?>> DNS
            </h3>
            <div class="form-group checkbox">
                <label class="control-label">
                    <input type="checkbox" name="Projectform[settings][dns]['domain']" value="1"<?php if ($model->settings['dns']['domain']) : ?> checked<?php endif; ?> data-toggler="dns"> Domein
                </label> 
            </div>
            <div class="form-group checkbox">
                <label class="control-label">
                    <input type="checkbox" name="Projectform[settings][dns]['a-record']" value="1"<?php if ($model->settings['dns']['a-record']) : ?> checked<?php endif; ?> data-toggler="dns"> A-record
                </label> 
            </div>
            <div class="form-group checkbox">
                <label class="control-label">
                    <input type="checkbox" name="Projectform[settings][dns]['mx-records']" value="1"<?php if ($model->settings['dns']['mx-records']) : ?> checked<?php endif; ?> data-toggler="dns"> MX-record(s)
                </label> 
            </div>
            <div class="form-group checkbox">
                <label class="control-label">
                    <input type="checkbox" name="Projectform[settings][dns]['txt-records']" value="1"<?php if ($model->settings['dns']['txt-records']) : ?> checked<?php endif; ?> data-toggler="dns"> TXT-record(s)
                </label> 
            </div>    
        </div>
        
        <div class="col-sm-8">
            <h3>Opties</h3>
            <div class="form-group checkbox">
                <label class="control-label">
                    <input type="checkbox" name="Projectform[settings][email]['manage']" value="1"<?php if ($model->settings['email']['manage']) : ?> checked<?php endif; ?>> E-mailadres(sen) beheren
                </label> 
            </div>
            <div class="form-group checkbox">
                <label class="control-label">
                    <input type="checkbox" name="Projectform[settings][manage-forms]" value="1"<?php if ($model->settings['manage-forms']) : ?> checked<?php endif; ?> id="forms-toggler"> Formulieren&nbsp;
                    <a id="btn-add-form"<?php if (!$model->settings['forms']) : ?> style="display:none;"<?php endif; ?> title="Toevoegen">
                        <span class="glyphicon glyphicon-plus" style="color: #449D44;"></span>
                    </a>
                </label> 
            </div>
            <div id="forms-container">
            <?php if ($model->settings['enable-forms'] && isset($model->settings['forms'])) : ?>
                
                <?php foreach ($model->settings['forms'] as $k => $form) : ?>
                
                <div class="form-group">
                    <input type="text" class="form-control form-name-input" name="Projectform[settings][forms][]" value="<?php echo $form; ?>" required>
                    <a class="btn-delete-form" title="Verwijderen">
                        <span class="glyphicon glyphicon-remove" style="color: #C9302C;"></span>
                    </a>
                </div>
                    
                <?php endforeach; ?>    
                    
            <?php endif; ?>        
            </div>    
        </div>
    </div>      

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Opslaan' : 'Wijzigen', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::a('Annuleren', ['index'], ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<script id="template-form-name" type="text/html">
    <div class="form-group">
        <input type="text" class="form-control form-name-input" name="Projectform[settings][forms][]" required>
        <a class="btn-delete-form" title="Verwijderen">
            <span class="glyphicon glyphicon-remove" style="color: #C9302C;"></span>
        </a>
    </div>
</script>