<?php
use yii\widgets\DetailView;

?>

<div class="report-view">
<?=DetailView::widget([
	'model' => $model,
	'attributes' => [
		[
			'attribute' => 'cust_type_id',
			'format' => 'raw',
			'value' => empty($model->custType->type_name) ? '-' : $model->custType->type_name,
		],
		'in_time',
		'out_time',
		[
			'attribute' => 'Duration',
			'format' => 'raw',
			'value' => "",
		],
		[
			'attribute' => 'Visiting Objective',
			'format' => 'raw',
			'value' => "",
		],
		[
			'attribute' => 'Location',
			'format' => 'raw',
			'value' => empty($model->cust->fullAddress) ? '-' : $model->cust->fullAddress,
		],
		[
			'attribute' => 'Visiting Detail',
			'format' => 'raw',
			'value' => $model->who_name,
		],
		'remark',
	],
])?>
</div>
