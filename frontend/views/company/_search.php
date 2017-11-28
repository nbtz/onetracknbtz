<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\CompanySearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="company-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'company_id') ?>

    <?= $form->field($model, 'company_name') ?>

    <?= $form->field($model, 'address') ?>

    <?= $form->field($model, 'cr_date') ?>

    <?php // echo $form->field($model, 'cr_by') ?>

    <?php // echo $form->field($model, 'upd_date') ?>

    <?php // echo $form->field($model, 'upd_by') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'guid') ?>

    <?php // echo $form->field($model, 'org_id') ?>

    <?php // echo $form->field($model, 'customer_code') ?>

    <?php // echo $form->field($model, 'tax_id') ?>

    <?php // echo $form->field($model, 'company_type') ?>

    <?php // echo $form->field($model, 'country_code') ?>

    <?php // echo $form->field($model, 'contact_name') ?>

    <?php // echo $form->field($model, 'province') ?>

    <?php // echo $form->field($model, 'district') ?>

    <?php // echo $form->field($model, 'postal_code') ?>

    <?php // echo $form->field($model, 'fax') ?>

    <?php // echo $form->field($model, 'phone_number') ?>

    <?php // echo $form->field($model, 'website') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
