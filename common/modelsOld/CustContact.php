<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "cust_contact".
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
 * @property integer $upd_date
 * @property string $upd_by
 * @property integer $cr_date
 * @property string $cr_by
 * @property integer $usrid
 * @property string $position
 */
class CustContact extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cust_contact';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cust_id', 'company_id', 'upd_date', 'cr_date', 'usrid'], 'integer'],
            [['contact_name', 'email', 'tel_m', 'tel_o', 'tel_h', 'remark', 'upd_by', 'cr_by', 'position'], 'string', 'max' => 255],
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
