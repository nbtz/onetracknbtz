<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\CheckInSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Check Ins';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="check-in-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Check In', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'uuid',
            'usrid',
            'cust_id',
            'lat',
            // 'lng',
            // 'timeid',
            // 'refno',
            // 'company_id',
            // 'what_id',
            // 'who_name',
            // 'remark',
            // 'upd_date',
            // 'upd_by',
            // 'in_time',
            // 'out_time',
            // 'cust_type_id',
            // 'chk_status',
            // 'cust_name',
            // 'cust_lat',
            // 'cust_lng',
            // 'in_lat',
            // 'in_lng',
            // 'out_lat',
            // 'out_lng',
            // 'chk_time',
            // 'guid',
            // 'what_name',
            // 'chk_type',
            // 'cust_sts_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
