<?php

use yii\db\Migration;

/**
 * Handles the creation of table `customer_contact`.
 */
class m171206_040653_create_customer_contact_table extends Migration {
	/**
	 * @inheritdoc
	 */
	public function up() {
		$this->createTable('cust_contact', [
			'id' => $this->primaryKey(),
			'cust_id' => $this->integer(),
			'contact_name' => $this->string(),
			'email' => $this->string(),
			'tel_m' => $this->string(),
			'tel_o' => $this->string(),
			'tel_h' => $this->string(),
			'remark' => $this->string(),
			'company_id' => $this->integer(),
			'upd_date' => $this->integer(),
			'upd_by' => $this->string(),
			'cr_date' => $this->integer(),
			'cr_by' => $this->string(),
			'usrid' => $this->integer(),
			'position' => $this->string(),
		]);
	}

	/**
	 * @inheritdoc
	 */
	public function down() {
		$this->dropTable('cust_contact');
	}
}
