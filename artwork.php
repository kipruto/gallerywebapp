<?php

require_once './components/header.php';

$id = isset($_GET['id']) ? $_GET['id'] : false;



class getArtwork
{
    public $servername;
    public $password;
    public $dbname;
    public $username;
    public $conn;
    public $tablename;


    public function __construct(
     
$servername = "localhost",
$password = "sqlpassword",
$dbname = "users",
$username = "kipruto",
$tablename = "artwork"

) {
$this->servername = $servername;
$this->username = $username;
$this->password = $password;
$this->dbname = $dbname;
$this-> tablename = $tablename;
        

        $this->conn = mysqli_connect($servername, $username, $password, $dbname);

        if (!$this->conn) {
            die("connection failed " . mysqli_connect_error());
        }
    }
    public function fetchart($id){
        
        
$sql = "SELECT *  FROM $this->tablename WHERE  `artwork_id serial`='$id'";

$result = mysqli_query($this->conn, $sql);

if (mysqli_num_rows($result) > 0) {
    return $result;
} else {
    die("error returned nothing");
}

    }
}

?>

<div class="my-home-page">
	<section class="container-fluid gallery-posts">

<?php
        $details = new getArtwork();
        $result = $details->fetchart($id);
        while ($row = mysqli_fetch_assoc($result)) {
            singleart($row['filename'], $row['title'], $row['category'], $row['artwork_id serial'], $row['description'], $row['username'], $row['tags']);
            }

            ?>

        </section>
</div>

        <!-- product area end -->
        <?php 
        

require_once './components/footer.php'



        ?>