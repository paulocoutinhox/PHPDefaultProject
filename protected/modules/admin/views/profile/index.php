<?php $this->beginWidget('application.modules.admin.components.BoxWidget', array('title' => $moduleTitle, 'width' => '100%', 'image' => 'ico_visualizar.png')); ?>
    
    <div class="buttons">
    
        <?php $this->widget('ButtonWidget', array('title' => 'Confirmar', 'link' => 'javascript: $(\'#form\').submit();')); ?>
   
    </div>
    
    <div class="clear separator"></div>
    
    <div class="form">
        <?php echo CHtml::beginForm($this->createUrl(''), 'post', array('id' => 'form')); ?>
 
        <?php echo CHtml::errorSummary($form); ?>
        
        <fieldset>
            
            <legend>Dados</legend>
             
            <span class="row">
                <?php echo CHtml::activeLabel($form, 'name', array('class' => 'preField')); ?>
                <?php echo CHtml::activeTextField($form, 'name', array('autocomplete' => 'off')); ?>
            </span>

			<span class="row">
                <?php echo CHtml::activeLabel($form, 'email', array('class' => 'preField')); ?>
                <?php echo CHtml::activeTextField($form, 'email', array('autocomplete' => 'off', 'style' => 'width: 250px')); ?>
            </span>
            
            <span class="row">
                <?php echo CHtml::activeLabel($form, 'password', array('class' => 'preField')); ?>
                <?php echo CHtml::activePasswordField($form, 'password', array('autocomplete' => 'off')); ?>
				<span id="passwordStrengthPlaceHolder" style="display: inline-block; width: 200px;">Place Holder</span>
            </span>
            
            <span class="row">
                <?php echo CHtml::activeLabel($form, 'repeat_password', array('class' => 'preField')); ?>
                <?php echo CHtml::activePasswordField($form, 'repeat_password', array('autocomplete' => 'off')); ?>
            </span>
                        
        </fieldset>
               
    <?php echo CHtml::endForm(); ?>
    
    </div>
    
<?php $this->endWidget(); ?>

<script type="text/javascript">
	$(document).ready(function(){
		$('#AdminFormProfile_password').pstrength({
			minChar: 8,
			displayMinChar: false,
			verdicts: ['Fraco', 'Normal', 'Médio', 'Forte', 'Muito forte'],
			placeHolder: $('#passwordStrengthPlaceHolder')
		});
	});
</script>