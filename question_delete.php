<?php

   include("connection.php");
    
    $id = $_GET['id'];
    
    $sql = "delete FROM question where q_id = '$id'";
     
    $result = mysqli_query($con, $sql);
    
    if ($result) 
    {
        echo 'Successful inserts: ' . mysqli_affected_rows($con);
        header('Location: quiz_index.php');   
    }
    else
    {
        echo 'query failed: ' . mysqli_error($con);  
    }

?>