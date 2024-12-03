<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once('../../Database/config.php');
require('../../Database/core.php');
require('../../functions/statistics.php');
require('../../functions/get_username.php');
require('../../functions/getRecentRecipes.php');
checklogin_core();


?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RecipeShare-Dashboard</title>
    <link rel="stylesheet" href="../../assets/css/dashboard.css">
</head>
<body>
 <!--   <div class="sidebar">
        <div class="logo">
            <img src="../../assets/images/recipesharelogo.png" alt="Logo">
        </div>
        <ul class="menu">
            <li><a class="link-item" href="usermanagement.php"><i class="fa-solid fa-user"></i><span>users</span></a></li>
            <li><a class="link-item" href="recipesdisplay.php"><i class="fa-solid fa-bowl-food"></i><span>Recipes</span></a></li>
           <li><a href="#"><i class="icon icon-reports"></i></a></li>
            <li><a href="#"><i class="icon icon-settings"></i></a></li>
        </ul>
    </div>-->

    <div class="main-content">
        <header>
            <div class="title">
                <h1><?php echo getUserFullName($conn, $_SESSION['user_id'])?>✌️</h1>
            </div>
            <div class="search-bar">
                <input type="text" placeholder="Search...">
            </div>
        </header>
<?php
if(isSuperAdmin_core()){
    getSuperAdminRecipeStats();
}
else{getRegularAdminStats();} ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://kit.fontawesome.com/094e97acb7.js" crossorigin="anonymous"></script>


    <script src="../../assets/js/dashboard.js"></script>
</body>
</html>
