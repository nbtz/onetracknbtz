<?php

namespace frontend\controllers;

use common\components\ImageManager;
use common\models\CustType;
use common\models\CustTypeSearch;
use Yii;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;

/**
 * CustTypeController implements the CRUD actions for CustType model.
 */
class CustTypeController extends Controller {
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
	 * Lists all CustType models.
	 * @return mixed
	 */
	public function actionIndex() {
		$model = new CustType();
		$searchModel = new CustTypeSearch();
		if (isset(Yii::$app->user->identity->company->id) && !empty(Yii::$app->user->identity->company->id)) {
			$searchModel->company_id = Yii::$app->user->identity->company->id;
		}
		$dataProvider = $searchModel->search(Yii::$app->request->queryParams);

		if ($model->load(Yii::$app->request->post())) {
			if (isset(Yii::$app->user->identity->company->id) && !empty(Yii::$app->user->identity->company->id)) {

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
					$model->pic_url = $model->getPartImage($urlname);
					Yii::info("model->pic_url");
					Yii::info($model->pic_url);
					$model->imageFile = "";

				}
				if ($model->save()) {
					Yii::$app->getSession()->setFlash('alert', [
						'body' => 'เพิ่มประเภทลูกค้าเสร็จเรียบร้อย!',
						'options' => ['class' => 'alert-success'],
					]);
					// $searchModel->id = $model->id;
					// $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
					$model = new CustType();
				}
			} else {
				Yii::$app->getSession()->setFlash('alert', [
					'body' => 'ผูกกับบริษัทให้เรียบร้อยก่อนถึงเพิ่มประเภทลูกค้าได้!',
					'options' => ['class' => 'alert-danger'],
				]);
			}
		}
		$dataProvider->sort = ['defaultOrder' => ['cr_date' => SORT_DESC, 'upd_date' => SORT_DESC]];

		return $this->render('index', [
			'searchModel' => $searchModel,
			'dataProvider' => $dataProvider,
			'model' => $model,
		]);
	}

	/**
	 * Displays a single CustType model.
	 * @param integer $id
	 * @return mixed
	 */
	public function actionView($id) {
		return $this->render('view', [
			'model' => $this->findModel($id),
		]);
	}

	/**
	 * Creates a new CustType model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 * @return mixed
	 */
	/*public function actionCreate() {
		$model = new CustType();

		if ($model->load(Yii::$app->request->post()) && $model->save()) {
			return $this->redirect(['view', 'id' => $model->id]);
		} else {
			return $this->render('create', [
				'model' => $model,
			]);
		}
	}*/

	/**
	 * Updates an existing CustType model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id
	 * @return mixed
	 */
	public function actionUpdate($id) {
		$model = $this->findModel($id);

		if ($model->load(Yii::$app->request->post())) {
			$model->upd_by = Yii::$app->user->identity->username;
			if ($model->save()) {
				return $this->redirect(['view', 'id' => $model->id]);
			}
			// return $this->redirect(['view', 'id' => $model->id]);
		} else {
			return $this->render('update', [
				'model' => $model,
			]);
		}
	}

	/**
	 * Deletes an existing CustType model.
	 * If deletion is successful, the browser will be redirected to the 'index' page.
	 * @param integer $id
	 * @return mixed
	 */
	public function actionDelete($id) {
		$this->findModel($id)->delete();

		return $this->redirect(['index']);
	}

	/**
	 * Finds the CustType model based on its primary key value.
	 * If the model is not found, a 404 HTTP exception will be thrown.
	 * @param integer $id
	 * @return CustType the loaded model
	 * @throws NotFoundHttpException if the model cannot be found
	 */
	protected function findModel($id) {
		if (($model = CustType::findOne($id)) !== null) {
			return $model;
		} else {
			throw new NotFoundHttpException('The requested page does not exist.');
		}
	}
}
