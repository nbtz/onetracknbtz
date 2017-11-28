<?php

use yii\db\Migration;

class m130524_201442_init extends Migration {
	public function up() {
		$tableOptions = null;
		if ($this->db->driverName === 'mysql') {
			$tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
		}

		$this->createTable('{{%user}}', [
			'id' => $this->primaryKey(),
			'company_id' => $this->integer(),
			'username' => $this->string()->notNull()->unique(),
			'pwd' => $this->string()->notNull(),
			'fname' => $this->string(),
			'lname' => $this->string(),
			'postion_id' => $this->integer(),
			'org_id' => $this->integer(),
			'email' => $this->string(),
			'tel_m' => $this->string(),
			'pic_url' => $this->string(),
			'user_type_id' => $this->integer(),
			'cr_date' => $this->integer(),
			'cr_by' => $this->string(),
			'upd_date' => $this->integer(),
			'upd_by' => $this->string(),
			'guid' => $this->string(),
			'status' => $this->string(1),
			'active_date' => $this->integer(),
			'expire_date' => $this->integer(),
			'tel_code' => $this->string(10),
			'birth_date' => $this->date(),
			'bu_id' => $this->integer(),
			'users_typecom' => $this->string(1),
			'auth_key' => $this->string(32)->notNull(),
			'password_reset_token' => $this->string()->unique(),
		], $tableOptions);
	}

	public function down() {
		$this->dropTable('{{%user}}');
	}
}
