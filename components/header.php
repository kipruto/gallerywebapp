<?php

require_once './php/component.php';
require_once './php/fetchitems.php';
$database = new getData();
session_start();

$author = isset($_SESSION['username']) ?  $_SESSION['username'] : false;

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>ArtWeb</title>
        <link rel='stylesheet' href='./assets/css/style.css'>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.css" integrity="sha512-wR4oNhLBHf7smjy0K4oqzdWumd+r5/+6QO/vDda76MW5iug4PT7v86FoEkySIJft3XA0Ae6axhIvHrqwm793Nw==" crossorigin="anonymous" />
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
         <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.5.3/cjs/popper.min.js" integrity="sha512-sRheuSfHcVXElF9FhW+GYVk/vGlbL1FGyG52BfZgMySWhBYNPrtYRyQSodIdl2MT6ddhBMcKsni4OGA93E/qfQ==" crossorigin="anonymous"></script>
        </head>
<body class='container'>
    <header>
        <nav class='navbar navbar-expand-lg navbar-light bg-light'>
            <a class='nav-brand' href="./index.php">ArtWeb</a>
            <ul class='navbar-nav ml-auto'>
                <li class='nav-item'>
                    <a class='nav-link' href='./index.php'>HOME</a>
                </li>
                <li class='nav-item'>
                    <a class='nav-link' href='./gallery.php'>GALLERY</a>
                </li>


                <?php
                if(isset($_SESSION['username'])){
                    echo "<div class='dropdown mx-3'>
<button class='btn btn-default dropdown-toggle' type='button' id='dropdownMenu2' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'><strong> Members</strong></button>
<div class='dropdown-menu' aria-labelledby='dropdownMenu2'>";
?>

<?php
        $result = $database->fetchmembers();
        while ($row = mysqli_fetch_assoc($result)) {
            member($row['username']);
            }

            ?>
<?php
 echo "</div>
 </div>";
?>

<?php echo "<div class='dropdown mx-3'>
  <button class='btn btn-default dropdown-toggle' type='button' id='dropdownMenu2' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'><strong>
  Hi," ?> <?php  echo $_SESSION['username'] ?> <?php echo "</strong></button>
  <div class='dropdown-menu' aria-labelledby='dropdownMenu2'>
    <button class='dropdown-item' type='button'> Settings </button>
  <a class='dropdown-item' href='./member.php?author=$author'>My Uploads </a>
    <a class='dropdown-item class='nav-link' href='./php/logout.php'>Logout</a>
  </div>
</div>

                <li class='nav-item last-navitem'>
                <a class='btn--blue-x' href='./add.php'>Upload <i class='fa fa-camera'></i></a>
                                
                            </li>";
            
                }else{
                    echo " <li class='nav-item'>
                    <a class='nav-link' href='./register.php'>REGISTER</a>
                </li>
                <li class='nav-item'>
                    <a class='nav-link' href='./login.php'>LOGIN</a>
                </li>";
                }
                ?>
               
            </ul>
        </nav>
    </header>
