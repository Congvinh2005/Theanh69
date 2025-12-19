<?php 

class Nhaxuatban_m extends connectDB{
    // function NXB_ins($mnxb,$tennxb,$dt,$mail,$dc){
    //         $sql = "INSERT INTO Nhaxuatban VALUES ('$mnxb', '$tennxb', '$dt', '$mail', '$dc')";
    //         return mysqli_query($this->con, $sql);
    //     }

    function NXB_ins($mnxb,$tennxb,$dt,$mail,$dc){
    $sql = "INSERT INTO Nhaxuatban(Manxb, Tennxb, Dienthoai, Email, Diachi)
            VALUES ('$mnxb','$tennxb','$dt','$mail','$dc')";
    return mysqli_query($this->con, $sql);
}

}
?>