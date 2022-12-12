<?php session_start();
    $con =mysqli_connect("localhost","root","","grocerysite");
                
    if(!$con) 
    {
        die("Cannot connect with DB server"); 
    }

    if(isset($_POST["addToCartSubmit"]))
    {
        $sql="INSERT INTO `tblcart` (`productID`, `email`, `cartID`) VALUES ('".$_POST["productID"]."','".$_POST["userEmail"]."',NULL);";

        if(mysqli_query($con,$sql))
        {
           header('Location:menu.php');
        }
        else
        {
            echo "can't add to cart";
        }
    }
?>