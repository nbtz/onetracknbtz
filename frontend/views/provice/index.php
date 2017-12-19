<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Provinces';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="province-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Province', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'gid',
            'tambon_e',
            'tambon_t',
            'the_geom',
            'amphurid',
            // 'provinceid',
            // 'i_province',
            // 'i_amphur',
            // 'i_tumbon',
            // 'i_code',
            // 'province_t',
            // 'province_e',
            // 'amphur_t',
            // 'amphur_e',
            // 'o_province',
            // 'o_amphur',
            // 'o_tumbon',
            // 'n_province',
            // 'n_amphur',
            // 'n_tumbon',
            // 'bbox',
            // 'lat',
            // 'lng',
            // 'region',
            // 'subzone',
            // 'slevel',
            // 'simg',
            // 'surl:url',
            // 'n_geom',
            // 'n_point',
            // 'nsew',
            // 'skml',
            // 'n_xyz',
            // 'o_xyz',
            // 'n_gid',
            // 'substs',
            // 'is_geom',
            // 'is_th',
            // 'srctype',
            // 'srckey',
            // 'dtcreate',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
