# 📦 PACKAGE CHỨC NĂNG TẠM DỪNG/TIẾP TỤC HỒ SƠ

## 📂 Cấu trúc Files

```
.
├── HUONG_DAN_CHUC_NANG_TAM_DUNG.md     ← Hướng dẫn chi tiết đầy đủ
├── README_TAM_DUNG.md                   ← File này (hướng dẫn nhanh)
└── sql/
    ├── create_hososcbd_tamdung_table.sql   ← Tạo bảng database
    ├── insert_sample_data_tamdung.sql       ← Dữ liệu mẫu để test
    └── query_examples_tamdung.sql           ← Các query mẫu hữu ích
```

## ⚡ HƯỚNG DẪN NHANH - 3 BƯỚC TRIỂN KHAI

### BƯỚC 1: Setup Database (5 phút)

```bash
# 1.1. Chạy SQL tạo bảng
mysql -u username -p database_name < sql/create_hososcbd_tamdung_table.sql

# 1.2. (Optional) Import dữ liệu mẫu để test
mysql -u username -p database_name < sql/insert_sample_data_tamdung.sql
```

### BƯỚC 2: Copy Code vào Project (10 phút)

Mở file `HUONG_DAN_CHUC_NANG_TAM_DUNG.md` → Copy các đoạn code sau:

**2.1. Form HTML (Section 2.1 & 2.2)**
- Copy vào file form chính của bạn
- Thay `formsc.php` → tên file form của bạn
- Thay biến `$username`, `$password` → biến session của bạn

**2.2. JavaScript Validation (Section 2.3)**
- Copy vào `<script>` tag
- Đặt BÊN NGOÀI bất kỳ `<div style="display:none">` nào

**2.3. Backend Processing (Section 2.4)**
- Copy vào đầu file PHP (trước output HTML)
- Update tên bảng nếu khác

**2.4. CSS Styling (Section 2.5)**
- Copy vào `<style>` tag hoặc file CSS riêng

### BƯỚC 3: FIX TinyMCE (QUAN TRỌNG!)

**⚠️ Nếu project dùng TinyMCE hoặc rich text editor khác:**

```javascript
// TÌM TẤT CẢ blocks khởi tạo TinyMCE
tinymce.init({
    selector: "textarea"   // ← ĐỔI DÒNG NÀY
});

// THÀNH:
tinymce.init({
    selector: "textarea:not(.no-tinymce)"   // ← THÊM :not(.no-tinymce)
});
```

**Và đảm bảo textarea có class:**
```html
<textarea name="lydo_tamdung" id="lydo_tamdung" 
          class="no-tinymce"  ← THÊM CLASS NÀY
          rows="2" cols="50"></textarea>
```

## 🎯 Các Tính Năng Chính

### ✅ Đã bao gồm:
- [x] Form tạm dừng với lý do bắt buộc
- [x] Form tiếp tục với ghi chú tùy chọn  
- [x] Validation JavaScript
- [x] Lưu lịch sử đầy đủ vào database
- [x] Hiển thị cảnh báo khi đang tạm dừng
- [x] Tính thời gian tạm dừng (ngày/giờ)
- [x] Tích hợp báo cáo tháng (loại trừ thiết bị tạm dừng)
- [x] Báo cáo lịch sử với bộ lọc
- [x] Fix bug TinyMCE hijacking textarea

### 📋 Cần customize:
- [ ] Tên biến session (`$username`, `$password`)
- [ ] Tên file form (`formsc.php`)
- [ ] Tên bảng chính (`hososcbd_iso`) 
- [ ] Tên cột (`hoso`, `maql`, `mavt`, `somay`)
- [ ] URL redirect sau khi submit
- [ ] Style CSS cho phù hợp theme

## 🔧 Tích Hợp Báo Cáo

### Copy function này vào file báo cáo:

```php
function is_thietbi_tamdung($hoso, $thang, $nam) {
    $check_sql = mysql_query("SELECT trangthai, DATE_FORMAT(ngay_thuchien, '%Y-%m') as thang_td 
                              FROM hososcbd_tamdung 
                              WHERE hoso='$hoso' 
                              ORDER BY ngay_thuchien DESC LIMIT 1");
    
    if ($check_sql && mysql_num_rows($check_sql) > 0) {
        $record = mysql_fetch_array($check_sql);
        if ($record['trangthai'] == 'tamdung') {
            $thang_td = $record['thang_td'];
            $thang_baocao = sprintf('%04d-%02d', $nam, $thang);
            
            if ($thang_td == $thang_baocao) {
                return false; // Tạm dừng cùng tháng → vẫn hiển thị
            }
            return true; // Tạm dừng từ trước → loại trừ
        }
    }
    return false;
}
```

### Sử dụng trong vòng lặp báo cáo:

```php
while ($row = mysql_fetch_array($result)) {
    $hoso = $row['hoso'];
    
    // Bỏ qua thiết bị đang tạm dừng
    if (is_thietbi_tamdung($hoso, $thang, $nam)) {
        continue;
    }
    
    // Hiển thị thiết bị bình thường...
}
```

## 🐛 Troubleshooting

### ❌ Lỗi: "Vui lòng nhập lý do tạm dừng" dù đã nhập

**Nguyên nhân:** TinyMCE đang hijack textarea

**Giải pháp:**
1. Tìm tất cả `tinymce.init()` trong project
2. Đổi `selector: "textarea"` → `selector: "textarea:not(.no-tinymce)"`
3. Thêm `class="no-tinymce"` cho textarea tạm dừng
4. Hard refresh: `Ctrl + F5`

### ❌ Lỗi: Hiển thị 2 vùng nhập liệu

**Nguyên nhân:** Giống trên - TinyMCE

**Giải pháp:** Giống trên

### ❌ Lỗi: Database error "Table doesn't exist"

**Nguyên nhân:** Chưa chạy SQL script

**Giải pháp:** 
```bash
mysql -u username -p database_name < sql/create_hososcbd_tamdung_table.sql
```

### ❌ Lỗi: Form không submit

**Debug:**
1. Mở Console (F12)
2. Xem có lỗi JavaScript không
3. Check form `action` URL đúng chưa
4. Check tên input fields khớp với PHP `$_POST` chưa

## 📚 Documentation Đầy Đủ

Xem file **`HUONG_DAN_CHUC_NANG_TAM_DUNG.md`** để biết:
- Code chi tiết từng section
- Giải thích logic hoạt động
- Ví dụ SQL queries
- Best practices
- Workflow đầy đủ

## 🧪 Test Checklist

- [ ] Tạm dừng hồ sơ trong create mode
- [ ] Tạm dừng hồ sơ trong edit mode
- [ ] Tiếp tục hồ sơ đã tạm dừng
- [ ] Validation: Không cho submit nếu chưa nhập lý do
- [ ] Hiển thị cảnh báo đỏ khi đang tạm dừng
- [ ] Báo cáo tháng: Thiết bị tạm dừng không xuất hiện
- [ ] Báo cáo tháng: Ngoại lệ - thiết bị tạm dừng cùng tháng vẫn hiện
- [ ] Báo cáo lịch sử: Lọc theo trạng thái
- [ ] Báo cáo lịch sử: Lọc theo ngày
- [ ] Hard refresh browser sau khi update

## 📞 Hỗ Trợ

Các query mẫu để debug/test:

```sql
-- Xem tất cả lịch sử
SELECT * FROM hososcbd_tamdung ORDER BY ngay_thuchien DESC;

-- Xem hồ sơ đang tạm dừng
SELECT * FROM hososcbd_tamdung 
WHERE id IN (SELECT MAX(id) FROM hososcbd_tamdung GROUP BY hoso)
AND trangthai = 'tamdung';

-- Xem lịch sử 1 hồ sơ cụ thể
SELECT * FROM hososcbd_tamdung WHERE hoso = 'HS001' ORDER BY ngay_thuchien DESC;
```

Xem thêm trong file: `sql/query_examples_tamdung.sql`

---

**Version:** 1.0  
**Last Updated:** 08/04/2026  
**Author:** GitHub Copilot
