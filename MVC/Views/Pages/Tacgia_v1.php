<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông tin tác giả</title>

    <style>
    :root {
        --bg: #f5f7fb;
        --card: #ffffff;
        --accent: #2463ff;
        --muted: #6b7280;
        --radius: 12px;
        --gap: 16px;
        font-family: Inter, system-ui, -apple-system, 'Segoe UI', Roboto, Arial;
    }

    body {
        background: #f5f6fa;
        padding: 20px;
    }

    * {
        box-sizing: border-box
    }

    .card {
        max-width: 820px;
        background: var(--card);
        border-radius: var(--radius);
        box-shadow: 0 8px 30px rgba(24, 99, 255, 0.08);
        padding: 28px;
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
        font-size: 13px;
        font-weight: bold;
        margin-bottom: 6px;
        display: block;
    }

    input, select, textarea {
        width: 100%;
        padding: 10px 12px;
        border: 1px solid #e3e7ef;
        border-radius: 10px;
        font-size: 14px;
    }

    .error {
        color: red;
        font-size: 13px;
        margin-top: 4px;
    }

    .actions {
        grid-column: 1 / -1;
        text-align: right;
    }

    button {
        padding: 10px 18px;
        border-radius: 10px;
        border: none;
        background: var(--accent);
        color: white;
        cursor: pointer;
    }
    </style>
</head>

<body>

<main class="card">
    <h1>Thông tin tác giả</h1>
    <p>Vui lòng nhập đầy đủ thông tin</p>

    <form method="post" action="http://localhost/QUANLYTHUVIEN/Tacgia/ins" novalidate>

        <!-- MÃ TÁC GIẢ -->
        <div>
            <label>Mã tác giả *</label>
            <input type="text" name="txtMatacgia"
                   value="<?php echo $data['mtg'] ?? '' ?>">

            <?php if(isset($data['errors']['mtg'])): ?>
                <div class="error"><?php echo $data['errors']['mtg']; ?></div>
            <?php endif; ?>
        </div>

        <!-- TÊN TÁC GIẢ -->
        <div>
            <label>Tên tác giả *</label>
            <input type="text" name="txtTentacgia"
                   value="<?php echo $data['ht'] ?? '' ?>">

            <?php if(isset($data['errors']['ht'])): ?>
                <div class="error"><?php echo $data['errors']['ht']; ?></div>
            <?php endif; ?>
        </div>

        <!-- NGÀY SINH -->
        <div>
            <label>Ngày sinh *</label>
            <input type="date" name="txtNgaysinh"
                   value="<?php echo $data['ns'] ?? '' ?>">

            <?php if(isset($data['errors']['ns'])): ?>
                <div class="error"><?php echo $data['errors']['ns']; ?></div>
            <?php endif; ?>
        </div>

        <!-- GIỚI TÍNH -->
        <div>
            <label>Giới tính *</label>
            <select name="ddlGioitinh">
                <option value="">-- Chọn --</option>
                <option value="male"   <?php if(($data['gt'] ?? '')=='male') echo 'selected'; ?>>Nam</option>
                <option value="female" <?php if(($data['gt'] ?? '')=='female') echo 'selected'; ?>>Nữ</option>
                <option value="other"  <?php if(($data['gt'] ?? '')=='other') echo 'selected'; ?>>Khác</option>
            </select>

            <?php if(isset($data['errors']['gt'])): ?>
                <div class="error"><?php echo $data['errors']['gt']; ?></div>
            <?php endif; ?>
        </div>

        <!-- ĐIỆN THOẠI -->
        <div>
            <label>Điện thoại *</label>
            <input type="text" name="txtDienthoai"
                   value="<?php echo $data['dt'] ?? '' ?>">

            <?php if(isset($data['errors']['dt'])): ?>
                <div class="error"><?php echo $data['errors']['dt']; ?></div>
            <?php endif; ?>
        </div>

        <!-- EMAIL -->
        <div>
            <label>Email *</label>
            <input type="email" name="txtEmail"
                   value="<?php echo $data['mail'] ?? '' ?>">

            <?php if(isset($data['errors']['mail'])): ?>
                <div class="error"><?php echo $data['errors']['mail']; ?></div>
            <?php endif; ?>
        </div>

        <!-- ĐỊA CHỈ -->
        <div class="full">
            <label>Địa chỉ *</label>
            <textarea name="txtDiachi"><?php echo $data['dc'] ?? '' ?></textarea>

            <?php if(isset($data['errors']['dc'])): ?>
                <div class="error"><?php echo $data['errors']['dc']; ?></div>
            <?php endif; ?>
        </div>

        <div class="actions">
            <button type="submit" name="btnLuu">Lưu thông tin</button>
        </div>

    </form>
</main>

</body>
</html>
