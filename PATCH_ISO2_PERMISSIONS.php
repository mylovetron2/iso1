<?php
/**
 * =====================================================
 * PATCH SCRIPT: ISO2 Permission Queries Update
 * =====================================================
 * Tự động thay thế các queries permission để dùng VIEW
 * v_hososcbd_tamdung_current thay vì hososcbd_tamdung
 * 
 * CÁCH DÙNG:
 * 1. Chạy script này để tạo file formsc_iso2_patched.php
 * 2. So sánh diff giữa formsc.php và formsc_iso2_patched.php
 * 3. Nếu OK, backup formsc.php rồi replace
 * =====================================================
 */

// Đọc file gốc
$file = 'formsc.php';
$content = file_get_contents($file);

if (!$content) {
    die("ERROR: Không thể đọc file $file\n");
}

// Backup
$backup_file = 'formsc_before_iso2_patch.php.bak';
file_put_contents($backup_file, $content);
echo "✅ Backup file gốc: $backup_file\n";

// Pattern 1: UPDATE permission queries để dùng VIEW
// CHỈ thay ở SELECT subqueries, KHÔNG thay ở INSERT/UPDATE statements
$patterns = [
    // Pattern: SELECT ... FROM hososcbd_tamdung WHERE trangthai='dang_tam_dung'
    // NHƯNG KHÔNG nằm trong INSERT/UPDATE
    [
        'search' => "FROM hososcbd_tamdung WHERE trangthai='dang_tam_dung'",
        'replace' => "FROM v_hososcbd_tamdung_current WHERE trangthai='dang_tam_dung'",
        'description' => 'Permission queries sử dụng VIEW thay vì bảng gốc'
    ],
    
    // Pattern: IN (SELECT hoso FROM hososcbd_tamdung WHERE trangthai=...)
    [
        'search' => "IN (SELECT hoso FROM hososcbd_tamdung WHERE trangthai='dang_tam_dung')",
        'replace' => "IN (SELECT hoso FROM v_hososcbd_tamdung_current WHERE trangthai='dang_tam_dung')",
        'description' => 'Subquery permission check'
    ],
    
    // Pattern: NOT IN (SELECT hoso FROM hososcbd_tamdung WHERE trangthai=...)
    [
        'search' => "NOT IN (SELECT hoso FROM hososcbd_tamdung WHERE trangthai='dang_tam_dung')",
        'replace' => "NOT IN (SELECT hoso FROM v_hososcbd_tamdung_current WHERE trangthai='dang_tam_dung')",
        'description' => 'Negative subquery permission check'
    ],
];

// Apply replacements
$replaced_count = [];
foreach ($patterns as $pattern) {
    $before = $content;
    $content = str_replace($pattern['search'], $pattern['replace'], $content);
    $count = substr_count($before, $pattern['search']);
    $replaced_count[$pattern['description']] = $count;
    
    if ($count > 0) {
        echo "✅ {$pattern['description']}: $count replacements\n";
    }
}

// Warning: Kiểm tra INSERT queries không bị thay nhầm
if (strpos($content, "INSERT INTO v_hososcbd_tamdung_current") !== false) {
    echo "⚠️  WARNING: Phát hiện INSERT vào VIEW - KHÔNG ĐƯỢC PHÉP!\n";
    echo "   Script sẽ KHÔNG lưu file. Hãy kiểm tra lại.\n";
    exit(1);
}

// Lưu file mới
$output_file = 'formsc_iso2_patched.php';
file_put_contents($output_file, $content);
echo "✅ File đã patch: $output_file\n\n";

// Summary
echo "📊 SUMMARY:\n";
echo "=========================================\n";
$total_replacements = array_sum($replaced_count);
echo "Tổng số thay thế: $total_replacements\n\n";

foreach ($replaced_count as $desc => $count) {
    echo "- $desc: $count\n";
}

echo "\n📋 NEXT STEPS:\n";
echo "=========================================\n";
echo "1. So sánh diff:\n";
echo "   diff formsc.php formsc_iso2_patched.php\n";
echo "   HOẶC dùng VS Code Compare Files\n\n";
echo "2. Nếu OK, áp dụng patch:\n";
echo "   cp formsc.php formsc_before_iso2.php.bak  (backup lần 2)\n";
echo "   cp formsc_iso2_patched.php formsc.php\n\n";
echo "3. Test kỹ chức năng permission:\n";
echo "   - User thường không thấy hồ sơ đã kết thúc\n";
echo "   - User thường THẤY hồ sơ đang tạm dừng\n";
echo "   - Admin thấy tất cả\n\n";

echo "⚠️  LƯU Ý:\n";
echo "=========================================\n";
echo "- Chỉ chạy sau khi ĐÃ tạo VIEW v_hososcbd_tamdung_current\n";
echo "- Đã có script: create_iso2_helper_view.sql\n";
echo "- Test trên server dev trước khi apply vào production\n\n";

// Kiểm tra xem VIEW đã tồn tại chưa
echo "🔍 CHECKING VIEW...\n";
echo "=========================================\n";
echo "Chạy query này trong phpMyAdmin để kiểm tra VIEW:\n\n";
echo "SHOW CREATE VIEW v_hososcbd_tamdung_current;\n\n";
echo "Nếu lỗi 'View not found', hãy chạy file:\n";
echo "  create_iso2_helper_view.sql\n\n";

?>
