<?php

class m110228_205845_create_group_permission_table extends CDbMigration
{
    public function up()
    {
		$this->createTable('group_permission', array(
			'id'            => 'bigint(20) unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY',
			'group_id'      => 'bigint(20) unsigned NULL',
			'permission_id' => 'bigint(20) unsigned NULL',
		), 'ENGINE=InnoDB');

		$this->createIndex('group_id', 'group_permission', 'group_id');
		$this->createIndex('permission_id', 'group_permission', 'permission_id');
    }

    public function down()
    {
		$this->dropTable('group_permission');
    }
}