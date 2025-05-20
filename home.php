<!DOCTYPE html>
<html lang="en">

<?php 
require("includes/function.php");
include("language/language.php");
include("includes/head.php");

?>
<!-- Theme JS files -->
<script type="text/javascript" src="assets/js/plugins/visualization/d3/d3.min.js"></script>
<script type="text/javascript" src="assets/js/plugins/visualization/d3/d3_tooltip.js"></script>
<script type="text/javascript" src="assets/js/plugins/forms/styling/switchery.min.js"></script>
<script type="text/javascript" src="assets/js/plugins/forms/styling/uniform.min.js"></script>
<script type="text/javascript" src="assets/js/plugins/forms/selects/bootstrap_multiselect.js"></script>
<script type="text/javascript" src="assets/js/plugins/ui/moment/moment.min.js"></script>
<script type="text/javascript" src="assets/js/plugins/pickers/daterangepicker.js"></script>

<script type="text/javascript" src="assets/js/core/app.js"></script>
<script type="text/javascript" src="assets/js/pages/dashboard.js"></script>
<!-- /theme JS files -->
<body>
<!-- Main navbar -->
<?php

include("includes/header.php");

$qry_user="SELECT COUNT(*) as num FROM user";
$total_user= mysqli_fetch_array(mysqli_query($mysqli,$qry_user));
$total_user = $total_user['num'];

$qry_category="SELECT COUNT(*) as num FROM tbl_category";
$total_category= mysqli_fetch_array(mysqli_query($mysqli,$qry_category));
$total_category = $total_category['num'];

$qry_Subcategory ="SELECT COUNT(*) as num FROM tbl_web_series INNER JOIN tbl_category ON tbl_category.cid = tbl_web_series.cat_id";
$total_Subcategory= mysqli_fetch_array(mysqli_query($mysqli,$qry_Subcategory));
$total_Subcategory = $total_Subcategory['num'];


$qry_Subcategory ="SELECT COUNT(*) as num FROM tbl_web_series INNER JOIN tbl_category ON tbl_category.cid = tbl_web_series.cat_id where tbl_web_series.is_slider = '1' ";
$total_Subcategory_= mysqli_fetch_array(mysqli_query($mysqli,$qry_Subcategory));
$total_banners = $total_Subcategory_['num'];

$qry_Affair ="SELECT COUNT(*) as num FROM current_affers";
$total_Affair= mysqli_fetch_array(mysqli_query($mysqli,$qry_Affair));
$total_Affair = $total_Affair['num'];

$qry_News ="SELECT COUNT(*) as num FROM latest_news";
$total_News= mysqli_fetch_array(mysqli_query($mysqli,$qry_News));
$total_News = $total_News['num'];

?>
<!-- /main navbar -->
	<!-- Page container -->
	<div class="page-container">
		<!-- Page content -->
		<div class="page-content">
			<!-- Main sidebar -->
			<?php include("includes/sidebar.php");?>
			<!-- /main sidebar -->
			<!-- Main content -->
			<div class="content-wrapper">
				<!-- Page header -->
				<div class="page-header page-header-default">
					<div class="page-header-content">
						<div class="page-title">
							<h4><span class="text-semibold">Home</span></h4>
						</div>
					</div>
					<div class="breadcrumb-line">
						<ul class="breadcrumb">
							<li><a href="home.php"><i class="icon-home2 position-left"></i> Home</a></li>
							<li class="active">Dashboard</li>
						</ul>
					</div>
				</div>
				<!-- /page header -->
				<!-- Content area -->
				<div class="content">
					<!-- Dashboard content -->
					<div class="row">
						<div class="col-lg-12">
							<!-- Quick stats boxes -->
							<div class="row">								
								<div class="col-lg-3">									
									<div class="panel bg-pink-400">
										<div class="panel-body">
											<a href="manage_category.php"><div class="heading-elements">
												<span class="heading-text badge bg-pink-800"><?php echo $total_category;?></span>
											</div>
											<h3 class="no-margin" style="color: white;">Categories </h3></a>
										</div>
										<div id="server-load"></div>
									</div>									
								</div>
								<div class="col-lg-3">									
									<div class="panel bg-blue-400">
										<div class="panel-body">
										<a href="manage_web_series.php"><div class="heading-elements">
											<span class="heading-text badge bg-blue-800"><?php echo $total_Subcategory;?></span>
										</div>
										<h3 class="no-margin" style="color: white;">Web series</h3>
										</div></a>
										<div id="today-revenue"></div>
									</div>									
								</div>
								
								<div class="col-lg-3">									
									<div class="panel bg-green-400">
										<div class="panel-body">
										<a href="manage_web_series.php?type=banner"><div class="heading-elements">
											<span class="heading-text badge bg-blue-800"><?php echo $total_banners;?></span>
										</div>
										<h3 class="no-margin" style="color: white;">Banners </h3>
										</div></a>
										<div id="today-revenue"></div>
									</div>									
								</div>
								
								
								<div class="col-lg-3">							
									<div class="panel bg-teal-400">
										<div class="panel-body">
											<a href="manage_users.php"><div class="heading-elements">
												<span class="heading-text badge bg-teal-800"><?php echo $total_user;?></span>
											</div>
											<h3 class="no-margin" style="color: white;">Users </h3></a>
										</div>
										<div class="container-fluid">
											<div id="members-online"></div>
										</div>
									</div>									
								</div>
							</div>
						</div>
					</div>
					<!-- /quick stats boxes -->
					<!-- /dashboard content -->
					<!-- Footer -->
					<?php include ('includes/footer.php'); ?>
					<!-- /footer -->
				</div>
				<!-- /content area -->
			</div>
			<!-- /main content -->
		</div>
		<!-- /page content -->
	</div>
	<!-- /page container -->
</body>
</html>