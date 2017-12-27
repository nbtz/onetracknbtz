<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;

frontend\assets\AppAsset::register($this);

$directoryAsset = Yii::$app->assetManager->getPublishedUrl('@web/themes/sean');
?>
<?php $this->beginPage()?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<head>
	<meta charset="utf-8">
	<title>Dashboard</title>
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport">
	<meta content="" name="description">
	<meta content="" name="author">
	<?=Html::csrfMetaTags()?>
	<link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet">
	<?php echo $this->head() ?>

</head>
<body>
<?php $this->beginBody()?>

	<!-- begin #page-loader -->
	<!-- <div id="page-loader" class="fade in"><span class="spinner"></span></div> -->
	<!-- end #page-loader -->

	<!-- begin #page-container -->
	<div id="page-container" class="fade page-sidebar-fixed page-header-fixed in">
		<!-- begin #header -->
		<div id="header" class="header navbar navbar-default navbar-fixed-top">
			<!-- begin container-fluid -->
			<div class="container-fluid">
				<!-- begin mobile sidebar expand / collapse button -->
				<div class="navbar-header">
					<?php $urlHome = Url::to(['/site/index']);?>

					<a href="<?=$urlHome?>" class="navbar-brand"><span class="navbar-logo"><i class="ion-ios-cloud"></i></span> <?php echo Yii::$app->name ?></a>
					<button type="button" class="navbar-toggle" data-click="sidebar-toggled">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</div>
				<!-- end mobile sidebar expand / collapse button -->

				<!-- begin header navigation right -->
				<ul class="nav navbar-nav navbar-right">
					<li>
						<form class="navbar-form full-width">
							<div class="form-group">
								<input type="text" class="form-control" placeholder="Enter keyword">
								<button type="submit" class="btn btn-search"><i class="ion-ios-search-strong"></i></button>
							</div>
						</form>
					</li>
					<li class="dropdown">
						<a href="javascript:;" data-toggle="dropdown" class="dropdown-toggle icon">
							<i class="ion-ios-bell"></i>
							<span class="label">5</span>
						</a>
						<ul class="dropdown-menu media-list pull-right animated fadeInDown">
                            <li class="dropdown-header">Notifications (5)</li>
                            <li class="media">
                                <a href="javascript:;">
                                    <div class="media-left"><i class="ion-ios-close-empty media-object bg-red"></i></div>
                                    <div class="media-body">
                                        <h6 class="media-heading">Server Error Reports</h6>
                                        <div class="text-muted f-s-11">3 minutes ago</div>
                                    </div>
                                </a>
                            </li>
                            <li class="media">
                                <a href="javascript:;">
                                    <div class="media-left">
                                    	<?php echo Html::img('@web/themes/sean/img/user-1.jpg', [
	'class' => 'media-object',
]) ?>
                                    </div>
                                    <div class="media-body">
                                        <h6 class="media-heading">John Smith</h6>
                                        <p>Quisque pulvinar tellus sit amet sem scelerisque tincidunt.</p>
                                        <div class="text-muted f-s-11">25 minutes ago</div>
                                    </div>
                                </a>
                            </li>
                            <li class="media">
                                <a href="javascript:;">
                                    <div class="media-left">
                                    	<?php echo Html::img('@web/themes/sean/img/user-2.jpg', [
	'class' => 'media-object',
]) ?>
                                    </div>
                                    <div class="media-body">
                                        <h6 class="media-heading">Olivia</h6>
                                        <p>Quisque pulvinar tellus sit amet sem scelerisque tincidunt.</p>
                                        <div class="text-muted f-s-11">35 minutes ago</div>
                                    </div>
                                </a>
                            </li>
                            <li class="media">
                                <a href="javascript:;">
                                    <div class="media-left"><i class="ion-ios-plus-empty media-object bg-blue"></i></div>
                                    <div class="media-body">
                                        <h6 class="media-heading"> New User Registered</h6>
                                        <div class="text-muted f-s-11">1 hour ago</div>
                                    </div>
                                </a>
                            </li>
                            <li class="media">
                                <a href="javascript:;">
                                    <div class="media-left"><i class="ion-ios-email-outline media-object bg-blue"></i></div>
                                    <div class="media-body">
                                        <h6 class="media-heading"> New Email From John</h6>
                                        <div class="text-muted f-s-11">2 hour ago</div>
                                    </div>
                                </a>
                            </li>
                            <li class="dropdown-footer text-center">
                                <a href="javascript:;">View more</a>
                            </li>
						</ul>
					</li>
					<li class="dropdown navbar-user">
						<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
							<span class="user-image online">
								<?php echo Html::img('@web/themes/sean/img/user-13.jpg') ?>
							</span>
							<span class="hidden-xs"><?php echo Yii::$app->user->identity->username ?></span> <b class="caret"></b>
						</a>
						<ul class="dropdown-menu animated fadeInLeft">
							<li class="arrow"></li>
							<li><a href="javascript:;">Edit Profile</a></li>
							<li><a href="javascript:;"><span class="badge badge-danger pull-right">2</span> Inbox</a></li>
							<!-- <li><a href="javascript:;">Calendar</a></li> -->
							<!-- <li><a href="javascript:;">Setting</a></li> -->
							<li><?=Html::a(
	'Organizations',
	['/company/index'])?></li>
							<li><?=Html::a(
	'Position',
	['/position/index'])?></li>
							<li class="divider"></li>

							<li><?=Html::a(
	'Log out',
	['/site/logout'],
	['data-method' => 'post']
)?></li>
						</ul>
					</li>
				</ul>
				<!-- end header navigation right -->
			</div>
			<!-- end container-fluid -->
		</div>
		<!-- end #header -->

		<!-- begin #sidebar -->
		<div id="sidebar" class="sidebar">
			<!-- begin sidebar scrollbar -->
			<div data-scrollbar="true" data-height="100%">
				<!-- begin sidebar user -->
				<ul class="nav">
					<li class="nav-profile">
						<div class="image">
							<a href="javascript:;"><?php echo Html::img('@web/themes/sean/img/user-13.jpg') ?></a>
						</div>
						<div class="info">
							<?php echo Yii::$app->user->identity->username ?>
							<small>Team Leader</small>
						</div>
					</li>
				</ul>
				<!-- end sidebar user -->
				<!-- begin sidebar nav -->

				<?=\yii\widgets\Menu::widget(
	[
		'options' => ['class' => 'nav'],
		'submenuTemplate' => "\n<ul class=\"sub-menu\">\n{items}\n</ul>",
		'activateParents' => true,
		'items' => [
			[
				'label' => 'Dashboard',
				'url' => ['/site/index'], //'javascript:;',
				// 'options' => ['class' => ''],
				'template' => "<a href=\"{url}\"><i class=\"ion-ios-pulse-strong\"></i> {label}</a>",
			],
			[
				'label' => 'ข้อมูลทีม',
				'url' => 'javascript:;',
				'options' => ['class' => 'has-sub'],
				'template' => "<a href=\"{url}\"><b class=\"caret pull-right\"></b><i class=\"ion-ios-people\"></i> {label}</a>",
				'items' => [
					[
						'label' => 'จัดการข้อมูลทีม',
						'icon' => 'briefcase',
						'url' => ['/bu/index'],

					],
					['label' => 'วางแผนเข้าเยี่ยมลูกค้า', 'icon' => 'calendar', 'url' => ['/#']],
					['label' => 'ข้อมูลเช็คอิน', 'icon' => 'map-marker', 'url' => ['/check-in/index']],
				],

			],
			[
				'label' => 'ข้อมูลลูกค้า',
				'icon' => 'users',
				'url' => 'javascript:;',
				'options' => ['class' => 'has-sub'],
				'template' => "<a href=\"{url}\"><b class=\"caret pull-right\"></b><i class=\"ion-ios-body\"></i> {label}</a>",
				'items' => [
					['label' => 'ลูกค้า', 'icon' => 'user', 'url' => ['/cust/index']],
					['label' => 'ประเภทลูกค้า', 'icon' => 'user', 'url' => ['/cust-type/index']],
					['label' => 'สถานะลูกค้า', 'icon' => 'user', 'url' => ['/cust-status/index']],
				],

			],
			[
				'label' => 'รายงาน',
				'icon' => 'lock',
				'url' => 'javascript:;',
				'options' => ['class' => 'has-sub'],
				'template' => "<a href=\"{url}\"><b class=\"caret pull-right\"></b><i class=\"ion-ios-locked\"></i> {label}</a>",
				'items' => [
					['label' => 'รายงานการเข้าเยี่ยม', 'icon' => 'user', 'url' => ['/check-in/report']],
				],

			],
			[
				'label' => 'ความปลอดภัย',
				'icon' => 'lock',
				'url' => 'javascript:;',
				'options' => ['class' => 'has-sub'],
				'template' => "<a href=\"{url}\"><b class=\"caret pull-right\"></b><i class=\"ion-ios-locked\"></i> {label}</a>",
				'items' => [
					['label' => 'ผู้ใช้งาน', 'icon' => 'user', 'url' => ['/user/index']],
				],

			],
			/*[
				'label' => 'Logout',
				'icon' => 'fa fa-sign-out',
				'url' => ['/site/logout'],
				'template' => '<a href="{url}" data-method="post">{icon} {label}</a>',
				'visible' => !Yii::$app->user->isGuest,
			],*/
		],
	]);
?>


				<!-- end sidebar nav -->
			</div>
			<!-- end sidebar scrollbar -->
		</div>
		<div class="sidebar-bg"></div>
		<!-- end #sidebar -->

		<!-- begin #content -->
		<div id="content" class="content">
			<?=
Breadcrumbs::widget([
	'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
	'options' => ['class' => 'breadcrumb pull-right'],
])?>
			<?php echo $content ?>
		</div>

		<!-- end #content -->


		<!-- begin scroll to top btn -->
		<a href="javascript:;" class="btn btn-icon btn-circle btn-primary btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
		<!-- end scroll to top btn -->
	</div>
	<!-- end page container -->

<?php $this->endBody()?>
<script>
		$(document).ready(function() {
			App.init();
			DashboardV2.init();
		});
	</script>
</body>
</html>
<?php $this->endPage()?>