<!doctype html>
<html lang="vi">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Upload file — Không dùng JavaScript</title>
    <style>
    body {
        margin: 0;
        font-family: Inter, system-ui, Segoe UI, Roboto, Arial;
        background: #eef2f7;
        color: #0f1724
    }

    .wrap {
        min-height: 100vh;
        display: flex;
        justify-content: center;
        padding: 24px
    }

    .card {
        width: 680px;
        max-width: 100%;
        background: #fff;
        border-radius: 12px;
        box-shadow: 0 6px 24px rgba(0, 0, 0, 0.08);
        padding: 24px
    }

    h1 {
        margin: 0 0 12px;
        font-size: 20px
    }

    p {
        margin: 0 0 16px;
        color: #6b7280;
        font-size: 14px
    }

    label {
        display: block;
        margin-bottom: 6px;
        font-weight: 600
    }

    input[type="text"],
    input[type="file"] {
        width: 100%;
        padding: 10px;
        border: 1px solid #d0d7e2;
        border-radius: 8px;
        margin-bottom: 14px;
        background: #f9fbfe
    }

    button {
        background: #2563eb;
        color: #fff;
        border: none;
        padding: 10px 16px;
        border-radius: 8px;
        cursor: pointer;
        font-weight: 600;
        width: 100%
    }

    .filename-info {
        margin-top: 12px;
        font-size: 14px;
        color: #444
    }
    </style>
</head>

<body>
    <div class="wrap">
        <div class="card">
            <h1 style="text-align: center;">Upload file</h1>
            <!-- <form method="POST" enctype="multipart/form-data"
                action="http://localhost/QUANLYTHUVIEN/Nhaxuatban_file/up_l">
                <label for="note">Ghi chú</label>
                <input id="note" name="note" type="text" placeholder="Nhập ghi chú cho file..." name="txtGhichu">


                <label for="file">Chọn file</label>
                <input id="file" name="txtfile" type="file" required>


                <button type="submit" name="btnUpload">Upload</button>
            </form> -->

            <form method="POST" enctype="multipart/form-data"
                action="http://localhost/Quanlythuvien/Nhaxuatban_file/up_l">

                <label>Ghi chú</label>
                <input type="text" name="txtGhichu">

                <label>Chọn file</label>
                <input type="file" name="txtfile" required>

                <button type="submit">Upload</button>
            </form>


            <div class="filename-info">
                <!-- VÍ DỤ server có thể in tên file tại đây sau khi submit -->
                <!-- PHP: echo $_FILES['file']['name']; -->
                <!-- Flask: request.files['file'].filename -->
            </div>
        </div>
    </div>
</body>

</html>