<?php

class m110228_210314_create_user_group_table extends CDbMigration
{
    public function up()
    {
		$this->createTable('user_group', array(
			'id'                 => 'bigint(20) unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY',
			'user_id'            => 'bigint(20) unsigned NULL',
			'group_id'           => 'bigint(20) unsigned NULL',
		), 'ENGINE=InnoDB');

		$this->createIndex('user_id', 'user_group', 'user_id');
		$this->createIndex('group_id', 'user_group', 'group_id');
    }

    public function down()
    {
		$this->dropTable('user_group');
    }
}