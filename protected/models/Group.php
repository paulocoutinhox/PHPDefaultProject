<?php

class Group extends Table
{

	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function tableName()
	{
		return 'group';
	}

	public function rules()
	{
		return array(
			array('active', 'numerical', 'integerOnly'=>true),
			array('description', 'length', 'max'=>255),	
			array('description, active', 'required'),
		);
	}

	public function relations()
	{
		return array(
			'permissions' => array(self::HAS_MANY, 'GroupPermission', 'group_id'),
            'userGroups' => array(self::HAS_MANY, 'UserGroup', 'group_id'),
		);
	}

	public function attributeLabels()
	{
		return array(
			'id' => 'Código',
			'description' => 'Descrição',
			'active' => 'Ativo',
		);
	}

	public static function clearPermissions($id)
	{
		$group = Group::model()->findByPk($id);

        if ($group)
        {
            $permissions = $group->permissions;

            if ($permissions && count($permissions) > 0)
            {
                foreach($permissions as $permission)
                {
                    $permission->delete();
                }
            }
        }
	}

	public static function addPermissions($id, $permissions)
	{
		$group = Group::model()->findByPk($id);

        if ($group)
        {
            foreach($permissions as $permission)
            {
                $groupPermission = new GroupPermission();
                $groupPermission->group_id      = $id;
                $groupPermission->permission_id = $permission;
                $groupPermission->save();
            }
        }
	}

    protected function beforeDelete()
    {
        Group::clearPermissions($this->id);
        return parent::beforeDelete();
    }

    public function active()
    {
        $this->getDbCriteria()->mergeWith(array(
            'condition' => 'active=1'
        ));

        return $this;
    }

    public function orderByDescription()
    {
        $this->getDbCriteria()->mergeWith(array(
            'order' => 'description'
        ));

        return $this;
    }

	public function canModifyOrDelete()
	{
		if ($this->userGroups && count($this->userGroups) > 0)
		{
			return array('success' => false, 'message' => 'Este grupo possui ' . count($this->userGroups) . ' usuários associados.');
		}

		return array('success' => true, 'message' => '');
	}

}