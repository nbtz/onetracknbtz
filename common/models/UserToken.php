<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "sp_user_token".
 *
 * @property integer $id
 * @property integer $usrid
 * @property string $usrname
 * @property string $timeid
 * @property integer $company_id
 * @property string $login_time
 * @property string $logoff_time
 * @property string $skey
 * @property string $ntf_status
 * @property string $device_name
 * @property string $app_token
 * @property string $app_uuid
 * @property string $app_code
 * @property string $cr_date
 * @property string $cr_by
 * @property string $upd_date
 * @property string $upd_by
 */
class UserToken extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sp_user_token';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('pgsql');
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['usrid', 'company_id'], 'integer'],
            [['timeid', 'login_time', 'logoff_time', 'cr_date', 'upd_date'], 'safe'],
            [['usrname', 'cr_by', 'upd_by'], 'string', 'max' => 120],
            [['skey', 'app_uuid'], 'string', 'max' => 100],
            [['ntf_status'], 'string', 'max' => 1],
            [['device_name'], 'string', 'max' => 30],
            [['app_token'], 'string', 'max' => 200],
            [['app_code'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'usrid' => 'Usrid',
            'usrname' => 'Usrname',
            'timeid' => 'Timeid',
            'company_id' => 'Company ID',
            'login_time' => 'Login Time',
            'logoff_time' => 'Logoff Time',
            'skey' => 'Skey',
            'ntf_status' => 'Ntf Status',
            'device_name' => 'Device Name',
            'app_token' => 'App Token',
            'app_uuid' => 'App Uuid',
            'app_code' => 'App Code',
            'cr_date' => 'Cr Date',
            'cr_by' => 'Cr By',
            'upd_date' => 'Upd Date',
            'upd_by' => 'Upd By',
        ];
    }
}
