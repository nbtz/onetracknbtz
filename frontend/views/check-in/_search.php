<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\CheckInSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="check-in-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'uuid') ?>

    <?= $form->field($model, 'usrid') ?>

    <?= $form->field($model, 'cust_id') ?>

    <?= $form->field($model, 'lat') ?>

    <?php // echo $form->field($model, 'lng') ?>

    <?php // echo $form->field($model, 'timeid') ?>

    <?php // echo $form->field($model, 'refno') ?>

    <?php // echo $form->field($model, 'company_id') ?>

    <?php // echo $form->field($model, 'what_id') ?>

    <?php // echo $form->field($model, 'who_name') ?>

    <?php // echo $form->field($model, 'remark') ?>

    <?php // echo $form->field($model, 'upd_date') ?>

    <?php // echo $form->field($model, 'upd_by') ?>

    <?php // echo $form->field($model, 'in_time') ?>

    <?php // echo $form->field($model, 'out_time') ?>

    <?php // echo $form->field($model, 'cust_type_id') ?>

    <?php // echo $form->field($model, 'chk_status') ?>

    <?php // echo $form->field($model, 'cust_name') ?>

    <?php // echo $form->field($model, 'cust_lat') ?>

    <?php // echo $form->field($model, 'cust_lng') ?>

    <?php // echo $form->field($model, 'in_lat') ?>

    <?php // echo $form->field($model, 'in_lng') ?>

    <?php // echo $form->field($model, 'out_lat') ?>

    <?php // echo $form->field($model, 'out_lng') ?>

    <?php // echo $form->field($model, 'chk_time') ?>

    <?php // echo $form->field($model, 'guid') ?>

    <?php // echo $form->field($model, 'what_name') ?>

    <?php // echo $form->field($model, 'chk_type') ?>

    <?php // echo $form->field($model, 'cust_sts_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
