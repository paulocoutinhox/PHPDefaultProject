<!-- recovery password form -->
<p>Bem vindo ao processo de recuperação de senha.</p>
<p>Para que sua senha possa ser trocada, basta digitar abaixo sua nova senha.</p>

<?php echo CHtml::beginForm($this->createUrl(''), 'post', array('id' => 'form', 'role' => 'form')); ?>

<?php echo CHtml::errorSummary($form); ?>

<?php echo CHtml::activeHiddenField($form, 'token'); ?>

	<div class="form-group">
		<?php echo CHtml::activeLabel($form, 'password'); ?>
		<div class="controls">
			<?php echo CHtml::activePasswordField($form, 'password', array('class' => 'form-control')); ?>
		</div>
	</div>
	<div class="form-group">
		<?php echo CHtml::activeLabel($form, 'repeatPassword'); ?>
		<div class="controls">
			<?php echo CHtml::activePasswordField($form, 'repeatPassword', array('class' => 'form-control')); ?>
		</div>
	</div>
	<div class="form-group">
		<div class="controls">
			<a href="<?php echo($this->createUrl('/home')); ?>" title="Voltar">Voltar</a>
		</div>
	</div>
	<div class="form-group">
		<div class="controls">
			<?php echo CHtml::submitButton('Continuar', array('class' => 'btn btn-default')); ?>
		</div>
	</div>

<?php echo CHtml::endForm(); ?>
<!-- end: recovery password form -->