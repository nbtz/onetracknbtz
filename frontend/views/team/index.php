<?php

use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $searchModel common\models\TeamSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Teams';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="team-index">

    <h1><?=Html::encode($this->title)?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <div class="team-create row">
        <div class="col-md-6">
            <?php $form = ActiveForm::begin(['action' => ['index'],
	'method' => 'post']);?>

                <?=$form->field($modelTeam, 'name')->textInput(['maxlength' => true])?>

                <div class="form-group">
                    <?=Html::submitButton('Create', ['class' => 'btn btn-success'])?>
                </div>
            <?php ActiveForm::end();?>
        </div>
    </div>
    <p>
        <?php //= Html::a('Create Team', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?=GridView::widget([
	'dataProvider' => $dataProvider,
	'filterModel' => $searchModel,
	'columns' => [
		['class' => 'yii\grid\SerialColumn'],

		// 'id',
		'name',
		// 'upd_by',
		// 'cr_date',
		// 'upd_date',
		'createdAtWithFormat',
		'updatedAtWithFormat',
		// 'cr_by',

		['class' => 'yii\grid\ActionColumn'],
	],
]);?>
</div>
