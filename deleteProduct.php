<?php session_start();
	 
	 $con = mysqli_connect("localhost","root","","grocerysite");
	 
	 if(!$con) 
	 {
		die("Sorry !!! we are facing technical issue"); 
	 }
	 
	 $sql = "DELETE FROM `tblgoods` WHERE `tblgoods`.`productID` = ".$_GET["productID"];	 
	 
	 if(mysqli_query($con,$sql))
	 {
		 header('Location:viewProducts.php');
	 }
?>
