<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Bu */

$this->title = Yii::t('team', 'Create Bu');
$this->params['breadcrumbs'][] = ['label' => Yii::t('team', 'Bus'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bu-create">

    <h1><?=Html::encode($this->title)?></h1>

    <?=$this->render('_form', [
	'model' => $model,
])?>

</div>
