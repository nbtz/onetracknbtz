<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">
    <div class="panel panel-inverse">
        <div class="panel-heading">
            <div class="panel-heading-btn">
                <!-- <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a> -->
                <!-- <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a> -->
                <!-- <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a> -->
                <!-- <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a> -->
            </div>
            <h4 class="panel-title"><?=Yii::t('user', 'Update User')?></h4>
        </div>
        <div class="panel-body">
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


                <div class="row">
                    <div class="col-sm-6"><?=$form->field($model, 'tel_code')->textInput(['maxlength' => true])?></div>
                    <div class="col-sm-6"><?=$form->field($model, 'tel_m')->textInput(['maxlength' => true])?></div>
                </div>

                <div class="row">
                    <div class="col-sm-6"><?=$form->field($model, 'birth_date')->textInput()?></div>
                    <div class="col-sm-6"><?=$form->field($model, 'status')->textInput(['maxlength' => true])?></div>
                </div>

                <div class="row">
                    <div class="col-sm-6"><?=$form->field($model, 'bu_id')->textInput()?></div>
                    <div class="col-sm-6"><?=$form->field($model, 'postion_id')->textInput()?></div>
                </div>


                <?=$form->field($model, 'pic_url')->textInput(['maxlength' => true])?>

                <?=$form->field($model, 'user_type_id')->textInput()?>

                <?=$form->field($model, 'users_typecom')->textInput(['maxlength' => true])?>

                <div class="form-group">
                    <?=Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary'])?>
                </div>

                <?php ActiveForm::end();?>
        </div>
    </div>

</div>
