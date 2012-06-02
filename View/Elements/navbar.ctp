<div class="navbar navbar-fixed-top">
	<div class="navbar-inner">
		<div class="container-fluid">
			<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</a>
			<a class="brand" href="#">Route Me</a>
			<?php if (!empty($authUser)): ?>
				<div class="btn-group pull-right">
					<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
						<i class="icon-user"></i> <?php echo $authUser['username']; ?>
						<span class="caret"></span>
					</a>
					<ul class="dropdown-menu">
						<li><a href="#">Profile</a></li>
						<li class="divider"></li>
						<li><?php echo $this->Html->link('Sign Out', array(
							'controller' => 'users',
							'action' => 'logout'
						)); ?></li>
					</ul>
				</div>
			<?php endif; ?>
			<div class="nav-collapse">
				<ul class="nav">
					<li class="active"><a href="/">Home</a></li>
					<li><a href="#about">About</a></li>
					<!-- <li><a href="#contact">Contact</a></li> -->
				</ul>
			</div>
		</div>
	</div>
</div>
