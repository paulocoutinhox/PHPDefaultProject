<?php

class m110228_203759_create_group_table extends CDbMigration
{
    public function up()
    {
		$this->createTable('group', array(
			'id'          => 'pk',
			'description' => 'varchar(255) NULL',
			'active'      => 'tinyint(1) NULL',
		), 'ENGINE=InnoDB');
    }

    public function down()
    {
		$this->dropTable('group');
    }
}