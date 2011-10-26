<?php $this->beginWidget('application.modules.admin.components.BoxWidget', array('title' => $moduleTitle . ' / adicionar novo registro', 'width' => '100%', 'image' => 'ico_adicionar.png')); ?>
    
    <div class="buttons">
    
        <?php $this->widget('ButtonWidget', array('title' => 'Confirmar', 'link' => 'javascript: $(\'#form\').submit();')); ?>
        <?php $this->widget('ButtonWidget', array('title' => 'Voltar', 'link' => $this->createUrl('/admin/' . $this->getId()))); ?>
    
    </div>
    
    <div class="clear separator"></div>
    
    <div class="form">
        <?php echo CHtml::beginForm($this->createUrl(''), 'post', array('id' => 'form')); ?>
 
        <?php echo CHtml::errorSummary($form); ?>
        
        <fieldset>

            <legend>Dados</legend>

            <span class="row">
                <?php echo CHtml::activeLabel($form, 'description', array('class' => 'preField')); ?>
                <?php echo CHtml::activeTextField($form, 'description'); ?>
            </span>
            
            <span class="row">
                <?php echo CHtml::activeLabel($form, 'active', array('class' => 'preField')); ?>
                <?php echo CHtml::activeDropDownList($form, 'active', array(Constants::YES_ID => Constants::YES_TEXT, Constants::NO_ID => Constants::NO_TEXT), array(Constants::EMPTY_ID => Constants::EMPTY_TEXT)); ?>
            </span>

        </fieldset>

		<fieldset>

            <legend>Permissões</legend>

            <table>

            <?php $this->renderPartial('_permissions', array('permissions' => $permissions)); ?>

            </table>

        </fieldset>

    <?php echo CHtml::endForm(); ?>
    
    </div>
    
<?php $this->endWidget(); ?>