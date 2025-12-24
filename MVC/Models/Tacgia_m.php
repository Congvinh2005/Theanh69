<?php 
    class Tacgia_m extends connectDB{
        // function getAllTacgia(){
        function getAllTacgia(){
            $sql = "SELECT * FROM Tacgia1";
            $kq = mysqli_query($this -> con, $sql);
            if (!$kq) {
                die('Query failed: ' . mysqli_error($this->con));
            }
            return $kq;
        }
        function Tacgia_ins($mtg,$ht,$ns,$gt,$dt,$mail,$dc){
                $sql = "INSERT INTO Tacgia1 VALUES ('$mtg', '$ht', '$ns', '$gt', '$dt', '$mail', '$dc')";
                return mysqli_query($this->con, $sql);
            }
        function checktrungmaTG($mtg){
            $sql = "SELECT * FROM Tacgia1 WHERE Matacgia = '$mtg'";
            $result = mysqli_query($this -> con, $sql);
            if(mysqli_num_rows($result) > 0){
                return true; // Mã tác giả đã tồn tại
            } else {
                return false; // Mã tác giả chưa tồn tại
            }
        }
        function Tacgia_find($mtg,$ht){
            $sql = "SELECT * from Tacgia1 where Matacgia like '%$mtg%' and Tentacgia like '%$ht%'";
            return  mysqli_query($this -> con, $sql);
       
        }
         function Tacgia_udate($mtg,$ht,$ns,$gt,$dt,$mail,$dc){
                $sql = "UPDATE Tacgia1 SET Tentacgia='$ht', Ngaysinh='$ns', Gioitinh='$gt', Dienthoai= '$dt', Email='$mail', Diachi='$dc' WHERE Matacgia='$mtg'";
                return mysqli_query($this->con, $sql);
        }
           
       
        function Tacgia_del($mtg){
                $sql = "DELETE FROM Tacgia1 WHERE Matacgia='$mtg'";
                return mysqli_query($this->con, $sql);
        }
}
?>