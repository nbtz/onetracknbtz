<?php

use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $searchModel common\models\BuSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('team', 'Bus');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bu-index">

    <h1 class="page-header"><?=Html::encode($this->title)?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <div class="panel panel-inverse">
        <div class="panel-heading">
            <div class="panel-heading-btn">
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
            </div>
            <h4 class="panel-title"><?=Yii::t('team', 'Create Bu')?></h4>
        </div>
        <div class="panel-body">
            <?php $form = ActiveForm::begin(['action' => ['index'], 'method' => 'post']);?>

                <?=$form->field($model, 'bu_name')->textInput(['maxlength' => true])?>

                <div class="form-group">
                    <?=Html::submitButton(Yii::t('main', 'Search'), ['class' => 'btn btn-primary'])?>
                </div>
            <?php ActiveForm::end();?>
        </div>
    </div>
<?php if (Yii::$app->session->hasFlash('alert')): ?>
        <?=\yii\bootstrap\Alert::widget([
	'body' => ArrayHelper::getValue(Yii::$app->session->getFlash('alert'), 'body'),
	'options' => ArrayHelper::getValue(Yii::$app->session->getFlash('alert'), 'options'),
])?>
    <?php endif;?>

    <div class="panel panel-inverse">
        <div class="panel-heading">
            <div class="panel-heading-btn">
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
            </div>
            <h4 class="panel-title"><?=Yii::t('team', 'List Team')?></h4>
        </div>
        <div class="panel-body">
            <?=GridView::widget([
	'dataProvider' => $dataProvider,
	'filterModel' => $searchModel,
	'columns' => [
		['class' => 'yii\grid\SerialColumn'],

		// 'id',
		'bu_name',
		//
		'upd_by',
		// 'company_id',
		// 'createdAtWithFormat',
		// 'upd_date',
		[
			'attribute' => Yii::t('team', 'Count User of team'),
			'format' => 'raw',
			'value' => function ($model) {
				return $this->render('view_users', ['model' => $model]);
				// return Html::a($model->countUsers, ['bu/myteam', 'id' => $model->id], ['class' => 'btn btn-success', 'id' => 'popupModal']);
			},
		],
		// [
		// 	'attribute' => 'updatedAtWithFormat',
		// 	'format' => 'raw',
		// ],
		'updatedAtWithFormat',
		[
			'class' => 'yii\grid\ActionColumn',
			'template' => '{update} {delete} ',
		],
	],
]);?>
        </div>
    </div>

</div>
