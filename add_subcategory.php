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
<script type="text/javascript" src="assets/js/plugins/forms/selects/select2.min.js"></script>
<script type="text/javascript" src="assets/js/pages/form_select2.js"></script>
	<!-- /theme JS files -->
<body>

	<!-- Main navbar -->
<?php 
include("includes/header.php");

$cat_qry="SELECT * FROM tbl_category ORDER BY category_name";
$cat_result=mysqli_query($mysqli,$cat_qry);

require_once("thumbnail_images.class.php");

if($_SESSION['id']!=2)
{
if(isset($_POST['submit']) and isset($_GET['add']))
{
	
    $menu_image=rand(0,99999)."_".$_FILES['menu_image']['name'];

    $tpath1='images/subcategory/'.$menu_image;        

    $pic1=compress_image($_FILES["menu_image"]["tmp_name"], $tpath1, 80);

       $data = array( 
		 'cid'  =>  $_POST['cid'],
         'menu_name'  =>  $_POST['menu_name'],
         'menu_image'  =>  $menu_image
          );    

    $qry = Insert('tbl_subcategory_list',$data);  

    $_SESSION['msg']="10";
    header( "Location:manage_subcategory.php");
    exit; 
}
  
if(isset($_GET['cat_id']))
{

	$qry="SELECT * FROM tbl_subcategory_list where mid='".$_GET['cat_id']."'";

	$result=mysqli_query($mysqli,$qry);

	$row=mysqli_fetch_assoc($result);

}

if(isset($_POST['submit']) and isset($_POST['cat_id']))
{

	if($_FILES['menu_image']['name']!="")
	{    

        $img_res=mysqli_query($mysqli,'SELECT * FROM tbl_subcategory_list WHERE mid='.$_GET['cat_id'].'');

        $img_res_row=mysqli_fetch_assoc($img_res);

          if($img_res_row['menu_image']!="")
			{
                unlink('images/subcategory/'.$img_res_row['menu_image']);
			}

            $menu_image=rand(0,99999)."_".$_FILES['menu_image']['name'];

            $tpath1='images/subcategory/'.$menu_image;        

            $pic1=compress_image($_FILES["menu_image"]["tmp_name"], $tpath1, 80);

                    $data = array(
						'cid'  =>  $_POST['cid'],
                       'menu_name'  =>  $_POST['menu_name'],
                      'menu_image'  =>  $menu_image

                    );

          $category_edit=Update('tbl_subcategory_list', $data, "WHERE mid = '".$_POST['cat_id']."'");
    }
    else
    {

	   $data = array(
			 'cid'  =>  $_POST['cid'],
			 'menu_name'  =>  $_POST['menu_name']

		);  

		   $category_edit=Update('tbl_subcategory_list', $data, "WHERE mid = '".$_POST['cat_id']."'");
    }

    $_SESSION['msg']="11"; 
    header( "Location:add_subcategory.php?cat_id=".$_POST['cat_id']);
    exit;
  }
}
if(isset($_GET['cat_id']))
{

      $qry="SELECT * FROM tbl_subcategory_list where mid='".$_GET['cat_id']."'";

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
							<h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Add</span> - Subcategory</h4>
						</div>

						<div class="heading-elements">
							<div class="heading-btn-group">
								<a href="manage_subcategory.php" class="btn btn-link btn-float has-text"><i class="icon-backward text-primary"></i><span>Back</span></a>
								
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
								<legend class="text-bold">Subcategory Detail</legend>
								
								<div class="form-group">
									<label class="control-label col-lg-2">Category List</label>
									<div class="col-lg-10">
									    <select name="cid" id="m_select1" class="select-results-color" required>
										<option value="">--Select Category--</option>
										<?php
											while($cat_row=mysqli_fetch_array($cat_result))
											{
										?>                       
										<option value="<?php echo $cat_row['cid'];?>" <?php if(isset($_GET['cat_id']) && $cat_row['cid']==$row['cid']) {?>selected<?php }?>><?php echo $cat_row['category_name'];?></option>                           
										<?php
										  }
										?>
									    </select>
									</div>
							    </div>

								<div class="form-group">
									<label class="control-label col-lg-2">Subcategory Name :-</label>
									<div class="col-lg-10">
										<input type="text" class="form-control" name="menu_name" id="menu_name" value="<?php if(isset($_GET['cat_id'])){echo $row['menu_name'];}?>" placeholder="Enter Category Name">
									</div>
								</div>
		              
								<div class="form-group">
									<label class="control-label col-lg-2">Subcategory Image :-</label>
									<div class="col-lg-10">							
										<div class="media no-margin-top">
											<div class="media-left">
												<div class="media-body">
													<input type="file" id="menu_image" name="menu_image" class="file-styled-primary">
													</br>
												   <?php if(isset($_GET['cat_id']) and $row['menu_image']!="") {?>
													<img src="images/subcategory/<?php echo $row['menu_image'];?>" style="width: 75px; height: 75px;" class="img-rounded" alt="">
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
