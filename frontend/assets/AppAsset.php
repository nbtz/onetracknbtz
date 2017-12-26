<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle {
	public $basePath = '@webroot';
	public $baseUrl = '@web';

	public $css = [
		'themes/sean/plugins/jquery-ui/themes/base/minified/jquery-ui.min.css',
		// 'themes/sean/plugins/bootstrap/css/bootstrap.min.css',
		'themes/sean/plugins/font-awesome/css/font-awesome.min.css',
		'themes/sean/plugins/ionicons/css/ionicons.min.css',
		'css/site.css',
		'css/custom.css',
		'themes/sean/css/animate.min.css',
		'themes/sean/css/style.min.css',
		'themes/sean/css/style-responsive.min.css',
		'themes/sean/css/theme/default.css',
		'themes/sean/plugins/jquery-jvectormap/jquery-jvectormap.css',
		// 'themes/sean/plugins/bootstrap-calendar/css/bootstrap_calendar.css',
		'themes/sean/plugins/gritter/css/jquery.gritter.css',
		'themes/sean/plugins/morris/morris.css',
	];
	public $js = [
		// 'themes/sean/plugins/pace/pace.min.js',
		// 'themes/sean/plugins/jquery/jquery-1.9.1.min.js',
		'themes/sean/plugins/jquery/jquery-migrate-1.1.0.min.js',
		'themes/sean/plugins/jquery-ui/ui/minified/jquery-ui.min.js',
		// 'themes/sean/plugins/bootstrap/js/bootstrap.min.js',
		'themes/sean/plugins/slimscroll/jquery.slimscroll.min.js',
		'themes/sean/plugins/jquery-cookie/jquery.cookie.js',
		'themes/sean/plugins/morris/raphael.min.js',
		'themes/sean/plugins/morris/morris.js',
		'themes/sean/plugins/jquery-jvectormap/jquery-jvectormap.min.js',
		'themes/sean/plugins/jquery-jvectormap/jquery-jvectormap-world-merc-en.js',
		// 'themes/sean/plugins/bootstrap-calendar/js/bootstrap_calendar.min.js',
		'themes/sean/plugins/gritter/js/jquery.gritter.js',
		'themes/sean/js/dashboard-v2.min.js',
		'themes/sean/js/apps.min.js',
	];
	public $depends = [
		'yii\web\YiiAsset',
		'yii\bootstrap\BootstrapAsset',
	];
}
