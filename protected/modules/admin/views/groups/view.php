<?php $this->beginWidget('application.modules.admin.components.BoxWidget', array('title' => $moduleTitle . ' / visualizar registro', 'width' => '100%', 'image' => 'ico_visualizar.png')); ?>
    
    <div class="buttons">
    
        <?php $this->widget('ButtonWidget', array('title' => 'Voltar', 'link' => $this->createUrl('/admin/' . $this->getId()))); ?>
        <?php $this->widget('ButtonWidget', array('title' => 'Novo registro', 'link' => $this->createUrl('/admin/' . $this->getId() . '/add'))); ?>
        <?php $this->widget('ButtonWidget', array('title' => 'Alterar', 'link' => $this->createUrl('/admin/' . $this->getId() . '/update/id/' . $model->id))); ?>
        <?php $this->widget('ButtonWidget', array('title' => 'Excluir', 'link' => 'javascript: deleteRow(\'' . $this->createUrl($this->getId() . '/delete/id/' . $model->id) . '\');')); ?>
            
    </div>
    
    <div class="clear separator"></div>
    
    <div class="form">
        
        <fieldset>
            
            <legend>Dados</legend>
             
            <span class="row">
                <?php echo CHtml::activeLabel($model, 'id', array('class' => 'preField')); ?>
                <span class="disabledField"><?php echo $model->id; ?></span>
            </span>
                        
            <span class="row">
                <?php echo CHtml::activeLabel($model, 'description', array('class' => 'preField')); ?>
                <span class="disabledField"><?php echo($model->description); ?></span>
            </span>

            <span class="row">
                <?php echo CHtml::activeLabel($model, 'active', array('class' => 'preField')); ?>
                <span class="disabledField">
					<?php 
					if ($model->active == Constants::YES_ID)
					{
						echo(Constants::YES_TEXT);
					}
					else if ($model->active == Constants::NO_ID)
					{
						echo(Constants::NO_TEXT);
					}
					?>
				</span>
            </span>

        </fieldset>

		<fieldset>

            <legend>Permissões</legend>

            <table>

            <?php $this->renderPartial('_permissions', array('model' => $model, 'permissions' => $permissions)); ?>

            </table>

        </fieldset>
                
    </div>
    
<?php $this->endWidget(); ?>