<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\CustType */

$this->title = Yii::t('cust', 'Update Cust Type') . ': ' . $model->type_name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('cust', 'Cust Types'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->type_name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('main', 'Update');
?>
<div class="cust-type-update">

    <h1><?=Html::encode($this->title)?></h1>

    <?=$this->render('_form', [
	'model' => $model,
])?>

</div>
