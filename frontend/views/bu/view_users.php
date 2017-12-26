<?php

use common\models\UserSearch;
use yii\bootstrap\Modal;
use yii\grid\GridView;

?>

<?php
Modal::begin([
	'header' => '<h2>List Users</h2>',
	'toggleButton' => ['label' => $model->countUsers, 'class' => 'btn btn-primary btn-sm'],
	// 'options' => ['size' => 'modal-lg', 'class' => 'modal-lg'],
	'size' => Modal::SIZE_LARGE,
]);

// echo 'Say hello...' . $model->id;
?>
<!-- // echo 'Say hello...' . $model->id; -->

<div class="user-index">


	<?php
$searchModel2 = new UserSearch();
$searchModel2->bu_id = $model->id;
if (isset(\Yii::$app->user->identity->company->id) && !empty(\Yii::$app->user->identity->company->id)) {
	$searchModel2->company_id = \Yii::$app->user->identity->company->id;
}
$dataProvider2 = $searchModel2->search(\Yii::$app->request->queryParams);
$dataProvider2->query->andFilterWhere(['status' => 1])->orFilterWhere(['status' => "Y"]);

?>


	<?=GridView::widget([
	'dataProvider' => $dataProvider2,
	// 'filterModel' => $searchModel,
	'columns' => [
		['class' => 'yii\grid\SerialColumn'],
		'fname',
		'lname',
		'tel_m',
		'email',
		'birth_date',
	],
]);?>

</div>
<?php
Modal::end();
?>