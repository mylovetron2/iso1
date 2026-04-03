# 🔍 HƯỚNG DẪN DEBUG NÚT TẠM DỪNG

## Bước 1: Kiểm tra bảng database

**Mở phpMyAdmin và chạy lệnh:**

```sql
SHOW TABLES LIKE 'hososcbd_tamdung';
```

### ❌ Nếu kết quả: "0 rows"
➡️ **Bảng chưa được tạo!** Hãy:
1. Mở file `create_tamdung_table.sql`
2. Copy toàn bộ nội dung
3. Paste vào phpMyAdmin → tab SQL
4. Click **Go** (Thực thi)

### ✅ Nếu kết quả: "1 row"
➡️ Bảng đã tồn tại, chuyển sang bước 2

---

## Bước 2: Test nút tạm dừng

1. Mở trang: `formsc.php?edithoso=2018-2&username=khanhnd`
2. Click nút **⏸ TẠM DỪNG HỒ SƠ**
3. Nhập lý do: "Test chức năng"
4. Click OK trong confirm dialog

### Các trường hợp có thể xảy ra:

#### ❌ Trường hợp 1: Alert "Bảng hososcbd_tamdung chưa được tạo!"
**Nguyên nhân:** Database chưa có bảng
**Giải pháp:** Quay lại Bước 1

#### ❌ Trường hợp 2: Alert "Lỗi khi tạm dừng hồ sơ: xxx"
**Nguyên nhân:** Lỗi SQL (thiếu cột, sai kiểu dữ liệu, ...)
**Giải pháp:** 
1. Chụp màn hình thông báo lỗi
2. Drop bảng cũ: `DROP TABLE IF EXISTS hososcbd_tamdung;`
3. Chạy lại `create_tamdung_table.sql`

#### ❌ Trường hợp 3: Không có thông báo gì, trang không làm gì
**Nguyên nhân:** JavaScript bị lỗi hoặc form không submit
**Giải pháp:**
1. Nhấn F12 → tab Console
2. Xem có lỗi JavaScript không?
3. Kiểm tra Network tab → có request POST không?

#### ✅ Trường hợp 4: Alert thành công, trang reload
**Kết quả:** Trang sẽ:
- Hiển thị box cảnh báo màu vàng: "⚠️ HỒ SƠ ĐANG TẠM DỪNG"
- Nút đổi thành: "▶ TIẾP TỤC HỒ SƠ"

---

## Bước 3: Kiểm tra log file

**Windows:** Xem file error log tại:
- `C:\xampp\apache\logs\error.log` (XAMPP)
- `C:\wamp64\logs\apache_error.log` (WAMP)

**Tìm các dòng:**
```
DEBUG TAMDUNG: action=tamdung, hosomay=2018-2, username=khanhnd
DEBUG SQL: INSERT INTO hososcbd_tamdung ...
```

Nếu **KHÔNG THẤY** các dòng này → Form không submit hoặc biến không đúng

---

## Bước 4: Test trực tiếp SQL

Chạy lệnh này trong phpMyAdmin:

```sql
INSERT INTO hososcbd_tamdung (
    hoso, mavt, somay, model, maql,
    ngay_tamdung, nguoi_tamdung, lydo_tamdung, trangthai
) VALUES (
    '2018-2', 'GCL-101', '001164', '101', '20260325-KTKT-2015',
    NOW(), 'khanhnd', 'Test thủ công', 'dang_tam_dung'
);
```

### ✅ Nếu thành công:
➡️ Bảng OK, vấn đề ở PHP code

### ❌ Nếu lỗi:
➡️ Sao chép thông báo lỗi và kiểm tra lại cấu trúc bảng

---

## Bước 5: Kiểm tra kết quả

```sql
SELECT * FROM hososcbd_tamdung WHERE hoso = '2018-2';
```

### Kết quả mong đợi:
| id | hoso | mavt | nguoi_tamdung | lydo_tamdung | trangthai |
|----|------|------|---------------|--------------|-----------|
| 1  | 2018-2 | GCL-101 | khanhnd | Test thủ công | dang_tam_dung |

---

## 🆘 Vẫn không hoạt động?

Cung cấp thông tin sau:

1. **Kết quả Bước 1:** Bảng có tồn tại không?
2. **Kết quả Bước 2:** Thông báo lỗi là gì?
3. **Kết quả Bước 3:** Có log gì trong error.log?
4. **Kết quả Bước 4:** SQL test thủ công có chạy không?
5. **Screenshot:** Chụp màn hình console (F12) khi click nút

---

## ✨ Sau khi hoạt động:

Xóa các debug log để tránh làm chậm hệ thống:
- Xóa các dòng `error_log(...)` trong formsc.php
