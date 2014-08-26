<h1><?php echo ($this->pageTitle); ?></h1>

<p>
    Change This Template (/themes/<?php echo(Yii::app()->theme->name); ?>/views/<?php echo($this->getId()); ?>/<?php echo($this->getAction()->getId()); ?>.php)
</p>

<p>
	<ul class="list-group">
		<li class="list-group-item">
			<a href="<?php echo($this->createUrl('/contact/index')); ?>">Contact</a>
		</li>
		<li class="list-group-item">
			<a href="<?php echo($this->createUrl('/login/index')); ?>">Login</a>
		</li>
		<li class="list-group-item">
			<a href="<?php echo($this->createUrl('/register/index')); ?>">Register</a>
		</li>
		<li class="list-group-item">
			<a href="<?php echo($this->createUrl('/forgotPassword/index')); ?>">Forgot password</a>
		</li>
		<li class="list-group-item">
			<a href="<?php echo($this->createUrl('/profile/index')); ?>">User panel</a>
		</li>
		<li class="list-group-item">
			<a href="<?php echo($this->createUrl('/admin')); ?>">Administrative panel</a>
		</li>
	</ul>
</p>