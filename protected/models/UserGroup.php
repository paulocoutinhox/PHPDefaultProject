<?php

class UserGroup extends Table
{
	
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function tableName()
	{
		return 'user_group';
	}

	public function rules()
	{
		return array(
			array('user_id, group_id', 'numerical', 'integerOnly'=>true),
		);
	}

	public function relations()
	{
		return array(
			'groups' => array(self::HAS_MANY, 'Group', 'id'),
            'users' => array(self::HAS_MANY, 'User', 'id'),
            'group' => array(self::BELONGS_TO, 'Group', 'group_id'),
		);
	}

	public function attributeLabels()
	{
		return array(
			'id' => 'Código',
			'user_id' => 'Usuário',
			'group_id' => 'Grupo',
		);
	}

}