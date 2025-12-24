<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    :root {
        --bg: #f5f7fb;
        --card: #ffffff;
        --accent: #2463ff;
        --muted: #6b7280;
        --radius: 12px;
        --gap: 16px;
        font-family: Inter, system-ui, -apple-system, 'Segoe UI', Roboto, 'Helvetica Neue', Arial;
    }

    body {
        font-family: Arial, sans-serif;
        background: #f5f6fa;
        margin: 0;
        padding: 20px;
    }

    * {
        box-sizing: border-box
    }



    .card {
        width: 100%;
        max-width: 820px;
        background: var(--card);
        border-radius: var(--radius);
        box-shadow: 0 8px 30px rgba(24, 99, 255, 0.08);
        padding: 28px;
    }


    h1 {
        margin: 0 0 6px;
        font-size: 20px
    }

    p.lead {
        margin: 0 0 20px;
        color: var(--muted);
        font-size: 14px
    }


    form {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: var(--gap);
    }


    .full {
        grid-column: 1 / -1
    }

    label {
        display: block;
        font-size: 13px;
        color: #253243;
        margin-bottom: 6px;
        font-weight: bold;
    }

    input[type="text"],
    input[type="email"],
    input[type="date"],
    input[type="tel"],
    select,
    textarea {
        width: 100%;
        padding: 10px 12px;
        border: 1px solid #e3e7ef;
        border-radius: 10px;
        background: #fbfdff;
        font-size: 14px;
        outline: none;
    }

    input:focus,
    textarea:focus,
    select:focus {
        box-shadow: 0 0 0 4px rgba(36, 99, 255, 0.08);
        border-color: var(--accent);
    }


    .gender-group {
        display: flex;
        gap: 12px;
        align-items: center
    }

    .gender-item {
        display: flex;
        align-items: center;
        gap: 8px
    }

    input[type="radio"] {
        width: 16px;
        height: 16px
    }


    textarea {
        min-height: 90px;
        resize: vertical
    }


    .actions {
        display: flex;
        gap: 12px;
        justify-content: flex-end;
        grid-column: 1 / -1;
        margin-top: 6px
    }

    button {
        padding: 10px 16px;
        border-radius: 10px;
        border: 0;
        font-size: 14px;
        cursor: pointer
    }

    .btn-primary {
        background: var(--accent);
        color: #fff;
        transition: 0.2s;
    }

    .btn-primary:hover {
        background: #174fe0;
    }

    .btn-ghost {
        background: transparent;
        border: 1px solid #e6e9f2;
        color: var(--muted)
    }


    @media (max-width:720px) {
        form {
            grid-template-columns: 1fr
        }

        .actions {
            justify-content: stretch
        }

        .actions button {
            width: 100%
        }
    }


    /* small helper text */
    .hint {
        font-size: 12px;
        color: var(--muted);
        margin-top: 6px
    }
    </style>
</head>

<body>
    <main class="card" role="main">
        <h1>Thông tin tác giả</h1>
        <p class="lead">Vui lòng nhập đầy đủ thông tin tác giả. Các trường có dấu * là bắt buộc.</p>


        <form method="post" id="authorForm" novalidate action="http://localhost/QUANLYTHUVIEN/Danhsachtacgia/upd">
            <?php 
        if(isset($data['result'])&&mysqli_num_rows($data['result'])>0){
            while($row=mysqli_fetch_array($data['result'])){
        ?>
            <div>
                <label for="authorId">Mã tác giả *</label>
                <input type="text" id="authorId" name="txtMatacgia" placeholder="VD: TG001" required
                    value="<?php echo $row['Matacgia'] ?>" readonly />
            </div>


            <div>
                <label for="fullName">Tên tác giả *</label>
                <input type="text" id="fullName" name="txtTentacgia" placeholder="Họ và tên" required
                    value="<?php echo $row['Tentacgia'] ?>" />
            </div>


            <div>
                <label for="dob">Ngày sinh *</label>
                <input type="date" id="dob" name="txtNgaysinh" required value="<?php echo $row['Ngaysinh'] ?>" />
            </div>


            <div>
                <label for="gender">Giới tính *</label>
                <select id="gender" name="ddlGioitinh" required>
                    <option value="">-- Chọn giới tính --</option>
                    <option value="male" <?php if($row['Gioitinh']=='male') echo 'selected' ?>>Nam</option>
                    <option value="female" <?php if($row['Gioitinh']=='female') echo 'selected' ?>>Nữ</option>
                    <option value="other" <?php if($row['Gioitinh']=='other') echo 'selected' ?>>Khác</option>
                </select>
            </div>


            <div>
                <label for="phone">Điện thoại *</label>
                <input type="tel" id="phone" name="txtDienthoai" placeholder="Ví dụ: 0912345678"
                    pattern="[0-9+\- ]{7,20}" required value="<?php echo $row['Dienthoai'] ?>" />
                <div class="hint">Chỉ nhập số, có thể kèm dấu +. 7-20 ký tự.</div>
            </div>


            <div>
                <label for="email">Email *</label>
                <input type="email" id="email" name="txtEmail" placeholder="email@vd.com" required
                    value="<?php echo $row['Email'] ?>" />
            </div>


            <div class="full">
                <label for="address">Địa chỉ</label>
                <textarea id="address" name="txtDiachi"
                    placeholder="Nhập địa chỉ nơi cư trú..."><?php echo $row['Diachi'] ?></textarea>
            </div>
            <?php        
    }
}
?>
            <div class="actions">

                <button type="submit" class="btn-primary" name="btnSuainfor">Sửa thông tin</button>
            </div>
        </form>
    </main>

</body>

</html>