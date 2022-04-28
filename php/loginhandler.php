<?php

if(isset($_POST['loginbtn'])){
  require './dbhandler.php';
  
    $username =$_POST['username'];
    $password = $_POST['password'];
    $ok = true;
    $serverResponse = array();

        $sql  = "SELECT * FROM members WHERE username=?";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
       $ok = false;
     $serverResponse[] = 'Cannot connect! Try Again.';

        } else {

            mysqli_stmt_bind_param($stmt, "s", $username);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            if ($row = mysqli_fetch_assoc($result)) {
     
                if(!$password === $row['password'] ){
                 $ok = false;
                  $serverResponse[] = 'Wrong Password';
                }

                else if($password === $row['password']){
                    $ok = true;
                    $serverResponse[] = 'Login Successful!';
                    session_start();
                    $_SESSION['username'] = $row['username'];

             header('location: ../index.php?loginsuccessful');
                    } else {

               $ok = false;
                $serverResponse[] = 'Wrong Password!';
            }

        } else{

       $ok = false;
        $serverResponse[] = 'No such email found in our records!';
        }
    }
    echo json_encode(
     array(   'ok' => $ok,
     'messages' => $serverResponse)

    );

  }else{
    header('location: ../login.php');
  }




