<?php
use yii\bootstrap\Modal;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<?php
Modal::begin([
	'header' => '<h2>เพิ่มผู้ประสานงาน</h2>',
	'toggleButton' => ['label' => 'เพิ่มผู้ประสานงาน', 'class' => 'btn btn-primary'],
	// 'options' => ['size' => 'modal-lg', 'class' => 'modal-lg'],
	'size' => Modal::SIZE_LARGE,
]);

// echo 'Say hello...' . $model->id;
?>
<?php $form = ActiveForm::begin(['id' => 'contact-from', 'action' => ['/cust/update', 'id' => $id]]);?>

      <?=$form->field($modelContact, 'contact_name')->textInput(['maxlength' => true])?>
      <?=$form->field($modelContact, 'position')->textInput(['maxlength' => true])?>
      <?=$form->field($modelContact, 'email')->textInput(['maxlength' => true])?>
      <?=$form->field($modelContact, 'tel_h')->textInput(['maxlength' => true])?>
      <?=$form->field($modelContact, 'tel_m')->textInput(['maxlength' => true])?>
      <?=$form->field($modelContact, 'remark')->textInput(['maxlength' => true])?>
      <!-- <div class="row">
          <div class="col-sm-6"></div>
      </div> -->
      <div class="form-group">
            <?=Html::submitButton(Yii::t('main', 'Create'), ['class' => 'btn btn-primary '])?>
      </div>

<?php ActiveForm::end();?>

<?php
Modal::end();
?>