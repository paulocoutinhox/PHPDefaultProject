<?php

class m110301_190310_create_user_table extends CDbMigration
{
    public function up()
    {
		$this->createTable('user', array(
			'id'              => 'bigint(20) unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY',
			'name'            => 'varchar(20) NULL',
			'active'          => 'tinyint(1) NOT NULL',
			'username'        => 'varchar(255) NOT NULL',
			'password'        => 'varchar(255) NOT NULL',
			'root'            => 'tinyint(1) NULL',
			'email'           => 'varchar(255) NOT NULL',
		), 'ENGINE=InnoDB');

		$this->createIndex('username', 'user', 'username');
		$this->createIndex('email', 'user', 'email');
		$this->createIndex('active', 'user', 'active');
		$this->createIndex('root', 'user', 'root');

		$this->insert('user', array(
			'id'              => '1',
			'name'            => 'Administrador',
			'active'          => '1',
			'username'        => 'admin',
			'password'        => md5('teste'),
			'root'            => '1',
			'email'           => 'paulo@prsolucoes.com',
		));
    }

    public function down()
    {
		$this->dropTable('user');
    }
}