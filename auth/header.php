		<nav class="navbar navbar-default navbar-fixed-top">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="../">Aminship</a>
				</div>
				<div id="navbar" class="navbar-collapse collapse">
					<ul class="nav navbar-nav">
						<li>
							<a href="../"> Home </a></li>
						<li>
							<a href="../about.php"> About </a></li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
								Area <span class="caret"></span>
							</a>
								<ul class="dropdown-menu">
									<li onclick="giveinfo()">
										<a href="../tarea.php"> for triangle shape land</a>
									</li>
									<li onclick="giveinfo()">
										<a href="../area.php"> for rectangle shape land</a>
									</li>
									<li onclick="giveinfo()">
										<a href="../sarea.php"> for circle shape land</a>
									</li>
								</ul>
						</li>
						<li onclick="giveinfo()">
							<a href="../side.php"> Side </a>
						</li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<li <?php if(basename($_SERVER['PHP_SELF']) == 'register.php'){echo 'class="active"';} ?>>
							<a href="./register.php">
								<span class="glyphicon glyphicon-user"></span> Sign up
							</a>
						</li>
						<li <?php if(basename($_SERVER['PHP_SELF']) == 'log.php'){echo 'class="active"';} ?>>
							<a href="./log.php">
								<span class="glyphicon glyphicon-user"></span> Log in 
							</a>
						</li>
					</ul>
				</div>
			</div>
		</nav>