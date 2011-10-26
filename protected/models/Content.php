<?php

class Content extends Table
{
	
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	public function tableName()
	{
		return 'content';
	}

	public function rules()
	{
		return array(
			array('tag', 'length', 'max'=>30),
			array('title', 'length', 'max'=>255),
			array('content', 'safe'),
			array('title', 'required'),
		);
	}

	public function relations()
	{
		return array(
		);
	}

	public function attributeLabels()
	{
		return array(
			'id'      => 'Código',
			'tag'     => 'Tag',
			'title'   => 'Título',
			'content' => 'Conteúdo',
		);
	}

}