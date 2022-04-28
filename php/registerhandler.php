    <?php
if(isset($_POST['registerbtn'])){
    require './dbhandler.php';

    $password = $_POST['password'];
    $username = $_POST['username'];
    $ok = true;
    $serverResponse = array();
    //check to see if any field has been left blank

    //validate password
    if (!preg_match("/^[a-zA-Z0-9]*$/", $password)) {
        $ok = false;
        $serverResponse[] = 'Password contain illegal characters! Try Again';
    } else {
        $sql  = "SELECT username FROM members WHERE username=?";
        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $sql)) {

            $ok = false;
            $serverResponse[] = 'Internal Error Contact Admin';

        } else {

            mysqli_stmt_bind_param($stmt, "s", $username);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultCheck = mysqli_stmt_num_rows($stmt);
            if ($resultCheck > 0) {

                $ok = false;
                $serverResponse[] = 'That username already exist ';

            } else {

                $sql  = "INSERT INTO members (username, password) VALUES (?,?)";

                $stmt = mysqli_stmt_init($conn);

                if (!mysqli_stmt_prepare($stmt, $sql)) {

                    $ok = false;
                    $serverResponse[] = 'Could not register! Internal Error';

                } else {

                    mysqli_stmt_bind_param($stmt, "ss", $username, $password);
                    mysqli_stmt_execute($stmt); 

                    session_start();

                    $_SESSION['username'] =  $username;

                    $ok = false;
                    $serverResponse[] = 'Signup Successful, Welcome!';
                    header('location: ../index.php?signupsuccessful');
                  

                }

            }

        }

        echo json_encode(

            array(

                'ok' => $ok,

                'messages' => $serverResponse

            )



        );

    }
}else{
    header('location: ../register.php');
}


    

