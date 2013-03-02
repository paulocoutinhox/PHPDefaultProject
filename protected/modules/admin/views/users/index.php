<?php $this->beginWidget('application.modules.admin.components.BoxWidget', array('title' => $moduleTitle . ' / pesquisar', 'width' => '100%', 'image' => 'ico_visualizar.png')); ?>
    
    <div class="buttons">
    
        <?php $this->widget('ButtonWidget', array('title' => 'Pesquisar', 'link' => 'javascript: $(\'#form\').submit();')); ?>
        <?php $this->widget('ButtonWidget', array('title' => 'Novo registro', 'link' => $this->createUrl('/admin/' . $this->getId() . '/add'))); ?>
        <?php $this->widget('ButtonWidget', array('title' => 'Marcar/desmarcar todos', 'link' => "javascript: selectAllRows('.chkRow');")); ?>
        <?php $this->widget('ButtonWidget', array('title' => 'Excluir selecionados', 'link' => "javascript: deleteSelectedRows('" . $this->createUrl('/admin/' . $this->getId()) . "/delete', '');")); ?>
    
    </div>
    
    <div class="clear separator"></div>
    
    <div class="form">
        <?php echo CHtml::beginForm($this->createUrl(''), 'post', array('id' => 'form')); ?>
 
        <?php echo CHtml::errorSummary($form); ?>
        
        <fieldset>
            
            <legend>Pesquisar</legend>
             
                <span class="row">
                    <?php echo CHtml::activeLabel($form, 'id', array('class' => 'preField')); ?>
                    <?php echo CHtml::activeTextField($form, 'id', array('style' => 'width: 100px;')); ?>
                </span>
                
                <span class="row">
                    <?php echo CHtml::activeLabel($form, 'name', array('class' => 'preField')); ?>
                    <?php echo CHtml::activeTextField($form, 'name', array('style' => 'width: 300px;')); ?>
                </span>
            
                <span class="row">
                    <?php echo CHtml::activeLabel($form, 'email', array('class' => 'preField')); ?>
                    <?php echo CHtml::activeTextField($form, 'email', array('style' => 'width: 300px;')); ?>
                </span>

				<span class="row">
                    <?php echo CHtml::activeLabel($form, 'active', array('class' => 'preField')); ?>
                    <?php echo CHtml::activeDropDownList($form, 'active', array(Constants::YES_ID => Constants::YES_TEXT, Constants::NO_ID => Constants::NO_TEXT), array(Constants::EMPTY_ID => Constants::EMPTY_TEXT)); ?>
                </span>

        </fieldset>
        
        <fieldset>
    	    
            <legend>Opções</legend>
            	
    		<?php echo CHtml::activeLabel($form, 'orderField', array('class' => 'preField')); ?>
            <?php echo CHtml::activeDropDownList($form, 'orderField', $arrOrderField, array(Constants::EMPTY_ID => Constants::EMPTY_TEXT)); ?>
            
    		<?php echo CHtml::activeDropDownList($form, 'orderDirection', $arrOrderDirection, array()); ?>
            
            <?php echo CHtml::activeLabel($form, 'rowCount', array('class' => 'noblock', 'style' => 'margin-left: 4px')); ?>
            <?php echo CHtml::activeDropDownList($form, 'rowCount', $arrRowCount, array()); ?>
    		
    	</fieldset>
        
        <fieldset>
            
            <legend>Resultado</legend>
            
    		<table class="datagrid" cellpadding="0" cellspacing="0" border="0">
    
    			<tr class="header">
    				<th class="alignCenter firstColumn">#</th>
    				<th class="alignCenter">Código</th>
    				<th class="alignLeft">Nome</th>
    				<th class="alignLeft">Usuário</th>
					<th class="alignLeft">Email</th>
					<th class="alignLeft">Ativo</th>
					<th class="alignCenter lastColumn">Ações</th>
    			</tr>
    				
    			<?php if (isset($list) && count($list) > 0) { ?>
    			    <?php foreach ($list as $index => $listItem) { ?>
    					
    				<tr class="<?php echo((count($list)-1 == $index) ? 'lastRow' : ''); ?>">
    					<td class="alignCenter firstColumn"><input class="chkRow" type="checkbox" name="chkRow[]" id="chkRow_<?php echo($listItem->id); ?>" value="<?php echo($listItem->id); ?>" /></td>
    					<td class="alignCenter"><?php echo($listItem->id); ?></td>
    					<td class="alignLeft"><?php echo($listItem->name); ?></td>
    					<td class="alignLeft"><?php echo($listItem->username); ?></td>
    					<td class="alignLeft"><?php echo($listItem->email); ?></td>
    					<td class="alignLeft">
						<?php
						if ($listItem->active == Constants::YES_ID)
						{
							echo(Constants::YES_TEXT);
						}
						else if ($listItem->active == Constants::NO_ID)
						{
							echo(Constants::NO_TEXT);
						}
						?>
						</td>
						<td class="alignCenter lastColumn">
							<a href="<?php echo($this->createUrl($this->getId() . '/view/id/' . $listItem->id)); ?>" title="Visualizar registro">
                                <img src="<?php echo(Yii::app()->request->baseUrl . '/public/admin/images/ico_visualizar.png'); ?>" />
                            </a>
                            &nbsp;
                            <a href="<?php echo($this->createUrl($this->getId() . '/update/id/' . $listItem->id)); ?>" title="Alterar registro">
                                <img src="<?php echo(Yii::app()->request->baseUrl . '/public/admin/images/ico_alterar.png'); ?>" />
                            </a>
                            &nbsp;
                            <a href="javascript: deleteRow('<?php echo($this->createUrl($this->getId() . '/delete/id/' . $listItem->id)); ?>');" title="Excluir registro">
                                <img src="<?php echo(Yii::app()->request->baseUrl . '/public/admin/images/ico_excluir.png'); ?>" />
                            </a>
    					</td>
    				</tr>	
    					
    				<?php } ?>			
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