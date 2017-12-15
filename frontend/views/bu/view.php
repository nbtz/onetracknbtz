<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Bu */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('team', 'Bus'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bu-view">

    <h1 class="page-header"><?=Html::encode($this->title)?></h1>

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
    <div class="panel panel-inverse">
        <div class="panel-heading">
            <div class="panel-heading-btn">
                <!-- <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a> -->
                <!-- <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a> -->
                <!-- <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a> -->
                <!-- <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a> -->
            </div>
            <h4 class="panel-title"><?=Yii::t('team', 'Team')?></h4>
        </div>
        <div class="panel-body">
    <?=DetailView::widget([
	'model' => $model,
	'attributes' => [
		'id',
		'bu_name',
		'upd_date',
		'upd_by',
		'company_id',
	],
])?>
        </div>
    </div>

</div>
