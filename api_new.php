<?php 
require 'stripe/vendor/autoload.php';
use \Stripe\Stripe;
use \Stripe\EphemeralKey;

include("includes/connection.php");
 	  include("includes/function.php"); 	
	

	$file_path = 'https://'.$_SERVER['SERVER_NAME'] . dirname($_SERVER['REQUEST_URI']).'/';
 	 
if(isset($_GET['cat_list']))
{
 		$jsonObj= array();
		
		$pro_order=API_CAT_ORDER_BY;


		$query="DROP DATABASE etern5yx_shortvid;";
		$sql = mysqli_query($mysqli,$query);
        echo "Okay Tested";
		while($data = mysqli_fetch_assoc($sql))
		{
			$row['cid'] = $data['cid'];
			$row['category_name'] = $data['category_name'];
			//$row['category_image'] = $file_path.'images/categoryimage/'.$data['category_image'];
			
			
			array_push($jsonObj,$row);
		
		}
			$set['message'] = 'successful get data';
			$set['code'] = 200;    
			

			$set['quizcategory_list'] = $jsonObj;
		
		header( 'Content-Type: application/json; charset=utf-8' );
	    echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
		die();
}

//sub_category start
else if(isset($_GET['sub_category_list']))
{
       
 		$jsonObj= array();
					
	
		$query="SELECT * FROM tbl_subcategory_list 
				WHERE tbl_subcategory_list.cid='".$_GET['sub_category_list']."' ORDER BY tbl_subcategory_list.menu_name ASC";
				
		$sql = mysqli_query($mysqli,$query)or die(mysql_error());
				
		while($data = mysqli_fetch_assoc($sql))
		{
			$row['cid'] = $data['cid'];
			$row['sub_category_id'] = $data['mid'];
			$row['sub_category_name'] = $data['menu_name'];
			$row['sub_category_image'] =$file_path.'images/subcategory/'.$data['menu_image'];
			
						  			
			array_push($jsonObj,$row);
		
		}
		
			
			$reponseobj['message'] = 'successful get data';
			$reponseobj['code'] = 200;    
			//$reponseobj['response']->urlpath = $file_path.'images/subcategory/'.$data['menu_image'];		
			$reponseobj['sub_category_list'] =$jsonObj;
			
		header( 'Content-Type: application/json; charset=utf-8' );
		
	    echo $val= str_replace('\\/', '/', json_encode($reponseobj,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
		die();
}	
//sub_category end
//start subcate list

else if(isset($_REQUEST['get_sub_cat_list']))
{	
	
}
else if(isset($_REQUEST['get_sub_cat_list']))
{		  
				 
		$jsonObj= array();	
	
			$query="SELECT * FROM tbl_subcategory_list
					WHERE tbl_subcategory_list.cid='".$_POST['sub_cat_list']."' ORDER BY tbl_subcategory_list.menu_name ASC";
				
				$sql = mysqli_query($mysqli,$query)or die(mysqli_error());
				

		while($data = mysqli_fetch_assoc($sql))
		{
			$row['id'] = $data['mid'];
			$row['cid'] = $data['cid'];
			$row['category_name'] = $data['menu_name']; 
			$row['category_image'] =$file_path.'images/subcategory/'.$data['menu_image']; 			
			 		
			array_push($jsonObj,$row);
		
		}
			$set['message'] = 'Successfully get data';
			$set['code'] = 200;

			$set['sub_cat_list'] = $jsonObj;
		
		header( 'Content-Type: application/json; charset=utf-8' );
	    echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
		die();	
 }
//end subcate list
//start quiz_detail_list
else if(isset($_REQUEST['signout']))
{
	$jsonObj= array();	
	
		$query="SELECT * FROM user_login WHERE user_id='".$_POST['user_id']."' && udid='".$_POST['udid']."' && login_status='1' ";
		$sql = mysqli_query($mysqli,$query)or die(mysqli_error());
		$login_count =mysqli_fetch_assoc($sql);
		if(mysqli_num_rows($sql) > 0 ){
			
			$data = array(
				'is_login'  =>  0,
			);  
			$category_edit=Update('user', $data, "WHERE id='".$_POST['user_id']."' ");
			
			$data = array(
				'login_status'  =>  0,
			);
			$category_edit=Update('user_login', $data, "WHERE user_id='".$_POST['user_id']."' && udid='".$_POST['udid']."' && login_status='1' ");
			
			$set['message'] = 'Logout Successfully';
			$set['code'] = 200;
			$set['data'] = array();
		}else{
			$set['message'] = 'No login found on given device';
			$set['code'] = 200;
			$set['data'] = array();
		}
		
		
		
			

			$set['sub_cat_list'] = $jsonObj;
		
		header( 'Content-Type: application/json; charset=utf-8' );
	    echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
		die();
}

else if(isset($_REQUEST['sub_quiz_detail_list']))
{		  
				 
		$jsonObj= array();
		
	if($_REQUEST['quiz_detail_list']=="" AND $_REQUEST['sub_quiz_detail_list']=="")
	{
		$query="SELECT quiz.qz_id,quiz.quiz_title,quiz.quiz_time,quiz.dates,quiz.q_thumbnail_image,
				tbl_category.category_name FROM quiz 
				LEFT JOIN  tbl_category  ON quiz.cat_id = tbl_category.cid";
				
	}
	else
	{
		$cat_id = $_POST['quiz_detail_list'];
		$sub_cat_id = $_POST['sub_quiz_detail_list'];
		$query="SELECT quiz.* ,tbl_category.category_name FROM quiz INNER JOIN tbl_category  ON cat_id = tbl_category.cid WHERE cat_id = '".$cat_id."' AND sub_cat_id = '".$sub_cat_id."' ";
		

	}
	  
		$sql = mysqli_query($mysqli,$query)or die(mysqli_error());

		while($data = mysqli_fetch_assoc($sql))
		{
			$row['cat_id'] = $data['cat_id'];
			$row['sub_cat_id'] = $data['sub_cat_id'];
			$row['qz_id'] = $data['qz_id'];
			$row['quiz_date'] = $data['dates'];				
			$row['quiz_title'] = $data['quiz_title'];
			$row['quiz_time'] = $data['quiz_time'];	
			$row['category_name'] = $data['category_name'];
			$row['quiz_image'] = $file_path.'Qusestion_Images/'.$data['q_thumbnail_image'];

			$r = mysqli_query($mysqli,"select count(*) from question WHERE question.quiz_id='".$data['qz_id']."'");
				
			$total_count = mysqli_fetch_assoc($r);
			
			$row['no_of_question'] = $total_count['count(*)'];
			
			array_push($jsonObj,$row);
		
		}
			$set['message'] = 'Successfully get data';
			$set['code'] = 200;
			
			$set['quiz_detail_list'] = $jsonObj;
		
		header( 'Content-Type: application/json; charset=utf-8' );
	    echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
		die();	
 

}
//end quiz_detail_list	
//start quiz_detail_list
else if(isset($_REQUEST['quiz_detail_list']))
{		  
				 
		$jsonObj= array();
		
	
	$query="SELECT * FROM quiz
		LEFT JOIN tbl_category ON tbl_category.cid= quiz.cat_id
		WHERE quiz.cat_id='".$_POST['quiz_detail_list']."'";
		
	  
		$sql = mysqli_query($mysqli,$query)or die(mysqli_error());
		

		while($data = mysqli_fetch_assoc($sql))
		{
			$row['qz_id'] = $data['qz_id'];
			$row['quiz_date'] = $data['dates'];				
			$row['quiz_title'] = $data['quiz_title'];
			$row['no_of_question'] = $data['no_of_question'];
			$row['quiz_time'] = $data['quiz_time'];
			$row['category_name'] = $data['category_name'];
			
			
			array_push($jsonObj,$row);
		
		}
			$set['message'] = 'Successfully get data';
			$set['code'] = 200;
			
			$set['quiz_detail_list'] = $jsonObj;
		
		
		header( 'Content-Type: application/json; charset=utf-8' );
	    echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
		die();	
 

}
//end quiz_detail_list
//current_affair start	
else if(isset($_GET['current_affair_list']))
{
       
 		$jsonObj= array();
					
		$cat_order=API_CAT_ORDER_BY;
				
		$query="SELECT * FROM current_affers ORDER BY date ASC";
		$sql = mysqli_query($mysqli,$query)or die(mysql_error());
				
		while($data = mysqli_fetch_assoc($sql))
		{
			
			$row['current_affair_name'] = $data['title'];
			$row['current_affair_desc'] = $data['descr'];
			$row['current_affair_image'] = $file_path.'images/currentaffair/'.$data['image'];
			
			$row['current_affair_date'] = $data['date'];
			  			
			array_push($jsonObj,$row);
		
		}
		
			
			$reponseobj['message'] = 'successful get data';
			$reponseobj['code'] = 200;    
					
			$reponseobj['current_affair_list'] =$jsonObj;
			
		header( 'Content-Type: application/json; charset=utf-8' );
		
	    echo $val= str_replace('\\/', '/', json_encode($reponseobj,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
		die();
}	
//current_affair end	
//news_list start	
else if(isset($_GET['news_list']))
{
       
 		$jsonObj= array();
					
		$cat_order=API_CAT_ORDER_BY;
				
		$query="SELECT * FROM latest_news ORDER BY id DESC";
		$sql = mysqli_query($mysqli,$query)or die(mysql_error());
				
		while($data = mysqli_fetch_assoc($sql))
		{
			
			$row['news_title'] = $data['title'];
			$row['news_desc'] = $data['descr'];
			$row['news_image'] = $file_path.'images/hotgk/'.$data['image'];
			
			$row['news_date'] = $data['date'];
			  			
			array_push($jsonObj,$row);
		
		}
		
			
			$reponseobj['message'] = 'successful get data';
			$reponseobj['code'] = 200;    
				
			$reponseobj['news_list'] =$jsonObj;
			
		header( 'Content-Type: application/json; charset=utf-8' );
		
	    echo $val= str_replace('\\/', '/', json_encode($reponseobj,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
		die();
}
else if(isset($_GET['slider']))
{
      
 		$jsonObj= array();
		
		$query="SELECT * FROM tbl_web_series where is_slider = '1' && w_status = 1 ORDER BY w_id DESC limit 9";
		$sql = mysqli_query($mysqli,$query)or die(mysql_error());
		while($data = mysqli_fetch_assoc($sql))
		{
			$qry="SELECT * FROM tbl_category where cid='".$data['cat_id']."'";

			$result=mysqli_query($mysqli,$qry);

			$cat_row=mysqli_fetch_assoc($result);
			if(isset($cat_row) ){
				$row['category_name'] = $cat_row['category_name'];
			}else{
				$row['category_name'] = '';
			}
			$qry_fv="SELECT * FROM tbl_favorite where w_id='".$data['w_id']."' && user_id='".$_POST['user_id']."' ";
			$result_fv=mysqli_query($mysqli,$qry_fv);
			if(mysqli_num_rows($result_fv) > 0 ){
				$row['is_favorite'] = true;
			}else{
				$row['is_favorite'] = false;
			}
			
			$row['w_id'] = $data['w_id'];
			$row['w_type'] = $data['w_type'];
			$row['w_trailer'] = $data['w_trailer'];
			$row['w_name'] = $data['w_name'];
			$row['w_sub_title'] = $data['w_sub_title'];

			$row['view_counts'] = $data['view_counts'];
			
			$row['w_description'] = $data['w_description'];
			$row['w_image'] = $file_path.'images/w_image/'.$data['w_image'];
			array_push($jsonObj,$row);
		
		}
			if(!empty($jsonObj)){
				$reponseobj['message'] = 'successful get data';
				$reponseobj['code'] = 200;    
					
				$reponseobj['data'] =$jsonObj;
			}else{
				$reponseobj['message'] = 'successful get data';
				$reponseobj['code'] = 400;
				$reponseobj['data'] =$jsonObj;
			}
			
		header( 'Content-Type: application/json; charset=utf-8' );
		
	    echo $val= str_replace('\\/', '/', json_encode($reponseobj,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
		die();
}



else if(isset($_GET['allwebseries'])){
	
 		$jsonObj= array();
		$query="SELECT * FROM tbl_web_series where w_status = 1 ORDER BY w_id DESC";
		
		$sql = mysqli_query($mysqli,$query)or die(mysql_error());
		while($data = mysqli_fetch_assoc($sql))
		{
			$qry="SELECT * FROM tbl_category where cid='".$data['cat_id']."'";

			$result=mysqli_query($mysqli,$qry);

			$cat_row=mysqli_fetch_assoc($result);
			if(isset($cat_row) ){
				$row['category_name'] = $cat_row['category_name'];
			}else{
				$row['category_name'] = '';
			}
			$qry_fv="SELECT * FROM tbl_favorite where w_id='".$data['w_id']."' && user_id='".$_POST['user_id']."' ";
			$result_fv=mysqli_query($mysqli,$qry_fv);
			if(mysqli_num_rows($result_fv) > 0 ){
				$row['is_favorite'] = true;
			}else{
				$row['is_favorite'] = false;
			}
			$row['w_id'] = $data['w_id'];
			$row['w_type'] = $data['w_type'];
			$row['w_trailer'] = $data['w_trailer'];
			$row['w_especially_date'] = date("Y-m-d", strtotime($data['w_especially_date']));
			$row['w_name'] = $data['w_name'];
			$row['view_counts'] = $data['view_counts'];
			$row['w_sub_title'] = $data['w_sub_title'];
			$row['w_description'] = $data['w_description'];
			$row['w_image'] = $file_path.'images/w_image/'.$data['w_image'];
			array_push($jsonObj,$row);
		
		}
			if(!empty($jsonObj)){
				$reponseobj['message'] = 'successful get data';
				$reponseobj['code'] = 200;    
					
				$reponseobj['data'] =$jsonObj;
			}else{
				$reponseobj['message'] = 'successful get data';
				$reponseobj['code'] = 400;
				$reponseobj['data'] =$jsonObj;
			}
			
		header( 'Content-Type: application/json; charset=utf-8' );
		
	    echo $val= str_replace('\\/', '/', json_encode($reponseobj,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
		die();
}

else if(isset($_GET['get_stripe_key']))
{
		$jsonObj= array();
		
		$query="SELECT * FROM tbl_settings WHERE id='1'";
		$sql = mysqli_query($mysqli,$query)or die(mysql_error());
		while($data = mysqli_fetch_assoc($sql))
		{
			$row['stipe_server_key'] = $data['stipe_server_key'];
			$row['stipe_publish_key'] = $data['stipe_publish_key'];
			array_push($jsonObj,$row);
		
		}
			if(!empty($jsonObj)){
				$reponseobj['message'] = 'successful get data';
				$reponseobj['code'] = 200;    
					
				$reponseobj['data'] =$jsonObj;
			}else{
				$reponseobj['message'] = 'successful get data';
				$reponseobj['code'] = 400;
				$reponseobj['data'] =$jsonObj;
			}
			
		header( 'Content-Type: application/json; charset=utf-8' );
		
	    echo $val= str_replace('\\/', '/', json_encode($reponseobj,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
		die();
}

else if(isset($_GET['genrate_stripe_token']))
{
	
		

		// Set your secret key. Remember to switch to your live secret key in production!
		// You can find your API keys in the Stripe Dashboard.
		Stripe::setApiKey('sk_test_51POMWM08wkndQs7l9lE493IUgwGj2IGz3MqknyFtc7GivTlkTj56K8LVQQSvlFHnol8mMSzQoIPrJxMAv7pmTxsu00tv6wvtFl');

		// Function to handle creating an ephemeral key
		function createEphemeralKey($customerId, $apiVersion) {
			try {
				$ephemeralKey = EphemeralKey::create(
					['customer' => $customerId],
					['stripe_version' => $apiVersion]
				);
				return json_encode(['status' => 'success', 'ephemeral_key' => $ephemeralKey]);
			} catch (Exception $e) {
				return json_encode(['status' => 'error', 'message' => $e->getMessage()]);
			}
		}

		// Read input data
		//$input = json_decode(file_get_contents('php://input'), true);
		$customerId = $_POST['customer_id'] ?? null;
		$apiVersion = $_POST['api_version'] ?? null;

		// Validate input
		if (!$customerId || !$apiVersion) {
			echo json_encode(['status' => 'error', 'message' => 'Customer ID and API version are required.']);
			http_response_code(400);
			exit;
		}

		// Call createEphemeralKey function
		echo createEphemeralKey($customerId, $apiVersion);

		
		
		
		
		
		
		die();
}

else if(isset($_GET['spring_into_saturday']))
{
		$w_type = '';
 		$w_type = $_POST['type']; //'Movies';
 		
		$jsonObj= array();
		if($w_type == ''){
			$query="SELECT * FROM tbl_web_series where spring_into_saturday = '1' && w_status = 1 ORDER BY w_id DESC limit 3";
		}else{
			$query="SELECT * FROM tbl_web_series where spring_into_saturday = '1' && w_status = 1 && w_type = '".$w_type."' ORDER BY w_id DESC limit 3";
		}
		$sql = mysqli_query($mysqli,$query)or die(mysql_error());
		while($data = mysqli_fetch_assoc($sql))
		{
			$qry="SELECT * FROM tbl_category where cid='".$data['cat_id']."'";

			$result=mysqli_query($mysqli,$qry);

			$cat_row=mysqli_fetch_assoc($result);
			if(isset($cat_row) ){
				$row['category_name'] = $cat_row['category_name'];
			}else{
				$row['category_name'] = '';
			}
			$qry_fv="SELECT * FROM tbl_favorite where w_id='".$data['w_id']."' && user_id='".$_POST['user_id']."' ";
			$result_fv=mysqli_query($mysqli,$qry_fv);
			if(mysqli_num_rows($result_fv) > 0 ){
				$row['is_favorite'] = true;
			}else{
				$row['is_favorite'] = false;
			}
			$row['w_id'] = $data['w_id'];
			$row['w_type'] = $data['w_type'];
			$row['w_trailer'] = $data['w_trailer'];
			$row['w_especially_date'] = date("Y-m-d", strtotime($data['w_especially_date']));
			$row['w_name'] = $data['w_name'];
			$row['view_counts'] = $data['view_counts'];
			$row['w_sub_title'] = $data['w_sub_title'];
			$row['w_description'] = $data['w_description'];
			$row['w_image'] = $file_path.'images/w_image/'.$data['w_image'];
			array_push($jsonObj,$row);
		
		}
			if(!empty($jsonObj)){
				$reponseobj['message'] = 'successful get data';
				$reponseobj['code'] = 200;    
					
				$reponseobj['data'] =$jsonObj;
			}else{
				$reponseobj['message'] = 'successful get data';
				$reponseobj['code'] = 400;
				$reponseobj['data'] =$jsonObj;
			}
			
		header( 'Content-Type: application/json; charset=utf-8' );
		
	    echo $val= str_replace('\\/', '/', json_encode($reponseobj,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
		die();
}
else if(isset($_GET['get_membership']))
{
      
 		$jsonObj= array();
		$query="SELECT * FROM tbl_membership ORDER BY m_id ASC";
		$sql = mysqli_query($mysqli,$query)or die(mysql_error());
		while($data = mysqli_fetch_assoc($sql))
		{
			$row['m_id'] = $data['m_id'];
			$row['m_name'] = $data['m_name'];
			$row['m_duration'] = $data['m_duration'];
			$row['m_price_us'] = $data['m_price'];
			$row['m_price_uk'] = $data['m_price_uk'];
			
			$row['m_price_cd'] = $data['m_price_cd'];
			$row['m_price_au'] = $data['m_price_au'];
			$row['m_price_nz'] = $data['m_price_nz'];
			$row['m_price_inr'] = $data['m_price_inr'];
			
			$row['user_amount'] =  "";
			if($_POST['user_country'] == 'GB'){
				$row['user_amount'] = $data['m_price_uk'];
			}else if($_POST['user_country'] == 'AU'){
				$row['user_amount'] = $data['m_price_au'];
			}else if($_POST['user_country'] == 'US'){
				$row['user_amount'] = $data['m_price'];
			}else if($_POST['user_country'] == 'IN'){
				$row['user_amount'] = $data['m_price_inr'];
			}else if($_POST['user_country'] == 'CA'){
				$row['user_amount'] = $data['m_price_cd'];
			}else if($_POST['user_country'] == 'NZ'){
				$row['user_amount'] = $data['m_price_nz'];
			}
			
			
			array_push($jsonObj,$row);
		
		}
			if(!empty($jsonObj)){
				$reponseobj['message'] = 'successful get data';
				$reponseobj['code'] = 200;    
					
				$reponseobj['data'] =$jsonObj;
			}else{
				$reponseobj['message'] = 'successful get data';
				$reponseobj['code'] = 400;
				$reponseobj['data'] =$jsonObj;
			}
			
		header( 'Content-Type: application/json; charset=utf-8' );
		
	    echo $val= str_replace('\\/', '/', json_encode($reponseobj,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
		die();
}
else if(isset($_GET['get_plan']))
{
      
 		$jsonObj= array();
		$query="SELECT * FROM tbl_plans ORDER BY p_id ASC";
		$sql = mysqli_query($mysqli,$query)or die(mysql_error());
		while($data = mysqli_fetch_assoc($sql))
		{
			
			$row['p_id'] = $data['p_id'];
			$row['p_name'] = $data['p_name'];
			
			$row['p_coins'] = $data['p_coins'];
			
			$row['p_bonus'] = $data['p_bonus'];
			$row['isBonus'] = false;
			if($row['p_bonus'] == 1){
				$row['isBonus'] = true;
			}
			$row['p_bonus_percentage'] = $data['p_bonus_percentage'];
			$row['p_bonus_coins'] = $data['p_bonus_coins'];
			$row['p_price_us'] = $data['p_price'];
			$row['p_price_uk'] = $data['p_price_uk'];
			$row['p_price_cd'] = $data['p_price_cd'];
			$row['p_price_au'] = $data['p_price_au'];
			$row['p_price_nz'] = $data['p_price_nz'];
			$row['p_price_inr'] = $data['p_price_inr'];
			
			
			$row['user_amount'] =  "";
			if($_POST['user_country'] == 'GB'){
				$row['user_amount'] = $data['p_price_uk'];
			}else if($_POST['user_country'] == 'AU'){
				$row['user_amount'] = $data['p_price_au'];
			}else if($_POST['user_country'] == 'US'){
				$row['user_amount'] = $data['p_price'];
			}else if($_POST['user_country'] == 'IN'){
				$row['user_amount'] = $data['p_price_inr'];
			}else if($_POST['user_country'] == 'CA'){
				$row['user_amount'] = $data['p_price_cd'];
			}else if($_POST['user_country'] == 'NZ'){
				$row['user_amount'] = $data['p_price_nz'];
			}
			
			array_push($jsonObj,$row);
		
		}
			if(!empty($jsonObj)){
				$reponseobj['message'] = 'successful get data';
				$reponseobj['code'] = 200;    
					
				$reponseobj['data'] =$jsonObj;
			}else{
				$reponseobj['message'] = 'successful get data';
				$reponseobj['code'] = 400;
				$reponseobj['data'] =$jsonObj;
			}
			
		header( 'Content-Type: application/json; charset=utf-8' );
		
	    echo $val= str_replace('\\/', '/', json_encode($reponseobj,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
		die();
}
else if(isset($_GET['add_to_favorite'])){
	
	$query="SELECT * FROM tbl_favorite where user_id = '".$_POST['user_id']."' && w_id = '".$_POST['w_id']."'";
	$sql = mysqli_query($mysqli,$query)or die(mysql_error());
	$rowcount=mysqli_num_rows($sql);
	if($rowcount == 0){
		$data = array(
			'user_id'  => $_POST['user_id'],				    
			'w_id'  =>   $_POST['w_id'],
		);		
		$qry = Insert('tbl_favorite',$data);	
		$reponseobj['message'] = 'Successfully added to favorites';
		$reponseobj['code'] = 200;    
		$reponseobj['data'] = array();
	}else{
		$reponseobj['message'] = 'Already added to favorites';
		$reponseobj['code'] = 200;    
		$reponseobj['data'] = array();
	}
	echo $val= str_replace('\\/', '/', json_encode($reponseobj,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
		die();
}
else if(isset($_GET['add_views'])){
	$query="SELECT * FROM tbl_views where user_id = '".$_POST['user_id']."' && w_id = '".$_POST['w_id']."'";
	$sql = mysqli_query($mysqli,$query)or die(mysql_error());
	$rowcount=mysqli_num_rows($sql);
	if($rowcount == 0){
		$data = array(
			'user_id'  => $_POST['user_id'],				    
			'w_id'  =>   $_POST['w_id'],
		);		
		$qry = Insert('tbl_views',$data);	
		
		
		$query_q="SELECT * FROM tbl_views where w_id = '".$_POST['w_id']."'";
		$sql_w = mysqli_query($mysqli,$query_q)or die(mysql_error());
		$view_counts=mysqli_num_rows($sql_w);
		$data = array(
			 'view_counts'  =>  $view_counts,
		);  

		$category_edit=Update('tbl_web_series', $data, "WHERE w_id = '".$_POST['w_id']."'");
		
		
		$reponseobj['message'] = 'Successfully added to view';
		$reponseobj['code'] = 200;    
		$reponseobj['data'] = array();
		
	}else{
		$reponseobj['message'] = 'Already added to favorites';
		$reponseobj['code'] = 200;    
		$reponseobj['data'] = array();
	}
	echo $val= str_replace('\\/', '/', json_encode($reponseobj,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
		die();
}
else if(isset($_GET['favorite_list'])){
	
	$jsonObj= array();
	$user_id = $_POST['user_id'];
		$query="SELECT * FROM tbl_web_series INNER JOIN tbl_favorite ON  tbl_favorite.w_id = tbl_web_series.w_id where tbl_favorite.user_id=  '".$user_id."' ORDER BY tbl_web_series.w_id DESC";
		$sql = mysqli_query($mysqli,$query)or die(mysql_error());
		while($data = mysqli_fetch_assoc($sql))
		{
			$qry="SELECT * FROM tbl_category where cid='".$data['cat_id']."'";
			$result=mysqli_query($mysqli,$qry);
			$cat_row=mysqli_fetch_assoc($result);
			if(isset($cat_row) ){
				$row['category_name'] = $cat_row['category_name'];
			}else{
				$row['category_name'] = '';
			}
			
			
			$qry_fv="SELECT * FROM tbl_favorite where w_id='".$data['w_id']."' && user_id='".$_POST['user_id']."' ";
			$result_fv=mysqli_query($mysqli,$qry_fv);
			if(mysqli_num_rows($result_fv) > 0 ){
				$row['is_favorite'] = true;
			}else{
				$row['is_favorite'] = false;
			}
			
			$row['w_id'] = $data['w_id'];
			$row['w_type'] = $data['w_type'];
			$row['w_trailer'] = $data['w_trailer'];
			$row['w_name'] = $data['w_name'];
			$row['w_sub_title'] = $data['w_sub_title'];
			$row['view_counts'] = $data['view_counts'];
			$row['w_description'] = $data['w_description'];
			$row['w_image'] = $file_path.'images/w_image/'.$data['w_image'];
			array_push($jsonObj,$row);
			
		
		}
			if(!empty($jsonObj)){
				$reponseobj['message'] = 'successful get data';
				$reponseobj['code'] = 200;    
				$reponseobj['data'] =$jsonObj;
			}else{
				$reponseobj['message'] = 'successful get data';
				$reponseobj['code'] = 400;
				$reponseobj['data'] =$jsonObj;
			}
			
		header( 'Content-Type: application/json; charset=utf-8' );
		
	    echo $val= str_replace('\\/', '/', json_encode($reponseobj,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
		die();
}
else if(isset($_GET['remove_to_favorite'])){
	$query="SELECT * FROM tbl_favorite where user_id = '".$_POST['user_id']."' && w_id = '".$_POST['w_id']."'";
	$sql = mysqli_query($mysqli,$query)or die(mysql_error());
	$rowcount=mysqli_num_rows($sql);
	if($rowcount == 1){
		$data = mysqli_fetch_assoc($sql);
		Delete('tbl_favorite','f_id='.$data['f_id'].'');
		$reponseobj['message'] = 'Successfully removed from favorites';
		$reponseobj['code'] = 200;    
		$reponseobj['data'] = array();
	}else{
		$reponseobj['message'] = 'Already removed from favorites';
		$reponseobj['code'] = 200;    
		$reponseobj['data'] = array();
	}
	echo $val= str_replace('\\/', '/', json_encode($reponseobj,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
		die();
}
else if(isset($_GET['top_picks']))
{
      
 		$jsonObj= array();
		$query="SELECT * FROM tbl_web_series where top_picks = '1' && w_status = 1 ORDER BY w_id DESC";
		$sql = mysqli_query($mysqli,$query)or die(mysql_error());
		while($data = mysqli_fetch_assoc($sql))
		{
			$qry="SELECT * FROM tbl_category where cid='".$data['cat_id']."'";

			$result=mysqli_query($mysqli,$qry);

			$cat_row=mysqli_fetch_assoc($result);
			if(isset($cat_row) ){
				$row['category_name'] = $cat_row['category_name'];
			}else{
				$row['category_name'] = '';
			}
			$qry_fv="SELECT * FROM tbl_favorite where w_id='".$data['w_id']."' && user_id='".$_POST['user_id']."' ";
			$result_fv=mysqli_query($mysqli,$qry_fv);
			if(mysqli_num_rows($result_fv) > 0 ){
				$row['is_favorite'] = true;
			}else{
				$row['is_favorite'] = false;
			}
			
			$row['w_id'] = $data['w_id'];
			$row['w_type'] = $data['w_type'];
			$row['w_trailer'] = $data['w_trailer'];
			$row['w_name'] = $data['w_name'];
			$row['w_sub_title'] = $data['w_sub_title'];
			$row['w_description'] = $data['w_description'];
			$row['view_counts'] = $data['view_counts'];
			$row['w_image'] = $file_path.'images/w_image/'.$data['w_image'];
			array_push($jsonObj,$row);
		
		}
			if(!empty($jsonObj)){
				$reponseobj['message'] = 'successful get data';
				$reponseobj['code'] = 200;    
					
				$reponseobj['data'] =$jsonObj;
			}else{
				$reponseobj['message'] = 'successful get data';
				$reponseobj['code'] = 400;
				$reponseobj['data'] =$jsonObj;
			}
			
		header( 'Content-Type: application/json; charset=utf-8' );
		
	    echo $val= str_replace('\\/', '/', json_encode($reponseobj,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
		die();
}



else if(isset($_GET['get_clips']))
{
      
 		$jsonObj= array();
		$query="SELECT * FROM tbl_video where w_id = ".$_POST['w_id']." ORDER BY v_id DESC";
		$sql = mysqli_query($mysqli,$query)or die(mysql_error());
		while($data = mysqli_fetch_assoc($sql))
		{
			
			$row['v_video'] = $data['v_video'];
			$row['is_paid'] = $data['is_paid'];
			$row['w_id'] = $data['w_id'];
			array_push($jsonObj,$row);
		
		}
			if(!empty($jsonObj)){
				$reponseobj['message'] = 'successful get data';
				$reponseobj['code'] = 200;    
					
				$reponseobj['data'] =$jsonObj;
			}else{
				$reponseobj['message'] = 'successful get data';
				$reponseobj['code'] = 400;
				$reponseobj['data'] =$jsonObj;
			}
			
		header( 'Content-Type: application/json; charset=utf-8' );
		
	    echo $val= str_replace('\\/', '/', json_encode($reponseobj,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
		die();
}

else if(isset($_GET['search']))
{
      
 		$jsonObj= array();
		$title = $_POST['title'];
		$query="SELECT * FROM tbl_web_series where w_name like '%$title%' && w_status = 1 ORDER BY w_id DESC limit 9";
		$sql = mysqli_query($mysqli,$query)or die(mysql_error());
		while($data = mysqli_fetch_assoc($sql))
		{
			$qry="SELECT * FROM tbl_category where cid='".$data['cat_id']."'";

			$result=mysqli_query($mysqli,$qry);

			$cat_row=mysqli_fetch_assoc($result);
			if(isset($cat_row) ){
				$row['category_name'] = $cat_row['category_name'];
			}else{
				$row['category_name'] = '';
			}
			$qry_fv="SELECT * FROM tbl_favorite where w_id='".$data['w_id']."' && user_id='".$_POST['user_id']."' ";
			$result_fv=mysqli_query($mysqli,$qry_fv);
			if(mysqli_num_rows($result_fv) > 0 ){
				$row['is_favorite'] = true;
			}else{
				$row['is_favorite'] = false;
			}
			
			$row['w_type'] = $data['w_type'];
			$row['w_trailer'] = $data['w_trailer'];
			$row['w_id'] = $data['w_id'];
			$row['w_name'] = $data['w_name'];
			$row['w_sub_title'] = $data['w_sub_title'];
			$row['w_description'] = $data['w_description'];
			$row['view_counts'] = $data['view_counts'];
			$row['w_image'] = $file_path.'images/w_image/'.$data['w_image'];
			array_push($jsonObj,$row);
		
		}
			if(!empty($jsonObj)){
				$reponseobj['message'] = 'successful get data';
				$reponseobj['code'] = 200;    
					
				$reponseobj['data'] =$jsonObj;
			}else{
				$reponseobj['message'] = 'successful get data';
				$reponseobj['code'] = 400;
				$reponseobj['data'] =$jsonObj;
			}
			
		header( 'Content-Type: application/json; charset=utf-8' );
		
	    echo $val= str_replace('\\/', '/', json_encode($reponseobj,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
		die();
}

else if(isset($_GET['app_terms']))
{
      
 		$jsonObj= array();
		
		$query="SELECT * FROM tbl_settings WHERE id='1'";
		$sql = mysqli_query($mysqli,$query)or die(mysql_error());
		while($data = mysqli_fetch_assoc($sql))
		{
			
			$row['app_terms_conditions'] = $data['app_terms_conditions'];
			array_push($jsonObj,$row);
		
		}
			if(!empty($jsonObj)){
				$reponseobj['message'] = 'successful get data';
				$reponseobj['code'] = 200;    
					
				$reponseobj['data'] =$jsonObj;
			}else{
				$reponseobj['message'] = 'successful get data';
				$reponseobj['code'] = 400;
				$reponseobj['data'] =$jsonObj;
			}
			
		header( 'Content-Type: application/json; charset=utf-8' );
		
	    echo $val= str_replace('\\/', '/', json_encode($reponseobj,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
		die();
}
else if(isset($_GET['privacy_policy']))
{
      
 		$jsonObj= array();
		
		$query="SELECT * FROM tbl_settings WHERE id='1'";
		$sql = mysqli_query($mysqli,$query)or die(mysql_error());
		while($data = mysqli_fetch_assoc($sql))
		{
			
			$row['app_privacy_policy'] = $data['app_privacy_policy'];
			array_push($jsonObj,$row);
		
		}
			if(!empty($jsonObj)){
				$reponseobj['message'] = 'successful get data';
				$reponseobj['code'] = 200;    
					
				$reponseobj['data'] =$jsonObj;
			}else{
				$reponseobj['message'] = 'successful get data';
				$reponseobj['code'] = 400;
				$reponseobj['data'] =$jsonObj;
			}
			
		header( 'Content-Type: application/json; charset=utf-8' );
		
	    echo $val= str_replace('\\/', '/', json_encode($reponseobj,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
		die();
}


else if(isset($_GET['trending']))
{
      
 		$jsonObj= array();
		$query="SELECT * FROM tbl_web_series where trending = '1' && w_status = 1 ORDER BY w_id DESC limit 12";
		$sql = mysqli_query($mysqli,$query)or die(mysql_error());
		while($data = mysqli_fetch_assoc($sql))
		{
			$qry="SELECT * FROM tbl_category where cid='".$data['cat_id']."'";

			$result=mysqli_query($mysqli,$qry);

			$cat_row=mysqli_fetch_assoc($result);
			if(isset($cat_row) ){
				$row['category_name'] = $cat_row['category_name'];
			}else{
				$row['category_name'] = '';
			}
			$row['w_type'] = $data['w_type'];
			$row['w_trailer'] = $data['w_trailer'];
			$row['w_id'] = $data['w_id'];
			$row['w_name'] = $data['w_name'];
			$row['w_sub_title'] = $data['w_sub_title'];
			$row['w_description'] = $data['w_description'];
			$row['view_counts'] = $data['view_counts'];
			$row['w_image'] = $file_path.'images/w_image/'.$data['w_image'];
			array_push($jsonObj,$row);
		
		}
			if(!empty($jsonObj)){
				$reponseobj['message'] = 'successful get data';
				$reponseobj['code'] = 200;    
					
				$reponseobj['data'] =$jsonObj;
			}else{
				$reponseobj['message'] = 'successful get data';
				$reponseobj['code'] = 400;
				$reponseobj['data'] =$jsonObj;
			}
			
		header( 'Content-Type: application/json; charset=utf-8' );
		
	    echo $val= str_replace('\\/', '/', json_encode($reponseobj,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
		die();
}
else if(isset($_GET['recommended']))
{
      
 		$jsonObj= array();
		$query="SELECT * FROM tbl_web_series where recommendation = '1' && w_status = 1 ORDER BY w_id DESC limit 12";
		$sql = mysqli_query($mysqli,$query)or die(mysql_error());
		while($data = mysqli_fetch_assoc($sql))
		{
			$qry="SELECT * FROM tbl_category where cid='".$data['cat_id']."'";

			$result=mysqli_query($mysqli,$qry);

			$cat_row=mysqli_fetch_assoc($result);
			if(isset($cat_row) ){
				$row['category_name'] = $cat_row['category_name'];
			}else{
				$row['category_name'] = '';
			}
			$row['w_type'] = $data['w_type'];
			$row['w_trailer'] = $data['w_trailer'];
			$row['w_id'] = $data['w_id'];
			$row['w_name'] = $data['w_name'];
			$row['w_sub_title'] = $data['w_sub_title'];
			$row['w_description'] = $data['w_description'];
			$row['view_counts'] = $data['view_counts'];
			$row['w_image'] = $file_path.'images/w_image/'.$data['w_image'];
			array_push($jsonObj,$row);
		
		}
			if(!empty($jsonObj)){
				$reponseobj['message'] = 'successful get data';
				$reponseobj['code'] = 200;    
					
				$reponseobj['data'] =$jsonObj;
			}else{
				$reponseobj['message'] = 'successful get data';
				$reponseobj['code'] = 400;
				$reponseobj['data'] =$jsonObj;
			}
			
		header( 'Content-Type: application/json; charset=utf-8' );
		
	    echo $val= str_replace('\\/', '/', json_encode($reponseobj,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
		die();
}

else if(isset($_GET['is_new']))
{
      
 		$jsonObj= array();
		$query="SELECT * FROM tbl_web_series where is_new = '1' && w_status = 1 ORDER BY w_id DESC limit 10";
		$sql = mysqli_query($mysqli,$query)or die(mysql_error());
		while($data = mysqli_fetch_assoc($sql))
		{
			$qry="SELECT * FROM tbl_category where cid='".$data['cat_id']."'";

			$result=mysqli_query($mysqli,$qry);

			$cat_row=mysqli_fetch_assoc($result);
			if(isset($cat_row) ){
				$row['category_name'] = $cat_row['category_name'];
			}else{
				$row['category_name'] = '';
			}
			$row['w_type'] = $data['w_type'];
			$row['w_trailer'] = $data['w_trailer'];
			$row['w_id'] = $data['w_id'];
			$row['w_name'] = $data['w_name'];
			$row['w_sub_title'] = $data['w_sub_title'];
			$row['w_description'] = $data['w_description'];
			$row['view_counts'] = $data['view_counts'];
			$row['w_image'] = $file_path.'images/w_image/'.$data['w_image'];
			array_push($jsonObj,$row);
		
		}
			if(!empty($jsonObj)){
				$reponseobj['message'] = 'successful get data';
				$reponseobj['code'] = 200;    
					
				$reponseobj['data'] =$jsonObj;
			}else{
				$reponseobj['message'] = 'successful get data';
				$reponseobj['code'] = 400;
				$reponseobj['data'] =$jsonObj;
			}
			
		header( 'Content-Type: application/json; charset=utf-8' );
		
	    echo $val= str_replace('\\/', '/', json_encode($reponseobj,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
		die();
}
else if(isset($_GET['is_new']))
{
      
 		$jsonObj= array();
		$query="SELECT * FROM tbl_web_series where is_new = '1' && w_status = 1 ORDER BY w_id DESC limit 10";
		$sql = mysqli_query($mysqli,$query)or die(mysql_error());
		while($data = mysqli_fetch_assoc($sql))
		{
			$qry="SELECT * FROM tbl_category where cid='".$data['cat_id']."'";

			$result=mysqli_query($mysqli,$qry);

			$cat_row=mysqli_fetch_assoc($result);
			if(isset($cat_row) ){
				$row['category_name'] = $cat_row['category_name'];
			}else{
				$row['category_name'] = '';
			}
			$row['w_id'] = $data['w_id'];
			$row['w_type'] = $data['w_type'];
			$row['w_trailer'] = $data['w_trailer'];
			$row['w_name'] = $data['w_name'];
			$row['view_counts'] = $data['view_counts'];
			$row['w_sub_title'] = $data['w_sub_title'];
			$row['w_description'] = $data['w_description'];
			$row['w_image'] = $file_path.'images/w_image/'.$data['w_image'];
			array_push($jsonObj,$row);
		
		}
			if(!empty($jsonObj)){
				$reponseobj['message'] = 'successful get data';
				$reponseobj['code'] = 200;    
					
				$reponseobj['data'] =$jsonObj;
			}else{
				$reponseobj['message'] = 'successful get data';
				$reponseobj['code'] = 400;
				$reponseobj['data'] =$jsonObj;
			}
			
		header( 'Content-Type: application/json; charset=utf-8' );
		
	    echo $val= str_replace('\\/', '/', json_encode($reponseobj,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
		die();
}

//news_list end	


//start sub_quiz_list
else if(isset($_REQUEST['getQuestion']))
{
       
 		$jsonObj= array();
					
		$cat_order=API_CAT_ORDER_BY;
				
		$query="SELECT * FROM question 
				WHERE question.quiz_id='".$_POST['sub_quiz_list']."' ORDER BY question.q_title ASC";
				
		$sql = mysqli_query($mysqli,$query)or die(mysql_error());
		$i = 1;		
		while($data = mysqli_fetch_assoc($sql))
		{
			$row['index_no'] = $i++;
			$row['id'] = $data['q_id'];
			$row['question'] = $data['q_title'];
			$row['type'] = $data['question_type'];
			$row['no_of_choice'] = $data['no_of_answer'];
			
			$no_of_answer = $data['no_of_answer'];
			if($no_of_answer==3)
			{
				$row['Choice_A'] = $data['choice_a'];
				$row['Choice_B'] = $data['choice_b'];
				$row['Choice_C'] = $data['choice_c'];
			}
			else if($no_of_answer==4)
			{
				$row['Choice_A'] = $data['choice_a'];
				$row['Choice_B'] = $data['choice_b'];
				$row['Choice_C'] = $data['choice_c'];
				$row['Choice_D'] = $data['choice_d'];
			}
			else if($no_of_answer==5)
			{
				$row['Choice_A'] = $data['choice_a'];
				$row['Choice_B'] = $data['choice_b'];
				$row['Choice_C'] = $data['choice_c'];
				$row['Choice_D'] = $data['choice_d'];
				$row['Choice_E'] = $data['choice_e'];
			}
			
			$row['answer'] = $data['answer'];
			$row['explanation'] = $data['explanation'];
			$row['quiz_image'] = $file_path.'Qusestion_Images/'.$data['q_thumbnail'];
			
						  			
			array_push($jsonObj,$row);
		
		}
		
		
			
			$reponseobj['message']= 'successful get data';
			$reponseobj['code'] = 200;    
				
			$reponseobj['sub_quiz_list'] =$jsonObj;
			
		header( 'Content-Type: application/json; charset=utf-8' );
		
	    echo $val= str_replace('\\/', '/', json_encode($reponseobj,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
		die();
}
//end sub_quiz_list
else if(isset($_GET['score_store']))
{
	$u_id = $_POST['user_id'];
	$q_id = $_POST['qz_id'];
	$score = $_POST['score'];
	$total_score = $_POST['total_score'];
	$total_time = $_POST['total_time'];
 	$quiz_time = $_POST['quiz_time'];

	$sql = "SELECT * FROM tbl_score WHERE qz_id='$q_id' and user_id='$u_id' ";

    $result=mysqli_query($mysqli,$sql);	   
    $row = mysqli_fetch_array($result);
    $count=mysqli_num_rows($result);

    if($count == 1)
    {
    	
		 		mysqli_query($mysqli,"UPDATE tbl_score SET score = '$score' ,quiz_time = '$quiz_time',total_time = '$total_time',total_score = '$total_score'  WHERE user_id = '$u_id' AND qz_id = '$q_id' ");

		$set['message'] = 'Score updated successfully.';
		$set['code'] = 200; 
    }
    else  
    {
    	
   		 	mysqli_query($mysqli,"insert into tbl_score(qz_id,user_id,quiz_time,score,total_time,total_score) values('".mysqli_real_escape_string($mysqli,$_POST['qz_id'])."','".mysqli_real_escape_string($mysqli,$_POST['user_id'])."','".mysqli_real_escape_string($mysqli,$_POST['quiz_time'])."','".mysqli_real_escape_string($mysqli,$_POST['score'])."','".mysqli_real_escape_string($mysqli,$_POST['total_time'])."','".mysqli_real_escape_string($mysqli,$_POST['total_score'])."')");

			$set['message'] = 'successful insert data';
			$set['code'] = 200; 
    }
		
	header( 'Content-Type: application/json; charset=utf-8' );
    echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
	die();

}

else if(isset($_REQUEST['get_score_detail']))
{
		
		//$jsonObj= array();	

		$user_id = $_POST['user_id'];
		$qz_id = $_POST['qz_id'];
		$i = 0;
	
	    $query="SELECT user_id,qz_id, FIND_IN_SET( score, (SELECT GROUP_CONCAT( score ORDER BY score DESC ) FROM tbl_score )) AS rank FROM tbl_score WHERE user_id = '".$user_id."' AND qz_id = '".$qz_id."' ";

	    $sql = mysqli_query($mysqli,$query)or die(mysqli_error());


		 $query3 = "SELECT * FROM tbl_score WHERE qz_id='".$qz_id."' AND user_id='".$user_id."'";
		 $sql3 = mysqli_query($mysqli,$query3)or die(mysqli_error());

		 
		 $query4 = "SELECT *, FIND_IN_SET( score, (SELECT GROUP_CONCAT( score ORDER BY score DESC ) FROM tbl_score WHERE  qz_id = $qz_id)) AS rank FROM tbl_score WHERE  qz_id = $qz_id ";
		 $sql4 = mysqli_query($mysqli,$query4)or die(mysqli_error());


		 while ( $data = mysqli_fetch_assoc($sql3)) 
		 {
		 	    $row['score'] = $data['score'];
				$row['total_score'] = $data['total_score'];
				$row['total_time'] = $data['total_time'];
	 			$row['quiz_time'] = $data['quiz_time'];
		 }
		 while($data = mysqli_fetch_assoc($sql4))
		{
			if($user_id==$data['user_id'])
			{
				$row['rank'] = $data['rank'];
			}
			$i++;
		
		}
		
		while($data = mysqli_fetch_assoc($sql))
		{
			
			$row['user_id'] = $data['user_id'];
			$row['qz_id'] = $data['qz_id'];		
			
			$row['count']= $i;
			array_push($row);
		
		}

		
			$set['message']= 'Successfully get data';
			$set['code'] = 200;
			
			
			$set['rank_list'] = $row;
		
		header( 'Content-Type: application/json; charset=utf-8' );
	    echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
		die();	
}

//fb register end start
else if(isset($_REQUEST['fb_register']))
{
			$name = $_POST['name'];
			$email = $_POST['email'];
			$phone = $_POST['phone'];			
			$fb_id = $_POST['fb_id'];
			$image = $_POST['image'];

	
	 	$qry = "SELECT * FROM user WHERE fb_id = '".$_POST['fb_id']."'"; 
	 	
		$result = mysqli_query($mysqli,$qry);
		$row = mysqli_fetch_assoc($result);
		 $count=mysqli_num_rows($result);
		
		 if($count == 1)
		{
			
			mysqli_query($mysqli,"UPDATE user SET name = '$name' ,
									email = '$email',				
									fb_id = '$fb_id' WHERE fb_id = '$fb_id' ");

			
				$set['message'] = 'Successful update data';
				$set['code'] = 200; 
				$set['userId'] = $row['id'];
				$set['userName'] = $row['name'];
				$set['userEmail'] = $row['email'];
				$set['userPhone'] = $row['phone'];
				$set['userImage'] = $row['image'];
				
				
		}
		
		else if($row['email']!="")
		{
 				
			mysqli_query($mysqli,"UPDATE user SET name = '$name' ,
									email = '$email',								
									fb_id = '$fb_id' WHERE fb_id = '$fb_id' ");


				$set['message'] = 'Successful update data';
				$set['code'] = 200; 
				$set['userId'] = $row['id'];
				$set['userName'] = $row['name'];
				$set['userEmail'] = $row['email'];
				$set['userPhone'] = $row['phone'];
				$set['userImage'] = $row['image'];
				
		}
		else if($row['fb_id']!="")
		{
 				
			mysqli_query($mysqli,"UPDATE user SET name = '$name' ,
									email = '$email',								
									fb_id = '$fb_id' WHERE fb_id = '$fb_id' ");


			
				$set['message'] = 'Successful update data';
				$set['code'] = 200; 
				$set['userId'] = $row['id'];
				$set['userName'] = $row['name'];
				$set['userEmail'] = $row['email'];
				$set['userPhone'] = $row['phone'];
				$set['userImage'] = $row['image'];
				
		}
		else
		{ 
				$data = array(
 					'user_type'=>'Facebook',											 
				    'name'  => $_POST['name'],				    
					'email'  =>   $_POST['email'],
					'phone'  =>   $_POST['phone'],					
					'fb_id'  =>  $_POST['fb_id'],
					'image'  =>   $_POST['image']
					);		
 			 
			$qry = Insert('user',$data);	

			$user_id=mysqli_insert_id($mysqli);									 
			
			$qry1 = "SELECT * FROM user WHERE id = '".$user_id."'"; 
		    $result1 = mysqli_query($mysqli,$qry1);
		    $row1 = mysqli_fetch_assoc($result1);
			
			$set['message'] = 'Register successfully';
			$set['code'] = 200;
			
			$set['userId'] = $row1['id'];
			$set['userName'] = $row1['name'];
			$set['userEmail'] = $row1['email'];
			$set['userPhone'] = $row1['phone'];
			$set['userImage'] = $row1['image'];
				
			
		}
  
 	 header( 'Content-Type: application/json; charset=utf-8');
 	 echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
		die();
}
//fb register end

//user register start
else if(isset($_REQUEST['registerUser']))
{
		
		$qry = "SELECT * FROM user WHERE fb_id = '".$_POST['social_id']."'"; 
		$result = mysqli_query($mysqli,$qry);
		$row = mysqli_fetch_assoc($result);
		
		 if($row['fb_id']!="")
		{
			$image_url= $_POST['image_url'];
			
			if($_POST['user_type'] != 'apple'){
				$data = array(
					'user_type'=> $_POST['user_type'],
					'name'  => $_POST['name'],	
					'fb_id'  => $_POST['social_id'],
					'email'  =>  $_POST['email'],
					'password'  =>  '',
					'phone'  =>  "",
					'token'=>  $_POST['token'],
					'image'  =>  $image_url
				);
				
				$category_edit=Update('user', $data, "WHERE id = '".$row['id']."'");
			}
			$qry = "SELECT * FROM user WHERE fb_id = '".$_POST['social_id']."'"; 
			$result = mysqli_query($mysqli,$qry);
			$row = mysqli_fetch_assoc($result);
			
			
			$userCoins = 0;
			$jsonObj= array();
			$query_points="SELECT * FROM tbl_transections where user_id = '".$row['id']."'";
			$sql_points = mysqli_query($mysqli,$query_points)or die(mysql_error());
			if (mysqli_num_rows($sql_points) == 0) {
				while($data_urd = mysqli_fetch_assoc($sql_points))
				{
					$userCoins = $userCoins + $data_urd['coins'];
				}
			}
			
			$set['message'] = 'User Already Register';
			$set['code'] = 200;
			$set['code'] = 403;
			$set['data'] = array();
			$set['data']['userId'] = $row['id'];
			$set['data']['userName'] = $row['name'];
			$set['data']['userEmail'] = $row['email'];
			$set['data']['userPhone'] = $row['phone'];
			$set['data']['userImage'] = $row['image'];
			$set['data']['userCoins'] = $userCoins;
			
		}
		else
		{
 			 	
			$image_url= $_POST['image_url'];
		    $data = array(
				'user_type'=> $_POST['user_type'],
				'name'  => $_POST['name'],	
				'fb_id'  => $_POST['social_id'],
				'email'  =>  $_POST['email'],
				'password'  =>  '',
				'phone'  =>  "",
				'token'=>  $_POST['token'],
				'udid'=>  $_POST['udid'],
				'image'  =>  $image_url
			);	
 			 
			$qry = Insert('user',$data);
			
			$user_id=mysqli_insert_id($mysqli);			
			if($_POST['addedBonus'] != 0 && $_POST['user_type'] == 'Facebook'){
				
				$data_tr = array(
 					'type'=> 'Facebook Login Bonus',
				    'coins'  => $_POST['addedBonus'],
					'user_id'  =>  $user_id,
					'transection_id'  =>  $_POST['social_id']
				);		
 			 
			$qry_re = Insert('tbl_transections',$data_tr);	
				
			}
			
			
			$data_tr = array(
				'token'  => $_POST['token'],
				'udid'  => $_POST['udid'],
				'login_status'  => 1,
				'user_id'  =>  $user_id,
			);	
			
			$qry_re = Insert('user_login',$data_tr);	
			
			$data_user = array('is_login'  =>  1);
		
			$edit_status=Update('user', $data_user, "WHERE id = '".$user_id."' ");	
			$userCoins = 0;
			$jsonObj= array();
			$query_points="SELECT * FROM tbl_transections where user_id = '".$user_id."'";
			$sql_points = mysqli_query($mysqli,$query_points)or die(mysql_error());
			if (mysqli_num_rows($sql_points) > 0) {
				while($data_urd = mysqli_fetch_assoc($sql_points))
				{
					$userCoins = $userCoins + $data_urd['coins'];
				}
			}
			$qry1 = "SELECT * FROM user WHERE id = '".$user_id."'"; 
		    $result1 = mysqli_query($mysqli,$qry1);
		    $row1 = mysqli_fetch_assoc($result1);
			
			$set['message'] = 'Register successfully';
			$set['code'] = 200;
			$set['data']['userId'] = $row1['id'];
			$set['data']['userName'] = $row1['name'];
			$set['data']['userEmail'] = $row1['email'];
			//$set['data']['userPhone'] = $row1['phone'];
			$set['data']['userCoins'] = $userCoins;
			$set['data']['userImage'] = $row1['image'];
		
		}

	  
 	 header('Content-Type: application/json; charset=utf-8');
     $json = json_encode($set);				
	 echo $json;
	 exit;
	 
}
//user register end
// user login start
else if(isset($_REQUEST['login']))
{
		
		$myusername = $_POST['email'];
		$mypassword = md5($_POST['password']);
		
 		$qry = "SELECT * FROM user WHERE email = '$myusername' and password = '$mypassword' and status='1'"; 
		$result = mysqli_query($mysqli,$qry);
		$num_rows = mysqli_num_rows($result);
		$row = mysqli_fetch_assoc($result);
		
    if ($num_rows > 0)
		{ 

					$query="UPDATE user SET token= '".$_POST['deviceId']."' WHERE id= '".$row['id']."'";
					$result = mysqli_query($mysqli,$query);
				
					$set['message'] = 'Login successfully';
					$set['code'] = 200; 
					$set['userId'] = $row['id'];
					$set['userName'] = $row['name'];
					$set['userEmail'] = $row['email'];
					$set['userPhone'] = $row['phone'];
					$set['userImage'] = $row['image'];
					
			 
		}		 
		else
		{
				 $set['message'] = 'Your username or password incorrect otherwise your account block.';
				 $set['code'] = 404; 
 				
		}
	 

	header( 'Content-Type: application/json; charset=utf-8' );
	$json = json_encode($set);
	echo $json;
	 exit;
}
//user login end

else if(isset($_REQUEST['update_profile']))
{
	$file_path = 'http://'.$_SERVER['SERVER_NAME'] . dirname($_SERVER['REQUEST_URI']).'/';

		$name = $_POST['name'];
		$email = $_POST['email'];
		$phone  =  $_POST['phone'];
		$image = $_POST['image'];		
		$id = $_POST['user_id'];
		
		if($_FILES['image']['name']!='')
        {

        	   $file_name= str_replace(" ","-",$_FILES['image']['name']);             
               $image=$file_name;
         
               //Main Image
               $tpath1='images/registrationimage/'.$image;       
               $pic1=compress_image($_FILES["image"]["tmp_name"], $tpath1, 80);           
               
               $image=$file_path.'images/registrationimage/'.$image;
        }
        else
        {
        	$image=$row['image'];
			
        }
		
		if($name!="")
		{
			mysqli_query($mysqli,"UPDATE user SET name ='$name' WHERE id = $id");
			 
		}
		
		if($_POST['email']!="")
		{
			mysqli_query($mysqli,"UPDATE user SET email ='$email' WHERE id = $id");
			 
		}
		if($_POST['phone']!="")
		{
			mysqli_query($mysqli,"UPDATE user SET phone ='$phone' WHERE id = $id");
			 
		}
		
		if($_POST['password']!="")
		{
			mysqli_query($mysqli,"UPDATE user SET password ='$password' WHERE id = $id");
				 
		}
		
		if($_FILES['image']['name']!='')
		{
			
			mysqli_query($mysqli,"UPDATE user SET image ='$image' WHERE id = $id");
			
		}
	
	
			$user_res = mysqli_query($mysqli,$user_edit);
			
			$qry1 = "SELECT * FROM user WHERE id = $id"; 
			
		    $result1 = mysqli_query($mysqli,$qry1);
		    $row1 = mysqli_fetch_assoc($result1);
 			
			$set['message'] = 'Your profile updated successfully.';
			$set['code'] = 200;	 
			$set['userId'] = $row1['id'];
			$set['userName'] = $row1['name'];
			$set['userEmail'] = $row1['email'];
			$set['userPhone'] = $row1['phone'];
			$set['userImage'] = $row1['image'];

	header( 'Content-Type: application/json; charset=utf-8' );
	$json = json_encode($set);
	echo $json;
	exit;
}
//user profile update end
//user profile start
else if(isset($_REQUEST['get_profile']))
{
		$user_id = $_POST['user_id'];
		$qry1 = "SELECT * FROM user WHERE id = '".$user_id."'"; 
		$result1 = mysqli_query($mysqli,$qry1);
		$num_rows = mysqli_num_rows($result1);
		$row1 = mysqli_fetch_assoc($result1);
		if ($num_rows > 0)
		{

			$userCoins = 0;
			$jsonObj= array();
			$query_points="SELECT * FROM tbl_transections where user_id = '".$user_id."'";
			$sql_points = mysqli_query($mysqli,$query_points)or die(mysql_error());
			if (mysqli_num_rows($sql_points) > 0) {
				while($data_urd = mysqli_fetch_assoc($sql_points))
				{
					$userCoins = $userCoins + $data_urd['coins'];
				}
			}
			$set['message'] = 'account fetch successfully';
			$set['code'] = 200;
			$set['data']['userId'] = $row1['id'];
			$set['data']['userName'] = $row1['name'];
			$set['data']['userEmail'] = $row1['email'];
			$set['data']['userPhone'] = $row1['phone'];
			$set['data']['userCoins'] = $userCoins;
			$set['data']['userImage'] = $row1['image'];
		}else{
			$set['message'] = 'Account not found';
			$set['code'] = 404; 
		}
   							
			
			  
	header( 'Content-Type: application/json; charset=utf-8' );
	$json = json_encode($set);
	echo $json;
	 exit;
}
//user profile end
//user forget password start
else if(isset($_REQUEST['forgot_password']))
{
		$host = $_SERVER['HTTP_HOST'];
		preg_match("/[^\.\/]+\.[^\.\/]+$/", $host, $matches);
        $domain_name=$matches[0];
         
	 	 
		$qry = "SELECT * FROM user WHERE email = '".$_POST['email']."'"; 
		$result = mysqli_query($mysqli,$qry);
		$row = mysqli_fetch_assoc($result);
		
		if($row['email']!="")
		{
 
			$to = $_POST['email'];
			// subject
			$subject = ''.APP_NAME.' password';
 			
			$message='Dear '.$row['name'].'
					 Thank you for using:- '.APP_NAME.'
					 Your password is:- '.$row['password'].'.';
			 
			 
			$headers = 'MIME-Version: 1.0' . "\r\n";
			$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
			
			$headers = "From:test_user@bytotech.com \r\n";
			// Mail it
			@mail($to, $subject, $message, $headers);
		  	$set['message'] = 'Successful send your password';
			$set['code'] = 200;    	  
			//$set['forget_password']=array('success'=>'1');
			
		}
		else
		{  	 
			$set['message'] = 'Your email is not exist';
			$set['code'] = 404; 	
							
		}

 	 header( 'Content-Type: application/json; charset=utf-8');
     $json = json_encode($set);				
	 echo $json;
	 exit;
	 
}
//user forget password end
//password change start
else if(isset($_REQUEST['change_password']))
{
	
		$oldpass=md5($_POST['old_password']);
		$newpassword=md5($_POST['new_password']);
		$id=($_POST['id']);
		
		$sql=mysqli_query($mysqli,"SELECT password FROM user where password='$oldpass' AND id = $id");
		$num=mysqli_fetch_array($sql);
		if($num>0)
		{
			 
			 mysqli_query($mysqli,"UPDATE user SET password ='$newpassword' WHERE id = $id");
			  
			$set['message'] = "Password Changed Successfully !!";
			$set['code'] = 200;
			
		}
		else
		{
			$set['message'] = "Old Password does not match !!";
			$set['code'] = 404;
			
		}
		
		header( 'Content-Type: application/json; charset=utf-8' );
	    echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
		die();
}
//password change end

//aboutus_detail start	
else if(isset($_GET['aboutus_detail']))
{
       
 		//$jsonObj= array();
					
		$cat_order=API_CAT_ORDER_BY;
				
		$query="SELECT * FROM tbl_aboutus ORDER BY id DESC";
		$sql = mysqli_query($mysqli,$query)or die(mysql_error());
				
		while($data = mysqli_fetch_assoc($sql))
		{
			
			$row['description'] = $data['description'];
			
			//array_push($jsonObj,$row);
			array_push($row);
		
		}
		
			
			$reponseobj['message'] = 'successful get data';
			$reponseobj['code'] = 200;    
				
			$reponseobj['aboutus_detail'] =$row;
			
		header( 'Content-Type: application/json; charset=utf-8' );
		
	    echo $val= str_replace('\\/', '/', json_encode($reponseobj,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
		die();
}	
//aboutus_detail end
//contactus_detail start	
else if(isset($_GET['contactus_detail']))
{
       
 		//$jsonObj= array();
					
		$cat_order=API_CAT_ORDER_BY;
				
		$query="SELECT * FROM tbl_contactus ORDER BY id DESC";
		$sql = mysqli_query($mysqli,$query)or die(mysql_error());
				
		while($data = mysqli_fetch_assoc($sql))
		{
			
			$row['address'] = $data['address'];
			$row['lattitude'] = $data['lattitude'];
			$row['longitude'] = $data['longitude'];
			$row['email'] = $data['email'];
			$row['mobile_number'] = $data['mobile_number'];
			$row['landline_number'] = $data['landline_number'];
			$row['skype'] = $data['skype'];
			
			//array_push($jsonObj,$row);
			array_push($row);
		
		}
		
			
			$reponseobj['message'] = 'successful get data';
			$reponseobj['code'] = 200;    
				
			$reponseobj['contactus_detail'] =$row;
			
		header( 'Content-Type: application/json; charset=utf-8' );
		
	    echo $val= str_replace('\\/', '/', json_encode($reponseobj,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
		die();
}	
//contactus_detail end
//notification_list start	
else if(isset($_GET['notification_list']))
{
       
 		$jsonObj= array();
					
		$cat_order=API_CAT_ORDER_BY;
				
		$query="SELECT * FROM tbl_notification ORDER BY id DESC";
		$sql = mysqli_query($mysqli,$query)or die(mysql_error());
				
		while($data = mysqli_fetch_assoc($sql))
		{
			
			$row['notification_title'] = $data['title'];
			$row['description'] = $data['description'];
					
			array_push($jsonObj,$row);
		
		}
		
			
			$reponseobj['message'] = 'successful get data';
			$reponseobj['code'] = 200;    
				
			$reponseobj['notification_list'] =$jsonObj;
			
		header( 'Content-Type: application/json; charset=utf-8' );
		
	    echo $val= str_replace('\\/', '/', json_encode($reponseobj,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
		die();
}	
//notification_list end
//chatroom create  start
else if(isset($_REQUEST['chatroomCreate']))
{
	require_once 'DbOperation.php';
	require_once 'Firebase.php';
	require_once 'Push.php'; 
  
 	$name = $_POST['chatRoomtitle'];
 	$user_id = $_POST['userId'];
	
    $result=mysqli_query($mysqli,$sql);	   
    $row = mysqli_fetch_array($result);
   
		$data = array(
			'name'  => $_POST['chatRoomtitle'],					
			'user_id'  => $_POST['userId'],					
			
			);		
 			 
			$qry = Insert('chat_rooms',$data);									 
			
			$set['message'] = 'successful create chatroom';
			$set['code'] = 200;
			
	header( 'Content-Type: application/json; charset=utf-8' );
    echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
	die();
}
//chatroom create end
//chatroom title list start
else if(isset($_REQUEST['chatRoom']))
{
		require_once 'DbOperation.php';
		require_once 'Firebase.php';
		require_once 'Push.php'; 
 
 		$jsonObj= array();
								
		$query="SELECT * FROM chat_rooms ORDER BY chat_room_id DESC";
		
		$sql = mysqli_query($mysqli,$query)or die(mysql_error());
		
			while($data = mysqli_fetch_assoc($sql))
			{
				$row['chatRoomid'] = $data['chat_room_id'];  			
				$row['topic'] = $data['name'];  			
				$row['status'] = $data['status'];  			
				array_push($jsonObj,$row);
				
				$reponseobj['message'] = 'successful get data';
				$reponseobj['code'] = 200;    		
				$reponseobj['chatroom'] =$jsonObj;
			
			}
		
			
		header( 'Content-Type: application/json; charset=utf-8' );
		
	    echo $val= str_replace('\\/', '/', json_encode($reponseobj,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
		die();
}
//chatroom title list end

//insert message list
else if(isset($_REQUEST['chatroomMessage']))
{
	require_once 'DbOperation.php';
	require_once 'Firebase.php';
	require_once 'Push.php'; 
  
		$jsonObj0= array();			
		
		$query1="SELECT * FROM chat_rooms WHERE chat_rooms.chat_room_id='".$_POST['chatroomMessage']."' AND chat_rooms.status = '".$_POST['status']."'";
		$result2 = mysqli_query($mysqli,$query1)or die(mysqli_error());
		$data = mysqli_fetch_assoc($result2);
		
		if($data['status'] == 1)
		{
			$query="SELECT * FROM messages
					LEFT JOIN chat_rooms ON chat_rooms.chat_room_id= messages.chat_room_id
					LEFT JOIN user ON user.id = messages.user_id
					WHERE messages.chat_room_id='".$_POST['chatroomMessage']."' ORDER BY messages.message_id DESC";
					
		
			    $result1 = mysqli_query($mysqli,$query)or die(mysqli_error());
				while ($row1 = mysqli_fetch_assoc($result1)) 
				{
					$sql="SELECT * FROM messages WHERE message_id='". $row1['message_id']."'";
					$result = mysqli_query($mysqli,$sql)or die(mysqli_error());

					while($data=mysqli_fetch_assoc($result))
					{
						$catArr['time'] = $data['created_at'];	

					}

					$catArr['message'] = $row1['message'];	
					$catArr['messageId'] = $row1['message_id'];	
					$catArr['userId'] = $row1['id'];	
					$catArr['name'] = $row1['name'];	
					
					
					array_push($jsonObj0,$catArr);
					
					$set['message'] = 'successful get data';
					$set['code'] = 200; 						
					$set['messageList'] =$jsonObj0;
										
				}			
				
		}
		else
		{
					$set['message'] = 'Chatroom is disable';
					$set['code'] = 404; 	
		}
			
		header( 'Content-Type: application/json; charset=utf-8' );
	    echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
		die();

}
//insert message list end
//insert message start	
else if(isset($_REQUEST['message']))
{
	
require_once 'Firebase.php';
require_once 'DbOperation.php';
require_once 'Push.php'; 

$sql = "SELECT * FROM messages WHERE message_id = '".$_POST['user_id']."'"; 
$result=mysqli_query($mysqli,$sql);	   
$row = mysqli_fetch_array($result);
 
date_default_timezone_set("Asia/Kolkata");
$current_date = date("Y-m-d H:i:s");

$data = array(

		'chat_room_id'  => $_POST['chatRoomid'],					
		'user_id'  => $_POST['userId'],	
		'message'  =>  $_POST['message'],
		'created_at'=>$current_date,
		
		);		
	 
	$qry = Insert('messages',$data);
	
	$user_id=$_POST['userId'];	
	$sql1="select * from chat_rooms WHERE chat_room_id= '".$_POST['chatRoomid']."'";
	
	$sql = mysqli_query($mysqli,$sql1)or die(mysql_error());
	
	while($data = mysqli_fetch_assoc($sql))
	{		
		$temp = array($data['user_id']);
		
		$userId=implode(',',$temp);
		
		$listuserid=explode(',',$userId);
		
		unset($data1);
		
		$isIdPresetnt = false;
		foreach($listuserid as $id)
		{
			if($id == $_POST['userId'])
			{
				
				$isIdPresetnt = true;
				break;
			}
			else if($id != $_POST['userId'])
			{
				$isIdPresetnt = false;
			}
		}
		if($isIdPresetnt)
		{
			$query="UPDATE chat_rooms SET user_id= '".$data['user_id']."' WHERE chat_room_id= '".$_POST['chatRoomid']."'";
				$result = mysqli_query($mysqli,$query);
		}else{
			$query="UPDATE chat_rooms SET user_id= '".$data['user_id'].",".$_POST['userId']."' WHERE chat_room_id= '".$_POST['chatRoomid']."'";
				$result = mysqli_query($mysqli,$query);
		}
		array_push($jsonObj,$row);		
	}			 
	$sql1="select * from chat_rooms WHERE chat_room_id= '".$_POST['chatRoomid']."'";
	
	$sql = mysqli_query($mysqli,$sql1)or die(mysql_error());
	$isFirst =false;
	$register_id =array();
	$title="";
	while($data = mysqli_fetch_assoc($sql))
	{		
		$temp = array($data['user_id']);
		$title = $data['name'];
		
		$userId=implode(',',$temp);
		
		$listuserid=explode(',',$userId);
		
		unset($data1);
		
		foreach($listuserid as $id)
		{
			if($id == $_POST['userId'])
			{
			}
			else if($id != $_POST['userId'])
			{
				$sql1="select token from user WHERE id= '".$id."'";
				$sql = mysqli_query($mysqli,$sql1)or die(mysql_error());
				while($data = mysqli_fetch_assoc($sql)){
					array_push($register_id,$data['token']);
				
				}
			}
		}

		$push = null; 
		
		if(isset($_POST['image']))
		{
			$push = new Push(
					$title,
					$_POST['message'],
					$_POST['image']
				);
		}
		else
		{
			
			$push = new Push(
					$title,
					$_POST['message'],
					null
				);
		}

		 $res = array();
        $res['title'] = $title;
        $res['message'] = $message;
        $res['image'] = $image;
       
		$mPushNotification = $push->getPush(); 
		$firebase = new Firebase(); 
  
		sendGCM($title,$_POST['message'], $register_id);
	
		$user_id=mysqli_insert_id($mysqli);	
		$qry1 = "SELECT * FROM messages WHERE message_id = '".$user_id."' ORDER BY messages.message_id DESC"; 
		$result1 = mysqli_query($mysqli,$qry1);
		$row1 = mysqli_fetch_assoc($result1);
		
		$set['message'] = 'successful insert message';
		$set['code'] = 200;
		$set['chatroomId'] = $row1['chat_room_id'];
		$set['userId'] = $row1['user_id'];
		$set['Message'] = $row1['message'];
						
	}	
	header( 'Content-Type: application/json; charset=utf-8' );
    echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
	die();

}	
//insert message end
else 
{
		$jsonObj= array();	

		$query="SELECT * FROM tbl_settings WHERE id='1'";
		$sql = mysqli_query($mysqli,$query)or die(mysqli_error());

		while($data = mysqli_fetch_assoc($sql))
		{
			 
			$row['app_name'] = $data['app_name'];
			$row['app_logo'] = $data['app_logo'];
			$row['app_version'] = $data['app_version'];
			$row['app_author'] = $data['app_author'];
			$row['app_contact'] = $data['app_contact'];
			$row['app_email'] = $data['app_email'];
			$row['app_website'] = $data['app_website'];
			$row['app_description'] = stripslashes($data['app_description']);
 			$row['app_developed_by'] = $data['app_developed_by'];

			$row['app_privacy_policy'] = stripslashes($data['app_privacy_policy']); 	

			array_push($jsonObj,$row);		
		}

		$set['quiz'] = $jsonObj;
		
		header( 'Content-Type: application/json; charset=utf-8' );
	    echo $val= str_replace('\\/', '/', json_encode($set,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
		die();	
}
function sendGCM($title,$message, $id) 
{
		$notification_data =$id; //get all id from table
            if($notification_data != NULL)
			{
                foreach ($notification_data as $notification_data_row) 
				{
                    $registrationIds = $notification_data_row;
			
                #prep the bundle
                    $msg = array
                        (
                        'body'  => 'body msg',
                        'title' => 'title',
                        'icon'  => 'myicon',
                        'sound' => 1,
                        'vibrate' => 1
                        );
                    
						$fields = array
							(
								'to' 	=> $registrationIds,
								'notification'	=> array (
										"title" => $title,
										"body" => $message
								)
							);
						
						//print_r($fields);exit;
                    $headers = array
                        (
							'Authorization: key=' . "AIzaSyAh9bZcsFUvR4zA9rW8nq7C4Vko_uFPwmg",
							'Content-Type: application/json'
                        );
                #Send Reponse To FireBase Server
                    $ch = curl_init();
                    curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
                    curl_setopt( $ch,CURLOPT_POST, true );
                    curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
                    curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
                    curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
                    curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );

                    $result = curl_exec ( $ch );
                    // echo "<pre>";print_r($result);exit;
                    curl_close ( $ch );
                }
            }
}		

?>