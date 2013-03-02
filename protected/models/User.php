<?php

class User extends Table
{

	protected $salt = '';

	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function tableName()
	{
		return 'user';
	}

	public function rules()
	{
		return array(
			array('active, email, username, password', 'required'),
			array('active, root', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>20),
			array('username, email, password', 'length', 'max'=>255),
			array('username', 'uniqueUsername'),
		);
	}

	public function relations()
	{
		return array(
			'groups' => array(self::HAS_MANY, 'UserGroup', 'user_id'),
		);
	}

	public function attributeLabels()
	{
		return array(
			'id'       => 'Código',
			'name'     => 'Nome',
			'email'    => 'Email',
			'active'   => 'Ativo',
			'username' => 'Usuário',
			'password' => 'Senha',
			'root'     => 'Super usuário',
		);
	}

	public function validatePassword($password)
    {
        return $this->hashPassword($password,$this->salt)===$this->password;
    }

    public function hashPassword($password,$salt)
    {
        return md5($salt.$password);
    }

    public function getSalt()
    {
        return $this->salt;
    }

    public static function hasPermission($module, $action, $checkRoot = true)
    {
        $result = false;
		
        $userId = (int)UserUtil::getAdminWebUser()->getId();

        if ($userId == 0)
        {
            $result = false;
        }
        else
        {
            $user = User::model()->findByPk($userId);

            if (!$user)
            {
                $result = false;
            }
            else if ($user->active == Constants::YES_ID && $user->root == Constants::YES_ID && $checkRoot == true)
            {
                $result = true;

                // descarrega dados
                unset($userId);
                unset($user);

                return $result;
            }
            else
            {
                $sql = "
                SELECT
                    COUNT(*) AS qty
                FROM
                    `group` g
                INNER JOIN
                    user_group ug ON ug.group_id = g.id
                INNER JOIN
                    group_permission gp ON gp.group_id = ug.group_id
                WHERE
                    ug.user_id = :userId
                    AND g.active = :active
                    AND gp.module = :module
                    AND gp.action = :action
                ";

				$active = Constants::YES_ID;

                $command = Yii::app()->db->createCommand($sql);
				$command->bindParam(':userId', $userId);
				$command->bindParam(':active', $active);
				$command->bindParam(':module', $module);
				$command->bindParam(':action', $action);

                $qty = (int)$command->queryScalar();

				if ($qty > 0)
				{
					$result = true;
				}
            }

        }

        return $result;
    }

	public static function clearGroups($user_id)
	{
		$user = User::model()->findByPk($user_id);

        if ($user)
        {
            $groups = $user->groups;

            if ($groups && count($groups) > 0)
            {
                foreach($groups as $group)
                {
                    $group->delete();
                }
            }
        }
	}

	public static function addGroup($user_id, $groups)
	{
		$user = User::model()->findByPk($user_id);

        if ($user)
        {
            foreach($groups as $group)
            {
                $userGroup = new UserGroup();
                $userGroup->user_id  = $user_id;
                $userGroup->group_id = $group;
                $userGroup->save();
            }
        }
	}

    protected function beforeDelete()
    {
        User::clearGroups($this->id);
        return parent::beforeDelete();
    }

	public function uniqueUsername($attribute, $params)
	{
		if (empty($this->username) == false)
		{
			if ($this->id > 0)
			{
				$user = User::model()->findByAttributes( array('username' => trim($this->username)));

				if ($user != null && $user->id != $this->id)
				{
					$this->addError('username', 'Este nome de usuário já está sendo usado');
				}
			}
			else
			{
				$user = User::model()->findByAttributes( array('username' => trim($this->username)));

				if ($user != null)
				{
					$this->addError('username', 'Este nome de usuário já está sendo usado');
				}
			}
		}
	}

}