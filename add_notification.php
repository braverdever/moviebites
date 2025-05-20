<!DOCTYPE html>
<html lang="en">
<?php
require("language/language.php");
require("includes/function.php");
include("includes/head.php");

?>
<!-- Theme JS files -->
<script type="text/javascript" src="assets/js/plugins/forms/styling/uniform.min.js"></script>
<script type="text/javascript" src="assets/js/core/app.js"></script>
<script type="text/javascript" src="assets/js/pages/form_inputs.js"></script>
<!--<script type="text/javascript" src="ckeditor/ckeditor.js"></script>-->
<!-- /theme JS files -->
<body>

	<!-- Main navbar -->
<?php 
include("includes/header.php");

require_once("thumbnail_images.class.php");


if($_SESSION['id']!=2)
{
if(isset($_POST['submit']) and isset($_GET['add']))
{
	
	if($_FILES['big_picture']['name']!="")
    {   

        $big_picture=rand(0,99999)."_".$_FILES['big_picture']['name'];
        $tpath='images/'.$big_picture;
        move_uploaded_file($_FILES["big_picture"]["tmp_name"], $tpath);

        $file_path = 'http://'.$_SERVER['SERVER_NAME'] . dirname($_SERVER['REQUEST_URI']).'/images/'.$big_picture;
        
        $content = array(
                         "en" => $_POST['description']                                                 
                         );
        $fields = array(
                        'app_id' =>'05cb4c8f-603f-4334-8642-976bd2b1cd70',
                        'included_segments' => array('All'),                                            
                        'data' => array("foo" => "bar"),
                        'headings'=> array("en" => $_POST['title']),
                        'contents' => $content,
                        'big_picture' =>$file_path,
                        'ios_attachments' => array(
                        'id' => $file_path,
                        ),                     
                        );

        //print_r ($fields);
        $fields = json_encode($fields);
        //print("\nJSON sent:\n");
       // print($fields);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charset=utf-8',
                                                   'Authorization: Basic '.'N2Y0OTY4MWEtYzZjOC00Mjc2LWE2ZTctZDZlMzcyODFlMWIz'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_POST, TRUE);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

       echo  $response = curl_exec($ch);
        curl_close($ch);
       
    }
    else
    {
 
        $content = array(
                         "en" => $_POST['description']
                          );

        $fields = array(
                        'app_id' =>'05cb4c8f-603f-4334-8642-976bd2b1cd70',
                        'included_segments' => array('All'),                                      
                        'data' => array("foo" => "bar"),
                        'headings'=> array("en" => $_POST['title']),
                        'contents' => $content
                        );

        $fields = json_encode($fields);
        //print("\nJSON sent:\n");
        //print($fields);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charset=utf-8',
                                                   'Authorization: Basic '.'N2Y0OTY4MWEtYzZjOC00Mjc2LWE2ZTctZDZlMzcyODFlMWIz'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_POST, TRUE);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        $response = curl_exec($ch);
       
        curl_close($ch);
    }
	
        $data = array( 
				
				'title'  =>  $_POST['title'],
				'description'  =>  $_POST['description'],
								
              );    
       
    $qry = Insert('tbl_notification',$data);  

    $_SESSION['msg']="10";
    header( "location:manage_notification.php");
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
							<h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Add</span> - Notification detail</h4>
						</div>
						<div class="heading-elements">
							<div class="heading-btn-group">
								<a href="manage_notification.php" class="btn btn-link btn-float has-text"><i class="icon-backward text-primary"></i><span>Back</span></a>								
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
								<legend class="text-bold">Notification detail</legend>								
								<div class="form-group">
									<label class="control-label col-lg-2">Title</label>
									<div class="col-lg-10">
										<input type="text" class="form-control" name="title" id="title" value="<?php if(isset($_GET['cat_id'])){echo $row['title'];}?>" placeholder="Enter title">
									</div>
								</div>								
								<div class="form-group">
									<label class="control-label col-lg-2">Description </label>
									<div class="col-lg-10">
										 <textarea name="description" id="description" class="form-control m-input" required><?php if(isset($_GET['cat_id'])){echo $row['description'];}?></textarea>
                                    <!--<script>CKEDITOR.replace( 'description' );</script>-->
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
					<?php include("includes/footer.php");?>
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
<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script>
  $( "#startdate" ).datepicker({
  dateFormat: 'dd/mm/y',//check change
  changeMonth: true,
  changeYear: true
});
</script>