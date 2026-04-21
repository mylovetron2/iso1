# HƯỚNG DẪN TRIỂN KHAI CHỨC NĂNG TẠM DỪNG/TIẾP TỤC HỒ SƠ

## 📋 TỔNG QUAN

Chức năng cho phép tạm dừng và tiếp tục xử lý hồ sơ sửa chữa/bảo dưỡng thiết bị, với lưu trữ đầy đủ lịch sử và tích hợp vào báo cáo.

### Tính năng chính:
- ✅ Tạm dừng hồ sơ với lý do bắt buộc
- ✅ Tiếp tục hồ sơ đã tạm dừng với ghi chú
- ✅ Lưu trữ đầy đủ lịch sử thay đổi trạng thái
- ✅ Hiển thị cảnh báo khi hồ sơ đang tạm dừng
- ✅ Tích hợp báo cáo: loại trừ thiết bị tạm dừng (có ngoại lệ)
- ✅ Báo cáo lịch sử tạm dừng với bộ lọc

---

## 1. DATABASE SCHEMA

### 1.1. Bảng lưu lịch sử tạm dừng

```sql
-- File: create_hososcbd_tamdung_table.sql
CREATE TABLE IF NOT EXISTS hososcbd_tamdung (
    id INT AUTO_INCREMENT PRIMARY KEY,
    hoso VARCHAR(50) NOT NULL,
    trangthai ENUM('tamdung', 'tieptuc') NOT NULL,
    nguoi_thuchien VARCHAR(100) NOT NULL,
    ngay_thuchien DATETIME NOT NULL,
    lydo_tamdung TEXT,
    ghichu_tieptuc TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    
    INDEX idx_hoso (hoso),
    INDEX idx_trangthai (trangthai),
    INDEX idx_ngay (ngay_thuchien),
    
    FOREIGN KEY (hoso) REFERENCES hososcbd_iso(hoso) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
```

**Giải thích các trường:**
- `hoso`: Mã hồ sơ (liên kết đến bảng chính)
- `trangthai`: Trạng thái - 'tamdung' hoặc 'tieptuc'
- `nguoi_thuchien`: Người thực hiện hành động
- `ngay_thuchien`: Ngày giờ thực hiện
- `lydo_tamdung`: Lý do tạm dừng (bắt buộc khi tạm dừng)
- `ghichu_tieptuc`: Ghi chú khi tiếp tục (không bắt buộc)

### 1.2. Trigger tự động ghi log

```sql
-- File: create_hososcbd_tamdung_triggers.sql

-- Trigger khi INSERT record mới
DELIMITER $$
CREATE TRIGGER after_tamdung_insert 
AFTER INSERT ON hososcbd_tamdung
FOR EACH ROW
BEGIN
    -- Log action vào bảng audit nếu có
    INSERT INTO audit_log (table_name, action, record_id, user, timestamp)
    VALUES ('hososcbd_tamdung', 'INSERT', NEW.id, NEW.nguoi_thuchien, NOW());
END$$
DELIMITER ;
```

---

## 2. CODE IMPLEMENTATION

### 2.1. Form HTML - Create Mode (Tạo mới hồ sơ)

Location: `formsc.php` ~line 7430-7470

```php
// Hiển thị form tạm dừng/tiếp tục trong CREATE mode
echo "<div style=\"margin-left:50px; margin-bottom:10px;\">
    <button onclick=\"toggleQuanLyTrangThaiCreate()\" style=\"background-color:#dc3545; color:white; padding:10px 20px; border:none; border-radius:4px; cursor:pointer; font-size:17px; font-weight:bold;\">
        <span id=\"toggle-icon-create\">▼</span> Quản lý trạng thái hồ sơ (Tạm dừng/Tiếp tục)
    </button>
</div>";

echo "<div id=\"quan-ly-trang-thai-create\" style=\"margin-left:50px; margin-bottom:20px; padding:15px; background-color:#f5f5f5; border-radius:5px; display:none;\">
    <h3 style=\"color:#1976d2;\">⚙️ Quản lý trạng thái hồ sơ</h3>
    <form method=\"post\" action=\"formsc.php\" style=\"display:inline-block;\" onsubmit=\"return confirmTamdung();\">
        <input type=\"hidden\" name=\"username\" value=\"$username\">
        <input type=\"hidden\" name=\"password\" value=\"$password\">
        <input type=\"hidden\" name=\"action_tamdung\" value=\"tamdung\">
        <label for=\"lydo_tamdung\"><strong>Lý do tạm dừng:</strong> <span style=\"color:red;\">*</span></label><br/>
        <textarea name=\"lydo_tamdung\" id=\"lydo_tamdung\" class=\"no-tinymce\" rows=\"2\" cols=\"50\" placeholder=\"VD: Chờ linh kiện, chờ phê duyệt, thiếu nhân lực...\" style=\"margin-top:5px;\"></textarea><br/>
        <button type=\"submit\" class=\"btn-tamdung\" style=\"margin-top:10px;\">⏸ TẠM DỪNG HỒ SƠ</button>
    </form>
</div>";
```

**⚠️ QUAN TRỌNG:** Textarea phải có `class="no-tinymce"` để tránh bị TinyMCE rich text editor chiếm quyền.

### 2.2. Form HTML - Edit Mode (Chỉnh sửa hồ sơ)

Location: `formsc.php` ~line 14600-14660

```php
// Kiểm tra trạng thái hiện tại
$check_tamdung_sql = mysql_query("SELECT * FROM hososcbd_tamdung WHERE hoso='$edithoso' ORDER BY ngay_thuchien DESC LIMIT 1");
$is_tamdung = false;
if ($check_tamdung_sql && mysql_num_rows($check_tamdung_sql) > 0) {
    $last_record = mysql_fetch_array($check_tamdung_sql);
    if ($last_record['trangthai'] == 'tamdung') {
        $is_tamdung = true;
        $tamdung_info = $last_record;
    }
}

// Hiển thị cảnh báo nếu đang tạm dừng
if ($is_tamdung) {
    $ngay_tamdung = date('d/m/Y H:i', strtotime($tamdung_info['ngay_thuchien']));
    $nguoi_tamdung = $tamdung_info['nguoi_thuchien'];
    $lydo_tamdung = $tamdung_info['lydo_tamdung'];
    
    // Tính thời gian tạm dừng
    $now = new DateTime();
    $tamdung_time = new DateTime($tamdung_info['ngay_thuchien']);
    $diff = $now->diff($tamdung_time);
    $thoigian_td_ngay = $diff->days;
    $thoigian_td_gio = $diff->h + ($diff->days * 24);
    
    echo "<table style=\"width:100%; margin-bottom:20px;\">
        <tr><td class=\"alert-tamdung\">
            <h3>⚠️ CẢNH BÁO: HỒ SƠ ĐANG TẠM DỪNG</h3>
            <p><strong>Thời gian tạm dừng:</strong> $ngay_tamdung</p>
            <p><strong>Người tạm dừng:</strong> $nguoi_tamdung</p>
            <p><strong>Lý do tạm dừng:</strong> $lydo_tamdung</p>
            <p><strong>Đã tạm dừng:</strong> <span style=\"color:#e74c3c;font-weight:bold;\">$thoigian_td_ngay ngày ($thoigian_td_gio giờ)</span></p>
        </td></tr>
    </table>";
}

// Nút toggle
echo "<div style=\"margin-left:50px; margin-bottom:10px;\">
    <button onclick=\"toggleQuanLyTrangThai()\" style=\"background-color:#dc3545; color:white; padding:10px 20px; border:none; border-radius:4px; cursor:pointer; font-size:17px; font-weight:bold;\">
        <span id=\"toggle-icon\">▼</span> Quản lý trạng thái hồ sơ (Tạm dừng/Tiếp tục)
    </button>
</div>";

// Form tùy theo trạng thái
echo "<div id=\"quan-ly-trang-thai\" style=\"margin-left:50px; margin-bottom:20px; padding:15px; background-color:#f5f5f5; border-radius:5px; display:none;\">";

if ($is_tamdung) {
    // Form TIẾP TỤC
    echo "<h3 style=\"color:#e65100;\">⏸ Hồ sơ đang tạm dừng - Bạn có muốn tiếp tục?</h3>
    <form method=\"post\" action=\"formsc.php?edithoso=$edithoso&username=$username&mk=$password\" style=\"display:inline-block;\" onsubmit=\"return confirmTieptucEdit();\">
        <input type=\"hidden\" name=\"username\" value=\"$username\">
        <input type=\"hidden\" name=\"password\" value=\"$password\">
        <input type=\"hidden\" name=\"hosomay\" value=\"$edithoso\">
        <input type=\"hidden\" name=\"action_tamdung\" value=\"tieptuc\">
        <label for=\"ghichu_tieptuc_edit\"><strong>Ghi chú khi tiếp tục:</strong></label><br/>
        <textarea name=\"ghichu_tieptuc\" id=\"ghichu_tieptuc_edit\" class=\"no-tinymce\" rows=\"2\" cols=\"50\" placeholder=\"Nhập ghi chú (không bắt buộc)\" style=\"margin-top:5px;\"></textarea><br/>
        <button type=\"submit\" class=\"btn-tieptuc\" style=\"margin-top:10px;\">▶ TIẾP TỤC HỒ SƠ</button>
    </form>";
} else {
    // Form TẠM DỪNG
    echo "<h3 style=\"color:#1976d2;\">⚙️ Quản lý trạng thái hồ sơ</h3>
    <form method=\"post\" action=\"formsc.php?edithoso=$edithoso&username=$username&mk=$password\" style=\"display:inline-block;\" onsubmit=\"return confirmTamdungEdit();\">
        <input type=\"hidden\" name=\"username\" value=\"$username\">
        <input type=\"hidden\" name=\"password\" value=\"$password\">
        <input type=\"hidden\" name=\"hosomay\" value=\"$edithoso\">
        <input type=\"hidden\" name=\"action_tamdung\" value=\"tamdung\">
        <label for=\"lydo_tamdung_edit\"><strong>Lý do tạm dừng:</strong> <span style=\"color:red;\">*</span></label><br/>
        <textarea name=\"lydo_tamdung\" id=\"lydo_tamdung_edit\" class=\"no-tinymce\" rows=\"2\" cols=\"50\" placeholder=\"VD: Chờ linh kiện, chờ phê duyệt, thiếu nhân lực...\" style=\"margin-top:5px;\"></textarea><br/>
        <button type=\"submit\" class=\"btn-tamdung\" style=\"margin-top:10px;\">⏸ TẠM DỪNG HỒ SƠ</button>
    </form>";
}
echo "</div>";
```

### 2.3. JavaScript Validation

Location: `formsc.php` ~line 7468-7514 và 14668-14718

```javascript
// CREATE MODE
function toggleQuanLyTrangThaiCreate() {
    var element = document.getElementById('quan-ly-trang-thai-create');
    var icon = document.getElementById('toggle-icon-create');
    if (element.style.display === 'none') {
        element.style.display = 'block';
        icon.innerHTML = '▲';
    } else {
        element.style.display = 'none';
        icon.innerHTML = '▼';
    }
}

function confirmTieptuc() {
    return confirm('Bạn có chắc muốn tiếp tục hồ sơ này?\n\nHồ sơ sẽ được đánh dấu là đã tiếp tục và bạn có thể làm việc bình thường.');
}

function confirmTamdung() {
    var textarea = document.getElementById('lydo_tamdung');
    if (!textarea) {
        alert('Lỗi: Không tìm thấy textarea. Vui lòng refresh trang.');
        return false;
    }
    
    var lydo = textarea.value.trim();
    if (lydo === '' || lydo.length === 0) {
        alert('Vui lòng nhập lý do tạm dừng!');
        textarea.focus();
        return false;
    }
    return confirm('Bạn có chắc muốn tạm dừng hồ sơ này?\n\nLý do: ' + lydo + '\n\nHồ sơ sẽ được đánh dấu là đang tạm dừng.');
}

// EDIT MODE - tương tự
function toggleQuanLyTrangThai() { ... }
function confirmTieptucEdit() { ... }
function confirmTamdungEdit() { ... }
```

### 2.4. Backend Processing

Location: `formsc.php` - đầu file (trước HTML output)

```php
// Xử lý tạm dừng/tiếp tục
$action_tamdung = isset($_POST['action_tamdung']) ? $_POST['action_tamdung'] : '';

if ($action_tamdung == 'tamdung') {
    $lydo_tamdung = isset($_POST['lydo_tamdung']) ? trim($_POST['lydo_tamdung']) : '';
    $hosomay = isset($_POST['hosomay']) ? $_POST['hosomay'] : '';
    
    if (empty($lydo_tamdung)) {
        echo "<script>alert('Lỗi: Lý do tạm dừng không được để trống!');</script>";
    } else {
        $nguoi_thuchien = $username;
        $ngay_thuchien = date('Y-m-d H:i:s');
        
        $insert_sql = "INSERT INTO hososcbd_tamdung (hoso, trangthai, nguoi_thuchien, ngay_thuchien, lydo_tamdung) 
                       VALUES ('$hosomay', 'tamdung', '$nguoi_thuchien', '$ngay_thuchien', '$lydo_tamdung')";
        
        if (mysql_query($insert_sql)) {
            echo "<script>alert('Đã tạm dừng hồ sơ thành công!'); window.location.reload();</script>";
        } else {
            echo "<script>alert('Lỗi: " . mysql_error() . "');</script>";
        }
    }
}

if ($action_tamdung == 'tieptuc') {
    $ghichu_tieptuc = isset($_POST['ghichu_tieptuc']) ? trim($_POST['ghichu_tieptuc']) : '';
    $hosomay = isset($_POST['hosomay']) ? $_POST['hosomay'] : '';
    
    $nguoi_thuchien = $username;
    $ngay_thuchien = date('Y-m-d H:i:s');
    
    $insert_sql = "INSERT INTO hososcbd_tamdung (hoso, trangthai, nguoi_thuchien, ngay_thuchien, ghichu_tieptuc) 
                   VALUES ('$hosomay', 'tieptuc', '$nguoi_thuchien', '$ngay_thuchien', '$ghichu_tieptuc')";
    
    if (mysql_query($insert_sql)) {
        echo "<script>alert('Đã tiếp tục hồ sơ thành công!'); window.location.reload();</script>";
    } else {
        echo "<script>alert('Lỗi: " . mysql_error() . "');</script>";
    }
}
```

### 2.5. CSS Styling

```css
.alert-tamdung {
    background-color: #fff3cd;
    border: 2px solid #ffc107;
    border-left: 5px solid #ff9800;
    padding: 15px 20px;
    margin: 0;
    border-radius: 5px;
    box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    width: 100%;
    box-sizing: border-box;
}
.alert-tamdung h3 {
    color: #856404;
    margin-top: 0;
    margin-bottom: 12px;
    font-size: 18px;
}
.alert-tamdung p {
    color: #856404;
    margin: 8px 0;
    line-height: 1.6;
}

.btn-tamdung {
    background-color: #ff9800;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 15px;
    font-weight: bold;
}
.btn-tamdung:hover {
    background-color: #f57c00;
}

.btn-tieptuc {
    background-color: #4caf50;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 15px;
    font-weight: bold;
}
.btn-tieptuc:hover {
    background-color: #45a049;
}
```

---

## 3. TÍCH HỢP BÁO CÁO

### 3.1. Báo cáo tháng - Loại trừ thiết bị tạm dừng

Files: `baocaothang01.php`, `baocaothang02.php`, `baocaothang.php`

```php
// Hàm kiểm tra thiết bị có đang tạm dừng không
function is_thietbi_tamdung($hoso, $thang, $nam) {
    // Tìm trạng thái cuối cùng của hồ sơ
    $check_sql = mysql_query("SELECT trangthai, DATE_FORMAT(ngay_thuchien, '%Y-%m') as thang_td 
                              FROM hososcbd_tamdung 
                              WHERE hoso='$hoso' 
                              ORDER BY ngay_thuchien DESC LIMIT 1");
    
    if ($check_sql && mysql_num_rows($check_sql) > 0) {
        $record = mysql_fetch_array($check_sql);
        if ($record['trangthai'] == 'tamdung') {
            // NGOẠI LỆ: Nếu tạm dừng trong cùng tháng báo cáo → vẫn liệt kê
            $thang_td = $record['thang_td'];
            $thang_baocao = sprintf('%04d-%02d', $nam, $thang);
            
            if ($thang_td == $thang_baocao) {
                return false; // Không loại trừ
            }
            return true; // Loại trừ
        }
    }
    return false;
}

// Sử dụng trong query báo cáo
while ($row = mysql_fetch_array($result)) {
    $hoso = $row['hoso'];
    
    // Bỏ qua thiết bị đang tạm dừng (trừ ngoại lệ)
    if (is_thietbi_tamdung($hoso, $thang, $nam)) {
        continue;
    }
    
    // Hiển thị thiết bị...
}
```

### 3.2. Xử lý header trống

```php
// Kiểm tra trước khi in header
$temp_result = mysql_query("SELECT ... WHERE maql='$maql' ...");
$count = 0;

while ($temp_row = mysql_fetch_array($temp_result)) {
    if (!is_thietbi_tamdung($temp_row['hoso'], $thang, $nam)) {
        $count++;
    }
}

// Chỉ in header khi có dữ liệu
if ($count == 0) {
    continue; // Bỏ qua luôn category này
}

// In header
echo "<tr><td colspan='10' style='background-color:#90EE90;'><b>$maql - $tenql</b></td></tr>";

// In data...
```

### 3.3. Báo cáo lịch sử tạm dừng

File: `baocao_tamdung.php`

```php
<?php
session_start();
include("myfunctions.php");

if (!isset($_SESSION['username'])) {
    header("Location: formdn.php");
    exit();
}

$username = $_SESSION['username'];
$password = $_SESSION['password'];

// Filters
$filter_trangthai = isset($_GET['trangthai']) ? $_GET['trangthai'] : '';
$filter_tungay = isset($_GET['tungay']) ? $_GET['tungay'] : '';
$filter_denngay = isset($_GET['denngay']) ? $_GET['denngay'] : '';
$search_hoso = isset($_GET['search_hoso']) ? $_GET['search_hoso'] : '';

// Build query
$where = "1=1";
if ($filter_trangthai) {
    $where .= " AND t.trangthai='$filter_trangthai'";
}
if ($filter_tungay) {
    $where .= " AND DATE(t.ngay_thuchien) >= '$filter_tungay'";
}
if ($filter_denngay) {
    $where .= " AND DATE(t.ngay_thuchien) <= '$filter_denngay'";
}
if ($search_hoso) {
    $where .= " AND t.hoso LIKE '%$search_hoso%'";
}

$sql = "SELECT t.*, h.mavt, h.somay, h.maql 
        FROM hososcbd_tamdung t
        LEFT JOIN hososcbd_iso h ON t.hoso = h.hoso
        WHERE $where
        ORDER BY t.ngay_thuchien DESC";

$result = mysql_query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Báo cáo lịch sử tạm dừng</title>
</head>
<body>
    <h2>BÁO CÁO LỊCH SỬ TẠM DỪNG/TIẾP TỤC HỒ SƠ</h2>
    
    <!-- Form lọc -->
    <form method="GET">
        <label>Trạng thái:</label>
        <select name="trangthai">
            <option value="">Tất cả</option>
            <option value="tamdung" <?php if($filter_trangthai=='tamdung') echo 'selected'; ?>>Tạm dừng</option>
            <option value="tieptuc" <?php if($filter_trangthai=='tieptuc') echo 'selected'; ?>>Tiếp tục</option>
        </select>
        
        <label>Từ ngày:</label>
        <input type="date" name="tungay" value="<?php echo $filter_tungay; ?>">
        
        <label>Đến ngày:</label>
        <input type="date" name="denngay" value="<?php echo $filter_denngay; ?>">
        
        <label>Tìm hồ sơ:</label>
        <input type="text" name="search_hoso" value="<?php echo $search_hoso; ?>">
        
        <button type="submit">Lọc</button>
    </form>
    
    <!-- Bảng kết quả -->
    <table border="1">
        <tr>
            <th>STT</th>
            <th>Hồ sơ</th>
            <th>Mã quản lý</th>
            <th>Thiết bị</th>
            <th>Trạng thái</th>
            <th>Người thực hiện</th>
            <th>Ngày thực hiện</th>
            <th>Lý do/Ghi chú</th>
        </tr>
        <?php
        $stt = 1;
        while ($row = mysql_fetch_array($result)) {
            $trangthai_text = $row['trangthai'] == 'tamdung' ? '⏸ TẠM DỪNG' : '▶ TIẾP TỤC';
            $color = $row['trangthai'] == 'tamdung' ? '#ff9800' : '#4caf50';
            $lydo_ghichu = $row['trangthai'] == 'tamdung' ? $row['lydo_tamdung'] : $row['ghichu_tieptuc'];
            
            echo "<tr>
                <td>$stt</td>
                <td>{$row['hoso']}</td>
                <td>{$row['maql']}</td>
                <td>{$row['mavt']} - {$row['somay']}</td>
                <td style='color:$color; font-weight:bold;'>$trangthai_text</td>
                <td>{$row['nguoi_thuchien']}</td>
                <td>" . date('d/m/Y H:i', strtotime($row['ngay_thuchien'])) . "</td>
                <td>$lydo_ghichu</td>
            </tr>";
            $stt++;
        }
        ?>
    </table>
</body>
</html>
```

---

## 4. VẤN ĐỀ VÀ GIẢI PHÁP

### ❌ VẤN ĐỀ: TinyMCE hijacking textarea

**Triệu chứng:**
- Hiển thị 2 vùng nhập liệu
- Alert "Vui lòng nhập lý do" dù đã nhập
- Textarea bị ẩn: `display:none`, `aria-hidden="true"`

**Nguyên nhân:**
```javascript
// TinyMCE khởi tạo cho TẤT CẢ textarea
tinymce.init({
    selector: "textarea"   // ← VẤN ĐỀ Ở ĐÂY!
});
```

**✅ GIẢI PHÁP:**

**Bước 1:** Thêm class exclusion cho textarea tạm dừng
```html
<textarea name="lydo_tamdung" id="lydo_tamdung" 
          class="no-tinymce"  <!-- THÊM CLASS NÀY -->
          rows="2" cols="50"></textarea>
```

**Bước 2:** Update TẤT CẢ TinyMCE init blocks
```javascript
tinymce.init({
    selector: "textarea:not(.no-tinymce)"  // ← THAY ĐỔI NÀY
});
```

**Bước 3:** Kiểm tra tất cả TinyMCE blocks trong file
```bash
# Tìm tất cả khởi tạo TinyMCE
grep -n "selector.*textarea" formsc.php

# Phải update TẤT CẢ (thường có 5-6 blocks)
```

**Bước 4:** Hard refresh browser
```
Ctrl + F5 
hoặc Clear cache + reload
```

### ⚠️ CHECKLIST TRIỂN KHAI

- [ ] Database: Tạo bảng `hososcbd_tamdung`
- [ ] Database: Tạo indexes và foreign keys
- [ ] Code: Thêm form HTML (create + edit mode)
- [ ] Code: Thêm JavaScript validation
- [ ] Code: Thêm backend processing
- [ ] Code: Thêm CSS styling
- [ ] Code: Update TẤT CẢ TinyMCE selectors
- [ ] Code: Thêm `class="no-tinymce"` cho 4 textareas
- [ ] Báo cáo: Thêm hàm `is_thietbi_tamdung()`
- [ ] Báo cáo: Xử lý empty category headers
- [ ] Báo cáo: Tạo trang `baocao_tamdung.php`
- [ ] Test: Tạm dừng trong create mode
- [ ] Test: Tạm dừng trong edit mode
- [ ] Test: Tiếp tục hồ sơ
- [ ] Test: Kiểm tra báo cáo tháng
- [ ] Test: Kiểm tra báo cáo lịch sử
- [ ] Test: Hard refresh browser để clear cache

---

## 5. MẸO DEBUGGING

### 5.1. Kiểm tra TinyMCE
```javascript
// Mở Console (F12), chạy:
console.log(tinymce.editors);
// Nếu thấy textarea tạm dừng → TinyMCE chưa exclude
```

### 5.2. Inspect Element
```
Right-click textarea → Inspect
- Phải có: class="no-tinymce"
- KHÔNG có: wrapper div từ TinyMCE
- KHÔNG có: display:none, aria-hidden="true"
```

### 5.3. Test query loại trừ
```sql
-- Test hồ sơ nào đang tạm dừng
SELECT t.hoso, t.trangthai, t.ngay_thuchien, h.mavt, h.somay
FROM hososcbd_tamdung t
LEFT JOIN hososcbd_iso h ON t.hoso = h.hoso
WHERE t.id IN (
    SELECT MAX(id) FROM hososcbd_tamdung GROUP BY hoso
)
AND t.trangthai = 'tamdung';
```

---

## 6. FILE CẦN CHỈNH SỬA

### Trong project hiện tại:
1. **formsc.php** - Form chính (create + edit)
2. **baocaothang01.php** - Báo cáo KTKT
3. **baocaothang02.php** - Báo cáo sản xuất  
4. **baocaothang.php** - Báo cáo cũ
5. **baocao_tamdung.php** - Báo cáo lịch sử (file mới)

### SQL Scripts cần chạy:
1. **create_hososcbd_tamdung_table.sql** - Tạo bảng
2. **create_hososcbd_tamdung_triggers.sql** - Triggers (optional)

---

## 7. THAM KHẢO NHANH

### 7.1. Workflow người dùng

```
[Tạo/Edit hồ sơ] 
    → Click "Quản lý trạng thái"
    → Nhập lý do tạm dừng (bắt buộc)
    → Click "TẠM DỪNG"
    → Confirm
    → Lưu vào DB
    → Reload trang → Hiển thị cảnh báo đỏ

[Tiếp tục hồ sơ]
    → Click "Quản lý trạng thái"  
    → Nhập ghi chú (không bắt buộc)
    → Click "TIẾP TỤC"
    → Confirm
    → Lưu vào DB
    → Reload trang → Bỏ cảnh báo
```

### 7.2. Data Flow

```
User Input → JavaScript Validation 
    → PHP Processing → MySQL Insert
    → Reload Page → Display Status
```

### 7.3. Report Logic

```
Monthly Report:
    FOR EACH equipment:
        IF is_tamdung(equipment, month, year):
            IF paused_in_same_month:
                SHOW  # Ngoại lệ
            ELSE:
                SKIP  # Loại trừ
        ELSE:
            SHOW
```

---

## 📞 HỖ TRỢ

Nếu gặp vấn đề khi triển khai:

1. **Không submit được:** Check Console errors (F12)
2. **Textarea bị TinyMCE:** Verify tất cả selectors đã update
3. **Báo cáo sai:** Test query `is_thietbi_tamdung()` riêng
4. **Empty headers:** Kiểm tra logic đếm trước khi in header

---

**Phiên bản:** 1.0  
**Ngày tạo:** 08/04/2026  
**Tác giả:** GitHub Copilot  
**License:** Internal Use Only
