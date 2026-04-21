<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>🚨 CRITICAL FIX: ISO2 Permission Queries</title>
    <style>
        body { font-family: 'Segoe UI', Tahoma, sans-serif; padding: 20px; background: #f5f5f5; }
        .container { max-width: 1200px; margin: 0 auto; background: white; padding: 30px; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
        h1 { color: #d32f2f; }
        .status { padding: 15px; margin: 15px 0; border-radius: 5px; }
        .success { background: #e8f5e9; border-left: 4px solid #4caf50; }
        .warning { background: #fff3cd; border-left: 4px solid #ff9800; }
        .error { background: #ffebee; border-left: 4px solid #f44336; }
        .info { background: #e3f2fd; border-left: 4px solid #2196f3; }
        pre { background: #f5f5f5; padding: 15px; border-radius: 5px; overflow-x: auto; }
        .step { margin: 20px 0; padding: 20px; background: #fafafa; border-left: 4px solid #2196f3; }
        .code { font-family: 'Courier New', monospace; background: #263238; color: #aed581; padding: 2px 6px; border-radius: 3px; }
        button { background: #4caf50; color: white; border: none; padding: 12px 24px; font-size: 16px; border-radius: 5px; cursor: pointer; margin: 5px; }
        button:hover { background: #45a049; }
        button.secondary { background: #2196f3; }
        button.danger { background: #f44336; }
        table { width: 100%; border-collapse: collapse; margin: 15px 0; }
        th, td { padding: 12px; text-align: left; border-bottom: 1px solid #ddd; }
        th { background: #f5f5f5; font-weight: 600; }
    </style>
</head>
<body>
<div class="container">
    <h1>🚨 CRITICAL FIX: Hồ sơ vẫn hiển thị tạm dừng sau khi tiếp tục</h1>
    
    <?php
    $file = 'formsc.php';
    
    if (!file_exists($file)) {
        echo '<div class="status error">❌ KHÔNG tìm thấy file formsc.php!</div>';
        exit;
    }
    
    // Đọc file
    $content = file_get_contents($file);
    $original_content = $content;
    
    // Patterns cần thay
    $patterns = [
        [
            'from' => "FROM hososcbd_tamdung WHERE trangthai='dang_tam_dung'",
            'to' => "FROM v_hososcbd_tamdung_current WHERE trangthai='dang_tam_dung'",
            'description' => 'Dùng VIEW lấy current state'
        ]
    ];
    
    // Kiểm tra nếu có tham số đến từ form
    if (isset($_POST['action'])) {
        $action = $_POST['action'];
        
        if ($action === 'preview') {
            echo '<div class="status info">📋 PREVIEW MODE - Không thay đổi file</div>';
            
            // Tìm tất cả vị trí cần thay
            $lines = explode("\n", $content);
            $matches = [];
            
            foreach ($lines as $line_num => $line) {
                if (strpos($line, $patterns[0]['from']) !== false) {
                    // Kiểm tra KHÔNG phải INSERT query
                    if (stripos($line, 'INSERT INTO hososcbd_tamdung') === false) {
                        $matches[] = [
                            'line' => $line_num + 1,
                            'old' => $line,
                            'new' => str_replace($patterns[0]['from'], $patterns[0]['to'], $line)
                        ];
                    }
                }
            }
            
            if (empty($matches)) {
                echo '<div class="status warning">⚠️ KHÔNG tìm thấy pattern nào cần thay!</div>';
                echo '<p>Có thể:</p><ul>';
                echo '<li>✅ Code đã được fix trước đó</li>';
                echo '<li>❌ Pattern search không chính xác</li>';
                echo '<li>🔍 File không phải formsc.php đúng</li>';
                echo '</ul>';
            } else {
                echo '<div class="status success">✅ Tìm thấy ' . count($matches) . ' vị trí cần thay</div>';
                
                echo '<table>';
                echo '<tr><th>Line</th><th>Trước (OLD)</th><th>Sau (NEW)</th></tr>';
                foreach ($matches as $match) {
                    echo '<tr>';
                    echo '<td><strong>' . $match['line'] . '</strong></td>';
                    echo '<td><code style="color:red;">' . htmlspecialchars(trim($match['old'])) . '</code></td>';
                    echo '<td><code style="color:green;">' . htmlspecialchars(trim($match['new'])) . '</code></td>';
                    echo '</tr>';
                }
                echo '</table>';
                
                echo '<form method="post" style="margin-top:20px;">';
                echo '<input type="hidden" name="action" value="apply">';
                echo '<button type="submit" class="danger">✅ ÁP DỤNG THAY ĐỔI (Backup tự động)</button>';
                echo ' <button type="button" onclick="location.reload()">🔄 Refresh</button>';
                echo '</form>';
            }
            
        } elseif ($action === 'apply') {
            // Backup file
            $backup_file = 'formsc_before_iso2_fix_' . date('YmdHis') . '.php.bak';
            file_put_contents($backup_file, $original_content);
            echo '<div class="status success">✅ Đã backup: ' . $backup_file . '</div>';
            
            // Apply changes
            $replace_count = 0;
            $lines = explode("\n", $content);
            
            foreach ($lines as $line_num => &$line) {
                if (strpos($line, $patterns[0]['from']) !== false) {
                    // Kiểm tra KHÔNG phải INSERT query
                    if (stripos($line, 'INSERT INTO hososcbd_tamdung') === false) {
                        $line = str_replace($patterns[0]['from'], $patterns[0]['to'], $line);
                        $replace_count++;
                    }
                }
            }
            
            $new_content = implode("\n", $lines);
            file_put_contents($file, $new_content);
            
            echo '<div class="status success">';
            echo '✅ ĐÃ ÁP DỤNG: ' . $replace_count . ' thay đổi<br>';
            echo '<strong>File:</strong> ' . $file . '<br>';
            echo '<strong>Backup:</strong> ' . $backup_file;
            echo '</div>';
            
            echo '<div class="status warning">';
            echo '<h3>⚠️ BƯỚC TIẾP THEO:</h3>';
            echo '<ol>';
            echo '<li>Chạy file SQL: <code>CRITICAL_FIX_CREATE_VIEW.sql</code> trong phpMyAdmin</li>';
            echo '<li>Test chức năng:';
            echo '<ul>';
            echo '<li>Tạm dừng hồ sơ → Cảnh báo xuất hiện</li>';
            echo '<li>Tiếp tục hồ sơ → Cảnh báo BIẾN MẤT</li>';
            echo '<li>User thường không thấy hồ sơ đã tiếp tục trong dropdown</li>';
            echo '</ul></li>';
            echo '<li>Nếu có lỗi, restore: <code>cp ' . $backup_file . ' formsc.php</code></li>';
            echo '</ol>';
            echo '</div>';
        }
    } else {
        // Display intro
        echo '<div class="status warning">';
        echo '<h2>🐛 VẤN ĐỀ</h2>';
        echo '<p>Sau khi chuyển sang ISO2 (event-sourcing), khi tiếp tục hồ sơ:</p>';
        echo '<ul>';
        echo '<li>✅ Backend INSERT record mới với trangthai=\'da_tiep_tuc\' (ĐÚNG)</li>';
        echo '<li>❌ <strong>Cảnh báo vàng vẫn hiển thị</strong> (SAI!)</li>';
        echo '<li>❌ <strong>User thường vẫn thấy hồ sơ trong dropdown</strong> (SAI!)</li>';
        echo '</ul>';
        echo '</div>';
        
        echo '<div class="status error">';
        echo '<h2>🔍 NGUYÊN NHÂN</h2>';
        echo '<p>Permission queries đang check:</p>';
        echo '<pre>hoso IN (SELECT hoso FROM hososcbd_tamdung WHERE trangthai=\'dang_tam_dung\')</pre>';
        echo '<p><strong>Vấn đề:</strong> Với ISO2, nếu hồ sơ ABC có:</p>';
        echo '<ul>';
        echo '<li>Record 10: pause (10:00)</li>';
        echo '<li>Record 11: resume (15:00)</li>';
        echo '</ul>';
        echo '<p>→ Subquery vẫn trả về "ABC" vì record 10 còn tồn tại, <strong>DÙ ĐÃ RESUME RỒI</strong>!</p>';
        echo '</div>';
        
        echo '<div class="status success">';
        echo '<h2>✅ GIẢI PHÁP</h2>';
        echo '<p>Dùng VIEW <code class="code">v_hososcbd_tamdung_current</code> để lấy CHỈ record MỚI NHẤT:</p>';
        echo '<pre>hoso IN (SELECT hoso FROM v_hososcbd_tamdung_current WHERE trangthai=\'dang_tam_dung\')</pre>';
        echo '</div>';
        
        echo '<div class="step">';
        echo '<h2>📋 BƯỚC THỰC HIỆN</h2>';
        echo '<h3>BƯỚC 1: Preview thay đổi</h3>';
        echo '<form method="post">';
        echo '<input type="hidden" name="action" value="preview">';
        echo '<button type="submit" class="secondary">🔍 PREVIEW - Xem trước</button>';
        echo '</form>';
        echo '</div>';
        
        echo '<div class="status info">';
        echo '<h3>📊 THỐNG KÊ</h3>';
        echo '<p><strong>File size:</strong> ' . number_format(strlen($content)) . ' bytes</p>';
        echo '<p><strong>Pattern search:</strong> <code>' . htmlspecialchars($patterns[0]['from']) . '</code></p>';
        echo '</div>';
    }
    ?>
    
</div>
</body>
</html>
