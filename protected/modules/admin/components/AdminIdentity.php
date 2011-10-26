<?php

class AdminIdentity extends CUserIdentity
{
	
	private $model;

	const ERROR_INACTIVE = 3;

	public function authenticate()
	{
        Yii::trace('Iniciando autenticacao do usuário (' . strtolower($this->username) . ')...');
		
		$this->model = User::model()->find('username = ?', array(trim(strtolower($this->username))));
        
        if($this->model === null)
        {
            $this->errorCode = self::ERROR_USERNAME_INVALID;
			Yii::trace('Erro de autenticação, usuário inválido (' . $this->errorCode . ')');
        }
		else if($this->model->active != Constants::YES_ID)
		{
			$this->errorCode = self::ERROR_INACTIVE;
			Yii::trace('Erro de autenticação, usuário inativo (' . $this->errorCode . ')');
		}
		else if(!$this->model->validatePassword($this->password))
        {
            $this->errorCode = self::ERROR_PASSWORD_INVALID;
			Yii::trace('Erro de autenticação, senha inválida (' . $this->errorCode . ')');
        }
        else
        {
            Yii::trace('Usuário autenticado com sucesso (' . $this->username . ')');

			$this->errorCode = self::ERROR_NONE;
            
			UserUtil::getAdminWebUser()->setId($this->model->id);
			UserUtil::getAdminWebUser()->setName($this->model->username);
			
			$this->username = UserUtil::getAdminWebUser()->getId();
			
			$this->setState('name'  , $this->model->name);
            $this->setState('email' , $this->model->email);
			$this->setState('root'  , $this->model->root);			
        }
        
        return $this->errorCode == self::ERROR_NONE;
	}

	public function getModel()
    {
        return $this->model;
    }

}