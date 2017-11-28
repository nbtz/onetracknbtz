<?php

use yii\db\Migration;

/**
 * Handles the creation of table `customer_type`.
 */
class m171128_082708_create_customer_type_table extends Migration {
	/**
	 * @inheritdoc
	 */
	public function up() {
		$this->createTable('cust_type', [
			'id' => $this->primaryKey(),
			'type_code' => $this->string(),
			'type_name' => $this->string(),
			'company_id' => $this->integer(),
			'upd_date' => $this->integer(),
			'upd_by' => $this->string(),
			'cr_date' => $this->integer(),
			'cr_by' => $this->string(),
			'pic_url' => $this->string(),
		]);
	}

	/**
	 * @inheritdoc
	 */
	public function down() {
		$this->dropTable('cust_type');
	}
}
