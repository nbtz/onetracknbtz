<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Province */

$this->title = $model->gid;
$this->params['breadcrumbs'][] = ['label' => 'Provinces', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="province-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->gid], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->gid], [
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
            'gid',
            'tambon_e',
            'tambon_t',
            'the_geom',
            'amphurid',
            'provinceid',
            'i_province',
            'i_amphur',
            'i_tumbon',
            'i_code',
            'province_t',
            'province_e',
            'amphur_t',
            'amphur_e',
            'o_province',
            'o_amphur',
            'o_tumbon',
            'n_province',
            'n_amphur',
            'n_tumbon',
            'bbox',
            'lat',
            'lng',
            'region',
            'subzone',
            'slevel',
            'simg',
            'surl:url',
            'n_geom',
            'n_point',
            'nsew',
            'skml',
            'n_xyz',
            'o_xyz',
            'n_gid',
            'substs',
            'is_geom',
            'is_th',
            'srctype',
            'srckey',
            'dtcreate',
        ],
    ]) ?>

</div>
