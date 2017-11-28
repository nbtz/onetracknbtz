<?php

use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $searchModel common\models\CustTypeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Cust Types';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cust-type-index">

    <h1><?=Html::encode($this->title)?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <div class="row">
        <div class="col-md-6">
            <?php $form = ActiveForm::begin(['action' => ['index'],
	'method' => 'post']);?>

                <?=$form->field($model, 'type_code')->textInput(['maxlength' => true])?>

                <?=$form->field($model, 'type_name')->textInput(['maxlength' => true])?>

                <div class="form-group">
                    <?=Html::submitButton('Create', ['class' => 'btn btn-success'])?>
                </div>

            <?php ActiveForm::end();?>
        </div>
    </div>
    <p>
        <?php //= Html::a('Create Cust Type', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?=GridView::widget([
	'dataProvider' => $dataProvider,
	'filterModel' => $searchModel,
	'columns' => [
		['class' => 'yii\grid\SerialColumn'],

		// 'id',
		'type_code',
		'type_name',
		// 'company_id',
		// 'upd_date',
		// 'upd_by',
		// 'cr_date',
		// 'cr_by',
		// 'pic_url:url',
		'createdAtWithFormat',
		'updatedAtWithFormat',

		['class' => 'yii\grid\ActionColumn'],
	],
]);?>
</div>
