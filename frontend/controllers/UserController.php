<?php

namespace frontend\controllers;

use common\models\User;
use common\models\UserSearch;
use Yii;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * UserController implements the CRUD actions for User model.
 */
class UserController extends Controller {
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
	 * Lists all User models.
	 * @return mixed
	 */
	public function actionIndex() {

		$model = new User();
		$searchModel = new UserSearch();
		if (isset(Yii::$app->user->identity->company->id) && !empty(Yii::$app->user->identity->company->id)) {
			$searchModel->company_id = Yii::$app->user->identity->company->id;
		}
		$dataProvider = $searchModel->search(Yii::$app->request->queryParams);

		if ($model->load(Yii::$app->request->post())) {
			if (isset(Yii::$app->user->identity->company->id) && !empty(Yii::$app->user->identity->company->id)) {

				$model->company_id = Yii::$app->user->identity->company->id;
				$model->cr_by = Yii::$app->user->identity->username;
				$model->upd_by = Yii::$app->user->identity->username;
				if ($model->save()) {
					# code...
					Yii::$app->getSession()->setFlash('alert', [
						'body' => 'เพิ่มผู้ใช้งานระบบเสร็จเรียบร้อย!',
						'options' => ['class' => 'alert-success'],
					]);
					// $searchModel->id = $model->id;
					// $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
					// $model = new CustStatus();
				}
			} else {
				Yii::$app->getSession()->setFlash('alert', [
					'body' => 'ผูกกับบริษัทให้เรียบร้อยก่อนถึงเพิ่มผู้ใช้งานระบบได้!',
					'options' => ['class' => 'alert-danger'],
				]);
			}
		}
		$dataProvider->sort = ['defaultOrder' => ['cr_date' => SORT_DESC, 'upd_date' => SORT_DESC]];

		return $this->render('index', [
			'searchModel' => $searchModel,
			'dataProvider' => $dataProvider,
		]);
	}

	/**
	 * Displays a single User model.
	 * @param integer $id
	 * @return mixed
	 */
	public function actionView($id) {
		return $this->render('view', [
			'model' => $this->findModel($id),
		]);
	}

	/**
	 * Creates a new User model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 * @return mixed
	 */
	public function actionCreate() {
		$model = new User();

		if ($model->load(Yii::$app->request->post()) && $model->save()) {
			return $this->redirect(['view', 'id' => $model->id]);
		} else {
			return $this->render('create', [
				'model' => $model,
			]);
		}
	}

	/**
	 * Updates an existing User model.
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
	 * Deletes an existing User model.
	 * If deletion is successful, the browser will be redirected to the 'index' page.
	 * @param integer $id
	 * @return mixed
	 */
	public function actionDelete($id) {
		$this->findModel($id)->delete();

		return $this->redirect(['index']);
	}

	/**
	 * Finds the User model based on its primary key value.
	 * If the model is not found, a 404 HTTP exception will be thrown.
	 * @param integer $id
	 * @return User the loaded model
	 * @throws NotFoundHttpException if the model cannot be found
	 */
	protected function findModel($id) {
		if (($model = User::findOne($id)) !== null) {
			return $model;
		} else {
			throw new NotFoundHttpException('The requested page does not exist.');
		}
	}
}
