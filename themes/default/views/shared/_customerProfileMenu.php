<!-- profile menu -->
<div id="profileMenuContainer">
	<ul class="profileMenu">
		<li>
			<a href="<?php echo($this->createUrl('/profile')); ?>" title="Início">
				Início
			</a>
		</li>
		<li>
			<a href="<?php echo($this->createUrl('/profile/update')); ?>" title="Meus dados">
				Meus dados
			</a>
		</li>
		<li class="right">
			<a href="<?php echo($this->createUrl('/logout')); ?>" title="Sair da minha conta">
				Sair da minha conta
			</a>
		</li>
	</ul>
</div>
<!-- end: profile menu -->