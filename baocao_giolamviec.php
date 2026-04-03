<?php
include ("select_data.php");


$thang_batdau = isset($_GET['from_month']) ? intval($_GET['from_month']) : date('m');
$from_year = isset($_GET['from_year']) ? intval($_GET['from_year']) : date('Y');
$thang_ketthuc = isset($_GET['to_month']) ? intval($_GET['to_month']) : date('m');
$to_year = isset($_GET['to_year']) ? intval($_GET['to_year']) : date('Y');

// Để tương thích với logic cũ, vẫn giữ $nam là năm bắt đầu (có thể sửa lại toàn bộ logic nếu cần)
$nam = $from_year;

// Biến tổng
$tong_so_maql = 0; // Tổng số đơn hàng (maql)
$tong_so_hoso = 0; // Tổng số máy (số hồ sơ có TS.Giờ > 0)
$tong_ts_gio = 0;

?>
<!-- Bootstrap 4 CDN + FontAwesome -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<!-- Menu thường Bootstrap với logo bên trái -->
<nav class="navbar navbar-expand-lg navbar-dark mb-3 shadow sticky-top" style="background: #1976d2; z-index: 1030;">
  <div class="container-fluid px-3">
    <a class="navbar-brand d-flex align-items-center mr-4 py-0" href="#">
      <img src="logo2.png" alt="Logo" style="height:44px;max-width:100px;" class="mr-2">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mainNavbar" aria-controls="mainNavbar" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-center" id="mainNavbar">
      <ul class="navbar-nav">
        <li class="nav-item mx-2">
          <a class="nav-link active font-weight-bold text-primary" href="#" tabindex="-1" aria-disabled="true" style="background: #e3f2fd; border-radius: 8px;">LIỆT KÊ CÔNG TÁC BD-SC</a>
        </li>
        <li class="nav-item mx-2">
          <a class="nav-link" href="thongkehonghoc.php">THỐNG KÊ HỎNG HÓC</a>
        </li>
        <li class="nav-item mx-2">
          <a class="nav-link" href="dichvungoai.php">THỐNG KÊ DỊCH VỤ NGOÀI</a>
        </li>
        <li class="nav-item mx-2">
          <a class="nav-link" href="thongkegiolv.php">GIỜ CÔNG LÀM VIỆC</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<style>
  .navbar-nav .nav-link {
    font-size: 1.08rem;
    padding: 0.6rem 1.1rem;
    border-radius: 8px;
    color: #fff !important;
    transition: background 0.18s, color 0.18s;
  }
  .navbar-nav .nav-link:hover:not(.active) {
    background: #1565c0;
    color: #fff !important;
  }
  .navbar-nav .nav-link.active {
    background: #e3f2fd;
    color: #1976d2 !important;
    font-weight: 700;
    box-shadow: 0 2px 8px rgba(33,150,243,0.07);
  }
  .navbar {
    background: #1976d2 !important;
    border-radius: 0 !important;
  }
</style>
<div class="container-fluid mt-3">
  <div class="row justify-content-center">
    <div class="col-xl-11 col-lg-12 col-md-12">
      <div class="card shadow-lg border-0 mb-4 rounded-lg animate__animated animate__fadeIn">
        <div class="card-body pb-2 pt-3">
          <div class="d-flex flex-column flex-md-row align-items-center justify-content-between mb-3">
            <div class="flex-grow-1 w-100">
              <h1 class="text-center text-uppercase font-weight-bold mb-1" style="font-size:1.7rem; letter-spacing:1px; color:#0d47a1;">LIỆT KÊ CÔNG TÁC BẢO DƯỠNG, SỬA CHỮA, CHUẨN CHỈNH THIẾT BỊ</h1>
              <h2 class="mb-3 text-primary text-center" style="font-size:1.2rem;"><?php echo $tieude; ?></h2>
            </div>
          </div>
          <form method="get" class="mb-3">
            <div class="form-row align-items-end justify-content-center">
              <div class="form-group col-sm-6 col-md-2 mb-2">
                <label for="from_month"><b>Từ tháng</b></label>
                <select class="form-control" name="from_month" id="from_month">
                  <?php for($m=1;$m<=12;$m++): ?>
                    <option value="<?php echo $m; ?>" <?php if($thang_batdau==$m) echo 'selected'; ?>><?php echo $m; ?></option>
                  <?php endfor; ?>
                </select>
              </div>
              <div class="form-group col-sm-6 col-md-2 mb-2">
                <label for="from_year"><b>Năm bắt đầu</b></label>
                <input type="number" class="form-control" name="from_year" id="from_year" min="2000" max="2100" value="<?php echo $from_year; ?>">
              </div>
              <div class="form-group col-sm-6 col-md-2 mb-2">
                <label for="to_month"><b>Đến tháng</b></label>
                <select class="form-control" name="to_month" id="to_month">
                  <?php for($m=1;$m<=12;$m++): ?>
                    <option value="<?php echo $m; ?>" <?php if($thang_ketthuc==$m) echo 'selected'; ?>><?php echo $m; ?></option>
                  <?php endfor; ?>
                </select>
              </div>
              <div class="form-group col-sm-6 col-md-2 mb-2">
                <label for="to_year"><b>Năm kết thúc</b></label>
                <input type="number" class="form-control" name="to_year" id="to_year" min="2000" max="2100" value="<?php echo $to_year; ?>">
              </div>
              <div class="form-group col-sm-6 col-md-3 mb-2">
                <label for="staff_filter"><b>Lọc hồ sơ</b></label>
                <select class="form-control" name="staff_filter" id="staff_filter">
                  <option value="all" <?php if(isset($_GET['staff_filter']) && $_GET['staff_filter']==='all') echo 'selected'; ?>>Tất cả</option>
                  <option value="hide_no_staff" <?php if(!isset($_GET['staff_filter']) || $_GET['staff_filter']==='hide_no_staff') echo 'selected'; ?>>Không hiển thị "Không truy vấn được hồ sơ"</option>
                  <option value="only_no_staff" <?php if(isset($_GET['staff_filter']) && $_GET['staff_filter']==='only_no_staff') echo 'selected'; ?>>Chỉ hiển thị "Không truy vấn được hồ sơ"</option>
                </select>
              </div>
              <div class="form-group col-sm-6 col-md-1 mb-2 d-flex align-items-end">
                <button type="submit" class="btn btn-success btn-block w-100"><i class="fa fa-search mr-1"></i> Xem báo cáo</button>
              </div>
            </div>
          </form>
          <div class="mb-3 d-flex flex-wrap align-items-center justify-content-center">
            <input type="text" id="tableSearchInput" class="form-control mr-2 mb-2" placeholder="Tìm kiếm nhanh trong bảng..." style="width:220px;max-width:100%;">
            <button type="button" class="btn btn-info mr-2 mb-2" onclick="filterTableRows()"><i class="fa fa-search"></i> Tìm kiếm</button>
            <button type="button" class="btn btn-secondary mr-2 mb-2" onclick="resetTableRows()"><i class="fa fa-undo"></i> Hiện tất cả</button>
            <button type="button" class="btn btn-success ml-auto mb-2" onclick="exportExcel()"><i class="fa fa-file-excel"></i> Xuất Excel</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php
// Xử lý search
$search = isset($_GET['search']) ? trim($_GET['search']) : '';


// Xác định ngày bắt đầu và kết thúc theo từng năm/tháng
$date_from = sprintf('%04d-%02d-01', $from_year, $thang_batdau);
$date_to = sprintf('%04d-%02d-31', $to_year, $thang_ketthuc);
$where = "(ngayth <= '$date_to' AND ngaykt >= '$date_from')";
if ($search !== '') {
    $search_sql = mysql_real_escape_string($search);
    $where .= " AND (hoso LIKE '%$search_sql%'";
    $where .= " OR EXISTS (SELECT 1 FROM ngthuchien_iso WHERE mahoso=hososcbd_iso.hoso AND hoten LIKE '%$search_sql%')";
    $where .= " OR EXISTS (SELECT 1 FROM thietbi_iso WHERE mavt=hososcbd_iso.mavt AND tenvt LIKE '%$search_sql%'))";
}
// Lấy trạng thái lọc
$staff_filter = isset($_GET['staff_filter']) ? $_GET['staff_filter'] : 'hide_no_staff';
if ($staff_filter === 'only_no_staff') {
  $where .= " AND NOT EXISTS (SELECT 1 FROM ngthuchien_iso WHERE mahoso=hososcbd_iso.hoso)";
} elseif ($staff_filter === 'hide_no_staff') {
  $where .= " AND EXISTS (SELECT 1 FROM ngthuchien_iso WHERE mahoso=hososcbd_iso.hoso)";
}
$sql_hoso = mysql_query("SELECT * FROM hososcbd_iso WHERE $where ORDER BY hoso ASC");

?>

<!-- Lọc bảng bằng JS, không reload SQL -->
<script>
function exportExcel() {
  // Lấy các tham số lọc hiện tại trên URL
  var params = new URLSearchParams(window.location.search);
  window.location.href = 'export_excel.php?' + params.toString();
}
</script>
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

<style>
body,td,th {
  font-family: 'Times New Roman', Times, serif;
}
</style>
<div class="container-fluid">
<style>
  .table-report th, .table-report td {
    vertical-align: middle !important;
    padding: 0.55rem 0.7rem !important;
    border: 1.5px solid #b0bec5 !important;
    font-size: 15px;
    transition: background 0.2s;
  }
  .table-report th {
    background: #1976d2 !important;
    color: #fff !important;
    text-align: center;
    font-weight: 600;
    letter-spacing: 0.5px;
    border-top-left-radius: 8px;
    border-top-right-radius: 8px;
  }
  .table-report tbody tr:nth-child(even) {
    background: #f5f7fa;
  }
  .table-report tbody tr:hover {
    background: #e3f2fd !important;
    box-shadow: 0 2px 8px rgba(33,150,243,0.08);
    z-index: 2;
    position: relative;
  }
  .table-report tbody tr.group-row {
    background: #e3f2fd !important;
    font-weight: bold;
    color: #0d47a1;
    font-size: 16px;
    border-left: 4px solid #1976d2;
  }
  .table-report td.text-center, .table-report th.text-center {
    text-align: center !important;
  }
  .table-report td.text-right {
    text-align: right !important;
  }
  .card {
    border-radius: 16px !important;
    box-shadow: 0 4px 24px rgba(33,150,243,0.10) !important;
    border: none !important;
  }
  .alert-info.font-weight-bold {
    background: #e3f2fd !important;
    color: #0d47a1 !important;
    border-radius: 10px;
    font-size: 1.08rem;
    text-align: center;
    margin-top: 18px;
    margin-bottom: 18px;
    box-shadow: 0 2px 8px rgba(33,150,243,0.07);
  }
</style>
<div class="row justify-content-center">
  <div class="col-xl-11 col-lg-12 col-md-12">
    <table class="table table-report table-striped table-bordered table-hover bg-white w-100" style="min-width:1100px;">
<thead>
<tr>
  <th class="text-center" style="width:35px;">Stt DV</th>
  <th class="text-center" style="width:60px;">№ Yêu cầu DV</th>
  <th class="text-center" style="width:75px;">Số HS</th>
  <th style="width:185px;">Tên TB</th>
  <th class="text-center" style="width:83px;">Số</th>
  <th class="text-center" style="width:58px;">C.Việc</th>
  <th class="text-center" style="width:88px;">Ngày thực hiện</th>
  <th class="text-center" style="width:88px;">Ngày hoàn thành</th>
  <th style="width:100px;">Nhân viên</th>
  <th class="text-center" style="width:90px;">Tình trạng KT</th>
  <th style="width:120px;">Hỏng hóc</th>
  <th style="width:140px;">Mô tả công việc</th>
  <th style="width:100px;">Ghi chú</th>
  <th class="text-center" style="width:65px;">TS.GIỜ</th>
  <th class="text-center" style="width:65px;">Bộ phận</th>
</tr>
</thead>
<tbody>
<?php
// Group theo maql
$sql_maql = mysql_query("SELECT DISTINCT maql FROM hososcbd_iso WHERE $where ORDER BY CAST(SUBSTRING_INDEX(maql, '-', -1) AS UNSIGNED) DESC");
$tong_so_maql = mysql_num_rows($sql_maql); // Đếm số maql duy nhất
// STT nhóm maql
$stt = 1;
// Để lặp lại từ đầu
mysql_data_seek($sql_maql, 0);
while($row_maql = mysql_fetch_array($sql_maql)) {
  $maql = $row_maql['maql'];
  // Dòng tiêu đề nhóm maql
  echo '<tr class="group-row"><td class="text-center">'.$stt.'</td>';
  echo '<td colspan="12">'.htmlspecialchars($maql).'</td></tr>';
  $stt++;
  // Lấy các hồ sơ thuộc maql này
  $sql_hoso = mysql_query("SELECT * FROM hososcbd_iso WHERE maql='".mysql_real_escape_string($maql)."' AND $where ORDER BY hoso ASC");
  $stt_maql = 1;
  while($row_hoso = mysql_fetch_array($sql_hoso)) {
    $hoso = $row_hoso['hoso'];
    $ngayth = $row_hoso['ngayth'];
    $ngaykt = $row_hoso['ngaykt'];
    // Định dạng ngày thực hiện và ngày hoàn thành
    $ngayth_fmt = ($ngayth && $ngayth != '0000-00-00') ? date('d/m/Y', strtotime($ngayth)) : '';
    $ngaykt_fmt = ($ngaykt && $ngaykt != '0000-00-00') ? date('d/m/Y', strtotime($ngaykt)) : '';
    $sql_nv = mysql_query("SELECT n.*, h.maql, h.mavt, h.somay, h.ttktafter, h.honghoc,khacphuc,ghichufinal, h.cv, h.madv FROM ngthuchien_iso n LEFT JOIN hososcbd_iso h ON n.mahoso = h.hoso WHERE n.mahoso='$hoso'");
    // Lấy tên vật tư từ bảng thietbi_iso
    $tenvt = '';
    if (!empty($row_hoso['mavt'])) {
      $mavt_tmp = mysql_real_escape_string($row_hoso['mavt']);
      $rs_tenvt = mysql_query("SELECT tenvt FROM thietbi_iso WHERE mavt='$mavt_tmp' LIMIT 1");
      if ($row_tenvt = mysql_fetch_assoc($rs_tenvt)) {
        $tenvt = $row_tenvt['tenvt'];
      }
    }
    $tong_gio = 0;
    $ds_nv = [];
    $thang_ketthuc_hoso = (int)date('m', strtotime($ngaykt));
    $nam_ketthuc_hoso = (int)date('Y', strtotime($ngaykt));
    if ($nam_ketthuc_hoso < $from_year || ($nam_ketthuc_hoso == $from_year && $thang_ketthuc_hoso < $thang_batdau)) {
      $tong_gio = 0;
    } else {
      while($row_nv = mysql_fetch_array($sql_nv)) {
        $hoten = $row_nv['hoten'];
        $maql = isset($row_nv['maql']) ? $row_nv['maql'] : '';
        $mavt = isset($row_nv['mavt']) ? $row_nv['mavt'] : '';
        $somay = isset($row_nv['somay']) ? $row_nv['somay'] : '';
        $cv = isset($row_nv['cv']) ? $row_nv['cv'] : '';
        $ttktafter = isset($row_nv['ttktafter']) ? $row_nv['ttktafter'] : '';
        $honghoc = isset($row_nv['honghoc']) ? $row_nv['honghoc'] : '';
        $khacphuc = isset($row_nv['khacphuc']) ? $row_nv['khacphuc'] : '';
        $ghichufinal = isset($row_nv['ghichufinal']) ? $row_nv['ghichufinal'] : '';
        $madv = isset($row_nv['madv']) ? $row_nv['madv'] : '';
        if ($nam_ketthuc_hoso < $to_year || ($nam_ketthuc_hoso == $to_year && $thang_ketthuc_hoso < $thang_ketthuc)) {
          $field_end = 'giolv'.$thang_ketthuc_hoso;
        } else {
          $field_end = 'giolv'.$thang_ketthuc;
        }
        if ($from_year == $to_year) {
          $field_start = 'giolv'.($thang_batdau-1);
        } else {
          $field_start = 'giolv1';
        }
        $gio_end = (isset($row_nv[$field_end]) && $row_nv[$field_end] !== null) ? intval($row_nv[$field_end]) : 0;
        $gio_start = (isset($row_nv[$field_start]) && $row_nv[$field_start] !== null) ? intval($row_nv[$field_start]) : 0;
        $gio_nv = $gio_end - $gio_start;
        if($gio_nv < 0) $gio_nv = 0;
        $tong_gio += $gio_nv;
        if($gio_nv > 0 && $hoten != '') {
          $ds_nv[] = $hoten;
        }
      }
      $ds_nv = array_unique($ds_nv);
      $ds_nv_short = array();
      foreach ($ds_nv as $hoten) {
        $hoten = trim($hoten);
        if ($hoten == '') continue;
        $parts = explode(' ', $hoten);
        if (count($parts) == 3 &&
            (($parts[0] === 'VŨ' && $parts[1] === 'ANH' && mb_strtoupper($parts[2], 'UTF-8') === 'ĐỨC') ||
             ($parts[0] === 'ĐOÀN' && $parts[1] === 'MINH' && mb_strtoupper($parts[2], 'UTF-8') === 'ĐỨC'))) {
          $dem = $parts[1];
          $ten = $parts[2];
          $short = mb_substr($dem, 0, 1, 'UTF-8') . '.' . mb_strtoupper($ten, 'UTF-8');
          $ds_nv_short[] = $short;
        } else {
          $ds_nv_short[] = $parts[count($parts)-1];
        }
      }
    }
    // Tính tổng
    if ($tong_gio > 0) {
      $tong_so_hoso++;
      $tong_ts_gio += $tong_gio;
    }
    // Chỉ hiển thị STT nhóm ở dòng nhóm, các dòng hồ sơ dùng stt_maql
    if ($staff_filter === 'only_no_staff') {
      if ($tong_gio == 0) {
        echo '<tr>';
        echo '<td></td>';
        echo '<td style="text-align:center"><div>'.$stt_maql.'</div></td>';
        echo '<td></td><td></td><td></td><td></td><td></td>';
  echo '<td>'.$ngayth_fmt.'</td>';
  echo '<td>'.$ngaykt_fmt.'</td>';
        echo '<td colspan="5">Không truy vấn được hồ sơ</td>';
        echo '</tr>';
        $stt_maql++;
      }
    } elseif ($staff_filter === 'hide_no_staff') {
      if ($tong_gio > 0) {
  echo '<tr>';
  echo '<td></td>';
  echo '<td class="text-center"><div>'.$stt_maql.'</div></td>';
  echo '<td class="text-center">'.$hoso.'</td>';
  echo '<td>'.htmlspecialchars($tenvt).'</td>';
  echo '<td class="text-center">'.$somay.'</td>';
  echo '<td class="text-center">'.$cv.'</td>';
  echo '<td class="text-center">'.$ngayth_fmt.'</td>';
  echo '<td class="text-center">'.$ngaykt_fmt.'</td>';
  echo '<td>'.htmlspecialchars(implode(", ", $ds_nv_short)).'</td>';
  echo '<td class="text-center">'.($ttktafter=='Hỏng' ? 'Hỏng-Không khắc phục được' : $ttktafter).'</td>';
  echo '<td>'.$honghoc.'</td>';
  echo '<td>'.$khacphuc.'</td>';
  echo '<td>'.$ghichufinal.'</td>';
 
  echo '<td class="text-center">'.$tong_gio.'</td>';
  echo '<td class="text-center">'.$madv.'</td>';
  echo '</tr>';
        $stt_maql++;
      }
    } else { // all
      if ($tong_gio > 0) {
        echo '<tr>';
        echo '<td></td>';
        echo '<td style="text-align:center"><div>'.$stt_maql.'</div></td>';
        echo '<td>'.$hoso.'</td>';
        echo '<td>'.htmlspecialchars($tenvt).'</td>';
        echo '<td>'.$somay.'</td>';
        echo '<td>'.$cv.'</td>';
  echo '<td>'.$ngayth_fmt.'</td>';
  echo '<td>'.$ngaykt_fmt.'</td>';
        echo '<td>'.htmlspecialchars(implode(", ", $ds_nv_short)).'</td>';
        echo '<td>'.($ttktafter=='Hỏng' ? 'Hỏng-Không khắc phục được' : $ttktafter).'</td>';
        echo '<td>'.$honghoc.'</td>';
        echo '<td>'.$khacphuc.'</td>';
        echo '<td>'.$ghichufinal.'</td>';
        echo '<td>'.$tong_gio.'</td>';
        echo '<td>'.$madv.'</td>';
        echo '</tr>';
        $stt_maql++;
      } else {
        echo '<tr>';
        echo '<td></td>';
        echo '<td style="text-align:center"><div>'.$stt_maql.'</div></td>';
        echo '<td></td><td></td><td></td><td></td><td></td>';
        echo '<td>'.$ngayth.'</td>';
        echo '<td>'.$ngaykt.'</td>';
        echo '<td colspan="5">Không truy vấn được hồ sơ</td>';
        echo '</tr>';
        $stt_maql++;
      }
    }
  }
}
?>

  </tbody>
    </table>
  </div>
</div>


<div class="row justify-content-center mt-3 mb-5">
  <div class="col-xl-11 col-lg-12 col-md-12">
    <div class="alert alert-info font-weight-bold w-100" role="alert">
      Tổng số đơn hàng: <?php echo $tong_so_maql; ?> &nbsp; | &nbsp;
      Tổng số máy: <?php echo $tong_so_hoso; ?> &nbsp; | &nbsp;
      Tổng TS.Giờ: <?php echo $tong_ts_gio; ?>
    </div>
  </div>
</div>
