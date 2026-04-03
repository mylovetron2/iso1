<?php
// Kết nối CSDL
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
    $title = isset($_POST['title']) ? $_POST['title'] : '';
    $link = isset($_POST['link']) ? $_POST['link'] : '';
    $sql = "INSERT INTO link_iso (title, link) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $title, $link);
    $stmt->execute();
    $stmt->close();
    $msg = "Thêm mới thành công!";
}

// Xử lý xóa
if (isset($_POST['delete'])) {
    $id = intval($_POST['delete']);
    $sql = "DELETE FROM link_iso WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->close();
    $msg = "Xóa thành công!";
}

// Xử lý cập nhật
if (isset($_POST['update'])) {
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
    <meta charset="UTF-8">
    <title>Quản lý Link - CRUD PHP & MySQL</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <style>
        body { background: #f4f6f8; }
        .container { max-width: 700px; margin: 40px auto; background: #fff; border-radius: 10px; box-shadow: 0 4px 24px rgba(0,0,0,0.08); padding: 32px 40px 24px 40px; }
        h2 { text-align: center; color: #2d3a4b; margin-bottom: 32px; }
        .table th { background: #1976d2; color: #fff; }
        .table td.link-col { word-break: break-all; max-width: 320px; }
        .msg { color: #d32f2f; text-align: center; margin-bottom: 12px; font-weight: bold; font-size: 18px; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Quản lý các đường Link (PHP & MySQL)</h2>
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
            <div class="form-group text-right">
                <?php if (!$edit): ?>
                    <button type="submit" name="add" class="btn btn-primary">Thêm mới</button>
                <?php endif; ?>
                <?php if ($edit): ?>
                    <button type="submit" name="update" class="btn btn-success">Cập nhật</button>
                    <button type="submit" name="cancel" class="btn btn-secondary">Hủy</button>
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
                        <form method="post" style="display:inline;" onsubmit="return confirm('Bạn có chắc muốn xóa?');">
                            <input type="hidden" name="delete" value="<?php echo $row['id']; ?>">
                            <button type="submit" class="btn btn-sm btn-danger">Xóa</button>
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
