<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "sp_map_area".
 *
 * @property integer $id
 * @property string $color
 * @property integer $begin_value
 * @property integer $end_value
 * @property integer $company_id
 * @property string $description
 * @property string $hex_color
 */
class MapArea extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sp_map_area';
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
            [['id'], 'required'],
            [['id', 'begin_value', 'end_value', 'company_id'], 'integer'],
            [['color'], 'string', 'max' => 20],
            [['description'], 'string', 'max' => 100],
            [['hex_color'], 'string', 'max' => 8],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'color' => 'Color',
            'begin_value' => 'Begin Value',
            'end_value' => 'End Value',
            'company_id' => 'Company ID',
            'description' => 'Description',
            'hex_color' => 'Hex Color',
        ];
    }
}
