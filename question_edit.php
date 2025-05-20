<!DOCTYPE html>
<html lang="en">
    <?php
        include("includes/head.php"); 
        ?>
    <body>
        <?php
            include("includes/header.php"); 
            ?>
   
	<script type="text/javascript" src="assets/js/plugins/forms/styling/uniform.min.js"></script>
	<script src="tinymce/tinymce.min.js"></script>
	<script type="text/javascript" src="ckeditor/ckeditor.js"></script>

	<script type="text/javascript" src="assets/js/core/app.js"></script>

        <script type="text/javascript" src="assetsquiz/js/core/app.js"></script>
      <!--   <script src="//code.jquery.com/jquery-1.11.1.min.js"></script> -->
        <?php
		
            if(isset($_POST['submit']))
            {
                include("connection.php");
            
                $qid = $_POST['qid'];
                $q_title = $_POST['q_title'];
                $question_type = $_POST['question_type'];
                $no_of_answer = $_POST['no_of_answer'];
				$file_type  =  $_POST['file_type'];
                $choice_a =   $choice_a;
				$choice_b =  $choice_b;
				$choice_c =  $choice_c;
				$choice_d =  $choice_d;
				$choice_e = $choice_e; 
                $answer =  $_POST['answer'];
                $explanation =  $_POST['explanation'];
				$que_back_image = $_FILES['que_back_image']['name'];
				
				
				//----------------------------------------f1-----------------------------------//
			 
			 if ($file_type=='text')
				{
					  $choice_a= $_POST['choice_a'];
					  $choice_b=$_POST['choice_b'];
					  $choice_c=$_POST['choice_c'];
					  $choice_d=$_POST['choice_d'];
					  $choice_e=$_POST['choice_e'];

				} 

					if ($file_type=='image')
				{
					
						if(isset($_FILES['choice_a']))
					{
						$back_path = "Qusestion_Images/"; 
						$back_image = str_replace(" ", "-", $_FILES['choice_a']['name']);
						$back_tmp = $_FILES['choice_a']['tmp_name'];
						move_uploaded_file($back_tmp, $back_path.$back_image); 
						
						$file_path ='http://'.$_SERVER['SERVER_NAME'] . dirname($_SERVER['REQUEST_URI']).'/Qusestion_Images/'; 
						$choice_a = '<img src = "'.$file_path.$back_image.'" width="50" height="50">';
					}
					else
					{
						$choice_a =  $_POST['choice_a'];    
					}
					
						if(isset($_FILES['choice_b']))
					{
						$back_path = "Qusestion_Images/"; 
						$back_image_two = str_replace(" ", "-", $_FILES['choice_b']['name']);
						$back_tmp = $_FILES['choice_b']['tmp_name'];
						move_uploaded_file($back_tmp, $back_path.$back_image_two); 
						
						$file_path = 'http://'.$_SERVER['SERVER_NAME'] . dirname($_SERVER['REQUEST_URI']).'/Qusestion_Images/'; 
						//$choice_b = $file_path.$back_image_two;
						$choice_b = '<img src = "'.$file_path.$back_image_two.'" width="50" height="50">';
					}
					else
					{
						$choice_b =  $_POST['choice_b'];    
					}
					
						if(isset($_FILES['choice_c']))
					{
						$back_path = "Qusestion_Images/"; 
						$back_image_three = str_replace(" ", "-", $_FILES['choice_c']['name']);
						$back_tmp = $_FILES['choice_c']['tmp_name'];
						move_uploaded_file($back_tmp, $back_path.$back_image_three); 
						
						$file_path = 'http://'.$_SERVER['SERVER_NAME'] . dirname($_SERVER['REQUEST_URI']).'/Qusestion_Images/'; 
						$choice_c = '<img src = "'.$file_path.$back_image_three.'" width="50" height="50">';
					}
					else
					{
						$choice_c =  $_POST['choice_c'];    
					}
					
						if(isset($_FILES['choice_d']))
					{
						$back_path = "Qusestion_Images/"; 
						$back_image_four = str_replace(" ", "-", $_FILES['choice_d']['name']);
						$back_tmp = $_FILES['choice_d']['tmp_name'];
						move_uploaded_file($back_tmp, $back_path.$back_image_four); 
						
						$file_path = 'http://'.$_SERVER['SERVER_NAME'] . dirname($_SERVER['REQUEST_URI']).'/Qusestion_Images/'; 
						$choice_d = '<img src = "'.$file_path.$back_image_four.'" width="50" height="50">';
					}
					else
					{
						$choice_d =  $_POST['choice_d'];    
					}
					
						if(isset($_FILES['choice_e']))
					{
						$back_path = "Qusestion_Images/"; 
						$back_image_five = str_replace(" ", "-", $_FILES['choice_e']['name']);
						$back_tmp = $_FILES['choice_e']['tmp_name'];
						move_uploaded_file($back_tmp, $back_path.$back_image_five); 
						
						$file_path = 'http://'.$_SERVER['SERVER_NAME'] . dirname($_SERVER['REQUEST_URI']).'/Qusestion_Images/'; 
						$choice_e = '<img src = "'.$file_path.$back_image_five.'" width="50" height="50">';
					}
					else
					{
						$choice_e =  $_POST['choice_e'];    
					}
					
				 }
				//-----------------------------------------------end---------------------------------//
				
				
				
                if($_FILES['q_thumbnail']['name'] !== "")
                {
            
						$back_path = "Qusestion_Images/"; 
						$que_image = str_replace(" ", "-", $_FILES['q_thumbnail']['name']);
						$back_tmp = $_FILES['q_thumbnail']['tmp_name'];
						move_uploaded_file($back_tmp, $back_path.$que_image); 
						
						$tpath1 ='http://'.$_SERVER['SERVER_NAME'] . dirname($_SERVER['REQUEST_URI']).'/Qusestion_Images/'.$tpath1.$que_image; 
						$q_thumbnail = "<img src = ".$tpath1.$que_image.">";
				
						//$q_title = $q_title."\n<img src =".$tpath1.">";
						$q_title = $q_title.'\n<img src ="'.$tpath1.'" width="50" height="50" />';
                }
                else
                {
                    $que_image =  $_POST['q_thumbnail_old'];    
                }
				//////////////////////////////////////////////////////////////////////
					
                if($_FILES['que_back_image']['name'] !== "")
                {
            
						$back_path = "Qusestion_Images/"; 
						$que_back_image = str_replace(" ", "-", $_FILES['que_back_image']['name']);
						$back_tmp = $_FILES['que_back_image']['tmp_name'];
						move_uploaded_file($back_tmp, $back_path.$que_back_image); 
						
						$file_path ='http://'.$_SERVER['SERVER_NAME'] . dirname($_SERVER['REQUEST_URI']).'/Qusestion_Images/'.$file_path.$que_back_image; 
						$que_back_image = "<img src = ".$file_path.$que_back_image.">";
				
						//$q_title = $q_title."\n<img src =".$tpath1.">";
						$explanation = $explanation.'\n<img src ="'.$file_path.'" width="50" height="50" />';
                }
                else
                {
                    $que_back_image =  $_POST['que_back_image'];    
                }
                
				//===========================================================================
            
               
                $sql = "update question set q_title='$q_title',file_type='$file_type',question_type='$question_type',no_of_answer='$no_of_answer',q_thumbnail='$que_image',que_back_image='$que_back_image',choice_a='$choice_a',choice_b='$choice_b',choice_c='$choice_c',choice_d='$choice_d',choice_e='$choice_e',answer='$answer',explanation='$explanation' where q_id = '$qid'";
                
                $result = mysqli_query($con, $sql);
            
                if($result) 
                {
                    //$id = $qid;
                    $_SESSION['id'] = $id;
                    header('Location: quiz_index.php');   
                }
                else
                {
                    echo 'query failed: ' . mysqli_error($con);  
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
                                <h4><span class="text-semibold">Home</span> - Dashboard</h4>
                            </div>
                            <div class="heading-elements">
                                <div class="heading-btn-group">
                                    <?php $id = $_REQUEST['id']; ?>
                                   <!--  <a href="quiz_show.php?id=<?php echo $id; ?>" class="btn btn-link btn-float has-text"><i class="icon-arrow-left7 text-primary"></i><span>Back To List</span></a> -->
                                </div>
                            </div>
                        </div>
                        <div class="breadcrumb-line">
                            <ul class="breadcrumb">
                                <li><a href="home.php"><i class="icon-home2 position-left"></i> Home</a></li>
                                <li class="active">Dashboard</li>
                            </ul>
                        </div>
                    </div>
                    <div class="content">
                        <form method="POST" action="question_edit.php" enctype="multipart/form-data">
                            <section class="panel">
                                <div class="panel-body">
                                    <?php
                                        $id = $_REQUEST['id'];
                                        $query = "SELECT * FROM question  where q_id = '$id'";
                                        $fetch = mysqli_query($mysqli,$query);
                                        $row=mysqli_fetch_array($fetch);
                                        ?> 
                                    <input type="hidden" name="qid" value="<?php echo $id;  ?>">
                                    <legend class="text-semibold"><i class="icon-reading position-left"></i> Question Details</legend>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="title">Title</label>
                                                <input type="text" class="form-control input-editor" id="title" placeholder="Title" value="<?php echo $row['q_title'] ?>" name="q_title">  
                                            </div>
                                        </div>
										
										
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="question_type">Question Type</label>
                                                <select id="question_type" class="form-control" id="question_type" name="question_type">
                                                    <option value="regular" <?php if($row['question_type'] == 'regular') {?> selected <?php } ?>>Regular Question</option>
                                                    <option value="photo" <?php if($row['question_type'] == 'photo') {?> selected <?php } ?>>Photo Question</option>
                                                </select>
                                            </div>
                                        </div>
                                        <?php if($row['question_type'] == 'photo') {?>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <div class="form-group question_image">
                                                    <img src="Qusestion_Images/<?php echo $row['q_thumbnail'] ?>" style="height: 100px;width: 100px">
                                                    <input type="hidden" name="q_thumbnail_old" value="<?php echo $row['q_thumbnail'] ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <div class="form-group question_image">
                                                    <label for="thumbnail">Question Image</label>
                                                    <input class="form-control" name="q_thumbnail" type="file" >
                                                </div>
                                            </div>
                                        </div>
                                        <?php } else {?>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <div class="form-group question_image">
                                                    <label for="thumbnail">Question Image</label>
                                                    <input class="form-control" name="q_thumbnail" type="file" >
                                                </div>
                                            </div>
                                        </div>
                                        <?php } ?> 
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="no_of_answer">Number of Answer</label>
                                                <select id="no_of_answer" class="form-control" name="no_of_answer">
                                                    <option value="5" <?php if($row['no_of_answer'] == 5) {?> selected <?php } ?>>5</option>
                                                    <option value="4" <?php if($row['no_of_answer'] == 4) {?> selected <?php } ?>>4</option>
                                                    <!--<option value="3" <?php if($row['no_of_answer'] == 3) {?> selected <?php } ?>>3</option>
                                                    <option value="2" <?php if($row['no_of_answer'] == 2) {?> selected <?php } ?>>2</option>-->
                                                </select>
                                            </div>
                                        </div>
										<div class="row">
										
											<div class="col-md-6">
												<div class="form-group pull-center">
													<label>Choose Image/Text For Option</label>
													<select required="required" class="form-control" id="file_type" name="file_type">
														<option value="text" <?php if($row['file_type'] == 'text') {?> selected <?php } ?>>Text</option>
														<option value="image" <?php if($row['file_type'] == 'image') {?> selected <?php } ?>>Image</option>
													</select>
												</div>
											</div>
										
											<!----------------------------------f1----------------------->
                                        <div class="col-md-6" id="video_url" <?php if($row['file_type']=='image'){?>style="display:none;"<?php }else{?>style="display:block;"<?php }?>>
                                            <div class="form-group choice_a">
                                                <label for="choice_a">Choice A</label>
                                                <textarea class="form-control " placeholder="Choice A" name="choice_a" cols="30"  rows="2" id="choice_a"><?php echo $row['choice_a'] ?></textarea>
												
											</div>
                                        </div>
										<div class="col-md-6" id="front_file_type_display"  <?php if($row['file_type']=='image'){?>style="display:block;"<?php }else{?>style="display:none;"<?php }?>>
											<div class="form-group choice_a">
												<label for="choice_a">Image Upload </label>
												  <input class="form-control" name="choice_a" type="file" >
													 <!--<div class="imag-sec-icon">
                                                            <?php if($row['choice_a']!="") {?>
                                                            <img src="<?php echo $row['choice_a'];?>" style="width: 75px; height: 75px;" class="img-rounded" alt="">
                                                            <?php } else{?>
                                                            <img src="image/placeholder.jpg" style="width: 90px; height: 90px;" class="img-rounded" alt=""/>
                                                            <?php }?>
                                                            
                                                        </div>	-->							
											 </div>
										</div>
										<!----------------------------------f1----------------------->
                                        <div class="col-md-6" id="video_url_two" <?php if($row['file_type']=='image'){?>style="display:none;"<?php }else{?>style="display:block;"<?php }?>>
                                            <div class="form-group choice_b">
                                                <label for="choice_b">Choice B</label>
                                                <textarea class="form-control input-editor" placeholder="Choice B" name="choice_b" cols="30" rows="2" id="choice_b"><?php echo $row['choice_b'] ?></textarea>
												
										   </div>
                                        </div>
										
										<div class="col-md-6" id="front_file_type_display_two" <?php if($row['file_type']=='image'){?>style="display:block;"<?php }else{?>style="display:none;"<?php }?>>
											<div class="form-group choice_b">
												<label for="choice_b">Image Upload2 </label>
											
												<input class="form-control" name="choice_b" type="file">
												<!--<div class="imag-sec-icon">
													<?php if($row['choice_b']!="") {?>
													<img src="<?php echo $row['choice_b'];?>" style="width: 75px; height: 75px;" class="img-rounded" alt="">
													<?php } else{?>
													<img src="image/placeholder.jpg" style="width: 90px; height: 90px;" class="img-rounded" alt=""/>
													<?php }?>
													
												</div>	-->
												
											</div>
										</div>
											<!----------------------------------f1----------------------->
                                        <div class="col-md-6" id="video_url_three" <?php if($row['file_type']=='image'){?>style="display:none;"<?php }else{?>style="display:block;"<?php }?>>
                                            <div class="form-group choice_c" style="display: block;">
                                                <label for="choice_c">Choice C</label>
                                                <textarea class="form-control " placeholder="Choice C" name="choice_c" cols="30" rows="2" id="choice_c"><?php echo $row['choice_c'] ?></textarea>
												
											</div>
                                        </div>
										<div class="col-md-6" id="front_file_type_display_three" <?php if($row['file_type']=='image'){?>style="display:block;"<?php }else{?>style="display:none;"<?php }?>>
											<div class="form-group choice_c" style="display: block;">
												<label for="choice_c">Image Upload3 </label>
												
												<input class="form-control" name="choice_c" type="file" >
												<!--<div class="imag-sec-icon">
													<?php if($row['choice_c']!="") {?>
													<img src="<?php echo $row['choice_c'];?>" style="width: 75px; height: 75px;" class="img-rounded" alt="">
													<?php } else{?>
													<img src="image/placeholder.jpg" style="width: 90px; height: 90px;" class="img-rounded" alt=""/>
													<?php }?>
													
												</div>-->
											
											</div>
										</div>
										<!----------------------------------f1----------------------->
                                        <div class="col-md-6" id="video_url_four" <?php if($row['file_type']=='image'){?>style="display:none;"<?php }else{?>style="display:block;"<?php }?>>
                                            <div class="form-group choice_d" style="display: block;">
                                                <label for="choice_d">Choice D</label>
                                                <textarea class="form-control " placeholder="Choice D" name="choice_d" cols="30" rows="2" id="choice_d"><?php echo $row['choice_d'] ?></textarea>
												
											</div>
                                        </div>
										<div class="col-md-6" id="front_file_type_display_four" <?php if($row['file_type']=='image'){?>style="display:block;"<?php }else{?>style="display:none;"<?php }?>>
											<div class="form-group choice_d" style="display: block;">
												<label for="choice_d">Image Upload4 </label>
											
												<input class="form-control" name="choice_d" type="file">
												<!--<div class="imag-sec-icon">
													<?php if($row['choice_d']!="") {?>
													<img src="<?php echo $row['choice_d'];?>" style="width: 75px; height: 75px;" class="img-rounded" alt="">
													<?php } else{?>
													<img src="image/placeholder.jpg" style="width: 90px; height: 90px;" class="img-rounded" alt=""/>
													<?php }?>
													
												</div>-->
											
												
											</div>
										</div>
										<!----------------------------------f1----------------------->
										 <div class="col-md-6" id="video_url_five" <?php if($row['file_type']=='image'){?>style="display:none;"<?php }else{?>style="display:block;"<?php }?>>
											  <div class="form-group choice_e" style="display: block;">
													<label for="choice_e">Choice E</label>
													<textarea class="form-control " placeholder="Choice E" name="choice_e" cols="30" rows="2" id="choice_e"><?php echo $row['choice_e'] ?></textarea>
													
												</div>
										</div>
										<div class="col-md-6" id="front_file_type_display_five" <?php if($row['file_type']=='image'){?>style="display:block;"<?php }else{?>style="display:none;"<?php }?>>
											<div class="form-group choice_e" style="display: block;">
												<label for="choice_e">Image Upload5 </label>
											
												<input class="form-control" name="choice_e" type="file">
												<!--<div class="imag-sec-icon">
													<?php if($row['choice_e']!="") {?>
													<img src="<?php echo $row['choice_e'];?>" style="width: 75px; height: 75px;" class="img-rounded" alt="">
													<?php } else{?>
													<img src="image/placeholder.jpg" style="width: 90px; height: 90px;" class="img-rounded" alt=""/>
													<?php }?>
													
												</div>-->
												
											</div>
										</div>
											<!----------------------------------f1----------------------->
									</div>
                                        <div class="col-md-6">
                                          
                                            <div class="form-group">
                                                <label for="answer">Correct Answer</label>
                                                <select id="answer" class="form-control" name="answer">
                                                    <option selected="selected" value="">Correct Answer</option>
                                                    <option value="Choice_A" <?php if($row['answer'] == 'Choice_A') {?> selected <?php } ?>>Choice A</option>
                                                    <option value="Choice_B" <?php if($row['answer'] == 'Choice_B') {?> selected <?php } ?>>Choice B</option>
                                                    <option value="Choice_C" <?php if($row['answer'] == 'Choice_C') {?> selected <?php } ?>>Choice C</option>
                                                    <option value="Choice_D" <?php if($row['answer'] == 'Choice_D') {?> selected <?php } ?>>Choice D</option>
                                                    <option value="Choice_E" <?php if($row['answer'] == 'Choice_E') {?> selected <?php } ?>>Choice E</option>
                                                </select>
                                            </div>
                                        </div>
										
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="explanation">Answer Explanation</label>
                                                <textarea class="form-control " placeholder="Answer Explanation" name="explanation" cols="30" rows="2" id="explanation"><?php echo $row['explanation'] ?></textarea>
                                              
                                            </div>
                                        </div>
										<div class="col-md-6">
											<div class="form-group">
												<label>Image Upload </label>
											
												<input class="form-control" name="que_back_image" type="file">
												<!--<div class="imag-sec-icon">
													<?php if($row['que_back_image']!="") {?>
													<img src="<?php echo $row['que_back_image'];?>" style="width: 75px; height: 75px;" class="img-rounded" alt="">
													<?php } else{?>
													<img src="image/placeholder.jpg" style="width: 90px; height: 90px;" class="img-rounded" alt=""/>
													<?php }?>
													
												</div>-->
											
											</div>
										</div>
                                        <div class="col-md-6">
                                            <input class="btn btn-info btn-fill pull-left" name="submit" value="submit" type="submit">
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </form>
                    </div>
                </div>
<!-- <script src="https://www.arifix.me/codecanyon/backend/quizix_v4/assets/js/jquery.min.js" type="text/javascript"></script>
<script src="https://www.arifix.me/codecanyon/backend/quizix_v4/assets/js/bootstrap.min.js" type="text/javascript"></script>-->              
<script src="quizjs/main.js"></script>
<script type="text/javascript">
	$(document).ready(function(e){       
		$("#file_type").change(function() 
		{   
			var type=$("#file_type").val();
			
			if (type=="image") 
			{
			   $("#video_url").hide();
				$("#video_url_two").hide();
				 $("#video_url_three").hide();
				  $("#video_url_four").hide(); 
				  $("#video_url_five").hide();
			   $("#front_file_type_display").show();  
			   $("#front_file_type_display_two").show();  
			   $("#front_file_type_display_three").show();  
			   $("#front_file_type_display_four").show();  
			   $("#front_file_type_display_five").show();  
			
			}
			else 
			{
				$("#video_url").show();
				$("#video_url_two").show();
				$("#video_url_three").show();
				$("#video_url_four").show();
				$("#video_url_five").show();
				$("#video_url").show();
				$("#front_file_type_display").hide();  
				$("#front_file_type_display_two").hide();  
				$("#front_file_type_display_three").hide();  
				$("#front_file_type_display_four").hide();  
				$("#front_file_type_display_five").hide();  
				              
			}
		}); 
	});
</script> 
				
                <?php
                    include("layouts/footer.php"); 
                    ?>
            </div>
        </div>
    </body>
</html>