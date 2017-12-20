<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

/**
 * This is the model class for table "sp_company".
 *
 * @property integer $id
 * @property integer $company_id
 * @property string $company_name
 * @property string $address
 * @property string $cr_date
 * @property string $cr_by
 * @property string $upd_date
 * @property string $upd_by
 * @property string $status
 * @property string $guid
 * @property integer $org_id
 * @property string $customer_code
 * @property integer $tax_id
 * @property integer $company_type
 * @property string $country_code
 * @property string $contact_name
 * @property integer $province
 * @property integer $district
 * @property integer $postal_code
 * @property integer $fax
 * @property integer $phone_number
 * @property string $website
 */
class Company extends \yii\db\ActiveRecord {
	/**
	 * @inheritdoc
	 */
	public static function tableName() {
		return 'sp_company';
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
	public function rules() {
		return [
			// [['id'], 'required'],
			[['company_name', 'contact_name'], 'required'],
			[['id', 'company_id', 'org_id', 'tax_id', 'company_type', 'province', 'district', 'fax', 'phone_number', 'postal_code'], 'integer'],
			[['cr_date', 'upd_date'], 'safe'],
			[['company_name', 'cr_by', 'upd_by'], 'string', 'max' => 20],
			[['address'], 'string', 'max' => 400],
			[['status'], 'string', 'max' => 1],
			[['guid'], 'string', 'max' => 200],
			[['customer_code', 'website'], 'string', 'max' => 100],
			[['country_code'], 'string', 'max' => 10],
			[['contact_name'], 'string', 'max' => 50],
			// [['postal_code'],'integer','max'=>],
			// [['postal_code'], 'match', 'pattern' => '/([0-9]\d){5,5}$/', 'message' => 'อักษรที่อนุญาตคือตัวเลขเท่านั้น '],

		];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels() {
		return [
			'id' => 'ID',
			'company_id' => Yii::t('company', 'Company ID'),
			'company_name' => Yii::t('company', 'Company Name'),
			'address' => Yii::t('company', 'Address'),
			'cr_date' => Yii::t('company', 'Cr Date'),
			'cr_by' => Yii::t('company', 'Cr By'),
			'upd_date' => Yii::t('company', 'Upd Date'),
			'upd_by' => Yii::t('company', 'Upd By'),
			'status' => Yii::t('company', 'Status'),
			'guid' => Yii::t('company', 'Guid'),
			'org_id' => Yii::t('company', 'Org ID'),
			'customer_code' => Yii::t('company', 'Customer Code'),
			'tax_id' => Yii::t('company', 'Tax ID'),
			'company_type' => Yii::t('company', 'Company Type'),
			'country_code' => Yii::t('company', 'Country Code'),
			'contact_name' => Yii::t('company', 'Contact Name'),
			'province' => Yii::t('company', 'Province'),
			'district' => Yii::t('company', 'District'),
			'postal_code' => Yii::t('company', 'Postal Code'),
			'fax' => Yii::t('company', 'Fax'),
			'phone_number' => Yii::t('company', 'Phone Number'),
			'website' => Yii::t('company', 'Website'),
		];
	}
}
