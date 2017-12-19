<?php
return [
	'aliases' => [
		'@bower' => '@vendor/bower-asset',
		'@npm' => '@vendor/npm-asset',
	],
	'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
	'language' => 'th-TH',
	'timezone' => 'Asia/Bangkok',
	'name' => 'OneLink Space',
	'components' => [
		'cache' => [
			'class' => 'yii\caching\FileCache',
		],
		'i18n' => [
			'translations' => [
				'*' => [
					'class' => 'yii\i18n\PhpMessageSource',
					'basePath' => '@common/messages',
				],
			],
		],
		'urlManager' => [
			'enablePrettyUrl' => true,
			'showScriptName' => true,
			// 'enableStrictParsing' => true,
			'rules' => [
				'<controller:(announce)>/<action:(view)>' => 'item/oview',
				'<controller:(announce)>/<id:\d+>' => 'item/oview',
				'<controller:\w+>/<id:\d+>' => '<controller>/view',
			],
		],
		/*'view' => [
			'theme' => [
				'pathMap' => [
					'@app/views' => '@webroot/themes/admin/views',
				],
			],
		],*/
		/*'log' => [
			'targets' => [
				[
					'class' => 'yii\log\DbTarget',
					'levels' => ['error', 'warning'],
				],

			],
		],*/
	],
];
