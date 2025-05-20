<!DOCTYPE html>
<html lang="en">

<?php 
require("includes/function.php");
include("language/language.php");
include("includes/head.php");
?>

<!-- Theme JS files -->
<script type="text/javascript" src="assets/js/core/libraries/jasny_bootstrap.min.js"></script>
<script type="text/javascript" src="assets/js/plugins/forms/selects/select2.min.js"></script>
<script type="text/javascript" src="assets/js/plugins/forms/styling/uniform.min.js"></script>
<script type="text/javascript" src="assets/js/plugins/ui/moment/moment.min.js"></script>
<script type="text/javascript" src="assets/js/plugins/ui/fullcalendar/fullcalendar.min.js"></script>
<script type="text/javascript" src="assets/js/plugins/visualization/echarts/echarts.js"></script>
<script type="text/javascript" src="assets/js/core/app.js"></script>
<script type="text/javascript" src="assets/js/pages/user_profile_tabbed.js"></script>
<!-- /theme JS files -->
<body class="sidebar-xs has-detached-left">

	<!-- Main navbar -->
<?php 
include("includes/header.php");
?>
	<!-- /main navbar -->
	<!-- Page container -->
	<div class="page-container">
		<!-- Page content -->
		<div class="page-content">

			<!-- Main sidebar -->
<?php 
include("includes/sidebar.php");

print_r($_SESSION);
if($_SESSION['id']!=2)
{
if(isset($_SESSION['id']))
{     	
$qry="select * from admin where id='".$_SESSION['id']."'";    	
$result=mysqli_query($mysqli,$qry);    	
$row=mysqli_fetch_assoc($result);
}else{
   $qry="select * from admin where id='1'";    	
$result=mysqli_query($mysqli,$qry);    	
$row=mysqli_fetch_assoc($result); 
}
      
if(isset($_POST['submit']))        
{        	
	if($_FILES['image']['name']!="")        	 
	{		        			
		$img_res=mysqli_query($mysqli,'SELECT * FROM admin WHERE id='.$_SESSION['id'].'');        		  
		$img_res_row=mysqli_fetch_assoc($img_res);
							
		if($img_res_row['image']!="")        	        
		{        				     
			unlink('images/registrationimage/'.$img_res_row['image']);        		     
		}        				   
			$image="profile.png";        			   
			$pic1=$_FILES['image']['tmp_name'];        			   
			$tpath1='images/registrationimage/'.$image;        				
			copy($pic1,$tpath1);   
			
			$data = array(                          
			'fname'  =>  $_POST['fname'],                         
			'email'  =>  $_POST['email'],                        
			 'mobile'  =>  $_POST['mobile'],        				
			 'username'  =>  $_POST['username'],        				
			 'password'  =>  $_POST['password'],							            				
			 'image'  =>  $image        						   
			 );        				
			$channel_edit=Update('admin', $data, "WHERE id = '".$_POST['admin_id']."'");         	 
	}        	 
	else        	 
	{        				
		 $data = array(                         
		 
		 'fname'  =>  $_POST['fname'],                         
		 'email'  =>  $_POST['email'],                         
		 'mobile'  =>  $_POST['mobile'],         				
		 'username'  =>  $_POST['username'],        				 
		 'password'  =>  $_POST['password']        						    
		 );        				
			$channel_edit=Update('admin', $data, "WHERE id = '".$_POST['admin_id']."'");         	
	}        	
	$_SESSION['msg']="11";         	
	//header( "Location:profile.php");   
echo "<script language=javascript>location.href='profile.php';</script>";	
	//exit;        
 }
}
?>
			<!-- /main sidebar -->
			<!-- Main content -->
			<div class="content-wrapper">
				<!-- Page header -->
				<div class="page-header page-header-default">
					<div class="page-header-content">
						<div class="page-title">
							<h4> <span class="text-semibold">User </span> Profile</h4>
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

					<!-- Detached sidebar -->
					<div class="sidebar-detached">
						<div class="sidebar sidebar-default sidebar-separate">
							<div class="sidebar-content">

								<!-- User details -->
								<div class="content-group">
									<div class="panel-body bg-indigo-400 border-radius-top text-center" style="background-image: url(http://demo.interface.club/limitless/assets/images/bg.png); background-size: contain;">
										<div class="content-group-sm">
											<h6 class="text-semibold no-margin-bottom">
												<?php echo $row['fname'];?>
											</h6>

											<span class="display-block"><?php echo $row['email'];?></span>
										</div>
										<a href="#" class="display-inline-block content-group-sm">
											<img src="images/registrationimage/<?php echo $row['image'];?>" class="img-circle img-responsive" alt="" style="width: 110px; height: 110px;">
										</a>
									</div>

									<div class="panel no-border-top no-border-radius-top">
										<ul class="navigation">
											<li class="navigation-header">Navigation</li>
											<li class="active"><a href="#profile" data-toggle="tab"><i class="icon-files-empty"></i> Profile</a></li>
											
											<li><a href="logout.php"><i class="icon-switch2"></i> Log out</a></li>
										</ul>
									</div>
								</div>
								<!-- /user details -->


							</div>
						</div>
					</div>
		            <!-- /detached sidebar -->


					<!-- Detached content -->
					<div class="container-detached">
						<div class="content-detached">

							<!-- Tab content -->
							<div class="tab-content">
								<div class="tab-pane fade in active" id="profile">
									<!-- Profile info -->
									<div class="panel panel-flat">
										<div class="panel-heading">
											<h6 class="panel-title">Profile information</h6>
											
										</div>

										<div class="panel-body">
											<?php if(isset($_SESSION['msg'])){?>
											  <div class="alert alert-success no-border">
													<button type="button" class="close" data-dismiss="alert"><span>&times;</span><span class="sr-only">Close</span></button>
													<span class="text-semibold"><?php echo $client_lang[$_SESSION['msg']] ; ?></span> 
											</div>
											<?php unset($_SESSION['msg']);}?> 
											<form action="profile.php" method="post" enctype="multipart/form-data">
												<div class="form-group">
													<div class="row">
														<div class="col-md-6">
															<label>Full name</label>
															<input type="text" name="fname" value="<?php echo $row['fname'];?>" class="form-control">
														</div>
														<div class="col-md-6">
															<label>Email</label>
															<input type="text" name="email" value="<?php echo $row['email'];?>" class="form-control">
														</div>
													</div>
												</div>
												<!-- <div class="form-group">
													<div class="row">
														<div class="col-md-6">
															<label>Phone #</label>
															<input type="text" name="mobile" value="<?php echo $row['mobile'];?>" class="form-control">
													
						                        		</div>
														<div class="col-md-6">
															<label class="display-block">Upload profile image</label>
						                                    <input type="file" id="" name="image" class="file-styled">
						                                    <span class="help-block">Accepted formats: gif, png, jpg. Max file size 2Mb</span>
														</div>
													</div>
												</div> -->
										</div>
									    <div class="panel-body">
											<div class="form-group">
												<div class="row">
													<div class="col-md-6">
														<label>Username</label>
														<input type="text" name="username" value="<?php echo $row['username'];?>" class="form-control">
													</div>
													<div class="col-md-6">
														<label>Current password</label>
														<input type="password" name="password" value="<?php echo $row['password'];?>" readonly="readonly" class="form-control">
														
															<input type="hidden" name="admin_id" value="<?php echo $row['id'];?>" >
													</div>
												</div>
											</div>

											<div class="text-right">
												<button type="submit" name="submit" class="btn btn-primary">Save <i class="icon-arrow-right14 position-right"></i></button>
											</div>
					                        </form>
										</div>
									</div>
									<!-- /account settings -->
								</div>
							</div>
							<!-- /tab content -->
						</div>
					</div>
					<!-- /detached content -->
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
