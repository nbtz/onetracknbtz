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

		if ($model->load(Yii::$app->request->post()) && $model->save()) {

		}

		$searchModel = new CustSearch();
		$dataProvider = $searchModel->search(Yii::$app->request->queryParams);

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

		if ($model->load(Yii::$app->request->post())) {
			$model->imageFile = UploadedFile::getInstance($model, 'imageFile');
			$imageName = "";
			if (isset($model->imageFile) && !empty($model->imageFile)) {
				$imageName = ImageManager::save($model->imageFile);
			}

			if ($model->save()) {
				if (isset($imageName) && !empty($imageName)) {
					$modelPic = new CustPic();
					$modelPic->cust_id = $model->id;
					$modelPic->pic_filename = $imageName;
					if ($modelPic->save()) {
						# code...
					}
				}

				return $this->redirect(['view', 'id' => $model->id]);
			}
		}
		return $this->render('create', [
			'model' => $model,
		]);

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
			$imageName = "";
			if (isset($model->imageFile) && !empty($model->imageFile)) {
				$imageName = ImageManager::save($model->imageFile);
			}
			// echo "Image " . $imageName;
			/*if ($model->save()) {
				if (isset($imageName) && !empty($imageName)) {
					$modelFindImage = CustPic::find()->where(['cust_id' => $model->id])->one();
					if (count($modelFindImage) > 0) {
						$modelPic->pic_filename = $imageName;
						if ($modelPic->save()) {
							# code...
						}
					} else {
						$modelPic = new CustPic();
						$modelPic->cust_id = $model->id;
						$modelPic->pic_filename = $imageName;
						if ($modelPic->save()) {
							# code...
						}
					}

				}
				return $this->redirect(['view', 'id' => $model->id]);
			}*/
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