<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\CustStatus */

$this->title = Yii::t('cust', 'Update Cust Status') . ': ' . $model->code;
$this->params['breadcrumbs'][] = ['label' => Yii::t('cust', 'Cust Statuses'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->code, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('main', 'Update');
?>
<div class="cust-status-update">

    <h1><?=Html::encode($this->title)?></h1>

    <?=$this->render('_form', [
	'model' => $model,
])?>

</div>
