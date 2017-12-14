<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property integer $company_id
 * @property string $username
 * @property string $pwd
 * @property string $fname
 * @property string $lname
 * @property integer $postion_id
 * @property integer $org_id
 * @property string $email
 * @property string $tel_m
 * @property string $pic_url
 * @property integer $user_type_id
 * @property integer $cr_date
 * @property string $cr_by
 * @property integer $upd_date
 * @property string $upd_by
 * @property string $guid
 * @property string $status
 * @property integer $active_date
 * @property integer $expire_date
 * @property string $tel_code
 * @property string $birth_date
 * @property integer $bu_id
 * @property string $users_typecom
 * @property string $auth_key
 * @property string $password_reset_token
 */
class Usernew extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['company_id', 'postion_id', 'org_id', 'user_type_id', 'cr_date', 'upd_date', 'active_date', 'expire_date', 'bu_id'], 'integer'],
            [['username', 'pwd', 'auth_key'], 'required'],
            [['birth_date'], 'safe'],
            [['username', 'pwd', 'fname', 'lname', 'email', 'tel_m', 'pic_url', 'cr_by', 'upd_by', 'guid', 'password_reset_token'], 'string', 'max' => 255],
            [['status', 'users_typecom'], 'string', 'max' => 1],
            [['tel_code'], 'string', 'max' => 10],
            [['auth_key'], 'string', 'max' => 32],
            [['username'], 'unique'],
            [['password_reset_token'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'company_id' => 'Company ID',
            'username' => 'Username',
            'pwd' => 'Pwd',
            'fname' => 'Fname',
            'lname' => 'Lname',
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
            'auth_key' => 'Auth Key',
            'password_reset_token' => 'Password Reset Token',
        ];
    }
}
