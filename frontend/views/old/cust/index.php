<?php

use common\models\CustStatus;
use common\models\CustType;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $searchModel common\models\CustSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('cust', 'Custs');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cust-index">

    <h1><?=Html::encode($this->title)?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <div class="row">
        <div class="col-md-8">
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

                <div class="form-group">
                    <?=Html::submitButton(Yii::t('main', 'Create'), ['class' => 'btn btn-success'])?>
                </div>

            <?php ActiveForm::end();?>

        </div>
    </div>

    <p>
        <?php //=Html::a('Create Cust', ['create'], ['class' => 'btn btn-success'])?>
    </p>
    <!-- เหลือ จังหวัด รูปอัพไฟล์ lat lng -->
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
		/*[
			'attribute' => 'cust_type_id',
			// 'attribute' => Yii::t('order', 'Status'),
			'format' => 'raw',
			'value' => function ($model) {
				return $model->custType->type_name;
			},
		],*/
		// 'cr_date',
		// 'cr_by',
		// 'app_code',
		// 'type_id',
		// 'refno',

		// 'upd_date',
		// 'upd_by',
		// 'guid',
		// 'map_zoom_level',
		'tel_m',
		// 'admin_level1',
		// 'admin_level2',
		'email:email',
		// 'cust_type_id',
		[
			'attribute' => 'cust_type_id',
			// 'attribute' => Yii::t('order', 'Status'),
			'format' => 'raw',
			'value' => function ($model) {
				return $model->custType->type_name;
			},
		],
		// 'sts_id',
		[
			'attribute' => 'sts_id',
			// 'attribute' => Yii::t('order', 'Status'),
			'format' => 'raw',
			'value' => function ($model) {
				return $model->custStatus->sts_name;
			},
		],
		// 'admin_level1_id',
		// 'admin_level2_id',
		// 'last_chk_in',
		// 'cust_code',
		// 'createdAtWithFormat',
		'updatedAtWithFormat',

		['class' => 'yii\grid\ActionColumn'],
	],
]);?>
</div>
