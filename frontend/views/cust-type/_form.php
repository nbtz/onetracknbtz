<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\CustType */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cust-type-form">
    <div class="row">
        <div class="col-md-7">
            <?php $form = ActiveForm::begin();?>

            <?=$form->field($model, 'type_code')->textInput(['maxlength' => true])?>

            <?=$form->field($model, 'type_name')->textInput(['maxlength' => true])?>

            <div class="form-group">
                <?=Html::submitButton($model->isNewRecord ? Yii::t('main', 'Create') : Yii::t('main', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary'])?>
            </div>

            <?php ActiveForm::end();?>
        </div>
    </div>
</div>