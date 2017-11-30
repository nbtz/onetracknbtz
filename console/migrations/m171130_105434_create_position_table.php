<?php

use yii\db\Migration;

/**
 * Handles the creation of table `position`.
 */
class m171130_105434_create_position_table extends Migration {
	/**
	 * @inheritdoc
	 */
	public function up() {
		$this->createTable('position', [
			'id' => $this->primaryKey(),
			'postion_name' => $this->string(),
			'upd_date' => $this->integer(),
			'upd_by' => $this->string(),
			'company_id' => $this->integer(),
			'status' => $this->string(),
		]);
	}

	/**
	 * @inheritdoc
	 */
	public function down() {
		$this->dropTable('position');
	}
}
