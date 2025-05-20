<!DOCTYPE html>
<html lang="en">
<?php
require("language/language.php");
require("includes/function.php");
include("includes/head.php");
?>
	<script type="text/javascript" src="assets/js/plugins/forms/styling/uniform.min.js"></script>
	<style>
        .video-container {
            display: flex;
            flex-wrap: wrap;
        }
        .video-preview {
            margin: 10px;
        }
		.h-auto{ height: auto; }
		.file-input-label {
			display: inline-block;
			padding: 10px 20px;
			background-color: #4CAF50;
			color: white;
			border: none;
			border-radius: 4px;
			cursor: pointer;
		}
		.video-container .row{ width: 100%; padding-top: 20px;  }
		.d-none{ display: none; }	
    </style>
	<script type="text/javascript" src="assets/js/core/app.js"></script>
	<script type="text/javascript" src="assets/js/pages/form_inputs.js"></script>
<body>
<?php 
include("includes/header.php");

require_once("thumbnail_images.class.php");
$cat_qry="SELECT * FROM tbl_category ORDER BY category_name";
$cat_result=mysqli_query($mysqli,$cat_qry);

if($_SESSION['id']!=2)
{
if(isset($_POST['submit']) and isset($_GET['add']))
{
	if($_FILES["w_image"]["name"] != ''){
		$w_image=rand(0,99999)."_".$_FILES['w_image']['name'];
		$tpath1='images/w_image/'.$w_image;        
		$pic1=compress_image($_FILES["w_image"]["tmp_name"], $tpath1, 80);
	}else{
		 $w_image= "";
	}
	
	$w_video = '';
	
	$data = array( 
         'cat_id'  =>  $_POST['cat_id'],
         'w_name'  =>  addslashes($_POST['w_name']),
         'w_image'  =>  $w_image,
		 'w_sub_title'  =>  addslashes($_POST['w_sub_title']),
		 'w_description'  =>  addslashes($_POST['w_description']),
		 'recommendation'  =>  $_POST['recommendation'],
		 'trending'  =>  $_POST['trending'],
		 'is_slider'  =>  $_POST['is_slider'],
		 'w_trailer'  =>  $_POST['w_trailer'],
    	 'spring_into_saturday'  =>  $_POST['spring_into_saturday'],
		 'top_picks'  =>  $_POST['top_picks'],
		 'w_status'  =>  1,
		 'w_especially_date'  =>   date("Y-m-d", strtotime($_POST['w_especially_date'])),
		 'w_type'  =>  $_POST['w_type'],
		 'view_counts' => 1000000,
		 'is_new'  =>  $_POST['is_new'],
    );    

    $qry = Insert('tbl_web_series',$data);  
	
	$w_id = mysqli_insert_id($mysqli);
	$main_m3u8 = $_POST['main_m3u8'];
	if($main_m3u8 != '') {
		$m3u8_content = @file_get_contents($main_m3u8);
		if($m3u8_content !== false) {
			preg_match_all('/^https?:\/\/.*\.m3u8$/m', $m3u8_content, $matches);
			$episode_links = $matches[0];
			foreach ($episode_links as $index => $episode_url) {
				$is_paid = isset($_POST["lock_episode_$index"]) ? 1 : 0;
				$data = array(
					'v_title'  =>  "Episode ".($index+1),
					'v_video'  =>  $episode_url,
					'is_paid'  =>  $is_paid,
					'v_order'  =>  $index+1,
					'w_id' => $w_id,
				);
				Insert('tbl_video',$data);
			}
		}
	}
	
	$current_url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http') . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
	
    $_SESSION['msg']="10";
	//header( "Location: manage_web_series.php");
	?>
	<script> window.location.href = "<?php echo $current_url; ?>/manage_web_series.php"; </script>
    <?php
	//exit; 
}
  
if(isset($_GET['cat_id']))
{

$qry="SELECT * FROM tbl_web_series where w_id='".$_GET['w_id']."'";

$result=mysqli_query($mysqli,$qry);

$row=mysqli_fetch_assoc($result);

}

if(isset($_POST['submit']) and !empty($_POST['w_id']))
{
	
	if($_FILES['w_image']['name']!="")
	{
	
	
       $img_res=mysqli_query($mysqli,'SELECT * FROM tbl_web_series WHERE w_id='.$_GET['w_id'].'');
		
        $img_res_row=mysqli_fetch_assoc($img_res);
		
          if($img_res_row['w_image']!="")
			{
                unlink('images/w_image/'.$img_res_row['w_image']);
			}

            $w_image=rand(0,99999)."_".$_FILES['w_image']['name'];

            $tpath1='images/w_image/'.$w_image;        

            $pic1=compress_image($_FILES["w_image"]["tmp_name"], $tpath1, 80);
				 $data = array(
						 'cat_id'  =>  $_POST['cat_id'],
						 'w_name'  =>  addslashes($_POST['w_name']),
						 'w_image'  =>  $w_image,
						 'w_trailer'  =>  $_POST['w_trailer'],
						 'w_sub_title'  =>  addslashes($_POST['w_sub_title']),
						 'w_description'  =>  addslashes($_POST['w_description']),
						 'recommendation'  =>  $_POST['recommendation'],
						 'trending'  =>  $_POST['trending'],
						 'spring_into_saturday'  =>  $_POST['spring_into_saturday'],
						 'top_picks'  =>  $_POST['top_picks'],
						 'w_type'  =>  $_POST['w_type'],
						 'is_slider'  =>  $_POST['is_slider'],
						 'w_status'  =>  1,
						 'w_especially_date'  =>   date("Y-m-d", strtotime($_POST['w_especially_date'])),
						 'is_new'  =>  $_POST['is_new'],

                    );

          $category_edit=Update('tbl_web_series', $data, "WHERE w_id = '".$_POST['w_id']."'");
    }
    else
    {
		

				$data = array(
						 'cat_id'  =>  $_POST['cat_id'],
						 'w_name'  =>  addslashes($_POST['w_name']),
						 'w_sub_title'  =>  addslashes($_POST['w_sub_title']),
						 'w_trailer'  =>  $_POST['w_trailer'],
						 'w_description'  =>  addslashes($_POST['w_description']),
						 'recommendation'  =>  $_POST['recommendation'],
						 'trending'  =>  $_POST['trending'],
						 'is_slider'  =>  $_POST['is_slider'],
						 'is_new'  =>  $_POST['is_new'],
						 'top_picks'  =>  $_POST['top_picks'],
						 'w_type'  =>  $_POST['w_type'],
						 'w_especially_date'  =>   date("Y-m-d", strtotime($_POST['w_especially_date'])),
						 'w_status'  =>  1,
						 'spring_into_saturday'  =>  $_POST['spring_into_saturday'],

                    ); 

		   $category_edit=Update('tbl_web_series', $data, "WHERE w_id = '".$_POST['w_id']."'");
		   
		   
    }
	$i = 0;
	foreach ($_POST["v_link"] as $tmp_name) {
		if($_POST['v_link'][$i] != ''){
				
				$data = array(
					'v_title'  =>  "",
					'v_video'  =>  $_POST['v_link'][$i],
					'is_paid'  =>  $_POST['v_is_paid'][$i],
					'v_order'  =>  "",

					'w_id' => $_POST['w_id'],
				);
			// }
			if($_POST['v_id'][$i] == 0){
				Insert('tbl_video',$data); 
			}else{
				Update('tbl_video', $data, "WHERE v_id = '".$_POST['v_id'][$i]."'");
			}
		}
		$i++;
	}
	$_SESSION['msg']="11";
	?>
	<script> window.location.href = "add_web_series.php?w_id="+<?php echo $_POST['w_id']; ?> </script>
	<?php
	ob_start();
	
	header( "location:add_web_series.php?w_id=".$_POST['w_id']);
	ob_end_clean();
	
	//exit;
  }
}
if(isset($_GET['w_id']))
{

      $qry="SELECT * FROM tbl_web_series where w_id='".$_GET['w_id']."'";

      $result=mysqli_query($mysqli,$qry);

      $row=mysqli_fetch_assoc($result);
}

$quotes_qry="SELECT * FROM tbl_web_series INNER JOIN tbl_category ON tbl_category.cid = tbl_web_series.cat_id where tbl_web_series.is_slider = '1' && w_id != '".$_GET['w_id']."'  ORDER BY tbl_web_series.w_id ASC"; 
$slider_results=mysqli_query($mysqli,$quotes_qry);

$quotes_qry="SELECT * FROM tbl_web_series INNER JOIN tbl_category ON tbl_category.cid = tbl_web_series.cat_id where tbl_web_series.spring_into_saturday = '1'  && w_id != '".$_GET['w_id']."' ORDER BY tbl_web_series.w_id ASC"; 
$spring_results=mysqli_query($mysqli,$quotes_qry);

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
							<h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Add</span> - Web Series</h4>
						</div>

						<div class="heading-elements">
							<div class="heading-btn-group">
								<a href="manage_web_series.php" class="btn btn-link btn-float has-text"><i class="icon-backward text-primary"></i><span>Back</span></a>
								
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
						<form class="form-horizontal" action="" name="addeditcategory" method="post" id="add_web_series_form" enctype="multipart/form-data" data-toggle="validator">
							<input  type="hidden" name="spring_results" class="spring_results" value="<?php echo mysqli_num_rows($spring_results);?>" />
							<input  type="hidden" name="slider_results" class="slider_results" value="<?php echo mysqli_num_rows($slider_results);?>" />
							<input  type="hidden" name="w_id" value="<?php echo $_GET['w_id'];?>" />
							<fieldset class="content-group">
								<div class="form-group">
									<label class="control-label col-lg-2">Type</label>
									<div class="col-lg-10">
									    <select name="w_type" id="w_type" class="select-results-color form-control" required>
											<option value="">--Select Type--</option>
											<option value="Movies" <?php if(isset($_GET['w_id']) && 'Movies' ==$row['w_type']) {?>selected<?php }?>>Movies</option>                           
											<option value="Shows" <?php if(isset($_GET['w_id']) && 'Shows' ==$row['w_type']) {?>selected<?php }?>>Shows</option>                           
										</select>
									</div>
							    </div>
								<div class="form-group">
									<label class="control-label col-lg-2">Category List</label>
									<div class="col-lg-10">
									    <select name="cat_id" id="m_select1" class="select-results-color form-control" required>
										<option value="">--Select Category--</option>
										<?php
											while($cat_row=mysqli_fetch_array($cat_result))
											{
										?>                       
										<option value="<?php echo $cat_row['cid'];?>" <?php if(isset($_GET['w_id']) && $cat_row['cid']==$row['cat_id']) {?>selected<?php }?>><?php echo $cat_row['category_name'];?></option>                           
										<?php
										  }
										?>
									    </select>
									</div>
							    </div>
								
								<div class="form-group">
									<label class="control-label col-lg-2"> Web series name :-</label>
									<div class="col-lg-10">
										<input type="text" class="form-control" name="w_name" id="w_name" value="<?php if(isset($_GET['w_id'])){echo $row['w_name'];}?>" placeholder="Enter web series name">
									</div>
								</div>
		              
								 <div class="form-group">
									<label class="control-label col-lg-2" for="fileInput">Cover image :-</label>
									<div class="col-lg-10">							
										<div class="media no-margin-top">
											<div class="media-left">
												<div class="media-body">
													<input type="file" id="fileInput" name="w_image" class="file-styled-primary" accept="image/png, image/jpeg"  >
													</br>
												   <?php if(isset($_GET['w_id']) and $row['w_image']!="") {
													  
													   ?>
													<img src="images/w_image/<?php echo $row['w_image'];?>" style="width: 150px; " class="img-rounded" alt="" id="imagePreview"> <a class="remove_img btn-danger d-none" ><i class="glyphicon glyphicon-trash"></i></a>
													<?php } else{?>
													<img src="assets/images/placeholder.jpg" style="width: 150px;" class="img-rounded" alt="" id="imagePreview"/>     <a class="remove_img btn btn-danger d-none"><i class="glyphicon glyphicon-trash"></i></a>                             
													<?php }?>
													<span class="help-block">Accepted formats Jpg or png with dimensions 326x566</span> 
												</div>
											</div>
										</div>
									</div> 
								</div>
								
								<div class="form-group">
									<label class="control-label col-lg-2"> Trailer :-</label>
									<div class="col-lg-10">
										<input type="text" class="form-control" name="w_trailer" id="w_trailer" value="<?php if(isset($_GET['w_id'])){echo $row['w_trailer'];}?>" placeholder="Enter Trailer Link">
									</div>
								</div>
								
								<div class="form-group">
									<label class="control-label col-lg-2">Web series short description :-</label>
									<div class="col-lg-10">
										<input type="text" class="form-control" name="w_sub_title" id="w_sub_title" value="<?php if(isset($_GET['w_id'])){echo $row['w_sub_title'];}?>" placeholder="One line description">
									</div>
								</div>
								<style>
   
    textarea {
       
        resize: vertical;
    }
</style>
								<div class="form-group">
									<label class="control-label col-lg-2"> Description :-</label>
									<div class="col-lg-10">
										<textarea class="form-control" name="w_description" id="w_description" placeholder="Description"><?php if(isset($_GET['w_id'])){echo $row['w_description'];}?></textarea>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-2">
									</div>
									<div class="col-lg-4">
										<input type="checkbox"  name="recommendation" id="recommendation" value="1" <?php if(isset($_GET['w_id']) && 1 ==$row['recommendation']) {?>checked<?php }?> > More Recommendation
									</div>
									<div class="col-lg-6">
										<input type="checkbox"  name="top_picks" id="top_picks" value="1" <?php if(isset($_GET['w_id']) && 1 ==$row['top_picks']) {?>checked<?php }?> > Top Picks 

									</div>
								</div>
								<div class="row">
									<div class="col-lg-2">
									    
									</div>
									<div class="col-lg-4">
									    										<input type="checkbox"  name="is_new" id="is_new" value="1" <?php if(isset($_GET['w_id']) && 1 ==$row['is_new']) {?>checked<?php }?> > New Release

									    
									</div>
									<div class="col-lg-6">
									    										<input type="checkbox"  name="trending" id="trending" value="1" <?php if(isset($_GET['w_id']) && 1 ==$row['trending']) {?>checked<?php }?> > Most Trending

									    
									</div>
								</div>
								<div class="row">
									<div class="col-lg-2">
									</div>
									<div class="col-lg-4">
										<input type="checkbox"  name="is_new_content" id="is_new_content" value="1" <?php if(isset($_GET['w_id']) && 1 ==$row['is_new_content']) {?>checked<?php }?> > New
									</div>
									<div class="col-lg-6">
									</div>
								</div>
								<div class="row">
									<label class="control-label col-lg-2"></label>
									<div class="col-lg-4">
										<input type="checkbox"  name="spring_into_saturday" id="spring_into_saturday" value="1" <?php if(isset($_GET['w_id']) && 1 ==$row['spring_into_saturday']) {?>checked<?php }?> > Spring into Saturday
									</div>
									<div class="col-lg-6">
										<input type="checkbox"  name="is_slider" id="is_slider" value="1" <?php if(isset($_GET['w_id']) && 1 ==$row['is_slider']) {?>checked<?php }?> > Display on Banner

									</div>
								</div>
								
								<div class="form-group w_especially_date_section <?php if($row['spring_into_saturday'] == 1){ echo ''; }else{ echo "d-none"; } ?>">
									<label class="control-label col-lg-2">Select Date :- </label>
									<div class="col-lg-10">
										<input type="text" class="form-control date_picker" name="w_especially_date" id="w_especially_date" readonly value="<?php if(isset($_GET['w_id']) && $row['w_especially_date'] != '1970-01-01' && $row['w_especially_date'] != '0000-00-00'){ echo  date("d-m-Y", strtotime($row['w_especially_date'])) ;}?>" placeholder="Select date for spring into saturday">
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-lg-2">Main m3u8 Link :-</label>
									<div class="col-lg-10">
										<input type="text" class="form-control" name="main_m3u8" id="main_m3u8" value="<?php if(isset($_GET['w_id'])){echo $row['main_m3u8'];}?>" placeholder="Enter main m3u8 link">
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-lg-2">Episodes</label>
									<div class="col-lg-10">
										<?php
										if(isset($_POST['main_m3u8']) && $_POST['main_m3u8'] != '') {
											$m3u8_content = @file_get_contents($_POST['main_m3u8']);
											if($m3u8_content !== false) {
												preg_match_all('/^https?:\/\/.*\.m3u8$/m', $m3u8_content, $matches);
												$episode_links = $matches[0];
												foreach ($episode_links as $index => $episode_url) {
													echo "<div><label>Episode ".($index+1).": $episode_url</label> ";
													echo "<input type='checkbox' name='lock_episode_$index'> Lock Episode</div>";
												}
											}
										}
										?>
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
<script>
    // Function to handle file input change event
   
</script>

<script>
$(document).ready(function(){

$(".remove_img").click(function(){
	$('#imagePreview').attr('src',"assets/images/placeholder.jpg");
	$("#fileInput").val('');
	document.getElementById("fileInput").value = null;
	$('.remove_img').addClass('d-none');
});


$("#add_web_series_form").submit(function(){
	
	$('#add_web_series_form').validator();

	var added = 0;
	var slider_results = 0;
	var spring_results = 0;
	var invalid_url = true;
	$( ".video-container input[type=url]" ).each( function( i ) {
		if($(this).val() != ''){
			added ++;
		}
	});
	
	if($('.slider_results').val() > 8 && $("#is_slider").prop('checked') == true){
		slider_results = 1;
	}
	if($('.spring_results').val() > 2 && $("#spring_into_saturday").prop('checked') == true){
		spring_results = 1;
	}
	if(added == 0 && $('#main_m3u8').val() == ''){
		alert("Please add at least 1 clip or provide a main m3u8 link");
		$( ".video-container input[type=url]:first-child" ).attr( 'required', 'required' );
		$('#main_m3u8').attr('required', 'required');
		return false;
	}else{
		return true;
	}
});
});


function handleFileInputChange(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
				var image = new Image();
				image.src = e.target.result;;

				image.onload = function() {
					var img_w = this.width;
					var img_h = this.height;
					if(img_w ==  326 && img_h == 566){
						const imagePreview = document.getElementById('imagePreview');
						console.log(e.target);
						imagePreview.src = e.target.result;
					}else{
						alert("Invalid image dimensions must be 326x566");
						document.getElementById('fileInput').value= null;

					}
				};
				
            };
            reader.readAsDataURL(file);
        }
    }

    // Add event listener to file input
    const fileInput = document.getElementById('fileInput');
    fileInput.addEventListener('change', handleFileInputChange);
 function previewVideo(input) {
	if (input.files && input.files[0]) {
		var reader = new FileReader();
		reader.onload = function (e) {
			$(input).next('video').attr('src', e.target.result);
		}
		reader.readAsDataURL(input.files[0]);
	}
}

function addVideo() {
   var newVideoInput = '<div class="row" style="clear: both ; margin-top: 10px; "><div class="col-lg-6"><input type="url" class="form-control" name="v_link[]" id="v_link" value=""  placeholder="Enter Link (Clips)"><input type="hidden"  name="v_id[]" id="v_id" value="0"></div><div class="col-lg-3" style="    margin-top: 6px;">	<select name="v_is_paid[]" id="is_paid"><option value="0">No</option><option value="1">Yes</option></select> Is Paid?</div><div class="col-lg-3"><button type="button" class="btn" style="margin-left: 10px; " onclick="removeVideo(this)" data-id="0">Remove</button></div></div>';
	$('.video-container').append(newVideoInput);
}
$('body').on('click', '.make_all_paid', function() {
	$( ".video-container input[type=checkbox]" ).each( function( i ) {
		$(this).prop('checked', true);
	});
});
$('body').on('click', '#spring_into_saturday', function() {
	if($("#spring_into_saturday").prop('checked') == true){
		$('.w_especially_date_section').removeClass('d-none');
	}else{
		$('.w_especially_date_section').addClass('d-none');
	}

});
$('body').on('click', '.make_all_unpaid', function() {

	$( ".video-container input[type=checkbox]" ).each( function( i ) {
		//$( this ).attr( 'checked', false );
			$(this).prop('checked', false);
	});
});
$('body').on('click', '.make_clea_all', function() {
    $( ".video-container input[type=checkbox]" ).each( function( i ) {
		//$( this ).attr( 'checked', false );
			$(this).prop('checked', false);
	});
	$( ".video-container input[type=url]" ).each( function( i ) {
	    	$(this).val("");
	});
});

$('body').on('click', '.make_clea_clips', function() {
    $('.video-container').html('');
});

$(".add_clips").change(function(){
  var num_of_ele = $('.add_clips').val();
  if(num_of_ele != ''){
	  for(var q = 0; q < num_of_ele; q++){
		 addVideo(); 
	  }
  }
  $('.add_clips').val('');
});
function removeVideo(button) {
	var id = $(button).attr('data-id');
	if(id != 0){
		$.ajax({
                url: "delete_video.php?id="+id, // URL of the server-side script
                method: "GET",       // HTTP method (GET, POST, PUT, DELETE, etc.)
                success: function(data){
                    // On success, display the result
                },
                error: function(xhr, status, error){
                   
                }
            });
	}
	$(button).parent().parent().remove();
}
</script>
</html>