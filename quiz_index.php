<!DOCTYPE html>
<html lang="en">
	<?php
	 	include("layouts/head.php"); 
	 	include("includes/header.php"); 
	?>
	<script type="text/javascript" src="assetsquiz/js/plugins/tables/datatables/datatables.min.js"></script>
	<script type="text/javascript" src="assetsquiz/js/plugins/forms/selects/select2.min.js"></script>
	<script type="text/javascript" src="assetsquiz/js/core/app.js"></script>
	<script type="text/javascript" src="assetsquiz/js/pages/datatables_basic.js"></script>
	<body>
		<?php
	 		if($_SESSION['id']!=2)
			{
				if(isset($_GET['qz_id']))
				{
					include("connection.php");
					$id = $_GET['qz_id'];
					mysqli_query($con,"DELETE FROM quiz WHERE qz_id = '$id'");
				   // Delete('quiz','qz_id='.$id.'');
					header("location:quiz_index.php");
					exit;
				} 
			}

		?>


		<div class="page-container">
			<div class="page-content">
				<?php
					 include("includes/sidebar.php"); 
				?>
				<div class="content-wrapper">
					<div class="page-header page-header-default">
						<div class="page-header-content">
							<div class="page-title">
								<h4><span class="text-semibold">Quiz</span> - Dashboard</h4>
							</div>
							<div class="heading-elements">
								<div class="heading-btn-group">
									<a href="quiz_add.php" class="btn btn-link btn-float has-text"><i class="icon-plus2 text-primary"></i><span>Add</span></a>

									<!-- <a href="#" class="btn btn-link btn-float has-text"><i class="icon-calculator text-primary"></i> <span>Invoices</span></a> -->
								</div>
							</div>
						</div>
						<div class="breadcrumb-line">
							<ul class="breadcrumb">
								<li><a href="index.html"><i class="icon-home2 position-left"></i> Home</a></li>
								<li class="active">Quiz</li>
							</ul>
						</div>
					</div>
					<div class="content">
						<div class="panel panel-flat">
							<table class="table datatable-basic table-hover">
								<thead>
									<tr>
										<th>Title</th>
										
										<th>Category</th>
										<th>Time</th>
										
										
										<th class="text-center">Actions</th>
									</tr>
								</thead>
								<tbody>
									<?php
										include("connection.php");
										
										$query = "SELECT q.qz_id,q.quiz_title, q.no_of_question, q.quiz_time , q.paid_category, c.category_name FROM `tbl_category` AS c INNER JOIN `quiz` AS q ON c.cid = q.cat_id";
										$fetch = mysqli_query($con,$query);
										while($row=mysqli_fetch_array($fetch))
										{
									?>
									<tr>
										<td><?php echo $row['quiz_title'];?></td>
										
										<td><?php echo $row['category_name'];?></td>
										<td><?php echo $row['quiz_time'];?></td>
										
										
										
										<td class="text-center">
											<ul class="icons-list">
												<li class="dropdown">
													<a href="#" class="dropdown-toggle" data-toggle="dropdown">
														<i class="icon-menu9"></i>
													</a>
													<ul class="dropdown-menu dropdown-menu-right">
														<li><a href="quiz_show.php?id=<?php echo $row['qz_id']; ?>"><i class="icon-eye"></i>View More</a></li>
														<li><a href="quiz_edit.php?qz_id=<?php echo $row['qz_id']; ?>"><i class="icon-pencil7"></i>Edit</a></li>

														<li><a href="?qz_id=<?php echo $row['qz_id'];?>" title="Delete" onclick="return confirm('Are you sure you want to delete this category?');"><i class="icon-trash"></i> DELETE</a></li>
                                                

														<!-- <li><a href="quiz_delete.php?id=<?php echo $row[0]; ?>"><i class="icon-trash"></i>Delete</a></li> -->
													</ul>
												</li>
											</ul>
										</td>
									</tr>
									<?php
									}
									?>
								</tbody>
							</table>
						</div>
						<?php
				 			include("layouts/footer.php"); 
						?>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>
