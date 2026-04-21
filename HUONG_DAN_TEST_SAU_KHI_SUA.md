# HƯỚNG DẪN KIỂM TRA SAU KHI SỬA CHỨC NĂNG TẠM DỪNG

## ✅ CÁC THAY ĐỔI ĐÃ THỰC HIỆN

### 1. Sửa logic kiểm tra ngày kết thúc (4 vị trí trong formsc.php)

**Mục đích:** Cho phép user thường xem/sửa hồ sơ đang tạm dừng, ngay cả khi hồ sơ đã có ngày kết thúc.

**Vị trí đã sửa:**
- Dòng ~876: Tạo hồ sơ mới (phiếu sửa chữa)
- Dòng ~5630: Tìm kiếm hồ sơ theo mã quản lý
- Dòng ~6120: Tạo hồ sơ mới (phiếu sửa chữa v2)
- Dòng ~14717: Chỉnh sửa hồ sơ (Edit mode)

**Logic cũ:**
```php
if ($phanquyen=="1") {
    // Admin xem tất cả
    $tenthietbisql1 = mysql_query("SELECT ... WHERE phieu='$fieu'");
} else {
    // User thường CHỈ xem hồ sơ chưa kết thúc
    $tenthietbisql1 = mysql_query("SELECT ... WHERE phieu='$fieu' and ngaykt='0000-00-00'");
}
```

**Logic mới:**
```php
if ($phanquyen=="1") {
    // Admin xem tất cả
    $tenthietbisql1 = mysql_query("SELECT ... WHERE phieu='$fieu'");
} else {
    // User thường xem: hồ sơ chưa kết thúc HOẶC đang tạm dừng
    $tenthietbisql1 = mysql_query("SELECT DISTINCT mavt,somay,hoso,model 
        FROM hososcbd_iso 
        WHERE phieu='$fieu' 
        AND (ngaykt='0000-00-00' 
             OR hoso IN (SELECT hoso FROM hososcbd_tamdung WHERE trangthai='dang_tam_dung'))");
    
    // Thông báo CHỈ cho hồ sơ đã kết thúc NHƯNG KHÔNG tạm dừng
    $tenthietbisql2 = mysql_query("SELECT DISTINCT mavt,somay,model 
        FROM hososcbd_iso 
        WHERE phieu='$fieu' 
        AND ngaykt !='0000-00-00' 
        AND hoso NOT IN (SELECT hoso FROM hososcbd_tamdung WHERE trangthai='dang_tam_dung')");
}
```

### 2. Sửa câu lệnh INSERT để phù hợp với cấu trúc bảng

**Vị trí:** Dòng ~730 trong formsc.php

**Thay đổi:** Thêm `nguoi_thuchien` và `ngay_thuchien` vào INSERT statement

**Logic mới:**
```php
$insert_tamdung = "INSERT INTO hososcbd_tamdung (
    hoso, mavt, somay, model, maql,
    ngay_tamdung, nguoi_tamdung, lydo_tamdung, 
    nguoi_thuchien, ngay_thuchien, trangthai
) VALUES (
    '$hosomay', '{$info['mavt']}', '{$info['somay']}', '{$info['model']}', '{$info['maql']}',
    NOW(), '$username_esc', '$lydo_esc',
    '$username_esc', NOW(), 'dang_tam_dung'
)";
```

---

## 🧪 KỊCH BẢN KIỂM TRA

### Test Case 1: Tạm dừng hồ sơ chưa kết thúc

**Điều kiện:**
- User: không phải admin (phanquyen != "1")
- Hồ sơ: chưa kết thúc (ngaykt = '0000-00-00')

**Các bước:**
1. Đăng nhập với user thường (VD: `khanhnd`)
2. Mở hồ sơ để chỉnh sửa: `formsc.php?edithoso=2024-001&username=khanhnd`
3. Click nút "Quản lý trạng thái hồ sơ"
4. Nhập lý do tạm dừng: "Chờ linh kiện"
5. Click "TẠM DỪNG HỒ SƠ"

**Kết quả mong đợi:**
- ✅ Alert: "Đã tạm dừng hồ sơ 2024-001 thành công!"
- ✅ Trang reload, hiển thị cảnh báo màu vàng: "HỒ SƠ ĐANG TẠM DỪNG"
- ✅ Nút đổi thành: "▶ TIẾP TỤC HỒ SƠ"
- ✅ Kiểm tra database: Record mới trong bảng `hososcbd_tamdung` với `trangthai='dang_tam_dung'`

---

### Test Case 2: Tiếp tục hồ sơ đang tạm dừng (chưa kết thúc)

**Điều kiện:**
- User: không phải admin
- Hồ sơ: chưa kết thúc (ngaykt = '0000-00-00')
- Trạng thái: đang tạm dừng (trangthai = 'dang_tam_dung')

**Các bước:**
1. Mở hồ sơ đang tạm dừng: `formsc.php?edithoso=2024-001&username=khanhnd`
2. Click nút "Quản lý trạng thái hồ sơ"
3. Nhập ghi chú tiếp tục: "Đã nhận được linh kiện"
4. Click "▶ TIẾP TỤC HỒ SƠ"

**Kết quả mong đợi:**
- ✅ Alert: "Đã tiếp tục hồ sơ 2024-001 thành công!"
- ✅ Cảnh báo vàng biến mất
- ✅ Nút đổi lại thành: "⏸ TẠM DỪNG HỒ SƠ"
- ✅ Kiểm tra database: `ngay_tieptuc`, `nguoi_tieptuc`, `ghichu_tieptuc` được cập nhật, `trangthai='da_tiep_tuc'`

---

### Test Case 3: ⭐ QUAN TRỌNG - Xem hồ sơ đang tạm dừng CÓ ngày kết thúc

**Điều kiện:**
- User: không phải admin
- Hồ sơ: ĐÃ kết thúc (ngaykt = '2024-01-15')
- Trạng thái: đang tạm dừng (trangthai = 'dang_tam_dung')

**Chuẩn bị:**
1. Mở phpMyAdmin
2. Chạy SQL:
```sql
-- Tạo hồ sơ test có ngày kết thúc
UPDATE hososcbd_iso SET ngaykt = '2024-01-15' WHERE hoso = '2024-001';

-- Đảm bảo hồ sơ đang tạm dừng
INSERT INTO hososcbd_tamdung (
    hoso, mavt, somay, model, maql,
    ngay_tamdung, nguoi_tamdung, lydo_tamdung,
    nguoi_thuchien, ngay_thuchien, trangthai
) VALUES (
    '2024-001', 'GCL-101', '001164', '101', '20240101-KTKT-2024',
    NOW(), 'khanhnd', 'Test hồ sơ có ngày kết thúc',
    'khanhnd', NOW(), 'dang_tam_dung'
);
```

**Các bước:**
1. Đăng nhập user thường: `khanhnd`
2. Mở form tạo hồ sơ: `formsc.php?submit=nhapdulieu&hoso=phieusuachua&username=khanhnd`
3. Tìm phiếu chứa hồ sơ '2024-001'
4. Trong dropdown "Mã thiết bị", tìm hồ sơ '2024-001'

**Kết quả mong đợi (SAU KHI SỬA):**
- ✅ Hồ sơ '2024-001' XUẤT HIỆN trong dropdown (vì đang tạm dừng)
- ✅ KHÔNG hiển thị thông báo "Chỉ có admin mới được sửa hồ sơ có ngày kết thúc"
- ✅ User có thể chọn và chỉnh sửa hồ sơ

**Kết quả cũ (TRƯỚC KHI SỬA):**
- ❌ Hồ sơ '2024-001' KHÔNG xuất hiện trong dropdown
- ❌ Hiển thị: "Chỉ có admin mới được sửa hồ sơ có ngày kết thúc"
- ❌ Exit, không cho phép tiếp tục

---

### Test Case 4: Tiếp tục hồ sơ đang tạm dừng CÓ ngày kết thúc

**Điều kiện:** Như Test Case 3

**Các bước:**
1. Mở hồ sơ: `formsc.php?edithoso=2024-001&username=khanhnd`
2. Quan sát cảnh báo vàng: "HỒ SƠ ĐANG TẠM DỪNG"
3. Click "Quản lý trạng thái hồ sơ"
4. Nhập ghi chú: "Hoàn thành công việc"
5. Click "▶ TIẾP TỤC HỒ SƠ"

**Kết quả mong đợi:**
- ✅ Alert: "Đã tiếp tục hồ sơ 2024-001 thành công!"
- ✅ Trang reload, cảnh báo vàng biến mất
- ✅ Database: `trangthai='da_tiep_tuc'`, các trường tiếp tục được cập nhật

---

### Test Case 5: User thường KHÔNG thể sửa hồ sơ đã kết thúc (không tạm dừng)

**Điều kiện:**
- User: không phải admin
- Hồ sơ: ĐÃ kết thúc (ngaykt = '2024-01-15')
- Trạng thái: KHÔNG tạm dừng (không có record trong hososcbd_tamdung hoặc trangthai='da_tiep_tuc')

**Chuẩn bị:**
```sql
-- Đảm bảo hồ sơ đã kết thúc
UPDATE hososcbd_iso SET ngaykt = '2024-01-20' WHERE hoso = '2024-002';

-- Đảm bảo KHÔNG đang tạm dừng
DELETE FROM hososcbd_tamdung WHERE hoso = '2024-002' AND trangthai = 'dang_tam_dung';
```

**Các bước:**
1. Đăng nhập user thường: `khanhnd`
2. Mở form tạo hồ sơ
3. Tìm phiếu chứa hồ sơ '2024-002'

**Kết quả mong đợi:**
- ✅ Hồ sơ '2024-002' KHÔNG xuất hiện trong dropdown
- ✅ Hiển thị thông báo: "Chỉ có admin mới được sửa hồ sơ Máy: XXX có ngày kết thúc"
- ✅ Đây là hành vi ĐÚNG - bảo vệ dữ liệu đã hoàn thành

---

### Test Case 6: Admin vẫn có thể sửa TẤT CẢ hồ sơ

**Điều kiện:**
- User: admin (phanquyen = "1")

**Các bước:**
1. Đăng nhập admin
2. Mở bất kỳ hồ sơ nào (có ngày kết thúc hoặc chưa, tạm dừng hoặc không)

**Kết quả mong đợi:**
- ✅ Admin thấy TẤT CẢ hồ sơ trong dropdown
- ✅ KHÔNG có thông báo hạn chế nào
- ✅ Admin có thể chỉnh sửa bất kỳ hồ sơ nào

---

## 📊 KIỂM TRA DATABASE

Sau mỗi thao tác, kiểm tra bảng `hososcbd_tamdung`:

```sql
-- Xem tất cả record tạm dừng
SELECT * FROM hososcbd_tamdung ORDER BY ngay_tamdung DESC;

-- Kiểm tra record cụ thể
SELECT 
    hoso,
    DATE_FORMAT(ngay_tamdung, '%d/%m/%Y %H:%i') as ngay_tamdung,
    nguoi_tamdung,
    lydo_tamdung,
    DATE_FORMAT(ngay_tieptuc, '%d/%m/%Y %H:%i') as ngay_tieptuc,
    nguoi_tieptuc,
    ghichu_tieptuc,
    thoigian_tamdung_gio,
    thoigian_tamdung_ngay,
    trangthai,
    nguoi_thuchien,
    DATE_FORMAT(ngay_thuchien, '%d/%m/%Y %H:%i') as ngay_thuchien
FROM hososcbd_tamdung 
WHERE hoso = '2024-001';
```

**Kiểm tra các trường:**
- ✅ `nguoi_tamdung` = `nguoi_thuchien` (khi tạm dừng)
- ✅ `ngay_tamdung` = `ngay_thuchien` (khi tạm dừng)
- ✅ `trangthai` = 'dang_tam_dung' (khi tạm dừng)
- ✅ `trangthai` = 'da_tiep_tuc' (sau khi tiếp tục)
- ✅ `ngay_tieptuc`, `nguoi_tieptuc`, `ghichu_tieptuc` được cập nhật (sau tiếp tục)
- ✅ `thoigian_tamdung_gio`, `thoigian_tamdung_ngay` được tính tự động (sau tiếp tục)

---

## ⚠️ LƯU Ý QUAN TRỌNG

### Nếu gặp lỗi SQL khi INSERT:
```
ERROR: Column 'nguoi_thuchien' cannot be null
```

**Giải pháp:**
1. Kiểm tra cấu trúc bảng:
```sql
DESCRIBE hososcbd_tamdung;
```

2. Nếu cột `nguoi_thuchien` là NOT NULL nhưng code cũ chưa insert:
```sql
-- Option 1: Cho phép NULL
ALTER TABLE hososcbd_tamdung MODIFY COLUMN nguoi_thuchien VARCHAR(100);

-- Option 2: Đặt default value
ALTER TABLE hososcbd_tamdung 
MODIFY COLUMN nguoi_thuchien VARCHAR(100) DEFAULT '';
```

### Kiểm tra hiệu suất query:
Nếu bảng `hososcbd_tamdung` có nhiều record, đảm bảo có index:
```sql
-- Kiểm tra index
SHOW INDEX FROM hososcbd_tamdung;

-- Nếu thiếu, tạo index
CREATE INDEX idx_hoso_trangthai ON hososcbd_tamdung(hoso, trangthai);
```

---

## 📝 CHECKLIST

- [ ] Test Case 1: Tạm dừng hồ sơ chưa kết thúc
- [ ] Test Case 2: Tiếp tục hồ sơ đang tạm dừng (chưa kết thúc)
- [ ] Test Case 3: ⭐ Xem hồ sơ đang tạm dừng CÓ ngày kết thúc
- [ ] Test Case 4: ⭐ Tiếp tục hồ sơ đang tạm dừng CÓ ngày kết thúc
- [ ] Test Case 5: User thường KHÔNG sửa được hồ sơ đã kết thúc (không tạm dừng)
- [ ] Test Case 6: Admin vẫn sửa được TẤT CẢ hồ sơ
- [ ] Kiểm tra database: Tất cả trường được insert/update đúng
- [ ] Kiểm tra performance: Query không chậm
- [ ] Kiểm tra báo cáo tháng: Hồ sơ tạm dừng được loại trừ đúng

---

## 🎯 KẾT LUẬN

Sau khi thực hiện các thay đổi:
- ✅ User thường có thể tiếp tục hồ sơ đang tạm dừng, ngay cả khi có ngày kết thúc
- ✅ User thường vẫn KHÔNG thể sửa hồ sơ đã hoàn thành (không tạm dừng)
- ✅ Admin vẫn giữ toàn quyền
- ✅ Dữ liệu được insert đầy đủ vào database

**Lưu ý:** Nếu phát hiện vấn đề, kiểm tra file `apache error.log` để xem thông báo DEBUG.
