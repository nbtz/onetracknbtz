<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

/**
 * This is the model class for table "sp_bu".
 *
 * @property integer $id
 * @property string $bu_name
 * @property string $upd_date
 * @property string $upd_by
 * @property integer $company_id
 */
class Bu extends \yii\db\ActiveRecord {
	/**
	 * @inheritdoc
	 */
	public static function tableName() {
		return 'sp_bu';
	}

	/**
	 * @return \yii\db\Connection the database connection used by this AR class.
	 */
	public static function getDb() {
		return Yii::$app->get('pgsql');
	}

	public static function primaryKey() {
		return ['id'];
	}

	/**
	 * @inheritdoc
	 */
	public function rules() {
		return [
			[['bu_name'], 'required'],
			[['id', 'company_id'], 'integer'],
			[['upd_date'], 'safe'],
			[['bu_name'], 'string', 'max' => 100],
			[['upd_by'], 'string', 'max' => 20],
		];
	}

	public function behaviors() {
		return [
			[
				'class' => TimestampBehavior::className(),
				'createdAtAttribute' => 'upd_date',
				'updatedAtAttribute' => 'upd_date',
				'value' => new Expression('NOW()'),
			],

		];
	}
	/**
	 * @inheritdoc
	 */
	public function attributeLabels() {
		return [
			'id' => 'ID',
			'bu_name' => Yii::t('team', 'Bu Name'),
			'upd_date' => Yii::t('team', 'Upd Date'),
			'upd_by' => Yii::t('team', 'Upd By'),
			'company_id' => Yii::t('team', 'Company ID'),
			// 'createdAtWithFormat' => Yii::t('main', 'Create Date'),
			'updatedAtWithFormat' => Yii::t('main', 'Update Date'),
		];
	}

	public function getUpdatedAtWithFormat() {
		return date('M d, Y H:i:s', strtotime($this->upd_date));
	}

	public function getCompany() {
		return $this->hasOne(Company::className(), ['id' => 'company_id']);
	}

	public function getCountUsers() {
		return $this->hasMany(User::className(), ['bu_id' => 'id'])->where(['status' => 1])->orWhere(['status' => "Y"])->count();
	}

	public function getUsers() {
		return $this->hasMany(User::className(), ['bu_id' => 'id'])->where(['status' => 1])->orWhere(['status' => "Y"]);
	}
}
