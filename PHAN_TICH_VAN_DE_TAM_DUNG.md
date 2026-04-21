# BÁO CÁO PHÂN TÍCH VẤN ĐỀ TẠM DỪNG

## 🔴 VẤN ĐỀ PHÁT HIỆN

Sau khi tạm dừng hồ sơ, người dùng KHÔNG phải admin gặp thông báo lỗi:
> **"Chỉ có admin mới được sửa hồ sơ có ngày kết thúc"**

Điều này ngăn cản người dùng thường tiếp tục hoặc xem hồ sơ đã tạm dừng nếu hồ sơ đó đã có ngày kết thúc.

---

## 📍 NGUYÊN NHÂN

### Logic hiện tại trong `formsc.php`:

Có **4 vị trí** (dòng 876, 5630, 6120, 14717) có logic tương tự:

```php
if ($phanquyen=="1") {
    // Admin: Xem tất cả hồ sơ
    $tenthietbisql1 = mysql_query("SELECT DISTINCT mavt,somay,hoso,model 
                                   FROM hososcbd_iso WHERE phieu='$fieu'");
} else {
    // User thường: CHỈ xem hồ sơ chưa kết thúc (ngaykt = '0000-00-00')
    $tenthietbisql1 = mysql_query("SELECT DISTINCT mavt,somay,hoso,model 
                                   FROM hososcbd_iso 
                                   WHERE phieu='$fieu' and ngaykt ='0000-00-00'");
    
    // Hiển thị thông báo cho các hồ sơ đã kết thúc
    $tenthietbisql2 = mysql_query("SELECT DISTINCT mavt,somay,model 
                                   FROM hososcbd_iso 
                                   WHERE phieu='$fieu' and ngaykt !='0000-00-00'");
    while($row = mysql_fetch_array($tenthietbisql2)) {
        echo "Chỉ có admin mới được sửa hồ sơ Máy: $mamay có ngày kết thúc";
    }
}

// Nếu không có hồ sơ nào → exit
if ($ck==0) {
    echo "Chỉ có admin mới được sửa hồ sơ có ngày kết thúc";
    exit; // ← CHẶN NGƯỜI DÙNG!
}
```

### Kịch bản gây lỗi:

1. ✅ Hồ sơ A được tạm dừng (trangthai = 'dang_tam_dung')
2. ✅ Hồ sơ A có ngày kết thúc (ngaykt = '2024-01-15')
3. ❌ User thường muốn tiếp tục hồ sơ A
4. ❌ Query chỉ lấy hồ sơ có `ngaykt = '0000-00-00'` → không tìm thấy hồ sơ A
5. ❌ Hiển thị thông báo "Chỉ có admin mới được sửa..." và `exit`

---

## ✅ GIẢI PHÁP

### Sửa logic để bao gồm hồ sơ đang tạm dừng:

**User thường có thể xem/sửa hồ sơ nếu:**
- Hồ sơ chưa kết thúc (ngaykt = '0000-00-00'), HOẶC
- Hồ sơ đang tạm dừng (bất kể ngày kết thúc)

### Code sửa:

```php
if ($phanquyen=="1") {
    // Admin: Xem tất cả hồ sơ
    $tenthietbisql1 = mysql_query("SELECT DISTINCT mavt,somay,hoso,model 
                                   FROM hososcbd_iso WHERE phieu='$fieu'");
} else {
    // User thường: Xem hồ sơ chưa kết thúc HOẶC đang tạm dừng
    $tenthietbisql1 = mysql_query("SELECT DISTINCT mavt,somay,hoso,model 
                                   FROM hososcbd_iso 
                                   WHERE phieu='$fieu' 
                                   AND (ngaykt ='0000-00-00' 
                                        OR hoso IN (SELECT hoso FROM hososcbd_tamdung 
                                                    WHERE trangthai='dang_tam_dung'))");
    
    // Hiển thị thông báo cho các hồ sơ đã kết thúc NHƯNG KHÔNG đang tạm dừng
    $tenthietbisql2 = mysql_query("SELECT DISTINCT mavt,somay,model 
                                   FROM hososcbd_iso 
                                   WHERE phieu='$fieu' 
                                   AND ngaykt !='0000-00-00' 
                                   AND hoso NOT IN (SELECT hoso FROM hososcbd_tamdung 
                                                    WHERE trangthai='dang_tam_dung')");
    while($row = mysql_fetch_array($tenthietbisql2)) {
        echo "Chỉ có admin mới được sửa hồ sơ Máy: $mamay có ngày kết thúc";
    }
}
```

---

## 📋 CÁC VỊ TRÍ CẦN SỬA

File: `formsc.php`

| Dòng | Context | Mô tả |
|------|---------|-------|
| 876 | Tạo hồ sơ mới (phiếu sửa chữa) | SELECT hồ sơ trong phieu để chọn máy |
| 5630 | Tìm kiếm hồ sơ theo mã quản lý | SELECT hồ sơ theo maql |
| 6120 | Tạo hồ sơ mới (phiếu sửa chữa v2) | SELECT hồ sơ trong phieu để chọn máy |
| 14717 | Chỉnh sửa hồ sơ (Edit mode) | SELECT hồ sơ trong phieu để chọn máy |

---

## ⚠️ VẤN ĐỀ PHỤ: CẤU TRÚC BẢNG KHÔNG NHẤT QUÁN

### Bảng hiện tại (theo thông tin người dùng):

```sql
CREATE TABLE hososcbd_tamdung (
    id INT PRIMARY KEY AUTO_INCREMENT,
    hoso VARCHAR(50) NOT NULL,
    mavt VARCHAR(50) NOT NULL,
    somay VARCHAR(50),
    model VARCHAR(100),
    maql VARCHAR(100),
    
    ngay_tamdung DATETIME NOT NULL,
    nguoi_tamdung VARCHAR(100),
    lydo_tamdung TEXT,
    
    ngay_tieptuc DATETIME,
    nguoi_tieptuc VARCHAR(100),
    ghichu_tieptuc TEXT,
    
    thoigian_tamdung_gio INT,
    thoigian_tamdung_ngay DECIMAL(10,2),
    
    trangthai ENUM('dang_tam_dung', 'da_tiep_tuc') DEFAULT 'dang_tam_dung',
    
    -- Trường duplicate? (giống ngay_tamdung/nguoi_tamdung)
    nguoi_thuchien VARCHAR(100) NOT NULL,
    ngay_thuchien DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);
```

### Code hiện tại INSERT:

```php
INSERT INTO hososcbd_tamdung (
    hoso, mavt, somay, model, maql,
    ngay_tamdung, nguoi_tamdung, lydo_tamdung, trangthai
) VALUES (...)
```

### ⚠️ VẤN ĐỀ:

1. **Thiếu giá trị cho cột NOT NULL:**
   - `nguoi_thuchien VARCHAR(100) NOT NULL` - Code KHÔNG insert giá trị này
   - Có thể gây lỗi nếu không có default value
   
2. **Trùng lặp dữ liệu:**
   - `nguoi_tamdung` vs `nguoi_thuchien` - giống nhau?
   - `ngay_tamdung` vs `ngay_thuchien` - giống nhau?

### KHUYẾN NGHỊ:

**Option 1:** Cập nhật code INSERT để bao gồm `nguoi_thuchien` và `ngay_thuchien`:
```php
INSERT INTO hososcbd_tamdung (
    hoso, mavt, somay, model, maql,
    ngay_tamdung, nguoi_tamdung, lydo_tamdung, 
    nguoi_thuchien, ngay_thuchien, trangthai
) VALUES (
    '$hosomay', '{$info['mavt']}', '{$info['somay']}', '{$info['model']}', '{$info['maql']}',
    NOW(), '$username_esc', '$lydo_esc',
    '$username_esc', NOW(), 'dang_tam_dung'
)
```

**Option 2:** Sửa cấu trúc bảng để loại bỏ duplicate hoặc đặt DEFAULT:
```sql
ALTER TABLE hososcbd_tamdung 
MODIFY COLUMN nguoi_thuchien VARCHAR(100);  -- Bỏ NOT NULL
```

---

## 🎯 KẾT LUẬN

### Cần thực hiện:

✅ **Ưu tiên cao:**
1. Sửa 4 vị trí trong `formsc.php` để cho phép user thường xem/sửa hồ sơ đang tạm dừng
2. Test kỹ sau khi sửa

⚠️ **Cần xem xét:**
1. Kiểm tra cấu trúc bảng `hososcbd_tamdung` có trùng với code không
2. Quyết định xử lý `nguoi_thuchien` / `ngay_thuchien`

### Rủi ro:

- Nếu không sửa: User thường không thể tiếp tục hồ sơ tạm dừng có ngày kết thúc
- Nếu sửa sai: Admin có thể mất quyền kiểm soát hồ sơ đã kết thúc

### Kiểm tra sau khi sửa:

1. ✅ User thường có thể tiếp tục hồ sơ đang tạm dừng (có ngày kết thúc)
2. ✅ User thường KHÔNG thể sửa hồ sơ đã kết thúc (không tạm dừng)
3. ✅ Admin vẫn có thể sửa tất cả hồ sơ
