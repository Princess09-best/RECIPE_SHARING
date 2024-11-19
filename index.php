<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/homepage.css">
    <title>Document</title>
</head>
<body>
      
        <nav class="navbar">
            <ul class="nav-list">
                <li><a href="index.php">Home</a></li>
                <li><a href="views/SignUp.php">SignUp</a></li>
                <li><a href="views/SignIn.php">Sign In</a></li>
                <li><a href="#contact">Contact</a></li>
            </ul>
            <div class="rightNav">
               
                <button class="btn btn-sm"><a href="views/recipe_feed.php">Get Started</a></button>
            </div>
        </nav>
      <section class="slideshow-container" >
            
        <div class="slideshow-container">

            <div class="picslide fade">
              
              <img src="images/slide 3.jpeg" style="width:100%">
              <div class="text ">Welcome to RecipeShare!</div>
            </div>
            
            <div class="picslide fade">
             
              <img src="images/slide 1.jpeg" style="width:100%">
              <div class="text">Connecting people through food</div>
            </div>
            
            <div class="picslide fade">
            
              <img src="images/slide 2.jpeg" style="width:100%">
              <div class="text">Share your recipes and learn from others</div>
            </div>
            
            </div>
            <br>
            
            <div style="text-align:center">
              <span class="dot"></span> 
              <span class="dot"></span> 
              <span class="dot"></span> 
            </div>
            
        
       
    </section>
</div>
<div class="articles">
   <article>
     <h2>Upload your Recipes</h2>
     <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec sit amet metus in justo posuere consequat non vel neque. Sed semper, ipsum vel euismod tristique, quam libero faucibus tellus, vel malesuada tellus ex eu nulla. Donec non tempus ipsum, vel eleifend ipsum. Quisque vel libero vel felis bibendum consectetur.</p>
   </article>
   <article>
    <h2>Learn New Recipes</h2>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec sit amet metus in justo posuere consequat non vel neque. Sed semper, ipsum vel euismod tristique, quam libero faucibus tellus, vel malesuada tellus ex eu nulla. Donec non tempus ipsum, vel eleifend ipsum. Quisque vel libero vel felis bibendum consectetur.</p>
  </article>
</div>

    </body>
    <script>
        let slideIndex = 0;
        showSlides();
        
        function showSlides() {
          let i;
          let slides = document.getElementsByClassName("picslide");
          let dots = document.getElementsByClassName("dot");
          for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";  
          }
          slideIndex++;
          if (slideIndex > slides.length) {slideIndex = 1}    
          for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
          }
          slides[slideIndex-1].style.display = "block";  
          dots[slideIndex-1].className += " active";
          setTimeout(showSlides, 3000); 
        }
        </script>

</html>