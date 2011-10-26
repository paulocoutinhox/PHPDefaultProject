<!-- MENSAGENS -->
<?php if(UserUtil::getAdminWebUser()->hasFlash(Constants::SUCCESS_MESSAGE_ID)):?>
	<div class="<?php echo(Constants::SUCCESS_MESSAGE_ID); ?>">
		<?php echo UserUtil::getAdminWebUser()->getFlash(Constants::SUCCESS_MESSAGE_ID); ?>
	</div>
<?php endif; ?>

<?php if(UserUtil::getAdminWebUser()->hasFlash(Constants::ERROR_MESSAGE_ID)):?>
	<div class="<?php echo(Constants::ERROR_MESSAGE_ID); ?>">
		<?php echo UserUtil::getAdminWebUser()->getFlash(Constants::ERROR_MESSAGE_ID); ?>
	</div>
<?php endif; ?>

<?php if(UserUtil::getAdminWebUser()->hasFlash(Constants::INFO_MESSAGE_ID)):?>
	<div class="<?php echo(Constants::INFO_MESSAGE_ID); ?>">
		<?php echo UserUtil::getAdminWebUser()->getFlash(Constants::INFO_MESSAGE_ID); ?>
	</div>
<?php endif; ?>

<?php if(UserUtil::getAdminWebUser()->hasFlash(Constants::WARNING_MESSAGE_ID)):?>
	<div class="<?php echo(Constants::WARNING_MESSAGE_ID); ?>">
		<?php echo UserUtil::getAdminWebUser()->getFlash(Constants::WARNING_MESSAGE_ID); ?>
	</div>
<?php endif; ?>
<!-- FIM: MENSAGENS -->