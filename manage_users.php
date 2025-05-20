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
if($_SESSION['id']!=2)
{
if(isset($_GET['user_id']))
{

	Delete('user','id='.$_GET['user_id'].'');

	$_SESSION['msg']="12";

	//header("Location:manage_users.php");

	//exit;
}	



//Active and Deactive status
		if(isset($_GET['status_deactive_id']))
		{	
			$data = array('status'  =>  '0');	
			$edit_status=Update('user', $data, "WHERE id = '".$_GET['status_deactive_id']."'");	
			$_SESSION['msg']="14";	
			
		}
		
		if(isset($_GET['status_active_id']))
		{	
			$data = array('status'  =>  '1');	
			$edit_status=Update('user', $data, "WHERE id = '".$_GET['status_active_id']."'");	
			$_SESSION['msg']="13";	
			
		}
}	
$quotes_qry="SELECT * FROM user ORDER BY user.id ASC"; 
$result=mysqli_query($mysqli,$quotes_qry);	
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
								<h4> <span class="text-semibold">User List</span></h4>
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
								<button type="button"
								        class="close"
								        data-dismiss="alert">
									<span>&times;</span>
									<span class="sr-only">Close</span>
								</button>
								<span class="text-semibold"><?php echo $client_lang[$_SESSION['msg']] ; ?>
								</span>
							</div>
						<?php unset($_SESSION['msg']);}?>
							<table class="table datatable-basic table-bordered">
								<thead>
									<tr>
										<th class="text-center">No</th>
										<th class="text-center">Name</th>
										<th class="text-center">Email</th>
										<th class="text-center">Status</th>
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
										<td class="text-center"><?php echo $row['name'];?></td>
										<td class="text-center"><?php echo $row['email'];?></td>
										<td class="text-center">
								<?php if($row['status']!="0"){?>
											<a href="manage_users.php?status_deactive_id=<?php echo $row['id'];?>"
											   title="Change Status">
												<span class="badge badge-success badge-icon">
													<i class="fa fa-check"
													   aria-hidden="true"/>
													<span style="font-size: 12px;
									font-weight: 500;line-height: 16px;display: inline-block;margin-left: 3px;">Enable</span>
												</span>
											</a>
								  <?php }else{?>
											<a href="manage_users.php?status_active_id=<?php echo $row['id'];?>"
											   title="Change Status">
												<span class="badge badge-danger badge-icon">
													<i class="fa fa-close"
													   aria-hidden="true"/>
													<span style="font-size: 12px;
									font-weight: 500;line-height: 16px;display: inline-block;margin-left: 3px;">Disable </span>
												</span>
											</a>
								  <?php }?>
										
										</td>
										<td class="text-center">
										<ul class="icons-list">
										<li class="dropdown">
											<a href="#" class="dropdown-toggle" data-toggle="dropdown">
												<i class="icon-menu9"></i>
											</a>
												<ul class="dropdown-menu dropdown-menu-right">
														<li><a href="?user_id=<?php echo $row['id'];?>" title="Delete" onclick="return confirm('Are you sure you want to delete this User?');"><i class="glyphicon glyphicon-trash"></i> DELETE</a></li>
														<li><a href="view_user.php?user_id=<?php echo $row['id']; ?>"><i class="glyphicon glyphicon-eye-open"></i> VIEW</a></li>
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