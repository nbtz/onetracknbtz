<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "sp_cust_type".
 *
 * @property integer $id
 * @property string $type_code
 * @property string $type_name
 * @property integer $company_id
 * @property string $upd_date
 * @property string $upd_by
 * @property string $cr_date
 * @property string $cr_by
 * @property string $pic_url
 */
class CustType extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sp_cust_type';
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
            [['company_id'], 'integer'],
            [['upd_date', 'cr_date'], 'safe'],
            [['type_code', 'upd_by'], 'string', 'max' => 10],
            [['type_name'], 'string', 'max' => 100],
            [['cr_by'], 'string', 'max' => 20],
            [['pic_url'], 'string', 'max' => 150],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type_code' => 'Type Code',
            'type_name' => 'Type Name',
            'company_id' => 'Company ID',
            'upd_date' => 'Upd Date',
            'upd_by' => 'Upd By',
            'cr_date' => 'Cr Date',
            'cr_by' => 'Cr By',
            'pic_url' => 'Pic Url',
        ];
    }
}
