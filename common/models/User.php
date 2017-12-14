<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "sp_user".
 *
 * @property integer $id
 * @property integer $company_id
 * @property string $username
 * @property string $fname
 * @property string $lname
 * @property string $pwd
 * @property integer $postion_id
 * @property integer $org_id
 * @property string $email
 * @property string $tel_m
 * @property string $pic_url
 * @property integer $user_type_id
 * @property string $cr_date
 * @property string $cr_by
 * @property string $upd_date
 * @property string $upd_by
 * @property string $guid
 * @property string $status
 * @property string $active_date
 * @property string $expire_date
 * @property string $tel_code
 * @property string $birth_date
 * @property integer $bu_id
 * @property string $users_typecom
 */
class User extends \yii\db\ActiveRecord {
	/**
	 * @inheritdoc
	 */
	public static function tableName() {
		return 'sp_user';
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
			[['id'], 'required'],
			[['id', 'company_id', 'postion_id', 'org_id', 'user_type_id', 'bu_id'], 'integer'],
			[['cr_date', 'upd_date', 'active_date', 'expire_date', 'birth_date'], 'safe'],
			[['username', 'tel_m'], 'string', 'max' => 30],
			[['fname', 'lname', 'pwd'], 'string', 'max' => 50],
			[['email', 'pic_url'], 'string', 'max' => 100],
			[['cr_by', 'upd_by'], 'string', 'max' => 20],
			[['guid'], 'string', 'max' => 200],
			[['status', 'users_typecom'], 'string', 'max' => 1],
			[['tel_code'], 'string', 'max' => 5],
		];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels() {
		return [
			'id' => 'ID',
			'company_id' => 'Company ID',
			'username' => 'Username',
			'fname' => 'Fname',
			'lname' => 'Lname',
			'pwd' => 'Pwd',
			'postion_id' => 'Postion ID',
			'org_id' => 'Org ID',
			'email' => 'Email',
			'tel_m' => 'Tel M',
			'pic_url' => 'Pic Url',
			'user_type_id' => 'User Type ID',
			'cr_date' => 'Cr Date',
			'cr_by' => 'Cr By',
			'upd_date' => 'Upd Date',
			'upd_by' => 'Upd By',
			'guid' => 'Guid',
			'status' => 'Status',
			'active_date' => 'Active Date',
			'expire_date' => 'Expire Date',
			'tel_code' => 'Tel Code',
			'birth_date' => 'Birth Date',
			'bu_id' => 'Bu ID',
			'users_typecom' => 'Users Typecom',
		];
	}
}
