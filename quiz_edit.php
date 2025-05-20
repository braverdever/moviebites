
<!DOCTYPE html>
<html lang="en">
	<?php
	 	include("layouts/head.php"); 
	?>
	<body>
		<?php
	 		include("includes/header.php"); 
		?>
		<script type="text/javascript" src="assetsquiz/js/core/app.js"></script>
      
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
		
<?php

if(isset($_POST['submit']))
{
   include("connection.php");
if($_SESSION['id']!=2)
			{    
    $qz_id = $_POST['qid'];
    $quiz_title = $_POST['quiz_title'];
    $cat_id = $_POST['cat_id'];
    $sub_cat_id = $_POST['sub_cat_id']; 
    $quiz_time = $_POST['time_convert_final'];
    
	$result = mysqli_query($con,"SELECT * FROM `quiz` WHERE qz_id = '$qz_id'");
	$row  = mysqli_fetch_assoc($result); 
    
	
		 if($_FILES['q_thumbnail_image']['name']!="")
	    {    
	    		
            	unlink('Qusestion_Images/'.$row['q_thumbnail_image']);
            	$back_path = "Qusestion_Images/"; 
                $q_thumbnail_image = str_replace(" ", "-", $_FILES['q_thumbnail_image']['name']);
                $back_image_name = $_FILES['q_thumbnail_image']['tmp_name'];
                move_uploaded_file($back_image_name, $back_path.$q_thumbnail_image); 

	           // $que_image_new = $q_thumbnail_image;
            
	    }
	    else
	    {
	        $q_thumbnail_image = $row['q_thumbnail_image'];
	    }
		
        $sql = "update quiz set quiz_title='$quiz_title',cat_id='$cat_id',sub_cat_id='$sub_cat_id',quiz_time='$quiz_time',q_thumbnail_image='$q_thumbnail_image' where qz_id = '$qz_id'";
         
         
        $result = mysqli_query($con, $sql );
        
        if ($result) 
        {
            echo 'Successful inserts: ' . mysqli_affected_rows($con);
            header('Location: quiz_index.php');   
        }
        else
        {
            echo 'query failed: ' . mysqli_error($con);  
        }
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
                                <h4> <span class="text-semibold">Quiz</span> - Dashboard</h4>
                            </div>
                            <div class="heading-elements">
                                <div class="heading-btn-group">
                                    <a href="quiz_index.php" class="btn btn-link btn-float has-text"><i class="icon-arrow-left7 text-primary"></i><span>Back To List</span></a>
                                </div>
                            </div>
                        </div>
                        <div class="breadcrumb-line">
                            <ul class="breadcrumb">
                                <li><a href="index.html"><i class="icon-home2 position-left"></i> Home</a></li>
                                <li class="active">Dashboard</li>
                            </ul>
                        </div>
                    </div>
					<div class="content">
                        <form method="POST" action="" enctype="multipart/form-data">
                             <section class="panel">
                            <div class="panel-body">
                                <div class="row">
                                 <?php
                                    include("connection.php");
                                    $qz_id = $_REQUEST['qz_id'];
                                    $query = "SELECT * FROM quiz where qz_id = '$qz_id'";
                                    $fetch = mysqli_query($con,$query);
                                    $row=mysqli_fetch_array($fetch);
                                ?> 
                                    <legend class="text-semibold"><i class="icon-reading position-left"></i>Quiz Details</legend> 
                                    <div class="col-md-6">
                                        <input type="hidden" value="<?php echo $row[0] ?>"  name="qid">
                                        <div class="form-group">
                                            <label for="title">Title</label>
                                            <input type="text" class="form-control input-editor" value="<?php echo $row[1]  ?>" placeholder="Title" name="quiz_title">
                                        </div>
                                    </div>
                                   
                                    <div class="col-md-6">        
                                        <div class="form-group">
                                            <label for="question_type">Category</label>
                                            <select  class="form-control" name="cat_id">
                                                <option value="">--Select Your Category Name--</option>
                                                <?php
                                                    
                                                    $query = "select * from tbl_category";
                                                    $fetch = mysqli_query($con,$query);
                                                    while($row_cat=mysqli_fetch_array($fetch))
                                                    {
                                                ?>
                                                <option value="<?php echo $row_cat[0];?>"  <?php 
                                                    if($row_cat['cid'] == $row['cat_id']) 
                                                        {
                                                            ?> selected 
                                                        <?php } ?>
                                                        ><?php echo $row_cat['category_name']; ?></option>
                                                
                                                <?php }?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">        
                                        <div class="form-group">
                                            <label for="question_type">Sub-Category</label>
                                            <select class="form-control" data-placeholder="Sub-Category" name="sub_cat_id">
                                                <option value="">--Select Your Sub Category</option>
                                                <?php
                                                    
                                                    $query = "select * from tbl_subcategory_list";
                                                    $fetch = mysqli_query($con,$query);
                                                    while($row_sub=mysqli_fetch_array($fetch))
                                                    {
                                                ?>
                                                <option value="<?php echo $row_sub[0];?>"  <?php 
                                                    if($row_sub['mid'] == $row['sub_cat_id']) 
                                                        {
                                                            ?> selected 
                                                        <?php } ?>
                                                        ><?php echo $row_sub['menu_name']; ?></option>
                                                
                                                <?php }?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="choice_a">Time</label>
                                           <input type="text"  name="quiz_time" value="<?php echo $row['quiz_time'] ?>" id="quiz_time" class="form-control input-editor" onkeyup="time_convert(this.value)" placeholder="Time">
                                            <input type="hidden" id="time_convert_final" name="time_convert_final">
                                        </div>
                                    </div>
                         
									<div class="col-md-6">
										<div class="form-group">
										  <label for="thumbnail">Image</label>
											<input type="file" name="q_thumbnail_image" class="form-control">
											<div class="imag-sec-icon">
												
												<img src="Qusestion_Images/<?php echo $row['q_thumbnail_image'];?>" style="width: 50px; height: 50px;" class="img-rounded" alt="">
												
												
											</div>
											
										</div>
									</div>
								</div>
                                    <div class="col-md-6">
                                        <input class="btn btn-info btn-fill pull-left" name="submit" type="submit" value="Edit Question">
                                    </div>
                                </div>
                            </div>
                        </section>
                      
                         </form>
                    </div>
                  
        
			        <?php
				 		include("layouts/footer.php"); 
					?>
				</div>
			</div>
		</div>
	</body>
</html>
<script type="text/javascript">
function time_convert(num)
{ 
		var a = ":";
		if(num.includes(a))
		{
			document.getElementById("time_convert_final").value = num;
		}
		else
		{
			 var hms = $("#quiz_time").val();
			const hours = Math.floor(hms / 60);  
			const minutes = num % 60;
			var convert  = `${hours}:${minutes}`;   
			document.getElementById("time_convert_final").value = convert;	
		}
	
}
</script>