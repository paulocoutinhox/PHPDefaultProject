<?php $this->beginWidget('application.modules.admin.components.BoxWidget', array('title' => $moduleTitle, 'width' => '100%', 'image' => 'ico_relatorio.png')); ?>
    
    <div class="buttons">
    
        <?php $this->widget('ButtonWidget', array('title' => 'Gerar relatório', 'link' => 'javascript: $(\'#form\').submit();')); ?>

    </div>
    
    <div class="clear separator"></div>
    
    <div class="form">
        <?php echo CHtml::beginForm($this->createUrl(''), 'post', array('id' => 'form')); ?>
 
        <?php echo CHtml::errorSummary($form); ?>
        
        <fieldset>
            
            <legend>Filtros</legend>

			<span class="row">
				<?php echo CHtml::activeLabel($form, 'email', array('class' => 'preField')); ?>
				<?php echo CHtml::activeTextField($form, 'email', array('style' => 'width: 250px;')); ?>
			</span>

			<span class="row">
				<?php echo CHtml::activeLabel($form, 'username', array('class' => 'preField')); ?>
				<?php echo CHtml::activeTextField($form, 'username', array('style' => 'width: 250px;')); ?>
			</span>

			<span class="row">
				<?php echo CHtml::activeLabel($form, 'active', array('class' => 'preField')); ?>
				<?php echo $selectActive; ?>
			</span>

        </fieldset>
        
        <fieldset>
    	    
            <legend>Opções</legend>
            	
    		<?php echo CHtml::activeLabel($form, 'orderField', array('class' => 'preField')); ?>
            <?php echo CHtml::activeDropDownList($form, 'orderField', $arrOrderField, array(Constants::EMPTY_ID => Constants::EMPTY_TEXT)); ?>
            
    		<?php echo CHtml::activeDropDownList($form, 'orderDirection', $arrOrderDirection, array()); ?>

    	</fieldset>
        
        <fieldset>
            
            <legend>Resultado</legend>
            
    		<table class="datagrid" cellpadding="0" cellspacing="0" border="0">
    
    			<tr class="header">
    				<th class="alignCenter firstColumn">Código</th>
    				<th class="alignLeft">Nome</th>
    				<th class="alignLeft">Usuário</th>
    				<th class="alignLeft">Email</th>
    				<th class="alignCenter lastColumn">Ativo</th>
    			</tr>

    			<?php if (isset($list) && count($list) > 0) { ?>

					<?php
					$total = 0;
					?>

    			    <?php foreach ($list as $index => $listItem) { ?>

						<?php
						$total += 1;
						?>

						<tr class="<?php echo((count($list)-1 == $index) ? '' : ''); ?>">
							<td class="alignCenter firstColumn"><?php echo($listItem->id); ?></td>
							<td class="alignLeft"><?php echo($listItem->name); ?></td>
							<td class="alignLeft"><?php echo($listItem->username); ?></td>
							<td class="alignLeft"><?php echo($listItem->email); ?></td>
							<td class="alignCenter lastColumn">
                                <?php
                                if ($listItem->active == Constants::YES_ID)
                                {
                                    echo Constants::YES_TEXT;
                                }
                                else if ($listItem->active == Constants::NO_ID)
                                {
                                    echo Constants::NO_TEXT;
                                }
                                ?>
                            </td>
						</tr>

    				<?php } ?>

					<tr class="lastRow totalizer">
						<td class="alignCenter firstColumn">TOTAL</td>
						<td class="alignLeft"></td>
						<td class="alignLeft"></td>
						<td class="alignLeft"></td>
						<td class="alignCenter lastColumn"><?php echo($total); ?></td>
					</tr>


				<?php } else { ?>
    			
    			<tr>
    				<td colspan="20" class="alignCenter noResult"><strong>Nenhum resultado encontrado.</strong></td>
    			</tr>
    			
    			<?php } ?>	
    		
    		</table>
    		
    		<div style="padding:10px 0;"></div>
    		
    		<div id="pager">
                <?php $this->widget('CLinkPager',array('pages' => $pagination, 'cssFile' => false)); ?>
            </div>
    		
    		<div style="padding:10px 0;"></div>
            
        </fieldset>
       
    <?php echo CHtml::endForm(); ?>
    
    </div>
    
<?php $this->endWidget(); ?>