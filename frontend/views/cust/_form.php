<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Cust */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cust-form">

    <?php $form = ActiveForm::begin();?>

    <?=$form->field($model, 'cust_code')->textInput(['maxlength' => true])?>

    <?=$form->field($model, 'cust_name')->textInput(['maxlength' => true])?>
    <?=$form->field($model, 'cust_type_id')->textInput()?>

    <?=$form->field($model, 'sts_id')->textInput()?>

    <?=$form->field($model, 'tel_m')->textInput(['maxlength' => true])?>

    <?=$form->field($model, 'email')->textInput(['maxlength' => true])?>

    <?=$form->field($model, 'lat')->textInput()?>

    <?=$form->field($model, 'lng')->textInput()?>

    <?php //=$form->field($model, 'app_code')->textInput(['maxlength' => true])?>

    <?php //=$form->field($model, 'type_id')->textInput()?>

    <?php //=$form->field($model, 'refno')->textInput(['maxlength' => true])?>


    <?php //=$form->field($model, 'guid')->textInput(['maxlength' => true])?>

    <?php //=$form->field($model, 'map_zoom_level')->textInput()?>






    <?php //=$form->field($model, 'radius')->textInput()?>

    <?php //=$form->field($model, 'the_geom')->textInput()?>

    <?php //=$form->field($model, 'admin_level1')->textInput(['maxlength' => true])?>

    <?php //=$form->field($model, 'admin_level2')->textInput(['maxlength' => true])?>


    <?php //=$form->field($model, 'admin_level1_id')->textInput()?>

    <?php //=$form->field($model, 'admin_level2_id')->textInput()?>

    <?php //=$form->field($model, 'last_chk_in')->textInput()?>


    <div class="form-group">
        <?=Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary'])?>
    </div>

    <?php ActiveForm::end();?>

</div>
