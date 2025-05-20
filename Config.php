<?php 

if($_SERVER['HTTP_HOST']=="localhost" or $_SERVER['HTTP_HOST']=="192.168.1.23" or $_SERVER['HTTP_HOST']=="192.168.1.16" or $_SERVER['HTTP_HOST']=="150.129.150.83")
{
	DEFINE ('DB_USER', 'bytotkyt_enquiz');
	 DEFINE ('DB_PASSWORD', 'ozn^hx][Jk!w');
	 DEFINE ('DB_HOST', 'localhost'); //host name depends on server
	 DEFINE ('DB_NAME', 'bytotkyt_envatoquiz');

	//defined a new constant for firebase api key
	
	define('FIREBASE_API_KEY', 'AIzaSyAh9bZcsFUvR4zA9rW8nq7C4Vko_uFPwmg');
	//define('FIREBASE_API_KEY', 'AAAAdOM7Idc:APA91bEWMLzSp1YFaoCLRf5o4el0mSYa2-MTcbkPP3rNpB2TGilnvcpawI3ZHEvfc-JtZ-rIBclLDBWZiCUyod-zRNvxYrPKxgFsxRGl_tXUtQxV9cI3huE5KQNymNknUKE8qDjJf5VZ');
	
}
?>