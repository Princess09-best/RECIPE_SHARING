<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require('../../Database/config.php');
require('../../functions/getAllusers.php');
//require('../../functions/viewuser.php');
//require('../../functions/updateuser.php');
//require('../../functions/deleteuser.php');
 ?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/css/dashboard.css">
    <title>RecipeShare-users</title>
    
</head>
<body>
<div class="recent-invoices">
        <h3>Users table</h3>
        <?php
        // Display success message
        if(isset($_SESSION['success_message'])) {
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    ' . htmlspecialchars($_SESSION['success_message']) . '
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>';
            unset($_SESSION['success_message']);
        }

        // Display error message
        if(isset($_SESSION['error_message'])) {
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    ' . htmlspecialchars($_SESSION['error_message']) . '
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>';
            unset($_SESSION['error_message']);
        }
        ?>
        <!--<table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>ID Customer</th>
                    <th>Customer Name</th>
                    <th>email</th>
                    <th>No.Recipes created</th>
                    <th>actions</th>
                    
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>01</td>
                    <td>#065499</td>
                    <td>Aurélien Salomon</td>
                    <td>089 Kutch Green Apt. 448</td>
                    <td>10</td>
                    <td><div class="dropdown">
                        <button class="dropbtn">...</button>
                        <div class="dropdown-content">
                          <a href="#">View</a>
                          <a href="#">Update</a>
                          <a href="#">Delete</a>
                        </div>
                      </div></td>
                   
                  
                </tr>
                <tr>
                    <td>02</td>
                    <td>#005455</td>
                    <td>Manuel Rovira</td>
                    <td>089 Kutch Green Apt. 448</td>
                    <td>04 Sep 2019</td>
                    <td><div class="dropdown">
                        <button class="dropbtn">...</button>
                        <div class="dropdown-content">
                          <a href="#">View</a>
                          <a href="#">Update</a>
                          <a href="#">Delete</a>
                        </div>
                      </div></td>
                    
                </tr>
                <tr>
                    <td>02</td>
                    <td>#005455</td>
                    <td>Manuel Rovira</td>
                    <td>089 Kutch Green Apt. 448</td>
                    <td>04 Sep 2019</td>
                    <td><div class="dropdown">
                        <button class="dropbtn">...</button>
                        <div class="dropdown-content">
                          <a href="#">View</a>
                          <a href="#">Update</a>
                          <a href="#">Delete</a>
                        </div>
                      </div></td>
                    
                </tr>
                <tr>
                    <td>02</td>
                    <td>#005455</td>
                    <td>Manuel Rovira</td>
                    <td>089 Kutch Green Apt. 448</td>
                    <td>04 Sep 2019</td>
                    <td><div class="dropdown">
                        <button class="dropbtn">...</button>
                        <div class="dropdown-content">
                          <a href="#">View</a>
                          <a href="#">Update</a>
                          <a href="#">Delete</a>
                        </div>
                      </div></td>
                    
                </tr>
                <tr>
                    <td>02</td>
                    <td>#005455</td>
                    <td>Manuel Rovira</td>
                    <td>089 Kutch Green Apt. 448</td>
                    <td>04 Sep 2019</td>
                    <td><div class="dropdown">
                        <button class="dropbtn">...</button>
                        <div class="dropdown-content">
                          <a href="#">View</a>
                          <a href="#">Update</a>
                          <a href="#">Delete</a>
                        </div>
                      </div></td>
                    
                </tr>
            </tbody>
        </table>-->
        <?php
    getallusers($conn);
    ?>
    </div>
    
</body>
</html>