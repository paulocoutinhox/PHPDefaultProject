<?php

class m110228_210036_create_permission_table extends CDbMigration
{
    public function up()
    {
		$this->createTable('permission', array(
			'id'                 => 'bigint(20) unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY',
			'module'             => 'varchar(255) NULL',
			'module_description' => 'varchar(255) NULL',
			'action'             => 'varchar(255) NULL',
			'action_description' => 'varchar(255) NULL',
		), 'ENGINE=InnoDB');

		$this->createIndex('module', 'permission', 'module');
		$this->createIndex('action', 'permission', 'action');
		$this->createIndex('module_action', 'permission', 'module, action');
    }

    public function down()
    {
		$this->dropTable('permission');
    }
}