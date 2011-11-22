<?php

class m111122_235003_add_username_email_index_on_customer extends CDbMigration
{
	public function up()
	{
        $this->createIndex('username', 'customer', 'username', true);
        $this->createIndex('email', 'customer', 'email', true);
	}

	public function down()
	{
        $this->dropIndex('username', 'customer');
        $this->dropIndex('email', 'customer');
	}
}