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


$quotes_qry="SELECT * FROM tbl_subcategory_list LEFT JOIN tbl_category ON tbl_subcategory_list.cid = tbl_category.cid ORDER BY tbl_subcategory_list.mid DESC";	
//var_dump($quotes_qry);die();
$result=mysqli_query($mysqli,$quotes_qry);

if($_SESSION['id']!=2)
{
if(isset($_GET['cat_id']))
{

	$cat_res=mysqli_query($mysqli,'SELECT * FROM tbl_subcategory_list WHERE mid=\''.$_GET['cat_id'].'\'');

	$cat_res_row=mysqli_fetch_assoc($cat_res);

	if($cat_res_row['menu_image']!="")
	{
	   unlink('images/subcategory/'.$cat_res_row['menu_image']);
	}
		Delete('tbl_subcategory_list','mid='.$_GET['cat_id'].'');

		$_SESSION['msg']="12";

		header("Location:manage_subcategory.php");

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
							<h4> <span class="text-semibold">Subcategory List</span></h4>
						</div>

						<div class="heading-elements">
							<div class="heading-btn-group">
								<a href="add_subcategory.php?add=yes" class="btn btn-link btn-float has-text"><i class=" icon-plus3 text-primary"></i><span>Add Subcategory</span></a>
								
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
									<th>No</th>
									<th>Category name</th>
									<th>Subcategory name</th>
									<th>Subcategory Image</th> 
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
								<td><?php echo $i;?></td>
								<td><?php echo $row['category_name'];?></td>
								<td><?php echo $row['menu_name'];?></td>
								<td><img src="images/subcategory/<?php echo $row['menu_image'];?>" width="90" height="90" /></td>
								<td class="text-center">
									<ul class="icons-list">
										<li class="dropdown">
											<a href="#" class="dropdown-toggle" data-toggle="dropdown">
												<i class="icon-menu9"></i>
											</a>
											<ul class="dropdown-menu dropdown-menu-right">
												<li><a href="add_subcategory.php?cat_id=<?php echo $row['mid'];?>"><i class="glyphicon glyphicon-edit"></i> EDIT</a></li>
												<li><a href="?cat_id=<?php echo $row['mid'];?>" title="Delete" onclick="return confirm('Are you sure you want to delete this category?');"><i class="glyphicon glyphicon-trash"></i> DELETE</a></li>												
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
