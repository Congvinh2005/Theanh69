 <?php
    class TacGia extends controller{
        private $tg;

        function __construct(){
            $this -> tg = $this -> model('Tacgia_m');
        }


        function   Get_data (){
            $data = [];
            $this -> view('Master',[
                'page'=>'Tacgia_v',
                'data'=>$data
            ]);
        }

        function ins(){
            if(isset($_POST['btnLuu'])){
                $mtg = $_POST['txtMatacgia'];
                $ht = $_POST['txtTentacgia'];
                $ns = $_POST['txtNgaysinh'];
                $gt = $_POST['ddlGioitinh'];
                $dt = $_POST['txtDienthoai'];
                $mail = $_POST['txtEmail'];
                $dc = $_POST['txtDiachi'];

                // Kiểm tra trung mã tác giả
        $kq1 = $this -> tg -> checktrungmaTG($mtg);
        if($kq1){
            echo "<script>alert('Mã tác giả đã tồn tại, vui lòng nhập mã khác');</script>";
           
        } 
        else
         {
            $kq = $this -> tg -> Tacgia_ins($mtg,$ht,$ns,$gt,$dt,$mail,$dc);
            if($kq){
                echo "<script>alert('Thêm tác giả thành công');</script>";
            } else {
                    echo "<script>alert('Thêm tác giả thất bại');</script>";
                }
        }

                // gọi lại giao diện
                $this -> view('Master',[    
                    'page'=>'Tacgia_v',
                    'mtg'=>$mtg,
                    'ht'=>$ht,
                    'ns'=>$ns,
                    'gt'=>$gt,
                    'dt'=>$dt,
                    'mail'=>$mail,
                    'dc'=>$dc
                ]);
            



       }
    }
}

 // function Capnhattacgia(){
 // $data = [];

 // $this -> view('Master',[
 // "page"=>'Tacgia_v',
 // "data"=>$data
 // ]);
 // }

 // function Danhsachtacgia(){
 // // You may want to implement this differently to show a list of authors
 // $data = [
 // "authors" => $this->tg->getAllTacgia()
 // ];

 // $this -> view('Master',[
 // "page"=>'Tacgia_v',
 // "data"=>$data
 // ]);
 // }
?>