<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "cust_pic".
 *
 * @property integer $id
 * @property string $guid
 * @property integer $cust_id
 * @property integer $usrid
 * @property integer $company_id
 * @property string $timeid
 * @property string $pic_name
 * @property integer $pic_size
 * @property string $pic_filename
 * @property string $flag_up
 * @property string $temp_path
 * @property string $app_code
 * @property string $pic_url
 * @property integer $pic_time
 * @property string $pic_type
 * @property integer $pic_class_id
 * @property integer $upd_date
 * @property string $upd_by
 */
class CustPic extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cust_pic';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cust_id', 'usrid', 'company_id', 'pic_size', 'pic_time', 'pic_class_id', 'upd_date'], 'integer'],
            [['timeid'], 'safe'],
            [['guid', 'pic_name', 'pic_filename', 'flag_up', 'temp_path', 'app_code', 'pic_url', 'pic_type', 'upd_by'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'guid' => 'Guid',
            'cust_id' => 'Cust ID',
            'usrid' => 'Usrid',
            'company_id' => 'Company ID',
            'timeid' => 'Timeid',
            'pic_name' => 'Pic Name',
            'pic_size' => 'Pic Size',
            'pic_filename' => 'Pic Filename',
            'flag_up' => 'Flag Up',
            'temp_path' => 'Temp Path',
            'app_code' => 'App Code',
            'pic_url' => 'Pic Url',
            'pic_time' => 'Pic Time',
            'pic_type' => 'Pic Type',
            'pic_class_id' => 'Pic Class ID',
            'upd_date' => 'Upd Date',
            'upd_by' => 'Upd By',
        ];
    }
}
