<!DOCTYPE html>
<html>
    <head>
      <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1" />
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200;300;400;500;600;700;800&display=swap" rel="stylesheet">
      <link rel="stylesheet" href="./homeStyle.css">
      <title>Food Planet</title>
    </head>
    <body onLoad="showSlides()">

      <script>
        let slideIndex = 0;
        showSlides();
        function showSlides() {
          let i;
          let slides = document.getElementsByClassName("mySlides");
          for (i = 0; i < slides.length; i++) {
          slides[i].style.display = "none";
          }
          slideIndex++;
          if (slideIndex > slides.length) {slideIndex = 1}
          slides[slideIndex-1].style.display = "block";
          setTimeout(showSlides, 3000); // Change image every 2 seconds
        }
        </script>

       <header class="navbar">
          <div class="logo">
            <img src="./images/icons/newlogo.png" alt="" class="logo-image">
            <span class="logo-name">Grocery Shop</span>
          </div>
          <input type="checkbox" id="check" class="check">
              <label for="check">
                <span class="button">
                  <img class="button-img" src="./images/icons/menu.png"  alt="Menu">
                </span>
              </label>
          <div class="nav-links">
            <ul>
              <li><a href="menu.php">Menu</a></li>
              <li><a href="login.php">Sign In/Register</a></li> 
            </ul>
          </div>
       </header>

       <div class="slideshow-container" style="padding-top:4em; height: 50%;">
        <div class="mySlides fade">
          <img src="./images/offers/offer1.jpg" alt="" width="100%"  style="max-height:500px;" >
        </div>
        
        <div class="mySlides fade">
          <img src="./images/offers/offer2.jpg" alt="" width="100%"  style="max-height:500px;">
        </div>	
        
        <div class="mySlides fade">
          <img src="./images/offers/offer3.jpg" alt="img" width="100%" style="max-height:500px;">
        </div>	

        <div class="mySlides fade">
          <img src="./images/offers/offer4.jpg" alt="img" width="100%" style="max-height:500px;">
        </div>	
      </div>

       <main class="main">
          <section class="intro">
              <div class="intro-imgbox">
                  <img src="./images/icons/items2.png" alt="chef photo">
              </div>
              <div class="intro-discription">
                <h1>We Bring the Store to Your Door!</h1>
               <div class="link-wrapper">
                  <a href="./menu.php">Order now!</a>
               </div>
              </div>
          </section>   
       </main>
       <footer class="footer-container">
         <div class="txt-box">
            <h3>About</h3>
            <p>Careers</p>
            <p>Feedback</p>
         </div>
         <div class="txt-box">
            <h3>Policy</h3>
            <p>Terms & Condtions</p>
            <p>Privacy Policy</p>
         </div>
       </footer>
    </body>
</html>