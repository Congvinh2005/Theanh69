<?php 
    class Tacgia_m extends connectDB{
        // function getAllTacgia(){
        function getAllTacgia(){
            $sql = "SELECT * FROM Tacgia";
            $kq = mysqli_query($this -> con, $sql);
            if (!$kq) {
                die('Query failed: ' . mysqli_error($this->con));
            }
            return $kq;
        }
        function Tacgia_ins($mtg,$ht,$ns,$gt,$dt,$mail,$dc){
                $sql = "INSERT INTO Tacgia VALUES ('$mtg', '$ht', '$ns', '$gt', '$dt', '$mail', '$dc')";
                return mysqli_query($this->con, $sql);
            }
        function checktrungmaTG($mtg){
            $sql = "SELECT * FROM Tacgia WHERE Matacgia = '$mtg'";
            $result = mysqli_query($this -> con, $sql);
            if(mysqli_num_rows($result) > 0){
                return true; // Mã tác giả đã tồn tại
            } else {
                return false; // Mã tác giả chưa tồn tại
            }
    }
}
?>