<!DOCTYPE html>
<html lang="en">
<?php 
require("includes/function.php");
include("language/language.php");
include("includes/head.php");
?>
<!-- Theme JS files -->
	<script type="text/javascript" src="assets/js/plugins/tables/datatables/datatables.min.js"></script>
	<script type="text/javascript" src="assets/js/plugins/forms/selects/select2.min.js"></script>

	<script type="text/javascript" src="assets/js/core/app.js"></script>
	<script type="text/javascript" src="assets/js/pages/datatables_basic.js"></script>
	<!-- /theme JS files -->
<body>

	<!-- Main navbar -->
<?php 
include("includes/header.php");

 $quotes_qry="SELECT * FROM tbl_notification ORDER BY tbl_notification.id ASC"; 
 $result=mysqli_query($mysqli,$quotes_qry);

if($_SESSION['id']!=2)
{
	if(isset($_GET['cat_id']))
	{

		Delete('tbl_notification','id='.$_GET['cat_id'].'');

		$_SESSION['msg']="12";

		header("Location:manage_notification.php");

		//exit;
	}
}	
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
							<h4> <span class="text-semibold">Notification List</span></h4>
						</div>
						<div class="heading-elements">
							<div class="heading-btn-group">
								<a href="add_notification.php?add=yes" class="btn btn-link btn-float has-text"><i class=" icon-plus3 text-primary"></i><span>Add Notification</span></a>
								
							</div>
						</div>
					</div>
					<div class="breadcrumb-line">
						<ul class="breadcrumb">
							<li><a href="home.php"><i class="icon-home2 position-left"></i> Home</a></li>
							
						</ul>
					</div>
				</div>
				<!-- /page header -->
				<!-- Content area -->
				<div class="content">
					<div class="panel panel-flat">
						<?php if(isset($_SESSION['msg'])){?>
						<div class="alert alert-success no-border">
								<button type="button" class="close" data-dismiss="alert"><span>&times;</span><span class="sr-only">Close</span></button>
								<span class="text-semibold"><?php echo $client_lang[$_SESSION['msg']] ; ?></span> 
						</div>
						<?php unset($_SESSION['msg']);}?>

						<table class="table datatable-basic table-bordered">
							<thead>
								<tr>
									<th class="text-center">No</th>
									<th class="text-center">Title</th>
									<th class="text-center">Description</th> 
									
									<th class="text-center">Actions</th>
								</tr>
							</thead>
							<tbody>
							<?php 
							$i=1;
							while($row=mysqli_fetch_array($result))
							{         
							?>
							<tr>
								<td class="text-center"><?php echo $i;?></td>
								<td class="text-center"><?php echo $row['title'];?></td>
								<td class="text-center"><?php echo $row['description'];?></td>																
								<td class="text-center">
									<ul class="icons-list">
										<li class="dropdown">
											<a href="#" class="dropdown-toggle" data-toggle="dropdown">
												<i class="icon-menu9"></i>
											</a>
											<ul class="dropdown-menu dropdown-menu-right">
												<!--<li><a href="add_notification.php?cat_id=<?php echo $row['id'];?>"><i class="glyphicon glyphicon-edit"></i> EDIT</a></li>-->
												<li><a href="?cat_id=<?php echo $row['id'];?>" title="Delete" onclick="return confirm('Are you sure you want to delete this category?');"><i class="glyphicon glyphicon-trash"></i> DELETE</a></li>									
											</ul>
										</li>
									</ul>
								</td>
							</tr>
							<?php
							$i++;
								}

								?> 								
							</tbody>
						</table>
					</div>
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