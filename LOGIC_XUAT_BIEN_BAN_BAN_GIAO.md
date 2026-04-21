# LOGIC XUẤT BIÊN BẢN BÀN GIAO THIẾT BỊ

## MỤC ĐÍCH
Hệ thống quản lý việc bàn giao thiết bị sau khi sửa chữa/bảo dưỡng cho khách hàng. Ghi nhận lịch sử bàn giao, tình trạng thiết bị và tạo biên bản chính thức.

## CẤU TRÚC DỮ LIỆU

### Bảng: `hososcbd_iso`
```sql
- hoso: Mã hồ sơ (PRIMARY KEY)
- phieu: Số phiếu (dùng để group các thiết bị cùng khách hàng)
- maql: Mã quản lý
- mavt: Mã vật tư/thiết bị
- somay: Số máy
- model: Model máy
- ngaykt: Ngày kết thúc sửa chữa
- solg: Số lượng
- ttktafter: Tình trạng kỹ thuật sau sửa chữa
- bg: Cờ đã bàn giao (0 = chưa, 1 = đã bàn giao)
- slbg: Số lần bàn giao (tăng dần mỗi lần)
- madv: Mã đơn vị khách hàng
- ngyeucau: Người yêu cầu (bên nhận)
- ngnhyeucau: Người nhận yêu cầu (bên giao)
- ngayyc: Ngày yêu cầu
- nhomsc: Nhóm sửa chữa
```

### Bảng: `thietbi_iso`
```sql
- mavt: Mã vật tư
- somay: Số máy
- model: Model
- tenvt: Tên vật tư/thiết bị
- homay: Họ máy
- dienap: Điện áp
```

### Bảng: `lichsudn_iso`
```sql
- stt: STT tự tăng
- username: Người thực hiện
- madv: Mã đơn vị
- nhom: Nhóm
- curdate: Thời gian thực hiện
- ip_address: Địa chỉ IP
- maql: Mã quản lý liên quan
```

---

## QUY TRÌNH XUẤT BIÊN BẢN BÀN GIAO

### BƯỚC 1: HIỂN THỊ FORM CHỌN THIẾT BỊ BÀN GIAO

#### 1.1. Điều kiện truy cập
```php
if (($submit == "Hồ sơ SC/BD") && ($hosobd == "bienbanscbd"))
```

#### 1.2. Lấy số phiếu mới nhất theo nhóm
```php
// Lấy phiếu lớn nhất theo phân quyền
if ($phanquyen == "1") {
    // Admin: xem tất cả
    SELECT DISTINCT phieu FROM hososcbd_iso
} else {
    // User: chỉ xem nhóm của mình
    SELECT DISTINCT phieu FROM hososcbd_iso WHERE nhomsc = '$nhom'
}

// Format số phiếu: 0001, 0010, 0100, 1000
```

#### 1.3. Lấy thông tin hồ sơ
```php
SELECT * FROM hososcbd_iso WHERE phieu = '$fieu'

// Lấy các thông tin:
- maquanly
- ngayyc (ngày yêu cầu)
- madv (đơn vị)
- ngyeucau (người yêu cầu - bên nhận)
- ngnhyeucau (người nhận yêu cầu - bên giao)
```

#### 1.4. Hiển thị danh sách thiết bị
```php
SELECT * FROM hososcbd_iso WHERE phieu = '$fieu'

// Với mỗi thiết bị, kiểm tra:
FOR EACH thiết bị:
    1. Lấy tên thiết bị từ thietbi_iso
    2. Kiểm tra điều kiện bàn giao:
    
    IF (ngaykt != "0000-00-00"):
        - Thiết bị đã hoàn thành
        - Link màu đỏ (không click được)
        
        IF (bg == 1):
            - checkb = 'checked="checked"'
            - ghichu = "Máy đã bàn giao"
            - disable = 'disabled' (trừ admin)
        ELSE:
            - checkb = '' (chưa check)
            - ghichu = "Máy đã làm xong đang chờ bàn giao"
            - disable = '' (cho phép chọn)
            - k++ (đếm số thiết bị có thể bàn giao)
    ELSE:
        - Thiết bị chưa hoàn thành
        - checkb = ''
        - ghichu = "Hồ sơ chưa có ngày kết thúc"
        - disable = 'disabled'
        - Link màu xanh (có thể click vào chỉnh sửa)
```

#### 1.5. Hiển thị nút chức năng
```php
IF (k == 1):
    // Không có thiết bị nào để bàn giao
    // Chỉ hiển thị nút "In lại" (savefile = "xuatfilebb")
ELSE:
    // Có thiết bị cần bàn giao
    // Hiển thị nút "Xuất biên bản" (xuat = "xuatbienban")
```

---

### BƯỚC 2: XỬ LÝ XUẤT BIÊN BẢN

#### 2.1. Điều kiện kích hoạt
```php
if ($xuat == "xuatbienban")
```

#### 2.2. Nhận dữ liệu từ form
```php
$maquanly = $_POST['maquanly']
$sohoso = $_POST['sohoso']
$ngay = $_POST['ngay']
$khachhang = $_POST['khachhang']  // Bên nhận
$nhanvien = $_POST['nhanvien']     // Bên giao
$donvi = $_POST['donvi']

// Lấy số lượng thiết bị
SELECT COUNT(*) as number FROM hososcbd_iso WHERE maql = '$maquanly'

// Lấy checkbox đã chọn
FOR i = 1 TO number:
    $bg[$i] = $_POST["bg$i"]  // Giá trị là mã hồ sơ nếu được check
```

#### 2.3. Kiểm tra có thiết bị được chọn
```php
$check = 0
FOR i = 1 TO number:
    IF ($bg[$i] != ""):
        $check = 1
        BREAK

IF ($check == 0):
    ECHO "CHƯA CHỌN THIẾT BỊ ĐỂ BÀN GIAO"
    EXIT
```

#### 2.4. Cập nhật số lần bàn giao (slbg)
```php
// Lấy số lần bàn giao hiện tại
SELECT slbg FROM hososcbd_iso WHERE maql = '$maquanly'

$slbg++  // Tăng lên 1

// Cập nhật cho tất cả thiết bị trong cùng mã quản lý
UPDATE hososcbd_iso 
SET slbg = '$slbg' 
WHERE maql = '$maquanly'
```

#### 2.5. Cập nhật cờ bàn giao và thu thập dữ liệu in
```php
$k = 1  // STT trong biên bản
$danh_sach_in = []

SELECT hoso FROM hososcbd_iso WHERE maql = '$maquanly'

FOR EACH hoso:
    IF ($bg[$i] != ""):
        // Thiết bị được chọn để bàn giao
        
        // Cập nhật cờ bg = 1
        UPDATE hososcbd_iso 
        SET bg = '1' 
        WHERE hoso = '$bg[$i]'
        
        // Lấy thông tin thiết bị
        SELECT * FROM hososcbd_iso WHERE hoso = '$bg[$i]'
        // => somay, mavt, model, soluong, ttktafter
        
        SELECT * FROM thietbi_iso 
        WHERE mavt = '$mavt' 
          AND somay = '$somay' 
          AND model = '$model'
        // => tenvt
        
        // Thêm vào danh sách in
        $danh_sach_in[] = {
            stt: $k,
            modelmay: ($model == "") ? $mavt : "$mavt-$model",
            somay: $somay,
            ttktafter: $ttktafter
        }
        
        $k++
    ELSE:
        // Thiết bị không được chọn
        IF ($phanquyen == "1"):
            // Admin có quyền bỏ check
            UPDATE hososcbd_iso 
            SET bg = '0' 
            WHERE hoso = '$hoso'
```

#### 2.6. Ghi log lịch sử
```php
// Lấy thông tin người dùng
$ip_address = $_SERVER['REMOTE_ADDR']
$curdate = date("Y-m-d H:i:s")

// Lấy STT tiếp theo
SELECT max(stt) as tt FROM lichsudn_iso
$tt++

SELECT madv, nhom FROM users WHERE username = '$username'

// Insert log
INSERT INTO lichsudn_iso (
    stt,
    username,
    madv,
    nhom,
    curdate,
    ip_address,
    maql
) VALUES (
    '$tt',
    '$username',
    '$madv',
    '$nhom',
    '$curdate',
    '$ip_address',
    '$maquanly'
)
```

---

### BƯỚC 3: IN BIÊN BẢN

#### 3.1. Format ngày tháng
```php
// Tách ngày từ format dd/mm/YYYY
$ngay = $_POST['ngay']  // VD: "07/04/2026"

// Parse để lấy $ngays, $thangs, $nams
FOR i = 0 TO strlen($ngay):
    IF ($ngay[i] == '/'):
        // Tách thành phần
```

#### 3.2. Nội dung biên bản (Word/HTML format)

```html
<!-- HEADER -->
XN Địa Vật Lý GK
Xưởng SCTB ĐVL

BIÊN BẢN BÀN GIAO THIẾT BỊ

Số hồ sơ: {$sohoso}-{$slbg}    Ngày: {$ngays}/{$thangs}/{$nams}

<!-- THÔNG TIN BÊN GIAO NHẬN -->
1. Bên giao, Сдал: {$nhanvien}
   Đơn vị, Подр: Xưởng SCTB ĐVL

2. Bên nhận, Принял: {$khachhang}
   Đơn vị, Подр: {$donvi}

3. Nội dung: Bên nhận sau khi kiểm tra tình trạng kỹ thuật của thiết bị 
   và đã thống nhất với bên giao cùng nhau giao nhận các thiết bị sau:

<!-- BẢNG THIẾT BỊ -->
+-----+------------------+--------+--------------------------------+
| STT | Tên thiết bị     | Số     | Tình trạng kỹ thuật của TB    |
| П/П | Наим-е оборуд-ия | Номер  | Техническое состояние прибора |
+-----+------------------+--------+--------------------------------+
| {k} | {modelmay}       | {somay}| {ttktafter}                    |
+-----+------------------+--------+--------------------------------+

<!-- CHỮ KÝ -->
Bên giao                                    Bên nhận
(Ký, ghi rõ họ tên)                        (Ký, ghi rõ họ tên)
```

#### 3.3. Nút chức năng sau in
```php
// Nút "In biên bản" (savefile = "xuatfilebb")
// Nút "Back" quay lại danh sách hồ sơ
```

---

### BƯỚC 4: IN LẠI BIÊN BẢN (savefile = "xuatfilebb")

Khi nhấn nút "In lại" sau khi đã xuất biên bản lần đầu, hệ thống sẽ:
- Tạo lại file Word/HTML từ dữ liệu đã lưu trong database
- Không cập nhật lại bg hoặc slbg
- Chỉ đơn thuần tái tạo document

---

## ĐIỀU KIỆN QUAN TRỌNG

### 1. Điều kiện để thiết bị có thể bàn giao
```
✓ ngaykt != "0000-00-00"  (đã có ngày kết thúc)
✓ bg != 1                  (chưa bàn giao trước đó)
```

### 2. Quyền hạn
```php
if ($phanquyen == "1"):
    - Admin có thể:
        + Xem tất cả hồ sơ
        + Bỏ check thiết bị đã bàn giao (set bg = 0)
        + Chỉnh sửa hồ sơ bất kỳ
else:
    - User thường chỉ xem/bàn giao hồ sơ của nhóm mình
    - Không thể bỏ check thiết bị đã bàn giao
```

### 3. Trạng thái thiết bị và action
```
| ngaykt    | bg  | Trạng thái                              | Có thể check? |
|-----------|-----|-----------------------------------------|---------------|
| 0000-00-00| *   | Hồ sơ chưa có ngày kết thúc            | Không         |
| Có giá trị| 0   | Máy đã làm xong đang chờ bàn giao      | Có            |
| Có giá trị| 1   | Máy đã bàn giao                        | Không*        |

* Admin có thể uncheck để bàn giao lại
```

---

## LƯU Ý KHI MIGRATE SANG PROJECT KHÁC

### 1. Thay đổi MySQL sang MySQLi/PDO
```php
// Cũ:
mysql_query($sql)
mysql_fetch_array($result)

// Mới:
mysqli_query($conn, $sql)
mysqli_fetch_array($result)
// Hoặc dùng PDO
```

### 2. Xử lý ngày tháng
- Input form: format dd/mm/YYYY
- Database: format YYYY-MM-DD
- Cần hàm convert giữa 2 format

### 3. Xuất file Word
Có 2 cách:
- **Cách 1**: Xuất HTML với CSS giống Word, cho phép in trực tiếp
- **Cách 2**: Dùng PHPWord library để tạo file .docx thực sự

### 4. Security
```php
// Cần sanitize input
$maquanly = mysqli_real_escape_string($conn, $_POST['maquanly']);

// Hoặc dùng prepared statement
$stmt = $conn->prepare("SELECT * FROM hososcbd_iso WHERE hoso = ?");
$stmt->bind_param("s", $hoso);
```

### 5. Session và Authentication
```php
// Cần kiểm tra session trước khi xử lý
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}
```

### 6. Số phiếu và format
```php
// Logic format số: 0001, 0010, 0100, 1000
if ($maxphieu > 0 && $maxphieu <= 9) 
    $fieu = "000$maxphieu";
else if ($maxphieu >= 10 && $maxphieu <= 99)  
    $fieu = "00$maxphieu";
else if ($maxphieu >= 100 && $maxphieu <= 999)  
    $fieu = "0$maxphieu";
else 
    $fieu = "$maxphieu";
```

---

## FLOW CHART TÓM TẮT

```
[Chọn menu "Biên bản bàn giao"]
            ↓
[Lấy số phiếu mới nhất theo nhóm]
            ↓
[Hiển thị form với danh sách thiết bị]
            ↓
[User nhập bên nhận, chọn thiết bị]
            ↓
[Click "Xuất biên bản"]
            ↓
[Kiểm tra có thiết bị được chọn?] → Không → [Báo lỗi]
            ↓ Có
[Tăng slbg lên 1]
            ↓
[Cập nhật bg = 1 cho thiết bị được chọn]
            ↓
[Ghi log vào lichsudn_iso]
            ↓
[Hiển thị biên bản Word/HTML]
            ↓
[User có thể in hoặc save file]
```

---

## TEST CASES

### TC1: Bàn giao thiết bị mới
```
Given: Có 3 thiết bị đã hoàn thành (ngaykt có giá trị, bg = 0)
When: User chọn 2 thiết bị và nhấn "Xuất biên bản"
Then: 
  - 2 thiết bị được chọn: bg = 1
  - 1 thiết bị không chọn: bg = 0
  - slbg tăng lên 1
  - Biên bản hiển thị 2 thiết bị
```

### TC2: Không chọn thiết bị nào
```
Given: Form hiển thị danh sách thiết bị
When: User không check thiết bị nào, nhấn "Xuất biên bản"
Then: Hiển thị "CHƯA CHỌN THIẾT BỊ ĐỂ BÀN GIAO"
```

### TC3: Admin bỏ check thiết bị đã bàn giao
```
Given: Admin login, có thiết bị bg = 1
When: Admin bỏ check thiết bị đó, nhấn "Xuất biên bản"
Then: Thiết bị đó bg = 0
```

### TC4: User thường không thể bỏ check
```
Given: User thường login, có thiết bị bg = 1
When: Xem form
Then: Checkbox bị disabled, không thể bỏ check
```

### TC5: Thiết bị chưa hoàn thành
```
Given: Có thiết bị ngaykt = "0000-00-00"
When: Xem form
Then: 
  - Checkbox bị disabled
  - Ghi chú: "Hồ sơ chưa có ngày kết thúc"
  - Link màu xanh, có thể click vào chỉnh sửa
```

---

## KẾT LUẬN

Logic xuất biên bản bàn giao là một quy trình 4 bước:
1. **Hiển thị form**: Lọc và hiển thị thiết bị có thể bàn giao
2. **Xử lý**: Cập nhật database khi user chọn thiết bị
3. **In biên bản**: Tạo document chính thức
4. **Log**: Ghi lại lịch sử thao tác

Các điểm cốt lõi:
- ✅ Kiểm tra điều kiện nghiêm ngặt (ngaykt, bg)
- ✅ Phân quyền rõ ràng (admin vs user)
- ✅ Ghi log đầy đủ
- ✅ Format số phiếu chuẩn
- ✅ Hỗ trợ in lại không thay đổi dữ liệu
