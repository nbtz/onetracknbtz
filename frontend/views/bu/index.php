<?php

use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $searchModel common\models\BuSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('team', 'Bus');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bu-index">

    <h1><?=Html::encode($this->title)?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <div class="team-create row">
        <div class="col-md-6">
            <?php $form = ActiveForm::begin(['action' => ['index'],
	'method' => 'post']);?>

                <?=$form->field($modelTeam, 'bu_name')->textInput(['maxlength' => true])?>

                <div class="form-group">
                    <?=Html::submitButton(Yii::t('main', 'Create'), ['class' => 'btn btn-success'])?>
                </div>
            <?php ActiveForm::end();?>
        </div>
    </div>

    <p>
        <?php //= Html::a('Create Bu', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?=GridView::widget([
	'dataProvider' => $dataProvider,
	'filterModel' => $searchModel,
	'columns' => [
		['class' => 'yii\grid\SerialColumn'],

		// 'id',
		'bu_name',
		// 'upd_date',
		'upd_by',
		// 'company_id',
		// 'createdAtWithFormat',
		'updatedAtWithFormat',

		[
			'class' => 'yii\grid\ActionColumn',
			'template' => '{update} {delete} ',
		],
	],
]);?>
</div>
