<?php
// Báo cáo liệt kê hồ sơ và giờ làm việc từng người trong khoảng thời gian (theo tháng, cộng dồn lũy kế)
// Sử dụng bảng hososcbd_iso và ngthuchien_iso
// Tham số: from_month, to_month, year (GET)

include ("select_data.php");

$thang_batdau = isset($_GET['from_month']) ? intval($_GET['from_month']) : date('m');
$thang_ketthuc = isset($_GET['to_month']) ? intval($_GET['to_month']) : date('m');
$nam = isset($_GET['year']) ? intval($_GET['year']) : date('Y');

?>
<h2><?php echo $tieude; ?></h2>

<form method="get" style="margin-bottom:20px;">
  <fieldset style="display:inline-block;padding:10px 20px;">
    <legend><b>Chọn khoảng thời gian</b></legend>
    <label>Từ tháng:
      <select name="from_month">
        <?php for($m=1;$m<=12;$m++): ?>
          <option value="<?php echo $m; ?>" <?php if($thang_batdau==$m) echo 'selected'; ?>><?php echo $m; ?></option>
        <?php endfor; ?>
      </select>
    </label>
    <label>Đến tháng:
      <select name="to_month">
        <?php for($m=1;$m<=12;$m++): ?>
          <option value="<?php echo $m; ?>" <?php if($thang_ketthuc==$m) echo 'selected'; ?>><?php echo $m; ?></option>
        <?php endfor; ?>
      </select>
    </label>
    <label>Năm: <input type="number" name="year" min="2000" max="2100" value="<?php echo $nam; ?>"></label>
    <label>Lọc hồ sơ:
      <select name="staff_filter">
        <option value="all" <?php if(!isset($_GET['staff_filter']) || $_GET['staff_filter']==='all') echo 'selected'; ?>>Tất cả</option>
        <option value="hide_no_staff" <?php if(isset($_GET['staff_filter']) && $_GET['staff_filter']==='hide_no_staff') echo 'selected'; ?>>Không hiển thị "Không có nhân viên thực hiện"</option>
        <option value="only_no_staff" <?php if(isset($_GET['staff_filter']) && $_GET['staff_filter']==='only_no_staff') echo 'selected'; ?>>Chỉ hiển thị "Không có nhân viên thực hiện"</option>
      </select>
    </label>
    <button type="submit">Xem báo cáo</button>
  </fieldset>
</form>
<?php
// Xử lý search
$search = isset($_GET['search']) ? trim($_GET['search']) : '';

$date_from = sprintf('%04d-%02d-01', $nam, $thang_batdau);
$date_to = sprintf('%04d-%02d-31', $nam, $thang_ketthuc);
$where = "(ngayth <= '$date_to' AND ngaykt >= '$date_from')";
if ($search !== '') {
    $search_sql = mysql_real_escape_string($search);
    $where .= " AND (hoso LIKE '%$search_sql%'";
    $where .= " OR EXISTS (SELECT 1 FROM ngthuchien_iso WHERE mahoso=hososcbd_iso.hoso AND hoten LIKE '%$search_sql%')";
    $where .= " OR EXISTS (SELECT 1 FROM thietbi_iso WHERE mavt=hososcbd_iso.mavt AND tenvt LIKE '%$search_sql%'))";
}
// Lấy trạng thái lọc
$staff_filter = isset($_GET['staff_filter']) ? $_GET['staff_filter'] : 'all';
if ($staff_filter === 'only_no_staff') {
    $where .= " AND NOT EXISTS (SELECT 1 FROM ngthuchien_iso WHERE mahoso=hososcbd_iso.hoso)";
} elseif ($staff_filter === 'hide_no_staff') {
    $where .= " AND EXISTS (SELECT 1 FROM ngthuchien_iso WHERE mahoso=hososcbd_iso.hoso)";
}
$sql_hoso = mysql_query("SELECT * FROM hososcbd_iso WHERE $where ORDER BY hoso");
?>

<!-- Lọc bảng bằng JS, không reload SQL -->
<div style="margin-bottom:10px;">
  <input type="text" id="tableSearchInput" placeholder="Tìm kiếm nhanh trong bảng..." style="width:200px;">
  <button type="button" onclick="filterTableRows()">Tìm kiếm</button>
  <button type="button" onclick="resetTableRows()">Hiện tất cả</button>
</div>
<script>
function filterTableRows() {
  var input = document.getElementById('tableSearchInput');
  var filter = input.value.toLowerCase();
  var table = document.querySelector('table');
  var trs = table.getElementsByTagName('tr');
  for (var i = 1; i < trs.length; i++) { // Bỏ qua header
    var rowText = trs[i].innerText.toLowerCase();
    if (filter === '' || rowText.indexOf(filter) !== -1) {
      trs[i].style.display = '';
    } else {
      trs[i].style.display = 'none';
    }
  }
}
function resetTableRows() {
  document.getElementById('tableSearchInput').value = '';
  filterTableRows();
}
</script>

<table border="1" cellpadding="5" cellspacing="0">
<tr><th>STT</th><th>Số hồ sơ</th><th>Ngày bắt đầu</th><th>Ngày kết thúc</th><th>Người thực hiện</th><th>Tổng số giờ làm việc</th></tr>
<?php
$stt = 1;
while($row_hoso = mysql_fetch_array($sql_hoso)) {
    $hoso = $row_hoso['hoso'];
    $ngayth = $row_hoso['ngayth'];
    $ngaykt = $row_hoso['ngaykt'];
    $sql_nv = mysql_query("SELECT * FROM ngthuchien_iso WHERE mahoso='$hoso'");
    $tong_gio = 0;
    $ds_nv = [];
    while($row_nv = mysql_fetch_array($sql_nv)) {
        $hoten = $row_nv['hoten'];
        // Lũy kế: tổng giờ = giá trị cột giolvX (X là tháng kết thúc)
        $field_end = 'giolv'.$thang_ketthuc;
        $gio_nv = (isset($row_nv[$field_end]) && $row_nv[$field_end] !== null) ? intval($row_nv[$field_end]) : 0;
        $tong_gio += $gio_nv;
        if($gio_nv > 0) {
            $ds_nv[] = $hoten;
        }
    }
    if ($staff_filter === 'only_no_staff') {
        if ($tong_gio == 0) {
            echo '<tr>';
            echo '<td>'.$stt.'</td>';
            echo '<td>'.$hoso.'</td>';
            echo '<td>'.$ngayth.'</td>';
            echo '<td>'.$ngaykt.'</td>';
            echo '<td colspan="2">Không có nhân viên thực hiện</td>';
            echo '</tr>';
            $stt++;
        }
    } elseif ($staff_filter === 'hide_no_staff') {
        if ($tong_gio > 0) {
            echo '<tr>';
            echo '<td>'.$stt.'</td>';
            echo '<td>'.$hoso.'</td>';
            echo '<td>'.$ngayth.'</td>';
            echo '<td>'.$ngaykt.'</td>';
            echo '<td>'.htmlspecialchars(implode(", ", $ds_nv)).'</td>';
            echo '<td>'.$tong_gio.'</td>';
            echo '</tr>';
            $stt++;
        }
    } else { // all
        if ($tong_gio > 0) {
            echo '<tr>';
            echo '<td>'.$stt.'</td>';
            echo '<td>'.$hoso.'</td>';
            echo '<td>'.$ngayth.'</td>';
            echo '<td>'.$ngaykt.'</td>';
            echo '<td>'.htmlspecialchars(implode(", ", $ds_nv)).'</td>';
            echo '<td>'.$tong_gio.'</td>';
            echo '</tr>';
            $stt++;
        } else {
            echo '<tr>';
            echo '<td>'.$stt.'</td>';
            echo '<td>'.$hoso.'</td>';
            echo '<td>'.$ngayth.'</td>';
            echo '<td>'.$ngaykt.'</td>';
            echo '<td colspan="2">Không có nhân viên thực hiện</td>';
            echo '</tr>';
            $stt++;
        }
    }
}
?>
</table>
