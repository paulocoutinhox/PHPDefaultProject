<?php

class m110228_205845_create_group_permission_table extends CDbMigration
{
    public function up()
    {
		$this->createTable('group_permission', array(
			'id'       => 'bigint(20) unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY',
			'group_id' => 'bigint(20) unsigned NULL',
			'module'   => 'varchar(255) NULL',
			'action'   => 'varchar(255) NULL',
		), 'ENGINE=InnoDB');

		$this->createIndex('group_id', 'group_permission', 'group_id');
		$this->createIndex('module_action', 'group_permission', 'module, action');
    }

    public function down()
    {
		$this->dropTable('group_permission');
    }
}