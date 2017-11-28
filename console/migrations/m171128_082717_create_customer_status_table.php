<?php

use yii\db\Migration;

/**
 * Handles the creation of table `customer_status`.
 */
class m171128_082717_create_customer_status_table extends Migration {
	/**
	 * @inheritdoc
	 */
	public function up() {
		$this->createTable('cust_status', [
			'id' => $this->primaryKey(),
			'code' => $this->string(),
			'sts_name' => $this->string(),
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
		$this->dropTable('cust_status');
	}
}
