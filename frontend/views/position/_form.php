<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Position */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="position-form">
    <div class="panel panel-inverse">
        <div class="panel-heading">
            <div class="panel-heading-btn">
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                <!-- <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a> -->
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
            </div>
            <h4 class="panel-title"><?=Yii::t('cust', 'Create Cust Status')?></h4>
        </div>
        <div class="panel-body">
            <?php $form = ActiveForm::begin();?>


            <?=$form->field($model, 'postion_name')->textInput(['maxlength' => true])?>


            <?=$form->field($model, 'status')->textInput(['maxlength' => true])?>

            <div class="form-group">
                <?=Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary'])?>
            </div>


             <?php ActiveForm::end();?>
         </div>
     </div>

</div>
