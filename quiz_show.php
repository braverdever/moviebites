<!DOCTYPE html>
<html lang="en">	
	<?php
	 	include("layouts/head.php"); 
	?>
	
	<script type="text/javascript" src="assetsquiz/js/core/app.js"></script>
	
	<body>
		<?php
	 		include("includes/header.php"); 
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
								<h4> <span class="text-semibold">Quiz</span> - Dashboard</h4>
							</div>
							<?php
								include("connection.php");
								$id = $_GET['id'];
								$query = "SELECT * FROM quiz LEFT OUTER JOIN tbl_category ON quiz.cat_id=tbl_category.cid LEFT OUTER JOIN tbl_subcategory_list ON quiz.sub_cat_id=tbl_subcategory_list.mid where qz_id = '$id'";
								$fetch = mysqli_query($con,$query);
								$row=mysqli_fetch_array($fetch);
							?> 
							<div class="heading-elements">
								<div class="heading-btn-group">									
									<a href="question_add.php?id=<?php echo $row['qz_id']; ?>" class="btn btn-link btn-float has-text"><i class="icon-plus2 text-primary"></i><span>Add Question</span></a>
									
									<a href="quiz_index.php" class="btn btn-link btn-float has-text"><i class="icon-arrow-left7 text-primary"></i><span>Back To List</span></a>
									<a href="quiz_edit.php?id=<?php echo $row[0]; ?>" class="btn btn-link btn-float has-text"><i class="icon-pencil7	 text-primary"></i><span>Edit</span></a>
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
							<div class="panel-body table-responsive" style="display: block;">
						    	
						        <legend class="text-bold">quiz DETAILS</legend>
						        <div class="well">
						            <div class="row">
						                <div class="col-lg-3">
						                    <dl>
						                        <dt>Title</dt>
						                        <dd><?php echo $row['quiz_title'] ?> </dd>  
						                        <dt>Category</dt>
						                        <dd><?php echo $row['category_name'] ?> </dd>  
						                    </dl>
						                </div>
						                <div class="col-lg-3">
						                    <dl>
						                        <!--<dt>Number Of Question</dt>
						                        <dd><?php echo $row['no_of_question'] ?></dd>-->
						                         <dt>Sub Category</dt>
						                        <dd><?php echo $row['menu_name'] ?></dd>
						                    </dl>
						                </div>
						                <div class="col-lg-3">
						                    <dl>
						                        <dt>Quiz Time</dt>
						                        <dd><?php echo $row['quiz_time']; ?></dd>
						                        <dt></dt>
						                        <dd><a href="question_show.php?id=<?php echo $row['qz_id']; ?>" class="btn btn-primary active">View Question</a></dd>
						                    </dl>
						                </div>
						                <!-- <div class="col-lg-3">
						                    <dl>
						                        <dt>Paid</dt>
						                        <dd><?php echo $row['paid_category']; ?></dd>
						                        
						                    </dl>
						                </div>-->
						            </div>
						        </div>

							</div>
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
