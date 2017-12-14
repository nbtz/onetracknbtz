<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\CustType */

$this->title = 'Update Cust Type: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Cust Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="cust-type-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
