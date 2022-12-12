<?php session_start();
   
  $con = mysqli_connect("localhost","root","","grocerysite");

    if(!$con) 
	 {
		die("Cannot connect to DB server."); 
	 }
        $productname = $_POST["txtName"];
        $price = $_POST["price"];
    

		if(!file_exists($_FILES['imageFile']['tmp_name']) || 
		   !is_uploaded_file($_FILES['imageFile']['tmp_name']))
		{
			$image = $_SESSION["imagePath"];
		}
		else
		{
			$image = "images/products".basename($_FILES["imageFile"]["name"]);
	        move_uploaded_file($_FILES["imageFile"]["tmp_name"],$image);
		}
	
	 
	 if(!$con) 
	 {
		die("Sorry !!! we are facing technical issue"); 
	 }
	 
	 $sql = "UPDATE `tblgoods` SET `name` = '".$productname."',  `imagePath` = '".$image."', `price` = '".$price."' WHERE `tblgoods`.`productID` = ".$_SESSION["productID"].";";
	  
	 if(mysqli_query($con,$sql))	
	 {
		 header('Location:viewProducts.php');
	 }
?>