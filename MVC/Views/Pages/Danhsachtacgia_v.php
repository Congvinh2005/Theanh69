</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        background: #f5f6fa;
        margin: 0;
        padding: 20px;
    }


    .container {
        max-width: 1100px;
        margin: auto;
        background: #fff;
        padding: 20px;
        border-radius: 12px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }


    h2 {
        text-align: center;
        margin-bottom: 20px;
    }


    .form-row {
        display: flex;
        gap: 20px;
        margin-bottom: 20px;
    }


    .form-row div {
        flex: 1;
    }


    label {
        font-weight: bold;
    }


    input {
        width: 100%;
        padding: 10px;
        margin-top: 6px;
        border: 1px solid #ccc;
        border-radius: 8px;
    }


    .actions {
        margin-top: 10px;
        display: flex;
        gap: 15px;
    }

    button {
        padding: 10px 18px;
        border: none;
        cursor: pointer;
        border-radius: 8px;
        font-size: 15px;
    }


    .btn-search {
        background: #1877f2;
        color: white;
    }

    .btn-search:hover {
        background: #0f5ed1;
    }

    .btn-excel {
        background: #28a745;
        color: white;
    }

    .btn-excel:hover {
        background: #1f8636;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 25px;
    }

    th,
    td {
        border: 1px solid #ccc;
        padding: 10px;
        text-align: center;
    }

    th {
        background: #e9ecef;
        font-weight: bold;
    }

    .btn-edit {
        background: #ffc107;
        padding: 6px 10px;
        border-radius: 6px;
        margin-right: 5px;
        color: #fff;
    }

    .btn-delete {
        background: #dc3545;
        padding: 6px 10px;
        border-radius: 6px;
        color: #fff;
    }

    .icon {
        margin-right: 4px;
    }
    </style>
</head>

<body>
    <div class="container">
        <form method="post" action="http://localhost/QUANLYTHUVIEN/Danhsachtacgia/Timkiem">
            <div class="form-row">
                <div>
                    <label for="maTG">Mã tác giả</label>
                    <input type="text" id="maTG" name="txtMatg" placeholder="Nhập mã tác giả"
                        value="<?php echo $data['mtg'] ?? '' ?>">
                </div>
                <div>
                    <label for="tenTG">Tên tác giả</label>
                    <input type="text" id="tenTG" name="txtTentg" placeholder="Nhập tên tác giả"
                        value="<?php echo $data['ht'] ?? '' ?>">
                </div>
            </div>


            <div class="actions">
                <button class="btn-search" name="btnTimkiem">🔍 Tìm kiếm</button>
                <button class="btn-excel" name="btnXuatexcel">📄 Xuất Excel</button>
            </div>
        </form>
        <table>
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Mã tác giả</th>
                    <th>Họ tên</th>
                    <th>Ngày sinh</th>
                    <th>Giới tính</th>
                    <th>Điện thoại</th>
                    <th>Email</th>
                    <th>Địa chỉ</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                <?php
            if(isset($data['data'])&& mysqli_num_rows($data['data'])>0){
                $i=1;
                while($row=mysqli_fetch_assoc($data['data'])){
          ?>
                <tr>
                    <td><?php echo $i++ ?></td>
                    <td><?php echo $row['Matacgia'] ?></td>
                    <td><?php echo $row['Tentacgia'] ?></td>
                    <td><?php echo $row['Ngaysinh'] ?></td>
                    <td><?php echo $row['Gioitinh'] ?></td>
                    <td><?php echo $row['Dienthoai'] ?></td>
                    <td><?php echo $row['Email'] ?></td>
                    <td><?php echo $row['Diachi'] ?></td>
                    <td>
                        <a href="http://localhost/QUANLYTHUVIEN/Danhsachtacgia/sua/<?php echo $row['Matacgia'] ?>"><button
                                class="btn-edit">✏️
                                Sửa</button></a>
                        <a href="./Tacgia_xoa.php?mtg=<?php echo $row['Matacgia'] ?>"
                            onclick="return confirm('Bạn có chắc chắn muốn xoá không?')"><button class="btn-delete">🗑️
                                Xóa</button></a>
                    </td>
                </tr>
                <?php
                }
            }
         
         ?>
            </tbody>
        </table>

    </div>
</body>