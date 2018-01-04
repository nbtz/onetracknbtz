<?php
use yii\widgets\DetailView;

?>

<div class="report-view">
<?=DetailView::widget([
	'model' => $model,
	'attributes' => [
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
			'value' => "",
		],
		[
			'attribute' => 'Visiting Detail',
			'format' => 'raw',
			'value' => "",
		],
		'remark',
	],
])?>
</div>
