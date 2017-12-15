<?php
use yii\helpers\Html;

frontend\assets\AppAsset::register($this);

$directoryAsset = Yii::$app->assetManager->getPublishedUrl('@web/themes/sean');
?>
<?php $this->beginPage()?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<head>
    <meta charset="utf-8">
    <title>Loginq</title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport">
    <meta content="" name="description">
    <meta content="" name="author">
    <?=Html::csrfMetaTags()?>
    <?php echo $this->head() ?>
    
</head>
<body>
<?php $this->beginBody()?>

    <div class="login bg-black animated fadeInDown">
        <!-- begin brand -->
        <div class="login-header">
            <div class="brand">
                <span class="logo"><i class="ion-ios-cloud"></i></span> <?php echo Yii::$app->name ?>
                <small>Onetrack Check-in</small>
            </div>
            <div class="icon">
                <i class="ion-ios-locked"></i>
            </div>
        </div>
        <!-- end brand -->
        <div class="login-content">
            <?php echo $content ?>
        </div>
    </div>

    <?php $this->endBody()?>
    <script>
        $(document).ready(function() {
            App.init();
            DashboardV2.init();
        });
    </script>
</body>
</html>
<?php $this->endPage()?>