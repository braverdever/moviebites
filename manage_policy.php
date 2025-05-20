<!DOCTYPE html>
<html lang="en">

<?php 
require("includes/function.php");
include("language/language.php");
include("includes/head.php");
?>

<!-- Theme JS files -->
<script type="text/javascript" src="assets/js/plugins/forms/styling/uniform.min.js"></script>
<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="assets/js/pages/editor_ckeditor.js"></script>
<script type="text/javascript" src="assets/js/core/app.js"></script>
<script type="text/javascript" src="assets/js/pages/form_inputs.js"></script>
<!-- /theme JS files -->
<body>

	<!-- Main navbar -->
<?php 
include("includes/header.php");

$qry="SELECT * FROM tbl_settings where id='1'";
$result=mysqli_query($mysqli,$qry);
$settings_row=mysqli_fetch_assoc($result);


if($_SESSION['id']!=2)
{
if(isset($_POST['submit']))
{    
	$img_res=mysqli_query($mysqli,"SELECT * FROM tbl_settings WHERE id='1'");    
	$img_row=mysqli_fetch_assoc($img_res);
	if($_FILES['app_logo']['name']!="")
	{            
		unlink('images/'.$img_row['app_logo']);       
		$app_logo=$_FILES['app_logo']['name'];    
		$pic1=$_FILES['app_logo']['tmp_name'];    
		$tpath1='images/'.$app_logo;          
		copy($pic1,$tpath1);    
		$data = array('app_name'  =>  $_POST['app_name'],    
		'app_logo'  =>  $app_logo,      
		'app_description'  => addslashes($_POST['app_description']),	
		'app_version'  =>  $_POST['app_version'],   
		 'app_author'  =>  $_POST['app_author'],    
		 'app_contact'  =>  $_POST['app_contact'],    
		 'app_email'  =>  $_POST['app_email'],       
		 'app_website'  =>  $_POST['app_website'],    
		 'app_developed_by'  =>  $_POST['app_developed_by'] );
	}
	else
	{
		 $data = array(	'app_name'  =>  $_POST['app_name'],
		 'app_description'  => addslashes($_POST['app_description']),	
		 'app_version'  =>  $_POST['app_version'],	
		 'app_author'  =>  $_POST['app_author'],    
		 'app_contact'  =>  $_POST['app_contact'],    
		 'app_email'  =>  $_POST['app_email'],       
		 'app_website'  =>  $_POST['app_website'],   
		 'app_developed_by'  =>  $_POST['app_developed_by']);    
	} 
	 $settings_edit=Update('tbl_settings', $data, "WHERE id = '1'"); 
	 if ($settings_edit > 0) 
	 {    
		$_SESSION['msg']="11";     
		//header( "Location:settings.php"); 
			echo "<script language=javascript>location.href='settings.php';</script>";		
		 exit;
	 }   
 }

if(isset($_POST['app_pri_poly']))
{    
	$data = array('app_privacy_policy'  =>  addslashes($_POST['app_privacy_policy']));      
	$settings_edit=Update('tbl_settings', $data, "WHERE id = '1'");
	if ($settings_edit > 0)
	{    
		$_SESSION['msg']="11";   
		//header( "Location:settings.php"); 
		echo "<script language=javascript>location.href='manage_policy.php';</script>";		
		exit;
	}   
}
if(isset($_POST['app_terms_con']))
{    
	$data = array('app_terms_conditions'  =>  addslashes($_POST['app_terms_conditions']));    
	$settings_edit=Update('tbl_settings', $data, "WHERE id = '1'");    
	$_SESSION['msg']="11";   
	//header( "Location:settings.php");   
	echo "<script language=javascript>location.href='manage_t_and_c.php';</script>";
	exit;  
}
if(isset($_POST['app_daily_task']))
{    
	$data = array(
		'login_rewards'  =>  $_POST['login_rewards'],
		'show_whatsapp_join'  =>  $_POST['show_whatsapp_join'],
		'show_notification'  =>  $_POST['show_notification'],
	);    
	$settings_edit=Update('tbl_settings', $data, "WHERE id = '1'");    
	$_SESSION['msg']="11";   
	//header( "Location:settings.php");   
	echo "<script language=javascript>location.href='settings.php';</script>";
	exit;  
}
if(isset($_POST['notification_settings']))  
 {        
		$data = array(                
		'onesignal_app_id' => $_POST['onesignal_app_id'],
		'onesignal_rest_key' => $_POST['onesignal_rest_key'], 
		
		);          
		$settings_edit=Update('tbl_settings', $data, "WHERE id = '1'"); 
		$_SESSION['msg']="11";       
		//header( "Location:settings.php"); 
		echo "<script language=javascript>location.href='settings.php';</script>";		
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
							<h4><span class="text-semibold">Privacy Policy</span></h4>
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
					<!-- /form horizontal -->
					<div class="panel panel-flat">
                        <div class="panel-heading"> </div>
						<?php if(isset($_SESSION['msg'])){?>
							<div class="alert alert-success no-border">
								<button type="button" class="close" data-dismiss="alert"><span>&times;</span><span class="sr-only">Close</span></button> <span class="text-semibold"><?php echo $client_lang[$_SESSION['msg']] ; ?></span> 
							</div>
							<?php unset($_SESSION['msg']);}?>
                                    <!-- Horizontal form options -->
							<div class="row">
								<div class="col-md-12">
									<div class="m-portlet__head">
										<div class="m-portlet__head-tools">
											<ul class="nav nav-tabs m-tabs m-tabs-line   m-tabs-line--left m-tabs-line--primary" role="tablist">
												<li class="nav-item m-tabs__item active"> <a class="nav-link m-tabs__link" data-toggle="tab" href="#app_settings_tab_4" role="tab">App Privacy Policy</a> </li>
												
												
											</ul>
										</div>
									</div>
									<div class="tab-content">
										<div class="tab-pane active" id="app_settings_tab_4">
											<form class="form-horizontal" action="manage_policy.php" method="post" enctype="multipart/form-data">
												<div class="panel-body">
													<div class="form-group">
														<label class="col-lg-3 control-label">App Privacy Policy :-</label>
														<div class="col-lg-9">
															<textarea name="app_privacy_policy" id="app_privacy_policy" rows="5" cols="5">
																<?php echo stripslashes($settings_row['app_privacy_policy']);?>
															</textarea>
															<script>
																CKEDITOR.replace('app_privacy_policy');
															</script>
														</div>
													</div>
													<div class="text-right">
														<button type="submit" name="app_pri_poly" class="btn btn-primary"> Save changes<i class="icon-arrow-right14 position-right"></i> </button>
													</div>
												</div>
											</form>
										</div>
									</div>
								</div>
							</div>
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
