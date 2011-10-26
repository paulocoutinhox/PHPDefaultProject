<?php

class m110228_210314_create_user_group_table extends CDbMigration
{
    public function up()
    {
		$this->createTable('user_group', array(
			'id'                 => 'pk',
			'user_id'            => 'int(11) NULL',
			'group_id'           => 'int(11) NULL',
		), 'ENGINE=InnoDB');
    }

    public function down()
    {
		$this->dropTable('user_group');
    }
}