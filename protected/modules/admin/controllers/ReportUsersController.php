<?php

class ReportUsersController extends AdminFormController
{
	
	protected $moduleTitle     = 'Relatório de Usuários';
	protected $formSearchModel = 'AdminFormSearchReportUsers';
	protected $model           = 'User';

	protected $hasPagination   = false;

    public function actionIndex()
	{
		$this->orderFieldsForSearch = array(
			't.id'       => 'código',
			't.username' => 'usuário',
			't.email'    => 'e-mail',
		);
		
		$this->orderFieldDefaultForSearch = 't.id';
		
		$this->orderDirectionDefaultForSearch = Constants::DESC_ID;

		$this->criteriaForSearch = new CDbCriteria();
		$this->criteriaForSearch->select = 't.id, t.name, t.username, t.active, t.root, t.email';

		parent::actionIndex();
	}

	protected function createParameters()
	{
		// cria parâmetros da pesquisa
        if ($this->formSearch->email && trim($this->formSearch->email) != '')
        {
			$this->arrConditions[]  = 't.email = :email';
            $this->arrParameters    = array_merge($this->arrParameters, array(':email' => $this->formSearch->email));
        }

        if ($this->formSearch->username && trim($this->formSearch->username) != '')
        {
			$this->arrConditions[]  = 't.username = :username';
            $this->arrParameters    = array_merge($this->arrParameters, array(':username' => $this->formSearch->username));
        }

        if ($this->formSearch->active && trim($this->formSearch->active) != '')
        {
			$this->arrConditions[]  = 't.active = :active';
            $this->arrParameters    = array_merge($this->arrParameters, array(':active' => $this->formSearch->active));
        }
	}

	protected function actionIndexCanProcessData()
	{
		return ($this->getFormSearchData());
	}

	protected function afterActionIndex()
	{
		$this->addToRenderData('selectActive', SelectUtil::createSelectActive($this->formSearch));
		return parent::afterActionIndex();
	}

}