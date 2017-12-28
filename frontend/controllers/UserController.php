<?php

namespace frontend\controllers;

use common\components\ImageManager;
use common\models\User;
use common\models\UserSearch;
use frontend\models\ChangePasswordForm;
use frontend\models\UserForm;
use Yii;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;

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

		$model = new UserForm();
		// $model->scenario = 'index';

		$searchModel = new UserSearch();
		if (isset(Yii::$app->user->identity->company->id) && !empty(Yii::$app->user->identity->company->id)) {
			$searchModel->company_id = Yii::$app->user->identity->company->id;
		}
		$dataProvider = $searchModel->search(Yii::$app->request->queryParams);

		if ($model->load(Yii::$app->request->post()) && $model->validate()) {

			if (isset(Yii::$app->user->identity->company->id) && !empty(Yii::$app->user->identity->company->id)) {
				// $model->setPassword($model->pwd);
				Yii::info("postion");
				Yii::info($model->postion_id);

				$model->company_id = Yii::$app->user->identity->company->id;
				// $model->guid = "USR-" . $model->generateAuthKey();
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
				if ($user = $model->signup()) {
					# code...
					Yii::info('user');
					Yii::info($user);
					Yii::$app->getSession()->setFlash('alert', [
						'body' => 'เพิ่มผู้ใช้งานระบบเสร็จเรียบร้อย!',
						'options' => ['class' => 'alert-success'],
					]);
					// $searchModel->username = $model->username;
					// $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
					$model = new UserForm();
				} else {
					Yii::info('user');
					Yii::info($user);
					Yii::$app->getSession()->setFlash('alert', [
						'body' => 'not save !',
						'options' => ['class' => 'alert-danger'],
					]);
				}
			} else {
				Yii::$app->getSession()->setFlash('alert', [
					'body' => 'ผูกกับบริษัทให้เรียบร้อยก่อนถึงเพิ่มผู้ใช้งานระบบได้!',
					'options' => ['class' => 'alert-danger'],
				]);
			}
		}
		$dataProvider->sort = ['defaultOrder' => ['cr_date' => SORT_DESC, 'upd_date' => SORT_DESC]];
		if (empty($model->tel_code)) {
			$model->tel_code = "+66";
		}
		return $this->render('index', [
			'searchModel' => $searchModel,
			'dataProvider' => $dataProvider,
			'model' => $model,
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
	/*public function actionCreate() {
		$model = new User();

		if ($model->load(Yii::$app->request->post()) && $model->save()) {
			return $this->redirect(['view', 'id' => $model->id]);
		} else {
			return $this->render('create', [
				'model' => $model,
			]);
		}
	}*/

	/**
	 * Updates an existing User model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id
	 * @return mixed
	 */
	public function actionUpdate($id) {

		$model = $this->findModel($id);
		$model->scenario = 'update';
		$model->upd_by = Yii::$app->user->identity->username;

		if ($model->load(Yii::$app->request->post()) && $model->save()) {
			return $this->redirect(['view', 'id' => $model->id]);
		} else {
			if (empty($model->tel_code)) {
				$model->tel_code = "+66";
			} else if ($model->tel_code == "66") {
				$model->tel_code = "+66";
			}
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

	public function actionProfile() {
		$id = Yii::$app->user->identity->id;
		$model = $this->findModel($id);
		$model->scenario = 'update';
		$model->upd_by = Yii::$app->user->identity->username;
		$modelPassword = new ChangePasswordForm();

		if ($model->load(Yii::$app->request->post()) && $model->save()) {

			Yii::$app->getSession()->setFlash('alert', [
				'body' => 'แก้ไขประวัติส่วนตัวเสร็จเรียบร้อย!',
				'options' => ['class' => 'alert-success'],
			]);
			return $this->render('my_profile', [
				'model' => $model,
				'modelPassword' => $modelPassword,
			]);
		}

		if ($modelPassword->load(Yii::$app->request->post())) {
			if ($modelPassword->resetPassword()) {
				Yii::$app->getSession()->setFlash('alert', [
					'body' => 'เปลี่ยนรหัสผ่านเสร็จเรียบร้อย!',
					'options' => ['class' => 'alert-success'],
				]);
				$modelPassword = new ChangePasswordForm();
				return $this->render('my_profile', [
					'model' => $model,
					'modelPassword' => $modelPassword,
				]);
			} else {
				Yii::$app->getSession()->setFlash('alert', [
					'body' => 'รหัสผ่านเดิมไม่ถูกต้อง',
					'options' => ['class' => 'alert-danger'],
				]);
			}

		}

		if (empty($model->tel_code)) {
			$model->tel_code = "+66";
		} else if ($model->tel_code == "66") {
			$model->tel_code = "+66";
		}

		return $this->render('my_profile', [
			'model' => $model,
			'modelPassword' => $modelPassword,
		]);

	}

}
