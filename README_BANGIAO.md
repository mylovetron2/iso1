# HỆ THỐNG BÀN GIAO THIẾT BỊ - TÀI LIỆU HƯỚNG DẪN

## 📋 TỔNG QUAN

Package này chứa đầy đủ tài liệu và code mẫu để implement logic xuất biên bản bàn giao thiết bị sau sửa chữa/bảo dưỡng. Bạn có thể sử dụng trực tiếp hoặc tham khảo để áp dụng vào project của mình.

## 📁 CẤU TRÚC FILE

```
├── LOGIC_XUAT_BIEN_BAN_BAN_GIAO.md    # Tài liệu mô tả logic chi tiết
├── create_bangiao_tables.sql           # SQL script tạo database
├── sample_bangiao.php                  # Code PHP mẫu (MySQLi)
└── README_BANGIAO.md                   # File này
```

## 🚀 HƯỚNG DẪN SỬ DỤNG

### BƯỚC 1: ĐỌC TÀI LIỆU

Đọc file `LOGIC_XUAT_BIEN_BAN_BAN_GIAO.md` để hiểu:
- Quy trình nghiệp vụ
- Cấu trúc database
- Logic xử lý từng bước
- Điều kiện và quy tắc nghiệp vụ

### BƯỚC 2: TẠO DATABASE

```bash
# 1. Mở phpMyAdmin hoặc MySQL client
# 2. Tạo database mới (nếu chưa có)
CREATE DATABASE iso_database CHARACTER SET utf8 COLLATE utf8_general_ci;

# 3. Import file SQL
mysql -u root -p iso_database < create_bangiao_tables.sql

# Hoặc copy nội dung file SQL và chạy trong phpMyAdmin
```

### BƯỚC 3: KIỂM TRA DATABASE

```sql
-- Xem các bảng đã tạo
SHOW TABLES;

-- Xem cấu trúc bảng chính
DESCRIBE hososcbd_iso;
DESCRIBE thietbi_iso;

-- Xem views
SELECT * FROM v_thietbi_cho_bangiao;
```

### BƯỚC 4: CHẠY CODE MẪU

```bash
# 1. Copy file sample_bangiao.php vào web server
cp sample_bangiao.php /var/www/html/

# 2. Cấu hình kết nối database trong file
# Sửa dòng 23-26:
$host = 'localhost';
$username = 'root';
$password = 'your_password';
$database = 'iso_database';

# 3. Truy cập qua browser
http://localhost/sample_bangiao.php?action=hien_thi_form_bangiao
```

### BƯỚC 5: TÍCH HỢP VÀO PROJECT

#### Option 1: Sử dụng MySQLi (như file mẫu)
```php
// Đã có sẵn trong sample_bangiao.php
$conn = new mysqli($host, $username, $password, $database);
```

#### Option 2: Chuyển sang PDO
```php
// Thay thế các đoạn code MySQLi
$pdo = new PDO("mysql:host=$host;dbname=$database;charset=utf8", $username, $password);

// Prepare statement
$stmt = $pdo->prepare("SELECT * FROM hososcbd_iso WHERE hoso = ?");
$stmt->execute([$hoso]);
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
```

#### Option 3: Framework (Laravel, CodeIgniter, etc.)
```php
// Laravel Eloquent
$devices = DB::table('hososcbd_iso')
    ->where('phieu', $phieu)
    ->get();

// CodeIgniter
$devices = $this->db->where('phieu', $phieu)
                    ->get('hososcbd_iso')
                    ->result_array();
```

## 🔧 TÙY CHỈNH CHO PROJECT CỦA BẠN

### 1. Thay đổi tên bảng
```sql
-- Nếu bảng của bạn có tên khác
ALTER TABLE bang_thiet_bi RENAME TO hososcbd_iso;
```

### 2. Thêm/bớt trường
```sql
-- Thêm trường mới
ALTER TABLE hososcbd_iso ADD COLUMN trang_thai VARCHAR(50);

-- Sửa code PHP tương ứng
$trang_thai = $device['trang_thai'] ?? '';
```

### 3. Thay đổi format số phiếu
```php
// Trong code, tìm đoạn format số phiếu (dòng ~65)
// Sửa logic theo yêu cầu, ví dụ:

// Format: BG-2024-0001
$year = date('Y');
$phieu_format = "BG-$year-" . str_pad($max_phieu, 4, '0', STR_PAD_LEFT);
```

### 4. Thay đổi template biên bản
```php
// Trong phần in biên bản (dòng ~400)
// Sửa HTML theo mẫu của công ty bạn
```

### 5. Xuất file Word thực sự (thay vì HTML)
```bash
# Cài đặt PHPWord
composer require phpoffice/phpword

# Sử dụng trong code
use PhpOffice\PhpWord\PhpWord;

$phpWord = new PhpWord();
$section = $phpWord->addSection();
$section->addText('BIÊN BẢN BÀN GIAO THIẾT BỊ', ['bold' => true, 'size' => 16]);
// ... thêm nội dung

$objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
$objWriter->save('bienban.docx');
```

## 📊 TEST CASES

### Test Case 1: Bàn giao thiết bị mới
```sql
-- Chuẩn bị dữ liệu test
INSERT INTO hososcbd_iso (hoso, phieu, maql, mavt, somay, ngaykt, bg) 
VALUES 
('HS001', '0001', 'QL001', 'GPS', '001', '2024-04-07', 0),
('HS002', '0001', 'QL001', 'MAG', '002', '2024-04-07', 0);

-- Truy cập form
http://localhost/sample_bangiao.php?action=hien_thi_form_bangiao

-- Kỳ vọng: 
-- - Hiển thị 2 thiết bị
-- - Checkbox có thể check
-- - Nút "Xuất biên bản" hiển thị
```

### Test Case 2: Thiết bị chưa hoàn thành
```sql
-- Thiết bị chưa có ngaykt
INSERT INTO hososcbd_iso (hoso, phieu, maql, mavt, somay, ngaykt, bg) 
VALUES ('HS003', '0001', 'QL001', 'GPS', '003', '0000-00-00', 0);

-- Kỳ vọng:
-- - Checkbox bị disabled
-- - Ghi chú: "Hồ sơ chưa có ngày kết thúc"
```

### Test Case 3: Admin bỏ check thiết bị đã giao
```sql
-- Login với admin (phanquyen = 1)
-- Thiết bị đã bàn giao
UPDATE hososcbd_iso SET bg = 1 WHERE hoso = 'HS001';

-- Kỳ vọng:
-- - Admin: checkbox enabled, có thể bỏ check
-- - User: checkbox disabled, không thể bỏ check
```

## 🔒 BẢO MẬT

### 1. SQL Injection
```php
// ✅ ĐÚNG: Sử dụng prepared statement
$stmt = $conn->prepare("SELECT * FROM hososcbd_iso WHERE hoso = ?");
$stmt->bind_param("s", $hoso);

// ❌ SAI: Concatenate trực tiếp
$sql = "SELECT * FROM hososcbd_iso WHERE hoso = '$hoso'";
```

### 2. XSS (Cross-Site Scripting)
```php
// ✅ ĐÚNG: Escape output
echo htmlspecialchars($tenvt);

// ❌ SAI: Echo trực tiếp
echo $tenvt;
```

### 3. CSRF (Cross-Site Request Forgery)
```php
// Thêm CSRF token
session_start();
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

// Trong form
echo '<input type="hidden" name="csrf_token" value="' . $_SESSION['csrf_token'] . '">';

// Khi xử lý
if (!hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'])) {
    die('Invalid CSRF token');
}
```

### 4. Authentication
```php
// Kiểm tra đăng nhập ở đầu file
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}
```

## 🐛 TROUBLESHOOTING

### Lỗi 1: Cannot connect to database
```
ERROR: Connection failed: Access denied for user 'root'@'localhost'

FIX:
1. Kiểm tra username/password
2. GRANT ALL PRIVILEGES ON iso_database.* TO 'root'@'localhost';
3. FLUSH PRIVILEGES;
```

### Lỗi 2: Unknown column 'slbg'
```
ERROR: Unknown column 'slbg' in 'field list'

FIX:
ALTER TABLE hososcbd_iso ADD COLUMN slbg INT DEFAULT 0;
```

### Lỗi 3: Session not started
```
WARNING: session_start(): Session already started

FIX:
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
```

### Lỗi 4: Encoding UTF-8
```
ISSUE: Hiển thị ký tự lỗi (máy ??á bàn giao)

FIX:
1. Set charset trong MySQL connection: $conn->set_charset("utf8");
2. Set header trong HTML: <meta charset="UTF-8">
3. Save file với encoding UTF-8 (not UTF-8 BOM)
```

## 📈 TỐI ƯU HÓA

### 1. Index Database
```sql
-- Đã có trong create_bangiao_tables.sql
CREATE INDEX idx_search_bangiao ON hososcbd_iso(bg, ngaykt, nhomsc);
CREATE INDEX idx_phieu_maql ON hososcbd_iso(phieu, maql);
```

### 2. Cache Query Results
```php
// Sử dụng APCu hoặc Redis
if (apcu_exists('max_phieu')) {
    $max_phieu = apcu_fetch('max_phieu');
} else {
    // Query database
    apcu_store('max_phieu', $max_phieu, 3600); // Cache 1 hour
}
```

### 3. Pagination
```php
// Nếu có nhiều thiết bị
$page = $_GET['page'] ?? 1;
$per_page = 20;
$offset = ($page - 1) * $per_page;

$sql .= " LIMIT $per_page OFFSET $offset";
```

## 📞 HỖ TRỢ

### Câu hỏi thường gặp

**Q: Có thể bàn giao một phần thiết bị không?**
A: Có, chỉ cần check vào các thiết bị muốn bàn giao. Các thiết bị không check sẽ giữ nguyên bg = 0.

**Q: Làm sao để in lại biên bản đã xuất?**
A: Nếu tất cả thiết bị đã bg = 1, form sẽ hiển thị nút "In lại". Hoặc truy cập trực tiếp:
```
?action=in_bienban&maquanly=QL001&sohoso=0001&slbg=1&...
```

**Q: Admin có thể bỏ bàn giao (set bg = 0) không?**
A: Có, trong code có kiểm tra `if ($is_admin != 1)` để enable/disable checkbox.

**Q: Số lần bàn giao (slbg) có được tự động tăng không?**
A: Có, mỗi lần xuất biên bản, slbg của TẤT CẢ thiết bị trong cùng maql sẽ tăng lên 1.

**Q: Có thể customize template biên bản không?**
A: Có, sửa HTML ở phần `if ($action == 'in_bienban')` trong file PHP.

## 🔄 CẬP NHẬT VÀ BẢO TRÌ

### Version Control
```bash
# Init git repository
git init
git add LOGIC_*.md create_*.sql sample_*.php README_*.md
git commit -m "Initial commit: Bàn giao thiết bị module"

# Create tags
git tag -a v1.0 -m "Version 1.0 - Release"
```

### Migration cho bản cập nhật
```sql
-- migration_v1.1.sql
ALTER TABLE hososcbd_iso ADD COLUMN ngay_bangiao DATETIME;
ALTER TABLE hososcbd_iso ADD INDEX idx_ngay_bangiao (ngay_bangiao);

-- Update existing records
UPDATE hososcbd_iso h
JOIN lichsudn_iso l ON h.maql = l.maql
SET h.ngay_bangiao = l.curdate
WHERE h.bg = 1 AND l.action = 'BANG_GIAO';
```

## 📝 CHECKLIST TRƯỚC KHI DEPLOY

- [ ] Database được backup
- [ ] Config kết nối database đúng
- [ ] Session được cấu hình đúng  
- [ ] Authentication/Authorization hoạt động
- [ ] SQL injection được prevent (prepared statement)
- [ ] XSS được prevent (htmlspecialchars)
- [ ] CSRF token được implement
- [ ] Error handling đầy đủ
- [ ] Logs được ghi đầy đủ
- [ ] Test trên staging environment
- [ ] User manual được viết
- [ ] Code được review

## 📄 LICENSE

Tài liệu và code này được cung cấp miễn phí cho mục đích học tập và sử dụng nội bộ. 
Vui lòng giữ credit khi sử dụng.

---

**Tạo bởi:** ISO Management System Team  
**Ngày:** April 2024  
**Version:** 1.0  
**Liên hệ:** support@example.com
