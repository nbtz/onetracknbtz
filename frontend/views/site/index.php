<?php
use yii\helpers\Html;

/* @var $this yii\web\View */

$this->title = 'Dashboard';

?>
<!-- <h1>INDEX  PAGE</h1> -->
<!-- 123456789 -->
<?php
// $db = Yii::$app->pgsql;
// $db->open();
// Yii::$app->pgsql->open();
// print_r($db);
// $tbUsers = Yii::$app->pgsql->createCommand('')->queryScalar();
// print_r($db->schema->getTables());
?>

<!-- <h1>TEST abc ทดสอบ โชคดี อุบล</h1>
<h2>TEST abc ทดสอบ โชคดี อุบล</h2>
<h3>TEST abc ทดสอบ โชคดี อุบล</h3>
<h4>TEST abc ทดสอบ โชคดี อุบล</h4>
<h5>TEST abc ทดสอบ โชคดี อุบล</h5>
<h6>TEST abc ทดสอบ โชคดี อุบล</h6>
TEST abc ทดสอบ โชคดี อุบล
<p>TEST abc ทดสอบ โชคดี อุบล</p> -->

<div class="part1">
    <div class="row">
        <!-- <div class="col-md-1"></div> -->
        <div class="col-sm-4 col-md-3">
            <div class="box-sum ">
                <div class="row">
                    <div class="col-sm-8">
                        <p>ONLINE</p>
                        <b>50/59</b>
                    </div>
                    <div class="col-sm-4 box-sum-icon right">
                        <?=Html::img('@web/themes/admin/img/icon/Symbol 9 – 5@2x.png');?>
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
        <div class="col-sm-4 col-md-2">
            <div class="box-sum ">
                <div class="row">
                    <div class="col-sm-8">
                        <p>Late</p>
                        <b>5</b>
                    </div>
                    <div class="col-sm-4 box-sum-icon">
                        <?=Html::img('@web/themes/admin/img/icon/Late-01@2x.png');?>
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
        <div class="col-sm-4 col-md-2">
            <div class="box-sum ">
                <div class="row">
                    <div class="col-sm-8">
                        <p>New Check-in</p>
                        <b>15</b>
                    </div>
                    <div class="col-sm-4 box-sum-icon">
                        <?=Html::img('@web/themes/admin/img/icon/Icon-02@2x.png');?>
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
        <div class="col-sm-4 col-md-2">
            <div class="box-sum ">
                <div class="row">
                    <div class="col-sm-8">
                        <p>Month to date</p>
                        <b>7</b>
                    </div>
                    <div class="col-sm-4 box-sum-icon">
                        <?=Html::img('@web/themes/admin/img/icon/Calendar-02@2x.png');?>
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
        <div class="col-sm-4 col-md-3">
            <div class="box-sum ">
                <div class="row">
                    <div class="col-sm-8">
                        <p>Long time no see</p>
                        <b>530/3574</b>
                    </div>
                    <div class="col-sm-4 box-sum-icon right">
                        <?=Html::img('@web/themes/admin/img/icon/Calendar-01@2x.png');?>
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
<div class="part2">
    <h4>DASHBOARD</h4>

    <div class="row bg-black">
        <div class="col-md-8">
            <div class="row">
                <div class="col-md-3">Team A</div>
                <div class="col-md-3">Team B</div>
                <div class="col-md-3">Team C</div>
                <div class="col-md-3">Team D</div>
            </div>
            <div class="row">
                <div class="col-md-3">Team E</div>
                <div class="col-md-3">Team F</div>
                <div class="col-md-3">+</div>
                <div class="col-md-3">+</div>
            </div>
        </div>
        <div class="col-md-4">
            <h4>Sale List</h4>
            <div class="row list-user">
                <div class="col-md-2">image1</div>
                <div class="col-md-10">data user</div>
            </div>
             <div class="row list-user">
                <div class="col-md-2">image2</div>
                <div class="col-md-10">data user</div>
            </div>
             <div class="row list-user">
                <div class="col-md-2">image3</div>
                <div class="col-md-10">data user</div>
            </div>
             <div class="row list-user">
                <div class="col-md-2">image4</div>
                <div class="col-md-10">data user</div>
            </div>
        </div>
    </div>
</div>
<div class="part3">
    <h4>MAP</h4>

</div>
<div class="part4">
    <h4>PLANING</h4>

</div>
<div class="part5">
    <h4>CHECK-IN</h4>

</div>
<div class="part6">
    <h4>PHOTO</h4>
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-2"></div>
        <div class="col-md-2"></div>
        <div class="col-md-2"></div>
        <div class="col-md-2"></div>
        <div class="col-md-2"></div>
    </div>
</div>