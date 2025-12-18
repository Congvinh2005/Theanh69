<?php 
class Nhaxuatban_file extends Controller
{
    private $nxb;

    function __construct(){
        $this -> nxb = $this -> model('Nhaxuatban_m');
    }
   function Get_data(){
       $this -> view('Master',[
           'page'=>'Nhaxuatban_v'
       ]);
   }
   function up_l(){
    $file=$_FILES['txtfile']['tmp_name'];
            $objReader=PHPExcel_IOFactory::createReaderForFile($file);
            $objExcel=$objReader->load($file);
            //Lấy sheet hiện tại
            $sheet=$objExcel->getSheet(0);
            $sheetData=$sheet->toArray(null,true,true,true);
            for($i=2;$i<=count($sheetData);$i++){
                $mnxb=$sheetData[$i]["A"];
                $tnxb=$sheetData[$i]["B"];
                $dt=$sheetData[$i]["C"];
                $mail=$sheetData[$i]["D"];
                $dc=$sheetData[$i]["E"];
               
                $kq = $this -> nxb -> NXB_ins($mnxb,$tnxb,$dt,$mail,$dc);
            }
            echo "<script>alert('Upload file thành công!')</script>";
             $this -> view('Master',[
           'page'=>'Nhaxuatban_v'
       ]);
   }
}
?>