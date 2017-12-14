<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\User */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-view">

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
            'company_id',
            'username',
            'fname',
            'lname',
            'pwd',
            'postion_id',
            'org_id',
            'email:email',
            'tel_m',
            'pic_url:url',
            'user_type_id',
            'cr_date',
            'cr_by',
            'upd_date',
            'upd_by',
            'guid',
            'status',
            'active_date',
            'expire_date',
            'tel_code',
            'birth_date',
            'bu_id',
            'users_typecom',
        ],
    ]) ?>

</div>
