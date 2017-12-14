<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\CustStatusSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Cust Statuses';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cust-status-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Cust Status', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'code',
            'sts_name',
            'company_id',
            'upd_date',
            // 'upd_by',
            // 'cr_date',
            // 'cr_by',
            // 'pic_url:url',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
