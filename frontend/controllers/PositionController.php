<?php

namespace frontend\controllers;

use common\models\Position;
use common\models\PositionSearch;
use Yii;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * PositionController implements the CRUD actions for Position model.
 */
class PositionController extends Controller {
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
	 * Lists all Position models.
	 * @return mixed
	 */
	public function actionIndex() {

		$model = new Position();

		if ($model->load(Yii::$app->request->post())) {
			$model->company_id = Yii::$app->user->identity->company->id;
			$model->upd_by = Yii::$app->user->identity->username;
			if ($model->save()) {
				Yii::$app->getSession()->setFlash('alert', [
					'body' => 'เพิ่มตำแหน่งเสร็จเรียบร้อย!',
					'options' => ['class' => 'alert-success'],
				]);
				$searchModel->id = $model->id;
				$dataProvider = $searchModel->search(Yii::$app->request->queryParams);
				$model = new Position();
			}
		}

		$searchModel = new PositionSearch();
		$dataProvider = $searchModel->search(Yii::$app->request->queryParams);
		$model->status = 1;
		return $this->render('index', [
			'searchModel' => $searchModel,
			'dataProvider' => $dataProvider,
			'model' => $model,
		]);
	}

	/**
	 * Displays a single Position model.
	 * @param integer $id
	 * @return mixed
	 */
	public function actionView($id) {
		return $this->render('view', [
			'model' => $this->findModel($id),
		]);
	}

	/**
	 * Creates a new Position model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 * @return mixed
	 */
	/*public function actionCreate() {
		$model = new Position();

		if ($model->load(Yii::$app->request->post())) {
			$model->upd_by = Yii::$app->user->identity->username;
			if ($model->save()) {
				return $this->redirect(['view', 'id' => $model->id]);
			}
		} else {
			return $this->render('create', [
				'model' => $model,
			]);
		}
	}*/

	/**
	 * Updates an existing Position model.
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
	 * Deletes an existing Position model.
	 * If deletion is successful, the browser will be redirected to the 'index' page.
	 * @param integer $id
	 * @return mixed
	 */
	public function actionDelete($id) {
		$this->findModel($id)->delete();

		return $this->redirect(['index']);
	}

	/**
	 * Finds the Position model based on its primary key value.
	 * If the model is not found, a 404 HTTP exception will be thrown.
	 * @param integer $id
	 * @return Position the loaded model
	 * @throws NotFoundHttpException if the model cannot be found
	 */
	protected function findModel($id) {
		if (($model = Position::findOne($id)) !== null) {
			return $model;
		} else {
			throw new NotFoundHttpException('The requested page does not exist.');
		}
	}
}
