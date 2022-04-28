<?php

if(isset($_POST['submitted'])){
    require './dbhandler.php';


    $file = $_FILES['file_img'];
    $filename = $_FILES['file_img']['name'];
    $fileTmpname = $_FILES['file_img']['tmp_name'];
    $filesize = $_FILES['file_img']['size'];
    $fileError = $_FILES['file_img']['error'];
    $fileType = $_FILES['file_img']['type'];

    $fileExt = explode('.', $filename);

    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg', 'jpeg', 'png');

    if(in_array($fileActualExt, $allowed)){
        if($fileError === 0){
if($filesize<1000000 ){
    $filenamenew = uniqid('', true).'.'.$fileActualExt;
    $fileDestination = '../uploads/'.$filenamenew;

    move_uploaded_file($fileTmpname, $fileDestination);

    
    $title = $_POST['title'];
    $tags = $_POST['tags'];
    $category = $_POST['category'];
    $desc = $_POST['description'];
    $imagepath = './uploads/'.$filenamenew;
    session_start();
    $author = $_SESSION['username'];

    $sql  = "INSERT INTO artwork (title,category,description, filename,username, tags) VALUES (?,?,?,?,?,?)";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {

        $ok = false;
        $serverResponse[] = 'Could not upload! Internal Error';

    } else {
        mysqli_stmt_bind_param($stmt, "ssssss", $title, $category, $desc, $imagepath, $author, $tags);
        mysqli_stmt_execute($stmt); 
        $ok = false;
        $serverResponse[] = 'Upload Successful, Hurray!';
        header('location: ../gallery.php?uploadsuccessful');

    }
}else{
    echo "File is too big";
}
        }else{
            echo "There was an error uploading the file";
        }

    }else{
        echo "Not valid file extension";
    }

}





?>