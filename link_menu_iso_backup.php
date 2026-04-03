<?php
// Kết nối CSDL
$password_file = __DIR__ . '/password.txt';
if (!file_exists($password_file)) file_put_contents($password_file, 'admin1234');
$current_password = trim(file_get_contents($password_file));
$servername = "localhost";
$username = "diavatly";
$password = "cntt2019";
$dbname = "diavatly_db";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Xử lý thêm mới
if (isset($_POST['add'])) {
    $pw = isset($_POST['pw']) ? $_POST['pw'] : '';
    if ($pw !== $current_password) {
        $msg = "Sai mật khẩu!";
    } else {
        $title = isset($_POST['title']) ? $_POST['title'] : '';
        $link = isset($_POST['link']) ? $_POST['link'] : '';
        $sql = "INSERT INTO link_iso (title, link) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $title, $link);
        $stmt->execute();
        $stmt->close();
        $msg = "Thêm mới thành công!";
    }
}

// Xử lý xóa
if (isset($_POST['delete'])) {
    $pw = isset($_POST['pw']) ? $_POST['pw'] : '';
    if ($pw !== $current_password) {
        $msg = "Sai mật khẩu!";
    } else {
        $id = intval($_POST['delete']);
        $sql = "DELETE FROM link_iso WHERE id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->close();
        $msg = "Xóa thành công!";
    }
}

// Xử lý cập nhật
if (isset($_POST['update'])) {
    $pw = isset($_POST['pw']) ? $_POST['pw'] : '';
    if ($pw !== $current_password) {
        $msg = "Sai mật khẩu!";
    } else {
        $id = intval($_POST['id']);
        $title = isset($_POST['title']) ? $_POST['title'] : '';
        $link = isset($_POST['link']) ? $_POST['link'] : '';
        $sql = "UPDATE link_iso SET title=?, link=? WHERE id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssi", $title, $link, $id);
        $stmt->execute();
        $stmt->close();
        $msg = "Cập nhật thành công!";
    }
}
// Xử lý nút Hủy: không kiểm tra mật khẩu, chỉ reset về trạng thái thêm mới
// Xử lý đổi mật khẩu
if (isset($_POST['change_pw'])) {
    $old_pw = isset($_POST['old_pw']) ? $_POST['old_pw'] : '';
    $new_pw = isset($_POST['new_pw']) ? $_POST['new_pw'] : '';
    if ($old_pw !== $current_password) {
        $msg = "Mật khẩu cũ không đúng!";
    } elseif (strlen($new_pw) < 6) {
        $msg = "Mật khẩu mới phải từ 6 ký tự!";
    } else {
        file_put_contents($password_file, $new_pw);
        $msg = "Đổi mật khẩu thành công!";
        $current_password = $new_pw;
    }
}
if (isset($_POST['cancel'])) {
    $edit = null;
}

// Lấy dữ liệu để sửa
$edit = null;
if (isset($_POST['edit_id'])) {
    $id = intval($_POST['edit_id']);
    $sql = "SELECT * FROM link_iso WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $edit = $result->fetch_assoc();
    $stmt->close();
}

// Lấy danh sách link_iso
$sql = "SELECT * FROM link_iso ORDER BY id DESC";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <script>
    function showDeletePwModal(formId) {
        document.getElementById('deletePwModalFormId').value = formId;
        document.getElementById('deletePwModalInput').value = '';
        document.getElementById('deletePwModal').style.display = 'flex';
        document.getElementById('deletePwModalInput').focus();
    }
    function hideDeletePwModal() {
        document.getElementById('deletePwModal').style.display = 'none';
    }
    function submitDeletePwModal() {
        var pw = document.getElementById('deletePwModalInput').value;
        var formId = document.getElementById('deletePwModalFormId').value;
        var form = document.getElementById(formId);
        if (form) {
            var oldPw = form.querySelector('input[name="pw"]');
            if (oldPw) oldPw.remove();
            var pwInput = document.createElement('input');
            pwInput.type = 'hidden';
            pwInput.name = 'pw';
            pwInput.value = pw;
            form.appendChild(pwInput);
            form.submit();
        }
        hideDeletePwModal();
    }
    </script>
    <meta charset="UTF-8">
    <title>Quản lý các đường Link</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <style>
        body { background: #f4f6f8; }
    .container { max-width: 1100px; margin: 40px auto; background: #fff; border-radius: 10px; box-shadow: 0 4px 24px rgba(0,0,0,0.08); padding: 32px 40px 24px 40px; }
        h2 { text-align: center; color: #2d3a4b; margin-bottom: 32px; }
        .table th { background: #1976d2; color: #fff; }
        .table td.link-col { word-break: break-all; max-width: 320px; }
        .msg { color: #d32f2f; text-align: center; margin-bottom: 12px; font-weight: bold; font-size: 18px; }
    </style>
</head>
<body>
        <!-- Modal nhập mật khẩu khi xóa -->
        <div id="deletePwModal" style="display:none;position:fixed;top:0;left:0;width:100vw;height:100vh;background:rgba(0,0,0,0.25);z-index:9999;align-items:center;justify-content:center;">
            <div style="background:#fff;padding:32px 28px;border-radius:10px;box-shadow:0 4px 24px rgba(0,0,0,0.12);max-width:320px;margin:auto;position:relative;top:20vh;">
                <h3 style="margin-bottom:18px;font-size:1.15rem;color:#d32f2f;text-align:center;">Nhập mật khẩu để xóa</h3>
                <input type="password" id="deletePwModalInput" placeholder="Mật khẩu" style="width:100%;padding:8px 12px;font-size:16px;margin-bottom:18px;">
                <input type="hidden" id="deletePwModalFormId">
                <div style="display:flex;justify-content:space-between;">
                    <button type="button" onclick="submitDeletePwModal()" style="background:#d32f2f;color:#fff;padding:8px 18px;border:none;border-radius:5px;">Xác nhận</button>
                    <button type="button" onclick="hideDeletePwModal()" style="background:#b0bec5;color:#333;padding:8px 18px;border:none;border-radius:5px;">Hủy</button>
                </div>
            </div>
        </div>
    <div class="container">
        <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:12px;">
            <div>
                <form method="get" action="import_export_excel.php" style="display:inline;">
                    <button type="submit" name="export" class="btn btn-success">Export Excel</button>
                </form>
                <form method="post" action="import_export_excel.php" enctype="multipart/form-data" style="display:inline;margin-left:8px;">
                    <input type="file" name="excel_file" accept=".xlsx" required style="display:inline;width:auto;">
                    <button type="submit" name="import" class="btn btn-primary">Import Excel</button>
                </form>
            </div>
            <button type="button" class="btn btn-warning" onclick="showChangePwModal()">Đổi mật khẩu</button>
        </div>
        <!-- Modal đổi mật khẩu -->
        <div id="changePwModal" style="display:none;position:fixed;top:0;left:0;width:100vw;height:100vh;background:rgba(0,0,0,0.25);z-index:9999;align-items:center;justify-content:center;">
            <div style="background:#fff;padding:32px 28px;border-radius:10px;box-shadow:0 4px 24px rgba(0,0,0,0.12);max-width:320px;margin:auto;position:relative;top:20vh;">
                <h3 style="margin-bottom:18px;font-size:1.15rem;color:#1976d2;text-align:center;">Đổi mật khẩu quản trị</h3>
                <form method="post">
                    <input type="password" name="old_pw" placeholder="Mật khẩu cũ" style="width:100%;padding:8px 12px;font-size:16px;margin-bottom:12px;" required>
                    <input type="password" name="new_pw" placeholder="Mật khẩu mới (>=6 ký tự)" style="width:100%;padding:8px 12px;font-size:16px;margin-bottom:18px;" required>
                    <div style="display:flex;justify-content:space-between;">
                        <button type="submit" name="change_pw" class="btn btn-success">Xác nhận</button>
                        <button type="button" onclick="hideChangePwModal()" class="btn btn-secondary">Hủy</button>
                    </div>
                </form>
            </div>
        </div>
        <script>
        function showChangePwModal() {
                document.getElementById('changePwModal').style.display = 'flex';
        }
        function hideChangePwModal() {
                document.getElementById('changePwModal').style.display = 'none';
        }
        </script>
        <h2>Quản lý các đường Link</h2>
        <?php if (!empty($msg)): ?><div class="msg"><?php echo $msg; ?></div><?php endif; ?>
        <form method="post" class="mb-4">
            <?php if ($edit): ?>
                <input type="hidden" name="id" value="<?php echo $edit['id']; ?>">
            <?php endif; ?>
            <div class="form-group">
                <input type="text" name="title" class="form-control" placeholder="Tiêu đề" required value="<?php echo $edit ? htmlspecialchars($edit['title']) : ''; ?>">
            </div>
            <div class="form-group">
                <input type="text" name="link" class="form-control" placeholder="Link" required value="<?php echo $edit ? htmlspecialchars($edit['link']) : ''; ?>">
            </div>
            <div class="form-group">
                <input type="password" name="pw" class="form-control" placeholder="Mật khẩu" required>
            </div>
            <div class="form-group text-right">
                <?php if (!$edit): ?>
                    <button type="submit" name="add" class="btn btn-primary">Thêm mới</button>
                <?php endif; ?>
                <?php if ($edit): ?>
                    <button type="submit" name="update" class="btn btn-success">Cập nhật</button>
                    <button type="submit" name="cancel" class="btn btn-secondary" formnovalidate>Hủy</button>
                <?php endif; ?>
            </div>
        </form>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Tiêu đề</th>
                    <th>Link</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['title']); ?></td>
                    <td class="link-col"><a href="<?php echo htmlspecialchars($row['link']); ?>" target="_blank"><?php echo htmlspecialchars($row['link']); ?></a></td>
                    <td>
                        <form method="post" style="display:inline;">
                            <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>">
                            <button type="submit" class="btn btn-sm btn-info">Sửa</button>
                        </form>
                        <form method="post" style="display:inline;" id="deleteForm<?php echo $row['id']; ?>">
                            <input type="hidden" name="delete" value="<?php echo $row['id']; ?>">
                            <button type="button" class="btn btn-sm btn-danger" onclick="showDeletePwModal('deleteForm<?php echo $row['id']; ?>')">Xóa</button>
                        </form>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
<?php $conn->close(); ?>
