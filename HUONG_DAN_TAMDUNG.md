# HƯỚNG DẪN CÀI ĐẶT VÀ SỬ DỤNG CHỨC NĂNG TẠM DỪNG SỬA CHỮA

## 📋 TỔNG QUAN

Hệ thống mới cho phép **tạm dừng** và **tiếp tục** các hồ sơ sửa chữa/bảo dưỡng thiết bị. Khi một hồ sơ gặp vấn đề (chờ linh kiện, chờ phê duyệt, thiếu nhân lực...), người dùng có thể tạm dừng hồ sơ và ghi lý do. Sau khi giải quyết xong, có thể tiếp tục hồ sơ.

**Tính năng chính:**
- ✅ Tạm dừng hồ sơ với lý do cụ thể
- ✅ Tiếp tục hồ sơ đã tạm dừng
- ✅ Cảnh báo rõ ràng khi hồ sơ đang tạm dừng
- ✅ Lưu lịch sử đầy đủ (ai tạm dừng, khi nào, lý do gì, bao lâu)
- ✅ Báo cáo tổng hợp hồ sơ đang tạm dừng
- ✅ Tất cả user đều có quyền tạm dừng/tiếp tục

---

## 🚀 BƯỚC 1: CÀI ĐẶT CƠ SỞ DỮ LIỆU

### 1.1. Chạy file SQL tạo bảng

Truy cập phpMyAdmin hoặc MySQL client, chọn database của bạn và chạy file:

```
create_tamdung_table.sql
```

File này sẽ tạo:
- **Bảng `hososcbd_tamdung`**: Lưu lịch sử tạm dừng
- **View `view_hososcbd_tamdung`**: Xem thông tin tạm dừng kèm chi tiết thiết bị
- **Stored Procedures**: sp_tamdung_hoso, sp_tieptuc_hoso
- **Function**: fn_check_tamdung

### 1.2. Kiểm tra bảng đã tạo thành công

Chạy lệnh sau để kiểm tra:

```sql
SHOW TABLES LIKE '%tamdung%';
```

Kết quả phải có:
```
hososcbd_tamdung
view_hososcbd_tamdung
```

### 1.3. Kiểm tra dữ liệu test (tùy chọn)

```sql
-- Xem cấu trúc bảng
DESCRIBE hososcbd_tamdung;

-- Xem danh sách hồ sơ đang tạm dừng
SELECT * FROM hososcbd_tamdung WHERE trangthai = 'dang_tam_dung';
```

---

## 📂 BƯỚC 2: CÀI ĐẶT CÁC FILE PHP

### 2.1. File đã được cập nhật

✅ **formsc.php** - Form sửa hồ sơ (đã thêm chức năng tạm dừng/tiếp tục)

### 2.2. File báo cáo mới

✅ **baocao_tamdung.php** - Báo cáo danh sách hồ sơ đang tạm dừng

Không cần làm gì thêm, các file đã được cập nhật tự động.

---

## 🎯 BƯỚC 3: THÊM LINK VÀO MENU (KHUYẾN NGHỊ)

Để dễ dàng truy cập báo cáo, thêm link vào menu chính của bạn.

### Ví dụ thêm vào index.php hoặc menu chính:

```php
<a href="baocao_tamdung.php?username=<?php echo $username; ?>&mk=<?php echo $password; ?>">
    <img src="upload/icon_tamdung.png" alt="Báo cáo tạm dừng" />
    Hồ sơ đang tạm dừng
</a>
```

Hoặc nếu dùng table/menu:

```php
echo "<tr>
    <td><a href='baocao_tamdung.php?username=$username&mk=$password'>
        📋 Báo cáo hồ sơ đang tạm dừng
    </a></td>
</tr>";
```

---

## 📖 HƯỚNG DẪN SỬ DỤNG

### 🔧 1. TẠM DỪNG HỒ SƠ

**Bước 1:** Vào form sửa hồ sơ (formsc.php)
- Click vào hồ sơ cần tạm dừng
- Hoặc truy cập: `formsc.php?edithoso=HS001&username=xxx&mk=xxx`

**Bước 2:** Cuộn xuống cuối form
- Tìm phần "⚙️ Quản lý trạng thái hồ sơ"
- Nhập lý do tạm dừng vào ô "Lý do tạm dừng" (bắt buộc)
  
  Ví dụ lý do:
  - `Chờ linh kiện máy nén từ nhà cung cấp`
  - `Chờ phê duyệt phương án sửa chữa`
  - `Thiếu nhân lực kỹ thuật`
  - `Chờ xác nhận từ khách hàng`

**Bước 3:** Click nút **"⏸ TẠM DỪNG HỒ SƠ"**
- Hệ thống sẽ hỏi xác nhận
- Click "OK" để xác nhận tạm dừng

**Kết quả:**
- Hồ sơ được đánh dấu tạm dừng
- Lưu thông tin: người tạm dừng, thời gian, lý do
- Cảnh báo vàng xuất hiện khi xem hồ sơ

---

### ▶️ 2. TIẾP TỤC HỒ SƠ

**Cách 1: Từ form sửa hồ sơ**

**Bước 1:** Vào hồ sơ đang tạm dừng
- Hệ thống hiển thị cảnh báo vàng ở đầu trang

**Bước 2:** Cuộn xuống cuối form
- Tìm phần "⏸ Hồ sơ đang tạm dừng - Bạn có muốn tiếp tục?"
- Nhập ghi chú (không bắt buộc)

**Bước 3:** Click nút **"▶ TIẾP TỤC HỒ SƠ"**
- Xác nhận tiếp tục
- Hồ sơ quay lại trạng thái bình thường

**Cách 2: Từ báo cáo tạm dừng**

**Bước 1:** Vào `baocao_tamdung.php`

**Bước 2:** Tìm hồ sơ cần tiếp tục

**Bước 3:** Click nút **"▶ Tiếp tục"** ở cột "Thao tác"

---

### 📊 3. XEM BÁO CÁO HỒ SƠ ĐANG TẠM DỪNG

**Truy cập:** `baocao_tamdung.php`

**Thông tin hiển thị:**
- Tổng số hồ sơ đang tạm dừng
- Danh sách chi tiết:
  - Số hồ sơ
  - Mã quản lý
  - Mã máy, tên thiết bị
  - Nhóm sửa chữa
  - Ngày tạm dừng
  - Người tạm dừng
  - Lý do tạm dừng
  - Thời gian đã tạm dừng (giờ/ngày)

**Bộ lọc:**
- Lọc theo nhóm sửa chữa (RDNGA, CNC)
- Lọc theo mã thiết bị
- Lọc theo mã quản lý

**Thao tác:**
- 📝 Sửa: Vào form sửa hồ sơ
- ▶ Tiếp tục: Tiếp tục hồ sơ ngay từ báo cáo

---

## 🎨 GIAO DIỆN

### 1. Cảnh báo tạm dừng (màu vàng)

Khi xem hồ sơ đang tạm dừng, xuất hiện:

```
⚠️ CẢNH BÁO: HỒ SƠ ĐANG TẠM DỪNG

Thời gian tạm dừng: 15/03/2024 14:30
Người tạm dừng: Nguyễn Văn A
Lý do tạm dừng: Chờ linh kiện máy nén
Đã tạm dừng: 2.5 ngày (60 giờ)
```

### 2. Nút tạm dừng (màu cam)

```
⚙️ Quản lý trạng thái hồ sơ

Lý do tạm dừng: *
[________________________]

[⏸ TẠM DỪNG HỒ SƠ]
```

### 3. Nút tiếp tục (màu xanh)

```
⏸ Hồ sơ đang tạm dừng - Bạn có muốn tiếp tục?

Ghi chú khi tiếp tục:
[________________________]

[▶ TIẾP TỤC HỒ SƠ]
```

---

## 🔍 KIỂM TRA VÀ TEST

### Test Case 1: Tạm dừng hồ sơ

1. Vào form sửa hồ sơ (ví dụ: HS001)
2. Nhập lý do: "Chờ linh kiện"
3. Click "Tạm dừng"
4. Kiểm tra database:
   ```sql
   SELECT * FROM hososcbd_tamdung WHERE hoso='HS001' AND trangthai='dang_tam_dung';
   ```
5. Vào lại hồ sơ → phải thấy cảnh báo vàng

### Test Case 2: Tiếp tục hồ sơ

1. Vào hồ sơ đang tạm dừng
2. Nhập ghi chú: "Đã có linh kiện"
3. Click "Tiếp tục"
4. Kiểm tra database:
   ```sql
   SELECT * FROM hososcbd_tamdung WHERE hoso='HS001' AND trangthai='da_tiep_tuc';
   ```
5. Vào lại hồ sơ → không còn cảnh báo

### Test Case 3: Xem báo cáo

1. Tạm dừng 2-3 hồ sơ khác nhau
2. Vào `baocao_tamdung.php`
3. Kiểm tra:
   - Có đầy đủ hồ sơ đang tạm dừng
   - Thời gian hiển thị chính xác
   - Bộ lọc hoạt động

### Test Case 4: Lọc báo cáo

1. Lọc theo nhóm RDNGA → chỉ hiện hồ sơ nhóm RDNGA
2. Lọc theo mã thiết bị → chỉ hiện thiết bị có mã chứa từ khóa
3. Xóa bộ lọc → hiện tất cả

---

## 🛠️ TROUBLESHOOTING (XỬ LÝ SỰ CỐ)

### Lỗi: Bảng không tồn tại

**Lỗi:** `Table 'hososcbd_tamdung' doesn't exist`

**Giải pháp:**
1. Chạy lại file `create_tamdung_table.sql`
2. Kiểm tra quyền tạo bảng của user MySQL
3. Đảm bảo đang chọn đúng database

### Lỗi: Không hiện cảnh báo

**Nguyên nhân:** Code kiểm tra tạm dừng chưa chạy

**Giải pháp:**
1. Kiểm tra file formsc.php đã được cập nhật
2. Clear cache browser (Ctrl+F5)
3. Kiểm tra trong database có bản ghi tạm dừng không

### Lỗi: Không thể tạm dừng

**Nguyên nhân:** Thiếu quyền INSERT

**Giải pháp:**
1. Kiểm tra quyền user database
2. Xem error log PHP
3. Kiểm tra stored procedure đã tạo chưa

---

## 📊 QUERY HỮU ÍCH

### 1. Thống kê tổng quan

```sql
-- Số lượng hồ sơ đang tạm dừng
SELECT COUNT(*) as tong_so_tamdung 
FROM hososcbd_tamdung 
WHERE trangthai = 'dang_tam_dung';

-- Số lượng hồ sơ đã tiếp tục
SELECT COUNT(*) as tong_so_da_tieptuc 
FROM hososcbd_tamdung 
WHERE trangthai = 'da_tiep_tuc';
```

### 2. Top lý do tạm dừng

```sql
SELECT 
    lydo_tamdung,
    COUNT(*) as so_lan
FROM hososcbd_tamdung
WHERE trangthai = 'dang_tam_dung'
GROUP BY lydo_tamdung
ORDER BY so_lan DESC
LIMIT 10;
```

### 3. Hồ sơ tạm dừng lâu nhất

```sql
SELECT 
    hoso,
    mamay,
    tenvt,
    lydo_tamdung,
    TIMESTAMPDIFF(DAY, ngay_tamdung, NOW()) as so_ngay_tamdung
FROM view_hososcbd_tamdung
WHERE trangthai = 'dang_tam_dung'
ORDER BY so_ngay_tamdung DESC
LIMIT 10;
```

### 4. Lịch sử tạm dừng của một hồ sơ

```sql
SELECT 
    ngay_tamdung,
    nguoi_tamdung,
    lydo_tamdung,
    ngay_tieptuc,
    nguoi_tieptuc,
    thoigian_tamdung_ngay,
    trangthai
FROM hososcbd_tamdung
WHERE hoso = 'HS001'
ORDER BY ngay_tamdung DESC;
```

---

## 📞 HỖ TRỢ

Nếu gặp vấn đề, kiểm tra:
1. ✅ Đã chạy file SQL chưa
2. ✅ File formsc.php đã được cập nhật
3. ✅ File baocao_tamdung.php đã được tạo
4. ✅ Quyền database đầy đủ
5. ✅ PHP version >= 5.0
6. ✅ MySQL version >= 5.0

---

## 🎉 HOÀN THÀNH

Chúc mừng! Bạn đã triển khai thành công chức năng tạm dừng sửa chữa.

**Các file đã tạo/sửa:**
- ✅ create_tamdung_table.sql (tạo bảng)
- ✅ formsc.php (thêm chức năng tạm dừng/tiếp tục)
- ✅ baocao_tamdung.php (báo cáo)
- ✅ HUONG_DAN_TAMDUNG.md (hướng dẫn này)
