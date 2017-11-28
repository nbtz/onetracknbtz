<?php

use yii\db\Migration;

/**
 * Handles the creation of table `team`.
 */
class m171128_082909_create_team_table extends Migration {
	/**
	 * @inheritdoc
	 */
	public function up() {
		$this->createTable('team', [
			'id' => $this->primaryKey(),
			'name' => $this->string(),
			'upd_date' => $this->integer(),
			'upd_by' => $this->string(),
			'cr_date' => $this->integer(),
			'cr_by' => $this->string(),
		]);
	}

	/**
	 * @inheritdoc
	 */
	public function down() {
		$this->dropTable('team');
	}
}
