<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    @import url('https://fonts.googleapis.com/css?family=Montserrat:400,800');

    * {
        box-sizing: border-box;
    }

    body {
        background: #f6f5f7;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        font-family: 'Montserrat', sans-serif;
        height: 100vh;
        margin: -20px 0 50px;
    }

    h1 {
        font-weight: bold;
        margin: 0;
    }

    h2 {
        text-align: center;
    }

    p {
        font-size: 14px;
        font-weight: 100;
        line-height: 20px;
        letter-spacing: 0.5px;
        margin: 20px 0 30px;
    }

    span {
        font-size: 12px;
    }
    p{
        font-size: 20px;
    }
    a {
        color: #000000;
        font-size: 20px;
        text-decoration: none;
        margin: 15px 0;
    }

    #btnSubmit {
       
        text-align: center;
        width: 30%;
        border-radius: 20px;
        border: 1px solid #228B22;
        background-color: darkgoldenrod;
        color: #FFFFFF;
        height: 3em;
        font-size: 12px;
        font-weight: bold;
        letter-spacing: 1px;
        text-transform: uppercase;
        transition: transform 80ms ease-in;
    }

    #btnSubmit:active {
        transform: scale(0.95);
    }

    #btnSubmit:focus {
        outline: none;
    }

    #btnSubmit.ghost {
        background-color: transparent;
        border-color: #FFFFFF;
    }

    form {
        background-color: gold;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        padding: 0 50px;
        height: 100%;
        text-align: center;
    }

    input {
        background-color: #eee;
        border: none;
        padding: 12px 15px;
        margin: 8px 0;
        width: 100%;
    }

    .container {
        background-color:burlywood;
        border-radius: 10px;
        box-shadow: 0 14px 28px rgba(0,0,0,0.25), 
                0 10px 10px rgba(0,0,0,0.22);
        overflow: hidden;
        width: 768px;
        max-width: 100%;
        min-height: 480px;
    }

    .form-container {
        height: 100%;
    }

    .sign-in-container {
        padding-left:5em ;
        padding-right:5em ;
        z-index: 2;
    }

    .social-container {
        margin: 20px 0;
    }
    </style>
    <script>
    function checkPassword()
        {
            let pw = document.getElementById("txtPassword").value;
            let cpw = document.getElementById("txtConfimPassword").value;
            if(pw != cpw)
                {
                    alert("Password and confrim password should be the same");
                    event.preventDefault();
                }
        }
    </script>
</head>
<body>
    <h2>Grocery store  Registration form</h2>
<div class="container" id="container">
	<div class="form-container sign-in-container">
		<form action="registrationHandler.php" method="post">
            <h1>Create Account</h1>					
                <input type="text" placeholder="Name" name="txtName" id = "txtName"/>
                <input type="email" placeholder="Email" required name="txtEmail" id="txtEmail"/>
                <input type="text" placeholder="address" name="txtAddress" id="txtAddress"  required /> 
                <input type="number" placeholder="Contact Number" name="txtContactNo" id="txtContactNo" pattern="[0-9]{10}" required />        
                <input type="password" placeholder="Password" id="txtPassword" name="txtPassword" required/>
                <input type="password" placeholder="Confirm Password" id="txtConfimPassword" name="txtConfimPassword"/>    
                <button id="btnSubmit" type="submit" onClick="checkPassword()" name = "btnSubmit">Register</button>

            
            <a href="home.html">Back to Home</a>
        </form>   
	</div>
</body>
</html>