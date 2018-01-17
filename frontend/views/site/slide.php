<?php
use common\models\CheckIn;
use romkaChev\yii2\swiper\Swiper;
use yii\helpers\Html;

?>
<!-- image -->
<?php
$items = [];
if (isset(Yii::$app->user->identity->company->id) && !empty(Yii::$app->user->identity->company->id)) {
	$modelCheckin = CheckIn::find()->andWhere(['company_id' => Yii::$app->user->identity->company->id])->orderBy("chk_time DESC")->limit(100)->all();
	// $modelImage = CheckInPic::find()->where(['not', ['pic_url' => null]])->orderBy("pic_time DESC")->limit(30)->all();

	$items = [];
	for ($i = 0; $i < count($modelCheckin); $i++) {
		if (isset($modelCheckin[$i]->pic->pic_url) && !empty($modelCheckin[$i]->pic->pic_url)) {
			$items[] = Html::img($modelCheckin[$i]->pic->pic_url);

			/*[
				'background' => Html::img($modelCheckin[$i]->pic->pic_url),
			];*/
		}

	}
	?>
<div class="slide-box">
<?php
// print_r($items);
	echo Swiper::widget([
		// 'items' => [
		// Html::img('https://onelinkspace-com-upload.s3.amazonaws.com/2017/10/10/59dd16a31387c1507661475.png'),
		// Html::img('https://onelinkspace-com-upload.s3.amazonaws.com/2017/10/10/59dd16a31387c1507661475.png'),

		// [
		// 	'background' => 'https://www.google.co.th/url?sa=i&rct=j&q=&esrc=s&source=imgres&cd=&ved=0ahUKEwiNyfi-_8nYAhVEQI8KHYI_CHkQjRwIBw&url=https%3A%2F%2Fwww.naturalnews.com%2F2017-04-07-top-10-homemade-herbicides-to-tackle-the-weeds-in-your-garden.html&psig=AOvVaw1pjayMsd-A-pfHXWi82dgE&ust=1515556883326756',
		// 	'content' => 'Test image',
		// ],
		// ['background' => 'https://www.google.co.th/imgres?imgurl=http%3A%2F%2Fanguerde.com%2Fpics%2Fmain%2F41%2F355212-natural.jpg&imgrefurl=http%3A%2F%2Fanguerde.com%2FTTF-355212-natural.html&docid=NnSRiHLvyBIcAM&tbnid=lm7OtUy-Bj4TWM%3A&vet=10ahUKEwjJoPfZ_snYAhUlTo8KHVJ8BIEQMwh6KAYwBg..i&w=2560&h=1440&bih=678&biw=1301&q=natural&ved=0ahUKEwjJoPfZ_snYAhUlTo8KHVJ8BIEQMwh6KAYwBg&iact=mrc&uact=8'],
		// ['background' => 'https://onelinkspace-com-upload.s3.amazonaws.com/2017/06/12/593e4b088d7e71497254664.png'],
		// ['background' => 'https://onelinkspace-com-upload.s3.amazonaws.com/2017/10/10/59dd16a31387c1507661475.png'],
		// ['background' => 'https://onelinkspace-com-upload.s3.amazonaws.com/2017/10/10/59dd16a31387c1507661475.png'],
		// ],
		'items' => $items,
		/*[
			[
				'background' => '',
				'content' => 'Slide 01',
			],
			[
				'background' => '',
				'content' => 'Slide 02',
			],
			[
				'background' => '',
				'content' => [
					'<h1>Title</h1>',
					'<h3>Subtitle</h3>',
					'<p>Slide 03</p>',
				],
			],
		*/
		'behaviours' => [
			'pagination',
		],
		'pluginOptions' => [
			'grabCursor' => true,
			'centeredSlides' => true,
			'spaceBetween' => 1,
			'slidesPerView' => 'auto',
			Swiper::OPTION_PAGINATION_CLICKABLE => true,
			// 'effect' => 'coverflow',
			// 'coverflow' => [
			// 	'rotate' => 50,
			// 	'stretch' => 0,
			// 	'depth' => 100,
			// 	'modifier' => 1,
			// 	'slideShadows' => true,
			// ],
		],
	]);
	?>
</div>
<?php }?>