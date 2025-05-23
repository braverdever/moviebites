<?php
//Get file name
      $currentFile = $_SERVER["SCRIPT_NAME"];
      $parts = explode('/', $currentFile);
      $currentFile = $parts[count($parts) - 1];   
?>
<style>
    .navigation li a {
    -webkit-transition: none;
    transition: none;
}
.collapse.in {
    height: auto !important;
}
.badge {
    font-size: 17px;
}


    
</style>

<div class="sidebar sidebar-main">
	<div class="sidebar-content">
		<!-- User menu -->
		<div class="sidebar-user">
			<div class="category-content">
				<div class="media">
					<a href="#" class="media-left"><img src="images/icon/tellecaller.png" class="img-circle img-sm" alt=""></a>
					<div class="media-body">
						<span class="media-heading text-semibold">Bites - Stream</span>
					</div>

				</div>
			</div>
		</div>
		<!-- /user menu -->
		<!-- Main navigation -->
		<div class="sidebar-category sidebar-category-visible">
			<div class="category-content no-padding">
				<ul class="navigation navigation-main navigation-accordion">
					<!-- Main -->
					<ul class="navigation navigation-main navigation-accordion">
								<!-- Main -->
					
								<li class="<?php if($currentFile=="home.php" or $currentFile=="home.php"){echo 'active';}?>"><a href="home.php"><i class="icon-home4"></i> <span>Dashboard</span></a></li>
								
								<li class="<?php if($currentFile=="manage_category.php" or $currentFile=="add_category.php"){echo 'active';}?>"><a href="manage_category.php"><i class=" icon-list-unordered"></i> <span>Categories</span></a></li>
								
								
								<li class="<?php if($currentFile=="manage_web_series.php" or $currentFile=="add_web_series.php"){echo 'active';}?>">
									<a href="#pageSubmenu" data-toggle="collapse" aria-expanded="<?php if($currentFile=="manage_web_series.php" or $currentFile=="add_web_series.php"){ echo "true"; } ?>"><i class="icon-file-text"></i> Web series</a>
									<ul class="collapse list-unstyled" id="pageSubmenu" <?php if($currentFile=="manage_web_series.php" or $currentFile=="add_web_series.php") { echo "style='display: block; ' "; } ?>">
									
									  <!-- <li class="<?php if($currentFile=="manage_category.php" or $currentFile=="add_category.php"){echo 'active';}?>"><a href="manage_category.php"><span>Categories</span></a></li> --> 
									 
									   <li class="<?php if($currentFile=="add_web_series.php" && isset($_GET['add']) && $_GET['add'] == 'yes'){echo 'active';}?>"><a href="manage_web_series.php">Web Series</a></li>
									  <li class="<?php if($currentFile=="manage_web_series.php" && isset($_GET['type']) && $_GET['type'] == 'banner'){echo 'active';}?>"><a href="manage_web_series.php?type=banner">Banners</a></li>
  									  <li class="<?php if($currentFile=="manage_web_series.php" && isset($_GET['type']) && $_GET['type'] == 'most_trending'){echo 'active';}?>"><a href="manage_web_series.php?type=most_trending">Most Trending</a></li>
                                      <li class="<?php if($currentFile=="manage_web_series.php" && isset($_GET['type']) && $_GET['type'] == 'top_picks'){echo 'active';}?>"><a href="manage_web_series.php?type=top_picks">Top Picks</a></li>
  									   <li class="<?php if($currentFile=="manage_web_series.php" && isset($_GET['type']) && $_GET['type'] == 'new'){echo 'active';}?>"><a href="manage_web_series.php?type=new">New Releases</a></li>
  									  <li class="<?php if($currentFile=="manage_web_series.php" && isset($_GET['type']) && $_GET['type'] == 'spring_into_saturday'){echo 'active';}?>"><a href="manage_web_series.php?type=spring_into_saturday">Spring into Saturday</a></li>
                                      <li class="<?php if($currentFile=="manage_web_series.php" && isset($_GET['type']) && $_GET['type'] == 'recommendad'){echo 'active';}?>"><a href="manage_web_series.php?type=recommendad">  Recommended Web series</a></li>
									  <!-- <li class="<?php if($currentFile=="manage_web_series.php" && isset($_GET['type']) && $_GET['type'] == ''){echo 'active';}?>"><a href="manage_web_series.php">Web Series</a></li> -->
									</ul>
								  </li>
								  
								  
								 <li class="<?php if($currentFile=="manage_plans.php" or $currentFile=="manage_plans.php"){echo 'active';}?>">
									<a href="#pageSubmenu_plans" data-toggle="collapse" aria-expanded="<?php if($currentFile=="manage_plans.php" or $currentFile=="manage_plans.php"){ echo "true"; } ?>"><i class="icon-file-text"></i> Store</a>
									<ul class="collapse list-unstyled" id="pageSubmenu_plans" <?php if($currentFile=="manage_plans.php" or $currentFile=="manage_plans.php") { echo "style='display: block; ' "; } ?>">
										<li class="<?php if($currentFile=="manage_membership.php" or $currentFile=="add_membership.php"){echo 'active';}?>"><a href="manage_membership.php"> <span>Membership</span></a></li>
										<li class="<?php if($currentFile=="manage_plans.php" or $currentFile=="add_plans.php"){echo 'active';}?>"><a href="manage_plans.php"> <span>Plans</span></a></li>
									</ul>
								</li>
								
								<!-- <li class="<?php if($currentFile=="manage_web_series.php" or $currentFile=="add_web_series.php"){echo 'active';}?>"><a href="manage_web_series.php"><i class=" icon-film"></i> <span>Web series</span></a></li> --> 
								
								<!-- <li class="<?php if($currentFile=="manage_plans.php" or $currentFile=="add_plans.php"){echo 'active';}?>"><a href="manage_plans.php"><i class=" icon-credit-card"></i> <span>Plans</span></a></li>
								-->
								
								<li class="<?php if($currentFile=="manage_t_and_c.php" or $currentFile=="manage_t_and_c.php"){echo 'active';}?>"><a href="manage_t_and_c.php"><i class="icon-cog5"></i>  <span>Settings</span></a></li>
								<li class="<?php if($currentFile=="manage_notification.php" or $currentFile=="add_notification.php"){echo 'active';}?>"><a href="manage_notification.php"><i class="icon-bubble-notification"></i> <span>Notification</span></a>
								<li class="<?php if($currentFile=="manage_users.php" or $currentFile=="add_user.php"){echo 'active';}?>"><a href="manage_users.php"><i class="icon-users"></i> <span>Users</span></a></li>
								<!--  <li class="<?php if($currentFile=="manage_t_and_c.php" or $currentFile=="manage_policy.php"){echo 'active';}?>">
									<a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false"><i class="icon-file-text"></i> Pages</a>
									<ul class="collapse list-unstyled" id="pageSubmenu">
									  <li class="<?php if($currentFile=="manage_t_and_c.php" ){echo 'active';}?>"><a href="manage_t_and_c.php"> Terms and Condition</a></li>
									  <li class="<?php if($currentFile=="manage_policy.php"){echo 'active';}?>"><a href="manage_policy.php">Privacy Policy</a></li>
									</ul>
								  </li> -->
								
								<!-- <li class="<?php if($currentFile=="manage_subcategory.php" or $currentFile=="add_subcategory.php"){echo 'active';}?>"><a href="manage_subcategory.php"><i class=" icon-list-unordered"></i> <span>Quiz Sub Category</span></a></li> -->

								<!-- <li class="<?php if($currentFile=="#" or $currentFile=="quiz_index.php"){echo 'active';}?>"><a href="quiz_index.php"><i class=" icon-question4"></i> <span>Quiz</span></a></li> --> 
								<!-- 
								<li class="navigation-header"><span>Daily Update</span> <i class="icon-menu" title="Forms"></i></li>
								<li>
								<li class="<?php if($currentFile=="manage_current_affair.php" or $currentFile=="add_current_affair.php"){echo 'active';}?>"><a href="manage_current_affair.php"><i class="icon-location4"></i> <span> Current Affairs</span></a></li>
	
								<li class="<?php if($currentFile=="manage_latest_news.php" or $currentFile=="add_latest_news.php"){echo 'active';}?>"><a href="manage_latest_news.php"><i class="icon-images2"></i> <span>Latest News</span></a></li>
								--> 
								
								
								<!-- <li class="<?php if($currentFile=="manage_chatroom.php"){echo 'active';}?>"><a href="manage_chatroom.php"><i class="icon-bubbles5"></i> <span>Chat Room</span></a></li> -->
								<!-- <li class="<?php if($currentFile=="manage_about_us.php" or $currentFile=="add_about_us.php"){echo 'active';}?>"><a href="manage_about_us.php"><i class="icon-file-text"></i> <span>Manage Pages</span></a> -->
								<!--  <li class="<?php if($currentFile=="manage_contact_us.php" or $currentFile=="add_contact_us.php"){echo 'active';}?>"><a href="manage_contact_us.php"><i class="icon-phone2"></i> <span>Contact Us</span></a>  -->
								<!--<li class="<?php if($currentFile=="settings.php"){echo 'active';}?>"><a href="settings.php"><i class="icon-cog4"></i> <span>Settings</span></a></li>-->
								
								
								<!-- /main -->
							</ul>
					<!-- /main -->
				</ul>
			</div>
		</div>
		<!-- /main navigation -->
	</div>
</div>