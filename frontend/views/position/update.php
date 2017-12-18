<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Position */

$this->title = Yii::t('position', 'Update Position') . ': ' . $model->postion_name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('position', 'Positions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->postion_name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('main', 'Update');
?>
<div class="position-update">

    <h1><?=Html::encode($this->title)?></h1>

    <?=$this->render('_form', [
	'model' => $model,
])?>

</div>
