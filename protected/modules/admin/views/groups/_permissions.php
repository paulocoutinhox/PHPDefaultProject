<table>

<?php
$lastModule   = '';
$countPermission = 0;

if (isset($permissions) && $permissions && count($permissions) > 0)
{
    foreach($permissions as $permission)
    {
            
        echo('<tr>');
        
        // verifica se é para exibir o nome do módulo
        if ($permission->module != $lastModule)
        {
            $lastModule = $permission->module;
            
            echo('<td colspan="2" style="padding: 5px 0; font-size: 12px; font-weight: bold;">');
            echo('<strong>Módulo: ' . $permission->module_description . '</strong>');
            echo('</td>');
            echo('</tr>');
            echo('<tr>');
        }
        
        // verifica se a caixa está marcada
        $checked = false;
        
        if (!isset($model) || (isset($_POST['permissions']) && in_array($permission->id, $_POST['permissions'])))
        {
            $checked = true;
        }
        
        if (isset($model))
        {
            if ($model->permissions && count($model->permissions) > 0)
            {
                $selectedPermissions = $model->permissions;

                if ($selectedPermissions && count($selectedPermissions) > 0)
                {
                    foreach($selectedPermissions as $selectedPermission)
                    {
                        if ($selectedPermission->permission->id == $permission->id)
                        {
                            $checked = true;
                        }
                    }
                }
            }
        }
        
        // exibe caixa de seleção                        
        echo('<td style="width: 25px;">');

		if ($this->getAction()->getId() == Constants::VIEW_ACTION)
		{
			if ($checked == true)
			{
				echo('<img src="' . Yii::app()->request->baseUrl . '/images/admin/ico_check_yes.png' . '" border="0" alt="' . Constants::YES_TEXT . '" style="float: left;" title="' . Constants::YES_TEXT . '" />');
			} 
			else
			{
				echo('<img src="' . Yii::app()->request->baseUrl . '/images/admin/ico_check_no.png' . '" border="0" alt="' . Constants::NO_TEXT . '" style="float: left;" title="' . Constants::NO_TEXT . '" />');
			}
		}
		else
		{
			echo('<input type="checkbox" id="permission_'.$permission->id.'" name="permissions[]" '.($checked == true ? 'checked="checked"' : '').' value="'.$permission->id.'" />');
		}

        echo('</td>');
        echo('<td>');
        echo($permission->action_description);
        echo('</td>');        
        echo('</tr>'); 

        $countPermission++;
    }
}
?>

</table>