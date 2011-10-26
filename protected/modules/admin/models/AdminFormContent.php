<?php

class AdminFormContent extends AdminForm
{
	public $id;
	public $title;
	public $content;
	public $tag;
	
    public function init()
    {
        parent::init();    
    }
    
	public function rules()
	{
		return array_merge(
        array(
			array('tag', 'length', 'max'=>30),
			array('title', 'length', 'max'=>255),
			array('content', 'safe'),
			array('title', 'required'),
		),
		parent::rules());
	}

	public function attributeLabels()
	{
		return array_merge(
        array(
			'id'      => 'Código',
			'tag'     => 'Tag',
			'title'   => 'Título',
			'content' => 'Conteúdo',
		),
		parent::attributeLabels());
	}

}
