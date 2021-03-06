<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Bu */

$this->title = Yii::t('team', 'Update Bu') . ': ' . $model->bu_name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('team', 'Bus'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->bu_name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('main', 'Update');
?>
<div class="bu-update">

    <h1><?=Html::encode($this->title)?></h1>

    <?=$this->render('_form', [
	'model' => $model,
])?>

</div>
