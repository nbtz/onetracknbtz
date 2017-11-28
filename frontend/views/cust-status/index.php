<?php

use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $searchModel common\models\CustStatusSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Cust Statuses';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cust-status-index">

    <h1><?=Html::encode($this->title)?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <!-- upload file image -->
    <div class="row">
        <div class="col-md-6">
            <?php $form = ActiveForm::begin(['action' => ['index'],
	'method' => 'post']);?>

                <?=$form->field($model, 'code')->textInput(['maxlength' => true])?>

                <?=$form->field($model, 'sts_name')->textInput(['maxlength' => true])?>
                <div class="form-group">
                    <?=Html::submitButton('Create', ['class' => 'btn btn-success'])?>
                </div>

            <?php ActiveForm::end();?>
        </div>
    </div>
    <p>
        <?php //=Html::a('Create Cust Status', ['create'], ['class' => 'btn btn-success'])?>
    </p>
    <?=GridView::widget([
	'dataProvider' => $dataProvider,
	'filterModel' => $searchModel,
	'columns' => [
		['class' => 'yii\grid\SerialColumn'],

		// 'id',
		'code',
		'sts_name',
		'createdAtWithFormat',
		'updatedAtWithFormat',
		// 'company_id',
		// 'upd_date',
		// 'upd_by',
		// 'cr_date',
		// 'cr_by',
		// 'pic_url:url',

		['class' => 'yii\grid\ActionColumn'],
	],
]);?>
</div>
