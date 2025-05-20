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
	
   /* $category_image=rand(0,99999)."_".$_FILES['category_image']['name'];
	
    $tpath1='images/categoryimage/'.$category_image;        

    $pic1=compress_image($_FILES["category_image"]["tmp_name"], $tpath1, 80);
	*/
	
	
    $category_image = '';
	$data = array( 
         'p_name'  =>  $_POST['p_name'],
         'p_price'  =>  $_POST['p_price'],
		 'p_coins'  =>  $_POST['p_coins'],
		 'p_bonus'  =>  $_POST['p_bonus'],
		 'p_bonus_percentage'  =>  $_POST['p_bonus_percentage'],
		 'p_bonus_coins'  =>  $_POST['p_bonus_coins'],
         'p_description'  =>  "",
		 'p_price_uk'  =>  $_POST['p_price_uk'],
		 'p_price_cd'  =>  $_POST['p_price_cd'],
		 'p_price_au'  =>  $_POST['p_price_au'],
		 'p_price_nz'  =>  $_POST['p_price_nz'],
		 'p_price_inr'  =>  $_POST['p_price_inr'],
          );    

    $qry = Insert('tbl_plans',$data);  

    $_SESSION['msg']="10";
    header( "location:manage_plans.php");
    //exit; 
}
  


if(isset($_POST['submit']) and isset($_POST['p_id']))
{

	
	   $data = array(
			 'p_name'  =>  $_POST['p_name'],
   			 'p_price'  =>  $_POST['p_price'],
			 'p_coins'  =>  $_POST['p_coins'],
			 'p_bonus'  =>  $_POST['p_bonus'],
			 'p_bonus_percentage'  =>  $_POST['p_bonus_percentage'],
			 'p_bonus_coins'  =>  $_POST['p_bonus_coins'],
			 'p_description'  =>  "",
			 'p_price_uk'  =>  $_POST['p_price_uk'],
			 'p_price_cd'  =>  $_POST['p_price_cd'],
			 'p_price_au'  =>  $_POST['p_price_au'],
			 'p_price_nz'  =>  $_POST['p_price_nz'],
			 'p_price_inr'  =>  $_POST['p_price_inr'],

		);  

		$category_edit=Update('tbl_plans', $data, "WHERE p_id = '".$_POST['p_id']."'");
    

    $_SESSION['msg']="11"; 
    header( "location:add_plans.php?p_id=".$_POST['p_id']);
    //exit;
  }
}
if(isset($_GET['cat_id']))
{

      $qry="SELECT * FROM tbl_plans where p_id='".$_GET['p_id']."'";

      $result=mysqli_query($mysqli,$qry);

      $row=mysqli_fetch_assoc($result);
}
if(isset($_GET['p_id']))
{

$qry="SELECT * FROM tbl_plans where p_id='".$_GET['p_id']."'";

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
							<h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Add</span> - Plan</h4>
						</div>

						<div class="heading-elements">
							<div class="heading-btn-group">
								<a href="manage_plans.php" class="btn btn-link btn-float has-text"><i class="icon-backward text-primary"></i><span>Back</span></a>
								
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
							<input  type="hidden" name="p_id" value="<?php echo $_GET['p_id'];?>" />
							<fieldset class="content-group">
								<legend class="text-bold">Plan Detail</legend>

								<div class="form-group">
									<label class="control-label col-lg-2">Plan Name :-</label>
									<div class="col-lg-10">
										<input type="text" class="form-control" name="p_name" id="p_name" value="<?php if(isset($_GET['p_id'])){echo $row['p_name'];}?>" placeholder="Enter  Name">
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-lg-2">Plan Price :-</label>
									<div class="col-lg-2">
										<select name="m_countries_1" id="cars" class="form-control">
											<option value="US Dollar">US $</option>
										</select>
									</div>
									<div class="col-lg-8">
										<input type="number" step="0.01" class="form-control" name="p_price" id="p_price" value="<?php if(isset($_GET['p_id'])){echo $row['p_price'];}?>" placeholder="Enter Price">
									</div>
									<label class="control-label col-lg-2"></label>
									<div class="col-lg-2">
										<select name="p_countries_1" id="cars" class="form-control" >
											<option value="US Dollar">UK £</option>
										</select>
									</div>
									<div class="col-lg-8">
										<input type="number" step="0.01" class="form-control" name="p_price_uk" id="p_price_uk" value="<?php if(isset($_GET['p_id'])){echo $row['p_price_uk'];}?>" placeholder="Enter Price">
									</div>
									<label class="control-label col-lg-2"></label>
									<div class="col-lg-2">
										<select name="p_countries_1" id="cars" class="form-control" >
											<option value="US Dollar">Canadian $</option>
										</select>
									</div>
									<div class="col-lg-8">
										<input type="number" step="0.01" class="form-control" name="p_price_cd" id="p_price_cd" value="<?php if(isset($_GET['p_id'])){echo $row['p_price_cd'];}?>" placeholder="Enter Price">
									</div>
									<label class="control-label col-lg-2"></label>
									<div class="col-lg-2">
										<select name="p_countries_1" id="cars" class="form-control" >
											<option value="US Dollar">Australian $</option>
										</select>
									</div>
									<div class="col-lg-8">
										<input type="number" step="0.01" class="form-control" name="p_price_au" id="p_price_au" value="<?php if(isset($_GET['p_id'])){echo $row['p_price_au'];}?>" placeholder="Enter Price">
									</div>
									<label class="control-label col-lg-2"></label>
									<div class="col-lg-2">
										<select name="p_countries_1" id="cars" class="form-control" >
											<option value="US Dollar">New zealand $</option>
										</select>
									</div>
									<div class="col-lg-8">
										<input type="number" step="0.01" class="form-control" name="p_price_nz" id="p_price_nz" value="<?php if(isset($_GET['p_id'])){echo $row['p_price_nz'];}?>" placeholder="Enter Price">
									</div>
									<label class="control-label col-lg-2"></label>
									<div class="col-lg-2">
										<select name="p_countries_1" id="cars" class="form-control" >
											<option value="US Dollar">Indian ₹</option>
										</select>
									</div>
									<div class="col-lg-8">
										<input type="number" step="0.01" class="form-control" name="p_price_inr" id="p_price_inr" value="<?php if(isset($_GET['p_id'])){echo $row['p_price_inr'];}?>" placeholder="Enter Price">
									</div>
									
								</div>
								<div class="form-group">
									<label class="control-label col-lg-2">Plan Coins :-</label>
									<div class="col-lg-10">
										<input type="number" class="form-control p_coins" name="p_coins" id="p_coins" value="<?php if(isset($_GET['p_id'])){echo $row['p_coins'];}?>" placeholder="Enter Coins">
									</div>
								</div>
								
								<div class="form-group">
									<label class="control-label col-lg-2">Plan Bonus :-</label>
									<div class="col-lg-10">
										<input type="checkbox" value="1" name="p_bonus"  class=" p_bonus" <?php if(isset($_GET['p_id']) && $row['p_bonus'] == 1){echo 'checked';}?>>
									</div>
								</div>
								<div class="form-group show_when_check <?php if(isset($_GET['p_id']) && $row['p_bonus'] == 1 ){ }else{ echo 'd-none';  } ?>">
									<label class="control-label col-lg-2">Plan Percentage :-</label>
									<div class="col-lg-10">
										<input type="number" min="0" max="100" class="form-control p_bonus_percentage" name="p_bonus_percentage" id="p_coins" value="<?php if(isset($_GET['p_id'])){echo $row['p_bonus_percentage'];}?>" placeholder="Enter Bonus Percentage">
									</div> 
								</div>
								<div class="form-group show_when_check <?php if(isset($_GET['p_id']) && $row['p_bonus'] == 1 ){ }else{ echo 'd-none';  } ?>">
									<label class="control-label col-lg-2">Plan Bonus Coins :-</label>
									<div class="col-lg-10">
										<input type="text" class="form-control p_bonus_coins"  name="p_bonus_coins" id="" value="<?php if(isset($_GET['p_id'])){echo $row['p_bonus_coins'];}?>" placeholder="Show Bonus coins">
									</div>
								</div>
		              
								<!-- <div class="form-group">
									<label class="control-label col-lg-2">Category Image :-</label>
									<div class="col-lg-10">							
										<div class="media no-margin-top">
											<div class="media-left">
												<div class="media-body">
													<input type="file" id="category_image" name="category_image" class="file-styled-primary">
													</br>
												   <?php if(isset($_GET['cat_id']) and $row['category_image']!="") {?>
													<img src="images/categoryimage/<?php echo $row['category_image'];?>" style="width: 75px; height: 75px;" class="img-rounded" alt="">
													<?php } else{?>
													<img src="assets/images/placeholder.jpg" style="width: 75px; height: 75px;" class="img-rounded" alt=""/>                                   
													<?php }?>
													<span class="help-block">Accepted formats: gif, png, jpg. Max file size 2Mb</span>
												</div>
											</div>
										</div>
									</div> 
								</div> -->
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

<script>
$(document).ready(function(){
	function calculate_pr(){
		var pr = $('.p_bonus_percentage').val();
		var pPos = parseInt($('.p_coins').val()); 
        var pEarned = parseInt($('.p_bonus_percentage').val());
        var perc="";
        if(isNaN(pPos) || isNaN(pEarned)){
				perc=" ";
           }else{
				perc = pEarned / 100;
				var amount = pPos * perc;
				
           }
		//$('.p_bonus_coins').val(amount);
		
	}
	$(".p_bonus_percentage").change(function(){
		calculate_pr();
	});
	$(".p_coins").change(function(){
		calculate_pr();
	});
	$(".p_bonus").click(function(){
		if($(".p_bonus").prop('checked') == true){
			$(".show_when_check").removeClass('d-none');
			calculate_pr();
		}else{
			$(".show_when_check").addClass('d-none');
		}
		
	});
});
</script>
