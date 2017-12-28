<?php

use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel common\models\CheckInSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('checkin', 'Check Ins');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="check-in-index">

    <h1><?=Html::encode($this->title)?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <div class="panel panel-inverse">
        <div class="panel-heading">
            <div class="panel-heading-btn">
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
            </div>
            <h4 class="panel-title"><?=Yii::t('checkin', 'List Check Ins')?></h4>
        </div>
        <div class="panel-body">
    <?=GridView::widget([
	'dataProvider' => $dataProvider,
	'filterModel' => $searchModel,
	'options' => ['class' => 'rowData'],
	'columns' => [
		['class' => 'yii\grid\SerialColumn'],

		// 'id',
		'cust_name',
		// 'uuid',
		// 'usrid',
		[
			'attribute' => 'username',
			'format' => 'raw',
			'value' => function ($model) {
				if (isset($model->user->username)) {
					return $model->user->username;
				}
				return '-';
			},
		],
		// 'cust_id',
		// 'lat',
		// 'lng',
		// 'timeid',
		// 'refno',
		// 'company_id',
		// 'what_id',

		// 'remark',
		// 'upd_date',
		// 'upd_by',
		// 'in_time',
		// 'out_time',
		[
			'attribute' => 'Time in-out',
			'format' => 'raw',
			'value' => function ($model) {
				return $model->in_time . " " . $model->out_time;
			},
		],
		'chk_time',
		// 'cust_type_id',
		// 'chk_status', // checked
		[
			'attribute' => 'chk_status',
			'format' => 'raw',
			'value' => function ($model) {
				if ($model->chk_status == "Y") {
					return "Checked";
				}
				return "Unchecked";
			},
		],
		//
		// 'cust_lat',
		// 'cust_lng',
		// 'in_lat',
		// 'in_lng',
		// 'out_lat',
		// 'out_lng',
		// 'chk_time',
		// 'guid',
		'what_name',
		'who_name',
		// 'chk_type',
		// 'cust_sts_id',
		[
			'attribute' => 'cust_sts_id',
			'format' => 'raw',
			'value' => function ($model) {
				/*if (isset($model->custStatus->sts_name)) {
						return $model->custStatus->sts_name;

					}
				*/

				if (isset($model->custStatus->pic_url)) {
					return Html::img($model->custStatus->pic_url);

				}
			},
			'contentOptions' => ['style' => 'width:40px;'],
		],
		[
			'attribute' => Yii::t('checkin', 'pic_url'),
			'format' => 'raw',
			'value' => function ($model) {
				if (isset($model->pic->pic_url)) {
					$image = $model->pic->pic_url;
					// return Html::img($model->pic->pic_url);
					return $this->render('image', ['image' => $image]);

				}
			},
		],

		// ['class' => 'yii\grid\ActionColumn'],
	],
]);?>
        </div>
    </div>
</div>
