<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\CustStatus */

$this->title = Yii::t('cust', 'Create Cust Status');
$this->params['breadcrumbs'][] = ['label' => Yii::t('cust', 'Cust Statuses'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cust-status-create">

    <h1><?=Html::encode($this->title)?></h1>

    <?=$this->render('_form', [
	'model' => $model,
])?>

</div>
