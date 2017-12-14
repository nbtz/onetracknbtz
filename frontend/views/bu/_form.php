<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Bu */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bu-form">

    <?php $form = ActiveForm::begin();?>

    <div class="row">
        <div class="col-md-7">
            <?=$form->field($model, 'bu_name')->textInput(['maxlength' => true])?>
        </div>
    </div>


    <div class="form-group">
        <?=Html::submitButton($model->isNewRecord ? Yii::t('main', 'Create') : Yii::t('main', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary'])?>
    </div>

    <?php ActiveForm::end();?>

</div>
