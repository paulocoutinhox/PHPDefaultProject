<?php

class m110228_203759_create_group_table extends CDbMigration
{
    public function up()
    {
		$this->createTable('group', array(
			'id'          => 'bigint(20) unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY',
			'description' => 'varchar(255) NULL',
			'active'      => 'tinyint(1) NULL',
		), 'ENGINE=InnoDB');

		$this->createIndex('active', 'group', 'active');
    }

    public function down()
    {
		$this->dropTable('group');
    }
}