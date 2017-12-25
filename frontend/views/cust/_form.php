<?php
use common\models\CustStatus;
use common\models\CustType;
use kartik\depdrop\DepDrop;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Cust */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cust-form">

    <div class="panel panel-inverse">

        <div class="panel-heading">
            <div class="panel-heading-btn">
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                <!-- <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a> -->
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
            </div>
            <h4 class="panel-title"><?=Yii::t('cust', 'Update Cust')?></h4>
        </div>
        <div class="panel-body">
            <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]);?>

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
	'prompt' => Yii::t('main', '... Select ...'),
])?>
                </div>
                <div class="col-sm-6">
                    <?php
$custStatusList = ArrayHelper::map(CustStatus::find()->all(), 'id', 'sts_name');
?>

                <?=$form->field($model, 'sts_id')->dropDownList($custStatusList, [
	'prompt' => Yii::t('main', '... Select ...'),
])?>
                </div>
            </div>



            <div class="row">
                <div class="col-sm-6"><?=$form->field($model, 'tel_m')->textInput(['maxlength' => true])?></div>
                <div class="col-sm-6"><?=$form->field($model, 'email')->textInput(['maxlength' => true])?></div>
            </div>

            <div class="row">
                <div class="col-sm-6">
                    <?php
$connection = Yii::$app->pgsql;
$connection->open();

$command = $connection->createCommand('SELECT DISTINCT ON (i_province) i_province, province_t FROM admin_tumbon');
$regionList = ArrayHelper::map($command->queryAll(), 'i_province', 'province_t');
// print_r($regionList);
?>
                    <?=$form->field($model, 'admin_level1')->dropDownList($regionList, ['id' => 'cat-id', 'prompt' => Yii::t('main', '... Select ...')]);?>
                </div>
                <div class="col-sm-6">
                    <?=$form->field($model, 'admin_level2')->widget(DepDrop::classname(), [
	'options' => ['id' => 'subcat-id'],
	'pluginOptions' => [
		'depends' => ['cat-id'],
		'placeholder' => Yii::t('main', '... Select ...'),
		'url' => Url::to(['/province/subcat']),
	],
]);?>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-6"><?php //=$form->field($model, 'lat')->textInput()?></div>
                <div class="col-sm-6"><?php //=$form->field($model, 'lng')->textInput()?></div>
            </div>

            <div class="row">
                <div class="col-sm-6">

                     <?=$form->field($model, 'imageFile')->fileInput()?>
                </div>
                <div class="col-sm-6 box-image"><?php
// if (isset($model->getImage()) && !empty($model->getImage())) {
echo Html::img($model->getImage());
// }
 ?></div>
            </div>

             <div class="row">
                <div class="col-sm-6"></div>
                <div class="col-sm-6"></div>
            </div>

            <div class="form-group text-center">
                <?=Html::submitButton($model->isNewRecord ? Yii::t('main', 'Create') : Yii::t('main', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary'])?>
            </div>

            <?php ActiveForm::end();?>

        </div>
    </div>
</div>
