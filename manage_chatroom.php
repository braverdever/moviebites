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

 $quotes_qry="SELECT * FROM chat_rooms ORDER BY chat_rooms.chat_room_id DESC"; 
 $result=mysqli_query($mysqli,$quotes_qry);

if($_SESSION['id']!=2)
{
if(isset($_GET['chat_room_id']))
{

	Delete('chat_rooms','chat_room_id='.$_GET['chat_room_id'].'');
	Delete('messages','chat_room_id='.$_GET['chat_room_id'].'');

	$_SESSION['msg']="12";

	header("Location:manage_chatroom.php");

	exit;
}	

//Active and Deactive status
		if(isset($_GET['status_deactive_id']))
		{	
			$data = array('status'  =>  '0');	
			$edit_status=Update('chat_rooms', $data, "WHERE chat_room_id = '".$_GET['status_deactive_id']."'");	
			$_SESSION['msg']="14";	
			header( "Location:manage_chatroom.php");	
			exit;
		}
		
		if(isset($_GET['status_active_id']))
		{	
			$data = array('status'  =>  '1');	
			$edit_status=Update('chat_rooms', $data, "WHERE chat_room_id = '".$_GET['status_active_id']."'");	
			$_SESSION['msg']="13";	
			header( "Location:manage_chatroom.php");	
			exit;
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
							<h4> <span class="text-semibold">Chatroom Title List</span></h4>
						</div>

						<div class="heading-elements">
							
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
						<div class="panel-heading">
							<h5 class="panel-title">Chatroom Title List</h5>
							
						</div>
						<?php if(isset($_SESSION['msg'])){?>
						<div class="alert alert-success no-border">
								<button type="button" class="close" data-dismiss="alert"><span>&times;</span><span class="sr-only">Close</span></button>
								<span class="text-semibold"><?php echo $client_lang[$_SESSION['msg']] ; ?></span> 
						</div>
						<?php unset($_SESSION['msg']);}?>

						<table class="table datatable-basic table-bordered">
							<thead>
								<tr>
									<th>No</th>
									<th>Name</th>
									
									<th>Status</th>
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
								<td><?php echo $i;?></td>
								<td><?php echo $row['name'];?></td>
								
								<td>
								<?php if($row['status']!="0"){?>
								 <a href="manage_chatroom.php?status_deactive_id=<?php echo $row['chat_room_id'];?>" title="Change Status"><span class="badge badge-success badge-icon"><i class="fa fa-check" aria-hidden="true"></i><span style="font-size: 12px;
									font-weight: 500;line-height: 16px;display: inline-block;margin-left: 3px;">Enable</span></span></a>
								  <?php }else{?>
								  <a href="manage_chatroom.php?status_active_id=<?php echo $row['chat_room_id'];?>" title="Change Status"><span class="badge badge-danger badge-icon"><i class="fa fa-close" aria-hidden="true"></i><span style="font-size: 12px;
									font-weight: 500;line-height: 16px;display: inline-block;margin-left: 3px;">Disable </span></span></a>
								  <?php }?>
								</td>
								<td class="text-center">
									<ul class="icons-list">
										<li class="dropdown">
											<a href="#" class="dropdown-toggle" data-toggle="dropdown">
												<i class="icon-menu9"></i>
											</a>
											<ul class="dropdown-menu dropdown-menu-right">												
												<li><a href="?chat_room_id=<?php echo $row['chat_room_id'];?>" title="Delete" onclick="return confirm('Are you sure you want to delete this category?');"><i class="glyphicon glyphicon-trash"></i> DELETE</a></li>									
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