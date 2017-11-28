<?php

use yii\db\Migration;

/**
 * Handles the creation of table `customer`.
 */
class m171128_082547_create_customer_table extends Migration {
	/**
	 * @inheritdoc
	 */
	public function up() {
		$tableOptions = null;
		if ($this->db->driverName === 'mysql') {
			$tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
		}

		$this->createTable('{{%cust}}', [
			'id' => $this->primaryKey(),
			'usrid' => $this->integer(),
			'timeid' => $this->date(),
			'company_id' => $this->integer(),
			'cust_name' => $this->string(),
			'lat' => $this->double(),
			'lng' => $this->double(),
			'remark' => $this->string(),
			'radius' => $this->integer(),
			'the_geom' => $this->double(),
			'cust_type_id' => $this->integer(),
			'cr_date' => $this->integer(),
			'cr_by' => $this->string(),
			'app_code' => $this->string(),
			'type_id' => $this->integer(),
			'refno' => $this->string(),
			'sts_id' => $this->integer(),
			'upd_date' => $this->integer(),
			'upd_by' => $this->string(),
			'guid' => $this->string(),
			'map_zoom_level' => $this->integer(),
			'tel_m' => $this->string(),
			'admin_level1' => $this->string(),
			'admin_level2' => $this->string(),
			'email' => $this->string(),
			'admin_level1_id' => $this->integer(),
			'admin_level2_id' => $this->integer(),
			'last_chk_in' => $this->integer(),
			'cust_code' => $this->string(),
		], $tableOptions);
	}

	public function down() {
		$this->dropTable('{{%cust}}');
	}
}
