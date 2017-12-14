<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "sp_cust".
 *
 * @property integer $id
 * @property integer $usrid
 * @property string $timeid
 * @property integer $company_id
 * @property string $cust_name
 * @property string $lat
 * @property string $lng
 * @property string $remark
 * @property integer $radius
 * @property string $the_geom
 * @property integer $cust_type_id
 * @property string $cr_date
 * @property string $cr_by
 * @property string $app_code
 * @property integer $type_id
 * @property string $refno
 * @property integer $sts_id
 * @property string $upd_date
 * @property string $upd_by
 * @property string $guid
 * @property integer $map_zoom_level
 * @property string $tel_m
 * @property string $admin_level1
 * @property string $admin_level2
 * @property string $email
 * @property integer $admin_level1_id
 * @property integer $admin_level2_id
 * @property string $last_chk_in
 * @property string $cust_code
 */
class SpCust extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sp_cust';
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
            [['usrid', 'company_id', 'radius', 'cust_type_id', 'type_id', 'sts_id', 'map_zoom_level', 'admin_level1_id', 'admin_level2_id'], 'integer'],
            [['timeid', 'cr_date', 'upd_date', 'last_chk_in'], 'safe'],
            [['lat', 'lng'], 'number'],
            [['the_geom'], 'string'],
            [['cust_name', 'remark', 'app_code', 'guid', 'admin_level1', 'admin_level2'], 'string', 'max' => 100],
            [['cr_by', 'refno', 'upd_by'], 'string', 'max' => 20],
            [['tel_m'], 'string', 'max' => 30],
            [['email'], 'string', 'max' => 50],
            [['cust_code'], 'string', 'max' => 10],
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
            'timeid' => 'Timeid',
            'company_id' => 'Company ID',
            'cust_name' => 'Cust Name',
            'lat' => 'Lat',
            'lng' => 'Lng',
            'remark' => 'Remark',
            'radius' => 'Radius',
            'the_geom' => 'The Geom',
            'cust_type_id' => 'Cust Type ID',
            'cr_date' => 'Cr Date',
            'cr_by' => 'Cr By',
            'app_code' => 'App Code',
            'type_id' => 'Type ID',
            'refno' => 'Refno',
            'sts_id' => 'Sts ID',
            'upd_date' => 'Upd Date',
            'upd_by' => 'Upd By',
            'guid' => 'Guid',
            'map_zoom_level' => 'Map Zoom Level',
            'tel_m' => 'Tel M',
            'admin_level1' => 'Admin Level1',
            'admin_level2' => 'Admin Level2',
            'email' => 'Email',
            'admin_level1_id' => 'Admin Level1 ID',
            'admin_level2_id' => 'Admin Level2 ID',
            'last_chk_in' => 'Last Chk In',
            'cust_code' => 'Cust Code',
        ];
    }
}
