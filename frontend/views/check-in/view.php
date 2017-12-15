<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\CheckIn */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Check Ins', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="check-in-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'uuid',
            'usrid',
            'cust_id',
            'lat',
            'lng',
            'timeid',
            'refno',
            'company_id',
            'what_id',
            'who_name',
            'remark',
            'upd_date',
            'upd_by',
            'in_time',
            'out_time',
            'cust_type_id',
            'chk_status',
            'cust_name',
            'cust_lat',
            'cust_lng',
            'in_lat',
            'in_lng',
            'out_lat',
            'out_lng',
            'chk_time',
            'guid',
            'what_name',
            'chk_type',
            'cust_sts_id',
        ],
    ]) ?>

</div>
