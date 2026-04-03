<?php
/**
 * GIAO DIỆN QUẢN LÝ TÌNH TRẠNG THIẾT BỊ
 * Cho phép cập nhật và xem status của thiết bị
 */

include("select_data.php");
include("manage_thietbi_status.php");

if(!isset($_SESSION)){
   session_start();
}

// Xử lý cập nhật status
if (isset($_POST['update_status'])) {
    $stt_thietbi = $_POST['stt_thietbi'];
    $ma_status = $_POST['ma_status'];
    $ghichu = $_POST['ghichu'];
    $nguoi_capnhat = isset($_SESSION['username']) ? $_SESSION['username'] : 'Admin';
    
    if (update_thietbi_status($stt_thietbi, $ma_status, $nguoi_capnhat, $ghichu)) {
        $message = "<div style='color: green; padding: 10px; background: #d4edda; border: 1px solid #c3e6cb; margin: 10px 0; border-radius: 5px;'>✓ Cập nhật tình trạng thiết bị thành công!</div>";
    } else {
        $message = "<div style='color: red; padding: 10px; background: #f8d7da; border: 1px solid #f5c6cb; margin: 10px 0; border-radius: 5px;'>✗ Có lỗi xảy ra khi cập nhật!</div>";
    }
}

// Lấy danh sách status từ danh mục
$status_list_danhmuc = get_all_status_list(true); // Chỉ lấy status đang kích hoạt

// Lọc theo status nếu có
$filter_ma_status = isset($_GET['filter_status']) ? $_GET['filter_status'] : '';
$search_text = isset($_GET['search']) ? $_GET['search'] : '';

// Tạo WHERE clause
$where_parts = array();
if (!empty($filter_ma_status)) {
    $filter_ma_status_sql = mysql_real_escape_string($filter_ma_status);
    $where_parts[] = "ma_status = '$filter_ma_status_sql'";
}
if (!empty($search_text)) {
    $search_text_sql = mysql_real_escape_string($search_text);
    $where_parts[] = "(tenvt LIKE '%$search_text_sql%' OR somay LIKE '%$search_text_sql%' OR mavt LIKE '%$search_text_sql%')";
}
$where_clause = !empty($where_parts) ? implode(' AND ', $where_parts) : '';

// Lấy danh sách thiết bị
$result = get_thietbi_with_status($where_clause, 'madv ASC, somay ASC');

// Thống kê
$status_counts = count_thietbi_by_status();

?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
    <title>Quản lý Tình trạng Thiết bị</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f5f5f5;
        }
        .container {
            max-width: 1400px;
            margin: 0 auto;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        h1 {
            color: #333;
            border-bottom: 3px solid #007bff;
            padding-bottom: 10px;
        }
        h2 {
            color: #555;
            margin-top: 30px;
        }
        .stats-container {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
            margin: 20px 0;
        }
        .stat-box {
            flex: 1;
            min-width: 150px;
            padding: 15px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border-radius: 8px;
            text-align: center;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .stat-box.active { background: linear-gradient(135deg, #11998e 0%, #38ef7d 100%); }
        .stat-box.maintenance { background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%); }
        .stat-box.broken { background: linear-gradient(135deg, #fa709a 0%, #fee140 100%); }
        .stat-number {
            font-size: 32px;
            font-weight: bold;
        }
        .stat-label {
            font-size: 14px;
            margin-top: 5px;
        }
        .filter-container {
            background: #f8f9fa;
            padding: 15px;
            border-radius: 5px;
            margin: 20px 0;
        }
        .filter-container input, .filter-container select {
            padding: 8px;
            margin: 5px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        .filter-container button {
            padding: 8px 20px;
            background: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .filter-container button:hover {
            background: #0056b3;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #007bff;
            color: white;
            font-weight: bold;
            position: sticky;
            top: 0;
        }
        tr:hover {
            background-color: #f5f5f5;
        }
        .status-badge {
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: bold;
            display: inline-block;
        }
        .status-active { background: #28a745; color: white; }
        .status-maintenance { background: #ffc107; color: #333; }
        .status-broken { background: #dc3545; color: white; }
        .status-stopped { background: #6c757d; color: white; }
        .status-unknown { background: #e9ecef; color: #333; }
        .btn {
            padding: 6px 12px;
            background: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
            font-size: 12px;
        }
        .btn:hover {
            background: #0056b3;
        }
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0,0,0,0.5);
        }
        .modal-content {
            background-color: white;
            margin: 5% auto;
            padding: 30px;
            border-radius: 8px;
            width: 90%;
            max-width: 600px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }
        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
        }
        .close:hover {
            color: #000;
        }
        .form-group {
            margin: 15px 0;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #555;
        }
        .form-group input, .form-group select, .form-group textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }
        .form-group textarea {
            resize: vertical;
            min-height: 80px;
        }
        .btn-submit {
            background: #28a745;
            padding: 10px 30px;
            font-size: 16px;
            margin-top: 10px;
        }
        .btn-submit:hover {
            background: #218838;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>📊 Quản lý Tình trạng Thiết bị</h1>
        
        <?php if (isset($message)) echo $message; ?>
        
        <!-- Nút quản lý danh mục -->
        <div style="text-align: right; margin-bottom: 20px;">
            <a href="danhmuc_status.php" class="btn" style="background: #6610f2; color: white; text-decoration: none;">
                ⚙️ Quản lý Danh mục Status
            </a>
        </div>
        
        <!-- Thống kê -->
        <div class="stats-container">
            <?php foreach ($status_counts as $status => $count): 
                $class = '';
                if (strpos($status, 'Tốt') !== false || strpos($status, 'Đang hoạt động') !== false) $class = 'active';
                elseif (strpos($status, 'Bảo dưỡng') !== false || strpos($status, 'Sửa chữa') !== false || strpos($status, 'Tạm dừng') !== false || strpos($status, 'Chờ') !== false) $class = 'maintenance';
                elseif (strpos($status, 'Hỏng') !== false || strpos($status, 'Thanh lý') !== false) $class = 'broken';
            ?>
            <div class="stat-box <?php echo $class; ?>">
                <div class="stat-number"><?php echo $count; ?></div>
                <div class="stat-label"><?php echo $status; ?></div>
            </div>
            <?php endforeach; ?>
        </div>
        
        <!-- Bộ lọc -->
        <div class="filter-container">
            <form method="GET" style="display: flex; flex-wrap: wrap; align-items: center; gap: 10px;">
                <div>
                    <input type="text" name="search" placeholder="Tìm theo tên, số máy, mã VT..." 
                           value="<?php echo htmlspecialchars($search_text); ?>" style="width: 250px;">
                </div>
                <div>
                    <select name="filter_status">
                        <option value="">-- Tất cả tình trạng --</option>
                        <?php foreach ($status_list_danhmuc as $st): ?>
                            <option value="<?php echo htmlspecialchars($st['ma_status']); ?>" 
                                    <?php echo ($filter_ma_status == $st['ma_status']) ? 'selected' : ''; ?>>
                                <?php echo $st['ten_status']; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <button type="submit">🔍 Lọc</button>
                <a href="?" style="margin-left: 10px; color: #007bff; text-decoration: none;">↻ Làm mới</a>
            </form>
        </div>
        
        <!-- Bảng danh sách -->
        <h2>Danh sách Thiết bị</h2>
        <div style="overflow-x: auto;">
            <table>
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Mã máy</th>
                        <th>Số máy</th>
                        <th>Tên thiết bị</th>
                        <th>Mã VT</th>
                        <th>Bộ phận</th>
                        <th>Tình trạng</th>
                        <th>Cập nhật lúc</th>
                        <th>Người cập nhật</th>
                        <th>Ghi chú</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    if ($result && mysql_num_rows($result) > 0):
                        while ($row = mysql_fetch_assoc($result)): 
                            // Determine status badge class
                            $badge_class = 'status-unknown';
                            if (strpos($row['status'], 'Đang hoạt động') !== false) $badge_class = 'status-active';
                            elseif (strpos($row['status'], 'Bảo dưỡng') !== false || strpos($row['status'], 'Sửa chữa') !== false || strpos($row['status'], 'Chờ') !== false) $badge_class = 'status-maintenance';
                            elseif (strpos($row['status'], 'Hỏng') !== false) $badge_class = 'status-broken';
                            elseif (strpos($row['status'], 'Dừng') !== false) $badge_class = 'status-stopped';
                    ?>
                    <tr>
                        <td><?php echo $row['stt']; ?></td>
                        <td><?php echo $row['mamay']; ?></td>
                        <td><?php echo $row['somay']; ?></td>
                        <td><?php echo $row['tenvt']; ?></td>
                        <td><?php echo $row['mavt']; ?></td>
                        <td><?php echo $row['madv']; ?></td>
                        <td>
                            <?php if ($row['status_mau']): ?>
                                <span class="status-badge" style="background: <?php echo $row['status_mau']; ?>; color: white;">
                                    <?php echo $row['status']; ?>
                                </span>
                            <?php else: ?>
                                <span class="status-badge <?php echo $badge_class; ?>">
                                    <?php echo $row['status']; ?>
                                </span>
                            <?php endif; ?>
                        </td>
                        <td><?php echo $row['ngay_capnhat'] ? date('d/m/Y H:i', strtotime($row['ngay_capnhat'])) : '-'; ?></td>
                        <td><?php echo $row['nguoi_capnhat'] ? $row['nguoi_capnhat'] : '-'; ?></td>
                        <td><?php echo $row['status_ghichu'] ? substr($row['status_ghichu'], 0, 30) . '...' : '-'; ?></td>
                        <td>
                            <button class="btn" onclick="openUpdateModal(<?php 
                                echo $row['stt']; ?>, '<?php 
                                echo addslashes($row['tenvt']); ?>', '<?php 
                                echo addslashes($row['somay']); ?>', '<?php 
                                echo $row['ma_status'] ? addslashes($row['ma_status']) : ''; ?>', '<?php 
                                echo $row['status_ghichu'] ? addslashes($row['status_ghichu']) : ''; ?>')">
                                ✏️ Cập nhật
                            </button>
                        </td>
                    </tr>
                    <?php 
                        endwhile;
                    else:
                    ?>
                    <tr>
                        <td colspan="11" style="text-align: center; padding: 30px; color: #999;">
                            Không tìm thấy thiết bị nào
                        </td>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
    
    <!-- Modal cập nhật status -->
    <div id="updateModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeUpdateModal()">&times;</span>
            <h2>Cập nhật Tình trạng Thiết bị</h2>
            
            <form method="POST" action="">
                <input type="hidden" name="stt_thietbi" id="modal_stt">
                
                <div class="form-group">
                    <label>Thiết bị:</label>
                    <input type="text" id="modal_thietbi_info" readonly style="background: #f0f0f0;">
                </div>
                
                <div class="form-group">
                    <label>Tình trạng: <span style="color: red;">*</span></label>
                    <select name="ma_status" id="modal_status" required style="padding: 10px;">
                        <option value="">-- Chọn tình trạng --</option>
                        <?php foreach ($status_list_danhmuc as $st): ?>
                        <option value="<?php echo $st['ma_status']; ?>" 
                                style="background: <?php echo $st['mau_hienthi']; ?>; color: white; font-weight: bold;">
                            <?php echo $st['ten_status']; ?>
                            <?php if ($st['mo_ta']): ?>
                                - <?php echo substr($st['mo_ta'], 0, 40); ?>...
                            <?php endif; ?>
                        </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                
                <div class="form-group">
                    <label>Ghi chú:</label>
                    <textarea name="ghichu" id="modal_ghichu" placeholder="Nhập ghi chú về tình trạng..."></textarea>
                </div>
                
                <button type="submit" name="update_status" class="btn btn-submit">💾 Lưu thay đổi</button>
            </form>
        </div>
    </div>
    
    <script>
        function openUpdateModal(stt, tenvt, somay, current_status, ghichu) {
            document.getElementById('modal_stt').value = stt;
            document.getElementById('modal_thietbi_info').value = somay + ' - ' + tenvt;
            document.getElementById('modal_status').value = current_status;
            document.getElementById('modal_ghichu').value = ghichu || '';
            document.getElementById('updateModal').style.display = 'block';
        }
        
        function closeUpdateModal() {
            document.getElementById('updateModal').style.display = 'none';
        }
        
        // Close modal khi click bên ngoài
        window.onclick = function(event) {
            var modal = document.getElementById('updateModal');
            if (event.target == modal) {
                closeUpdateModal();
            }
        }
    </script>
</body>
</html>
