<!-- profile update form -->
<?php echo CHtml::beginForm($this->createUrl(''), 'post', array('id' => 'form', 'class' => 'form-horizontal')); ?>

	<?php echo CHtml::errorSummary($model); ?>

	<div class="form-group">
		<?php echo CHtml::activeLabel($model, 'name'); ?>
		<div class="controls">
			<?php echo CHtml::activeTextField($model, 'name', array('class' => 'form-control', 'autocomplete' => 'off')); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo CHtml::activeLabel($model, 'gender'); ?>
		<div class="controls">
			<?php echo CHtml::activeDropDownList($model, 'gender', array(Constants::MALE_ID => Constants::MALE_TEXT, Constants::FEMALE_ID => Constants::FEMALE_TEXT), array(Constants::EMPTY_ID => 'Selecione')); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo CHtml::activeLabel($model, 'birth_date'); ?>
		<div class="controls">
			<?php echo CHtml::activeTextField($model, 'birth_date', array('class' => 'form-control', 'autocomplete' => 'off')); ?>
		</div>
	</div>

	<div class="form-group">
		<div class="controls">
			<?php echo CHtml::submitButton('Continuar', array('class' => 'btn btn-default')); ?>
		</div>
	</div>

<?php echo CHtml::endForm(); ?>

<script type="text/javascript">
	$("#CustomerProfileUpdateForm_birth_date").mask('99/99/9999');
	$("#CustomerProfileUpdateForm_zipcode").mask('99999-999');
</script>
<!-- end: profile update form -->
