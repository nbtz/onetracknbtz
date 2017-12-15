<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\CustType */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('cust', 'Cust Types'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cust-type-view">

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
		'id',
		'type_code',
		'type_name',
		'company_id',
		'upd_date',
		'upd_by',
		'cr_date',
		'cr_by',
		'pic_url:url',
	],
])?>

</div>
