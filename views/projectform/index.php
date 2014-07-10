<?php

use yii\helpers\Html;
use yii\grid\GridView;
use infoweb\projectform\BackendAsset;
use yii\widgets\Pjax;

// Register assets
BackendAsset::register($this);

/* @var $this yii\web\View */
/* @var $searchModel infoweb\projectform\models\Postsearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Formulieren';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="projectform-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Toevoegen', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'project_id',
            'name',
            'updated_at',
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{update} {delete}'
            ],
        ],
    ]); ?>
    <?php Pjax::end(); ?>

</div>
