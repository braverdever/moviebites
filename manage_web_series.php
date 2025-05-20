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


$type = '';
if($_SESSION['id']!=2)
{
	if(isset($_GET['active']))
	{
	    $data = array(
		    'w_status'  =>  $_GET['active'],
        );
		$category_edit=Update('tbl_web_series', $data, "WHERE w_id = '".$_GET['w_did']."'");
		
		
	}
	if(isset($_GET['w_id']))
	{

		$cat_res=mysqli_query($mysqli,'SELECT * FROM tbl_web_series WHERE w_id=\''.$_GET['w_id'].'\'');

		$cat_res_row=mysqli_fetch_assoc($cat_res);

		if($cat_res_row['w_image']!="")
		{
		   @unlink('images/w_image/'.$cat_res_row['w_image']);
		}
		if($cat_res_row['w_video']!="")
		{
		   @unlink('images/w_video/'.$cat_res_row['w_video']);
		}
			Delete('tbl_web_series','w_id='.$_GET['w_id'].'');

			$_SESSION['msg']="12";
			echo "<script language=javascript>location.href='manage_web_series.php';</script>";
			exit;

	}
}
if($_GET['type'] && $_GET['type'] == 'recommendad'){
	$type = 'Recommendations';
	$quotes_qry="SELECT * FROM tbl_web_series INNER JOIN tbl_category ON tbl_category.cid = tbl_web_series.cat_id where tbl_web_series.recommendation = '1' ORDER BY tbl_web_series.w_id ASC"; 
	$result=mysqli_query($mysqli,$quotes_qry);
} else if($_GET['type'] && $_GET['type'] == 'most_trending'){
	$type = 'Most Trendings';
	$quotes_qry="SELECT * FROM tbl_web_series INNER JOIN tbl_category ON tbl_category.cid = tbl_web_series.cat_id where tbl_web_series.trending = '1' ORDER BY tbl_web_series.w_id ASC"; 
	$result=mysqli_query($mysqli,$quotes_qry);
}else if($_GET['type'] && $_GET['type'] == 'banner'){
	$type = 'Banners';
	echo "<style>.dataTables_filter{ display: none;}</style>";
	
	$quotes_qry="SELECT * FROM tbl_web_series INNER JOIN tbl_category ON tbl_category.cid = tbl_web_series.cat_id where tbl_web_series.is_slider = '1' ORDER BY tbl_web_series.w_id ASC"; 
	$result=mysqli_query($mysqli,$quotes_qry);
}else if($_GET['type'] && $_GET['type'] == 'spring_into_saturday'){
	$type = 'Spring into Saturday';
	$quotes_qry="SELECT * FROM tbl_web_series INNER JOIN tbl_category ON tbl_category.cid = tbl_web_series.cat_id where tbl_web_series.spring_into_saturday = '1' ORDER BY tbl_web_series.w_id ASC"; 
	$result=mysqli_query($mysqli,$quotes_qry);
}else if($_GET['type'] && $_GET['type'] == 'top_picks'){
	$type = 'Top Picks';
	$quotes_qry="SELECT * FROM tbl_web_series INNER JOIN tbl_category ON tbl_category.cid = tbl_web_series.cat_id where tbl_web_series.top_picks = '1' ORDER BY tbl_web_series.w_id ASC"; 
	$result=mysqli_query($mysqli,$quotes_qry);
}else if($_GET['type'] && $_GET['type'] == 'new'){
	$type = 'New Releases';
	$quotes_qry="SELECT * FROM tbl_web_series INNER JOIN tbl_category ON tbl_category.cid = tbl_web_series.cat_id where tbl_web_series.is_new = '1' ORDER BY tbl_web_series.w_id ASC"; 
	$result=mysqli_query($mysqli,$quotes_qry);
}else{
	$type = 'Web Series';
	$quotes_qry="SELECT * FROM tbl_web_series INNER JOIN tbl_category ON tbl_category.cid = tbl_web_series.cat_id ORDER BY tbl_web_series.w_id ASC"; 
	$result=mysqli_query($mysqli,$quotes_qry);
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
							<h4> <span class="text-semibold"><?php echo $type; ?></span></h4>
						</div>
						<div class="heading-elements">
							<div class="heading-btn-group">
								<?php if($type == 'Web Series'){ ?><a href="add_web_series.php?add=yes" class="btn btn-link btn-float has-text"><i class=" icon-plus3 text-primary"></i><span>Add <?php echo $type; ?></span></a> <?php } ?>
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
					<div class="panel panel-flat">
						<?php if(isset($_SESSION['msg'])){?>
						<div class="alert alert-success no-border">
								<button type="button" class="close" data-dismiss="alert"><span>&times;</span><span class="sr-only">Close</span></button>
								<span class="text-semibold"><?php echo $client_lang[$_SESSION['msg']] ; ?></span> 
						</div>
						<?php unset($_SESSION['msg']);}?>

						<table class="table datatable-basic table-bordered">
							<thead>
								<tr>
									<th class="text-center">No</th>
									<th class="text-center">Type</th>
									<th class="text-center">Category</th>
																		<th class="text-center">Name</th>

									<th class="text-center">Cover Image</th>
									<th class="text-center">Select / Deselect</th>
									
									
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
								<td class="text-center"><?php echo $i;?></td>
								<td class="text-center"><?php echo $row['w_type'];?></td>
								<td class="text-center"><?php echo $row['category_name'];?></td>
																<td class="text-center"><?php echo $row['w_name'];?></td>

							    <td class="text-center"><?php if($row['w_image'] != ''){ ?> <img src="images/w_image/<?php echo $row['w_image'];?>" width="90" height="90" /><?php } ?></td>
								<td class="text-center"><div class="form-check form-switch">
  <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" <?php if($row['w_status'] == '1'){ echo "checked"; ?> onclick="javascript:window.location.href = '?active=0&w_did=<?php echo $row['w_id']; ?>&type=<?php echo $_GET['type']; ?>';" <?php }else{ ?> onclick="javascript:window.location.href = '?active=1&w_did=<?php echo $row['w_id']; ?>&type=<?php echo $_GET['type']; ?>';" <?php } ?> >
  <label class="form-check-label" for="flexSwitchCheckDefault"></label>
</div></td>
								
								<td class="text-center">
									<ul class="icons-list">
										<li class="dropdown">
											<a href="#" class="dropdown-toggle" data-toggle="dropdown">
												<i class="icon-menu9"></i>
											</a>
											<ul class="dropdown-menu dropdown-menu-right">
												<li><a href="add_web_series.php?w_id=<?php echo $row['w_id'];?>"><i class="glyphicon glyphicon-edit"></i> EDIT</a></li>
												<li><a href="?w_id=<?php echo $row['w_id'];?>&type=<?php echo $_GET['type']; ?>" title="Delete" onclick="return confirm('Are you sure you want to delete this Web Series?');"><i class="glyphicon glyphicon-trash"></i> DELETE</a></li>												
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
