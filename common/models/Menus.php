<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "sp_menus".
 *
 * @property integer $id
 * @property integer $menu_parent_id
 * @property string $app_code
 * @property string $menu_title
 * @property string $menu_toptip
 * @property string $menu_icon
 * @property string $menu_url
 * @property integer $menu_enable
 * @property string $upd_date
 * @property string $upd_by
 */
class Menus extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sp_menus';
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
            [['menu_parent_id'], 'required'],
            [['menu_parent_id', 'menu_enable'], 'integer'],
            [['upd_date'], 'safe'],
            [['app_code'], 'string', 'max' => 100],
            [['menu_title', 'menu_toptip'], 'string', 'max' => 300],
            [['menu_icon'], 'string', 'max' => 120],
            [['menu_url'], 'string', 'max' => 500],
            [['upd_by'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'menu_parent_id' => 'Menu Parent ID',
            'app_code' => 'App Code',
            'menu_title' => 'Menu Title',
            'menu_toptip' => 'Menu Toptip',
            'menu_icon' => 'Menu Icon',
            'menu_url' => 'Menu Url',
            'menu_enable' => 'Menu Enable',
            'upd_date' => 'Upd Date',
            'upd_by' => 'Upd By',
        ];
    }
}
