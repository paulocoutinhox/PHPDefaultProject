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
			array('group_id, module, action', 'required'),
			array('group_id', 'numerical', 'integerOnly' => true),
			array('module, action', 'length', 'max'=>255),
		);
	}

	public function relations()
	{
		return array(
			'groups' => array(self::HAS_MANY, 'Group', 'id'),
            'group'  => array(self::BELONGS_TO, 'Group', 'group_id'),
		);
	}

	public function attributeLabels()
	{
		return array(
			'id'       => 'Código',
			'group_id' => 'Grupo',
			'module'   => 'Módulo',
			'action'   => 'Ação',
		);
	}

}