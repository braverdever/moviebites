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
<body class="sidebar-xs">
<!-- Main navbar -->
<?php 
include("includes/header.php");



$users_qry="SELECT * FROM tbl_call_history  ORDER BY tbl_call_history.call_id DESC";  
$users_result=mysqli_query($mysqli,$users_qry);

if(isset($_GET['call_id']))
{
	Delete('tbl_call_history','call_id='.$_GET['call_id'].'');
	$_SESSION['msg']="12";
	//header( "Location:manage_callhistory_list.php");
	echo "<script language=javascript>location.href='manage_callhistory_list.php';</script>";
	exit;
}
function get_user_info($user_id)
{
	global $mysqli;

	$query1="SELECT * FROM tbl_users WHERE tbl_users.user_id='".$user_id."'";
   
	$sql1 = mysqli_query($mysqli,$query1)or die(mysqli_error());

	$data1 = mysqli_fetch_assoc($sql1);

	return $data1;
}

function get_caller_info($caller_id)
{
	global $mysqli;
	
	$query1="SELECT * FROM tbl_users LEFT JOIN 
	tbl_call_history ON tbl_call_history.caller_id= tbl_users.user_id 
	WHERE tbl_users.user_id='".$caller_id."'";
	
	$sql1 = mysqli_query($mysqli,$query1)or die(mysqli_error());

	$data1 = mysqli_fetch_assoc($sql1);

	return $data1;
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
							<h4><span class="text-semibold">Callhistory </span> - List</h4>
						</div>

						<div class="heading-elements">
							<!--<div class="heading-btn-group">
								<a href="add_tellecaller.php?add=yes" class="btn btn-link btn-float has-text"><i class="glyphicon glyphicon-plus text-primary"></i><span>Add tellecaller</span></a>
								
							</div>-->
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
				<!-- Basic datatable -->
				<div class="panel panel-flat">	
					<?php if(isset($_SESSION['msg'])){?>
						  <div class="alert alert-success no-border">
								<button type="button" class="close" data-dismiss="alert"><span>&times;</span><span class="sr-only">Close</span></button>
								<span class="text-semibold"><?php echo $client_lang[$_SESSION['msg']] ; ?></span> 
						</div>
					<?php unset($_SESSION['msg']);}?>				
					<table class="table datatable-basic table-hover">
						<thead>
							<tr class="row100 head">
								<th>User image</th>
								<th>User name</th>
								<th>Tellecaller  image</th>
								<th>Tellecaller name</th>
								<th>Call start time</th>
								<th>Call end time</th>
								<th>Call time</th>
								<th>Call date</th>						
								<th>Call Type</th>						
								<th>Actions</th>
							</tr>
						</thead>
						<tbody>
						<?php 
							while($users_row=mysqli_fetch_array($users_result))
							{         
							?>
						<tr>
							<td><img src="images/userRegister/<?php echo get_user_info($users_row ['user_id'])['user_image'];?>" class="img-circle img-md"/></td>
							<td><?php echo get_user_info($users_row['user_id'])['name'];?></td>
							<td><img src="images/userRegister/<?php echo get_caller_info($users_row ['caller_id'])['user_image'];?>" class="img-circle img-md"/></td>
							<td><?php echo get_caller_info($users_row['caller_id'])['name'];?></td>
							<td><?php echo $users_row['call_start_time'];?></td>   
							<td><?php echo $users_row['call_end_time'];?></td>   
							<td><?php echo $users_row['call_time'];?></td>   
							<td><?php echo $users_row['call_date'];?></td>   
							<td><?php echo $users_row['call_type'];?></td>   
							
							
							<td class="text-center">
								<ul class="icons-list">
									<li class="dropdown">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown">
											<i class="icon-menu9"></i>
										</a>

										<ul class="dropdown-menu dropdown-menu-right">
											<!--<li><a href="add_tellecaller.php?call_id=<?php echo $users_row['call_id'];?>"><i class="icon-pencil7"></i> Edit</a></li>-->
											<li><a href="?call_id=<?php echo $users_row['call_id'];?>" title="Delete" onclick="return confirm('Are you sure you want to delete this category?');"><i class="glyphicon glyphicon-trash"></i> DELETE</a></li>
											<!--<li><a href="?call_id=<?php echo $users_row['call_id'];?>" title="Delete" onclick="return confirm('Are you sure you want to delete this category?');"><i class="glyphicon glyphicon-trash"></i> DELETE</a></li>-->
									
										</ul>
									</li>
								</ul>
							</td>
						</tr>	
						<?php } ?> 						
						</tbody>
					</table>
				</div>
				<!-- /basic datatable -->
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
