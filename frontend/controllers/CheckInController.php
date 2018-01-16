<?php

namespace frontend\controllers;

use common\models\CheckIn;
use common\models\CheckInSearch;
use frontend\models\ReportSearchForm;
use Yii;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * CheckInController implements the CRUD actions for CheckIn model.
 */
class CheckInController extends Controller {
	/**
	 * @inheritdoc
	 */
	public function behaviors() {
		return [
			'verbs' => [
				'class' => VerbFilter::className(),
				'actions' => [
					'delete' => ['POST'],
				],
			],
		];
	}

	/**
	 * Lists all CheckIn models.
	 * @return mixed
	 */
	public function actionIndex() {
		$searchModel = new CheckInSearch();
		// $searchModel->username = $model->username;
		if (isset(Yii::$app->user->identity->company->id) && !empty(Yii::$app->user->identity->company->id)) {
			$searchModel->company_id = Yii::$app->user->identity->company->id;
		}
		$dataProvider = $searchModel->search(Yii::$app->request->queryParams);
		$dataProvider->sort = ['defaultOrder' => ['upd_date' => SORT_DESC]];

		return $this->render('index', [
			'searchModel' => $searchModel,
			'dataProvider' => $dataProvider,
		]);
	}

	/**
	 * Displays a single CheckIn model.
	 * @param integer $id
	 * @return mixed
	 */
	public function actionView($id) {
		return $this->render('view', [
			'model' => $this->findModel($id),
		]);
	}

	/**
	 * Creates a new CheckIn model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 * @return mixed
	 */
	public function actionCreate() {
		$model = new CheckIn();

		if ($model->load(Yii::$app->request->post()) && $model->save()) {
			return $this->redirect(['view', 'id' => $model->id]);
		} else {
			return $this->render('create', [
				'model' => $model,
			]);
		}
	}

	/**
	 * Updates an existing CheckIn model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id
	 * @return mixed
	 */
	public function actionUpdate($id) {
		$model = $this->findModel($id);

		if ($model->load(Yii::$app->request->post()) && $model->save()) {
			return $this->redirect(['view', 'id' => $model->id]);
		} else {
			return $this->render('update', [
				'model' => $model,
			]);
		}
	}

	/**
	 * Deletes an existing CheckIn model.
	 * If deletion is successful, the browser will be redirected to the 'index' page.
	 * @param integer $id
	 * @return mixed
	 */
	public function actionDelete($id) {
		$this->findModel($id)->delete();

		return $this->redirect(['index']);
	}

	/**
	 * Finds the CheckIn model based on its primary key value.
	 * If the model is not found, a 404 HTTP exception will be thrown.
	 * @param integer $id
	 * @return CheckIn the loaded model
	 * @throws NotFoundHttpException if the model cannot be found
	 */
	protected function findModel($id) {
		if (($model = CheckIn::findOne($id)) !== null) {
			return $model;
		} else {
			throw new NotFoundHttpException('The requested page does not exist.');
		}
	}

	public function actionReport() {
		$model = new ReportSearchForm();
		$searchModel = new CheckInSearch();

		// $searchModel->username = $model->username;
		/*if (isset(Yii::$app->user->identity->company->id) && !empty(Yii::$app->user->identity->company->id)) {
			$searchModel->company_id = Yii::$app->user->identity->company->id;
		}*/

		$dataProvider = $searchModel->search(Yii::$app->request->queryParams);

		$dataProviderExport = $searchModel->search(Yii::$app->request->queryParams);

		if ($model->load(Yii::$app->request->post())) {
			if (isset($model->bu_id)) {
				Yii::info('bu id ' . $model->bu_id);
				$searchModel->bu_id = $model->bu_id;
			}

			if (isset($model->usrid)) {
				Yii::info('usrid ' . $model->usrid);
				$searchModel->usrid = $model->usrid;
			}

			if (isset($model->in_time)) {
				Yii::info('in_time ' . $model->in_time);
				$searchModel->in_time = $model->in_time;
			}

			if (isset($model->out_time)) {
				Yii::info('out_time ' . $model->out_time);
				$searchModel->out_time = $model->out_time;
			}

			if (isset($model->cust_name)) {
				Yii::info('cust_name ' . $model->cust_name);
				$searchModel->cust_name = $model->cust_name;
			}

			$dataProvider = $searchModel->search(Yii::$app->request->queryParams);

			$model = new ReportSearchForm();
		}

		$dataProvider->sort = ['defaultOrder' => ['upd_date' => SORT_DESC]];
		// $dataProviderExport->setPagination(false);
		// $dataProviderExport->pagination->pageSize = 5;
		// $dataProvider->pagination->pageSize = 5;
		$dataProviderExport->pagination = false;
		$dataProviderExport->sort = ['defaultOrder' => ['upd_date' => SORT_DESC]];
		// $dataProvider->pagination->pageSize = 100;
		return $this->render('report', [
			'searchModel' => $searchModel,
			'dataProvider' => $dataProvider,
			'dataProviderExport' => $dataProviderExport,
			'model' => $model,
		]);
	}

	/*public function actionTestPdf($value = '') {
				$case_molecular = MolecularTest::findOne(['id_case' => $id_case]);
		        $patient_case = PatientCase::findOne(['id_case' => $id_case]);

		        // get your HTML raw content without any layouts or scripts
		        $content = $this->renderPartial('_preview', [
		            'case_molecular' => $case_molecular,
		            'patient_case' => $patient_case,
		        ]);

		        // setup kartik\mpdf\Pdf component
		        $pdf = new Pdf([
		            'mode' => Pdf::MODE_UTF8,
		            // A4 paper format
		            'format' => Pdf::FORMAT_A4,
		            // portrait orientation
		            'orientation' => Pdf::ORIENT_PORTRAIT,
		            // stream to browser inline
		            'destination' => Pdf::DEST_BROWSER,
		            // your html content input
		            'content' => $content,
		            // format content from your own css file if needed or use the
		            // enhanced bootstrap css built by Krajee for mPDF formatting
		            'cssFile' => '@frontend/web/css/pdf.css',
		            // any css to be embedded if required
		            'cssInline' => '.bd{border:1.5px solid; text-align: center;} .ar{text-align:right} .imgbd{border:1px solid}',
		            // set mPDF properties on the fly
		            'options' => ['title' => 'Preview Report Case: '.$id_case],
		            // call mPDF methods on the fly
		            'methods' => [
		                //'SetHeader'=>[''],
		                //'SetFooter'=>['{PAGENO}'],
		            ]
		        ]);

		        // return the pdf output as per the destination setting
		        return $pdf->render();
	*/
}
