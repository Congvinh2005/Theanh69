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
    if(!isset($_FILES['txtfile']) || $_FILES['txtfile']['error'] != 0){
        echo "<script>alert('Upload file lỗi')</script>";
        return;
    }

    $file = $_FILES['txtfile']['tmp_name'];

    $objReader = PHPExcel_IOFactory::createReaderForFile($file);
    $objExcel  = $objReader->load($file);

    $sheet     = $objExcel->getSheet(0);
    $sheetData = $sheet->toArray(null,true,true,true);

    for($i = 2; $i <= count($sheetData); $i++){

        $mnxb   = trim((string)$sheetData[$i]['A']);
        $tennxb = trim((string)$sheetData[$i]['B']);
        $dt     = trim((string)$sheetData[$i]['C']);
        $mail   = trim((string)$sheetData[$i]['D']);
        $dc     = trim((string)$sheetData[$i]['E']);

        if($mnxb == '') continue;

        if(!$this->nxb->NXB_ins($mnxb,$tennxb,$dt,$mail,$dc)){
            die(mysqli_error($this->nxb->con));
        }
    }

    echo "<script>alert('Upload file thành công!')</script>";
    $this->view('Master',['page'=>'Nhaxuatban_v']);
}

    }
    ?>