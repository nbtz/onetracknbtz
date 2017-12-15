<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>


<?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

    <?= $form->field($model, 'username')->textInput([
        'autofocus' => true, 
        'class' => 'form-control input-lg inverse-mode no-border',
        'placeholder' => 'Username'])->label(false) ?>

    <?= $form->field($model, 'password')->passwordInput([
        'class' => 'form-control input-lg inverse-mode no-border',
        'placeholder' => 'Password'])->label(false) ?>

    <?= $form->field($model, 'rememberMe')->checkbox() ?>

    <div style="color:#999;margin:1em 0">
        <!-- If you forgot your password you can <?= Html::a('reset it', ['site/request-password-reset']) ?>. -->
    </div>

    <div class="form-group">
        <?= Html::submitButton('Sign me in', ['class' => 'btn btn-primary btn-block btn-lg', 'name' => 'login-button']) ?>
    </div>

<?php ActiveForm::end(); ?>
