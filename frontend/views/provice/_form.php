<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Province */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="province-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'gid')->textInput() ?>

    <?= $form->field($model, 'tambon_e')->textInput() ?>

    <?= $form->field($model, 'tambon_t')->textInput() ?>

    <?= $form->field($model, 'the_geom')->textInput() ?>

    <?= $form->field($model, 'amphurid')->textInput() ?>

    <?= $form->field($model, 'provinceid')->textInput() ?>

    <?= $form->field($model, 'i_province')->textInput() ?>

    <?= $form->field($model, 'i_amphur')->textInput() ?>

    <?= $form->field($model, 'i_tumbon')->textInput() ?>

    <?= $form->field($model, 'i_code')->textInput() ?>

    <?= $form->field($model, 'province_t')->textInput() ?>

    <?= $form->field($model, 'province_e')->textInput() ?>

    <?= $form->field($model, 'amphur_t')->textInput() ?>

    <?= $form->field($model, 'amphur_e')->textInput() ?>

    <?= $form->field($model, 'o_province')->textInput() ?>

    <?= $form->field($model, 'o_amphur')->textInput() ?>

    <?= $form->field($model, 'o_tumbon')->textInput() ?>

    <?= $form->field($model, 'n_province')->textInput() ?>

    <?= $form->field($model, 'n_amphur')->textInput() ?>

    <?= $form->field($model, 'n_tumbon')->textInput() ?>

    <?= $form->field($model, 'bbox')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'lat')->textInput() ?>

    <?= $form->field($model, 'lng')->textInput() ?>

    <?= $form->field($model, 'region')->textInput() ?>

    <?= $form->field($model, 'subzone')->textInput() ?>

    <?= $form->field($model, 'slevel')->textInput() ?>

    <?= $form->field($model, 'simg')->textInput() ?>

    <?= $form->field($model, 'surl')->textInput() ?>

    <?= $form->field($model, 'n_geom')->textInput() ?>

    <?= $form->field($model, 'n_point')->textInput() ?>

    <?= $form->field($model, 'nsew')->textInput() ?>

    <?= $form->field($model, 'skml')->textInput() ?>

    <?= $form->field($model, 'n_xyz')->textInput() ?>

    <?= $form->field($model, 'o_xyz')->textInput() ?>

    <?= $form->field($model, 'n_gid')->textInput() ?>

    <?= $form->field($model, 'substs')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'is_geom')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'is_th')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'srctype')->textInput() ?>

    <?= $form->field($model, 'srckey')->textInput() ?>

    <?= $form->field($model, 'dtcreate')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
