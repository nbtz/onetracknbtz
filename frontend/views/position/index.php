<?php

use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $searchModel common\models\PositionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('position', 'Positions');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="position-index">

    <h1 class="page-header"><?=Html::encode($this->title)?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <div class="panel panel-inverse">
        <div class="panel-heading">
            <div class="panel-heading-btn">
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                <!-- <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a> -->
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
            </div>
            <h4 class="panel-title"><?=Yii::t('cust', 'Create Cust Status')?></h4>
        </div>
        <div class="panel-body">
            <?php $form = ActiveForm::begin(['action' => ['index'],
	'method' => 'post']);?>
            <!-- <div class="row"> -->
                <!-- <div class="col-md-5"> -->
                    <?=$form->field($model, 'postion_name')->textInput(['maxlength' => true])?>

                <!-- </div> -->
                <!-- <div class="col-md-5"> -->
                    <?php //=$form->field($model, 'status')->textInput(['maxlength' => true])?>
                     <?php
$weightList = [
	0 => Yii::t('position', 'Banned'),
	1 => Yii::t('position', 'Active'),
];
?>
                            <?=$form->field($model, 'status')->dropDownList($weightList)?>
                <!-- </div> -->

            <!-- </div> -->

            <!-- <div class="row"> -->

                <!-- <div class="col-md-3 offset-md-3"> -->
                    <div class="form-group">
                        <?=Html::submitButton(Yii::t('main', 'Create'), ['class' => 'btn btn-primary'])?>
                    </div>
                <!-- </div> -->
            <!-- </div> -->

            <?php ActiveForm::end();?>
        </div>
    </div>
<?php if (Yii::$app->session->hasFlash('alert')): ?>
        <?=\yii\bootstrap\Alert::widget([
	'body' => ArrayHelper::getValue(Yii::$app->session->getFlash('alert'), 'body'),
	'options' => ArrayHelper::getValue(Yii::$app->session->getFlash('alert'), 'options'),
])?>
    <?php endif;?>
    <div class="panel panel-inverse">
        <div class="panel-heading">
            <div class="panel-heading-btn">
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
            </div>
            <h4 class="panel-title"><?=Yii::t('position', 'Position')?></h4>
        </div>
        <div class="panel-body">
    <?=GridView::widget([
	'dataProvider' => $dataProvider,
	'filterModel' => $searchModel,
	'columns' => [
		['class' => 'yii\grid\SerialColumn'],

		// 'id',
		'postion_name',

		// 'company_id',
		'company.company_name',
		// 'status',
		'nameStatus',
		// 'upd_date',
		'updatedAtWithFormat',
		'upd_by',
		[
			'class' => 'yii\grid\ActionColumn',
			'template' => '{update} {delete} ',
		],
	],
]);?>
        </div>
    </div>
</div>
