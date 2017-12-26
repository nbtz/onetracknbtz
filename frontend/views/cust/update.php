<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Cust */

$this->title = Yii::t('cust', 'Update Cust') . ': ' . $model->cust_name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('cust', 'Custs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->cust_name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('main', 'Update');
?>
<div class="cust-update">

    <h1><?=Html::encode($this->title)?></h1>

    <?=$this->render('_form', [
	'model' => $model,
	'modelContact' => $modelContact,
	'dataProviderContact' => $dataProviderContact,
])?>

</div>
