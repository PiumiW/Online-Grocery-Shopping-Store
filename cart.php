<?php session_start();
if(!isset($_SESSION["userName"]))
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
        background-color: gold;
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
        background-color: rgb(80, 200, 120);
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
        background-color:rgb(34,139,34);
    }
    .link-wrapper a:hover{
        background-color:rgb(34,139,34);
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
        height: 100%;
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
        background-color: rgb(80, 200, 120);
        margin: 1em 0 0 0;
    }

    #btnSubmit:hover{
        background-color:rgb(34,139,34);   
    }


    /* product */
    .product{
        display: flex;
        height: 10%;
        flex-direction: row;
        margin: 0.5em 0;
    }
    .imageBox{
        height: 10%;
        width: 10%;
    }

    .imageBox>img{
        height: 100%;
        width: 100%;
    }

    h2{
        text-align: center;
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
              <li><a href="login.php">Sign In/Register</a></li> 
            </ul>
          </div>
       </header>
    <main>  
        <div class="container">
        <h2>Your Cart</h2>
        <form action="paymentHandler.php" method="post">
        <?php   
                $con =mysqli_connect("localhost","root","","grocerysite");
                
                if(!$con) 
                {
                    die("Cannot connect with DB server"); 
                }
                
                $cartQuery = "SELECT `productID` FROM `tblcart` WHERE `email` ='".$_SESSION["userName"]."'";
                
                $cartResult = mysqli_query($con,$cartQuery);
                
            if(mysqli_num_rows($cartResult)>0)
            {

                foreach ($cartResult as $value)
                    {
                        
                        $sql = "SELECT * FROM `tblgoods` WHERE `productID`='".$value['productID']."';";
                    

                        $result = mysqli_query($con,$sql);	

                    
            ?>
                <div class="product">
                        <?php
                            if(mysqli_num_rows($result)>0)
                            {
                            while($row = mysqli_fetch_assoc($result)) 
                                {
                        ?>                                     
                                <div class="imageBox">
                                    <img src="<?php echo $row["imagePath"]?>" alt="">
                                </div>
                                <input type="text" name="productName[]" value="<?php echo $row["name"]?>" readonly>
                                <input type="text" value="<?php echo $row["price"]?>" name="price[]" class="price" readonly>    
                                <input type="number" name="qty[]" class="qty" min="1" max="10" value="1">
                                <input type="text" name="email" value="<?php echo $_SESSION["userName"]?>" hidden>
                                <a href="removeCart.php?productID=<?php echo $row["productID"];?>" class="removeBtn"> remove product</a>
                        <?php   }
                            } 
                            
                        ?> 

                </div>
            <?php 
                    }
            }
            ?> 
            <span>Total Payment</span><input value="0" type="number" name="total" id="total" readonly>
            <input type="submit" name="paymentBtn" value="check out">    
        </div>
        <script>
            updateCartTotal();
            //remove button
            let removeButtons=document.getElementsByClassName("removeBtn");
            for(let i=0;i<removeButtons.length;i++)
            {
                let rmvBtn=removeButtons[i];

                rmvBtn.addEventListener('click', removeCartItem)
            }

            //calcualte total when qty change
            let qtyInputs=document.getElementsByClassName("qty");
            for(let i=0;i<qtyInputs.length;i++)
            {
                let input=qtyInputs[i];
                input.addEventListener('change',qtyChanged)
            }

            //calcualte total when size change
            let sizes=document.getElementsByClassName("price");
            for(let i=0;i<sizes.length;i++)
            {
                let size=sizes[i];
                size.addEventListener('change',sizeChanged)
            }

            //calculate total function when size change
            function sizeChanged(event){
                let size=event.target
                updateCartTotal();
            }


            //calculate total function when qty change
            function qtyChanged(event){
                let input=event.target
                if(isNaN(input.value) || input.value<=0)
                {
                    input.value=1;
                }
                updateCartTotal();
            }

            //remove product
            function removeCartItem(event)
            {
                var buttonClicked=event.target
                buttonClicked.parentElement.remove();
                updateCartTotal();
            }


            function updateCartTotal(){
                var cartItemContainer=document.getElementsByClassName("container")[0]
                var products=cartItemContainer.getElementsByClassName("product")
                var total=0
                for(var i=0;i<products.length;i++)
                {
                    var productRow=products[i];
                    var priceElement=productRow.getElementsByClassName("price")[0]
                    var qtyElement=productRow.getElementsByClassName("qty")[0]

                    var price=priceElement.value;
                    var qty=qtyElement.value;
                    total=total+(price*qty)
                }

                document.getElementById("total").value=total;
            }
        </script>
    </main>
</body>
</html>