<table>

<?php
if (isset($groups) && $groups && count($groups) > 0)
{
    foreach($groups as $group)
    {
            
        echo('<tr>');
        
        // verifica se a caixa está marcada
        $checked = false;
        
        if (!isset($model) || (isset($_POST['groups']) && in_array($group->id, $_POST['groups'])))
        {
            $checked = true;
        }
        
        if (isset($model))
        {
            if ($model->groups && count($model->groups) > 0)
            {
                $selectedGroups = $model->groups;

                if ($selectedGroups && count($selectedGroups) > 0)
                {
                    foreach($selectedGroups as $selectGroup)
                    {
                        if ($selectGroup->group->id == $group->id)
                        {
                            $checked = true;
                        }
                    }
                }
            }
        }
        
        // exibe caixa de seleção                        
        echo('<td style="width: 25px;">');
        echo('<input type="checkbox" id="group_'.$group->id.'" name="groups[]" '.($checked == true ? 'checked="checked"' : '').' value="'.$group->id.'" />');
        echo('</td>');
        echo('<td>');
        echo($group->description);
        echo('</td>');        
        echo('</tr>');     
    }
}
?>

</table>