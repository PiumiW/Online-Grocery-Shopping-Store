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
    <title>admin page</title>

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
        background-color: gold;
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
        background-color:gold;
    }
    .link-wrapper a:hover{
        background-color:gold;
        border-radius: 0.5em;
    }

    /*body content */
    main{
        width: 100%;
        padding:5em 0.5em 0 0.5em;
        display: flex;
        flex-direction:column;
    }

    .person{
        display: flex;
        flex-direction:row;
    }
    .personDetails{
        margin:0.2em;
        padding:0.2em;
        border:2px solid black;
        /* border-right:2px solid black; */
    }
    h2{
        text-align:center;
    }
    /*dashbord icons content */
    .container{
        display: flex;
        width: 100%;
        height: 100%;
        margin-top: 1em;
    }

    .dashbord{
        display: flex;
        flex-direction: column;
        align-items: center;
        width: 20%;
        height: 20%;
        border-radius: 0.5em;
        margin: 0 1em;
        box-shadow:0em 0.5em 0.5em #aaaaaa;
    }
    .img-box{
        padding-top: 1em;
        padding-bottom: 0.5em;
        max-width: 50%;
        height: 50%;
    }
    .dashIcons{
        display: block;
        max-width: 100%;
    }

    .dashLink{
        display: inline-block;
        text-align: center;
        width:100% ;
        font-size: 1.2em;
        padding-top: 1em;
        padding-bottom: 1em;
        color: white;
        text-decoration: none;
        
    }

    .d1{
        background-color:rgb(240,165,0);
    }
    .dl1:hover{
        border-radius:0 0 0.5em  0.5em ;
        background-color:rgb(153,99,0);
    }

    .d2{
        background-color:greenyellow;
    }
    .dl2:hover{
        border-radius:0 0 0.5em  0.5em ;
        background-color:green;
    }

    .d3{
        background-color:skyblue;
    }
    .dl3:hover{
        border-radius:0 0 0.5em  0.5em ;
        background-color:blue;
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
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .dashbord{
            width: 70%;
            height: 30%;
            border-radius: 0.5em;
            margin: 1em 0;
            
        }

        .dashLink{
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
              <li><a href="./adminAccount.php">Admin Panel</a></li>
              <li><a href="login.php">Sign In/Register</a></li> 
            </ul>
          </div>
       </header>

    <main>
        <h2>Current Customers</h1>

        <?php
            $con =mysqli_connect("localhost","root","","grocerysite");
            
            if(!$con) 
            {
                die("Cannot connect with DB server"); 
            }

            $sql="SELECT * FROM `tbluser` WHERE `type`=0";

            $result = mysqli_query($con,$sql);	
            
            if(mysqli_num_rows($result)>0)
            {
                while($row = mysqli_fetch_assoc($result)) 
                {
        ?>
        <div class="person">
            <p class="personDetails">Name :<?php echo $row["name"]?></p>
            <p class="personDetails">Email :<?php echo $row["email"]?></p>
            <p class="personDetails">Address :<?php echo $row["address"]?></p>
            <p class="personDetails">Phone :<?php echo $row["phone"]?></p>
            <a class="personDetails" href="removeUser.php?email=<?php echo $row["email"];?>">Remove User</a>
        </div>
        <?php
                }
            }
        ?>
    </main>
       
</body>
</html>