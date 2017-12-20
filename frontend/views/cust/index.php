<?php

use common\models\CustStatus;
use common\models\CustType;
use kartik\depdrop\DepDrop;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $searchModel common\models\CustSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('cust', 'Custs');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cust-index">

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
            <h4 class="panel-title"><?=Yii::t('cust', 'Create Cust')?></h4>
        </div>
        <div class="panel-body">
            <?php $form = ActiveForm::begin(['action' => ['index'],
	'method' => 'post']);?>
                <div class="row">
                    <div class="col-sm-6"><?=$form->field($model, 'cust_code')->textInput(['maxlength' => true])?></div>
                    <div class="col-sm-6"><?=$form->field($model, 'cust_name')->textInput(['maxlength' => true])?></div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                    <?php
$custTypeList = ArrayHelper::map(CustType::find()->all(), 'id', 'type_name');
?>

                        <?=$form->field($model, 'cust_type_id')->dropDownList($custTypeList, [
	'prompt' => '... Select ...',
])?>
                    <?php //=$form->field($model, 'cust_type_id')->textInput()?>

                    </div>
                    <div class="col-sm-6">
                    <?php
$custStatusList = ArrayHelper::map(CustStatus::find()->all(), 'id', 'sts_name');
?>

                        <?=$form->field($model, 'sts_id')->dropDownList($custStatusList, [
	'prompt' => '... Select ...',
])?>
                    <?php //=$form->field($model, 'sts_id')->textInput()?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6"><?=$form->field($model, 'tel_m')->textInput(['maxlength' => true])?></div>
                    <div class="col-sm-6"><?=$form->field($model, 'email')->textInput(['maxlength' => true])?></div>
                </div>

                <div class="row">
                    <div class="col-sm-6">
                        <?php
$connection = Yii::$app->pgsql;
$connection->open();

$command = $connection->createCommand('SELECT DISTINCT ON (i_province) i_province, province_t FROM admin_tumbon');
$regionList = ArrayHelper::map($command->queryAll(), 'i_province', 'province_t');
// print_r($regionList);
?>
                        <?=$form->field($model, 'admin_level1')->dropDownList($regionList, ['id' => 'cat-id', 'prompt' => Yii::t('main', '... Select ...')]);?>
                    </div>
                    <div class="col-sm-6">
                        <?=$form->field($model, 'admin_level2')->widget(DepDrop::classname(), [
	'options' => ['id' => 'subcat-id'],
	'pluginOptions' => [
		'depends' => ['cat-id'],
		'placeholder' => Yii::t('main', '... Select ...'),
		'url' => Url::to(['/province/subcat']),
	],
]);?>
                    </div>
                </div>

                 <div class="row">
                	<div class="col-sm-6"></div>
                	<div class="col-sm-6"></div>
                </div>

                 <div class="row">
                	<div class="col-sm-6"></div>
                	<div class="col-sm-6"></div>
                </div>

                <div class="form-group">
                    <?=Html::submitButton(Yii::t('main', 'Create'), ['class' => 'btn btn-primary'])?>
                </div>

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
            <h4 class="panel-title"><?=Yii::t('cust', 'List Custs')?></h4>
        </div>
        <div class="panel-body">
    <?=GridView::widget([
	'dataProvider' => $dataProvider,
	'filterModel' => $searchModel,
	'columns' => [
		['class' => 'yii\grid\SerialColumn'],

		// 'id',
		// 'usrid',
		// 'timeid',
		// 'company_id',
		'cust_code',

		'cust_name',
		// 'lat',
		// 'lng',
		// 'remark',
		// 'radius',
		// 'the_geom',
		// 'cust_type_id',

		// 'cr_date',
		// 'cr_by',
		// 'app_code',
		// 'type_id',
		// 'refno',
		// 'sts_id',
		// 'upd_date',
		// 'upd_by',
		// 'guid',
		// 'map_zoom_level',
		'tel_m',
		// 'admin_level1',
		// 'admin_level2',
		'email:email',
		// 'admin_level1_id',
		// 'admin_level2_id',
		// 'last_chk_in',
		[
			'attribute' => 'cust_type_id',
			// 'attribute' => 'cust_type_id',
			// 'attribute' => Yii::t('order', 'Status'),
			'format' => 'raw',
			'value' => function ($model) {
				if (isset($model->custType->type_name)) {
					return $model->custType->type_name;
				}
				return '-';
			},
		],
		// 'sts_id',
		[
			'attribute' => 'sts_id',
			// 'attribute' => 'sts_id',
			// 'attribute' => Yii::t('order', 'Status'),
			'format' => 'raw',
			'value' => function ($model) {
				if (isset($model->custStatus->sts_name)) {
					# code...
					return $model->custStatus->sts_name;

				}
				return '-';

			},
		],
		// 'createdAtWithFormat',

		['class' => 'yii\grid\ActionColumn'],
	],
]);?>
        </div>
    </div>
</div>


