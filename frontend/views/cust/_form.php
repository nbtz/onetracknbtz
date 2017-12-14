<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Cust */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cust-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'usrid')->textInput() ?>

    <?= $form->field($model, 'timeid')->textInput() ?>

    <?= $form->field($model, 'company_id')->textInput() ?>

    <?= $form->field($model, 'cust_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'lat')->textInput() ?>

    <?= $form->field($model, 'lng')->textInput() ?>

    <?= $form->field($model, 'remark')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'radius')->textInput() ?>

    <?= $form->field($model, 'the_geom')->textInput() ?>

    <?= $form->field($model, 'cust_type_id')->textInput() ?>

    <?= $form->field($model, 'cr_date')->textInput() ?>

    <?= $form->field($model, 'cr_by')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'app_code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'type_id')->textInput() ?>

    <?= $form->field($model, 'refno')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sts_id')->textInput() ?>

    <?= $form->field($model, 'upd_date')->textInput() ?>

    <?= $form->field($model, 'upd_by')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'guid')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'map_zoom_level')->textInput() ?>

    <?= $form->field($model, 'tel_m')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'admin_level1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'admin_level2')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'admin_level1_id')->textInput() ?>

    <?= $form->field($model, 'admin_level2_id')->textInput() ?>

    <?= $form->field($model, 'last_chk_in')->textInput() ?>

    <?= $form->field($model, 'cust_code')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
