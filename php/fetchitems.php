<?php


class getData
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
        $tablename = "members",
        $tablename2 = "artwork"
    ) {
        $this->servername = $servername;
        $this->username = $username;
        $this->password = $password;
        $this->dbname = $dbname;
        $this-> tablename = $tablename;
        $this-> tablename2 = $tablename2;

        $this->conn = mysqli_connect($servername, $username, $password, $dbname);

        if (!$this->conn) {
            die("connection failed " . mysqli_connect_error());
        }
    }
    public function fetchuploads()
    {
        $sql = "SELECT * FROM $this->tablename2";

        $result = mysqli_query($this->conn, $sql);
        
        if (mysqli_num_rows($result) > 0) {
            return $result;
        } else {
            die("No images uploaded at moment! Be the first to post");
        }
      
    }
    public function fetchmembers()
    {
        $sql = "SELECT DISTINCT username FROM $this->tablename";

        $result = mysqli_query($this->conn, $sql);
        
        if (mysqli_num_rows($result) > 0) {
            return $result;
        } else {
           echo "<a class='dropdown-item class='nav-link' href=''>0 Members </a>";
        }
      
    }

    
}



