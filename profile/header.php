		<nav class="navbar navbar-default navbar-fixed-top">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="./">Aminship / User</a>
				</div>
				<div id="navbar" class="navbar-collapse collapse">
					<ul class="nav navbar-nav">
						<li <?php if(basename($_SERVER['PHP_SELF']) == 'index.php'){echo 'class="active"';} ?>>
							<a href="./"> Home </a>
						</li>
						<li <?php if((basename($_SERVER['PHP_SELF']) == 'about.php') || (basename($_SERVER['PHP_SELF']) == 'profileupdate.php') || (basename($_SERVER['PHP_SELF']) == 'view.php')){echo 'class="active"';} ?>>
							<a href="./about.php"> Profile </a>
						</li>
						<li <?php if((basename($_SERVER['PHP_SELF']) == 'tarea.php') || (basename($_SERVER['PHP_SELF']) == 'area.php') || (basename($_SERVER['PHP_SELF']) == 'sarea.php') || (basename($_SERVER['PHP_SELF']) == 'calculate.php')){echo 'class="dropdown active"';}else{echo 'class="dropdown"';} ?>>
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
								Area <span class="caret"></span>
							</a>
							<ul class="dropdown-menu">
								<li onclick="giveinfo()" <?php if(basename($_SERVER['PHP_SELF']) == 'tarea.php'){echo 'class="active"';} ?>>
									<a href="./tarea.php"> for triangle shape land</a>
								</li>
								<li onclick="giveinfo()" <?php if(basename($_SERVER['PHP_SELF']) == 'area.php'){echo 'class="active"';} ?>>
									<a href="./area.php"> for rectengle shape land</a>
								</li>
								<li onclick="giveinfo()" <?php if(basename($_SERVER['PHP_SELF']) == 'sarea.php'){echo 'class="active"';} ?>>
									<a href="./sarea.php"> for circle shape land</a>
								</li>
							</ul>
						</li>
						<li onclick="giveinfo()" <?php if(basename($_SERVER['PHP_SELF']) == 'side.php'){echo 'class="active"';} ?>>
							<a href="./side.php"> Side </a>
						</li>
						<li onclick="return givealert()" <?php if(basename($_SERVER['PHP_SELF']) == 'distribution.php'){echo 'class="active"';} ?>>
							<a href="./distribution.php"> Distribution </a>
						</li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<li onclick="return permit()">
							<a href="http://localhost/Aminship/auth/logout.php">
								<span class="glyphicon glyphicon-user"></span> Log out
							</a>
						</li>
					</ul>
				</div>
			</div>
		</nav>