# LOGIC LƯU NGƯỜI THỰC HIỆN VÀO BẢNG ngthuchien_iso

## 📋 TỔNG QUAN

Hệ thống quản lý danh sách người thực hiện công việc cho mỗi hồ sơ sửa chữa/bảo dưỡng máy móc. Mỗi hồ sơ có thể có tối đa **8 người thực hiện**, với khả năng thêm/sửa/xóa linh hoạt.

---

## 🗂️ CẤU TRÚC BẢNG ngthuchien_iso

```sql
CREATE TABLE ngthuchien_iso (
    stt INT PRIMARY KEY,           -- Số thứ tự tự động tăng
    mahoso VARCHAR(50),            -- Mã hồ sơ (FK -> hososcbd_iso.hoso)
    mamay VARCHAR(50),             -- Mã máy
    somay VARCHAR(50),             -- Số máy
    hoten VARCHAR(100),            -- Họ tên người thực hiện
    giolv DECIMAL(5,2),            -- Tổng giờ làm việc
    ngayth DATE,                   -- Ngày thực hiện
    ngaykt DATE,                   -- Ngày kết thúc
    giolv1 DECIMAL(5,2),          -- Giờ làm việc tháng 1
    giolv2 DECIMAL(5,2),          -- Giờ làm việc tháng 2
    giolv3 DECIMAL(5,2),          -- Giờ làm việc tháng 3
    giolv4 DECIMAL(5,2),          -- Giờ làm việc tháng 4
    giolv5 DECIMAL(5,2),          -- Giờ làm việc tháng 5
    giolv6 DECIMAL(5,2),          -- Giờ làm việc tháng 6
    giolv7 DECIMAL(5,2),          -- Giờ làm việc tháng 7
    giolv8 DECIMAL(5,2),          -- Giờ làm việc tháng 8
    giolv9 DECIMAL(5,2),          -- Giờ làm việc tháng 9
    giolv10 DECIMAL(5,2),         -- Giờ làm việc tháng 10
    giolv11 DECIMAL(5,2),         -- Giờ làm việc tháng 11
    giolv12 DECIMAL(5,2)          -- Giờ làm việc tháng 12
);
```

### **🔗 BẢNG LIÊN QUAN: resume (Hồ Sơ Nhân Viên)**

Danh sách **gợi ý người thực hiện** được lấy từ bảng `resume`:

```sql
CREATE TABLE resume (
    stt INT PRIMARY KEY AUTO_INCREMENT,
    danhso INT(30),
    hoten VARCHAR(60),            -- Họ tên nhân viên ⭐
    donvi CHAR(100),              -- Đơn vị công tác ⭐
    nghiviec VARCHAR(10),         -- Trạng thái nghỉ việc (yes/no) ⭐
    gioitinh CHAR(10),
    ngaysinh INT(10),
    thangsinh INT(10),
    namsinh INT(10),
    -- ... các trường khác về thông tin cá nhân, học vấn, v.v.
);
```

**Query lấy gợi ý:**
```php
$hotensql = mysql_query("
    SELECT hoten 
    FROM resume 
    WHERE donvi LIKE '%$donvi%'    -- Cùng đơn vị
      AND nghiviec != 'yes'        -- Chưa nghỉ việc
");
```

---

## ⚙️ LOGIC XỬ LÝ

### **1. CHUẨN BỊ DỮ LIỆU**

#### 1.1. Lấy STT (Số Thứ Tự) Mới
```php
// Lấy STT lớn nhất hiện có
$r5 = mysql_query("SELECT MAX(stt) as ttt FROM ngthuchien_iso");
$row = mysql_fetch_array($r5);
$ttt = $row['ttt'];
$ttt++; // Tăng lên 1 để tạo STT mới
```

#### 1.2. Xác Định Tháng Hiện Tại
```php
// Biến $cm chứa tháng hiện tại (1-12)
// Dùng để cập nhật cột giolv{tháng} tương ứng
$cm = date('n'); // 1 = tháng 1, 2 = tháng 2, ...
```

#### 1.3. Kiểm Tra Hồ Sơ Đã Tồn Tại
```php
$check = 0;
$tenthietbisql12 = mysql_query("SELECT mahoso FROM ngthuchien_iso");
while($row = mysql_fetch_array($tenthietbisql12)) {
    $mahoso = $row['mahoso'];
    if($mahoso == $hosomay) {
        $check = 1; // Hồ sơ đã tồn tại
        break;
    }
}
```

---

### **2. TRƯỜNG HỢP MỚI (check == 0) - TẠO HỒ SƠ LẦN ĐẦU**

Khi hồ sơ chưa có người thực hiện nào:

```php
// Lặp qua tối đa 8 người từ form
for($i = 1; $i <= 8; $i++) {
    if(($hoten[$i] != "") && ($check == 0)) {
        $insert = "INSERT INTO ngthuchien_iso(
            stt,
            mahoso,
            mamay,
            somay,
            hoten,
            giolv,
            ngayth,
            ngaykt,
            giolv$cm
        ) VALUES (
            '$ttt',
            '$hosomay',
            '$mavt',
            '$somay',
            '$hoten[$i]',
            '$gio[$i]',
            '$nams-$thangs-$ngays',
            '$namt-$thangt-$ngayt',
            '$gio[$i]'
        )";
        mysql_query($insert) or die(mysql_error());
        $ttt++; // Tăng STT cho người tiếp theo
    }
}
```

**Đặc điểm:**
- ✅ Chỉ INSERT khi người dùng nhập tên (hoten[$i] != "")
- ✅ Lưu giờ làm việc vào cột `giolv` và `giolv{tháng hiện tại}`
- ✅ STT tự động tăng cho mỗi người

---

### **3. TRƯỜNG HỢP ĐÃ TỒN TẠI (check == 1) - CẬP NHẬT HỒ SƠ**

Khi hồ sơ đã có người thực hiện, cần xử lý trong 2 bước:

#### **Bước 1: Cập Nhật/Xóa Các Bản Ghi Cũ**

```php
if ($check == 1) {
    // Lấy danh sách STT hiện có của hồ sơ
    $r9 = mysql_query("SELECT stt FROM ngthuchien_iso WHERE mahoso='$hosomay' ORDER BY stt ASC");
    
    $j = 1;
    while($row = mysql_fetch_array($r9)) {
        $stt = $row['stt'];
        
        // Nếu vị trí này vẫn có tên trong form → UPDATE
        if ($hoten[$j] != "") {
            $update2 = "UPDATE ngthuchien_iso SET 
                hoten = '$hoten[$j]', 
                giolv = '$gio[$j]',
                mamay = '$mavt',
                somay = '$somay',
                ngayth = '$nams-$thangs-$ngays',
                ngaykt = '$namt-$thangt-$ngayt',
                giolv$cm = '$gio[$j]'
            WHERE mahoso='$hosomay' AND stt='$stt'";
            mysql_query($update2) or die(mysql_error());
        } 
        // Nếu vị trí này bị xóa tên trong form → DELETE
        else {
            $delete = "DELETE FROM ngthuchien_iso 
                      WHERE mahoso = '$hosomay' AND stt='$stt'";
            mysql_query($delete) or die(mysql_error());
        }
        
        $j++; // Chuyển sang vị trí tiếp theo
    }
}
```

**Logic:**
- Lặp qua các bản ghi CŨ (theo STT trong DB)
- So sánh với dữ liệu MỚI từ form (theo index $j)
- **Có tên** → UPDATE thông tin
- **Không có tên** → DELETE bản ghi

#### **Bước 2: Thêm Người Mới (Nếu Có)**

```php
// $j hiện tại = số lượng bản ghi cũ + 1
// Tiếp tục lặp từ $j đến 8 để thêm người mới
for ($i = $j; $i <= 8; $i++) {
    if($hoten[$i] != "") {
        $insert = "INSERT INTO ngthuchien_iso(
            stt,
            mahoso,
            mamay,
            somay,
            hoten,
            giolv,
            ngayth,
            ngaykt,
            giolv$cm
        ) VALUES (
            '$ttt',
            '$hosomay',
            '$mavt',
            '$somay',
            '$hoten[$i]',
            '$gio[$i]',
            '$nams-$thangs-$ngays',
            '$namt-$thangt-$ngayt',
            '$gio[$i]'
        )";
        mysql_query($insert) or die(mysql_error());
        $ttt++;
    }
}
```

**Ví dụ:**
- Hồ sơ có 3 người cũ (index 1, 2, 3)
- Form mới có 5 người (index 1-5)
- Bước 1: UPDATE người 1, 2, 3
- Bước 2: INSERT người 4, 5 (từ $j=4 đến 5)

---

### **4. XÓA HỒ SƠ**

Khi xóa hồ sơ chính, cần xóa tất cả người thực hiện liên quan:

```php
$delete = "DELETE FROM ngthuchien_iso WHERE mahoso = '$hoso'";
$result = mysql_query($delete) or die(mysql_error());
```

---

### **5. RESET SỐ HỒ SƠ**

Khi cần đánh lại số hồ sơ (ví dụ: từ ABC-5 → ABC-1):

```php
// Lặp qua tất cả hồ sơ cần reset
$r6 = mysql_query("SELECT phieu, hoso FROM hososcbd_iso WHERE maql='$maquanly'");
$i = 1;

while($row = mysql_fetch_array($r6)) {
    $rhoso = $row['hoso']; // Số hồ sơ cũ
    $phieu = $row['phieu']; // Phiếu
    $nhoso = "$phieu-$i";   // Số hồ sơ mới
    
    // Cập nhật mahoso trong ngthuchien_iso
    $update = "UPDATE ngthuchien_iso SET 
               mahoso='$nhoso' 
               WHERE mahoso='$rhoso'";
    mysql_query($update) or die(mysql_error());
    
    $i++;
}
```

---

## 📊 SƠ ĐỒ LUỒNG XỬ LÝ

```
[Nhận dữ liệu form: $hoten[], $gio[]]
              |
              v
    [Lấy STT mới từ MAX(stt)]
              |
              v
    [Kiểm tra hồ sơ tồn tại?]
         /           \
       NO            YES
       |              |
       v              v
[INSERT tất      [Lặp qua bản ghi cũ]
 cả người mới]          |
       |          /-------------\
       |         v               v
       |   [Có tên?]        [Không tên?]
       |      |                  |
       |      v                  v
       |   [UPDATE]          [DELETE]
       |      |                  |
       |      \-----------------/
       |              |
       |              v
       |      [Thêm người mới nếu có]
       |              |
       v              v
    [Hoàn thành]
```

---

## 🎯 CÁC TÌNH HUỐNG THỰC TẾ

### **Tình huống 1: Tạo hồ sơ mới**
```
Input Form:
- Người 1: "Nguyễn Văn A" - 8 giờ
- Người 2: "Trần Văn B" - 4 giờ
- Người 3-8: (trống)

Action: INSERT 2 bản ghi
```

### **Tình huống 2: Sửa hồ sơ - Đổi người**
```
DB hiện tại:
- STT 1: "Nguyễn Văn A" - 8 giờ
- STT 2: "Trần Văn B" - 4 giờ

Input Form:
- Người 1: "Nguyễn Văn C" - 6 giờ (thay đổi)
- Người 2: "Trần Văn B" - 5 giờ (giữ tên, đổi giờ)

Action: 
- UPDATE STT 1: hoten → "Nguyễn Văn C", giolv → 6
- UPDATE STT 2: giolv → 5
```

### **Tình huống 3: Xóa người**
```
DB hiện tại:
- STT 1: "Nguyễn Văn A"
- STT 2: "Trần Văn B"
- STT 3: "Lê Văn C"

Input Form:
- Người 1: "Nguyễn Văn A"
- Người 2: (trống - đã xóa)
- Người 3: "Lê Văn C"

Action:
- UPDATE STT 1 (giữ nguyên)
- DELETE STT 2 (vị trí 2 bị xóa)
- UPDATE STT 3 (giữ nguyên)
```

### **Tình huống 4: Thêm người mới**
```
DB hiện tại:
- STT 1: "Nguyễn Văn A"
- STT 2: "Trần Văn B"

Input Form:
- Người 1: "Nguyễn Văn A"
- Người 2: "Trần Văn B"
- Người 3: "Phạm Văn D" (mới)
- Người 4: "Hoàng Văn E" (mới)

Action:
- UPDATE STT 1, 2 (giữ nguyên)
- INSERT người 3, 4 (thêm mới với STT tiếp theo)
```

---

## 🔑 ĐIỂM QUAN TRỌNG

### **1. Quản lý STT**
- ❗ STT là PRIMARY KEY, tự động tăng toàn cục
- ❗ KHÔNG reset STT khi xóa người (giữ nguyên gaps)
- ❗ Luôn lấy MAX(stt) + 1 cho bản ghi mới

### **2. Cột giolv{tháng}**
- ❗ Biến `$cm` = tháng hiện tại (1-12)
- ❗ Khi lưu, cập nhật CẢ `giolv` VÀ `giolv$cm`
- ❗ Cho phép báo cáo giờ làm việc theo từng tháng

### **3. Logic Update vs Insert**
```php
// ❌ SAI: Luôn insert mới
for($i=1; $i<=8; $i++) {
    if($hoten[$i] != "") INSERT...
}

// ✅ ĐÚNG: Kiểm tra hồ sơ tồn tại
if ($check == 0) {
    INSERT tất cả
} else {
    UPDATE cũ + INSERT mới
}
```

### **4. Xử lý xóa**
```php
// ❗ Xóa cascade khi xóa hồ sơ chính
DELETE FROM ngthuchien_iso WHERE mahoso = '$hoso';
DELETE FROM hososcbd_iso WHERE hoso = '$hoso';
```

---

## 💡 BEST PRACTICES

### **1. Validation Input**
```php
// Kiểm tra dữ liệu trước khi lưu
foreach($hoten as $ten) {
    if($ten != "") {
        $ten = trim($ten); // Xóa khoảng trắng
        $ten = htmlspecialchars($ten); // Tránh XSS
    }
}
```

### **2. Transaction**
```php
// Sử dụng transaction để đảm bảo tính toàn vẹn
mysql_query("START TRANSACTION");
try {
    // Thực hiện INSERT/UPDATE/DELETE
    mysql_query("COMMIT");
} catch(Exception $e) {
    mysql_query("ROLLBACK");
}
```

### **3. Prepared Statements**
```php
// Tránh SQL Injection (nâng cấp từ mysql sang mysqli/PDO)
$stmt = $mysqli->prepare("INSERT INTO ngthuchien_iso (hoten, giolv) VALUES (?, ?)");
$stmt->bind_param("sd", $hoten, $gio);
$stmt->execute();
```

---

## 📝 DỮ LIỆU FORM CẦN THIẾT

### **HTML Form với Dropdown Gợi Ý**

```html
<!-- HTML Form -->
<form method="post">
    <!-- Thông tin hồ sơ -->
    <input name="hosomay" value="ABC-001"> <!-- Mã hồ sơ -->
    <input name="mavt" value="MAY01">     <!-- Mã máy -->
    <input name="somay" value="SO001">    <!-- Số máy -->
    
    <!-- Ngày thực hiện -->
    <input name="ngays" value="15"> <!-- Ngày bắt đầu -->
    <input name="thangs" value="3">
    <input name="nams" value="2026">
    
    <!-- Ngày kết thúc -->
    <input name="ngayt" value="20">
    <input name="thangt" value="3">
    <input name="namt" value="2026">
    
    <!-- Người thực hiện 1-8 với dropdown gợi ý -->
    <select name="hoten1">
        <option value="">-- Chọn người thực hiện --</option>
        <?php
        // Lấy danh sách nhân viên từ bảng resume
        $donvi = "chuẩn chỉnh máy địa vật lý"; // Đơn vị
        $sql = "SELECT hoten FROM resume 
                WHERE donvi LIKE '%$donvi%' 
                  AND nghiviec != 'yes' 
                ORDER BY hoten ASC";
        $result = mysql_query($sql);
        while($row = mysql_fetch_array($result)) {
            echo "<option value=\"{$row['hoten']}\">{$row['hoten']}</option>";
        }
        ?>
    </select>
    <input name="gio1" value="8">
    
    <select name="hoten2">
        <option value="">-- Chọn người thực hiện --</option>
        <!-- ... tương tự ... -->
    </select>
    <input name="gio2" value="4">
    
    <!-- ... hoten3 đến hoten8 ... -->
</form>
```

### **Code PHP Tạo Dropdown (Từ formsc.php)**

```php
// Đơn vị mặc định (có thể lấy từ user hoặc hồ sơ)
$donvi = "chuẩn chỉnh máy địa vật lý";

// Tạo 8 dropdown cho 8 người thực hiện
for($i = 1; $i <= 8; $i++) {
    echo "<tr>
        <td><center>$i</center></td>
        <td>
            <select name=\"hoten$i\" style=\"width:100%;height:30px;\">
                <option value=\"$hoten[$i]\">$hoten[$i]</option>
                <option value=\"\"></option>";
    
    // Lấy danh sách nhân viên từ resume
    $hotensql = mysql_query("
        SELECT hoten 
        FROM resume 
        WHERE donvi LIKE '%$donvi%' 
          AND nghiviec != 'yes'
        ORDER BY hoten ASC
    ");
    
    while($row = mysql_fetch_array($hotensql)) {
        $hotennv = $row['hoten'];
        echo "<option value=\"$hotennv\" style=\"background:#87CEEB;\">
                  $hotennv
              </option>";
    }
    
    echo "</select>
        </td>
        <td>
            <input type=\"text\" name=\"gio$i\" value=\"$gio[$i]\" style=\"text-align:center;\">
        </td>
    </tr>";
}
```

---

## 🚀 IMPLEMENT VÀO PROJECT MỚI

### **Bước 1: Tạo các bảng cần thiết**
```sql
-- 1. Bảng hồ sơ nhân viên (resume)
CREATE TABLE resume (
    stt INT PRIMARY KEY AUTO_INCREMENT,
    hoten VARCHAR(60),
    donvi CHARTạo hàm lấy danh sách nhân viên**
```php
// File: helpers/resume.php
function get_nhanvien_by_donvi($donvi) {
    $result = array();
    $sql = "SELECT hoten 
            FROM resume 
            WHERE donvi LIKE '%$donvi%' 
              AND nghiviec != 'yes'
            ORDER BY hoten ASC";
    
    $query = mysql_query($sql);
    while($row = mysql_fetch_array($query)) {
        $result[] = $row['hoten'];
    }
    
    return $result;
}

function get_all_nhanvien_active() {
    $result = array();
    $sql = "SELECT hoten, donvi 
            FROM resume 
            WHERE nghiviec != 'yes'
            ORDER BY donvi, hoten ASC";
    
    $query = mysql_query($sql);
    while($row = mysql_fetch_array($query)) {
        $result[] = array(
            'hoten' => $row['hoten'],
            'donvi' => $row['donvi']
        );
    }
    
    return $result;
}
```

### **Bước 3: Copy functions xử lý người thực hiện**
```php
// File: handlers/. các trường khác tùy theo nhu cầu
);

-- 2. Bảng người thực hiện (ngthuchien_iso)
CREATE TABLE ngthuchien_iso (
    stt INT PRIMARY KEY,
    mahoso 4: Tạo form với dropdown**
```php
// File: views/form_hoso.php
require_once 'helpers/resume.php';

$donvi = "chuẩn chỉnh máy địa vật lý"; // Lấy từ user hoặc config
$nhanvien_list = get_nhanvien_by_donvi($donvi);
?>

<form method="post">
    <h3>Người thực hiện</h3>
    <table>
    <?php for($i = 1; $i <= 8; $i++): ?>
        <tr>
            <td><?= $i ?></td>
            <td>
                <select name="hoten<?= $i ?>">
                    <option value="">-- Chọn người --</option>
                    <?php foreach($nhanvien_list as $nv): ?>
                        <option value="<?= $nv ?>"><?= $nv ?></option>
                    <?php endforeach; ?>
                </select>
            </td>
            <td>
                <input type="text" name="gio<?= $i ?>" placeholder="Giờ">
            </td>
        </tr>
    <?php endfor; ?>
    </table>
    <button type="submit">Lưu</button>
</form>
```

### **Bước 5: Xử lý submit for0),
    mamay VARCHAR(50),
    somay VARCHAR(50),
    hoten VARCHAR(100),
    giolv DECIMAL(5,2),
    ngayth DATE,
    ngaykt DATE,
    giolv1 DECIMAL(5,2),
    -- ... giolv2 đến giolv12
);

-- 3. Insert dữ liệu mẫu vào resume
INSERT INTO resume (hoten, donvi, nghiviec) VALUES
    ('Nguyễn Văn A', 'chuẩn chỉnh máy địa vật lý', 'no'),
    ('Trần Văn B', 'chuẩn chỉnh máy địa vật lý', 'no'),
    ('Lê Văn C', 'phòng kỹ thuật', 'no'),
    ('Phạm Văn D', 'chuẩn chỉnh máy địa vật lý', 'yes'); -- Đã nghỉ
```

### **Bước 2: Copy functions**
```php
// File: nguoi_thuc_hien_handler.php
function save_nguoi_thuc_hien($hosomay, $hoten, $gio, $mavt, $somay, $dates) {
    // Copy toàn bộ logic từ formsc.php (dòng 6868-6970)
    // ...
}

function delete_nguoi_thuc_hien($mahoso) {
    $sql = "DELETE FROM ngthuchien_iso WHERE mahoso = ?";
    // ...
}

function reset_mahoso($maquanly) {
    // Logic reset số hồ sơ
    // ...
}
```

### **Bước 3: Gọi hàm**
```php
// Trong controller/form handler
if ($_POST['action'] == 'save') {
    save_nguoi_thuc_hien(
        $_POST['hosomay'],
        $_POST['hoten'],
        $_POST['gio'],
        $_POST['mavt'],
        $_POST['somay'],
        $_POST['dates']
    );
}
```

---

## 📞 HỖ TRỢ & LƯU Ý

- ⚠️ **Bảo mật**: Sử dụng prepared statements thay vì nối chuỗi SQL
- ⚠️ **Database**: Nâng cấp từ `mysql_*` sang `mysqli` hoặc `PDO`
- ⚠️ **Backup**: Luôn backup data trước khi chạy logic xóa/reset
- ⚠️ **Testing**: Test đầy đủ các tình huống: thêm/sửa/xóa/reset

---

## 📌 TÓM TẮT CÁC BẢNG SỬ DỤNG

| Bảng | Mục đích | Trường quan trọng |
|------|----------|-------------------|
| **ngthuchien_iso** | Lưu danh sách người thực hiện cho mỗi hồ sơ | `mahoso`, `hoten`, `giolv`, `giolv1-12` |
| **resume** | Quản lý hồ sơ nhân viên (source data gợi ý) | `hoten`, `donvi`, `nghiviec` |
| **hososcbd_iso** | Hồ sơ sửa chữa/bảo dưỡng chính | `hoso` (liên kết với `ngthuchien_iso.mahoso`) |

### **Mối quan hệ giữa các bảng:**

```
resume (Nhân viên)
    └─► Gợi ý cho form nhập liệu
            ↓
    ngthuchien_iso (Người thực hiện)
            ↓ (FK: mahoso)
    hososcbd_iso (Hồ sơ chính)
```

### **Query điển hình:**

```sql
-- Lấy danh sách người thực hiện của một hồ sơ
SELECT hoten, giolv 
FROM ngthuchien_iso 
WHERE mahoso = 'ABC-001';

-- Lấy gợi ý nhân viên theo đơn vị
SELECT hoten 
FROM resume 
WHERE donvi LIKE '%chuẩn chỉnh%' 
  AND nghiviec != 'yes';

-- Tổng hợp giờ làm việc theo nhân viên trong tháng
SELECT h.hoten, SUM(n.giolv3) as total_gio_thang3
FROM ngthuchien_iso n
JOIN hososcbd_iso h ON n.mahoso = h.hoso
WHERE h.madv = 'DV01'
GROUP BY h.hoten;
```

---

**File này được tạo từ source code thực tế của project ISO XDT 1.0**

*Ngày tạo: 28/03/2026*  
*Nguồn: formsc.php, create_data.php*
