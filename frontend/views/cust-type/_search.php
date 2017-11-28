<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\CustTypeSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cust-type-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'type_code') ?>

    <?= $form->field($model, 'type_name') ?>

    <?= $form->field($model, 'company_id') ?>

    <?= $form->field($model, 'upd_date') ?>

    <?php // echo $form->field($model, 'upd_by') ?>

    <?php // echo $form->field($model, 'cr_date') ?>

    <?php // echo $form->field($model, 'cr_by') ?>

    <?php // echo $form->field($model, 'pic_url') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
