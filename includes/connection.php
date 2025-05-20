<?php
    //error_reporting(0);
    session_start();
    ob_start();
 	header("Content-Type: text/html;charset=UTF-8");
	
	
		if($_SERVER['HTTP_HOST']=="localhost" or $_SERVER['HTTP_HOST']=="192.168.1.23" or $_SERVER['HTTP_HOST']=="192.168.1.16")
		{	
			//local  

				 DEFINE ('DB_USER', 'root');
				 DEFINE ('DB_PASSWORD', '');
				 DEFINE ('DB_HOST', 'localhost'); //host name depends on server
				 DEFINE ('DB_NAME', 'quizx');
		}
		else
		{
			//local live   etern5yx_shortvid

		 	 DEFINE ('DB_USER', 'etern5yx_shortvid');
			 DEFINE ('DB_PASSWORD', 'etern5yx_shortvid');
			 DEFINE ('DB_HOST', 'localhost'); //host name depends on server
			 DEFINE ('DB_NAME', 'etern5yx_shortvid');
		}
    
	
	$mysqli =mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
	
	
	
	if ($mysqli->connect_errno) 
	{
    	echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
	}

	mysqli_query($mysqli,"SET NAMES 'utf8'");	 
     

	//Settings
	
	
	$setting_qry="SELECT * FROM tbl_settings where id='1'";
    $setting_result=mysqli_query($mysqli,$setting_qry);
    
   
    
    if ($setting_result === false) {
        // Table doesn't exist or query failed, set default values
        $settings_details = [
            'onesignal_app_id' => '',
            'onesignal_rest_key' => '',
            'app_name' => 'Default App Name',
            'app_logo' => '',
            'api_latest_limit' => 10,
            'api_cat_order_by' => 'id',
            'api_cat_post_order_by' => 'id',
            'api_all_order_by' => 'id'
        ];
    } else {
        $settings_details=mysqli_fetch_assoc($setting_result);
    }
	
	
	
	@define("ONESIGNAL_APP_ID",$settings_details['onesignal_app_id']);
    @define("ONESIGNAL_REST_KEY",$settings_details['onesignal_rest_key']);
    

    @define("APP_NAME",$settings_details['app_name']);
    @define("APP_LOGO",$settings_details['app_logo']);

    @define("API_LATEST_LIMIT",$settings_details['api_latest_limit']);
    @define("API_CAT_ORDER_BY",$settings_details['api_cat_order_by']);
    @define("API_CAT_POST_ORDER_BY",$settings_details['api_cat_post_order_by']);
    @define("API_ALL_VIDEO_ORDER_BY",$settings_details['api_all_order_by']);
    

    //Profile
    if(isset($_SESSION['id']))
    {
    	//$profile_qry="SELECT * FROM admin where id='".$_SESSION['id']."'";
	    //$profile_result=mysqli_query($mysqli,$profile_qry);
	    //$profile_details=mysqli_fetch_assoc($profile_result);
		
		//$profile_qry1 = "SELECT admin.*, tbl_theme.* FROM admin INNER JOIN tbl_theme ON admin.theme_id = tbl_theme.theme_id where id='".$_SESSION['id']."'";
	   // $profile_result1 = mysqli_query($mysqli,$profile_qry1);
	    //$profile_details1 = mysqli_fetch_assoc($profile_result1);


	    //define("PROFILE_IMG",$profile_details['image']);
		//define("PROFILE_NAME",$profile_details['username']);
		
		//define("THEME_ID",$profile_details1['theme_id']);
	    //define("SIDEBAR_THEME",$profile_details1['sidebar_color']);
	    //define("HEADER_THEME",$profile_details1['header_color']);
	    //define("ACTIVE_THEME",$profile_details1['active_color']);
    }
    	
	
?> 
	 
 