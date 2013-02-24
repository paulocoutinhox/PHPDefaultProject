<?php

class m110517_230120_create_content_table extends CDbMigration
{
	public function up()
    {
		$this->createTable('content', array(
			'id'      => 'bigint(20) unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY',
			'tag'     => 'varchar(30) DEFAULT NULL',
			'title'   => 'varchar(255) DEFAULT NULL',
			'content' => 'text',
		), 'ENGINE=InnoDB');

		$this->createIndex('tag', 'content', 'tag');

		$this->insert('content', array(
			'tag'     => 'contact',
			'title'   => 'Contato',
			'content' => '<p>Fale conosco preenchendo o formulário de contato.</p>',
		));
    }

    public function down()
    {
		$this->dropTable('content');
    }
}