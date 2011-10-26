<?php

class m110504_011352_create_customer_table extends CDbMigration
{
	
	public function up()
    {
		$this->createTable('customer', array(
			'id'				 	  => 'bigint(20) NOT NULL AUTO_INCREMENT PRIMARY KEY',
			'name'				 	  => 'varchar(50) NOT NULL',
			'username'			 	  => 'varchar(255) NOT NULL',
			'password'			 	  => 'varchar(255) NOT NULL',
			'email'				 	  => 'varchar(255) NOT NULL',
			'gender'			 	  => 'tinyint(1) DEFAULT NULL',
			'birth_date'		 	  => 'date DEFAULT NULL',
			'status'             	  => 'tinyint(1) NOT NULL',
			'created_at'         	  => 'datetime NOT NULL',
			'activation_token'		  => 'varchar(255) DEFAULT NULL',
			'recovery_password_token' => 'varchar(255) DEFAULT NULL',
		), 'ENGINE=InnoDB');

		$this->insert('customer', array(
			'id'                 	  => '1',
			'name'               	  => 'Demo',
			'status'             	  => '1',
			'username'           	  => 'demo',
			'password'           	  => md5('demo'),
			'email'              	  => 'paulo@prsolucoes.com',
			'gender'             	  => 1,
			'birth_date'         	  => '1985-09-07',
			'status'             	  => 1,
			'created_at'         	  => new CDbExpression('NOW()'),
			'activation_token'        => null,
			'recovery_password_token' => null,
		));
		
    }

    public function down()
    {
		$this->dropTable('customer');
    }
	
}