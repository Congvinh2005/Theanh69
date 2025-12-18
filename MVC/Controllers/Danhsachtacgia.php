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
            if(isset($_POST['btnXuatexcel'])){
                //code xuất excel
                $objExcel=new PHPExcel();
                $objExcel->setActiveSheetIndex(0);
                $sheet=$objExcel->getActiveSheet()->setTitle('DSTacgia');
                $rowCount=1;
                //Tạo tiêu đề cho cột trong excel
                
                
                $sheet->setCellValue('A'.$rowCount,'Mã Tác Giả');
                $sheet->setCellValue('B'.$rowCount,'Họ và Tên');
                $sheet->setCellValue('C'.$rowCount,'Ngày Sinh');
                $sheet->setCellValue('D'.$rowCount,'Giới Tính');
                $sheet->setCellValue('E'.$rowCount,'Điện Thoại');
                $sheet->setCellValue('F'.$rowCount,'Email');
                $sheet->setCellValue('G'.$rowCount,'Địa Chỉ');
                
            
                //định dạng cột tiêu đề
                $sheet->getColumnDimension('A')->setAutoSize(true);
                $sheet->getColumnDimension('B')->setAutoSize(true);
                $sheet->getColumnDimension('C')->setAutoSize(true);
                $sheet->getColumnDimension('D')->setAutoSize(true);
                $sheet->getColumnDimension('E')->setAutoSize(true);
                $sheet->getColumnDimension('F')->setAutoSize(true);
                $sheet->getColumnDimension('G')->setAutoSize(true);
                //gán màu nền
                $sheet->getStyle('A1:G1')->getFill()->setFillType(\PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('00FF00');
                //căn giữa
                $sheet->getStyle('A1:G1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                //Điền dữ liệu vào các dòng. Dữ liệu lấy từ DB
                //Lấy dữ liệu từ các điểu khiển đưa vào biến
                $mtg=$_POST['txtMatg'];
                $ht=$_POST['txtTentg'];
                // $sql="Select * From Tacgia Where Matacgia like '%$mtg%' and Tentacgia like '%$ht%'";
                // $data=mysqli_query($con,$sql);
                $result = $this -> dstg -> Tacgia_find($mtg,$ht);
                
                while($row=mysqli_fetch_array($result)){
                    $rowCount++;
                
                    $sheet->setCellValue('A'.$rowCount,$row['Matacgia']);
                    $sheet->setCellValue('B'.$rowCount,$row['Tentacgia']);
                    $sheet->setCellValue('C'.$rowCount,$row['Ngaysinh']);
                    $sheet->setCellValue('D'.$rowCount,$row['Gioitinh']);
                    $sheet->setCellValue('E'.$rowCount,$row['Dienthoai']);
                    $sheet->setCellValue('F'.$rowCount,$row['Email']);
                    $sheet->setCellValue('G'.$rowCount,$row['Diachi']);
                    
                
                }
                //Kẻ bảng 
                $styleAray=array(
                    'borders'=>array(
                        'allborders'=>array(
                            'style'=>PHPExcel_Style_Border::BORDER_THIN
                        )
                    )
                    );
                $sheet->getStyle('A1:'.'G'.($rowCount))->applyFromArray($styleAray);
                $filename = "ExportExcel.xlsx";
                // Xóa output buffer (rất quan trọng)
                if (ob_get_length()) {
                    ob_end_clean();
                }
                    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
                    header('Content-Disposition: attachment; filename="'.$filename.'"');
                    header('Cache-Control: max-age=0');
                    $objWriter = PHPExcel_IOFactory::createWriter($objExcel, 'Excel2007');
                    $objWriter->save('php://output');
                    exit;
            
            
            
            


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