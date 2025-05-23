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
<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
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
	
    $image=rand(0,99999)."_".$_FILES['image']['name'];

    $tpath1='images/hotgk/'.$image;        

    $pic1=compress_image($_FILES["image"]["tmp_name"], $tpath1, 80);

       $data = array( 
         'title'  =>  $_POST['title'],
		 'descr'  =>  $_POST['descr'],
         'date'  =>  $_POST['date'],
         'image'  =>  $image
          );    

    $qry = Insert('latest_news',$data);  

    $_SESSION['msg']="10";
    header( "Location:manage_latest_news.php");
    exit; 
}
  
if(isset($_GET['cat_id']))
{

$qry="SELECT * FROM latest_news where id='".$_GET['cat_id']."'";

$result=mysqli_query($mysqli,$qry);

$row=mysqli_fetch_assoc($result);

}

if(isset($_POST['submit']) and isset($_POST['cat_id']))
{

	if($_FILES['image']['name']!="")
	{    

        $img_res=mysqli_query($mysqli,'SELECT * FROM latest_news WHERE id='.$_GET['cat_id'].'');

        $img_res_row=mysqli_fetch_assoc($img_res);

          if($img_res_row['image']!="")
			{
                unlink('images/hotgk/'.$img_res_row['image']);
			}

            $image=rand(0,99999)."_".$_FILES['image']['name'];

            $tpath1='images/hotgk/'.$image;        

            $pic1=compress_image($_FILES["image"]["tmp_name"], $tpath1, 80);

                    $data = array(

                       'title'  =>  $_POST['title'],
					   'descr'  =>  $_POST['descr'],
					   'date'  =>  $_POST['date'],
						'image'  =>  $image

                    );

          $category_edit=Update('latest_news', $data, "WHERE id = '".$_POST['cat_id']."'");
    }
    else
    {

	   $data = array(

			 'title'  =>  $_POST['title'],
			 'descr'  =>  $_POST['descr'],
			'date'  =>  $_POST['date'],

		);  

		   $category_edit=Update('latest_news', $data, "WHERE id = '".$_POST['cat_id']."'");
    }

    $_SESSION['msg']="11"; 
    header( "Location:add_latest_news.php?cat_id=".$_POST['cat_id']);
    exit;
  }
}
if(isset($_GET['cat_id']))
{

      $qry="SELECT * FROM latest_news where id='".$_GET['cat_id']."'";

      $result=mysqli_query($mysqli,$qry);

      $row=mysqli_fetch_assoc($result);
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
							<h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Add</span> - News Detail</h4>
						</div>

						<div class="heading-elements">
							<div class="heading-btn-group">
								<a href="manage_latest_news.php" class="btn btn-link btn-float has-text"><i class="icon-backward text-primary"></i><span>Back</span></a>
								
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
								<legend class="text-bold">News Detail</legend>

								<div class="form-group">
									<label class="control-label col-lg-2">News Title </label>
									<div class="col-lg-10">
										<input type="text" class="form-control" name="title" id="title" value="<?php if(isset($_GET['cat_id'])){echo $row['title'];}?>" placeholder="Enter Title">
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-lg-2">News Description </label>
									<div class="col-lg-10">
										 <textarea name="descr" id="descr" class="form-control m-input" required><?php if(isset($_GET['cat_id'])){echo $row['descr'];}?></textarea>
                                    <script>CKEDITOR.replace( 'descr' );</script>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-lg-2">News Date </label>
									<div class="col-lg-10">
										 <input type="text" class="form-control" name="date" id="startdate" value="<?php if(isset($_GET['cat_id'])){echo $row['date'];}?>">
									</div>
								</div>
		              
								<div class="form-group">
									<label class="control-label col-lg-2">News Image </label>
									<div class="col-lg-10">							
										<div class="media no-margin-top">
											<div class="media-left">
												<div class="media-body">
													<input type="file" id="image" name="image" class="file-styled-primary">
													</br>
												   <?php if(isset($_GET['cat_id']) and $row['image']!="") {?>
													<img src="images/hotgk/<?php echo $row['image'];?>" style="width: 75px; height: 75px;" class="img-rounded" alt="">
													<?php } else{?>
													<img src="assets/images/placeholder.jpg" style="width: 75px; height: 75px;" class="img-rounded" alt=""/>                                   
													<?php }?>
													<span class="help-block">Accepted formats: gif, png, jpg. Max file size 2Mb</span>
												</div>
											</div>
										</div>
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