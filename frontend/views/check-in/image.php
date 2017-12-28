<?php

use yii\bootstrap\Modal;
use yii\helpers\Html;

?>

<?php
Modal::begin([
	'header' => '<h2>Show Image</h2>',
	'toggleButton' => ['label' => 'Image ', 'class' => 'btn btn-primary btn-md'],
	// 'options' => ['size' => 'modal-lg', 'class' => 'modal-lg'],
	'size' => Modal::SIZE_LARGE,
]);
if (isset($image)) {
	# code...
	echo Html::img($image);
} else {
	echo "<h1>Not Found!</h1>";
}

Modal::end();
?>