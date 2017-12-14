<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Cust */

$this->title = Yii::t('cust', 'Create Cust');
$this->params['breadcrumbs'][] = ['label' => Yii::t('cust', 'Custs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cust-create">

    <h1><?=Html::encode($this->title)?></h1>

    <?=$this->render('_form', [
	'model' => $model,
])?>

</div>
