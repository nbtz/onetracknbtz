<?php

namespace frontend\controllers;

use common\components\ImageManager;
use common\models\Cust;
use common\models\CustPic;
use common\models\CustSearch;
use Yii;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;

/**
 * CustController implements the CRUD actions for Cust model.
 */
class CustController extends Controller {
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
	 * Lists all Cust models.
	 * @return mixed
	 */
	public function actionIndex() {
		$model = new Cust();
		$searchModel = new CustSearch();
		if (isset(Yii::$app->user->identity->company->id) && !empty(Yii::$app->user->identity->company->id)) {
			$searchModel->company_id = Yii::$app->user->identity->company->id;
		}
		$dataProvider = $searchModel->search(Yii::$app->request->queryParams);
		$dataProvider->sort = ['defaultOrder' => ['cr_date' => SORT_DESC, 'upd_date' => SORT_DESC]];

		if ($model->load(Yii::$app->request->post())) {
			if (isset(Yii::$app->user->identity->company->id) && !empty(Yii::$app->user->identity->company->id)) {
				$model->guid = "CUS-" . date("Ymd") . "-" . date("His");

				$model->company_id = Yii::$app->user->identity->company->id;
				$model->cr_by = Yii::$app->user->identity->username;
				$model->upd_by = Yii::$app->user->identity->username;
				$model->imageFile = UploadedFile::getInstance($model, 'imageFile');
				if (isset($model->imageFile) && !empty($model->imageFile)) {
					Yii::info("รับ FILES มา");
					Yii::info($model->imageFile);
					$urlname = ImageManager::save($model->imageFile);
					Yii::info("urlname");
					Yii::info($urlname);
					// $pic_url = $model->getPartImage($urlname);
					// Yii::info("pic_url");
					// Yii::info($pic_url);
					$model->imageFile = "";
				}
				if ($model->save()) {

					$modelImage = new CustPic();
					$modelImage->guid = "PIC-" . date("Ymd") . "-" . date("His");
					$modelImage->cust_id = $model->id;
					$modelImage->company_id = Yii::$app->user->identity->company->id;
					$modelImage->timeid = date("Y-m-d");
					// $modelImage->pic_url = $pic_url;

					$modelImage->upd_by = Yii::$app->user->identity->username;
					$modelImage->pic_filename = $urlname;
					$modelImage->pic_time = date("Y-m-d H:i:s");

					$modelImage->app_code = "com.onelinkspace.checkin";
					$modelImage->flag_up = "Y";
					Yii::info($modelImage);
					if ($modelImage->save()) {

						Yii::$app->getSession()->setFlash('alert', [
							'body' => 'ลงทะเบียนลูกค้าเสร็จเรียบร้อย!',
							'options' => ['class' => 'alert-success'],
						]);
					} else {

						Yii::$app->getSession()->setFlash('alert', [
							'body' => 'ลงทะเบียนลูกค้าเสร็จเรียบร้อย! แต่ไม่ได้บันทึกรูป',
							'options' => ['class' => 'alert-danger'],
						]);
						// exit();
					}

					$searchModel->cust_name = $model->cust_name;
					$dataProvider = $searchModel->search(Yii::$app->request->queryParams);
					$model = new Cust();

				}
			} else {
				Yii::$app->getSession()->setFlash('alert', [
					'body' => 'ผูกกับบริษัทให้เรียบร้อยก่อนถึงลงทะเบียนลูกค้าได้!',
					'options' => ['class' => 'alert-danger'],
				]);
			}

		}

		return $this->render('index', [
			'searchModel' => $searchModel,
			'dataProvider' => $dataProvider,
			'model' => $model,

		]);
	}

	/**
	 * Displays a single Cust model.
	 * @param integer $id
	 * @return mixed
	 */
	public function actionView($id) {
		return $this->render('view', [
			'model' => $this->findModel($id),
		]);
	}

	/**
	 * Creates a new Cust model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 * @return mixed
	 */
	public function actionCreate() {
		$model = new Cust();

		if ($model->load(Yii::$app->request->post()) && $model->save()) {
			return $this->redirect(['view', 'id' => $model->id]);
		} else {
			return $this->render('create', [
				'model' => $model,
			]);
		}
	}

	/**
	 * Updates an existing Cust model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id
	 * @return mixed
	 */
	public function actionUpdate($id) {
		$model = $this->findModel($id);

		if ($model->load(Yii::$app->request->post())) {
			$model->imageFile = UploadedFile::getInstance($model, 'imageFile');

			$model->upd_by = Yii::$app->user->identity->username;
			$model->imageFile = UploadedFile::getInstance($model, 'imageFile');
			if (isset($model->imageFile) && !empty($model->imageFile)) {
				Yii::info("รับ FILES มา");
				Yii::info($model->imageFile);
				$urlname = ImageManager::save($model->imageFile);
				Yii::info("urlname");
				Yii::info($urlname);
				// $pic_url = $model->getPartImage($urlname);
				// Yii::info("pic_url");
				// Yii::info($pic_url);
				$model->imageFile = "";
				// delete db
				$modelPicOld = CustPic::find()->where(['cust_id' => $id])->one();
				$modelPicOld->upd_by = Yii::$app->user->identity->username;
				$modelPicOld->pic_filename = $urlname;
				$modelPicOld->pic_time = date("Y-m-d H:i:s");
				if ($modelPicOld->save()) {

				}
			}
			if ($model->save()) {
				return $this->redirect(['view', 'id' => $model->id]);
			}
		} else {
			return $this->render('update', [
				'model' => $model,
			]);
		}
	}

	/**
	 * Deletes an existing Cust model.
	 * If deletion is successful, the browser will be redirected to the 'index' page.
	 * @param integer $id
	 * @return mixed
	 */
	public function actionDelete($id) {
		$this->findModel($id)->delete();

		return $this->redirect(['index']);
	}

	/**
	 * Finds the Cust model based on its primary key value.
	 * If the model is not found, a 404 HTTP exception will be thrown.
	 * @param integer $id
	 * @return Cust the loaded model
	 * @throws NotFoundHttpException if the model cannot be found
	 */
	protected function findModel($id) {
		if (($model = Cust::findOne($id)) !== null) {
			return $model;
		} else {
			throw new NotFoundHttpException('The requested page does not exist.');
		}
	}
}
