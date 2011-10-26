<?php

class m110228_205845_create_group_permission_table extends CDbMigration
{
    public function up()
    {
		$this->createTable('group_permission', array(
			'id'            => 'pk',
			'group_id'      => 'int(11) NULL',
			'permission_id' => 'int(11) NULL',
		), 'ENGINE=InnoDB');
    }

    public function down()
    {
		$this->dropTable('group_permission');
    }
}