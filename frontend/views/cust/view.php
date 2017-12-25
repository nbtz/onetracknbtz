<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Cust */

$this->title = $model->cust_name;
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
    <div class="panel panel-inverse">
        <div class="panel-heading">
            <div class="panel-heading-btn">
                <!-- <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a> -->
                <!-- <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a> -->
                <!-- <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a> -->
                <!-- <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a> -->
            </div>
            <h4 class="panel-title"><?=Yii::t('cust', 'Custs')?></h4>
        </div>
        <div class="panel-body">
    <?=DetailView::widget([
	'model' => $model,
	'attributes' => [
		// 'id',
		'cust_code',
		// 'usrid',
		// 'timeid',
		'company.company_name',
		// 'company_id',
		'cust_name',
		// 'the_geom',
		// 'cust_type_id',
		[
			'label' => Yii::t('cust', 'Cust Type ID'),
			// 'value' => $model->custType->type_name,
			'value' => isset($model->custType->type_name) && !empty($model->custType->type_name) ? $model->custType->type_name : '-',
		],
		[
			'label' => Yii::t('cust', 'Sts ID'),
			// 'value' => $model->custStatus->sts_name,
			'value' => isset($model->custStatus->sts_name) && !empty($model->custStatus->sts_name) ? $model->custStatus->sts_name : '-',
		],
		'email:email',
		'tel_m',
		'admin_level1',
		'admin_level2',
		'lat',
		'lng',
		// 'remark',
		// 'radius',
		// 'app_code',
		// 'type_id',
		// 'refno',
		// 'guid',
		'map_zoom_level',
		// 'admin_level1_id',
		// 'admin_level2_id',
		'last_chk_in',
		'createdAtWithFormat',
		'cr_by',
		'updatedAtWithFormat',
		'upd_by',
		[
			'label' => Yii::t('cust', 'Pic Url'),
			'format' => 'raw',
			'value' => Html::img($model->getImage()),
			// 'value' => $model->getImage(),
		],
	],
])?>
		</div>
	</div>
</div>
