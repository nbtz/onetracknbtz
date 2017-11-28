<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\CustStatus */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Cust Statuses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cust-status-view">

    <h1><?=Html::encode($this->title)?></h1>

    <p>
        <?=Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary'])?>
        <?=Html::a('Delete', ['delete', 'id' => $model->id], [
	'class' => 'btn btn-danger',
	'data' => [
		'confirm' => 'Are you sure you want to delete this item?',
		'method' => 'post',
	],
])?>
    </p>

    <?=DetailView::widget([
	'model' => $model,
	'attributes' => [
		// 'id',
		'code',
		'sts_name',
		// 'company_id',
		// 'upd_date',
		// 'upd_by',
		// 'cr_date',
		// 'cr_by',
		// 'pic_url:url',
		'createdAtWithFormat',
		'updatedAtWithFormat',
	],
])?>

</div>
