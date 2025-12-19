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
           if (isset($_POST['btnXuatexcel'])) {

                // TẮT OUTPUT BUFFER HOÀN TOÀN
                while (ob_get_level()) {
                    ob_end_clean();
                }

                require_once __DIR__ . '/../Public/Classes/PHPExcel.php';
                require_once __DIR__ . '/../Public/Classes/PHPExcel/IOFactory.php';

                $objExcel = new PHPExcel();
                $sheet = $objExcel->setActiveSheetIndex(0);
                $sheet->setTitle('DSTacgia');

                $rowCount = 1;

                // Tiêu đề
                $sheet->setCellValue('A1', 'Mã Tác Giả');
                $sheet->setCellValue('B1', 'Họ và Tên');
                $sheet->setCellValue('C1', 'Ngày Sinh');
                $sheet->setCellValue('D1', 'Giới Tính');
                $sheet->setCellValue('E1', 'Điện Thoại');
                $sheet->setCellValue('F1', 'Email');
                $sheet->setCellValue('G1', 'Địa Chỉ');

                // Style tiêu đề
                $sheet->getStyle('A1:G1')->getFont()->setBold(true);
                $sheet->getStyle('A1:G1')->getAlignment()
                    ->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

                foreach (range('A','G') as $col) {
                    $sheet->getColumnDimension($col)->setAutoSize(true);
                }

                // LẤY DỮ LIỆU
                $mtg = $_POST['txtMatg'];
                $ht  = $_POST['txtTentg'];

                $result = $this->dstg->Tacgia_find($mtg, $ht);

                while ($row = mysqli_fetch_assoc($result)) {
                    $rowCount++;
                    $sheet->setCellValue('A'.$rowCount, $row['Matacgia']);
                    $sheet->setCellValue('B'.$rowCount, $row['Tentacgia']);
                    $sheet->setCellValue('C'.$rowCount, $row['Ngaysinh']);
                    $sheet->setCellValue('D'.$rowCount, $row['Gioitinh']);
                    $sheet->setCellValue('E'.$rowCount, $row['Dienthoai']);
                    $sheet->setCellValue('F'.$rowCount, $row['Email']);
                    $sheet->setCellValue('G'.$rowCount, $row['Diachi']);
                }

                // KẺ BẢNG
                $sheet->getStyle('A1:G'.$rowCount)->applyFromArray([
                    'borders' => [
                        'allborders' => [
                            'style' => PHPExcel_Style_Border::BORDER_THIN
                        ]
                    ]
                ]);

                // HEADER CHUẨN
                header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
                header('Content-Disposition: attachment; filename="ExportExcel.xlsx"');
                header('Cache-Control: max-age=0');

                $writer = PHPExcel_IOFactory::createWriter($objExcel, 'Excel2007');
                $writer->save('php://output');

                exit; // ⬅️ CỰC KỲ QUAN TRỌNG
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
        function xoa($mtg){
            $kq = $this -> dstg -> Tacgia_del($mtg);
            if($kq){
                echo "<script>alert('Xóa tác giả thành công');</script>";
            } else {
                echo "<script>alert('Xóa tác giả thất bại');</script>";
            }
            $this -> view('Master',[
                'page'=>'Danhsachtacgia_v',
                'mtg'=>'',
                'ht'=>'',
                'data'=>$this -> dstg -> Tacgia_find('', ''),
            ]);
        }
    }
?>