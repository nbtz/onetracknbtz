<?php
use common\models\CheckIn;
use common\models\CheckInSearch;
use yii\grid\GridView;
use yii\helpers\Html;

$searchModel = new CheckInSearch();
// $searchModel->username = $model->username;
if (isset(Yii::$app->user->identity->company->id) && !empty(Yii::$app->user->identity->company->id)) {
	$searchModel->company_id = Yii::$app->user->identity->company->id;
}
$dataProvider = $searchModel->search(Yii::$app->request->queryParams);
$dataProvider->sort = ['defaultOrder' => ['upd_date' => SORT_DESC]];

echo GridView::widget([
	'dataProvider' => $dataProvider,
	// 'filterModel' => $searchModel,
	'options' => ['class' => 'rowData'],
	'columns' => [
		['class' => 'yii\grid\SerialColumn'],

		// 'id',
		'user.team.bu_name',
		'user.fname',
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

		[
			'attribute' => 'Time in-out',
			'format' => 'raw',
			'value' => function ($model) {
				if (isset($model->in_time) && isset($model->out_time)) {
					return date("Y-d-m H:i:s", strtotime($model->in_time)) . " ถึง " . date("Y-d-m H:i:s", strtotime($model->out_time));
				}

			},
		],
		'chk_time',
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
		
		'what_name',
		'who_name',
		[
			'attribute' => 'cust_sts_id',
			'format' => 'raw',
			'value' => function ($model) {

				if (isset($model->custStatus->pic_url)) {
					return Html::img($model->custStatus->pic_url);

				}
			},
			'contentOptions' => ['style' => 'width:40px;'],
		]

		// ['class' => 'yii\grid\ActionColumn'],
	],
]);