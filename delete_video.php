<?php 
require("includes/function.php");
include("includes/header.php");
if(isset($_GET['id']))
{

	$cat_res=mysqli_query($mysqli,'SELECT * FROM tbl_video WHERE v_id=\''.$_GET['id'].'\'');

	$cat_res_row=mysqli_fetch_assoc($cat_res);

	if($cat_res_row['v_video']!="")
	{
	   @unlink('images/w_video/'.$cat_res_row['v_video']);
	}
	Delete('tbl_video','v_id='.$_GET['id'].'');
	echo "deleted ".$cat_res_row['v_video']." ".$_GET['id'];
}
	
?>