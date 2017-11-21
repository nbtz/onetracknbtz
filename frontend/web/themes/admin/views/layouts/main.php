<?php
use Yii;
use yii\widgets\Breadcrumbs;
use yii\helpers\Html;

/* @var $this \yii\web\View */
/* @var $content string */


    ?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <body class="skin-blue sidebar-mini">
        <div id="page-loader" class="fade in"><span class="spinner"></span></div>
        <!-- end #page-loader -->
    
        <!-- begin #page-container -->
        <div id="page-container" class="fade page-sidebar-fixed page-header-fixed">
            <?php $this->beginBody() ?>
                <div class="wrapper">

                    <?= $this->render(
                        'header.php'
                    ) ?>

                    <?= $this->render(
                        'left.php'
                    )
                    ?>

                    <?= $this->render(
                        'content.php',
                        ['content' => $content]
                    ) ?>

                    <!-- <section class="content">
                        <?= $content ?>
                    </section> -->

                </div>

            <?php $this->endBody() ?>
        </div>
    </body>
</html>
<?php $this->endPage() ?>