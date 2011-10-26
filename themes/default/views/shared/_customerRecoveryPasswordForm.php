<!-- recovery password form -->
<div class="form">
	
	<p>Bem vindo ao processo de recuperação de senha.</p>
	<p>Para que sua senha possa ser trocada, basta digitar abaixo sua nova senha.</p>

	
	<?php echo CHtml::beginForm($this->createUrl(''), 'post', array('id' => 'form')); ?>
		
		<?php echo CHtml::errorSummary($form); ?>
		
		<?php echo CHtml::activeHiddenField($form, 'token'); ?>

		<div class="row">
			<?php echo CHtml::activeLabel($form, 'password'); ?>
			<?php echo CHtml::activePasswordField($form, 'password', array('style' => 'width: 300px;', 'class' => 'text', 'autocomplete' => 'off')); ?>
		</div>
		
		<div class="row">
			<?php echo CHtml::activeLabel($form, 'repeatPassword'); ?>
			<?php echo CHtml::activePasswordField($form, 'repeatPassword', array('style' => 'width: 300px;', 'class' => 'text', 'autocomplete' => 'off')); ?>
		</div>
	
		<div class="row">
			<?php echo CHtml::submitButton('Continuar'); ?>
		</div>

	<?php echo CHtml::endForm(); ?>

</div>
<!-- end: recovery password form -->