<?php
include '../../Database/config.php';


function getSuperAdminRecipeStats() {

    global $conn;

    //get total recipes
    $totalRecipesQuery = "SELECT COUNT(*) as total_recipes FROM Foods";
    $result = mysqli_query($conn, $totalRecipesQuery);
    $totalRecipes = mysqli_fetch_assoc($result)['total_recipes'];

    //get total users
    $totalUsersQuery = "SELECT COUNT(*) as total_users FROM users";
    $usersResult = mysqli_query($conn, $totalUsersQuery);
    $totalUsers = mysqli_fetch_assoc($usersResult)['total_users'];

    echo'
     <div class="sidebar">
        <div class="logo">
            <img src="../../assets/images/recipesharelogo.png" alt="Logo">
        </div>
        <ul class="menu">
            <li><a class="link-item" href="usersdisplay.php"><i class="fa-solid fa-user"></i><span>users</span></a></li>
            <li><a class="link-item" href="recipesdisplay.php"><i class="fa-solid fa-bowl-food"></i><span>Recipes</span></a></li>
           <!-- <li><a href="#"><i class="icon icon-reports"></i></a></li>
            <li><a href="#"><i class="icon icon-settings"></i></a></li>-->
        </ul>
    </div>
     <section class="dashboard">
            <div class="overview">
                <div class="card">
                    <h3>Total Users</h3>
                    <p>' .$totalUsers.'</p>
                </div>
                <div class="card">
                    <h3>Total Recipes created</h3>
                    <p>'.$totalRecipes.'</p>
                </div>
             <!--  <div class="card">
                <h3>Total Transactions</h3>
                <p>$2,262</p>
            </div>
            <div class="card">
                <h3>Total Products</h3>
                <p>2,100</p>
            </div> -->
            </div>

            <div class="charts">
                <div class="chart sales-chart">
                    <canvas id="salesChart"></canvas>
                </div>
                <div class="chart category-chart">
                    <canvas id="categoryChart"></canvas>
                </div>
            </div>

            <div class="sales-funnel">
                <h3>Most Active Users</h3>
               
                <div class="funnel-chart">
                    <canvas id="funnelChart"></canvas>
                </div>
            </div>
            

   
        </section>';
}



function getRegularAdminStats(){
    global $conn;

    //get recipes by admin only (total)
    $admin_id = $_SESSION['user_id'];
    $admin_recipe_query = "SELECT COUNT(*) as total_recipes FROM Foods WHERE created_by = $admin_id";
    $result = mysqli_query($conn, $admin_recipe_query);
    $admin_recipes = mysqli_fetch_assoc($result)["total_recipes"];

    echo'<div class="sidebar">
        <div class="logo">
            <img src="../../assets/images/recipesharelogo.png" alt="Logo">
        </div>
        <ul class="menu">
            <li><a class="link-item" href="#"><i class="fa-solid fa-user"></i><span>users</span></a></li>
            <li><a class="link-item" href="#"><i class="fa-solid fa-bowl-food"></i><span>Recipes</span></a></li>
           <!-- <li><a href="#"><i class="icon icon-reports"></i></a></li>
            <li><a href="#"><i class="icon icon-settings"></i></a></li>-->
        </ul>
    </div>

    <div class="main-content">
    
        

        <section class="dashboard">
            <div class="overview">
                <div class="card">
                    <h3>My Recipes</h3>
                    <p>' . $admin_recipes .'</p>
                </div>
                <div class="card">
                    <h3>Pending Approvals</h3>
                    <p>2</p>
                </div>
            
            </div>



   
        </section>
    </div>';
}
?>