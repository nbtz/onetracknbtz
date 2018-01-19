<?php
use common\models\Bu;
use common\models\CheckIn;
use miloschuman\highcharts\Highcharts;
?>

<?php
$num_today = date('w');
$today = date("Y-m-d");
// $today = date("Y-m-d", strtotime('2017-05-13'));
$sunday = date("Y-m-d", strtotime($today . ' - ' . $num_today . ' days'));
echo $sunday . " - " . $today . "<br><br>";

/*echo Highcharts::widget([
'scripts' => [
'modules/exporting',
'themes/grid-light',
],
'options' => [
'title' => [
'text' => ' ',
],
// 'xAxis' => [
// 	'categories' => ['Apples', 'Oranges', 'Pears', 'Bananas', 'Plums'],
// ],
// 'yAxis' => [
// 'title' => ['text' => 'fruit'],
// ],
// 'labels' => [
// 	'items' => [
// 		[
// 			'html' => 'Total fruit consumption',
// 			'style' => [
// 				'left' => '50px',
// 				'top' => '18px',
// 				'color' => new JsExpression('(Highcharts.theme && Highcharts.theme.textColor) || "black"'),
// 			],
// 		],
// 	],
// ],
'series' => $objects,
],
]);*/
?>
<div class="row">
    <div class="col-md-8">
    	<?php
if (isset(Yii::$app->user->identity->company->id) && !empty(Yii::$app->user->identity->company->id)) {

	$modelTeam = Bu::find()->where(['company_id' => Yii::$app->user->identity->company->id])->limit(8)->all();

	$positionY = 80;
	$positionX = 100;
	$dataUser = [];
	$objects = [];

	for ($i = 0; $i < count($modelTeam); $i++) {
		if ($i == 0) {

		} else if ($i == 4) {
			$positionX = 100;
			$positionY = 280;
		} else {
			$positionX += 200;
		}
		// if (isset($modelTeam[$i]->users) && !empty($modelTeam[$i]->users)) {
		// 	for ($j = 0; $j < count($modelTeam[$i]->users); $j++) {

		// 		// $dataUser =

		// 	}

		// }

		$objects[] = [
			'type' => 'pie',
			'name' => $modelTeam[$i]->bu_name,
			'innerSize' => '70%',
			'data' => [
				[
					'name' => 'Y',
					'y' => 13,
					'color' => '#68BE63', // Jane's color
				],
				[
					'name' => 'N',
					'y' => 23,
					'color' => '#95999C', // John's color
				],

			],
			'center' => [$positionX, $positionY],
			'size' => 100,
			'showInLegend' => false,
			'dataLabels' => [
				'enabled' => false,
			],
			// 'tooltip' => [
			// 	'valueSuffix' => ' km/h',
			// ],
		];
	}

	$modelCheckin = CheckIn::find()->where(['company_id' => Yii::$app->user->identity->company->id])->andWhere(['between', 'DATE(chk_time)', $sunday, $today])->all();
	for ($i = 0; $i < count($modelCheckin); $i++) {
		// echo $modelCheckin[$i]->chk_time . "<br>";
	}
	?>
        <div class="row">
            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-3 text-white" style="background: #f8e17c;">
                <div class="row"><div class="col-xs-10"> <h5>Team A</h5></div><div class="col-xs-2 right"><h5><i class="fa fa-ellipsis-v"></i></h5></div> </div>
                <div class="row  box-graph">
                	<div class="col-xs-12">

                    	<div class="box-show-graph">
                <?php
echo Highcharts::widget([
		'scripts' => [
			'modules/exporting',
			'themes/grid-light',
		],
		'options' => [
			'title' => [
				'text' => '36.11%',
				'y' => 78,
			],
			'series' => [
				[
					'type' => 'pie',
					'name' => 'Team A',
					'innerSize' => '70%',
					'data' => [
						[
							'name' => 'Y',
							'y' => 33,
							'color' => '#68BE63', // Jane's color
						],
						[
							'name' => 'N',
							'y' => 13,
							'color' => '#95999C', // John's color
						],

					],
					// 'center' => [40, 10],
					// 'size' => 100,
					'showInLegend' => false,
					'dataLabels' => [
						'enabled' => false,
					],

				],
			],
			'navigation' => [
				'buttonOptions' => [
					'enabled' => false,
				],
			],
			'credits' => [
				'enabled' => false,
			],
		],
	]);

	?>
						</div>
                	</div>
                </div>
            </div>

            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-3 text-white" style="background: #f8e17c;">
            	<div class="row"><div class="col-xs-10"> <h5>Team B</h5></div><div class="col-xs-2 right"><h5><i class="fa fa-ellipsis-v"></i></h5></div> </div>
                <div class="row  box-graph">
                	<div class="col-xs-12">
                		<div class="box-show-graph">
                <?php
echo Highcharts::widget([
		'scripts' => [
			'modules/exporting',
			'themes/grid-light',
		],
		'options' => [
			'title' => [
				'text' => '55.5%',
				// 'align' => 'center',
				// 'verticalAlign' => 'middle',
				'y' => 78,
			],
			'series' => [
				[
					'type' => 'pie',
					'name' => 'Team B',
					'innerSize' => '70%',
					'data' => [
						[
							'name' => 'Y',
							'y' => 13,
							'color' => '#68BE63', // Jane's color
						],
						[
							'name' => 'N',
							'y' => 23,
							'color' => '#95999C', // John's color
						],

					],
					'center' => [40, 20],
					// 'size' => 100,
					'showInLegend' => false,
					'dataLabels' => [
						'enabled' => false,
					],
				],
			],
			'navigation' => [
				'buttonOptions' => [
					'enabled' => false,
				],
			],
			'credits' => [
				'enabled' => false,
			],
		],
	]);

	?>
						</div>
                	</div>
				</div>
            </div>

            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-3 text-white" style="background: #f8e17c;">
            	<div class="row"><div class="col-xs-10"> <h5>Team C</h5></div><div class="col-xs-2 right"><h5><i class="fa fa-ellipsis-v"></i></h5></div> </div>
            	<div class="row  box-graph">
                	<div class="col-xs-12">
                    	<div class="box-show-graph">
                <?php
echo Highcharts::widget([
		'scripts' => [
			'modules/exporting',
			'themes/grid-light',
		],
		'options' => [
			'title' => [
				'text' => '8.99%',
				// 'align' => 'center',
				// 'verticalAlign' => 'middle',
				'y' => 78,
			],
			'series' => [
				[
					'type' => 'pie',
					'name' => 'Team C',
					'innerSize' => '70%',
					'data' => [
						[
							'name' => 'Y',
							'y' => 13,
							'color' => '#68BE63', // Jane's color
						],
						[
							'name' => 'N',
							'y' => 23,
							'color' => '#95999C', // John's color
						],

					],
					'center' => [40, 20],
					// 'size' => 100,
					'showInLegend' => false,
					'dataLabels' => [
						'enabled' => false,
					],
				],
			],
			'navigation' => [
				'buttonOptions' => [
					'enabled' => false,
				],
			],
			'credits' => [
				'enabled' => false,
			],
		],
	]);

	?>
						</div>
                	</div>
				</div>
            </div>
            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-3 text-white" style="background: #f8e17c;">
            	<div class="row"><div class="col-xs-10"> <h5>Team D</h5></div><div class="col-xs-2 right"><h5><i class="fa fa-ellipsis-v"></i></h5></div> </div>
                <div class="row  box-graph">
                	<div class="col-xs-12">
                	    <div class="box-show-graph">
                <?php
echo Highcharts::widget([
		'scripts' => [
			'modules/exporting',
			'themes/grid-light',
		],
		'options' => [
			'title' => [
				'text' => '33%',
				// 'align' => 'center',
				// 'verticalAlign' => 'middle',
				'y' => 78,
			],
			'series' => [
				[
					'type' => 'pie',
					'name' => 'Team D',
					'innerSize' => '70%',
					'data' => [
						[
							'name' => 'Y',
							'y' => 13,
							'color' => '#68BE63', // Jane's color
						],
						[
							'name' => 'N',
							'y' => 23,
							'color' => '#95999C', // John's color
						],

					],
					'center' => [40, 20],
					// 'size' => 100,
					'showInLegend' => false,
					'dataLabels' => [
						'enabled' => false,
					],
				],
			],
			'navigation' => [
				'buttonOptions' => [
					'enabled' => false,
				],
			],
			'credits' => [
				'enabled' => false,
			],
		],
	]);

	?>
						</div>
                	</div>
				</div>
            </div>
            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-3 text-white" style="background: #f8e17c;">
            	<div class="row"><div class="col-xs-10"> <h5>Team E</h5></div><div class="col-xs-2 right"><h5><i class="fa fa-ellipsis-v"></i></h5></div> </div>
                <div class="row  box-graph">
                	<div class="col-xs-12">
                    	<div class="box-show-graph">
                <?php
echo Highcharts::widget([
		'scripts' => [
			'modules/exporting',
			'themes/grid-light',
		],
		'options' => [
			'title' => [
				'text' => '30%',
				// 'align' => 'center',
				// 'verticalAlign' => 'middle',
				'y' => 78,
			],
			'series' => [
				[
					'type' => 'pie',
					'name' => 'Team E',
					'innerSize' => '70%',
					'data' => [
						[
							'name' => 'Y',
							'y' => 10,
							'color' => '#68BE63', // Jane's color
						],
						[
							'name' => 'N',
							'y' => 5,
							'color' => '#95999C', // John's color
						],

					],
					'center' => [40, 20],
					// 'size' => 100,
					'showInLegend' => false,
					'dataLabels' => [
						'enabled' => false,
					],
				],
			],
			'navigation' => [
				'buttonOptions' => [
					'enabled' => false,
				],
			],
			'credits' => [
				'enabled' => false,
			],
		],
	]);

	?>
						</div>
                	</div>
				</div>
            </div>
            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-3 text-white" style="background: #f8e17c;">
            	<div class="row"><div class="col-xs-10"> <h5>Team F</h5></div><div class="col-xs-2 right"><h5><i class="fa fa-ellipsis-v"></i></h5></div> </div>
                <div class="row  box-graph">
                	<div class="col-xs-12">
                    	<div class="box-show-graph">
                <?php
echo Highcharts::widget([
		'scripts' => [
			'modules/exporting',
			'themes/grid-light',
		],
		'options' => [
			'title' => [
				'text' => '40.2%',
				// 'align' => 'center',
				// 'verticalAlign' => 'middle',
				'y' => 78,
			],
			'series' => [
				[
					'type' => 'pie',
					'name' => 'Team F',
					'innerSize' => '70%',
					'data' => [
						[
							'name' => 'Y',
							'y' => 10,
							'color' => '#68BE63', // Jane's color
						],
						[
							'name' => 'N',
							'y' => 5,
							'color' => '#95999C', // John's color
						],

					],
					'center' => [40, 20],
					// 'size' => 100,
					'showInLegend' => false,
					'dataLabels' => [
						'enabled' => false,
					],
				],
			],
			'navigation' => [
				'buttonOptions' => [
					'enabled' => false,
				],
			],
			'credits' => [
				'enabled' => false,
			],
		],
	]);

	?>
						</div>
                	</div>
				</div>
            </div>

        </div>

<?php }?>
    </div>
    <div class="col-md-4" style="color:#fff;"> List user of team</div>

</div>

