<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?=$directoryAsset?>/img/user2-160x160.jpg" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p>Admin</p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form -->
       <!--  <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form> -->
        <!-- /.search form -->

        <?=dmstr\widgets\Menu::widget(
	[
		'options' => ['class' => 'sidebar-menu tree', 'data-widget' => 'tree'],
		'items' => [
			['label' => 'Dashboard', 'options' => ['class' => 'header']],
			[
				'label' => 'ข้อมูลทีม',
				'icon' => 'briefcase',
				'url' => ['#'],
				'items' => [
					['label' => 'จัดการข้อมูลทีม', 'icon' => 'briefcase', 'url' => ['/bu/index']],
					['label' => 'วางแผนเข้าเยี่ยมลูกค้า', 'icon' => 'calendar', 'url' => ['/#']],
					['label' => 'ข้อมูลเช็คอิน', 'icon' => 'map-marker', 'url' => ['/#']],
				],

			],
			[
				'label' => 'ข้อมูลลูกค้า',
				'icon' => 'users',
				'url' => ['#'],
				'items' => [
					['label' => 'ลูกค้า', 'icon' => 'user', 'url' => ['/cust/index']],
					['label' => 'ประเภทลูกค้า', 'icon' => 'user', 'url' => ['/cust-type/index']],
					['label' => 'สถานะลูกค้า', 'icon' => 'user', 'url' => ['/cust-status/index']],
				],

			],
			[
				'label' => 'ความปลอดภัย',
				'icon' => 'lock',
				'url' => ['#'],
				'items' => [
					['label' => 'ผู้ใช้งาน', 'icon' => 'user', 'url' => ['/user/index']],
				],

			],

			[
				'label' => 'Logout',
				'icon' => 'fa fa-sign-out',
				'url' => ['/site/logout'],
				'template' => '<a href="{url}" data-method="post">{icon} {label}</a>',
				'visible' => !Yii::$app->user->isGuest,
			],
			// ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],

			// ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
			/*[
				'label' => 'Same tools',
				'icon' => 'share',
				'url' => '#',
				'items' => [
					['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii']],
					['label' => 'Debug', 'icon' => 'dashboard', 'url' => ['/debug']],
					[
						'label' => 'Level One',
						'icon' => 'circle-o',
						'url' => '#',
						'items' => [
							['label' => 'Level Two', 'icon' => 'circle-o', 'url' => '#'],
							[
								'label' => 'Level Two',
								'icon' => 'circle-o',
								'url' => '#',
								'items' => [
									['label' => 'Level Three', 'icon' => 'circle-o', 'url' => '#'],
									['label' => 'Level Three', 'icon' => 'circle-o', 'url' => '#'],
								],
							],
						],
					],
				],
			],*/
		],
	]
)?>

    </section>

</aside>
