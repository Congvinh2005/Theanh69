<?php
class TacGia1 extends controller {

    private $tg;

    function __construct(){
        $this->tg = $this->model('Tacgia_m');
    }

    function Get_data(){
        $this->view('Master',[
            'page'=>'Tacgia_v1'
        ]);
    }

    function ins(){
        if(isset($_POST['btnLuu'])){

            $mtg  = trim($_POST['txtMatacgia']);
            $ht   = trim($_POST['txtTentacgia']);
            $ns   = trim($_POST['txtNgaysinh']);
            $gt   = trim($_POST['ddlGioitinh']);
            $dt   = trim($_POST['txtDienthoai']);
            $mail = trim($_POST['txtEmail']);
            $dc   = trim($_POST['txtDiachi']);

            $errors = [];

            // ===== KIỂM TRA RỖNG =====
            if($mtg == "")  $errors['mtg']  = "Mã tác giả không được để trống";
            if($ht == "")   $errors['ht']   = "Tên tác giả không được để trống";
            if($ns == "")   $errors['ns']   = "Ngày sinh không được để trống";
            if($gt == "")   $errors['gt']   = "Vui lòng chọn giới tính";
            if($dt == "")   $errors['dt']   = "Điện thoại không được để trống";
            if($mail == "") $errors['mail'] = "Email không được để trống";
            if($dc == "")   $errors['dc']   = "Địa chỉ không được để trống";

            if(!empty($errors)){
                $this->view('Master',[
                    'page'=>'Tacgia_v1',
                    'errors'=>$errors,
                    'mtg'=>$mtg,
                    'ht'=>$ht,
                    'ns'=>$ns,
                    'gt'=>$gt,
                    'dt'=>$dt,
                    'mail'=>$mail,
                    'dc'=>$dc
                ]);
                return;
            }

            // ===== KIỂM TRA TRÙNG MÃ =====
            if($this->tg->checktrungmaTG($mtg)){
                $errors['mtg'] = "Mã tác giả đã tồn tại";

                $this->view('Master',[
                    'page'=>'Tacgia_v1',
                    'errors'=>$errors,
                    'mtg'=>$mtg,
                    'ht'=>$ht,
                    'ns'=>$ns,
                    'gt'=>$gt,
                    'dt'=>$dt,
                    'mail'=>$mail,
                    'dc'=>$dc
                ]);
                return;
            }

            // ===== INSERT =====
            if($this->tg->Tacgia_ins($mtg,$ht,$ns,$gt,$dt,$mail,$dc)){
                echo "<script>alert('Thêm tác giả thành công');</script>";
            } else {
                echo "<script>alert('Thêm tác giả thất bại');</script>";
            }

            $this->view('Master',['page'=>'Tacgia_v1']);
        }
    }
}