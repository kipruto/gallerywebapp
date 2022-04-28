
<?php
require_once './components/header.php';

class getLatestImg
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
        $tablename = "db"

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
    public function fetchimg(){
        $sql = "SELECT * FROM $this->tablename  ORDER BY timeposted DESC  LIMIT 4";

$result = mysqli_query($this->conn, $sql);

if (mysqli_num_rows($result) > 0) {
    return $result;
} else {
    die("error returned nothing");
}

    }
}

?>


  

<div class="my-login-page coverimg">
	<section class="h-100">
		<div class="container h-100">
			<div class="row justify-content-md-center h-100">
				<div class="card-wrapper homepg">
		<h1>Welcome to <br>ArtWeb</h1>
		<p>This is a simple website for community of Aritsts to showcase their arts and media. You need to signup to be able to post your own images! Create and an account and get started</p>
				<a class='gettstarted'  href='./gallery.php'>Let's Explore</a>
				</div>
			</div>
		</div>
	</section>
</div>
    
<div class="my-home-page">
	<section class="container-fluid gallery-posts carousel-bx">
  <?php
        $details = new getLatestImg();
        $result = $details->fetchImg();
        while ($row = mysqli_fetch_assoc($result)) {
            latest4images($row['imagepath'], $row['id']);
            }
            ?>
        </section>
        </div>
<?php

require_once './components/footer.php';

?>