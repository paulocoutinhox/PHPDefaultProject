<?php

class m110228_210036_create_permission_table extends CDbMigration
{
    public function up()
    {
		$this->createTable('permission', array(
			'id'                 => 'pk',
			'module'             => 'varchar(255) NULL',
			'module_description' => 'varchar(255) NULL',
			'action'             => 'varchar(255) NULL',
			'action_description' => 'varchar(255) NULL',
		), 'ENGINE=InnoDB');
    }

    public function down()
    {
		$this->dropTable('permission');
    }
}