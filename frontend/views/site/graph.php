<?php
use common\models\Bu;
use common\models\CheckIn;
use miloschuman\highcharts\Highcharts;
use yii\web\JsExpression;
?>

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
			'innerSize' => '50%',
			'data' => [
				[
					'name' => 'Y',
					'y' => 13,
					'color' => new JsExpression('Highcharts.getOptions().colors[0]'), // Jane's color
				],
				[
					'name' => 'N',
					'y' => 23,
					'color' => new JsExpression('Highcharts.getOptions().colors[1]'), // John's color
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

	?>






<?php
$num_today = date('w');
// $today = date("Y-m-d");
	$today = date("Y-m-d", strtotime('2017-05-13'));
	$sunday = date("Y-m-d", strtotime($today . ' - ' . $num_today . ' days'));
// echo $sunday . " - " . $today . "<br><br>";

	$modelCheckin = CheckIn::find()->where(['company_id' => Yii::$app->user->identity->company->id])->andWhere(['between', 'DATE(chk_time)', $sunday, $today])->all();
	for ($i = 0; $i < count($modelCheckin); $i++) {
		// echo $modelCheckin[$i]->chk_time . "<br>";
	}

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
        <div class="row">
            <div class="col-sm-3" >
                    <div class="row"><div class="col-sm-6"> <h3 >Team A</h3></div><div class="col-sm-6 right"><i class="fa fa-user"></i></div> </div>
                    <div style="margin-top:-120px; top:0px;  max-height: 300px;overflow: hidden;">
                <?php
echo Highcharts::widget([
		'scripts' => [
			'modules/exporting',
			'themes/grid-light',
		],
		'options' => [
			'title' => [
				'text' => '36.11%',
				'align' => 'center',
				'verticalAlign' => 'middle',
				'y' => 5,
				// 'y' => 125,
			],
			'series' => [
				[
					'type' => 'pie',
					'name' => 'Team A',
					'innerSize' => '50%',
					'data' => [
						[
							'name' => 'Y',
							'y' => 13,
							'color' => new JsExpression('Highcharts.getOptions().colors[0]'), // Jane's color
						],
						[
							'name' => 'N',
							'y' => 23,
							'color' => new JsExpression('Highcharts.getOptions().colors[1]'), // John's color
						],

					],
					// 'center' => [100, 480],
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
            <div class="col-sm-3" style="margin-top:-100px; top:0px;  max-height: 300px;overflow: hidden;">
                <?php
echo Highcharts::widget([
		'scripts' => [
			'modules/exporting',
			'themes/grid-light',
		],
		'options' => [
			'title' => [
				'text' => 'Team B',
				'align' => 'center',
				'verticalAlign' => 'middle',
				'y' => 5,
			],
			'series' => [
				[
					'type' => 'pie',
					'name' => 'Team A',
					'innerSize' => '50%',
					'data' => [
						[
							'name' => 'Y',
							'y' => 13,
							'color' => new JsExpression('Highcharts.getOptions().colors[0]'), // Jane's color
						],
						[
							'name' => 'N',
							'y' => 23,
							'color' => new JsExpression('Highcharts.getOptions().colors[1]'), // John's color
						],

					],
					// 'center' => [100, 480],
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
            <div class="col-sm-3" style="margin-top:-100px; top:0px;  max-height: 300px;overflow: hidden;">
                <?php
echo Highcharts::widget([
		'scripts' => [
			'modules/exporting',
			'themes/grid-light',
		],
		'options' => [
			'title' => [
				'text' => 'Team C',
				'align' => 'center',
				'verticalAlign' => 'middle',
				'y' => 5,
			],
			'series' => [
				[
					'type' => 'pie',
					'name' => 'Team A',
					'innerSize' => '50%',
					'data' => [
						[
							'name' => 'Y',
							'y' => 13,
							'color' => new JsExpression('Highcharts.getOptions().colors[0]'), // Jane's color
						],
						[
							'name' => 'N',
							'y' => 23,
							'color' => new JsExpression('Highcharts.getOptions().colors[1]'), // John's color
						],

					],
					// 'center' => [100, 480],
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
            <div class="col-sm-3" style="margin-top:-100px; top:0px;  max-height: 300px;overflow: hidden;">
                <?php
echo Highcharts::widget([
		'scripts' => [
			'modules/exporting',
			'themes/grid-light',
		],
		'options' => [
			'title' => [
				'text' => 'Team D',
				'align' => 'center',
				'verticalAlign' => 'middle',
				'y' => 5,
			],
			'series' => [
				[
					'type' => 'pie',
					'name' => 'Team A',
					'innerSize' => '50%',
					'data' => [
						[
							'name' => 'Y',
							'y' => 13,
							'color' => new JsExpression('Highcharts.getOptions().colors[0]'), // Jane's color
						],
						[
							'name' => 'N',
							'y' => 23,
							'color' => new JsExpression('Highcharts.getOptions().colors[1]'), // John's color
						],

					],
					// 'center' => [100, 480],
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
    <div class="col-md-4" style="color:#fff;"> 123456789</div>

</div>
<?php }?>