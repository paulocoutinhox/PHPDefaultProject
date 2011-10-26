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
                <?php echo CHtml::activeLabel($form, 'title', array('class' => 'preField')); ?>
                <?php echo CHtml::activeTextField($form, 'title', array('style' => 'width: 300px;')); ?>
            </span>
			
            <span class="row">
                <?php echo CHtml::activeLabel($form, 'tag', array('class' => 'preField')); ?>
                <?php echo CHtml::activeTextField($form, 'tag'); ?>
            </span>

        </fieldset>
		
		<fieldset>

            <legend>Dados - Texto do conteúdo</legend>

            <span class="row">
				<?php $this->widget('application.extensions.tinymce.ETinyMce', array('model'=>$form,
                                                                                     'attribute' => 'content',
                                                                                     'width' => '100%',
                                                                                     'height' => '400px',
                                                                                     'useSwitch'=>false,
                                                                                     'editorTemplate' => 'full',
                                                                                    )); ?>
            </span>

        </fieldset>
		
    <?php echo CHtml::endForm(); ?>
    
    </div>
    
<?php $this->endWidget(); ?>