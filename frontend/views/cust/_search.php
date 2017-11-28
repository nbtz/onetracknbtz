<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\CustSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cust-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'usrid') ?>

    <?= $form->field($model, 'timeid') ?>

    <?= $form->field($model, 'company_id') ?>

    <?= $form->field($model, 'cust_name') ?>

    <?php // echo $form->field($model, 'lat') ?>

    <?php // echo $form->field($model, 'lng') ?>

    <?php // echo $form->field($model, 'remark') ?>

    <?php // echo $form->field($model, 'radius') ?>

    <?php // echo $form->field($model, 'the_geom') ?>

    <?php // echo $form->field($model, 'cust_type_id') ?>

    <?php // echo $form->field($model, 'cr_date') ?>

    <?php // echo $form->field($model, 'cr_by') ?>

    <?php // echo $form->field($model, 'app_code') ?>

    <?php // echo $form->field($model, 'type_id') ?>

    <?php // echo $form->field($model, 'refno') ?>

    <?php // echo $form->field($model, 'sts_id') ?>

    <?php // echo $form->field($model, 'upd_date') ?>

    <?php // echo $form->field($model, 'upd_by') ?>

    <?php // echo $form->field($model, 'guid') ?>

    <?php // echo $form->field($model, 'map_zoom_level') ?>

    <?php // echo $form->field($model, 'tel_m') ?>

    <?php // echo $form->field($model, 'admin_level1') ?>

    <?php // echo $form->field($model, 'admin_level2') ?>

    <?php // echo $form->field($model, 'email') ?>

    <?php // echo $form->field($model, 'admin_level1_id') ?>

    <?php // echo $form->field($model, 'admin_level2_id') ?>

    <?php // echo $form->field($model, 'last_chk_in') ?>

    <?php // echo $form->field($model, 'cust_code') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
