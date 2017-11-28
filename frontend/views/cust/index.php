<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\CustSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Custs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cust-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Cust', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'usrid',
            'timeid',
            'company_id',
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
            // 'upd_date',
            // 'upd_by',
            // 'guid',
            // 'map_zoom_level',
            // 'tel_m',
            // 'admin_level1',
            // 'admin_level2',
            // 'email:email',
            // 'admin_level1_id',
            // 'admin_level2_id',
            // 'last_chk_in',
            // 'cust_code',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
