<?php
use yii\grid\GridView;

?>

<?=GridView::widget([
	'dataProvider' => $dataProvider,
	// 'filterModel' => $searchModel,
	'options' => ['class' => 'rowData'],
	'columns' => [
		['class' => 'yii\grid\SerialColumn'],
		[
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
		'remark',
	],
]);?>