<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\CustType */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cust-type-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'type_code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'type_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'company_id')->textInput() ?>

    <?= $form->field($model, 'upd_date')->textInput() ?>

    <?= $form->field($model, 'upd_by')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cr_date')->textInput() ?>

    <?= $form->field($model, 'cr_by')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pic_url')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
