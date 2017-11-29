<?php
use miloschuman\highcharts\Highcharts;
use scotthuangzl\googlechart\GoogleChart;
use yii\helpers\Html;
/* @var $this yii\web\View */
$this->title = 'Dashboard';

?>
<!-- <h1>INDEX  PAGE</h1> -->
<!-- 123456789 -->
<?php

// $db = Yii::$app->pgsql;
// $db->open();
// Yii::$app->pgsql->open();
// print_r($db);
// $tbUsers = Yii::$app->pgsql->createCommand('')->queryScalar();
// print_r($db->schema->getTables());
?>

<!-- <h1>TEST abc ทดสอบ โชคดี อุบล</h1>
<h2>TEST abc ทดสอบ โชคดี อุบล</h2>
<h3>TEST abc ทดสอบ โชคดี อุบล</h3>
<h4>TEST abc ทดสอบ โชคดี อุบล</h4>
<h5>TEST abc ทดสอบ โชคดี อุบล</h5>
<h6>TEST abc ทดสอบ โชคดี อุบล</h6>
TEST abc ทดสอบ โชคดี อุบล
<p>TEST abc ทดสอบ โชคดี อุบล</p> -->

<div class="part1">
    <div class="row">
        <!-- <div class="col-md-1"></div> -->
        <div class="col-sm-5ths">
            <div class="box-sum ">
                <div class="row">
                    <div class="col-sm-8">
                        <p>ONLINE</p>
                        <b>50/59</b>
                    </div>
                    <div class="col-sm-4 box-sum-icon ">
                        <?php // =Html::img('@web/themes/admin/img/icon/Symbol 9 – 5@2x.png');?>
                        <?='<h4><i class="fa fa-podcast" aria-hidden="true"></i></h4>';?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="progress">
                            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="80"
                            aria-valuemin="0" aria-valuemax="100" style="width:80%"></div>
                        </div>
                    </div>
                </div>
                <div class="readmore right"><?=Html::a('More Detail <i class="fa fa-arrow-circle-o-right"></i>', ['#']);?></div>
            </div>
        </div>
        <div class="col-sm-5ths">
            <div class="box-sum ">
                <div class="row">
                    <div class="col-sm-8">
                        <p>Late</p>
                        <b>5</b>
                    </div>
                    <div class="col-sm-4 box-sum-icon">
                        <?php // =Html::img('@web/themes/admin/img/icon/Late-01@2x.png');?>
                        <?='<h4><i class="fa fa-clock-o" aria-hidden="true"></i></h4>';?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="progress">
                            <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="10"
                            aria-valuemin="0" aria-valuemax="100" style="width:10%"></div>
                        </div>
                    </div>
                </div>
                <div class="readmore right"><?=Html::a('More Detail <i class="fa fa-arrow-circle-o-right"></i>', ['#']);?></div>
            </div>
        </div>
        <div class="col-sm-5ths">
            <div class="box-sum ">
                <div class="row">
                    <div class="col-sm-8">
                        <p>New Check-in</p>
                        <b>15</b>
                    </div>
                    <div class="col-sm-4 box-sum-icon">
                        <?php // =Html::img('@web/themes/admin/img/icon/Icon-02@2x.png');?>
                        <?='<h4><i class="fa fa-map-marker" aria-hidden="true"></i></h4>';?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="progress">
                            <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20"
                            aria-valuemin="0" aria-valuemax="100" style="width:20%"></div>
                        </div>
                    </div>
                </div>
                <div class="readmore right"><?=Html::a('More Detail <i class="fa fa-arrow-circle-o-right"></i>', ['#']);?></div>
            </div>
        </div>
        <div class="col-sm-5ths">
            <div class="box-sum ">
                <div class="row">
                    <div class="col-sm-8">
                        <p>Month to date</p>
                        <b>7</b>
                    </div>
                    <div class="col-sm-4 box-sum-icon">
                        <?php // =Html::img('@web/themes/admin/img/icon/Calendar-02@2x.png');?>
                        <?='<h4><i class="fa fa-calendar" aria-hidden="true"></i></h4>';?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="progress">
                            <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="7"
                            aria-valuemin="0" aria-valuemax="100" style="width:7%"></div>
                        </div>
                    </div>
                </div>
                <div class="readmore right"><?=Html::a('More Detail <i class="fa fa-arrow-circle-o-right"></i>', ['#']);?></div>
            </div>
        </div>
        <div class="col-sm-5ths">
            <div class="box-sum ">
                <div class="row">
                    <div class="col-sm-8">
                        <p>Long time no see</p>
                        <b>530/3574</b>
                    </div>
                    <div class="col-sm-4 box-sum-icon ">
                        <?php // =Html::img('@web/themes/admin/img/icon/Calendar-01@2x.png');?>
                        <?='<h4><i class="fa fa-calendar-o" aria-hidden="true"></i></h4>';?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="progress">
                            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="30"
                            aria-valuemin="0" aria-valuemax="100" style="width:30%"></div>
                        </div>
                    </div>
                </div>
                <div class="readmore right"><?=Html::a('More Detail <i class="fa fa-arrow-circle-o-right"></i>', ['#']);?></div>
            </div>
        </div>
        <!-- <div class="col-md-1"></div> -->
    </div>
</div>

<div class="part2">
    <div class="row">
        <div class="col-sm-12">
            <div class="bg-black">
                <h4>DASHBOARD</h4>

            </div>
        </div>
    </div>

    <div class="box-detail">
        <div class="row">
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-3 box-team">
                        <b>Team A</b>
                        <div class="box-chart">
                        <?php echo GoogleChart::widget(['visualization' => 'PieChart',
	'data' => [
		['Label', 'Value'],
		['Work', 11],
		['Not work', 89],
	],
	'options' => [
		// 'title' => 'Team A',
		'pieHole' => 0.5,
		'width' => 100,
		'height' => 100,
	]]); ?>

                        </div>
                    </div>
                    <div class="col-md-3 box-team">
                        <b>Team B</b>
                        <div class="box-chart">
                            <?php /*echo ChartJs::widget([
'type' => 'Doughnut',
'options' => [
'height' => 120,
'width' => 120,
],
'data' => [
'datasets' => [
'data' => [10, 20, 30],
],
'labels' => [
'Red',
'Yellow',
'Blue',
],

],
]);*/?>

                        </div>
                    </div>
                    <div class="col-md-3 box-team">
                        <b>Team C</b>
                        <div class="box-chart">
<?php
echo Highcharts::widget([
	'options' => [
		'chart' => [
			'plotBackgroundColor' => null,
			'plotBorderWidth' => null,
			'plotShadow' => false,
			'type' => 'pie',
		],
		'title' => [
			// 'text' => 'Browser market shares January, 2015 to May, 2015',
		],
		// 'tooltip' => [
		//     'pointFormat' => '[series.name}' => '<b>[point.percentage:.1f}%</b>'
		// ],
		'plotOptions' => [
			'pie' => [
				'allowPointSelect' => true,
				'cursor' => 'pointer',
				'dataLabels' => [
					'enabled' => true,
					// 'format' => '<b>[point.name}</b>' => '[point.percentage:.1f} %',
					// 'style' => [
					//     'color' => (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
					// }
				],
			],
		],
		'series' => [[
			'name' => 'Brands',
			'colorByPoint' => true,
			'data' => [[
				'name' => 'IE',
				'y' => 56.33,
			], [
				'name' => 'Chrome',
				'y' => 24.03,
				'sliced' => true,
				'selected' => true,
			], [
				'name' => 'Firefox',
				'y' => 10.38,
			], [
				'name' => 'Safari',
				'y' => 4.77,
			], [
				'name' => 'Opera',
				'y' => 0.91,
			], [
				'name' => 'Other',
				'y' => 0.2,
			]],
		]],
	],
]);
?>


                        </div>
                    </div>
                    <div class="col-md-3 box-team">
                        <b>Team D</b>
                        <div class="box-chart">


                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 box-team">
                        <b>Team E</b>
                        <div class="box-chart">


                        </div>
                    </div>
                    <div class="col-md-3 box-team">
                        <b>Team F</b>
                        <div class="box-chart">


                        </div>
                    </div>
                    <div class="col-md-3 box-team">+</div>
                    <div class="col-md-3 box-team">+</div>
                </div>
            </div>
            <div class="col-md-4">
                <h4>Sale List</h4>
                <div class="row list-user">
                    <div class="col-md-2">image1</div>
                    <div class="col-md-10">data user</div>
                </div>
                 <div class="row list-user">
                    <div class="col-md-2">image2</div>
                    <div class="col-md-10">data user</div>
                </div>
                 <div class="row list-user">
                    <div class="col-md-2">image3</div>
                    <div class="col-md-10">data user</div>
                </div>
                 <div class="row list-user">
                    <div class="col-md-2">image4</div>
                    <div class="col-md-10">data user</div>
                </div>
            </div>
        </div>
    </div>

</div>
 <?php
/*echo Highcharts::widget([
'options' => [
'chart' => ['type' => 'pie'],
'title' => ['text' => 'test graph'],
// 'xAxis' => [
// 	                'categories' => ['Apples', 'Bananas', 'Oranges'],
// 	            ],
// 	            'yAxis' => [
// 	                'title' => ['text' => 'Fruit eaten'],

'series' => [
'name' => 'Delivered amount',
'data' => [
['Bananas', 8],
['Kiwi', 3],
['Mixed nuts', 1],
['Oranges', 6],
['Apples', 8],
['Pears', 4],
['Clementines', 4],
['Reddish (bag)', 1],
['Grapes (bunch)', 1],
],
],
],
]);*/

echo Highcharts::widget([
	'options' => [
		'chart' => [
			'plotBackgroundColor' => null,
			'plotBorderWidth' => null,
			'plotShadow' => false,
			'type' => 'pie',
		],
		'title' => [
			'text' => 'Browser market shares January, 2015 to May, 2015',
		],
		// 'tooltip' => [
		//     'pointFormat' => '[series.name}' => '<b>[point.percentage:.1f}%</b>'
		// ],
		'plotOptions' => [
			'pie' => [
				'allowPointSelect' => true,
				'cursor' => 'pointer',
				'dataLabels' => [
					'enabled' => true,
					// 'format' => '<b>[point.name}</b>' => '[point.percentage:.1f} %',
					// 'style' => [
					//     'color' => (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
					// }
				],
			],
		],
		'series' => [[
			'name' => 'Brands',
			'colorByPoint' => true,
			'data' => [[
				'name' => 'IE',
				'y' => 56.33,
			], [
				'name' => 'Chrome',
				'y' => 24.03,
				'sliced' => true,
				'selected' => true,
			], [
				'name' => 'Firefox',
				'y' => 10.38,
			], [
				'name' => 'Safari',
				'y' => 4.77,
			], [
				'name' => 'Opera',
				'y' => 0.91,
			], [
				'name' => 'Other',
				'y' => 0.2,
			]],
		]],
	],
]);

?>

<div class="part3">
    <h4>MAP</h4>
    <div class="row">
        <div class="col-sm-12">
            <?php

echo GoogleChart::widget(['visualization' => 'Map',
	'packages' => 'map', //default is corechart
	'loadVersion' => 1, //default is 1.  As for Calendar, you need change to 1.1
	'data' => [
		['Country', 'Population'],
		['China', 'China: 1,363,800,000'],
		['India', 'India: 1,242,620,000'],
		['US', 'US: 317,842,000'],
		['Indonesia', 'Indonesia: 247,424,598'],
		['Brazil', 'Brazil: 201,032,714'],
		['Pakistan', 'Pakistan: 186,134,000'],
		['Nigeria', 'Nigeria: 173,615,000'],
		['Bangladesh', 'Bangladesh: 152,518,015'],
		['Russia', 'Russia: 146,019,512'],
		['Japan', 'Japan: 127,120,000'],
	],
	'options' => ['title' => 'My Daily Activity',
		'showTip' => true,
	]]);
?>
        </div>
    </div>
</div>
<div class="part4">
    <h4>PLANING</h4>

</div>

<div class="part5">
    <h4>CHECK-IN</h4>

</div>

<div class="part6">
    <h4>PHOTO</h4>
    <div class="row">
        <div class="col-md-2">
            <?php //= Html::img('');?>
            <div class="box-img"></div>
            <div class="title"></div>
            <div class="detail"></div>
        </div>
        <div class="col-md-2"></div>
        <div class="col-md-2"></div>
        <div class="col-md-2"></div>
        <div class="col-md-2"></div>
        <div class="col-md-2"></div>
    </div>
</div>