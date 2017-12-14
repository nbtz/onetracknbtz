<?php

namespace common\models;

use Yii;

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
class SpCustContact extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sp_cust_contact';
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
            [['cust_id', 'company_id', 'usrid'], 'integer'],
            [['upd_date', 'cr_date'], 'safe'],
            [['contact_name', 'email', 'remark'], 'string', 'max' => 100],
            [['tel_m', 'tel_o', 'tel_h'], 'string', 'max' => 30],
            [['upd_by', 'cr_by'], 'string', 'max' => 20],
            [['position'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'cust_id' => 'Cust ID',
            'contact_name' => 'Contact Name',
            'email' => 'Email',
            'tel_m' => 'Tel M',
            'tel_o' => 'Tel O',
            'tel_h' => 'Tel H',
            'remark' => 'Remark',
            'company_id' => 'Company ID',
            'upd_date' => 'Upd Date',
            'upd_by' => 'Upd By',
            'cr_date' => 'Cr Date',
            'cr_by' => 'Cr By',
            'usrid' => 'Usrid',
            'position' => 'Position',
        ];
    }
}
