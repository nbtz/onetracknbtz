<?php

use kartik\depdrop\DepDrop;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $searchModel common\models\CompanySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('company', 'Companies');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="company-index">

    <h1 class="page-header"><?=Html::encode($this->title)?></h1>
<?php
// if (isset(Yii::$app->user->identity->id) && !empty(Yii::$app->user->identity->company->id)) {
// show data company
// } else {
?>
    <div class="row">
        <div class="col-sm-4">
            <div class="panel panel-inverse">
                <div class="panel-heading">
                    <div class="panel-heading-btn">
                        <!-- <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a> -->
                        <!-- <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a> -->
                        <!-- <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a> -->
                        <!-- <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a> -->
                    </div>
                    <h4 class="panel-title"><?=Yii::t('company', 'Code Company')?></h4>
                </div>
                <div class="panel-body">
                    <?php $form = ActiveForm::begin(['id' => 'code_form']);?>

                            <?=$form->field($modelForm, 'code')->textInput(['maxlength' => true])?>

                    <div class="form-group text-center">
                        <?=Html::submitButton(Yii::t('main', 'Create'), ['class' => 'btn btn-primary'])?>
                    </div>

                    <?php ActiveForm::end();?>


                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="panel panel-inverse">
                <div class="panel-heading">
                    <div class="panel-heading-btn">
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                    </div>
                    <h4 class="panel-title"><?=Yii::t('company', 'Create Company')?></h4>
                </div>
                <div class="panel-body">

                    <?php $form = ActiveForm::begin(['id' => 'company_form']);?>

                    <?php //=$form->field($model, 'company_id')->textInput()?>

                    <?=$form->field($model, 'company_name')->textInput(['maxlength' => true])?>
                    <p class="text-gray">(เช่น บริษัท AccountingToday.co.th จำกัด)</p>
                    <?=$form->field($model, 'company_type')->textInput()?>

                    <?=$form->field($model, 'contact_name')->textInput(['maxlength' => true])?>

                    <?=$form->field($model, 'address')->textarea(['rows' => '6'])?>
                    <p class="text-gray">(ในช่องที่อยู่ไม่ต้องระบุอำเภอ จังหวัด และรหัสไปรษณีย์ กรุณาระบุในช่องจังหวัด อำเภอ และรหัสไปรษณีย์ด้านล่างนี้)</p>

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
                    <p class="text-gray"></p>

                    <?=$form->field($model, 'fax')->textInput()?>
                    <p class="text-gray"></p>

                    <?=$form->field($model, 'website')->textInput(['maxlength' => true])?>
                    <p class="text-gray">( เช่น http://www.onelink.co.th )</p>

                    <div class="form-group">
                        <?=Html::submitButton(Yii::t('main', 'Create'), ['class' => 'btn btn-primary'])?>
                    </div>

                    <?php ActiveForm::end();?>

                </div>
            </div>
        </div>
    </div>

<?php
// }
?>
</div>
