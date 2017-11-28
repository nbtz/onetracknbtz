<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\CompanySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Companies';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="company-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Company', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'company_id',
            'company_name',
            'address',
            'cr_date',
            // 'cr_by',
            // 'upd_date',
            // 'upd_by',
            // 'status',
            // 'guid',
            // 'org_id',
            // 'customer_code',
            // 'tax_id',
            // 'company_type',
            // 'country_code',
            // 'contact_name',
            // 'province',
            // 'district',
            // 'postal_code',
            // 'fax',
            // 'phone_number',
            // 'website',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
