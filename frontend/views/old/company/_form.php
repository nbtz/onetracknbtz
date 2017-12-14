<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Company */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="company-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id')->textInput() ?>

    <?= $form->field($model, 'company_id')->textInput() ?>

    <?= $form->field($model, 'company_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cr_date')->textInput() ?>

    <?= $form->field($model, 'cr_by')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'upd_date')->textInput() ?>

    <?= $form->field($model, 'upd_by')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'guid')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'org_id')->textInput() ?>

    <?= $form->field($model, 'customer_code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tax_id')->textInput() ?>

    <?= $form->field($model, 'company_type')->textInput() ?>

    <?= $form->field($model, 'country_code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'contact_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'province')->textInput() ?>

    <?= $form->field($model, 'district')->textInput() ?>

    <?= $form->field($model, 'postal_code')->textInput() ?>

    <?= $form->field($model, 'fax')->textInput() ?>

    <?= $form->field($model, 'phone_number')->textInput() ?>

    <?= $form->field($model, 'website')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
