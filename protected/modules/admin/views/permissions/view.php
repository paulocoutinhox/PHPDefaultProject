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
                    <?php echo CHtml::activeLabel($model, 'module', array('class' => 'preField preFieldBig')); ?>
                    <span class="disabledField"><?php echo $model->module; ?></span>
                </span>

                <span class="row">
                    <?php echo CHtml::activeLabel($model, 'module_description', array('class' => 'preField preFieldBig')); ?>
                    <span class="disabledField"><?php echo $model->module_description; ?></span>
                </span>

                <span class="row">
                    <?php echo CHtml::activeLabel($model, 'action', array('class' => 'preField preFieldBig')); ?>
                    <span class="disabledField"><?php echo $model->action; ?></span>
                </span>

                <span class="row">
                    <?php echo CHtml::activeLabel($model, 'action_description', array('class' => 'preField preFieldBig')); ?>
                    <span class="disabledField"><?php echo $model->action_description; ?></span>
                </span>

        </fieldset>
                
    </div>
    
<?php $this->endWidget(); ?>