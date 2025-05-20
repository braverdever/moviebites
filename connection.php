<?php
	error_reporting(0);
 	ob_start();
    session_start();
	header("Content-Type: text/html;charset=UTF-8");
	if($_SERVER['HTTP_HOST']=="localhost" or $_SERVER['HTTP_HOST']=="192.168.1.23" or $_SERVER['HTTP_HOST']=="192.168.1.16" or $_SERVER['HTTP_HOST']=="150.129.150.83")
		{	
			//local  

     		 DEFINE ('DB_USER', 'u334293580_realshorts');
			 DEFINE ('DB_PASSWORD', 'k8CZ$N]h4al=');
			 DEFINE ('DB_HOST', 'localhost'); //host name depends on server
			 DEFINE ('DB_NAME', 'u334293580_realshorts');
		}
		else
		{
			//local live 

 			 DEFINE ('DB_USER', 'u334293580_realshorts');
			 DEFINE ('DB_PASSWORD', 'k8CZ$N]h4al=');
			 DEFINE ('DB_HOST', 'localhost'); //host name depends on server
			 DEFINE ('DB_NAME', 'u334293580_realshorts');
		 	  
			  
		}
	
	$con = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
	 mysqli_set_charset($con,'utf8');

	if ($con->connect_errno) 
	{
    	echo "Failed to connect to MySQL: (" . $con->connect_errno . ") " . $con->connect_error;
	}
	 echo "test";

	//mysqli_query($mysqli,"SET NAMES 'utf8'");	 



	//Settings
	$setting_qry="SELECT * FROM tbl_settings where id='1'";
    $setting_result=mysqli_query($con,$setting_qry);
    $settings_details=mysqli_fetch_assoc($setting_result);

    define("APP_NAME",$settings_details['app_name']);
    define("APP_LOGO",$settings_details['app_logo']);

    define("API_LATEST_LIMIT",$settings_details['api_latest_limit']);
    define("API_CAT_ORDER_BY",$settings_details['api_cat_order_by']);
    define("API_CAT_POST_ORDER_BY",$settings_details['api_cat_post_order_by']);
    define("API_ALL_VIDEO_ORDER_BY",$settings_details['api_all_order_by']);
    
    define("APP_FROM_EMAIL",$settings_details['app_from_email']);
    define("APP_ADMIN_EMAIL",$settings_details['app_admin_email']);

    //Profile
    if(isset($_SESSION['id']))
    {
    	$profile_qry="SELECT * FROM admin where id='".$_SESSION['id']."'";
	    $profile_result=mysqli_query($mysqli,$profile_qry);
	    $profile_details=mysqli_fetch_assoc($profile_result);

	    define("PROFILE_IMG",$profile_details['image']);
	    define("PROFILE_NAME",$profile_details['fname']);
	    define("PROFILE_EMAIL",$profile_details['email']);
    }

function compress_image($source_url, $destination_url, $quality) 

{

    $info = getimagesize($source_url);



    if ($info['mime'] == 'image/jpeg')

          $image = imagecreatefromjpeg($source_url);



    elseif ($info['mime'] == 'image/gif')

          $image = imagecreatefromgif($source_url);



    elseif ($info['mime'] == 'image/png')

          $image = imagecreatefrompng($source_url);



    imagejpeg($image, $destination_url, $quality);

    return $destination_url;

}
?>