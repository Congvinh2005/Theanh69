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
    }
    ?>