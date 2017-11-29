<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Cust */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('cust', 'Custs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cust-view">

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
		// 'usrid',
		// 'timeid',
		// 'company_id',
		'cust_code',
		'cust_name',
		// 'lat',
		// 'lng',
		// 'remark',
		// 'radius',
		// 'the_geom',
		// 'cust_type_id',
		// 'cr_date',
		// 'cr_by',
		// 'app_code',
		// 'type_id',
		// 'refno',
		// 'sts_id',
		[
			'label' => Yii::t('cust', 'Cust Type ID'),
			'value' => $model->custType->type_name,
			// 'value' => isset($model->getCustType())&&!empty($model->getCustType()) ? $model->getCustType()->type_name : Yii::t('main', 'No'),
		],
		[
			'label' => Yii::t('cust', 'Cust Type ID'),
			'value' => $model->custStatus->sts_name,
			// 'value' => isset($model->getCustStatus())&&!empty($model->getCustStatus()) ? $model->getCustStatus()->sts_name :Yii::t('main', 'No'),
		],
		// 'upd_date',
		// 'upd_by',
		// 'guid',
		// 'map_zoom_level',
		'tel_m',
		// 'admin_level1',
		// 'admin_level2',
		'email:email',
		// 'admin_level1_id',
		// 'admin_level2_id',
		// 'last_chk_in',
		//
		'createdAtWithFormat',
		'updatedAtWithFormat',
	],
])?>

</div>
