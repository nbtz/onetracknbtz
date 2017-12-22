<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\User */

$this->title = $model->username;
$this->params['breadcrumbs'][] = ['label' => Yii::t('user', 'Users'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-view">

    <h1><?=Html::encode($this->title)?></h1>

    <p>
        <?=Html::a(Yii::t('main', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary'])?>
        <?=Html::a(Yii::t('main', 'Delete'), ['delete', 'id' => $model->id], [
	'class' => 'btn btn-danger',
	'data' => [
		'confirm' => Yii::t('main', 'Are you sure you want to delete this item?'),
		'method' => 'post',
	],
])?>
    </p>

    <?=DetailView::widget([
	'model' => $model,
	'attributes' => [
		// 'id',
		// 'company_id',
		'company.company_name',
		'username',
		'fname',
		'lname',
		// 'pwd',
		// 'postion_id',
		[
			'label' => Yii::t('user', 'Postion ID'),
			// 'value' => $model->position->position_name,
			'value' => isset($model->postion->postion_name) && !empty($model->postion->postion_name) ? $model->postion->postion_name : '-',
		],
		// 'org_id',
		'email:email',
		'tel_code',
		'tel_m',
		'birth_date',
		// 'bu_id',
		[
			'label' => Yii::t('user', 'Bu ID'),
			'value' => isset($model->team->bu_name) && !empty($model->team->bu_name) ? $model->team->bu_name : '-',
		],
		'pic_url:url',
		// 'user_type_id',
		// 'guid',
		// 'status',
		[
			'label' => Yii::t('user', 'Status'),
			'value' => $model->status == 1 ? 'Active' : 'Pending',
		],
		'active_date',
		'expire_date',
		// 'users_typecom',
		'cr_date',
		'cr_by',
		'upd_date',
		'upd_by',
		[
			'label' => Yii::t('cust', 'Pic Url'),
			'format' => 'raw',
			'value' => isset($model->pic_url) && !empty($model->pic_url) ? Html::img($model->pic_url) : '-',
		],
	],
])?>

</div>
