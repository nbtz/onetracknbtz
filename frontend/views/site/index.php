<?php
use kartik\tabs\TabsX;
use yii\helpers\Html;

/*$this->registerJsFile(
'@web/themes/sean/plugins/bootstrap/js/bootstrap.min.js',
['depends' => [\yii\web\JqueryAsset::className()]]
);*/
?>

<div class="part1">
    <div style="margin-bottom: 20px">
    <div class="row">
        <!-- <div class="col-md-1"></div> -->
        <div class="col-sm-5ths">
            <div class="box-sum ">
                <div class="row">
                    <div class="col-sm-8">
                        <p>ONLINE</p>
                        <b>0/59</b>
                    </div>
                    <div class="col-sm-4 box-sum-icon ">
                        <?php // =Html::img('@web/themes/admin/img/icon/Symbol 9 – 5@2x.png');?>
                        <?='<h1><i class="fa fa-podcast" aria-hidden="true"></i></h1>';?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="progress">
                            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="80"
                            aria-valuemin="0" aria-valuemax="100" style="width:80%"></div>
                        </div>
                    </div>
                </div>
                <div class="readmore right"><?=Html::a('More Detail <i class="fa fa-arrow-circle-o-right"></i>', ['#']);?></div>
            </div>
        </div>
        <div class="col-sm-5ths">
            <div class="box-sum ">
                <div class="row">
                    <div class="col-sm-8">
                        <p>Late</p>
                        <b>0</b>
                    </div>
                    <div class="col-sm-4 box-sum-icon">
                        <?php // =Html::img('@web/themes/admin/img/icon/Late-01@2x.png');?>
                        <?='<h1><i class="fa fa-clock-o" aria-hidden="true"></i></h1>';?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="progress">
                            <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="10"
                            aria-valuemin="0" aria-valuemax="100" style="width:10%"></div>
                        </div>
                    </div>
                </div>
                <div class="readmore right"><?=Html::a('More Detail <i class="fa fa-arrow-circle-o-right"></i>', ['#']);?></div>
            </div>
        </div>
        <div class="col-sm-5ths">
            <div class="box-sum ">
                <div class="row">
                    <div class="col-sm-8">
                        <p>New Check-in</p>
                        <b>0</b>
                    </div>
                    <div class="col-sm-4 box-sum-icon">
                        <?php // =Html::img('@web/themes/admin/img/icon/Icon-02@2x.png');?>
                        <?='<h1><i class="fa fa-map-marker" aria-hidden="true"></i></h1>';?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="progress">
                            <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20"
                            aria-valuemin="0" aria-valuemax="100" style="width:20%"></div>
                        </div>
                    </div>
                </div>
                <div class="readmore right"><?=Html::a('More Detail <i class="fa fa-arrow-circle-o-right"></i>', ['#']);?></div>
            </div>
        </div>
        <div class="col-sm-5ths">
            <div class="box-sum ">
                <div class="row">
                    <div class="col-sm-8">
                        <p>Month to date</p>
                        <b><?=date('d')?></b>
                    </div>
                    <div class="col-sm-4 box-sum-icon">
                        <?php // =Html::img('@web/themes/admin/img/icon/Calendar-02@2x.png');?>
                        <?='<h1><i class="fa fa-calendar" aria-hidden="true"></i></h1>';?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="progress">
                            <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="7"
                            aria-valuemin="0" aria-valuemax="100" style="width:7%"></div>
                        </div>
                    </div>
                </div>
                <div class="readmore right"><?=Html::a('More Detail <i class="fa fa-arrow-circle-o-right"></i>', ['#']);?></div>
            </div>
        </div>
        <div class="col-sm-5ths">
            <div class="box-sum ">
                <div class="row">
                    <div class="col-sm-8">
                        <p>Long time no see</p>
                        <b>0/35</b>
                    </div>
                    <div class="col-sm-4 box-sum-icon ">
                        <?php // =Html::img('@web/themes/admin/img/icon/Calendar-01@2x.png');?>
                        <?='<h1><i class="fa fa-calendar-o" aria-hidden="true"></i></h1>';?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="progress">
                            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="30"
                            aria-valuemin="0" aria-valuemax="100" style="width:30%"></div>
                        </div>
                    </div>
                </div>
                <div class="readmore right"><?=Html::a('More Detail <i class="fa fa-arrow-circle-o-right"></i>', ['#']);?></div>
            </div>
        </div>
        <!-- <div class="col-md-1"></div> -->
    </div>
    </div>
</div>

<div class="part2">
    <div class="dashboard-panel panel panel-inverse">
        <div class="panel-heading">
            <div class="panel-heading-btn">
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
            </div>
            <h4 class="panel-title"><?=Yii::t('main', 'DASHBOARD')?></h4>
        </div>
        <div class="panel-body">
            <?php
$items = [
	[
		'label' => '<i class="glyphicon glyphicon-user"></i> Week',
		'content' => $this->render('graph_week'),
		// 'linkOptions' => ['data-url' => \yii\helpers\Url::to(['/site/graph-week'])],
	],
	[
		'label' => '<i class="glyphicon glyphicon-user"></i> Month',
		'content' => $this->render('graph_month'),
		// 'linkOptions' => ['data-url' => \yii\helpers\Url::to(['/site/graph-month'])],
	],
];
echo TabsX::widget([
	'items' => $items,
	'position' => TabsX::POS_ABOVE,
	'encodeLabels' => false,
]);
?>
            <?php //echo $this->render('graph') ?>
            <?php //echo $this->render('graph2') ?>

        </div>
    </div>
</div>
<div class="part3">
    <div class="dashboard-panel panel panel-inverse">
        <div class="panel-heading">
            <div class="panel-heading-btn">
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
            </div>
            <h4 class="panel-title"><?=Yii::t('main', 'MAP')?></h4>
        </div>
        <div class="panel-body" style="padding: 0px">
            <?php echo $this->render('map') ?>
        </div>
    </div>
</div>
<div class="part4">
    <div class="dashboard-panel panel panel-inverse">
        <div class="panel-heading">
            <div class="panel-heading-btn">
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
            </div>
            <h4 class="panel-title"><?=Yii::t('main', 'PLANING')?></h4>
        </div>
        <div class="panel-body"></div>
    </div>
</div>
<div class="part5">
    <div class="dashboard-panel panel panel-inverse">
        <div class="panel-heading">
            <div class="panel-heading-btn">
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
            </div>
            <h4 class="panel-title"><?=Yii::t('main', 'CHECK-IN')?></h4>
        </div>
        <div class="panel-body" style="padding: 0px">
            <?php echo $this->render('check-in') ?>
        </div>
    </div>
</div>
<div class="part6">
    <div class="dashboard-panel panel panel-inverse">
        <div class="panel-heading">
            <div class="panel-heading-btn">
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
            </div>
            <h4 class="panel-title"><?=Yii::t('main', 'PHOTO')?></h4>
        </div>
        <div class="panel-body">
            <?php echo $this->render('slide') ?>
        </div>
    </div>
</div>