<?php

class ContentsController extends AdminFormController
{
	
	protected $moduleTitle    = 'Conteúdos';
	protected $formModel      = 'AdminFormContent';
	protected $formSeachModel = 'AdminFormSearchContent';
	protected $model          = 'Content';
	
    public function actionIndex()
	{
		$this->orderFieldsForSearch = array(
			'id'    => 'código',
			'title' => 'título',
		);
		
		$this->orderFieldDefaultForSearch = 'id';
		
		$this->orderDirectionDefaultForSearch = Constants::DESC_ID;
	
		parent::actionIndex();
	}
	
	protected function createParameters()
	{
		// cria parâmetros da pesquisa
        if ($this->formSearch->id && trim($this->formSearch->id) != '')
        {
            $this->arrConditions[]  = 'id = :id';
            $this->arrParameters    = array_merge($this->arrParameters, array(':id' => $this->formSearch->id));
            $this->arrParametersUrl = array_merge($this->arrParametersUrl, array('id' => $this->formSearch->id));
        }
                
        if ($this->formSearch->title && trim($this->formSearch->title) != '')
        {
            $this->arrConditions[]  = 'title LIKE :title';
            $this->arrParameters    = array_merge($this->arrParameters, array(':title' => '%' . $this->formSearch->title . '%'));
            $this->arrParametersUrl = array_merge($this->arrParametersUrl, array('title' => $this->formSearch->title));
        }
	}

}