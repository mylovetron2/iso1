# HƯỚNG DẪN THÊM TÍNH NĂNG TÌNH TRẠNG THIẾT BỊ (STATUS)

## 📋 Tổng quan

Giải pháp này cho phép thêm thông tin **tình trạng máy hiện tại** (status) mà **KHÔNG cần sửa** bảng `thietbi_iso` gốc.

### Cách hoạt động:
- ✅ Tạo bảng **`danhmuc_status`** để quản lý danh sách các tình trạng
- ✅ Tạo bảng **`thietbi_status`** để lưu trữ status của từng thiết bị
- ✅ Sử dụng Foreign Key để liên kết giữa các bảng
- ✅ Tạo VIEW `view_thietbi_full` để JOIN dữ liệu tự động
- ✅ Tạo bảng **`thietbi_status_history`** để lưu lịch sử thay đổi
- ✅ Bảng gốc `thietbi_iso` **KHÔNG bị thay đổi**

---

## 🚀 HƯỚNG DẪN CÀI ĐẶT

### Bước 1: Chạy file SQL để tạo bảng và VIEW

```sql
-- Chạy file: create_danhmuc_status.sql
-- Có thể dùng phpMyAdmin hoặc MySQL command line
```

**Các cách chạy:**

#### Option 1: Dùng phpMyAdmin
1. Vào phpMyAdmin
2. Chọn database của bạn
3. Vào tab "SQL"
4. Copy toàn bộ nội dung file `create_danhmuc_status.sql` và paste vào
5. Click "Go" để thực thi

#### Option 2: Dùng MySQL command line
```bash
mysql -u username -p database_name < create_danhmuc_status.sql
```

#### Option 3: Dùng PHP
```php
<?php
include("select_data.php");
$sql = file_get_contents('create_danhmuc_status.sql');
mysql_query($sql);
?>
```

### Bước 2: Kiểm tra kết quả

Sau khi chạy SQL, bạn sẽ có:
- ✅ Bảng mới: `danhmuc_status` (danh mục tình trạng)
- ✅ Bảng mới: `thietbi_status` (đã có từ trước, nâng cấp thêm)
- ✅ Bảng mới: `thietbi_status_history` (lịch sử thay đổi)
- ✅ VIEW mới: `view_thietbi_full` (đã cập nhật)
- ✅ Stored Procedure: `sp_update_thietbi_status`
- ✅ Trigger: `trg_before_status_update` (tự động lưu lịch sử)

Kiểm tra bằng câu lệnh:
```sql
SHOW TABLES LIKE '%status%';
SELECT * FROM danhmuc_status;
SELECT * FROM view_thietbi_full LIMIT 5;
```

### Bước 3: Sử dụng giao diện quản lý

#### 3.1. Quản lý danh mục status
Truy cập file: **`danhmuc_status.php`**

```
http://localhost/your-project/danhmuc_status.php
```

Giao diện cho phép:
- ➕ Thêm status mới vào danh mục
- ✏️ Sửa thông tin status (tên, màu, mức độ, thứ tự)
- 🔒 Vô hiệu hóa status không còn dùng
- 🗑️ Xóa status (chỉ xóa được status đã vô hiệu hóa)
- 🎨 Tùy chỉnh màu hiển thị cho từng status

#### 3.2. Quản lý tình trạng thiết bị
Truy cập file: **`quanly_tinhtrang_thietbi.php`**

```
http://localhost/your-project/quanly_tinhtrang_thietbi.php
```

Giao diện cho phép:
- 📊 Xem thống kê thiết bị theo tình trạng
- 🔍 Tìm kiếm và lọc thiết bị
- ✏️ Cập nhật status cho từng thiết bị
- 📝 Ghi chú về tình trạng
- ⚙️ Liên kết tới quản lý danh mục status

---

## 💡 SỬ DỤNG TRONG CODE

### 1. Include file functions

```php
include("manage_thietbi_status.php");
```

### 2. Cập nhật status cho thiết bị

```php
// Cập nhật status cho thiết bị có stt = 1
update_thietbi_status(
    1,                          // STT thiết bị
    'Đang hoạt động',          // Status
    $_SESSION['username'],      // Người cập nhật
    'Máy hoạt động bình thường' // Ghi chú
);
```

### 3. Lấy thông tin status của thiết bị

```php
$status_info = get_thietbi_status(1);
if ($status_info) {
    echo "Tình trạng: " . $status_info['status'];
    echo "Cập nhật lúc: " . $status_info['ngay_capnhat'];
    echo "Ghi chú: " . $status_info['ghichu'];
}
```

### 4. Lấy danh sách thiết bị kèm status (dùng VIEW)

```php
// Lấy tất cả thiết bị
$result = get_thietbi_with_status();
while ($row = mysql_fetch_assoc($result)) {
    echo $row['somay'] . " - " . $row['tenvt'] . ": " . $row['status'];
}

// Lọc thiết bị theo điều kiện
$result = get_thietbi_with_status("madv = 'KTKT'", "somay ASC");

// Lấy thiết bị đang bảo dưỡng
$result = get_thietbi_by_status('Bảo dưỡng định kỳ');
```

### 5. Thống kê số lượng theo status

```php
$counts = count_thietbi_by_status();
foreach ($counts as $status => $total) {
    echo "$status: $total thiết bị<br>";
}
```

---

## 📊 CẤU TRÚC DỮ LIỆU

### Bảng `danhmuc_status` (Danh mục tình trạng)

| Trường | Kiểu | Mô tả |
|--------|------|-------|
| `id` | INT | Primary key (auto increment) |
| `ma_status` | VARCHAR(50) | Mã status (UNIQUE, viết hoa, không dấu) |
| `ten_status` | VARCHAR(100) | Tên đầy đủ của status |
| `mau_hienthi` | VARCHAR(20) | Mã màu hex để hiển thị (#28a745) |
| `muc_do` | ENUM | Mức độ: normal, warning, danger, success, info |
| `mo_ta` | TEXT | Mô tả chi tiết về status |
| `thu_tu` | INT | Thứ tự hiển thị |
| `kich_hoat` | TINYINT(1) | 1: Đang dùng, 0: Vô hiệu hóa |
| `ngay_tao` | DATETIME | Ngày tạo |
| `ngay_capnhat` | DATETIME | Ngày cập nhật cuối |

**Dữ liệu mặc định:**
- TOT - Tốt (xanh lá #28a745)
- DANG_HOAT_DONG - Đang hoạt động (xanh dương #17a2b8)
- DANG_SUA_CHUA - Đang sửa chữa (vàng #ffc107)
- TAM_DUNG_CHO_SC - Tạm dừng chờ sửa chữa (cam #fd7e14)
- HONG_KHAC_PHUC - Hỏng không khắc phục được (đỏ #dc3545)
- BAO_DUONG_DK - Bảo dưỡng định kỳ (tím #6610f2)
- CHO_PHUYET_LY - Chờ phuyệt lý (hồng #e83e8c)
- CHO_LINH_KIEN - Chờ linh kiện (cam #fd7e14)
- DUNG_HOAT_DONG - Dừng hoạt động (xám #6c757d)
- THANH_LY - Thanh lý (đen #343a40)
- CHUA_XAC_DINH - Chưa xác định (xám nhạt #adb5bd)

### Bảng `thietbi_status` (Status của thiết bị)

| Trường | Kiểu | Mô tả |
|--------|------|-------|
| `id` | INT | Primary key (auto increment) |
| `stt_thietbi` | INT | Foreign key → `thietbi_iso.stt` (UNIQUE) |
| `status` | VARCHAR(100) | Tên status (từ danh mục) |
| `ma_status` | VARCHAR(50) | Foreign key → `danhmuc_status.ma_status` |
| `nguoi_capnhat` | VARCHAR(100) | Người cập nhật |
| `ngay_capnhat` | DATETIME | Thời gian cập nhật |
| `ghichu` | TEXT | Ghi chú về tình trạng |

### Bảng `thietbi_status_history` (Lịch sử thay đổi)

| Trường | Kiểu | Mô tả |
|--------|------|-------|
| `id` | INT | Primary key |
| `stt_thietbi` | INT | STT thiết bị |
| `ma_status_cu` | VARCHAR(50) | Mã status cũ |
| `ten_status_cu` | VARCHAR(100) | Tên status cũ |
| `ma_status_moi` | VARCHAR(50) | Mã status mới |
| `ten_status_moi` | VARCHAR(100) | Tên status mới |
| `nguoi_thaydoi` | VARCHAR(100) | Người thực hiện |
| `ghichu` | TEXT | Ghi chú |
| `ngay_thaydoi` | DATETIME | Thời gian thay đổi |

### VIEW `view_thietbi_full`

Kết hợp dữ liệu từ 3 bảng: `thietbi_iso` + `thietbi_status` + `danhmuc_status`:

```sql
SELECT * FROM view_thietbi_full;
-- Trả về: 
-- - Tất cả trường từ thietbi_iso (stt, mamay, somay, tenvt, mavt, madv, model...)
-- - Thông tin status: status, ma_status, nguoi_capnhat, ngay_capnhat, status_ghichu
-- - Thông tin danh mục: status_ten_day_du, status_mau, status_muc_do, status_mo_ta
```

---

## 🎯 CÁC TÌNH TRẠNG MẶC ĐỊNH

Hệ thống đã cài sẵn 11 status chuẩn:

| Mã Status | Tên Status | Màu | Mức độ | Ý nghĩa |
|-----------|-----------|-----|--------|---------|
| `TOT` | Tốt | 🟢 #28a745 | success | Máy hoạt động tốt, không vấn đề |
| `DANG_HOAT_DONG` | Đang hoạt động | 🔵 #17a2b8 | info | Máy đang vận hành |
| `DANG_SUA_CHUA` | Đang sửa chữa | 🟡 #ffc107 | warning | Đang trong quá trình sửa chữa |
| `TAM_DUNG_CHO_SC` | Tạm dừng chờ sửa chữa | 🟠 #fd7e14 | warning | Tạm ngưng, chờ sửa |
| `HONG_KHAC_PHUC` | Hỏng không khắc phục được | 🔴 #dc3545 | danger | Hỏng hoàn toàn, không sửa được |
| `BAO_DUONG_DK` | Bảo dưỡng định kỳ | 🟣 #6610f2 | info | Đang bảo dưỡng theo lịch |
| `CHO_PHUYET_LY` | Chờ phuyệt lý | 🔴 #e83e8c | warning | Chờ phê duyệt xử lý |
| `CHO_LINH_KIEN` | Chờ linh kiện | 🟠 #fd7e14 | warning | Chờ linh kiện thay thế |
| `DUNG_HOAT_DONG` | Dừng hoạt động | ⚫ #6c757d | normal | Ngưng hoạt động (lý do khác) |
| `THANH_LY` | Thanh lý | ⚫ #343a40 | danger | Đã thanh lý |
| `CHUA_XAC_DINH` | Chưa xác định | ⚪ #adb5bd | normal | Chưa cập nhật |

### Thêm status tùy chỉnh

Bạn có thể thêm status mới qua:

**Cách 1: Dùng giao diện web**
- Vào `danhmuc_status.php`
- Điền form thêm status mới
- Chọn màu và mức độ phù hợp

**Cách 2: Dùng SQL**
```sql
INSERT INTO danhmuc_status (ma_status, ten_status, mau_hienthi, muc_do, mo_ta, thu_tu)
VALUES ('MAY_MOI', 'Máy mới chưa sử dụng', '#00ff00', 'success', 'Thiết bị mới mua', 12);
```

**Cách 3: Dùng PHP**
```php
add_status_to_danhmuc('MAY_MOI', 'Máy mới chưa sử dụng', '#00ff00', 'success', 'Thiết bị mới mua', 12);
```

---

## 🔧 TÍCH HỢP VÀO CODE HIỆN CÓ

### Thay đổi query trong các file báo cáo:

**Cũ (chỉ query bảng thietbi_iso):**
```php
$sql = "SELECT * FROM thietbi_iso WHERE mavt='$mavt'";
```

**Mới (query VIEW để có cả status):**
```php
$sql = "SELECT * FROM view_thietbi_full WHERE mavt='$mavt'";
```

### Ví dụ trong file báo cáo:

```php
// File: baocaothang02.php
// Thay vì:
// $result = mysql_query("SELECT * FROM thietbi_iso WHERE ...");

// Dùng VIEW để có thêm status:
$result = mysql_query("SELECT * FROM view_thietbi_full WHERE ...");

while ($row = mysql_fetch_assoc($result)) {
    echo $row['tenvt'];
    echo " - Tình trạng: " . $row['status']; // Có thêm status
}
```TOT', $_SESSION['username'], 'Thiết bị mới');
```

### 2. Lịch sử thay đổi status (đã tự động)

Hệ thống **TỰ ĐỘNG** lưu lịch sử vào bảng `thietbi_status_history` nhờ Trigger.Mỗi khi status thay đổi, một bản ghi mới được tạo:

```php
// Xem lịch sử thay đổi
$history = get_status_history(1, 20); // Lấy 20 bản ghi gần nhất
while ($row = mysql_fetch_assoc($history)) {
    echo date('d/m/Y H:i', strtotime($row['ngay_thaydoi'])) . ": ";
    echo $row['ten_status_cu'] . " → " . $row['ten_status_moi'];
    echo " (Người đổi: " . $row['nguoi_thaydoi'] . ")<br>";
}
```

### 3. Báo cáo thống kê nâng cao

```php
// Thống kê số lượng theo từng status
$sql = "SELECT 
          dm.ten_status, 
          dm.mau_hienthi,
          COUNT(st.stt_thietbi) as so_luong
        FROM danhmuc_status dm
        LEFT JOIN thietbi_status st ON dm.ma_status = st.ma_status
        WHERE dm.kich_hoat = 1
        GROUP BY dm.id, dm.ten_status, dm.mau_hienthi
        ORDER BY dm.thu_tu";

$result = mysql_query($sql);
while ($row = mysql_fetch_assoc($result)) {
    echo $row['ten_status'] . ": " . $row['so_luong'] . " thiết bị<br>";
}
```

### 4. Tùy chỉnh màu sắc theo mức độ

Trong code hiển thị, bạn có thể lấy màu từ danh mục:

```php
$result = mysql_query("SELECT * FROM view_thietbi_full");
while ($row = mysql_fetch_assoc($result)) {
    $mau = $row['status_mau'] ?: '#999'; // Dùng màu từ danh mục
    echo "<span style='background: $mau; padding: 5px; border-radius: 5px; color: white;'>";
    echo $row['status'];
    echo "</span>";
}
```

### 5. Thông báo khi status thay đổi (tùy chọn)

Bạn có thể thêm logic gửi email/notification khi status chuyển sang "Hỏng":

```php
// Trong function update_thietbi_status, thêm:
if ($ma_status == 'HONG_KHAC_PHUC') {
    // Gửi email thông báo cho quản lý
    $to = danhmuc_status.sql` | Script SQL tạo bảng danh mục, bảng status, VIEW, stored procedure, trigger |
| `manage_thietbi_status.php` | Functions quản lý status và danh mục |
| `danhmuc_status.php` | Giao diện web quản lý danh mục status (CRUD) |
| `quanly_tinhtrang_thietbi.php` | Giao diện web quản lý tình trạng thiết bị |
| `HUONG_DAN_STATUS_THIETBI.md` | File hướng dẫn này |

### Cấu trúc hệ thống:

```
┌─────────────────────────────────────────┐
│     DANH MỤC STATUS                     │
│  (danhmuc_status.php)                   │
│  - Quản lý các tình trạng có thể có     │
│  - Thêm/sửa/xóa status                  │
│  - Tùy chỉnh màu sắc, thứ tự            │
└──────────────┬──────────────────────────┘
               │
               ↓ Sử dụng
┌─────────────────────────────────────────┐
│  QUẢN LÝ TÌNH TRẠNG THIẾT BỊ            │
│  (quanly_tinhtrang_thietbi.php)         │
│  - Cập nhật status cho từng thiết bị    │
│  - Xem thống kê                         │
│  - Tìm kiếm, lọc                        │
└──────────────┬──────────────────────────┘
               │
               ↓ Lưu vào
┌─────────────────────────────────────────┐
│     DATABASE                            │
│  - danhmuc_status (danh mục)            │
│  - thietbi_status (status thiết bị)     │
│  - thietbi_status_history (lịch sử)     │
│  - view_thietbi_full (VIEW tổng hợp)    │
└─────────────────────────────────────────┘
```
}ger tự động lưu lịch sử

```sql
DELIMITER $$
CREATE TRIGGER before_status_update
BEFORE UPDATE ON thietbi_status
FOR EACH ROW
BEGIN
  IF OLD.status != NEW.status THEN
    INSERT INTO thietbi_status_history (stt_thietbi, status_cu, status_moi, nguoi_thaydoi)
    VALUES (OLD.stt_thietbi, OLD.status, NEW.status, NEW.nguoi_capnhat);
  END IF;
END$$
DELIMITER ;
```

---

## ❓ FAQ

### 1. Có ảnh hưởng gì đến bảng thietbi_iso không?
**KHÔNG.** Bảng gốc hoàn toàn không bị thay đổi. Status lưu ở bảng riêng.

### 2. Nếu xóa thiết bị trong thietbi_iso thì sao?
Status sẽ **tự động xóa** theo (nhờ `ON DELETE CASCADE`).

### 3. Có thể thêm nhiều status cho một thiết bị không?
Hiện tại mỗi thiết bị chỉ có 1 status. Nếu cần lịch sử, dùng bảng `thietbi_status_history`.

### 4. Thiết bị chưa có status sẽ hiển thị gì?
Sẽ hiển thị **"Chưa xác định"** (nhờ `COALESCE` trong VIEW).

### 5. Có thể dùng cho nhiều loại thiết bị khác không?
CÓ. Chỉ cần tạo bảng tương tự cho các bảng thiết bị khác.

---

## 📁 CÁC FILE TRONG GIẢI PHÁP

| File | Mục đích |
|------|----------|
| `create_thietbi_status_table.sql` | Script SQL tạo bảng và VIEW |
| `manage_thietbi_status.php` | Functions quản lý status |
| `quanly_tinhtrang_thietbi.php` | Giao diện web quản lý |
| `HUONG_DAN_STATUS_THIETBI.md` | File hướng dẫn này |

---

## 📞 HỖ TRỢ

Nếu gặp lỗi, kiểm tra:
1. ✅ Đã chạy file SQL chưa?
2. ✅ Database connection có đúng không?
3. ✅ Bảng `thietbi_iso` có trường `stt` là primary key không?
4. ✅ PHP có kết nối MySQL được không?

---

## 🎉 HOÀN THÀNH

Giờ bạn đã có hệ thống quản lý tình trạng thiết bị hoàn chỉnh mà không cần sửa bảng gốc!

**Các tính năng chính:**
- ✅ Theo dõi tình trạng thiết bị realtime
- ✅ Thống kê số lượng theo status
- ✅ Lịch sử cập nhật
- ✅ Giao diện web thân thiện
- ✅ Dễ dàng tích hợp vào code hiện có
