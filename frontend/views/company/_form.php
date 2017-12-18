<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Company */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="company-form">
    <div class="panel panel-inverse">
        <div class="panel-heading">
            <div class="panel-heading-btn">
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
            </div>
            <h4 class="panel-title"><?=Yii::t('company', 'Update Company')?></h4>
        </div>
        <div class="panel-body">

            <?php $form = ActiveForm::begin();?>


            <?=$form->field($model, 'company_id')->textInput()?>

            <?=$form->field($model, 'company_name')->textInput(['maxlength' => true])?>

            <?=$form->field($model, 'company_type')->textInput()?>

            <?=$form->field($model, 'contact_name')->textInput(['maxlength' => true])?>

            <?=$form->field($model, 'address')->textInput(['maxlength' => true])?>

            <?=$form->field($model, 'province')->textInput()?>

            <?=$form->field($model, 'district')->textInput()?>

            <?=$form->field($model, 'postal_code')->textInput()?>

            <?=$form->field($model, 'country_code')->textInput(['maxlength' => true])?>

            <?=$form->field($model, 'phone_number')->textInput()?>

            <?=$form->field($model, 'fax')->textInput()?>

            <?=$form->field($model, 'website')->textInput(['maxlength' => true])?>

            <div class="form-group">
                <?=Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary'])?>
            </div>

            <?php ActiveForm::end();?>
        </div>
    </div>

</div>
