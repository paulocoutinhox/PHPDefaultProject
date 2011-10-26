<?php $this->beginWidget('application.modules.admin.components.BoxWidget', array('title' => $moduleTitle . ' / gerar permissões', 'width' => '100%', 'image' => 'ico_identity.png')); ?>


    <div class="buttons">
    
        <?php $this->widget('ButtonWidget', array('title' => 'Gerar permissões', 'link' => 'javascript: $(\'#form\').submit();')); ?>
        
    </div>
    
    <div class="clear separator"></div>
    
    <div class="form">

		<?php echo CHtml::beginForm($this->createUrl(''), 'post', array('id' => 'form')); ?>

		<?php echo CHtml::hiddenField('generate', '1'); ?>

		<div style="width: 100%; text-align: center;">

			<br />

			<img src="<?php echo(Yii::app()->request->baseUrl . '/images/admin/ico_identity_32.png'); ?>" border="0" alt="" />

			<br />
			<br />

			<span style="color: #F00; font-size: 11px;">
			<strong>ATENÇÃO</strong>
			<br />
			Todas as permissões serão apagadas se a opção <strong>"Zerar a tabela de permissões"</strong> estiver marcada, caso contrário, somente as permissões que não existirem serão criadas.
			</span>

			<br />
			<br />

		</div>

		<fieldset>

            <legend>Opções</legend>

			<span class="row">
				<?php echo CHtml::checkBox('truncateTable', null, array('style' => 'float: left; margin-right: 10px;')); ?>
				<?php echo CHtml::label('Zerar a tabela de permissões', 'truncateTable', array('class' => 'preField2 preFieldBig2')); ?>

			</span>

		</fieldset>

		<?php echo CHtml::endForm(); ?>
    
    </div>
    
<?php $this->endWidget(); ?>