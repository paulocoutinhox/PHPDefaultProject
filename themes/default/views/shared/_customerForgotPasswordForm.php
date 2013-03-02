<!-- forgot password form -->
<?php echo CHtml::beginForm($this->createUrl(''), 'post', array('id' => 'form', 'class' => 'form-horizontal')); ?>

<?php echo CHtml::errorSummary($form); ?>

	<div class="control-group">
		<?php echo CHtml::activeLabel($form, 'email', array('class' => 'control-label')); ?>
		<div class="controls">
			<?php echo CHtml::activeTextField($form, 'email', array('style' => 'width: 220px;', 'autocomplete' => 'off')); ?>
		</div>
	</div>
	<div class="control-group">
		<div class="controls">
			<a href="<?php echo($this->createUrl('/login')); ?>" title="Voltar">Voltar</a>
		</div>
	</div>
	<div class="control-group">
		<div class="controls">
			<?php echo CHtml::submitButton('Continuar', array('class' => 'btn')); ?>
		</div>
	</div>

<?php echo CHtml::endForm(); ?>
<!-- end: forgot password form -->