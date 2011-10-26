<?php $this->beginWidget('application.modules.admin.components.BoxWidget', array('title' => $moduleTitle . ' / alterar registro', 'width' => '100%', 'image' => 'ico_alterar.png')); ?>
    
    <div class="buttons">
    
        <?php $this->widget('ButtonWidget', array('title' => 'Confirmar', 'link' => 'javascript: $(\'#form\').submit();')); ?>
        <?php $this->widget('ButtonWidget', array('title' => 'Novo registro', 'link' => $this->createUrl('/admin/' . $this->getId() . '/add'))); ?>
        <?php $this->widget('ButtonWidget', array('title' => 'Excluir', 'link' => 'javascript: deleteRow(\'' . $this->createUrl($this->getId() . '/delete/id/' . $form->id) . '\');')); ?>
        <?php $this->widget('ButtonWidget', array('title' => 'Voltar', 'link' => $this->createUrl('/admin/' . $this->getId()))); ?>
    
    </div>
    
    <div class="clear separator"></div>
    
    <div class="form">
        <?php echo CHtml::beginForm($this->createUrl('', array('id' => $form->id)), 'post', array('id' => 'form', 'enctype' => 'multipart/form-data')); ?>
 
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