<?php session_start();
 if(isset($_POST["btnSubmit"]))
 {
	 $userName = $_POST["txtEmail"];
	 $password = $_POST["txtPassword"];
	 
	 $con = mysqli_connect("localhost","root","","grocerysite");
	 
	 if(!$con) 
	 {
		die("Sorry !!! we are facing technical issue"); 
	 }
	 
	 $sql = "SELECT * FROM `tbluser` WHERE `email` = '".$userName."' and `password` = '".$password."'";
	 
	 $result = mysqli_query($con,$sql);	 
	 
	 if(mysqli_num_rows($result)>0)
	 {

		$row=mysqli_fetch_assoc($result);
		$user_type = $row['type'];

		if($user_type==1){
			$_SESSION["adminName"] = $userName;
			header('Location:adminAccount.php');
		}
		elseif($user_type==0){
			$_SESSION["userName"] = $userName;
			header('Location:home.php');
		}
	 }
	 else
	 {
		  header('Location:login.php');
	 } 
 }
?>
