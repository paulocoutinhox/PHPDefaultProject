<!-- recovery password form -->
<p>Bem vindo ao processo de recuperação de senha.</p>
<p>Para que sua senha possa ser trocada, basta digitar abaixo sua nova senha.</p>

<?php echo CHtml::beginForm($this->createUrl(''), 'post', array('id' => 'form', 'class' => 'form-horizontal')); ?>

<?php echo CHtml::errorSummary($form); ?>

<?php echo CHtml::activeHiddenField($form, 'token'); ?>

	<div class="control-group">
		<?php echo CHtml::activeLabel($form, 'password', array('class' => 'control-label')); ?>
		<div class="controls">
			<?php echo CHtml::activePasswordField($form, 'password', array('style' => 'width: 220px;', 'class' => 'text', 'autocomplete' => 'off')); ?>
		</div>
	</div>
	<div class="control-group">
		<?php echo CHtml::activeLabel($form, 'repeatPassword', array('class' => 'control-label')); ?>
		<div class="controls">
			<?php echo CHtml::activePasswordField($form, 'repeatPassword', array('style' => 'width: 220px;', 'class' => 'text', 'autocomplete' => 'off')); ?>
		</div>
	</div>
	<div class="control-group">
		<div class="controls">
			<a href="<?php echo($this->createUrl('/home')); ?>" title="Voltar">Voltar</a>
		</div>
	</div>
	<div class="control-group">
		<div class="controls">
			<?php echo CHtml::submitButton('Continuar', array('class' => 'btn')); ?>
		</div>
	</div>

<?php echo CHtml::endForm(); ?>
<!-- end: recovery password form -->