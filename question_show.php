
<?php
include('includes/head.php');
include('includes/header.php')
?>
<style>	
img {
    width: 100px;
}
</style>
	<!-- Main navbar -->
	<!-- <?php
		
	?> -->
	<div class="page-container">
		<div class="page-content">

			<?php
				include('includes/sidebar.php')
			?>		
			<div class="content-wrapper">

				<!-- Page header -->
				<div class="page-header page-header-default">
					<div class="page-header-content">
						<div class="page-title">
							<h4><span class="text-semibold">Question</span> - Dashboard</h4>
						</div>

						<div class="heading-elements">
							<div class="heading-btn-group">
								<?php $id = $_REQUEST['id']; ?>
								<a href="question_add.php?id=<?php echo $id ?>" class="btn btn-link btn-float has-text"><i class="icon-plus2 text-primary"></i><span>Add Question</span></a>
									

								 <a href="quiz_show.php?id=<?php echo $_GET['id'] ?>" class="btn btn-link btn-float has-text"><i class="icon-arrow-left7 text-primary"></i><span>Back To List</span></a>
								
							</div>
						</div>
					</div>

					<div class="breadcrumb-line">
						<ul class="breadcrumb">
							<li><a href="index.html"><i class="icon-home2 position-left"></i> Home</a></li>
							<li><a href="timelines_left.html">Quiz</a></li>
							<li class="active">Question</li>
						</ul>

						
					</div>
				</div>
				<div class="content">
					<div class="timeline timeline-left">
						<div class="timeline-container">
							<div class="timeline-row">
								<div class="timeline-icon">
									<div class="bg-info-400">
										<i class="icon-comment-discussion"></i>
									</div>
								</div>
								<?php
									//include("connection.php");
									$id = $_REQUEST['id'];
									$query = "SELECT * FROM question where quiz_id = '$id'";
									$fetch = mysqli_query($mysqli,$query);
									while($row=mysqli_fetch_array($fetch))
									{
								?> 
								<div class="panel panel-flat timeline-content">
									<div class="panel-heading">
										
										<h6 class="panel-title"><strong style="font-family: arial"><?php echo $row['q_title'] ?></strong></h6>
										<div class="heading-elements">
											<ul class="fab-menu fab-menu-top" data-fab-toggle="click">
												<li>
													<a class="fab-menu-btn btn bg-brown btn-float btn-rounded btn-icon">
														<i class="fab-icon-open icon-plus3"></i>
														<i class="fab-icon-close icon-cross2"></i>
													</a>
													<ul class="fab-menu-inner">
														<li>
															<div data-fab-label="Modify">
																<a href="question_edit.php?id=<?php echo $row[0]; ?>" class="btn bg-teal-400 btn-rounded btn-icon btn-float" title="Edit Question">
																	<i class="glyphicon glyphicon-edit"></i>
																</a>
															</div>
														</li>
														<li>
															<div data-fab-label="Delete">
																<a href="question_delete.php?id=<?php echo $row[0]; ?>" class="btn bg-warning-400 btn-rounded btn-icon btn-float">
																	<i class="glyphicon glyphicon-trash"></i>
																</a>
															</div>
														</li>
													</ul>
												</li>
											</ul>
					                	</div>
									</div>
									<div class="row">
										<div class="panel-body">
											<div class="que_main">
												<div class="col-md-2">
													<h4 style="font-family: cambaria">Choice A</h4>
													<p style="font-family: cambaria"><?php echo $row['choice_a'] ?></p>
													
												</div>
												<div class="col-md-2">
													<h4 style="font-family: cambaria">Choice B</h4>
													<p style="font-family: cambaria"><?php echo $row['choice_b'] ?></p>
													
												</div>
												<?php if($row['choice_c']!=="") {?>
												<div class="col-md-2">
													<h4 style="font-family: cambaria">Choice C</h4>
													<p style="font-family: cambaria"><?php echo $row['choice_c'] ?></p>
												</div>
												<?php } 
												 if($row['choice_d']!=="") {?>
												<div class="col-md-2">
													<h4 style="font-family: cambaria">Choice D</h4>
													<p style="font-family: cambaria"><?php echo $row['choice_d'] ?></p>
												</div>
												<?php } 
												if($row['choice_e']!=="") {?>
												<div class="col-md-2">
													<h4 style="font-family: cambaria">Choice E</h4>
													<p style="font-family: cambaria"><?php echo $row['choice_e'] ?></p>
												</div>
												<?php } ?>
												<div class="col-md-2">
													<h4 style="font-family: cambaria">Right Answer</h4>
													<p style="font-family: cambaria"><?php echo $row['answer'] ?></p>
													
												</div>	

												<div class="col-md-8">
													<h4 style="font-family: cambaria">Answer Explation</h4>
													<p style="font-family: cambaria"><?php echo $row['explanation'] ?></p>
													
												</div>	
												<div class="col-md-4">
													<?php if($row['q_thumbnail']!=="") {?>
														<h4 style="font-family: cambaria;margin-left: 123px;">Question Image</h4>
													<img src="Qusestion_Images/<?php echo $row['q_thumbnail'] ?>" style="height: 100px;width: 100px;margin-left: 123px;">
													<?php } ?>
													
												</div>	
												
											</div>	
										</div>
									</div>
								
								</div> 
								<?php } ?>
							</div>
						</div>
				    </div>
				    

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
<script type="text/javascript" src="assetsquiz/js/plugins/ui/moment/moment.min.js"></script>
	<script type="text/javascript" src="assetsquiz/js/plugins/ui/fullcalendar/fullcalendar.min.js"></script>
	
	<script type="text/javascript" src="assetsquiz/js/plugins/ui/fab.min.js"></script>
	<script type="text/javascript" src="assetsquiz/js/plugins/ui/prism.min.js"></script>

	<script type="text/javascript" src="assetsquiz/js/core/app.js"></script>
	<script type="text/javascript" src="assetsquiz/js/pages/timelines.js"></script>
	<script type="text/javascript" src="assetsquiz/js/core/app.js"></script>
	<script type="text/javascript" src="assetsquiz/js/pages/extra_fab.js"></script>


