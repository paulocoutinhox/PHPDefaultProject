<?php

class Permission extends Table
{
	
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function tableName()
	{
		return 'permission';
	}

	public function rules()
	{
		return array(
			array('module, module_description, action, action_description', 'length', 'max'=>255),
			array('module, action', 'required'),
		);
	}

	public function relations()
	{
		return array(
			'groups' => array(self::HAS_MANY, 'GroupPermission', '(module, action)'),
		);
	}

	public function attributeLabels()
	{
		return array(
			'id'                 => 'Código',
			'module'             => 'Módulo',
			'module_description' => 'Descrição do módulo',
			'action'             => 'Ação',
			'action_description' => 'Descrição da ação',
		);
	}

    public function orderByModule()
    {
        $this->getDbCriteria()->mergeWith(array(
            'order' => 'module'
        ));

        return $this;
    }

	public static function clearAssociations($id)
	{
		$permission = Permission::model()->findByPk($id);

        if ($permission)
        {
            $associations = $permission->groups;

            if ($associations && count($associations) > 0)
            {
                foreach($associations as $association)
                {
                    $association->delete();
                }
            }
        }
	}

    protected function beforeDelete()
    {
        Permission::clearAssociations($this->id);
        return parent::beforeDelete();
    }

    public function withModuleAndAction($module, $action)
    {
        $this->getDbCriteria()->mergeWith(array(
            'condition' => 'module = :module AND action = :action',
            'params'    => array(':module' => $module, ':action' => $action),
        ));

        return $this;
    }

	public function canModifyOrDelete()
	{
		if ($this->groups && count($this->groups) > 0)
		{
			return array('success' => false, 'message' => 'Esta permissão possui ' . count($this->groups) . ' grupos associados.');
		}

		return array('success' => true, 'message' => '');
	}

}