<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\CustType */

$this->title = Yii::t('cust', 'Create Cust Type');
$this->params['breadcrumbs'][] = ['label' => Yii::t('cust', 'Cust Types'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cust-type-create">

    <h1><?=Html::encode($this->title)?></h1>

    <?=$this->render('_form', [
	'model' => $model,
])?>

</div>
