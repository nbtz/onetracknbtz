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
$dataProvider->pagination->pageSize = 10;
$dataProvider->sort = ['defaultOrder' => ['upd_date' => SORT_DESC]];

echo GridView::widget([
	'dataProvider' => $dataProvider,
	// 'filterModel' => $searchModel,
	'options' => ['class' => 'dashboard-table'],
	'tableOptions' => ['class' => 'table table-hover'],
	'rowOptions' => function ($model, $index, $widget, $grid){
      return ['style'=>'background-color:#222;'];
    },
    'headerRowOptions' => ['style'=>'background-color:#929292;'],
    // 'dataColumnClass' => 'dashboard-data-column',
	'layout' => "{items}",
	'columns' => [
		['class' => 'yii\grid\SerialColumn'],

		// 'id',
		'user.team.bu_name',
		[
			'label' => 'Sales',
			'value' => function ($model) {
				if (isset($model->user)) {
					return $model->user->fname . ' ' . $model->user->lname;	
				} else {
					return null;
				}
			}
		],
		'cust_name',
		// 'uuid',
		// 'usrid',
		'chk_time',
		'what_name',
		'who_name',

		// ['class' => 'yii\grid\ActionColumn'],
	],
]);