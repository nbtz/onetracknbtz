<?php
use scotthuangzl\googlechart\GoogleChart;
?>
<div style="width: 22%">
<?php
echo GoogleChart::widget(['visualization' => 'PieChart',
	'data' => [
		['Task', 'Hours per Day'],
		['Work', 11],
		['Eat', 2],
		['Commute', 2],
		['Watch TV', 2],
		['Sleep', 7],
	],
	'options' => ['title' => ' ', 'pieHole' => 0.4, 'legend' => 'none'],
]);
?>
</div>