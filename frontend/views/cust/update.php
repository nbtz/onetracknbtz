<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Cust */

$this->title = Yii::t('cust', 'Update Cust') . ': ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('cust', 'Custs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('main', 'Update');
?>
<div class="cust-update">

    <h1><?=Html::encode($this->title)?></h1>

    <?=$this->render('_form', [
	'model' => $model,
])?>

</div>
