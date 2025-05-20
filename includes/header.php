<?php
	include("includes/connection.php");
	
	include("includes/session_check.php");
	  @$currentFile = @$_SERVER["SCRIPT_NAME"];
      @$parts = @explode('/', $currentFile);
      @$currentFile = @$parts[count($parts) - 1];
	  
	  
?>
<div class="navbar navbar-inverse">
		<div class="navbar-header">
			<a class="navbar-brand" href="home.php"><p style="font-size: larger;font-weight: 900;">Bites - Stream</p></a>
			<ul class="nav navbar-nav visible-xs-block">
				<li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
				<li><a class="sidebar-mobile-main-toggle"><i class="icon-paragraph-justify3"></i></a></li>
			</ul>
		</div>

		<div class="navbar-collapse collapse" id="navbar-mobile">
			<ul class="nav navbar-nav">
				<li><a class="sidebar-control sidebar-main-toggle hidden-xs"><i class="icon-paragraph-justify3"></i></a></li>

			</ul>
			<ul class="nav navbar-nav navbar-right">
				
				<li class="dropdown dropdown-user">
				<a class="dropdown-toggle" data-toggle="dropdown">
					<img src="assets/images/placeholder.jpg" alt=""/>
						<span><?php echo 'Admin';?></span>
					<i class="caret"></i>
				</a>
				<ul class="dropdown-menu dropdown-menu-right">
					<li><a href="profile.php"><i class="icon-user-plus"></i> My profile</a></li>
					<!-- <li><a href="settings.php"><i class="icon-cog5"></i>Settings</a></li> -->
					<li class="divider"></li> 
					<li><a href="logout.php"><i class="icon-switch2"></i> Logout</a></li>
				</ul>
			</li>
			</ul>
		</div>
	</div>