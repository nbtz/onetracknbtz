<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\CustStatus */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cust-status-form">

    <?php $form = ActiveForm::begin();?>

    <?=$form->field($model, 'code')->textInput(['maxlength' => true])?>

    <?=$form->field($model, 'sts_name')->textInput(['maxlength' => true])?>

    <div class="form-group">
        <?=Html::submitButton($model->isNewRecord ? Yii::t('main', 'Create') : Yii::t('main', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary'])?>
    </div>

    <?php ActiveForm::end();?>

</div>
