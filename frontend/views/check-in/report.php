<?php

use common\models\Bu;
use common\models\CheckIn;
use common\models\User;
use dosamigos\datepicker\DatePicker;
use kartik\depdrop\DepDrop;
use kartik\export\ExportMenu;
use kartik\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $searchModel common\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('checkin', 'Report');
$this->params['breadcrumbs'][] = $this->title;
$title = $this->title;
?>
<div class="report-index">

    <h1 class="page-header"><?=Html::encode($this->title)?></h1>
    <div class="panel panel-inverse">
        <div class="panel-heading">
            <div class="panel-heading-btn">
                <!-- <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a> -->
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                <!-- <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a> -->
                <!-- <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a> -->
            </div>
            <h4 class="panel-title"><?=Yii::t('checkin', 'Search Report')?></h4>
        </div>
        <div class="panel-body">
        	 <?php $form = ActiveForm::begin(['action' => ['report'], 'method' => 'post']);?>
        	 	<div class="row">
                    <div class="col-sm-4">
                        <?php
if (isset(Yii::$app->user->identity->company->id) && !empty(Yii::$app->user->identity->company->id)) {
	$TeamList = ArrayHelper::map(Bu::find()->where(['company_id' => Yii::$app->user->identity->company->id])->all(), 'id', 'bu_name');
} else {
	$TeamList = [];
}
?>
                    <?=$form->field($model, 'bu_id')->dropDownList($TeamList, ['id' => 'cat-id', 'prompt' => Yii::t('main', '... Select ...')]);?>
					</div>
                    <div class="col-sm-4">

                    <?=$form->field($model, 'usrid')->widget(DepDrop::classname(), [
	'options' => ['id' => 'subcat-id'],
	'pluginOptions' => [
		'depends' => ['cat-id'],
		'placeholder' => Yii::t('main', '... Select ...'),
		'url' => Url::to(['/bu/subcat']),
	],
]);?>
					</div>

                    <div class="col-sm-4"><?=$form->field($model, 'cust_name')->textInput(['maxlength' => true])?></div>
                </div>
                <div class="row"><div class="col-sm-6"> <?=$form->field($model, 'in_time')->widget(
	DatePicker::className(), [
		// 'inline' => true,
		// 'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
		'template' => '{addon}{input}',
		'clientOptions' => [
			'autoclose' => true,
			'format' => 'yyyy-mm-dd',
			// 'endDate' => date('Y-m-d'),
			// 	// 'startDate' => date('Y-m-d', strtotime('+1 day')),
		],
	]);
?></div>
                    <div class="col-sm-6"> <?=$form->field($model, 'out_time')->widget(
	DatePicker::className(), [
		// 'inline' => true,
		// 'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
		'template' => '{addon}{input}',
		'clientOptions' => [
			'autoclose' => true,
			'format' => 'yyyy-mm-dd',
			// 'endDate' => date('Y-m-d'),
			// 	// 'startDate' => date('Y-m-d', strtotime('+1 day')),
		],
	]);
?></div></div>


                <div class="form-group">
                    <?=Html::submitButton(Yii::t('main', 'Search'), ['class' => 'btn btn-primary'])?>
                </div>
            <?php ActiveForm::end();?>

        </div>
    </div>
    <div class="panel panel-inverse">
        <div class="panel-heading">
            <div class="panel-heading-btn">
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
            </div>
            <h4 class="panel-title"><?=Yii::t('checkin', 'List Report')?></h4>
        </div>
        <div class="panel-body">

        	<?php
$gridColumns = [
	// ['class' => 'yii\grid\SerialColumn'],
	[
		'class' => 'kartik\grid\ExpandRowColumn',
		'value' => function ($model, $key, $index, $column) {
			return GridView::ROW_COLLAPSED;
		},
		'detail' => function ($model, $key, $index, $column) {
			$modelCheckin = CheckIn::findOne($model->id);
			return Yii::$app->controller->renderPartial('_detail.php', [
				'model' => $modelCheckin,
			]);
		},
	],
	'cust_name',
	[
		'attribute' => 'Person Contact',
		'format' => 'raw',
		'value' => function ($model, $key, $index, $widget) {
			if (isset($model->cust->custContact->contact_name)) {
				return $model->cust->custContact->contact_name;
			}
		},
	],
	'what_name',
	/*[
		'attribute' => 'cust_type_id',
		'format' => 'raw',
		'value' => function ($model) {
			if (isset($model->custType->type_name)) {
				return $model->custType->type_name;
			}
		},
	],*/
	[
		'attribute' => 'Sale',
		'format' => 'raw',
		'value' => function ($model, $key, $index, $widget) {
			if (isset($model->user->fname) && isset($model->user->lname)) {
				return $model->user->fname . " " . $model->user->lname;
			}
		},
	],
	[
		'attribute' => 'Date',
		'format' => 'raw',
		'value' => function ($model, $key, $index, $widget) {
			if (isset($model->chk_time)) {
				return date("d:m:Y", strtotime($model->chk_time));
			}
		},
	],
	[
		'attribute' => 'Time',
		'format' => 'raw',
		'value' => function ($model, $key, $index, $widget) {
			if (isset($model->chk_time)) {
				return date("H:i", strtotime($model->chk_time));
			}
		},
	],

];

$gridColumnsExport = [
	'cust_name',
	[
		'attribute' => 'Person Contact',
		'format' => 'raw',
		'value' => function ($model, $key, $index, $widget) {
			if (isset($model->cust->custContact->contact_name)) {
				return $model->cust->custContact->contact_name;
			}
		},
	],
	'what_name',
	[
		'attribute' => 'cust_type_id',
		'format' => 'raw',
		'value' => function ($model) {
			if (isset($model->custType->type_name)) {
				return $model->custType->type_name;
			}
		},
	],
	[
		'attribute' => 'Sale',
		'format' => 'raw',
		'value' => function ($model, $key, $index, $widget) {
			if (isset($model->user->fname) && isset($model->user->lname)) {
				return $model->user->fname . " " . $model->user->lname;
			}
		},
	],
	[
		'attribute' => 'Date',
		'format' => 'raw',
		'value' => function ($model, $key, $index, $widget) {
			if (isset($model->chk_time)) {
				return date("d:m:Y", strtotime($model->chk_time));
			}
		},
	],
	[
		'attribute' => 'Time',
		'format' => 'raw',
		'value' => function ($model, $key, $index, $widget) {
			if (isset($model->chk_time)) {
				return date("H:i", strtotime($model->chk_time));
			}
		},
	],
	[
		'attribute' => 'Duration',
		'format' => 'raw',
		'value' => function ($model, $key, $index, $widget) {
			return "";
		},
	],
	[
		'attribute' => 'Visiting Objective',
		'format' => 'raw',
		'value' => function ($model, $key, $index, $widget) {
			return "";
		},
	],
	[
		'attribute' => 'Location',
		'format' => 'raw',
		'value' => function ($model, $key, $index, $widget) {
			return empty($model->cust->fullAddress) ? '-' : $model->cust->fullAddress;
		},
	],
	[
		'attribute' => 'Visiting Detail',
		'format' => 'raw',
		'value' => function ($model, $key, $index, $widget) {
			return $model->who_name;
		},
	],
];
$isFa = true;
$textExport = [
	GridView::HTML => [
		'label' => Yii::t('kvgrid', 'HTML'),
		'icon' => $isFa ? 'file-text' : 'floppy-saved',
		'iconOptions' => ['class' => 'text-info'],
		'showHeader' => true,
		'showPageSummary' => true,
		'showFooter' => true,
		'showCaption' => true,
		'filename' => $title,
		'alertMsg' => Yii::t('kvgrid', 'The HTML export file will be generated for download.'),
		'options' => ['title' => Yii::t('kvgrid', 'Hyper Text Markup Language')],
		'mime' => 'text/html',
		'config' => [
			'cssFile' => 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css',
		],
	],
	GridView::CSV => [
		'label' => Yii::t('kvgrid', 'CSV'),
		'icon' => $isFa ? 'file-code-o' : 'floppy-open',
		'iconOptions' => ['class' => 'text-primary'],
		'showHeader' => true,
		'showPageSummary' => true,
		'showFooter' => true,
		'showCaption' => true,
		'filename' => $title,
		'alertMsg' => Yii::t('kvgrid', 'The CSV export file will be generated for download.'),
		'options' => ['title' => Yii::t('kvgrid', 'Comma Separated Values')],
		'mime' => 'application/csv',
		'config' => [
			'colDelimiter' => ",",
			'rowDelimiter' => "\r\n",
		],
	],
	GridView::TEXT => [
		'label' => Yii::t('kvgrid', 'Text'),
		'icon' => $isFa ? 'file-text-o' : 'floppy-save',
		'iconOptions' => ['class' => 'text-muted'],
		'showHeader' => true,
		'showPageSummary' => true,
		'showFooter' => true,
		'showCaption' => true,
		'filename' => $title,
		'alertMsg' => Yii::t('kvgrid', 'The TEXT export file will be generated for download.'),
		'options' => ['title' => Yii::t('kvgrid', 'Tab Delimited Text')],
		'mime' => 'text/plain',
		'config' => [
			'colDelimiter' => "\t",
			'rowDelimiter' => "\r\n",
		],
	],
	GridView::EXCEL => [
		'label' => Yii::t('kvgrid', 'Excel'),
		'icon' => $isFa ? 'file-excel-o' : 'floppy-remove',
		'iconOptions' => ['class' => 'text-success'],
		'showHeader' => true,
		'showPageSummary' => true,
		'showFooter' => true,
		'showCaption' => true,
		'filename' => $title,
		'alertMsg' => Yii::t('kvgrid', 'The EXCEL export file will be generated for download.'),
		'options' => ['title' => Yii::t('kvgrid', 'Microsoft Excel 95+')],
		'mime' => 'application/vnd.ms-excel',
		'config' => [
			'worksheet' => Yii::t('kvgrid', 'ExportWorksheet'),
			'cssFile' => '',
		],
	],
	GridView::PDF => [
		'label' => 'PDF',
		'icon' => $isFa ? 'file-pdf-o' : 'floppy-disk',
		'iconOptions' => ['class' => 'text-danger'],
		'showHeader' => true,
		'showPageSummary' => true,
		'showFooter' => true,
		'showCaption' => true,
		'filename' => $title,
		'alertMsg' => Yii::t('kvgrid', 'The PDF export file will be generated for download.'),
		'options' => ['title' => Yii::t('kvgrid', 'Portable Document Format')],
		'mime' => 'application/pdf',
		'config' => [
			'mode' => 'utf-8',
			'format' => 'A4-L',
			// 'defaultFont' => 'garuda',
			'destination' => 'D',
			'marginTop' => 20,
			'marginBottom' => 20,
			'cssInline' => '.kv-wrap{padding:20px;}' .
			'.kv-align-center{text-align:center;}' .
			'.kv-align-left{text-align:left;}' .
			'.kv-align-right{text-align:right;}' .
			'.kv-align-top{vertical-align:top!important;}' .
			'.kv-align-bottom{vertical-align:bottom!important;}' .
			'.kv-align-middle{vertical-align:middle!important;}' .
			'.kv-page-summary{border-top:4px double #ddd;font-weight: bold;}' .
			'.kv-table-footer{border-top:4px double #ddd;font-weight: bold;}' .
			'.kv-table-caption{font-size:1.5em;padding:8px;border:1px solid #ddd;border-bottom:none;}',
			// 'cssFile' => '@vendor/kartik-v/yii2-mpdf/assets/kv-mpdf-bootstrap.min.css',
			'methods' => [
				'SetHeader' =>
				[
					$title,
					// ['odd' => $pdfHeader, 'even' => $pdfHeader],
				],

				'SetFooter' =>
				[
					'{PAGENO}',
					// ['odd' => $pdfFooter, 'even' => $pdfFooter],
				],
			],
			'options' => [
				'title' => $title,
				// 'subject' => Yii::t('kvgrid', 'PDF export generated by kartik-v/yii2-grid extension'),
				// 'keywords' => Yii::t('kvgrid', 'krajee, grid, export, yii2-grid, pdf'),
			],
			'contentBefore' => '',
			'contentAfter' => '',
		],
	],
	GridView::JSON => [
		'label' => Yii::t('kvgrid', 'JSON'),
		'icon' => $isFa ? 'file-code-o' : 'floppy-open',
		'iconOptions' => ['class' => 'text-warning'],
		'showHeader' => true,
		'showPageSummary' => true,
		'showFooter' => true,
		'showCaption' => true,
		'filename' => $title,
		'alertMsg' => Yii::t('kvgrid', 'The JSON export file will be generated for download.'),
		'options' => ['title' => Yii::t('kvgrid', 'JavaScript Object Notation')],
		'mime' => 'application/json',
		/*'config' => [
			'colHeads' => [],
			'slugColHeads' => false,
			'jsonReplacer' => null,
			'indentSpace' => 4,
		],*/
	],

];

$fullExportMenu = ExportMenu::widget([
	'dataProvider' => $dataProviderExport,
	'columns' => $gridColumnsExport,
	// 'exportConfig' => $textExport,
	'target' => ExportMenu::TARGET_BLANK,
	'fontAwesome' => true,
	'pjaxContainerId' => 'kv-pjax-container',
	// 'hiddenColumns'=>[0, 9], // SerialColumn & ActionColumn
	// 'disabledColumns'=>[1, 2], // ID & Name
	// 'noExportColumns'=>[6], // Status
	'dropdownOptions' => [
		'label' => 'Export All',
		'class' => 'btn btn-default',
	],
]);

echo GridView::widget([
	'dataProvider' => $dataProvider,
	'filterModel' => $searchModel,
	'showPageSummary' => true,

	'columns' => $gridColumns,
	'containerOptions' => ['style' => 'overflow:scroll !important;position: relative;z-index: 100;width: none !important;max-width:968px !important;'],
	'beforeHeader' => [
		[
			'columns' => [
				['content' => 'No', 'options' => ['class' => 'text-center warning']],
				['content' => 'customer', 'options' => ['class' => 'text-center warning']],
				['content' => 'person contact', 'options' => ['class' => 'text-center warning']],
				['content' => 'customer type', 'options' => ['class' => 'text-center warning']],
				['content' => 'Sale', 'options' => ['class' => 'text-center warning']],
				['content' => 'Date', 'options' => ['class' => 'text-center warning']],
				['content' => 'Time', 'options' => ['class' => 'text-center warning']],
			],
			'options' => ['class' => 'skip-export', 'style' => 'overflow-y: scroll !important;position: relative !important;'], // remove this row from export
		],
	],
	'toolbar' => [
// [
		// 'content' =>
		// Html::button('<i class="glyphicon glyphicon-plus"></i>', ['type' => 'button', 'title' => Yii::t('kvgrid', 'Add Book'), 'class' => 'btn btn-success', 'onclick' => 'alert("This will launch the book creation form.\n\nDisabled for this demo!");']) . ' ' .
		// Html::a('<i class="glyphicon glyphicon-repeat"></i>', ['grid-demo'], ['data-pjax' => 0, 'class' => 'btn btn-default', 'title' => Yii::t('kvgrid', 'Reset Grid')]),
		// ],
		'{export}',
		$fullExportMenu,
		// '{toggleData}',
	],
// 'toggleDataContainer' => ['class' => 'btn-group-sm'],
	// 'exportContainer' => ['class' => 'btn-group-sm']
	'condensed' => true,
	// 'exportConfig' => $textExport,
	// 'exportConfig' => [
	// 	ExportMenu::FORMAT_TEXT => false,
	// 	ExportMenu::FORMAT_PDF => false,
	// ],
	// 'export' => [
	// 	'fontAwesome' => true,
	// 	// 	// 	'encoding' => 'utf-8',
	// 	// 	// 	'showConfirmAlert' => false,
	// 	'target' => GridView::TARGET_BLANK,
	// ],
	'pjax' => true,
	'bordered' => true,
	'striped' => false,
	// 'condensed' => false,
	'responsive' => true,
// 'hover' => true,
	'floatHeader' => true,
	'floatHeaderOptions' => ['scrollingTop' => 50],
	'panel' => [
		'type' => GridView::TYPE_PRIMARY,
	],
	'autoXlFormat' => true,
]);

?>
        </div>
    </div>
</div>