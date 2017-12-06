<?php

use yii\db\Migration;

/**
 * Handles the creation of table `customer_picture`.
 */
class m171206_040643_create_customer_picture_table extends Migration {
	/**
	 * @inheritdoc
	 */
	public function up() {
		$this->createTable('cust_pic', [
			'id' => $this->primaryKey(),
			'guid' => $this->string(),
			'cust_id' => $this->integer(),
			'usrid' => $this->integer(),
			'company_id' => $this->integer(),
			'timeid' => $this->date(),
			'pic_name' => $this->string(),
			'pic_size' => $this->integer(),
			'pic_filename' => $this->string(),
			'flag_up' => $this->string(),
			'temp_path' => $this->string(),
			'app_code' => $this->string(),
			'pic_url' => $this->string(),
			'pic_time' => $this->integer(),
			'pic_type' => $this->string(),
			'pic_class_id' => $this->integer(),
			'upd_date' => $this->integer(),
			'upd_by' => $this->string(),
		]);
	}

	/**
	 * @inheritdoc
	 */
	public function down() {
		$this->dropTable('cust_pic');
	}
}
