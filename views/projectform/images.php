<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\FileInput;
use infoweb\projectform\BackendAsset;

// Register assets
BackendAsset::register($this);

/* @var $this yii\web\View */
/* @var $model infoweb\projectform\models\Projectform */

$this->title = 'Afbeeldingen beheren: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Formulieren', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Afbeeldingen beheren';

?>
<h1><?= Html::encode($this->title) ?></h1>
<div class="projectform-images">
    
    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
    
    <?= FileInput::widget(['name' => 'UploadForm[images][]', 'options' => ['multiple' => true], 'pluginOptions' => ['previewFileType' => 'any']]); ?>
    
    <?php ActiveForm::end(); ?>
</div>

<?php if ($model->images) : ?>
    
<div class="row">
    <div class="col-sm-12">   
        <h2>Huidige afbeeldingen</h2>
    </div>
</div>
<div class="row">

    <?php foreach ($model->images as $image) : ?>
        
    <div class="thumbnail-container col-sm-3">
        <a href="?r=projectform/projectform/delete-image&id=<?php echo $image->id; ?>" class="pull-right">
            <span class="glyphicon glyphicon-remove" style="color: #a94442;"></span>
        </a>
        <img src="<?php echo Yii::$app->params['baseUrlImages'] . "260x190/{$image->name}"; ?>" class="img-thumbnail img-deletable" />         
    </div> 
           
    <?php endforeach; ?>

</div>

<?php endif; ?>