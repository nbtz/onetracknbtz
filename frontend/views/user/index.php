<?php

use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel common\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <h1><?=Html::encode($this->title)?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php //= Html::a('Create User', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?=GridView::widget([
	'dataProvider' => $dataProvider,
	'filterModel' => $searchModel,
	'columns' => [
		['class' => 'yii\grid\SerialColumn'],

		'id',
		// 'company_id',
		'username',
		// 'pwd',
		'fname',
		'lname',
		// 'postion_id',
		// 'org_id',
		'email:email',
		'tel_m',
		// 'pic_url:url',
		// 'user_type_id',
		// 'cr_date',
		// 'cr_by',
		// 'upd_date',
		// 'upd_by',
		// 'guid',
		// 'status',
		// 'active_date',
		// 'expire_date',
		// 'tel_code',
		// 'birth_date',
		// 'bu_id',
		// 'users_typecom',
		// 'auth_key',
		// 'password_reset_token',

		['class' => 'yii\grid\ActionColumn'],
	],
]);?>
</div>
