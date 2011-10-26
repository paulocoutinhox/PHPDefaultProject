<?php

class GroupPermission extends Table
{
	
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function tableName()
	{
		return 'group_permission';
	}

	public function rules()
	{
		return array(
			array('group_id, permission_id', 'numerical', 'integerOnly'=>true),
		);
	}

	public function relations()
	{
		return array(
			'permissions' => array(self::HAS_MANY, 'Permission', 'id'),
            'groups'      => array(self::HAS_MANY, 'Group', 'id'),
            'group'       => array(self::BELONGS_TO, 'Group', 'group_id'),
            'permission'  => array(self::BELONGS_TO, 'Permission', 'permission_id'),
		);
	}

	public function attributeLabels()
	{
		return array(
			'id' => 'Código',
			'group_id' => 'Grupo',
			'permission_id' => 'Permissão',
		);
	}

}