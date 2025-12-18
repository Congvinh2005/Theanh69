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
    }
?>