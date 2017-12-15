<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\CheckIn */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="check-in-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'uuid')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'usrid')->textInput() ?>

    <?= $form->field($model, 'cust_id')->textInput() ?>

    <?= $form->field($model, 'lat')->textInput() ?>

    <?= $form->field($model, 'lng')->textInput() ?>

    <?= $form->field($model, 'timeid')->textInput() ?>

    <?= $form->field($model, 'refno')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'company_id')->textInput() ?>

    <?= $form->field($model, 'what_id')->textInput() ?>

    <?= $form->field($model, 'who_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'remark')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'upd_date')->textInput() ?>

    <?= $form->field($model, 'upd_by')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'in_time')->textInput() ?>

    <?= $form->field($model, 'out_time')->textInput() ?>

    <?= $form->field($model, 'cust_type_id')->textInput() ?>

    <?= $form->field($model, 'chk_status')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cust_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cust_lat')->textInput() ?>

    <?= $form->field($model, 'cust_lng')->textInput() ?>

    <?= $form->field($model, 'in_lat')->textInput() ?>

    <?= $form->field($model, 'in_lng')->textInput() ?>

    <?= $form->field($model, 'out_lat')->textInput() ?>

    <?= $form->field($model, 'out_lng')->textInput() ?>

    <?= $form->field($model, 'chk_time')->textInput() ?>

    <?= $form->field($model, 'guid')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'what_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'chk_type')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cust_sts_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
