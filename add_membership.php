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
	
   
    $category_image = '';
	$data = array( 
         'm_name'  =>  $_POST['m_name'],
         'm_duration'  =>  $_POST['m_duration'],
		 'm_price'  =>  $_POST['m_price'],
		 'm_price_uk'  =>  $_POST['m_price_uk'],
		 'm_price_cd'  =>  $_POST['m_price_cd'],
		 'm_price_au'  =>  $_POST['m_price_au'],
		 'm_price_nz'  =>  $_POST['m_price_nz'],
		 'm_price_inr'  =>  $_POST['m_price_inr'],
	);    

    $qry = Insert('tbl_membership',$data);  

    $_SESSION['msg']="10";
    header( "location:manage_membership.php");
    //exit; 
}
  
if(isset($_GET['m_id']))
{

$qry="SELECT * FROM tbl_membership where m_id='".$_GET['m_id']."'";

$result=mysqli_query($mysqli,$qry);

$row=mysqli_fetch_assoc($result);

}

if(isset($_POST['submit']) and isset($_POST['m_id']))
{

	
	   $data = array(
			 'm_name'  =>  $_POST['m_name'],
			 'm_duration'  =>  $_POST['m_duration'],
			 'm_price'  =>  $_POST['m_price'],
			 'm_price_uk'  =>  $_POST['m_price_uk'],
			 'm_price_cd'  =>  $_POST['m_price_cd'],
			 'm_price_au'  =>  $_POST['m_price_au'],
			 'm_price_nz'  =>  $_POST['m_price_nz'],
			 'm_price_inr'  =>  $_POST['m_price_inr'],
		);  

		$category_edit=Update('tbl_membership', $data, "WHERE m_id = '".$_POST['m_id']."'");
    

    $_SESSION['msg']="11"; 
    header( "location:add_plans.php?m_id=".$_POST['m_id']);
    //exit;
  }
}
if(isset($_GET['m_id']))
{

      $qry="SELECT * FROM tbl_membership where m_id='".$_GET['m_id']."'";

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
							<h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Add</span> - Membership</h4>
						</div>

						<div class="heading-elements">
							<div class="heading-btn-group">
								<a href="manage_membership.php" class="btn btn-link btn-float has-text"><i class="icon-backward text-primary"></i><span>Back</span></a>
								
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
							<input  type="hidden" name="m_id" value="<?php echo $_GET['m_id'];?>" />
							<fieldset class="content-group">
								<legend class="text-bold">Membership Detail</legend>

								<div class="form-group">
									<label class="control-label col-lg-2">Membership Name :-</label>
									<div class="col-lg-10">
										<input type="text" class="form-control" name="m_name" id="m_name" value="<?php if(isset($_GET['m_id'])){echo $row['m_name'];}?>" placeholder="Enter  Name">
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-lg-2">Membership Duration :-</label>
									<div class="col-lg-10">
										<select class="form-control" name="m_duration">
											<option  <?php if(isset($_GET['m_id']) && $row['m_duration'] == '7' ){ echo "selected"; } ?> value="7">7 Days</option>
											<option <?php if(isset($_GET['m_id']) && $row['m_duration'] == '365' ){ echo "selected"; } ?> value="365">1 Year</option>
										</select>
									</div>
								</div>
								
								<div class="form-group">
									<label class="control-label col-lg-2">Membership Price :-</label>
									<div class="col-lg-2">
										<select name="m_countries_1" id="cars" class="form-control">
											<option value="US Dollar">US $</option>
										</select>
									</div>
									<div class="col-lg-8">
										<input type="number" step="0.01" class="form-control" name="m_price" id="m_price" value="<?php if(isset($_GET['m_id'])){echo $row['m_price'];}?>" placeholder="Enter Price">
									</div>
									<label class="control-label col-lg-2"></label>
									<div class="col-lg-2">
										<select name="m_countries_1" id="cars" class="form-control" >
											<option value="US Dollar">UK £</option>
										</select>
									</div>
									<div class="col-lg-8">
										<input type="number" step="0.05" class="form-control" name="m_price_uk" id="m_price_uk" value="<?php if(isset($_GET['m_id'])){echo $row['m_price_uk'];}?>" placeholder="Enter Price">
									</div>
									<label class="control-label col-lg-2"></label>
									<div class="col-lg-2">
										<select name="m_countries_1" id="cars" class="form-control" >
											<option value="US Dollar">Canadian $</option>
										</select>
									</div>
									<div class="col-lg-8">
										<input type="number" step="0.01" class="form-control" name="m_price_cd" id="m_price_cd" value="<?php if(isset($_GET['m_id'])){echo $row['m_price_cd'];}?>" placeholder="Enter Price">
									</div>
									<label class="control-label col-lg-2"></label>
									<div class="col-lg-2">
										<select name="m_countries_1" id="cars" class="form-control" >
											<option value="US Dollar">Australian $</option>
										</select>
									</div>
									<div class="col-lg-8">
										<input type="number" step="0.01" class="form-control" name="m_price_au" id="m_price_au" value="<?php if(isset($_GET['m_id'])){echo $row['m_price_au'];}?>" placeholder="Enter Price">
									</div>
									<label class="control-label col-lg-2"></label>
									<div class="col-lg-2">
										<select name="m_countries_1" id="cars" class="form-control" >
											<option value="US Dollar">New zealand $</option>
										</select>
									</div>
									<div class="col-lg-8">
										<input type="number" step="0.01" class="form-control" name="m_price_nz" id="m_price_nz" value="<?php if(isset($_GET['m_id'])){echo $row['m_price_nz'];}?>" placeholder="Enter Price">
									</div>
									<label class="control-label col-lg-2"></label>
									<div class="col-lg-2">
										<select name="m_countries_1" id="cars" class="form-control" >
											<option value="US Dollar">Indian ₹</option>
										</select>
									</div>
									<div class="col-lg-8">
										<input type="number" step="0.01" class="form-control" name="m_price_inr" id="m_price_inr" value="<?php if(isset($_GET['m_id'])){echo $row['m_price_inr'];}?>" placeholder="Enter Price">
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
				perc = (( pEarned / pPos)) * 100;
           }
		$('.p_bonus_coins').val(perc);
		
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
