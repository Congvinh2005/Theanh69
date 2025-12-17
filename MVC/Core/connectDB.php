<?php 
    class connectDB{
        // public $servername = "localhost";
        // public $username = "root";
        // public $password = "";
        // public $dbname = "quanlythuvien";
        // public $conn;   
        // function __construct(){
        //     $this -> conn = new mysqli($this -> servername, $this -> username, $this -> password, $this -> dbname);
        //     mysqli_set_charset($this -> conn, 'UTF8');
        //     if($this -> conn -> connect_error){
        //         die("Kết nối thất bại: " . $this -> conn -> connect_error);
        //     }
        //     // else{
        //     //     echo "Kết nối thành công";
        //     // }
        //     }
         
    
        function __construct()
        {
            $this->con=mysqli_connect('localhost','root','','SinhvienDB');
            mysqli_query($this->con,"SET NAMES 'utf8'");
        }
    }
?>