<?php

use common\models\CheckIn;
use kartik\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel common\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('checkin', 'Report');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="report-index">

    <h1 class="page-header"><?=Html::encode($this->title)?></h1>

    <div class="panel panel-inverse">
        <div class="panel-heading">
            <div class="panel-heading-btn">
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
            </div>
            <h4 class="panel-title"><?=Yii::t('checkin', 'List Report')?></h4>
        </div>
        <div class="panel-body">
        	<?php
$gridColumns = [
	// ['class' => 'kartik\grid\ExpandRowColumn'],
	[
		'class' => 'kartik\grid\ExpandRowColumn',
		'value' => function ($model, $key, $index, $column) {
			return GridView::ROW_COLLAPSED;
		},
		/*'detail' => function ($model, $key, $index, $column) {
			return "test";
		},*/
		'detail' => function ($model, $key, $index, $column) {
			// $searchModel = new CheckInSearch();
			// $searchModel->id = $model->id;
			// $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
			$modelCheckin = CheckIn::findOne($model->id);
			return Yii::$app->controller->renderPartial('_detail.php', [
				// 'searchModel' => $searchModel,
				// 'dataProvider' => $dataProvider,
				'model' => $modelCheckin,
			]);
		},
	],

	/*[
			'class' => 'kartik\grid\EditableColumn',
			'attribute' => 'name',
			'pageSummary' => 'Page Total',
			'vAlign' => 'middle',
			'headerOptions' => ['class' => 'kv-sticky-column'],
			'contentOptions' => ['class' => 'kv-sticky-column'],
			'editableOptions' => ['header' => 'Name', 'size' => 'md'],
		],
		[
			'attribute' => 'color',
			'value' => function ($model, $key, $index, $widget) {
				return "<span class='badge' style='background-color: {$model->color}'> </span>  <code>" .
				$model->color . '</code>';
			},
			'filterType' => GridView::FILTER_COLOR,
			'vAlign' => 'middle',
			'format' => 'raw',
			'width' => '150px',
			'noWrap' => true,
		],
		[
			'class' => 'kartik\grid\BooleanColumn',
			'attribute' => 'status',
			'vAlign' => 'middle',
		],
		[
			'class' => 'kartik\grid\ActionColumn',
			'dropdown' => true,
			'vAlign' => 'middle',
			'urlCreator' => function ($action, $model, $key, $index) {return '#';},
			'viewOptions' => ['title' => $viewMsg, 'data-toggle' => 'tooltip'],
			'updateOptions' => ['title' => $updateMsg, 'data-toggle' => 'tooltip'],
			'deleteOptions' => ['title' => $deleteMsg, 'data-toggle' => 'tooltip'],
	*/
	'cust_name',
	/*[
		'attribute' => 'color',
		'format' => 'raw',
		'value' => function ($model, $key, $index, $widget) {
			return "<span class='badge' style='background-color: {$model->color}'> </span>  <code>" .
			$model->color . '</code>';
		},
	],*/
	[
		'attribute' => 'Person Contact',
		'format' => 'raw',
		'value' => function ($model, $key, $index, $widget) {
			if (isset($model->cust->custContact->contact_name)) {
				return $model->cust->custContact->contact_name;
			}
		},
	],
	/*[
		'attribute' => 'Person Contact Position',
		'format' => 'raw',
		'value' => function ($model, $key, $index, $widget) {
			if (isset($model->cust->custContact->position)) {
				return $model->cust->custContact->position;
			}
		},
	],*/
	'what_name',
	[
		'attribute' => 'cust_type_id',
		'format' => 'raw',
		'value' => function ($model) {
			if (isset($model->custType->type_name)) {
				return $model->custType->type_name;
			}
		},
	],
	[
		'attribute' => 'Sale',
		'format' => 'raw',
		'value' => function ($model, $key, $index, $widget) {
			if (isset($model->user->fname) && isset($model->user->lname)) {
				return $model->user->fname . " " . $model->user->lname;
			}
		},
	],
	[
		'attribute' => 'Date',
		'format' => 'raw',
		'value' => function ($model, $key, $index, $widget) {
			if (isset($model->chk_time)) {
				// $arr = explode(" ", $model->chk_time);
				return date("d:m:Y", strtotime($model->chk_time));
			}
		},
	],
	[
		'attribute' => 'Time',
		'format' => 'raw',
		'value' => function ($model, $key, $index, $widget) {
			if (isset($model->chk_time)) {
				// $arr = explode(" ", $model->chk_time);
				return date("H:i", strtotime($model->chk_time));
			}
		},
	],
	/*[
			'attribute' => 'Duration',
			'format' => 'raw',
			'value' => function ($model, $key, $index, $widget) {
				return "";
			},
		],
		[
			'attribute' => 'Visiting Objective',
			'format' => 'raw',
			'value' => function ($model, $key, $index, $widget) {
				return "";
			},
		],
		[
			'attribute' => 'Location',
			'format' => 'raw',
			'value' => function ($model, $key, $index, $widget) {
				return "";
			},
		],
		[
			'attribute' => 'Visiting Detail',
			'format' => 'raw',
			'value' => function ($model, $key, $index, $widget) {
				return "";
			},
		],
	*/
	// ['class' => 'kartik\grid\CheckboxColumn'],

];
echo GridView::widget([
	'dataProvider' => $dataProvider,
	'filterModel' => $searchModel,
	'columns' => $gridColumns,
	// 'containerOptions' => ['style' => 'overflow-y:scroll !important; display:block; max-width:100%; width:auto; position: relative;z-index:100;'], // only set when $responsive = false
	// overflow: hidden; position: fixed; margin-top: 0px; top: 0px; z-index: 1001; will-change: transform; transform: translateX(260px) translateY(7px); left: 0px; width: 1606px;
	'containerOptions' => ['style' => 'overflow:scroll !important;position: relative;z-index: 100;width: none;'],
	'beforeHeader' => [
		[
			'columns' => [
				// ['content' => 'Header Before 1', 'options' => ['colspan' => 4, 'class' => 'text-center warning']],
				['content' => 'No', 'options' => ['class' => 'text-center warning']],
				['content' => 'customer', 'options' => ['class' => 'text-center warning']],
				['content' => 'person contact', 'options' => ['class' => 'text-center warning']],
				['content' => 'person contact status', 'options' => ['class' => 'text-center warning']],
				['content' => 'customer type', 'options' => ['class' => 'text-center warning']],
				['content' => 'Sale', 'options' => ['class' => 'text-center warning']],
				['content' => 'Date', 'options' => ['class' => 'text-center warning']],
				['content' => 'Time', 'options' => ['class' => 'text-center warning']],
				// ['content' => 'Duration', 'options' => ['class' => 'text-center warning']],
				// ['content' => 'visiting object', 'options' => ['class' => 'text-center warning']],
				// ['content' => 'Location', 'options' => ['class' => 'text-center warning']],
				// ['content' => 'visiting detail', 'options' => ['class' => 'text-center warning']],
				// ['content' => 'remark', 'options' => ['class' => 'text-center warning']],
			],
			'options' => ['class' => 'skip-export', 'style' => 'overflow-y: scroll !important;position: relative !important;'], // remove this row from export
		],
	],
	'toolbar' => [
		// [
		// 'content' =>
		// Html::button('<i class="glyphicon glyphicon-plus"></i>', ['type' => 'button', 'title' => Yii::t('kvgrid', 'Add Book'), 'class' => 'btn btn-success', 'onclick' => 'alert("This will launch the book creation form.\n\nDisabled for this demo!");']) . ' ' .
		// Html::a('<i class="glyphicon glyphicon-repeat"></i>', ['grid-demo'], ['data-pjax' => 0, 'class' => 'btn btn-default', 'title' => Yii::t('kvgrid', 'Reset Grid')]),
		// ],
		'{export}',
		// '{toggleData}',
	],
	'export' => [
		'fontAwesome' => true,
	],
	'pjax' => true,
	'bordered' => true,
	'striped' => false,
	'condensed' => false,
	'responsive' => true,
	'hover' => true,
	'floatHeader' => true,
	'floatHeaderOptions' => ['scrollingTop' => 50],
	'showPageSummary' => true,
	'panel' => [
		'type' => GridView::TYPE_PRIMARY,
	],
]);

?>
        </div>
    </div>
</div>