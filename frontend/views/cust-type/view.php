<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\CustType */

$this->title = $model->type_name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('cust', 'Cust Types'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cust-type-view">

    <h1 class="page-header"><?=Html::encode($this->title)?></h1>

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
    <div class="panel panel-inverse">
        <div class="panel-heading">
            <div class="panel-heading-btn">
                <!-- <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a> -->
                <!-- <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a> -->
                <!-- <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a> -->
                <!-- <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a> -->
            </div>
            <h4 class="panel-title"><?=Yii::t('cust', 'Cust Types')?></h4>
        </div>
        <div class="panel-body">
    <?=DetailView::widget([
	'model' => $model,
	'attributes' => [
		// 'id',
		'type_code',
		'type_name',
		// 'company_id',
		'company.company_name',

		// 'upd_date',
		// 'upd_by',
		// 'cr_date',
		'updatedAtWithFormat',
		'upd_by',
		'createdAtWithFormat',
		'cr_by',
		// 'pic_url:url',
		[
			'label' => Yii::t('cust', 'Pic Url'),
			'format' => 'raw',
			'value' => isset($model->pic_url) && !empty($model->pic_url) ? Html::img($model->pic_url) : '-',
		],
	],
])?>
		</div>
	</div>

</div>
