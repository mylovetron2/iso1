# HƯỚNG DẪN TEST BDDK CHECKBOX

## Ngày test: 01/04/2026

## Trường hợp cần test:

### ✅ CASE 1: Thiết bị CÓ kế hoạch BDDK
**Mục tiêu:** Checkbox BDDK phải ENABLED (có thể click)

**Bước test:**
1. Vào database, query tìm thiết bị có plan:
```sql
SELECT t.mavt, t.somay, t.model, t.stt as thietbi_id, k.nam, k.qui_1, k.qui_2, k.qui_3, k.qui_4
FROM thietbi_iso t
INNER JOIN ke_hoach_bao_duong_dinh_ky_iso k ON t.stt = k.thietbi_id
LIMIT 1;
```

2. Vào formsc.php, tìm hồ sơ sửa chữa của thiết bị này

3. Click vào link edit hồ sơ

4. **Kiểm tra:**
   - [ ] Checkbox BDDK có thể click (không bị disabled)
   - [ ] Nếu qui_X_hoantat=1, checkbox tự động được checked
   - [ ] Hover vào checkbox KHÔNG hiển thị tooltip "Không có kế hoạch..."
   - [ ] Có thể check/uncheck được

**Kết quả mong đợi:** ✓ ENABLED, có thể tương tác


---

### ✅ CASE 2: Thiết bị KHÔNG CÓ kế hoạch BDDK
**Mục tiêu:** Checkbox BDDK phải DISABLED (không thể click)

**Bước test:**
1. Vào database, query tìm thiết bị KHÔNG có plan:
```sql
SELECT t.mavt, t.somay, t.model, t.stt as thietbi_id
FROM thietbi_iso t
LEFT JOIN ke_hoach_bao_duong_dinh_ky_iso k ON t.stt = k.thietbi_id
WHERE k.id IS NULL
LIMIT 1;
```

2. Vào formsc.php, tìm hồ sơ sửa chữa của thiết bị này (hoặc tạo mới)

3. Click vào link edit hồ sơ

4. **Kiểm tra:**
   - [ ] Checkbox BDDK bị disabled (màu xám, không click được)
   - [ ] Hover vào checkbox hiển thị tooltip: "Không có kế hoạch bảo dưỡng định kỳ"
   - [ ] Không thể check/uncheck
   - [ ] Hiển thị cảnh báo: "⚠ Không xác định được kế hoạch bảo dưỡng định kỳ"

**Kết quả mong đợi:** ✓ DISABLED với tooltip rõ ràng


---

## Ghi chú debug:

### Nếu checkbox vẫn bị disabled dù có plan:
1. Kiểm tra query ở dòng ~14524:
```php
$check_has_plan = mysql_query("SELECT id FROM ke_hoach_bao_duong_dinh_ky_iso WHERE thietbi_id='$thietbi_id' LIMIT 1");
```

2. Thêm debug code ngay sau đó:
```php
echo "DEBUG: thietbi_id = $thietbi_id, has_plan = " . mysql_num_rows($check_has_plan) . "<br>";
echo "DEBUG: has_bddk_plan = " . ($has_bddk_plan ? "true" : "false") . "<br>";
echo "DEBUG: bddk_disabled = '$bddk_disabled'<br>";
```

3. Xem output để biết query có trả về kết quả không

### Nếu checkbox enabled dù không có plan:
1. Kiểm tra biến `$thietbi_id` có được set đúng không
2. Kiểm tra query trả về đúng 0 rows


---

## Checklist tổng hợp:
- [ ] Case 1: Thiết bị có plan → ENABLED ✓
- [ ] Case 2: Thiết bị không plan → DISABLED ✓
- [ ] Tooltip hiển thị đúng
- [ ] Auto-check khi qui_X_hoantat=1
- [ ] Lưu/reload form giữ đúng state
- [ ] KT/BD/SC vẫn mutual exclusive
- [ ] BDDK độc lập với KT/BD/SC

**Khi tất cả checklist ✓ → PASS → Commit code**
