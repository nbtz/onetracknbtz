<?php

namespace frontend\controllers;

use common\models\Bu;
use common\models\BuSearch;
use common\models\User;
use Yii;
use yii\filters\VerbFilter;
use yii\helpers\Json;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * BuController implements the CRUD actions for Bu model.
 */
class BuController extends Controller {
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
	 * Lists all Bu models.
	 * @return mixed
	 */
	public function actionIndex() {
		$model = new Bu();
		$searchModel = new BuSearch();
		if (isset(Yii::$app->user->identity->company->id) && !empty(Yii::$app->user->identity->company->id)) {
			$searchModel->company_id = Yii::$app->user->identity->company->id;
		}
		$dataProvider = $searchModel->search(Yii::$app->request->queryParams);

		if ($model->load(Yii::$app->request->post())) {
			if (isset(Yii::$app->user->identity->company->id) && !empty(Yii::$app->user->identity->company->id)) {

				$model->company_id = Yii::$app->user->identity->company->id;
				$model->upd_by = Yii::$app->user->identity->username;
				if ($model->save()) {
					Yii::$app->getSession()->setFlash('alert', [
						'body' => 'เพิ่มทีมเสร็จเรียบร้อย!',
						'options' => ['class' => 'alert-success'],
					]);
					$searchModel->id = $model->id;
					$dataProvider = $searchModel->search(Yii::$app->request->queryParams);
					$model = new Bu();
				}
			} else {
				Yii::$app->getSession()->setFlash('alert', [
					'body' => 'ผูกกับบริษัทให้เรียบร้อยก่อนถึงเพิ่มทีมได้!',
					'options' => ['class' => 'alert-danger'],
				]);
			}
		}

		// $dataProvider = new ActiveDataProvider([
		//     'query' => Bu::find()->orderBy('id DESC'),
		//     'pagination' => ['pageSize' => 20],
		// ]);

		return $this->render('index', [
			'searchModel' => $searchModel,
			'dataProvider' => $dataProvider,
			'model' => $model,
		]);
	}

	/**
	 * Displays a single Bu model.
	 * @param integer $id
	 * @return mixed
	 */
	public function actionView($id) {
		return $this->render('view', [
			'model' => $this->findModel($id),
		]);
	}

	/**
	 * Creates a new Bu model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 * @return mixed
	 */
	public function actionCreate() {
		$model = new Bu();

		if ($model->load(Yii::$app->request->post()) && $model->save()) {
			return $this->redirect(['view', 'id' => $model->id]);
		} else {
			return $this->render('create', [
				'model' => $model,
			]);
		}
	}

	/**
	 * Updates an existing Bu model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id
	 * @return mixed
	 */
	public function actionUpdate($id) {
		$model = $this->findModel($id);

		if ($model->load(Yii::$app->request->post())) {
			// $me = Yii::$app->user->identity->username;
			$model->upd_by = Yii::$app->user->identity->username;
			// echo "identity " . Yii::$app->user->identity->username;
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
	 * Deletes an existing Bu model.
	 * If deletion is successful, the browser will be redirected to the 'index' page.
	 * @param integer $id
	 * @return mixed
	 */
	public function actionDelete($id) {
		$this->findModel($id)->delete();

		return $this->redirect(['index']);
	}

	public function actionPlan() {
		return $this->render('plan');
	}

	/**
	 * Finds the Bu model based on its primary key value.
	 * If the model is not found, a 404 HTTP exception will be thrown.
	 * @param integer $id
	 * @return Bu the loaded model
	 * @throws NotFoundHttpException if the model cannot be found
	 */
	protected function findModel($id) {
		if (($model = Bu::findOne($id)) !== null) {
			return $model;
		} else {
			throw new NotFoundHttpException('The requested page does not exist.');
		}
	}

	public function actionTest() {
		$model = new Bu();
		$searchModel = new BuSearch();
		if (isset(Yii::$app->user->identity->company->id) && !empty(Yii::$app->user->identity->company->id)) {
			$searchModel->company_id = Yii::$app->user->identity->company->id;
		}
		$dataProvider = $searchModel->search(Yii::$app->request->queryParams);
		return $this->render('test', ['model' => $model, 'searchModel' => $searchModel, 'dataProvider' => $dataProvider]);
	}

	public function actionSubcat() {
		Yii::info('action sub cat');
		$out = [];
		if (isset($_POST['depdrop_parents'])) {
			$parents = $_POST['depdrop_parents'];

			if ($parents != null) {
				$cat_id = $parents[0];
				Yii::info('cat_id');
				Yii::info($cat_id);
				// print_r($cat_id);
				// $out = Amphur::find()->where(['province_id' => $cat_id])->select(['id', 'name'])->orderBy('name ASC')->asArray()->all();
				$connection = Yii::$app->pgsql;
				$connection->open();

				$command = $connection->createCommand("SELECT id, username as name FROM sp_user WHERE  bu_id =" . $cat_id . " AND status='1' OR bu_id =" . $cat_id . " AND status='Y' ");
				// $out = ArrayHelper::map($command->queryAll(), 'i_amphur', 'amphur_t');
				// $out = Province::find()->where(['i_province' => $cat_id])->select(['i_amphur', 'amphur_t'])->asArray()->all();
				$out = $command->queryAll();
				// $out = User::find()->where(['bu_id' => $cat_id])->select(['id', 'username'])->orderBy('username ASC')->asArray()->all();
				Yii::info($out);
				echo Json::encode(['output' => $out, 'selected' => '']);
				return;
			}
		}
		echo Json::encode(['output' => '', 'selected' => '']);
	}
}
