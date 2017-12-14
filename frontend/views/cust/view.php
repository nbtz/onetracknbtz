<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Cust */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Custs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cust-view">

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
            'usrid',
            'timeid',
            'company_id',
            'cust_name',
            'lat',
            'lng',
            'remark',
            'radius',
            'the_geom',
            'cust_type_id',
            'cr_date',
            'cr_by',
            'app_code',
            'type_id',
            'refno',
            'sts_id',
            'upd_date',
            'upd_by',
            'guid',
            'map_zoom_level',
            'tel_m',
            'admin_level1',
            'admin_level2',
            'email:email',
            'admin_level1_id',
            'admin_level2_id',
            'last_chk_in',
            'cust_code',
        ],
    ]) ?>

</div>
