<!DOCTYPE html>
<html lang="en">
<?php
include("includes/header.php");
//include("connection.php");
include("layouts/head.php");
require("language/language.php");
require("includes/function.php");

require_once("thumbnail_images.class.php");
if($_SESSION['id']!=2)
{
	$id = $_GET["id"];
    if(isset($_POST['submit']))
    {
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
        $que_image = $_FILES['q_thumbnail']['name'];
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
						$choice_a = '<img src = "'.$file_path.$back_image.'">';
					}
					
						if(isset($_FILES['choice_b']))
					{
						$back_path = "Qusestion_Images/"; 
						$back_image_two = str_replace(" ", "-", $_FILES['choice_b']['name']);
						$back_tmp = $_FILES['choice_b']['tmp_name'];
						move_uploaded_file($back_tmp, $back_path.$back_image_two); 
						
						$file_path = 'http://'.$_SERVER['SERVER_NAME'] . dirname($_SERVER['REQUEST_URI']).'/Qusestion_Images/'; 
						//$choice_b = $file_path.$back_image_two;
						$choice_b = '<img src = "'.$file_path.$back_image_two.'">';
					}
					
						if(isset($_FILES['choice_c']))
					{
						$back_path = "Qusestion_Images/"; 
						$back_image_three = str_replace(" ", "-", $_FILES['choice_c']['name']);
						$back_tmp = $_FILES['choice_c']['tmp_name'];
						move_uploaded_file($back_tmp, $back_path.$back_image_three); 
						
						$file_path = 'http://'.$_SERVER['SERVER_NAME'] . dirname($_SERVER['REQUEST_URI']).'/Qusestion_Images/'; 
						$choice_c = '<img src = "'.$file_path.$back_image_three.'">';
					}
					
						if(isset($_FILES['choice_d']))
					{
						$back_path = "Qusestion_Images/"; 
						$back_image_four = str_replace(" ", "-", $_FILES['choice_d']['name']);
						$back_tmp = $_FILES['choice_d']['tmp_name'];
						move_uploaded_file($back_tmp, $back_path.$back_image_four); 
						
						$file_path = 'http://'.$_SERVER['SERVER_NAME'] . dirname($_SERVER['REQUEST_URI']).'/Qusestion_Images/'; 
						$choice_d = '<img src = "'.$file_path.$back_image_four.'">';
					}
					
						if(isset($_FILES['choice_e']))
					{
						$back_path = "Qusestion_Images/"; 
						$back_image_five = str_replace(" ", "-", $_FILES['choice_e']['name']);
						$back_tmp = $_FILES['choice_e']['tmp_name'];
						move_uploaded_file($back_tmp, $back_path.$back_image_five); 
						
						$file_path = 'http://'.$_SERVER['SERVER_NAME'] . dirname($_SERVER['REQUEST_URI']).'/Qusestion_Images/'; 
						$choice_e = '<img src = "'.$file_path.$back_image_five.'">';
					}
					
				 }
				//-----------------------------------------------end---------------------------------//
		
		if(isset($_FILES['que_back_image']))
				{
					$back_path = "Qusestion_Images/"; 
					$que_back_image = str_replace(" ", "-", $_FILES['que_back_image']['name']);
					$back_tmp = $_FILES['que_back_image']['tmp_name'];
					move_uploaded_file($back_tmp, $back_path.$que_back_image); 
					
					$file_path ='http://'.$_SERVER['SERVER_NAME'] . dirname($_SERVER['REQUEST_URI']).'/Qusestion_Images/'.$file_path.$que_back_image; 
					$que_back_image = "<img src = ".$file_path.$que_back_image.">";
					$explanation = $explanation.'\n<img src ="'.$file_path.'" />';
					
				}
					
					
		
        if($_FILES['q_thumbnail']['name']!="")
        { 
						$back_path = "Qusestion_Images/"; 
						$que_image = str_replace(" ", "-", $_FILES['q_thumbnail']['name']);
						$back_tmp = $_FILES['q_thumbnail']['tmp_name'];
						move_uploaded_file($back_tmp, $back_path.$que_image); 
						
						$tpath1 ='http://'.$_SERVER['SERVER_NAME'] . dirname($_SERVER['REQUEST_URI']).'/Qusestion_Images/'.$tpath1.$que_image; 
						$q_thumbnail = "<img src = ".$tpath1.$que_image.">";
				
						//$q_title = $q_title."\n<img src =".$tpath1.">";
						$q_title = $q_title.'<br><br><img src ="'.$tpath1.'"/>';
			 
            // $sql = "INSERT INTO  question(quiz_id,q_title, question_type,no_of_answer,file_type,q_thumbnail,que_back_image, choice_a,choice_b,choice_c,choice_d,choice_e,answer,explanation) VALUES ('".$qid."','".$q_title."','".$question_type."','".$no_of_answer."','".$file_type."','".$que_image."','".$que_back_image."','".$choice_a."','".$choice_b."','".$choice_c."','".$choice_d."','".$choice_e."','".$answer."','".$explanation."')";


            $sql = "INSERT INTO  question(quiz_id,file_type,q_title, question_type,no_of_answer,q_thumbnail,que_back_image, choice_a,choice_b,choice_c,choice_d,choice_e,answer,explanation) VALUES 
										('".$qid."','".$file_type."','".$q_title."','".$question_type."','".$no_of_answer."','".$que_image."','".$que_back_image."','".$choice_a."','".$choice_b."','".$choice_c."','".$choice_d."','".$choice_e."','".$answer."','".$explanation."')";
        }
        else
        {
            // $sql = "INSERT INTO  question(quiz_id,q_title, question_type,no_of_answer,file_type,q_thumbnail, que_back_image,choice_a,choice_b,choice_c,choice_d,choice_e,answer,explanation) VALUES ('".$qid."','".$q_title."','".$question_type."','".$no_of_answer."','".$file_type."','".$que_image."','".$que_back_image."','".$choice_a."','".$choice_b."','".$choice_c."','".$choice_d."','".$choice_e."','".$answer."','".$explanation."')";
  			
  			 $sql = "INSERT INTO  question(quiz_id,file_type,q_title, question_type,no_of_answer,q_thumbnail,que_back_image, choice_a,choice_b,choice_c,choice_d,choice_e,answer,explanation) VALUES 
										('".$qid."','".$file_type."','".$q_title."','".$question_type."','".$no_of_answer."','".$que_image."','".$que_back_image."','".$choice_a."','".$choice_b."','".$choice_c."','".$choice_d."','".$choice_e."','".$answer."','".$explanation."')";

        }   
        $result = mysqli_query($mysqli,$sql);

        if($result) 
        {
            $id = $qid;
            $_SESSION['id'] = $id;
            header('Location: question_add.php?id='.$id);
        }
        else
        {
            echo 'query failed: ' . mysqli_error($mysqli);  
        }  
    }
}			
?>
<script type="text/javascript" src="assets/js/plugins/forms/selects/select2.min.js"></script>
<script type="text/javascript" src="assets/js/plugins/forms/styling/uniform.min.js"></script>
	
<script type="text/javascript" src="assets/js/core/app.js"></script>
<script type="text/javascript" src="assets/js/pages/form_layouts.js"></script>

       
 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
 <script src="frontcss/js/file_upload.js"></script>

<div class="page-container">
    <div class="page-content">
        <?php include("includes/sidebar.php");?>
        <div class="content-wrapper">
            <div class="page-header page-header-default">
                <div class="page-header-content">
                    <div class="page-title">
                        <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Quiz</span> Categories</h4>
                    </div>
                    <div class="heading-elements">
                            <div class="heading-btn-group">
                                
                                <button type="button" class="btn btn-danger btn-rounded"><i class="icon-circle-left2 position-left"></i><a href="quiz_index.php">Back</a></button>
                            
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
            
            <?php if(isset($_SESSION['msg'])){?>
              <div class="alert alert-success no-border">
                    <button type="button" class="close" data-dismiss="alert"><span>&times;</span><span class="sr-only">Close</span></button>
                    <span class="text-semibold"><?php echo $client_lang[$_SESSION['msg']] ; ?></span> 
            </div>
            <?php unset($_SESSION['msg']);}?> 
            
                <!-- Static mode -->
                <form method="POST" action="question_add.php" enctype="multipart/form-data" class="form-horizontal">
                <input  type="hidden" name="qid" value="<?php echo $id;?>">
                <div class="panel panel-flat">
                  <div class="panel-heading">
                    <h5 class="panel-title">Basic layout</h5>
                    <div class="heading-elements">
                      <ul class="icons-list">
                                <li><a data-action="collapse"></a></li>
                                <li><a data-action="reload"></a></li>
                                
                              </ul>
                            </div>
                  </div>

                  <div class="panel-body">
										<div class="col-md-12">
											<div class="form-group">
												<label for="title">Title</label>
												<input type="text" class="form-control input-editor" id="title" placeholder="Title" name="q_title">  
											</div>
										</div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="question_type">Question Type</label>
                                                <select id="question_type" class="form-control" id="question_type" name="question_type">
                                                    <option value="regular">Regular Question</option>
                                                    <option value="photo">Photo Question</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="form-group question_image" style="display: none;">
                                                    <label for="thumbnail">Question Image</label>
                                                    <input class="form-control" name="q_thumbnail" type="file" >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="no_of_answer">Number of Answer</label>
                                                <select id="no_of_answer" class="form-control" name="no_of_answer">
                                                    <option value="5">5</option>
                                                    <option value="4">4</option>
                                                    <!--<option value="3">3</option>
                                                    <option value="2">2</option>-->
                                                </select>
                                            </div>
                                        </div>
										<div class="row">
										
											<div class="col-md-6">
												<div class="form-group pull-center">
													<label>Choose Image/Text For Option</label>
													<select required="required" class="form-control" id="file_type" name="file_type">
														<option value="text">Text</option>
														<option value="image">Image</option>
													</select>
												</div>
											</div>
											
											<!----------------------------------f1----------------------->
										
											<div class="col-md-6">
												<div class="form-group" id="video_url">
													<label for="choice_a">Choice A</label>
													<textarea class="form-control input-editor" placeholder="Choice A" name="choice_a" cols="30" rows="2" id="choice_a"></textarea>
													
												</div>
											</div>
											<div class="col-md-6" id="front_file_type_display"  style="display: none;">
												<div class="form-group">
													<label for="choice_a">Image Upload </label>
													  <input class="form-control" name="choice_a" type="file" >
																						
												 </div>
											</div>
											<!----------------------------------f1----------------------->
                                        <div class="col-md-6" id="video_url_two">
                                            <div class="form-group">
                                                <label for="choice_b">Choice B</label>
                                                <textarea class="form-control input-editor" placeholder="Choice B" name="choice_b" cols="30" rows="2" id="choice_b"></textarea>
                                            </div>
                                        </div>
										
										<div class="col-md-6" id="front_file_type_display_two" style="display: none;">
												<div class="form-group">
													<label for="choice_b">Image Upload2 </label>
												
													<input class="form-control" name="choice_b" type="file">
													
												</div>
											</div>
											
											<!----------------------------------f1----------------------->
											
                                        <div class="col-md-6" id="video_url_three">
                                            <div class="form-group choice_c" >
                                                <label for="choice_c">Choice C</label>
                                                <textarea class="form-control input-editor" placeholder="Choice C" name="choice_c" cols="30" rows="2" id="choice_c"></textarea>
												
                                            </div>
                                        </div>
										<div class="col-md-6" id="front_file_type_display_three" style="display: none;">
												<div class="form-group choice_c">
													<label for="choice_c">Image Upload3 </label>
													
													<input class="form-control" name="choice_c" type="file" >
												
												</div>
											</div>
										
										
										<!----------------------------------f1----------------------->
                                        <div class="col-md-6" id="video_url_four">
                                            <div class="form-group choice_d">
                                                <label for="choice_d">Choice D</label>
                                                <textarea class="form-control input-editor" placeholder="Choice D" name="choice_d" cols="30" rows="2" id="choice_d"></textarea>
                                            </div>
                                        </div>
										<div class="col-md-6" id="front_file_type_display_four" style="display: none;">
												<div class="form-group choice_d" >
													<label for="choice_d">Image Upload4 </label>
												
													<input class="form-control" name="choice_d" type="file">
													
												</div>
											</div>
										
										<!----------------------------------f1----------------------->
										 <div class="col-md-6" id="video_url_five" >
											<div class="form-group choice_e">
                                                <label for="choice_e">Choice E</label>
                                                <textarea class="form-control input-editor" placeholder="Choice E" name="choice_e" cols="30" rows="2" id="choice_e"></textarea>
                                            </div>
											</div>
											<div class="col-md-6" id="front_file_type_display_five" style="display: none;">
												<div class="form-group choice_e" >
													<label for="choice_e">Image Upload5 </label>
												
													<input class="form-control" name="choice_e" type="file">
													
												</div>
											</div>
											
											<!----------------------------------f1----------------------->
										</div>
                                        <div class="col-md-12">
                                           
                                            <div class="form-group">
                                                <label for="answer">Correct Answer</label>
                                                <select id="answer" class="form-control" name="answer">
                                                    <option selected="selected" value="">Correct Answer</option>
                                                    <option value="Choice_A">Choice A</option>
                                                    <option value="Choice_B">Choice B</option>
                                                    <option value="Choice_C">Choice C</option>
                                                    <option value="Choice_D">Choice D</option>
                                                    <option value="Choice_E">Choice E</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="explanation">Answer Explanation</label>
                                                <textarea class="form-control input-editor" placeholder="Answer Explanation" name="explanation" cols="30" rows="2" id="explanation"></textarea>
                                               
                                            </div>
                                        </div>
										<div class="col-md-6">
										<div class="form-group">
											<label>Image Upload </label>
										
											<input class="form-control" name="que_back_image" type="file">
											
										</div>
									</div>
                                    
                                        <div class="col-md-6">
                                            <input class="btn btn-info btn-fill pull-left" name="submit" value="submit" type="submit">
                                        </div>
                  </div>
                </div>
              </form>
                            <!-- /static mode -->
            
            <?php include("includes/footer.php");?>
            </div>
        </div>
    </div>
</div>

<script src="quizjs/main.js"></script>
<script type="text/javascript">
	$(document).ready(function(e){       
		$("#file_type").change(function() {   
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
<script src="jquery.checkImageSize.js"></script>
<script>
$("input[type=file]").checkImageSize();
</script>
</body>
</html>
