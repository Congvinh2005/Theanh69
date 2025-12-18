<?php 
    class Danhsachtacgia extends Controller{
        private $dstg;

        function __construct(){
            $this -> dstg = $this -> model('Tacgia_m');
        }

        function Get_data(){
            $this -> view('Master',[
                'page'=>'Danhsachtacgia_v',
                'mtg'=>'',
                'ht'=>'',
                'data'=>$this -> dstg -> Tacgia_find('', ''),
                // 'ns'=>$ns,
                // 'gt'=>$gt,
                // 'dt'=>$dt,
                // 'mail'=>$mail,
                // 'dc'=>$dc
            ]);
        }
        // function getAllTacgia(){
        //     $model = new Tacgia_m();
        //     return $model->getAllTacgia();
        // }
        // function findTacgia($mtg,$ht){
        //     $model = new Tacgia_m();
        //     return $model->Tacgia_find($mtg,$ht);
        // }


        function Timkiem(){
            if(isset($_POST['btnTimkiem'])){
                $mtg = $_POST['txtMatg'];
                $ht = $_POST['txtTentg'];
                $result = $this -> dstg -> Tacgia_find($mtg,$ht);


                $this -> view('Master',[
                    'page'=>'Danhsachtacgia_v',
                    'data'=>$result,
                    'mtg'=>$mtg,
                    'ht'=>$ht
                ]);
            }
        }
        function sua($mtg){
                // gọi lại giao diện
                $this -> view('Master',[
                    'page'=>'Tacgiasua_v',
                    'result'=>$this -> dstg -> Tacgia_find($mtg,''),
                    // 'ht'=>'',
                    // 'ns'=>$ns,
                    // 'gt'=>$gt,
                    // 'dt'=>$dt,
                    // 'mail'=>$mail,
                    // 'dc'=>$dc
                ]);
            
        }
        function upd(){
            if(isset($_POST['btnSuainfor'])){
                $mtg  = $_POST['txtMatacgia'];
                $ht   = $_POST['txtTentacgia'];
                $ns   = $_POST['txtNgaysinh'];
                $gt   = $_POST['ddlGioitinh'];
                $dt   = $_POST['txtDienthoai'];
                $mail = $_POST['txtEmail'];
                $dc   = $_POST['txtDiachi'];

                $kq = $this -> dstg -> Tacgia_udate($mtg,$ht,$ns,$gt,$dt,$mail,$dc);
                if($kq){
                    echo "<script>alert('Sửa tác giả thành công');</script>";
                    $this -> view('Master',[
                        'page'=>'Danhsachtacgia_v',
                        'data'=>$this -> dstg -> Tacgia_find('', ''),
                      
                    ]);
                } else {
                    echo "<script>alert('Cập nhật tác giả thất bại');</script>";
                    $this -> view('Master',[
                        'page'=>'Tacgiasua_v',
                        'result'=>$this -> dstg -> Tacgia_find($mtg,''),
                    ]);
                }
            }
        }
    }
?>