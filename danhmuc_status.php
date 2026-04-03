<?php
/**
 * QUẢN LÝ DANH MỤC STATUS THIẾT BỊ
 * Giao diện CRUD cho bảng danhmuc_status
 */

include("select_data.php");
include("manage_thietbi_status.php");

if(!isset($_SESSION)){
   session_start();
}

// Xử lý thêm status mới
if (isset($_POST['add_status'])) {
    $ma_status = strtoupper(str_replace(' ', '_', $_POST['ma_status']));
    $ten_status = $_POST['ten_status'];
    $mau_hienthi = $_POST['mau_hienthi'];
    $muc_do = $_POST['muc_do'];
    $mo_ta = $_POST['mo_ta'];
    $thu_tu = intval($_POST['thu_tu']);
    
    if (add_status_to_danhmuc($ma_status, $ten_status, $mau_hienthi, $muc_do, $mo_ta, $thu_tu)) {
        $message = "<div class='alert alert-success'>✓ Thêm status mới thành công!</div>";
    } else {
        $message = "<div class='alert alert-error'>✗ Có lỗi khi thêm status (có thể mã status đã tồn tại)</div>";
    }
}

// Xử lý cập nhật status
if (isset($_POST['update_status'])) {
    $id = intval($_POST['id']);
    $data = array(
        'ten_status' => $_POST['ten_status'],
        'mau_hienthi' => $_POST['mau_hienthi'],
        'muc_do' => $_POST['muc_do'],
        'mo_ta' => $_POST['mo_ta'],
        'thu_tu' => $_POST['thu_tu'],
        'kich_hoat' => isset($_POST['kich_hoat']) ? 1 : 0
    );
    
    if (update_status_danhmuc($id, $data)) {
        $message = "<div class='alert alert-success'>✓ Cập nhật status thành công!</div>";
    } else {
        $message = "<div class='alert alert-error'>✗ Có lỗi khi cập nhật status</div>";
    }
}

// Xử lý xóa/vô hiệu hóa status
if (isset($_GET['delete']) && isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $soft = $_GET['delete'] === 'soft';
    
    if (delete_status_danhmuc($id, $soft)) {
        $message = "<div class='alert alert-success'>✓ " . ($soft ? "Vô hiệu hóa" : "Xóa") . " status thành công!</div>";
    } else {
        $message = "<div class='alert alert-error'>✗ Có lỗi khi xóa status</div>";
    }
}

// Lấy danh sách status (bao gồm cả inactive)
$status_list = get_all_status_list(false);

?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
    <title>Quản lý Danh mục Status</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 20px;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
            background: white;
            border-radius: 15px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.2);
            overflow: hidden;
        }
        .header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 30px;
            text-align: center;
        }
        .header h1 {
            font-size: 32px;
            margin-bottom: 10px;
        }
        .header p {
            opacity: 0.9;
            font-size: 16px;
        }
        .content {
            padding: 30px;
        }
        .alert {
            padding: 15px 20px;
            border-radius: 8px;
            margin-bottom: 20px;
            font-weight: 500;
        }
        .alert-success {
            background: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
        .alert-error {
            background: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
        .section {
            background: #f8f9fa;
            padding: 25px;
            border-radius: 10px;
            margin-bottom: 30px;
        }
        .section h2 {
            color: #333;
            margin-bottom: 20px;
            font-size: 24px;
            border-bottom: 3px solid #667eea;
            padding-bottom: 10px;
        }
        .form-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 15px;
            margin-bottom: 20px;
        }
        .form-group {
            display: flex;
            flex-direction: column;
        }
        .form-group label {
            font-weight: 600;
            margin-bottom: 8px;
            color: #555;
            font-size: 14px;
        }
        .form-group input,
        .form-group select,
        .form-group textarea {
            padding: 10px 15px;
            border: 2px solid #e0e0e0;
            border-radius: 8px;
            font-size: 14px;
            transition: all 0.3s;
        }
        .form-group input:focus,
        .form-group select:focus,
        .form-group textarea:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }
        .form-group textarea {
            resize: vertical;
            min-height: 80px;
        }
        .form-group input[type="color"] {
            height: 45px;
            cursor: pointer;
        }
        .btn {
            padding: 12px 30px;
            border: none;
            border-radius: 8px;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            text-decoration: none;
            display: inline-block;
        }
        .btn-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
        }
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.3);
        }
        .btn-success {
            background: #28a745;
            color: white;
        }
        .btn-warning {
            background: #ffc107;
            color: #333;
        }
        .btn-danger {
            background: #dc3545;
            color: white;
        }
        .btn-secondary {
            background: #6c757d;
            color: white;
        }
        .btn-sm {
            padding: 6px 15px;
            font-size: 13px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background: white;
            border-radius: 10px;
            overflow: hidden;
        }
        thead {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        th {
            padding: 15px;
            text-align: left;
            color: white;
            font-weight: 600;
            font-size: 14px;
        }
        td {
            padding: 12px 15px;
            border-bottom: 1px solid #e0e0e0;
            font-size: 14px;
        }
        tr:hover {
            background: #f8f9fa;
        }
        .status-badge {
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            display: inline-block;
            color: white;
        }
        .color-preview {
            width: 40px;
            height: 40px;
            border-radius: 8px;
            border: 2px solid #ddd;
            display: inline-block;
        }
        .badge-active {
            background: #28a745;
            color: white;
            padding: 4px 10px;
            border-radius: 12px;
            font-size: 11px;
            font-weight: 600;
        }
        .badge-inactive {
            background: #6c757d;
            color: white;
            padding: 4px 10px;
            border-radius: 12px;
            font-size: 11px;
            font-weight: 600;
        }
        .action-buttons {
            display: flex;
            gap: 8px;
        }
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.6);
            backdrop-filter: blur(5px);
        }
        .modal-content {
            background: white;
            margin: 3% auto;
            padding: 0;
            border-radius: 15px;
            width: 90%;
            max-width: 700px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.3);
            animation: slideDown 0.3s;
        }
        @keyframes slideDown {
            from { transform: translateY(-50px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }
        .modal-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 20px 30px;
            border-radius: 15px 15px 0 0;
        }
        .modal-body {
            padding: 30px;
        }
        .close {
            color: white;
            float: right;
            font-size: 32px;
            font-weight: bold;
            cursor: pointer;
            line-height: 20px;
        }
        .close:hover {
            opacity: 0.8;
        }
        .back-link {
            display: inline-block;
            margin-bottom: 20px;
            color: white;
            text-decoration: none;
            font-weight: 600;
            padding: 10px 20px;
            background: rgba(255,255,255,0.2);
            border-radius: 8px;
            transition: all 0.3s;
        }
        .back-link:hover {
            background: rgba(255,255,255,0.3);
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <a href="quanly_tinhtrang_thietbi.php" class="back-link">← Quay lại Quản lý Tình trạng</a>
            <h1>📋 Quản lý Danh mục Status</h1>
            <p>Quản lý tập trung các tình trạng thiết bị trong hệ thống</p>
        </div>
        
        <div class="content">
            <?php if (isset($message)) echo $message; ?>
            
            <!-- Form thêm status mới -->
            <div class="section">
                <h2>➕ Thêm Status Mới</h2>
                <form method="POST">
                    <div class="form-grid">
                        <div class="form-group">
                            <label>Mã Status: <span style="color:red">*</span></label>
                            <input type="text" name="ma_status" required placeholder="VD: TOT, DANG_SC" 
                                   pattern="[A-Z_]+" title="Chỉ chữ in hoa và dấu gạch dưới">
                            <small style="color: #999; margin-top: 5px;">Chỉ chữ IN HOA và dấu _ (không dấu)</small>
                        </div>
                        
                        <div class="form-group">
                            <label>Tên Status: <span style="color:red">*</span></label>
                            <input type="text" name="ten_status" required placeholder="VD: Tốt">
                        </div>
                        
                        <div class="form-group">
                            <label>Màu hiển thị:</label>
                            <input type="color" name="mau_hienthi" value="#007bff">
                        </div>
                        
                        <div class="form-group">
                            <label>Mức độ:</label>
                            <select name="muc_do">
                                <option value="normal">Normal</option>
                                <option value="success">Success (Xanh lá)</option>
                                <option value="info">Info (Xanh dương)</option>
                                <option value="warning">Warning (Vàng)</option>
                                <option value="danger">Danger (Đỏ)</option>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label>Thứ tự:</label>
                            <input type="number" name="thu_tu" value="0" min="0">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label>Mô tả:</label>
                        <textarea name="mo_ta" placeholder="Mô tả chi tiết về status này..."></textarea>
                    </div>
                    
                    <button type="submit" name="add_status" class="btn btn-primary">💾 Thêm Status</button>
                </form>
            </div>
            
            <!-- Danh sách status -->
            <div class="section">
                <h2>📊 Danh sách Status</h2>
                <p style="margin-bottom: 15px; color: #666;">
                    Tổng số: <strong><?php echo count($status_list); ?></strong> status
                </p>
                
                <div style="overflow-x: auto;">
                    <table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Mã Status</th>
                                <th>Tên Status</th>
                                <th>Màu</th>
                                <th>Mức độ</th>
                                <th>Thứ tự</th>
                                <th>Trạng thái</th>
                                <th>Mô tả</th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (count($status_list) > 0): ?>
                                <?php foreach ($status_list as $status): ?>
                                <tr>
                                    <td><?php echo $status['id']; ?></td>
                                    <td><code><?php echo $status['ma_status']; ?></code></td>
                                    <td>
                                        <span class="status-badge" style="background: <?php echo $status['mau_hienthi']; ?>">
                                            <?php echo $status['ten_status']; ?>
                                        </span>
                                    </td>
                                    <td>
                                        <div class="color-preview" style="background: <?php echo $status['mau_hienthi']; ?>"></div>
                                        <small style="display: block; margin-top: 5px;"><?php echo $status['mau_hienthi']; ?></small>
                                    </td>
                                    <td><?php echo ucfirst($status['muc_do']); ?></td>
                                    <td><?php echo $status['thu_tu']; ?></td>
                                    <td>
                                        <?php if ($status['kich_hoat']): ?>
                                            <span class="badge-active">✓ Kích hoạt</span>
                                        <?php else: ?>
                                            <span class="badge-inactive">✗ Vô hiệu</span>
                                        <?php endif; ?>
                                    </td>
                                    <td><?php echo substr($status['mo_ta'], 0, 50) . (strlen($status['mo_ta']) > 50 ? '...' : ''); ?></td>
                                    <td>
                                        <div class="action-buttons">
                                            <button class="btn btn-warning btn-sm" 
                                                    onclick="editStatus(<?php echo htmlspecialchars(json_encode($status)); ?>)">
                                                ✏️ Sửa
                                            </button>
                                            <?php if ($status['kich_hoat']): ?>
                                                <a href="?delete=soft&id=<?php echo $status['id']; ?>" 
                                                   class="btn btn-secondary btn-sm"
                                                   onclick="return confirm('Vô hiệu hóa status này?')">
                                                    🔒 Vô hiệu
                                                </a>
                                            <?php else: ?>
                                                <a href="?delete=hard&id=<?php echo $status['id']; ?>" 
                                                   class="btn btn-danger btn-sm"
                                                   onclick="return confirm('XÓA VĨNH VIỄN status này?')">
                                                    🗑️ Xóa
                                                </a>
                                            <?php endif; ?>
                                        </div>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="9" style="text-align: center; padding: 30px; color: #999;">
                                        Chưa có status nào trong danh mục
                                    </td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Modal sửa status -->
    <div id="editModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <span class="close" onclick="closeEditModal()">&times;</span>
                <h2>✏️ Chỉnh sửa Status</h2>
            </div>
            <div class="modal-body">
                <form method="POST">
                    <input type="hidden" name="id" id="edit_id">
                    
                    <div class="form-grid">
                        <div class="form-group">
                            <label>Mã Status:</label>
                            <input type="text" id="edit_ma_status" readonly style="background: #f0f0f0;">
                        </div>
                        
                        <div class="form-group">
                            <label>Tên Status: <span style="color:red">*</span></label>
                            <input type="text" name="ten_status" id="edit_ten_status" required>
                        </div>
                        
                        <div class="form-group">
                            <label>Màu hiển thị:</label>
                            <input type="color" name="mau_hienthi" id="edit_mau_hienthi">
                        </div>
                        
                        <div class="form-group">
                            <label>Mức độ:</label>
                            <select name="muc_do" id="edit_muc_do">
                                <option value="normal">Normal</option>
                                <option value="success">Success</option>
                                <option value="info">Info</option>
                                <option value="warning">Warning</option>
                                <option value="danger">Danger</option>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label>Thứ tự:</label>
                            <input type="number" name="thu_tu" id="edit_thu_tu" min="0">
                        </div>
                        
                        <div class="form-group">
                            <label>
                                <input type="checkbox" name="kich_hoat" id="edit_kich_hoat" value="1">
                                Kích hoạt
                            </label>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label>Mô tả:</label>
                        <textarea name="mo_ta" id="edit_mo_ta"></textarea>
                    </div>
                    
                    <button type="submit" name="update_status" class="btn btn-success">💾 Lưu thay đổi</button>
                    <button type="button" class="btn btn-secondary" onclick="closeEditModal()">✖️ Hủy</button>
                </form>
            </div>
        </div>
    </div>
    
    <script>
        function editStatus(status) {
            document.getElementById('edit_id').value = status.id;
            document.getElementById('edit_ma_status').value = status.ma_status;
            document.getElementById('edit_ten_status').value = status.ten_status;
            document.getElementById('edit_mau_hienthi').value = status.mau_hienthi;
            document.getElementById('edit_muc_do').value = status.muc_do;
            document.getElementById('edit_thu_tu').value = status.thu_tu;
            document.getElementById('edit_mo_ta').value = status.mo_ta;
            document.getElementById('edit_kich_hoat').checked = status.kich_hoat == 1;
            
            document.getElementById('editModal').style.display = 'block';
        }
        
        function closeEditModal() {
            document.getElementById('editModal').style.display = 'none';
        }
        
        window.onclick = function(event) {
            var modal = document.getElementById('editModal');
            if (event.target == modal) {
                closeEditModal();
            }
        }
    </script>
</body>
</html>
