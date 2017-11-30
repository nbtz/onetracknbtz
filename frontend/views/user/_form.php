<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin();?>

    <div class="row">
        <div class="col-sm-6"><?=$form->field($model, 'username')->textInput(['maxlength' => true])?></div>
        <div class="col-sm-6"><?=$form->field($model, 'email')->textInput(['maxlength' => true])?></div>
    </div>



    <div class="row">
        <div class="col-sm-6"><?=$form->field($model, 'pwd')->textInput(['maxlength' => true])?></div>
        <div class="col-sm-6"><?=$form->field($model, 'password_repeat')->textInput(['maxlength' => true])?></div>
    </div>



    <div class="row">
        <div class="col-sm-6"><?=$form->field($model, 'fname')->textInput(['maxlength' => true])?></div>
        <div class="col-sm-6"><?=$form->field($model, 'lname')->textInput(['maxlength' => true])?></div>
    </div>
    <?=$form->field($model, 'postion_id')->textInput()?>

    <?=$form->field($model, 'org_id')->textInput()?>



    <?=$form->field($model, 'tel_m')->textInput(['maxlength' => true])?>

    <?=$form->field($model, 'pic_url')->textInput(['maxlength' => true])?>

    <?=$form->field($model, 'user_type_id')->textInput()?>

    <?=$form->field($model, 'cr_date')->textInput()?>

    <?=$form->field($model, 'cr_by')->textInput(['maxlength' => true])?>

    <?=$form->field($model, 'upd_date')->textInput()?>

    <?=$form->field($model, 'upd_by')->textInput(['maxlength' => true])?>

    <?=$form->field($model, 'guid')->textInput(['maxlength' => true])?>

    <?=$form->field($model, 'status')->textInput(['maxlength' => true])?>

    <?=$form->field($model, 'active_date')->textInput()?>

    <?=$form->field($model, 'expire_date')->textInput()?>

    <?=$form->field($model, 'tel_code')->textInput(['maxlength' => true])?>

    <?=$form->field($model, 'birth_date')->textInput()?>

    <?=$form->field($model, 'bu_id')->textInput()?>

    <?=$form->field($model, 'users_typecom')->textInput(['maxlength' => true])?>

    <?=$form->field($model, 'auth_key')->textInput(['maxlength' => true])?>

    <?=$form->field($model, 'password_reset_token')->textInput(['maxlength' => true])?>

    <div class="form-group">
        <?=Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary'])?>
    </div>

    <?php ActiveForm::end();?>

</div>
