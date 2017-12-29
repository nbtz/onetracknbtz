<?php
use yii\helpers\Html;
?>

<div class="part1">
    <div class="row">
        <!-- <div class="col-md-1"></div> -->
        <div class="col-sm-5ths">
            <div class="box-sum ">
                <div class="row">
                    <div class="col-sm-8">
                        <p>ONLINE</p>
                        <b>50/59</b>
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
                        <b>5</b>
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
                        <b>15</b>
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
                        <b>7</b>
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
                        <b>530/3574</b>
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

<div class="part2"><h1></h1></div>
<div class="part3"><h1></h1></div>
<div class="part4">
    <div class="panel panel-inverse">
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
    <div class="panel panel-inverse">
        <div class="panel-heading">
            <div class="panel-heading-btn">
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
            </div>
            <h4 class="panel-title"><?=Yii::t('main', 'CHECK-IN')?></h4>
        </div>
        <div class="panel-body"></div>
    </div>
</div>
<div class="part6">
    <div class="panel panel-inverse">
        <div class="panel-heading">
            <div class="panel-heading-btn">
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
            </div>
            <h4 class="panel-title"><?=Yii::t('main', 'PHOTO')?></h4>
        </div>
        <div class="panel-body"></div>
    </div>
</div>