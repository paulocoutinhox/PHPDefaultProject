<?php

class PermissionsController extends AdminFormController
{
	
	protected $moduleTitle    = 'Permissões';
	protected $formModel      = 'AdminFormPermission';
	protected $formSearchModel = 'AdminFormSearchPermission';
	protected $model          = 'Permission';
	
    public function actionIndex()
	{
		$this->orderFieldsForSearch = array(
			'id'                 => 'código',
			'module'             => 'módulo',
			'module_description' => 'descrição do módulo',
			'action'             => 'ação',
			'action_description' => 'descrição da ação',
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
		
        if ($this->formSearch->module && trim($this->formSearch->module) != '')
        {
            $this->arrConditions[]  = 'module LIKE :module';
            $this->arrParameters    = array_merge($this->arrParameters, array(':module' => '%' . $this->formSearch->module . '%'));
            $this->arrParametersUrl = array_merge($this->arrParametersUrl, array('module' => $this->formSearch->module));
        }
		
        if ($this->formSearch->action && trim($this->formSearch->action) != '')
        {
            $this->arrConditions[]  = 'action LIKE :action';
            $this->arrParameters    = array_merge($this->arrParameters, array(':action' => '%' . $this->formSearch->action . '%'));
            $this->arrParametersUrl = array_merge($this->arrParametersUrl, array('action' => $this->formSearch->action));
        }
	}

	public function actionGeneratepermissions()
	{
		$generate = false;

		if (isset($_POST['generate']) && (int)$_POST['generate'] == 1)
		{
			$generate = true;
		}

		if ($generate == true)
		{
			$modules = array();

			// permissões interna do sistema - não alterar
			$modules[] = array('module_name' => 'groups',
							   'module_description' => 'Grupos',
							   'actions' => array('menu' => 'Visualizar o menu deste módulo',
												  'add'    => 'Adicionar',
												  'update' => 'Alterar',
												  'delete' => 'Excluir',
												  'view'   => 'Visualizar',
												  'index'  => 'Exibição inicial'
												  )
							  );

			$modules[] = array('module_name' => 'profile',
							   'module_description' => 'Meus dados',
							   'actions' => array('menu' => 'Visualizar o menu deste módulo',
												  'index' => 'Alteração dos dados'
												  )
							  );

			$modules[] = array('module_name' => 'permissions',
							   'module_description' => 'Permissões',
							   'actions' => array('menu' => 'Visualizar o menu deste módulo',
												  'add'    => 'Adicionar',
												  'update' => 'Alterar',
												  'delete' => 'Excluir',
												  'view'   => 'Visualizar',
												  'index'  => 'Exibição inicial',
												  'generatepermissions' => 'Recriar todas as permissões do sistema'
												  )
							  );

			$modules[] = array('module_name' => 'users',
							   'module_description' => 'Usuários',
							   'actions' => array('menu' => 'Visualizar o menu deste módulo',
												  'add'    => 'Adicionar',
												  'update' => 'Alterar',
												  'delete' => 'Excluir',
												  'view'   => 'Visualizar',
												  'index'  => 'Exibição inicial'
												  )
							  );

			$modules[] = array('module_name' => 'home',
							   'module_description' => 'Painel administrativo do sistema',
							   'actions' => array('index'         => 'Página inicial',
												  'security_menu' => 'Exibição do menu de segurança',
												  'report_menu'   => 'Exibição do menu de relatório',
												 )
							  );

			$modules[] = array('module_name' => 'help',
							   'module_description' => 'Página de ajuda',
							   'actions' => array('index' => 'Página inicial')
							  );

			$modules = array_merge($modules, $this->getOtherPermissions());


			if (isset($_POST['truncateTable']) && (int)$_POST['truncateTable'] == 1)
			{
				Yii::app()->db->createCommand()->truncateTable(Permission::model()->tableName());
			}

			foreach($modules as $module)
			{
				foreach($module['actions'] as $action => $action_description)
				{
					$permission = Permission::model()->withModuleAndAction($module['module_name'], $action)->findAll();

					if ($permission && count($permission) > 0)
					{
						$permission[0]->module             = $module['module_name'];
						$permission[0]->module_description = $module['module_description'];
						$permission[0]->action             = $action;
						$permission[0]->action_description = $action_description;
						$permission[0]->update();
					}
					else
					{
						$permission = new Permission();
						$permission->module             = $module['module_name'];
						$permission->module_description = $module['module_description'];
						$permission->action             = $action;
						$permission->action_description = $action_description;
						$permission->save();
					}
				}
			}

			// envia o retorno para a home
			UserUtil::getAdminWebUser()->setFlash(Constants::SUCCESS_MESSAGE_ID, 'Permissões geradas com sucesso.');
			$this->redirect(array('/admin/' . $this->getId() . '/' . $this->getAction()->getId()));
		}
		else
		{
			$this->render($this->getAction()->getId(), array(
				'moduleTitle' => $this->moduleTitle,
			));
		}
    }

	private function getOtherPermissions()
	{
		$modules = array();
		
		$modules[] = array('module_name' => 'contents',
						   'module_description' => 'Conteúdos',
						   'actions' => array('menu'   	   	      => 'Visualizar o menu deste módulo',
											  'add'    	   	      => 'Adicionar',
											  'update' 	   	      => 'Alterar',
											  'delete' 	   	      => 'Excluir',
											  'view'   	   	      => 'Visualizar',
											  'index'		      => 'Exibição inicial',
											  )
						  );

		$modules[] = array('module_name' => 'reportUsers',
						   'module_description' => 'Relatório de Usuários',
						   'actions' => array('menu'   	   	      => 'Visualizar o menu deste módulo',
											  'index'		      => 'Exibição inicial',
											  )
						  );

		return $modules;
	}

}