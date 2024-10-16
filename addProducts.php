<?php session_start();
if(!isset($_SESSION["adminName"]))
{   
    
	header('Location:login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>add product</title>
    <style>
    html{
        font-size: 16px;
    }
    *{
        padding: 0;
        margin: 0;
        box-sizing: border-box;
        font-family: 'Manrope', sans-serif;
    }

    body{
        background: #f6f5f7;
    }

    /* nav bar customization*/

    .logo-image{
        display: block;
        width: 5rem;
        padding: 0.5rem;
    }
    .logo-name{
        font-size: 1.5rem;
        font-weight: 700;
    }
    .logo{
        display: flex;
        align-items: center;
    }
    .navbar{
        display: flex;
        background-color:gold;
        justify-content: space-between;
        align-items: center;
        position: fixed;
        width: 100%;
    }
    .nav-links{
        height: 100%;
    }
    .nav-links ul{ 
        list-style: none;
        display: flex;

    }
    .nav-links li a{
        font-size: 1.1rem;
        display: block;
        text-decoration: none;
        padding: 1.6em ;
        color: black;
        font-weight: 500;
    }

    img{
        display: block;
    }

    .link-wrapper{
        background-color: rgb(255,165,0);
        border-radius:0.5em ;
        align-self: center;
        margin: 0.5em;
    }
    
    /*hamburger button customization*/
    .check{
        display: none;
    }

    .button .button-img{
        height: 30px;
        width: 30px;
    }

    .button{
        position: absolute;/* this will psuh button to top*/
        display: none;
        top:1rem;
        right: 1rem;
    }

    /*buttons hover*/
    .nav-links a:hover{
        background-color:burlywood;
    }
    .link-wrapper a:hover{
        background-color:burlywood;
        border-radius: 0.5em;
    }

    /*body content */
    main{
    display: flex;
    justify-content: center;
    width: 100%;
    padding:5em 0.5em 0 0.5em;
    }

    /*Product form */
    h2{
        margin-bottom: 1em;
        text-align: center;
    }
    form{
        display: flex;
        flex-direction: column;
    }
    form>*{
        padding: 0.3em 0.3em ;
        margin-bottom: 0.3em;
        display: block;
        font-size: 1.3em;
    }

    .container{
        padding: 2em;
        margin-top: 1em;
        display: flex;
        flex-direction: column;
        background-color:rgb(255,165,0);
        border-radius: 0.5em;
    }

    .inputBox{
        font-size: 1.3em;
    }
    
    #btnSubmit{
        padding: 0.5em;
        background-color:darkgoldenrod;
        margin: 1em 0 0 0;
    }

    #btnSubmit:hover{
        background-color:darkkhaki;   
    }

    @media(max-width:800px) {
        /*customizing nav-bar*/
        .navbar{
            flex-direction: column;
            align-items: flex-start;
        }
        .button{
            display: block;
        }
        .nav-links{
            width: 100%;
            display: none;
        }    

        .check:checked ~ .nav-links, ul ,li ,a {
            width: 100%;
            display: block; 
            flex-direction: column;
            text-align: center;
            
        }
        .nav-links,ul{
            margin-top: 1em ;
        }
        
        /*content customization*/
        .logo-image{
            width: 4rem;
        }
        .logo-name{
            font-size: 1.25rem;
            font-weight: 700;
        }
        
        .container{
            width: 80%;
            display: flex;
            flex-direction: column;
            background-color:rgb(255,165,0);
            border-radius: 0.5em;
        }

        form>*{
        font-size: 1em;
        }


        .inputBox{
        font-size: 1em;
        }
    }
    </style>
</head>
<body>
    <header class="navbar">
        <div class="logo">
        <img src="./images/icons/newlogo.png" alt="" class="logo-image">
            <span class="logo-name">Grocery Shop</span>
        </div>
        <input type="checkbox" id="check" class="check">
            <label for="check">
                <span class="button">
                <img class="button-img" src="./images/icons//menu.png"  alt="Menu">
                </span>
              </label>
        <div class="nav-links">
            <ul>
              <li><a href="./home.html">home</a></li> 
              <li><a href="./menu.php">Menu</a></li>
              <li><a href="./adminAccount.php">admin panel</a></li>
              <li><a href="login.php">Sign In/Register</a></li> 
            </ul>
        </div>
    </header>
    <main>  
        <div class="container">
            <h2>Enter Product info</h2>
            <form action="./addProducts.php" method="post" enctype="multipart/form-data">
                <label >Product Name</label>
                <input class="inputBox" type="text"  name="txtName"  required>
               
                <label >Product Image</label>
                <input class="inputBox" type="file" name="imageFile">
                <label > Price</label>
                <input class="inputBox" type="number" name="price">
                
                <button id="btnSubmit" name="btnSubmit" type="submit">Add Product</button>


                <!-- php code  -->
                <?php
                if(isset($_POST["btnSubmit"]))
                {
                    $productname = $_POST["txtName"];
                    $price = $_POST["price"];
                    
                    
                    $image = "images/products/".basename($_FILES["imageFile"]["name"]);
	                move_uploaded_file($_FILES["imageFile"]["tmp_name"],$image);

                    $con =mysqli_connect("localhost","root","","grocerysite");
                    
                    if(!$con) 
                        {
                            die("Sorry !!! we are facing technical issue"); 
                        }
                    
                    $sql = "INSERT INTO `tblgoods`(`productID`, `name`, `imagePath`, `price`) VALUES  (NULL, '".$productname."',  '".$image."', '".$price."');";
                    
                    if(mysqli_query($con,$sql))	
                        {
                            echo "product added sucessfully !!!!";
                        }
                    else
                        {
                        echo "Opps !! Something is wrong , Please select the file again";
                        }
                    }
                ?>
            </form>
        </div>
    </main>
</body>
</html>