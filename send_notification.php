<!DOCTYPE html>
<html lang="en">
<?php 
require("includes/function.php");
include("language/language.php");
include("includes/head.php");
?>

<!-- Theme JS files -->
<script type="text/javascript" src="assets/js/plugins/forms/styling/uniform.min.js"></script>
<script type="text/javascript" src="assets/js/core/app.js"></script>
<script type="text/javascript" src="assets/js/pages/form_inputs.js"></script>
	<!-- /theme JS files -->
<body>

	<!-- Main navbar -->
<?php 
include("includes/header.php");

require_once("thumbnail_images.class.php");

if(isset($_POST['submit']))
 {
  
    if($_FILES['big_picture']['name']!="")
    {   

        $big_picture=rand(0,99999)."_".$_FILES['big_picture']['name'];
         $tpath='images/notificationimage/'.$big_picture;
        move_uploaded_file($_FILES["big_picture"]["tmp_name"], $tpath);

        $file_path = 'http://'.$_SERVER['SERVER_NAME'] . dirname($_SERVER['REQUEST_URI']).'/images/notificationimage/'.$big_picture;
          
        $content = array(
                         "en" => $_POST['notification_msg']                                                 
                         );

        $fields = array(
                        'app_id' => ONESIGNAL_APP_ID,
                        'included_segments' => array('All'),                                            
                        'data' => array("foo" => "bar"),
                        'headings'=> array("en" => $_POST['notification_title']),
                        'contents' => $content,
                        'big_picture' =>$file_path,
                        'ios_attachments' => array(
                         'id' => $file_path,
                        ),                     
                        );

		print_r ($fields);
        $fields = json_encode($fields);
        print("\nJSON sent:\n");
        print($fields);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charset=utf-8',
                                                   'Authorization: Basic '.ONESIGNAL_REST_KEY));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_POST, TRUE);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

        $response = curl_exec($ch);
        curl_close($ch);
        
    }
    else
    {
        $content = array(
                         "en" => $_POST['notification_msg']
                          );

        $fields = array(
                        'app_id' => ONESIGNAL_APP_ID,
                        'included_segments' => array('All'),                                      
                        'data' => array("foo" => "bar"),
                        'headings'=> array("en" => $_POST['notification_title']),
                        'contents' => $content
                        );

        $fields = json_encode($fields);
        print("\nJSON sent:\n");
        print($fields);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charset=utf-8',
                                                   'Authorization: Basic '.ONESIGNAL_REST_KEY));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_POST, TRUE);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

        $response = curl_exec($ch);
        
        curl_close($ch);
    } 
        $_SESSION['msg']="16";
     
        //header( "Location:send_notification.php");
		echo "<script language=javascript>location.href='send_notification.php';</script>";
        exit; 
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
							<h4><span class="text-semibold">Notification</span> - Management</h4>
						</div>
						<div class="heading-elements">
							<div class="heading-btn-group">
								<!--<a href="#" class="btn btn-link btn-float has-text"><i class="icon-bars-alt text-primary"></i><span>Statistics</span></a>-->
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
					<!-- Form horizontal -->
					<div class="panel panel-flat">						
						<div class="panel-body">
							<?php if(isset($_SESSION['msg'])){?>
							<div class="alert alert-success no-border">
								<button type="button" class="close" data-dismiss="alert"><span>&times;</span><span class="sr-only">Close</span></button>
								<span class="text-semibold"><?php echo $client_lang[$_SESSION['msg']] ; ?></span> 
							</div>
							<?php unset($_SESSION['msg']);}?>						
							<form class="form-horizontal" action="" name="addeditcategory" method="post" enctype="multipart/form-data">
								<input  type="hidden" name="cat_id" value="<?php echo $_GET['cat_id'];?>" />
								<fieldset class="content-group">
									<legend class="text-bold">Basic detail</legend>
									<div class="form-group">
										<label class="control-label col-lg-2">Title:-</label>
										<div class="col-lg-10">
											<input type="text" class="form-control" name="notification_title" id="notification_title" placeholder="Enter title" required>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-lg-2">Message</label>
										<div class="col-lg-10">
											<textarea rows="5" cols="5" class="form-control" name="notification_msg" id="notification_msg" placeholder="Enter message" required></textarea>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-lg-2">Image :-<br/>(Optional)<p class="control-label-help">(Recommended resolution: 600x293 or 650x317 or 700x342 or 750x366)</p></label>
										<div class="col-lg-10">
											<input type="file" name="big_picture" value="" id="fileupload" class="file-styled-primary"><br>
											<div class="fileupload_img"><img type="image" src="assets/images/placeholder.jpg" alt="category image" style="width: 75px; height: 75px;" class="img-rounded" /></div>
										</div>
									</div>
								</fieldset>								
								<div class="text-right">
									<button type="submit" name="submit" class="btn btn-primary">Submit <i class="icon-arrow-right14 position-right"></i></button>
								</div>
							</form>
						</div>
					</div>
					<!-- /form horizontal -->
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

