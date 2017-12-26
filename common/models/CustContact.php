<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

/**
 * This is the model class for table "sp_cust_contact".
 *
 * @property integer $id
 * @property integer $cust_id
 * @property string $contact_name
 * @property string $email
 * @property string $tel_m
 * @property string $tel_o
 * @property string $tel_h
 * @property string $remark
 * @property integer $company_id
 * @property string $upd_date
 * @property string $upd_by
 * @property string $cr_date
 * @property string $cr_by
 * @property integer $usrid
 * @property string $position
 */
class CustContact extends \yii\db\ActiveRecord {
	/**
	 * @inheritdoc
	 */
	public static function tableName() {
		return 'sp_cust_contact';
	}

	/**
	 * @return \yii\db\Connection the database connection used by this AR class.
	 */
	public static function getDb() {
		return Yii::$app->get('pgsql');
	}

	/**
	 * @inheritdoc
	 */
	public function rules() {
		return [
			[['contact_name', 'position', 'email', 'tel_m'], 'required'],
			[['cust_id', 'company_id', 'usrid'], 'integer'],
			[['upd_date', 'cr_date'], 'safe'],
			[['contact_name', 'email', 'remark'], 'string', 'max' => 100],
			[['tel_m', 'tel_o', 'tel_h'], 'string', 'max' => 30],
			[['upd_by', 'cr_by'], 'string', 'max' => 20],
			[['position'], 'string', 'max' => 50],
			[['email'], 'email'],
		];
	}
	public static function primaryKey() {
		return ['id'];
	}

	public function behaviors() {
		return [
			[
				'class' => TimestampBehavior::className(),
				'createdAtAttribute' => 'cr_date',
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
			'cust_id' => 'Cust ID',
			'contact_name' => Yii::t('cust', 'Contact Name'),
			'email' => Yii::t('cust', 'Email'),
			'tel_m' => Yii::t('cust', 'Tel M'),
			'tel_o' => Yii::t('cust', 'Tel O'),
			'tel_h' => Yii::t('cust', 'Tel H'),
			'remark' => Yii::t('cust', 'Remark'),
			'company_id' => Yii::t('cust', 'Company ID'),
			'upd_date' => 'Upd Date',
			'upd_by' => 'Upd By',
			'cr_date' => 'Cr Date',
			'cr_by' => 'Cr By',
			'usrid' => 'Usrid',
			'position' => Yii::t('cust', 'Position'),
		];
	}

	public function getCompany() {
		return $this->hasOne(Company::className(), ['id' => 'company_id']);
	}

	public function getCust() {
		return $this->hasOne(Cust::className(), ['id' => 'cust_id']);
	}

	public function getCreatedAtWithFormat() {
		return date('M d, Y H:i:s', strtotime($this->cr_date));
	}

	public function getUpdatedAtWithFormat() {
		return date('M d, Y H:i:s', strtotime($this->upd_date));
	}
}
