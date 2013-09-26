<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/public/<?php echo($this->getModule()->getId()); ?>/css/blueprint/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/public/<?php echo($this->getModule()->getId()); ?>/css/blueprint/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/public/<?php echo($this->getModule()->getId()); ?>/css/blueprint/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/public/<?php echo($this->getModule()->getId()); ?>/libs/fancybox/jquery.fancybox.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/public/<?php echo($this->getModule()->getId()); ?>/css/custom/form.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/public/<?php echo($this->getModule()->getId()); ?>/css/custom/main.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/public/<?php echo($this->getModule()->getId()); ?>/css/custom/menu.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/public/<?php echo($this->getModule()->getId()); ?>/css/custom/pager.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/public/<?php echo($this->getModule()->getId()); ?>/css/custom/dropDownMenu.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/public/<?php echo($this->getModule()->getId()); ?>/css/datagrid/default/style.css" />

	<script src="<?php echo Yii::app()->request->baseUrl; ?>/public/<?php echo($this->getModule()->getId()); ?>/js/jquery/jquery-1.10.2.min.js" type="text/javascript"></script>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/public/<?php echo($this->getModule()->getId()); ?>/js/jquery/jquery.form.js" type="text/javascript"></script>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/public/<?php echo($this->getModule()->getId()); ?>/js/jquery/jquery.autocomplete.js" type="text/javascript"></script>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/public/<?php echo($this->getModule()->getId()); ?>/js/jquery/jquery.maskmoney.js" type="text/javascript"></script>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/public/<?php echo($this->getModule()->getId()); ?>/js/jquery/jquery.password.strengh.js" type="text/javascript"></script>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/public/<?php echo($this->getModule()->getId()); ?>/js/jquery/jquery.timers.js" type="text/javascript"></script>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/public/<?php echo($this->getModule()->getId()); ?>/libs/fancybox/jquery.fancybox.pack.js" type="text/javascript"></script>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/public/<?php echo($this->getModule()->getId()); ?>/js/dropDownMenu.js" type="text/javascript"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/public/<?php echo($this->getModule()->getId()); ?>/js/main.js" type="text/javascript"></script>

	<title><?php echo CHtml::encode(Yii::app()->name); ?></title>
</head>

<body>

<!-- PÁGINA -->
<div class="container" id="page">
    
    <!-- HEADER -->
	<div id="header">
    	<div id="logo">
	        <span><?php echo CHtml::encode(Yii::app()->name); ?> - Administrativo</span>
        </div>
    	
    	<div id="headerIcons">
    		<ul>
				<?php if(User::hasPermission('help', 'index')) { ?>
    			<li>
    				<a href="<?php echo($this->createUrl('/admin/help')); ?>" title="Ajuda"><img src="<?php echo(Yii::app()->request->baseUrl . '/public/admin/images/ico_help.gif'); ?>" alt="" border="0" />Ajuda</a>
    			</li>
				<?php } ?>
    			<li>
    				<a href="<?php echo($this->createUrl('/admin/login/logout')); ?>" title="Sair do sistema"><img src="<?php echo(Yii::app()->request->baseUrl . '/public/admin/images/ico_logout.gif'); ?>" alt="" border="0" />Sair do sistema</a>
    			</li>
    		</ul>
    	</div>
    	
    </div>
    <!-- FIM: HEADER -->
    
    <!-- MENU TOPO -->
	<div id="menuTop">
        <ul>
    		<li>
    			<a href="<?php echo($this->createUrl('/admin')); ?>" title="">Início</a>
    		</li>    		
        </ul>
    </div>
    <!-- FIM: MENU TOPO -->

	<!-- CONTEÚDO -->
    <div class="clear"></div>
    
    <div id="content">
            
            <table class="divider">
                <tr>
                    <td class="col1">
                        
                        <!-- MENU -->
                        <?php $this->beginWidget('application.modules.admin.components.BoxWidget', array('title' => 'Menu', 'width' => '180px')); ?>
                            <ul class="menu">
                                
                                <?php if(User::hasPermission('home', 'index')) { ?>
                                    <li class="imgArrow"><a href="<?php echo $this->createUrl('/admin'); ?>">Início</a></li>
                                <?php } ?>
									
								<?php if(User::hasPermission('contents', 'menu')) { ?>
                                    <li class="imgArrow"><a href="<?php echo $this->createUrl('/admin/contents'); ?>">Conteúdos</a></li>
                                <?php } ?>
                                                                                              
                            </ul>
                        <?php $this->endWidget(); ?>
                        <!-- FIM: MENU -->
                        
                        <br />

                        <!-- RELATORIOS -->
                        <?php if(User::hasPermission('home', 'report_menu')) { ?>

                            <?php $this->beginWidget('application.modules.admin.components.BoxWidget', array('title' => 'Relatórios', 'width' => '180px', 'image' => 'ico_relatorio.png')); ?>
                            <ul class="menu">
                                <?php if(User::hasPermission('reportUsers', 'menu')) { ?>
                                    <li class="imgArrow"><a href="<?php echo $this->createUrl('/admin/reportUsers'); ?>">Usuários</a></li>
                                <?php } ?>
                            </ul>
                            <?php $this->endWidget(); ?>

                        <?php } ?>
                        <!-- FIM: RELATORIOS -->

                        <br />
                                                         
                        <!-- SEGURANCA -->
                        <?php if(User::hasPermission('home', 'security_menu')) { ?>
                        
                        <?php $this->beginWidget('application.modules.admin.components.BoxWidget', array('title' => 'Segurança', 'width' => '180px', 'image' => 'ico_seguranca.gif')); ?>
                            <ul class="menu">
                                
                                <?php if(User::hasPermission('users', 'menu')) { ?>
                                    <li class="imgArrow"><a href="<?php echo $this->createUrl('/admin/users'); ?>">Usuários</a></li>
                                <?php } ?>
                                
                                <?php if(User::hasPermission('groups', 'menu')) { ?>
                                    <li class="imgArrow"><a href="<?php echo $this->createUrl('/admin/groups'); ?>">Grupos</a></li>
                                <?php } ?>
                                
                                <?php if(User::hasPermission('permissions', 'menu')) { ?>
                                    <li class="imgArrow"><a href="<?php echo $this->createUrl('/admin/permissions'); ?>">Permissões</a></li>
                                <?php } ?>
                                
                                <?php if(User::hasPermission('permissions', 'generatepermissions')) { ?>
									<li class="imgArrow"><a href="<?php echo $this->createUrl('/admin/permissions/generatepermissions'); ?>">Gerar permissões</a></li>
                                <?php } ?>
                                
                            </ul>
                        <?php $this->endWidget(); ?>
                        
                        <br />
                        
                        <?php } ?>
                        <!-- FIM: SEGURANCA -->
                        
                        <!-- LOGIN -->
                        <?php $this->beginWidget('application.modules.admin.components.BoxWidget', array('title' => 'Login', 'width' => '180px')); ?>
                            
                            <table border="0" cellpadding="0" cellspacing="0" style="text-align: center; width: 100%;">
                                <tr>
                                    <td colspan="2">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="text-align: center; width: 100%;"><img src="<?php echo(Yii::app()->request->baseUrl . '/public/admin/images/ico_usuario.png'); ?>" alt="" border="0" /></td>
                                </tr>
                                <tr>
                                    <td colspan="2">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="text-align: center; width: 100%;">Olá <?php echo(UserUtil::getAdminWebUser()->name); ?>,</td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="text-align: center; width: 100%;">Seja bem vindo(a).</td>
                                </tr>
                                <tr>
                                    <td colspan="2">&nbsp;</td>
                                </tr>
                                
                                <?php if(User::hasPermission('profile', 'menu')) { ?>
                                <tr>
                                    <td colspan="2" style="text-align: center; width: 100%;"><a href="<?php echo($this->createUrl('/admin/profile')); ?>" title="Meus dados">Meus dados</a></td>
                                </tr>
                                <?php } ?>
                                
                                <tr>
                                    <td colspan="2" style="text-align: center; width: 100%;"><a href="<?php echo($this->createUrl('/admin/login/logout')); ?>" title="Sair da minha conta">Sair da minha conta</a></td>
                                </tr>
                            </table>
                            
                        <?php $this->endWidget(); ?>
                        <!-- FIM: LOGIN -->

                    </td>
                    <td class="col2">&nbsp;</td>
                    <td class="col3">

                        <?php echo($this->renderPartial('/shared/_messages')); ?>

                        <?php echo $content; ?>
                        
                    </td>
                </tr>
            </table>
	</div>
     <!-- FIM: CONTEÚDO -->

	<!-- FOOTER -->
	<div id="footer">
		<?php echo(Yii::app()->params['poweredText']); ?>
	</div>
    <!-- FIM: FOOTER -->

</div>
<!-- FIM: PÁGINA -->

</body>
</html>