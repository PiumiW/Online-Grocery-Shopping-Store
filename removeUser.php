<?php
    $con =mysqli_connect("localhost","root","","grocerysite");
    
    if(!$con) 
    {
        die("Cannot connect with DB server"); 
    }


    $sql="DELETE FROM `tbluser` WHERE  `email` = '".$_GET["email"]."';";

    if(mysqli_query($con,$sql))
    {
        header('Location:manageUsers.php');
    }
    else
    {
        echo "can't remove user";
    }

?>