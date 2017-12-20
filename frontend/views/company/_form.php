<?php

use kartik\depdrop\DepDrop;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Company */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="company-form">
    <div class="panel panel-inverse">
        <div class="panel-heading">
            <div class="panel-heading-btn">
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
            </div>
            <h4 class="panel-title"><?=Yii::t('company', 'Update Company')?></h4>
        </div>
        <div class="panel-body">

            <?php $form = ActiveForm::begin();?>


            <?php //=$form->field($model, 'company_id')->textInput()?>

            <?=$form->field($model, 'company_name')->textInput(['maxlength' => true])?>

            <?=$form->field($model, 'company_type')->textInput()?>

            <?=$form->field($model, 'contact_name')->textInput(['maxlength' => true])?>

            <?=$form->field($model, 'address')->textInput(['maxlength' => true])?>

            <?php
$connection = Yii::$app->pgsql;
$connection->open();

$command = $connection->createCommand('SELECT DISTINCT ON (i_province) i_province, province_t FROM admin_tumbon');
$regionList = ArrayHelper::map($command->queryAll(), 'i_province', 'province_t');
// print_r($regionList);
?>
            <?=$form->field($model, 'province')->dropDownList($regionList, ['id' => 'cat-id', 'prompt' => Yii::t('main', '... Select ...')]);?>

            <?=$form->field($model, 'district')->widget(DepDrop::classname(), [
	'options' => ['id' => 'subcat-id'],
	'pluginOptions' => [
		'depends' => ['cat-id'],
		'placeholder' => Yii::t('main', '... Select ...'),
		'url' => Url::to(['/province/subcat']),
	],
]);?>

            <?=$form->field($model, 'postal_code')->textInput()?>

            <?php //=$form->field($model, 'country_code')->textInput(['maxlength' => true])?>

            <?=$form->field($model, 'phone_number')->textInput()?>

            <?=$form->field($model, 'fax')->textInput()?>

            <?=$form->field($model, 'website')->textInput(['maxlength' => true])?>

            <div class="form-group">
                <?=Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary'])?>
            </div>

            <?php ActiveForm::end();?>
        </div>
    </div>

</div>
