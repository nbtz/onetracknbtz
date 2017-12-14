<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\UserSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'company_id') ?>

    <?= $form->field($model, 'username') ?>

    <?= $form->field($model, 'pwd') ?>

    <?= $form->field($model, 'fname') ?>

    <?php // echo $form->field($model, 'lname') ?>

    <?php // echo $form->field($model, 'postion_id') ?>

    <?php // echo $form->field($model, 'org_id') ?>

    <?php // echo $form->field($model, 'email') ?>

    <?php // echo $form->field($model, 'tel_m') ?>

    <?php // echo $form->field($model, 'pic_url') ?>

    <?php // echo $form->field($model, 'user_type_id') ?>

    <?php // echo $form->field($model, 'cr_date') ?>

    <?php // echo $form->field($model, 'cr_by') ?>

    <?php // echo $form->field($model, 'upd_date') ?>

    <?php // echo $form->field($model, 'upd_by') ?>

    <?php // echo $form->field($model, 'guid') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'active_date') ?>

    <?php // echo $form->field($model, 'expire_date') ?>

    <?php // echo $form->field($model, 'tel_code') ?>

    <?php // echo $form->field($model, 'birth_date') ?>

    <?php // echo $form->field($model, 'bu_id') ?>

    <?php // echo $form->field($model, 'users_typecom') ?>

    <?php // echo $form->field($model, 'auth_key') ?>

    <?php // echo $form->field($model, 'password_reset_token') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
