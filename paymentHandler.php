<?php

    $con =mysqli_connect("localhost","root","","grocerysite");
                
    if(!$con) 
    {
        die("Cannot connect with DB server"); 
    }

    for($i=0;$i<sizeof($_POST['price']);$i++)
    {
        $sql1="INSERT INTO `tblorder`(`email`, `qty`, `productName`, `date`) VALUES('".$_POST['email']."','".$_POST['qty'][$i]."','".$_POST['productName'][$i]."',CURDATE());";

        mysqli_query($con,$sql1);        
    }
    
    //add total to user table
    $sql2="UPDATE `tbluser` SET `total`='".$_POST['total']."' WHERE `email`='".$_POST['email']."';";
    mysqli_query($con,$sql2); 

    //remove cart items from cart table
    $sql3="DELETE FROM `tblcart` WHERE `email` = '".$_POST['email']."';";
    mysqli_query($con,$sql3); 


    header('Location:menu.php');

?>