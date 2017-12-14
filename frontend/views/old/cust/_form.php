<?php
use common\models\CustStatus;
use common\models\CustType;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Cust */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cust-form row">
    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]);?>

    <div class="col-md-8">

        <div class="row">
            <div class="col-sm-6"><?=$form->field($model, 'cust_code')->textInput(['maxlength' => true])?></div>
            <div class="col-sm-6"><?=$form->field($model, 'cust_name')->textInput(['maxlength' => true])?></div>
        </div>




        <div class="row">
            <div class="col-sm-6">
                <?php
$custTypeList = ArrayHelper::map(CustType::find()->all(), 'id', 'type_name');
?>
                <?=$form->field($model, 'cust_type_id')->dropDownList($custTypeList, [
	'prompt' => '... Select ...',
])?>
            </div>
            <div class="col-sm-6">
                <?php
$custStatusList = ArrayHelper::map(CustStatus::find()->all(), 'id', 'sts_name');
?>

            <?=$form->field($model, 'sts_id')->dropDownList($custStatusList, [
	'prompt' => '... Select ...',
])?>
            </div>
        </div>



        <div class="row">
            <div class="col-sm-6"><?=$form->field($model, 'tel_m')->textInput(['maxlength' => true])?></div>
            <div class="col-sm-6"><?=$form->field($model, 'email')->textInput(['maxlength' => true])?></div>
        </div>




        <div class="row">
            <div class="col-sm-6"><?php //=$form->field($model, 'lat')->textInput()?></div>
            <div class="col-sm-6"><?php //=$form->field($model, 'lng')->textInput()?></div>
        </div>




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



    </div>
    <div class="col-md-4">
        <div class="row">
            <div class="col-sm-7 col-md-12">
                <div class="box-display-image">
                    <?=Html::img($model->getUrlDisplay());?>
                </div>
                <div class="">
                     <?=$form->field($model, 'imageFile')->fileInput()?>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-3 offset-sm-3 col-md-12">

        <div class="form-group text-center">
            <?=Html::submitButton($model->isNewRecord ? Yii::t('main', 'Create') : Yii::t('main', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary'])?>
        </div>
    </div>


    <?php ActiveForm::end();?>
</div>
