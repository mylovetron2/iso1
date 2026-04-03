<?php
/**
 * Tiến Độ Công Việc Professional
 * Hệ thống theo dõi tiến độ sửa chữa bảo dưỡng thiết bị chuyên nghiệp
 * Version: 2.0
 */

// Bao gồm các file cần thiết
require_once("select_data.php");
require_once("myfunctions.php");

// Xử lý tham số đầu vào
$username = isset($_POST['user']) ? $_POST['user'] : (isset($_GET['user']) ? $_GET['user'] : '');
$start = isset($_GET['start']) ? (int)$_GET['start'] : 0;
$start1 = isset($_GET['start1']) ? (int)$_GET['start1'] : 0;
$ngayfrom = isset($_POST['ngayfrom']) ? $_POST['ngayfrom'] : '';
$ngayto = isset($_POST['ngayto']) ? $_POST['ngayto'] : '';
$s = isset($_POST['s']) ? $_POST['s'] : '';
$f = isset($_POST['f']) ? $_POST['f'] : '';
$nhomsct = isset($_POST['nhomsc']) ? $_POST['nhomsc'] : (isset($_GET['nhomsc']) ? $_GET['nhomsc'] : '');

// Tham số tìm kiếm
$search_query = isset($_POST['search_query']) ? trim($_POST['search_query']) : (isset($_GET['search_query']) ? trim($_GET['search_query']) : '');
$search_type = isset($_POST['search_type']) ? $_POST['search_type'] : (isset($_GET['search_type']) ? $_GET['search_type'] : 'all');

// Cấu hình phân trang
$row_per_page = 15;

// Class quản lý tiến độ công việc
class WorkProgressManager {
    private $link;
    private $row_per_page;
    
    public function __construct($db_connection, $items_per_page = 15) {
        $this->link = $db_connection;
        $this->row_per_page = $items_per_page;
    }
    
    public function getWorkProgressData($nhomsct, $start = 0, $search_query = '', $search_type = 'all') {
        // Xây dựng query dựa trên nhóm được chọn
        switch($nhomsct) {
            case "DONE":
                $condition = "bg='0' and ngaykt!='0000-00-00'";
                break;
            case "DO":
                $condition = "bg='0' and ngayth!='0000-00-00' and ngaykt='0000-00-00'";
                break;
            case "WDO":
                $condition = "bg='0' and ngayth='0000-00-00' and ngaykt='0000-00-00'";
                break;
            case "PEND":
                $condition = "bg='0' and ngayth!='0000-00-00' and ngaykt='0000-00-00' and ttktafter='Chờ vật tư thay thế'";
                break;
            default:
                $condition = "bg='0' and nhomsc like '%$nhomsct%'";
        }
        
        // Thêm điều kiện tìm kiếm
        if (!empty($search_query)) {
            $search_condition = $this->buildSearchCondition($search_query, $search_type);
            $condition .= " AND ($search_condition)";
        }
        
        $sql = "SELECT mavt,somay,model,cv,DATE_FORMAT(`ngayyc`,'%d-%m-%Y') as ngayyc,
                       DATE_FORMAT(`ngayth`,'%d-%m-%Y') as ngayth,hoso,nhomsc,
                       DATE_FORMAT(`ngaykt`,'%d-%m-%Y') as ngaykt,ttktafter,vitrimaybd,lo,gieng,
                       DATEDIFF(ngaykt,ngayth) as ngaysc 
                FROM hososcbd_iso 
                WHERE $condition 
                ORDER BY stt DESC 
                LIMIT $start, {$this->row_per_page}";
        
        return mysqli_query($this->link, $sql);
    }
    
    public function getTotalRecords($nhomsct, $search_query = '', $search_type = 'all') {
        $condition = $this->buildCondition($nhomsct);
        
        // Thêm điều kiện tìm kiếm
        if (!empty($search_query)) {
            $search_condition = $this->buildSearchCondition($search_query, $search_type);
            $condition .= " AND ($search_condition)";
        }
        
        $tin = mysqli_query($this->link, "SELECT stt FROM hososcbd_iso WHERE $condition");
        return mysqli_num_rows($tin);
    }
    
    private function buildCondition($nhomsct) {
        switch($nhomsct) {
            case "DONE": return "bg='0' and ngaykt!='0000-00-00'";
            case "DO": return "bg='0' and ngayth!='0000-00-00' and ngaykt='0000-00-00'";
            case "WDO": return "bg='0' and ngayth='0000-00-00' and ngaykt='0000-00-00'";
            case "PEND": return "bg='0' and ngayth!='0000-00-00' and ngaykt='0000-00-00' and ttktafter='Chờ vật tư thay thế'";
            default: return "bg='0' and nhomsc like '%$nhomsct%'";
        }
    }
    
    public function getMaintenanceSchedule($start = 0) {
        $m = date('m');
        $nm = $m + 1;
        $y = date('Y');
        
        $sql = "SELECT stt,tenthietbi,tenvt,chusohuu,serialnumber,
                       DATE_FORMAT(`ngaykd`,'%d-%m-%Y') as ngaykd,
                       MAX(ngaykdtt) as ngaykdtt 
                FROM thietbihotro_iso 
                WHERE cdung='1' AND ngaykdtt BETWEEN '$y-$m-01 00:00:00' AND '$y-$nm-31 00:00:00' 
                GROUP BY tenthietbi,serialnumber  
                ORDER BY stt DESC 
                LIMIT $start, {$this->row_per_page}";
        
        return mysqli_query($this->link, $sql);
    }
    
    public function calculateWorkingDays($ngayth, $ngaykt = null) {
        if (!$ngaykt) $ngaykt = date("d-m-Y");
        
        $ngfrom = date("d", strtotime($ngayth));
        $thfrom = date("m", strtotime($ngayth));
        $namfrom = date("Y", strtotime($ngayth));
        $ngto = date("d", strtotime($ngaykt));
        $thto = date("m", strtotime($ngaykt));
        $namto = date("Y", strtotime($ngaykt));
        
        $date1 = date_create($ngayth);
        $date2 = date_create($ngaykt);
        $ngaysc = date_diff($date1, $date2)->format("%R%a");
        
        $ngsunandsat = getsunandsat($ngfrom, $thfrom, $namfrom, $ngto, $thto, $namto);
        $ngayle = getholiday($ngfrom, $thfrom, $namfrom, $ngto, $thto, $namto);
        
        return $ngaysc - $ngsunandsat - $ngayle + 1;
    }
    
    public function getStatusColor($ngayth, $ngaykt, $ttktafter, $ttktafterttktdb, $ngaylv) {
        // Giai đoạn 1: Phân loại theo trạng thái thực hiện
        $color = '#FFFFFF'; // Mặc định: Trắng - Chưa bắt đầu
        
        if ($ngayth == "00-00-0000" && $ngaykt == "00-00-0000") {
            $color = '#FFFFFF'; // Trắng - Máy chưa bắt đầu
        } elseif ($ngayth != "00-00-0000" && $ngaykt == "00-00-0000") {
            $color = '#CEE3F6'; // Xanh nhạt - Máy đang thực hiện
        } elseif ($ngayth != "00-00-0000" && $ngaykt != "00-00-0000") {
            $color = '#00BFFF'; // Xanh dương - Máy đã hoàn thành
        }
        
        // Giai đoạn 2: Phân loại theo thời gian làm việc (ưu tiên cao hơn)
        if ($ngaylv !== '' && $ngaylv !== null) {
            if ($ngaylv <= 15) {
                $color = "#9AFFFF"; // Xanh mint - Tốt (≤15 ngày)
            } elseif ($ngaylv > 15 && $ngaylv <= 30) {
                $color = "#FFFF9A"; // Vàng - Cảnh báo (16-30 ngày)
            } else {
                $color = "#ff9a9a"; // Đỏ nhạt - Nguy hiểm (>30 ngày)
            }
        }
        
        // Giai đoạn 3: Trường hợp đặc biệt (ưu tiên tối cao)
        if ($ttktafter == "TTKTDB" || $ttktafterttktdb == "TTKTDB") {
            $color = '#9b26b4'; // Tím - Trạng thái đặc biệt
        }
        
        return $color;
    }
    
    public function getMaintenanceColor($ngaylv) {
        // Logic màu sắc cho bảng bảo dưỡng (ngược với bảng sửa chữa)
        if ($ngaylv <= 15) {
            return "#ff9a9a"; // Đỏ nhạt - Khẩn cấp (≤15 ngày còn lại)
        } elseif ($ngaylv > 15 && $ngaylv <= 30) {
            return "#FFFF9A"; // Vàng - Cảnh báo (16-30 ngày còn lại)
        } else {
            return "#00BFFF"; // Xanh dương - An toàn (>30 ngày còn lại)
        }
    }
    
    private function buildSearchCondition($search_query, $search_type) {
        $escaped_query = mysqli_real_escape_string($this->link, $search_query);
        
        switch($search_type) {
            case 'mavt':
                return "mavt LIKE '%$escaped_query%'";
            case 'somay':
                return "somay LIKE '%$escaped_query%'";
            case 'hoso':
                return "hoso LIKE '%$escaped_query%'";
            case 'model':
                return "model LIKE '%$escaped_query%'";
            case 'nhomsc':
                return "nhomsc LIKE '%$escaped_query%'";
            case 'vitri':
                return "vitrimaybd LIKE '%$escaped_query%'";
            case 'all':
            default:
                return "(mavt LIKE '%$escaped_query%' OR somay LIKE '%$escaped_query%' OR 
                        hoso LIKE '%$escaped_query%' OR model LIKE '%$escaped_query%' OR 
                        nhomsc LIKE '%$escaped_query%' OR vitrimaybd LIKE '%$escaped_query%')";
        }
    }
}

// Khởi tạo manager
$workManager = new WorkProgressManager($link, $row_per_page);

// Lấy tổng số bản ghi và tính số trang
$totalRecords = $workManager->getTotalRecords($nhomsct, $search_query, $search_type);
$totalPages = $totalRecords > $row_per_page ? ceil($totalRecords / $row_per_page) : 1;

// Lấy dữ liệu bảo dưỡng định kỳ
$m = date('m');
$nm = $m + 1;
$y = date('Y');
$maintenanceRecords = mysqli_query($link, "SELECT stt FROM thietbihotro_iso WHERE cdung='1' AND ngaykdtt BETWEEN '$y-$m-01 00:00:00' AND '$y-$nm-31 00:00:00'");
$maintenanceTotal = mysqli_num_rows($maintenanceRecords);
$maintenancePages = $maintenanceTotal > $row_per_page ? ceil($maintenanceTotal / $row_per_page) : 1;

// Định nghĩa tên hiển thị cho các nhóm
$groupNames = [
    "" => "ALL",
    "RDNGA" => "RDNGA", 
    "CNC" => "CNC",
    "DONE" => "Máy đã làm xong",
    "DO" => "Máy đang làm",
    "WDO" => "Máy chưa làm",
    "PEND" => "Máy chờ vật tư"
];
$currentGroupName = isset($groupNames[$nhomsct]) ? $groupNames[$nhomsct] : "ALL";
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tiến Độ Công Việc - Professional Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            color: #333;
        }
        
        .container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 20px;
        }
        
        .header {
            background: white;
            border-radius: 15px;
            padding: 25px;
            margin-bottom: 25px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            text-align: center;
        }
        
        .header h1 {
            color: #2c3e50;
            font-size: 2.2em;
            font-weight: 700;
            margin-bottom: 10px;
        }
        
        .header .subtitle {
            color: #7f8c8d;
            font-size: 1.1em;
        }
        
        .version-navigator {
            background: white;
            border-radius: 12px;
            padding: 15px 25px;
            margin-bottom: 20px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.08);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 20px;
            flex-wrap: wrap;
        }
        
        .nav-label {
            color: #2c3e50;
            font-weight: 600;
            font-size: 1em;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        
        .nav-buttons {
            display: flex;
            gap: 15px;
            flex-wrap: wrap;
        }
        
        .nav-btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 10px 20px;
            border-radius: 25px;
            text-decoration: none;
            font-weight: 600;
            font-size: 0.95em;
            transition: all 0.3s ease;
            border: 2px solid transparent;
        }
        
        .nav-btn.current {
            background: linear-gradient(45deg, #3498db, #2980b9);
            color: white;
            box-shadow: 0 4px 15px rgba(52, 152, 219, 0.3);
        }
        
        .nav-btn.alternative {
            background: #f8f9fa;
            color: #495057;
            border: 2px solid #dee2e6;
        }
        
        .nav-btn.alternative:hover {
            background: linear-gradient(45deg, #28a745, #20a83a);
            color: white;
            border-color: #28a745;
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(40, 167, 69, 0.3);
        }
        
        .nav-btn i {
            font-size: 1.1em;
        }
        
        .version-badge {
            background: linear-gradient(45deg, #e74c3c, #c0392b);
            color: white;
            padding: 4px 8px;
            border-radius: 12px;
            font-size: 0.75em;
            font-weight: bold;
            margin-left: 5px;
        }
        
        .controls {
            background: white;
            border-radius: 15px;
            padding: 20px;
            margin-bottom: 25px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            display: flex;
            align-items: center;
            gap: 20px;
            flex-wrap: wrap;
        }
        
        .export-btn {
            background: linear-gradient(45deg, #FF6B6B, #FF8E53);
            color: white;
            border: none;
            padding: 12px 25px;
            border-radius: 25px;
            cursor: pointer;
            font-weight: 600;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: all 0.3s ease;
        }
        
        .export-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(255,107,107,0.4);
        }
        
        .card {
            background: white;
            border-radius: 15px;
            margin-bottom: 30px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            overflow: hidden;
        }
        
        .card-header {
            background: linear-gradient(135deg, #3498db, #2980b9);
            color: white;
            padding: 20px 25px;
            font-size: 1.3em;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .table-container {
            overflow-x: auto;
        }
        
        .modern-table {
            width: 100%;
            border-collapse: collapse;
            font-size: 0.9em;
        }
        
        .modern-table th {
            background: #f8f9fa;
            color: #2c3e50;
            padding: 15px 10px;
            text-align: center;
            font-weight: 600;
            border-bottom: 2px solid #e9ecef;
            position: relative;
        }
        
        .modern-table th select {
            border: none;
            background: transparent;
            color: #2c3e50;
            font-weight: 600;
            width: 100%;
            padding: 5px;
            cursor: pointer;
        }
        
        .modern-table td {
            padding: 12px 10px;
            text-align: center;
            border-bottom: 1px solid #e9ecef;
            vertical-align: middle;
        }
        
        .stt-cell {
            font-weight: bold;
            text-align: center;
            border: 2px solid #fff;
            border-radius: 8px;
            color: #333;
            text-shadow: 1px 1px 2px rgba(255,255,255,0.8);
        }
        
        .modern-table tbody tr {
            transition: all 0.3s ease;
        }
        
        .modern-table tbody tr:hover {
            background: #f8f9fa;
            transform: translateY(-1px);
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }
        
        .status-badge {
            padding: 6px 12px;
            border-radius: 20px;
            color: white;
            font-weight: 500;
            font-size: 0.85em;
        }
        
        .status-completed { background: #27ae60; }
        .status-working { background: #3498db; }
        .status-pending { background: #f39c12; }
        .status-waiting { background: #e74c3c; }
        .status-special { background: #9b26b4; }
        
        .equipment-link {
            color: #3498db;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s ease;
        }
        
        .equipment-link:hover {
            color: #2980b9;
            text-decoration: underline;
        }
        
        .pagination {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 10px;
            padding: 20px;
            background: #f8f9fa;
            border-radius: 0 0 15px 15px;
        }
        
        .pagination a, .pagination span {
            padding: 8px 15px;
            text-decoration: none;
            color: #3498db;
            border: 1px solid #e9ecef;
            border-radius: 8px;
            transition: all 0.3s ease;
        }
        
        .pagination a:hover {
            background: #3498db;
            color: white;
        }
        
        .pagination .current {
            background: #3498db;
            color: white;
        }
        
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }
        
        .stat-card {
            background: white;
            border-radius: 12px;
            padding: 20px;
            text-align: center;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            transition: transform 0.3s ease;
        }
        
        .stat-card:hover {
            transform: translateY(-5px);
        }
        
        .stat-number {
            font-size: 2.5em;
            font-weight: bold;
            margin-bottom: 5px;
        }
        
        .stat-label {
            color: #7f8c8d;
            font-size: 0.9em;
        }
        
        .priority-high { border-left: 4px solid #e74c3c; }
        .priority-medium { border-left: 4px solid #f39c12; }
        .priority-low { border-left: 4px solid #27ae60; }
        
        .form-control {
            padding: 8px 12px;
            border: 1px solid #ddd;
            border-radius: 6px;
            font-size: 0.9em;
        }
        
        .search-container {
            background: white;
            border-radius: 15px;
            padding: 20px;
            margin-bottom: 25px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        
        .search-form {
            display: grid;
            grid-template-columns: auto 1fr auto auto;
            gap: 15px;
            align-items: center;
        }
        
        .search-input {
            padding: 12px 15px;
            border: 2px solid #e9ecef;
            border-radius: 25px;
            font-size: 1em;
            transition: all 0.3s ease;
            min-width: 300px;
        }
        
        .search-input:focus {
            outline: none;
            border-color: #3498db;
            box-shadow: 0 0 0 3px rgba(52, 152, 219, 0.1);
        }
        
        .search-select {
            padding: 12px 15px;
            border: 2px solid #e9ecef;
            border-radius: 25px;
            background: white;
            font-size: 1em;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .search-select:focus {
            outline: none;
            border-color: #3498db;
        }
        
        .search-btn {
            background: linear-gradient(45deg, #3498db, #2980b9);
            color: white;
            border: none;
            padding: 12px 25px;
            border-radius: 25px;
            cursor: pointer;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: all 0.3s ease;
        }
        
        .search-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(52, 152, 219, 0.4);
        }
        
        .clear-btn {
            background: linear-gradient(45deg, #95a5a6, #7f8c8d);
            color: white;
            border: none;
            padding: 12px 20px;
            border-radius: 25px;
            cursor: pointer;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: all 0.3s ease;
            text-decoration: none;
        }
        
        .clear-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(149, 165, 166, 0.4);
        }
        
        .search-results-info {
            background: #e8f4fd;
            border: 1px solid #bee5eb;
            border-radius: 10px;
            padding: 12px 20px;
            margin-bottom: 20px;
            color: #0c5460;
            font-weight: 500;
        }
        
        .color-legend {
            background: #f8f9fa;
            border: 1px solid #dee2e6;
            border-radius: 10px;
            padding: 15px 20px;
            margin-bottom: 20px;
            font-size: 0.9em;
        }
        
        .color-legend h4 {
            margin: 0 0 10px 0;
            color: #495057;
            font-size: 1em;
        }
        
        .legend-items {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
            align-items: center;
        }
        
        .legend-item {
            display: flex;
            align-items: center;
            gap: 8px;
        }
        
        .legend-color {
            width: 20px;
            height: 20px;
            border-radius: 4px;
            border: 1px solid #ccc;
        }
        
        .legend-text {
            color: #495057;
            font-weight: 500;
        }
        
        .responsive-hide {
            display: table-cell;
        }
        
        @media (max-width: 768px) {
            .responsive-hide {
                display: none;
            }
            
            .version-navigator {
                flex-direction: column;
                text-align: center;
                gap: 15px;
            }
            
            .nav-buttons {
                justify-content: center;
            }
            
            .nav-btn {
                padding: 8px 16px;
                font-size: 0.9em;
            }
            
            .controls {
                flex-direction: column;
                align-items: stretch;
            }
            
            .search-form {
                grid-template-columns: 1fr;
                gap: 10px;
                text-align: center;
            }
            
            .search-input {
                min-width: auto;
                width: 100%;
            }
            
            .header h1 {
                font-size: 1.8em;
            }
            
            .modern-table {
                font-size: 0.8em;
            }
            
            .modern-table th,
            .modern-table td {
                padding: 8px 5px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Header -->
        <div class="header">
            <h1><i class="fas fa-chart-line"></i> Tiến Độ Công Việc</h1>
            <div class="subtitle">Hệ thống theo dõi sửa chữa bảo dưỡng thiết bị</div>
        </div>

        <!-- Version Navigator -->
        <div class="version-navigator">
            <div class="nav-label">
                <i class="fas fa-layer-group"></i>
                Phiên bản:
            </div>
            <div class="nav-buttons">
                <a href="#" class="nav-btn current">
                    <i class="fas fa-rocket"></i>
                    Phiên bản mới
                    <span class="version-badge">v2.0</span>
                </a>
                <a href="tiendocongviec.php<?php 
                    $params = [];
                    if ($username) $params[] = 'user=' . urlencode($username);
                    if ($nhomsct) $params[] = 'nhomsc=' . urlencode($nhomsct);
                    if ($start) $params[] = 'start=' . $start;
                    echo !empty($params) ? '?' . implode('&', $params) : '';
                ?>" class="nav-btn alternative">
                    <i class="fas fa-history"></i>
                    Phiên bản cũ
                    <span class="version-badge" style="background: #6c757d;">v1.0</span>
                </a>
                
            </div>
        </div>

        <?php
         // Thống kê nhanh
         $stats = [
             'total' => mysqli_num_rows(mysqli_query($link, "SELECT stt FROM hososcbd_iso WHERE bg='0'")),
             'completed' => mysqli_num_rows(mysqli_query($link, "SELECT stt FROM hososcbd_iso WHERE bg='0' AND ngaykt!='0000-00-00'")),
             'working' => mysqli_num_rows(mysqli_query($link, "SELECT stt FROM hososcbd_iso WHERE bg='0' AND ngayth!='0000-00-00' AND ngaykt='0000-00-00'")),
             'pending' => mysqli_num_rows(mysqli_query($link, "SELECT stt FROM hososcbd_iso WHERE bg='0' AND ngayth='0000-00-00' AND ngaykt='0000-00-00'"))
         ];
         ?>

         <!-- Statistics Cards -->
        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-number" style="color: #3498db;"><?php echo $stats['total']; ?></div>
                <div class="stat-label">Tổng số thiết bị</div>
            </div>
            <div class="stat-card">
                <div class="stat-number" style="color: #27ae60;"><?php echo $stats['completed']; ?></div>
                <div class="stat-label">Đã hoàn thành</div>
            </div>
            <div class="stat-card">
                <div class="stat-number" style="color: #f39c12;"><?php echo $stats['working']; ?></div>
                <div class="stat-label">Đang thực hiện</div>
            </div>
            <div class="stat-card">
                <div class="stat-number" style="color: #e74c3c;"><?php echo $stats['pending']; ?></div>
                <div class="stat-label">Chờ thực hiện</div>
            </div>
        </div>
        
        <!-- Controls -->
        <div class="controls">
            <a href="tiendocongviec_excell.php?nhomsc=<?php echo $nhomsct; ?>&search_query=<?php echo urlencode($search_query); ?>&search_type=<?php echo $search_type; ?>" class="export-btn">
                <i class="fas fa-file-excel"></i>
                Xuất Excel
            </a>
            
            <form method="post" action="tiendocongviec_professional.php" style="margin: 0; display: flex; gap: 15px; align-items: center; flex: 1;">
                <input type="hidden" name="user" value="<?php echo $username; ?>">
                <input type="hidden" name="search_query" value="<?php echo htmlspecialchars($search_query); ?>">
                <input type="hidden" name="search_type" value="<?php echo $search_type; ?>">
                
                <div style="display: flex; align-items: center; gap: 8px;">
                    <i class="fas fa-filter"></i>
                    <label for="nhomsc" style="font-weight: 600;">Bộ lọc:</label>
                    <select name="nhomsc" id="nhomsc" onchange="this.form.submit()" class="form-control">
                        <option value="<?php echo $nhomsct; ?>"><?php echo $currentGroupName; ?></option>
                        <option value="">Tất cả</option>
                        <option value="RDNGA">Nhóm RDNGA</option>
                        <option value="CNC">Nhóm CNC</option>
                        <option value="DONE">Máy đã hoàn thành</option>
                        <option value="DO">Máy đang thực hiện</option>
                        <option value="WDO">Máy chưa thực hiện</option>
                        <option value="PEND">Máy chờ vật tư</option>
                    </select>
                </div>
            </form>
        </div>

        <?php
        // Hiển thị thông tin tìm kiếm
        if (!empty($search_query)) {
            echo "<div class='search-results-info'>";
            echo "<i class='fas fa-info-circle'></i> ";
            echo "Tìm kiếm <strong>\"" . htmlspecialchars($search_query) . "\"</strong> ";
            
            $search_type_names = [
                'all' => 'trong tất cả',
                'mavt' => 'trong mã thiết bị',
                'somay' => 'trong số máy',
                'hoso' => 'trong số hồ sơ',
                'model' => 'trong model',
                'nhomsc' => 'trong nhóm SC',
                'vitri' => 'trong vị trí'
            ];
            
            echo $search_type_names[$search_type] . ". ";
            echo "Tìm thấy <strong>$totalRecords</strong> kết quả.";
            echo "</div>";
        }
        
        // Color Legend cho bảng chính
        
        // echo "<div class='color-legend'>";
        // echo "<h4><i class='fas fa-palette'></i> Ý nghĩa màu sắc - Bảng Sửa Chữa:</h4>";
        // echo "<div class='legend-items'>";
        // echo "<div class='legend-item'><div class='legend-color' style='background: #FFFFFF; border: 2px solid #ddd;'></div><span class='legend-text'>Chưa bắt đầu</span></div>";
        // echo "<div class='legend-item'><div class='legend-color' style='background: #CEE3F6;'></div><span class='legend-text'>Đang thực hiện</span></div>";
        // echo "<div class='legend-item'><div class='legend-color' style='background: #00BFFF;'></div><span class='legend-text'>Đã hoàn thành</span></div>";
        // echo "<div class='legend-item'><div class='legend-color' style='background: #9AFFFF;'></div><span class='legend-text'>≤15 ngày (Tốt)</span></div>";
        // echo "<div class='legend-item'><div class='legend-color' style='background: #FFFF9A;'></div><span class='legend-text'>16-30 ngày (Cảnh báo)</span></div>";
        // echo "<div class='legend-item'><div class='legend-color' style='background: #ff9a9a;'></div><span class='legend-text'>>30 ngày (Nguy hiểm)</span></div>";
        // echo "<div class='legend-item'><div class='legend-color' style='background: #9b26b4;'></div><span class='legend-text'>Đặc biệt (TTKTDB)</span></div>";
        // echo "</div>";
        // echo "</div>";
        
        
        
        ?>

        

       


        
        <!-- Search Container -->
        <div class="search-container">
            <form method="post" action="tiendocongviec_professional.php" class="search-form">
                <input type="hidden" name="user" value="<?php echo $username; ?>">
                <input type="hidden" name="nhomsc" value="<?php echo $nhomsct; ?>">
                
                <div style="display: flex; align-items: center; gap: 8px;">
                    <i class="fas fa-search" style="color: #3498db;"></i>
                    <label style="font-weight: 600; color: #2c3e50;">Tìm kiếm:</label>
                </div>
                
                <input type="text" 
                       name="search_query" 
                       value="<?php echo htmlspecialchars($search_query); ?>" 
                       placeholder="Nhập mã thiết bị, số máy, số hồ sơ..." 
                       class="search-input">
                
                <select name="search_type" class="search-select">
                    <option value="all" <?php echo ($search_type == 'all') ? 'selected' : ''; ?>>Tất cả</option>
                    <option value="mavt" <?php echo ($search_type == 'mavt') ? 'selected' : ''; ?>>Mã thiết bị</option>
                    <option value="somay" <?php echo ($search_type == 'somay') ? 'selected' : ''; ?>>Số máy</option>
                    <option value="hoso" <?php echo ($search_type == 'hoso') ? 'selected' : ''; ?>>Số hồ sơ</option>
                    <option value="model" <?php echo ($search_type == 'model') ? 'selected' : ''; ?>>Model</option>
                    <option value="nhomsc" <?php echo ($search_type == 'nhomsc') ? 'selected' : ''; ?>>Nhóm SC</option>
                    <option value="vitri" <?php echo ($search_type == 'vitri') ? 'selected' : ''; ?>>Vị trí</option>
                </select>
                
                <button type="submit" class="search-btn">
                    <i class="fas fa-search"></i>
                    Tìm kiếm
                </button>
                
                <?php if (!empty($search_query)): ?>
                <a href="tiendocongviec_professional.php?user=<?php echo $username; ?>&nhomsc=<?php echo $nhomsct; ?>" class="clear-btn">
                    <i class="fas fa-times"></i>
                    Xóa
                </a>
                <?php endif; ?>
            </form>
        </div>
        
        <!-- Main Work Progress Table -->
        <div class="card">
            <div class="card-header">
                <i class="fas fa-tasks"></i>
                Tiến Độ Công Việc Sửa Chữa Bảo Dưỡng
                <span style="margin-left: auto; font-size: 0.9em; opacity: 0.9;">
                    (<?php echo $totalRecords; ?> thiết bị)
                </span>
            </div>
            
            <div class="table-container">
                <table class="modern-table">
                    <thead>
                        <tr>
                            <th style="width: 50px;">STT</th>
                            <th style="width: 200px;">Thiết Bị</th>
                            <th style="width: 100px;">Số Máy</th>
                            <th style="width: 100px;">Số Hồ Sơ</th>
                            <th style="width: 100px;" class="responsive-hide">Ngày YC</th>
                            <th style="width: 100px;" class="responsive-hide">Ngày TH</th>
                            <th style="width: 100px;" class="responsive-hide">Ngày KT</th>
                            <th style="width: 120px;">Nhóm SC</th>
                            <th style="width: 200px;">Trạng Thái</th>
                            <th style="width: 80px;" class="responsive-hide">Số Ngày</th>
                            <th style="width: 120px;" class="responsive-hide">Vị Trí</th>
                            <th style="width: 120px;" class="responsive-hide">Lô/Giếng</th>
                            <th style="width: 120px;">Tạm dừng</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $stt = $start + 1;
                        $sql_result = $workManager->getWorkProgressData($nhomsct, $start, $search_query, $search_type);
                        
                        while ($row = mysqli_fetch_array($sql_result)) {
                            $mavt = $row['mavt'];
                            $somay = $row['somay'];
                            $model = $row['model'];
                            $ngayyc = $row['ngayyc'];
                            $hoso = $row['hoso'];
                            $ngayth = $row['ngayth'];
                            $ngaysc = $row['ngaysc'];
                            $nhomsc = $row['nhomsc'];
                            $ngaykt = $row['ngaykt'];
                            $ttktafter = $row['ttktafter'];
                            $vitri = $row['vitrimaybd'];
                            $lo = $row['lo'];
                            $gieng = $row['gieng'];
                            $cv = $row['cv'];
                            
                            // Lấy tên thiết bị
                            $mamay = empty($model) ? $mavt : "$mavt-$model";
                            $result1 = mysqli_query($link, "SELECT tenvt FROM thietbi_iso WHERE mavt='$mavt' AND somay='$somay' AND model='$model'");
                            $tenvt = "";
                            if ($result1 && $equipment_row = mysqli_fetch_array($result1)) {
                                $tenvt = $equipment_row['tenvt'];
                            }
                            
                            // Xác định trạng thái và màu sắc
                            $status_class = "";
                            $status_text = "";
                            
                            if ($ngayth == "00-00-0000" && $ngaykt == "00-00-0000") {
                                $status_class = "status-waiting";
                                $status_text = "Chờ " . ($cv == "KT" ? "kiểm tra" : ($cv == "BD" ? "bảo dưỡng" : "sửa chữa"));
                                $ngayth = "";
                                $ngaykt = "";
                                $ngaylv = "";
                            } elseif ($ngayth != "00-00-0000" && $ngaykt == "00-00-0000") {
                                $status_class = "status-working";
                                if ($ttktafter == "Chờ vật tư thay thế") {
                                    $status_text = "Chờ phụ tùng";
                                    $status_class = "status-pending";
                                } else {
                                    $status_text = "Đang " . ($cv == "KT" ? "kiểm tra" : ($cv == "BD" ? "bảo dưỡng" : "sửa chữa"));
                                }
                                $ngaylv = $workManager->calculateWorkingDays($ngayth);
                                $ngaykt = "";
                            } elseif ($ngayth != "00-00-0000" && $ngaykt != "00-00-0000") {
                                $status_class = "status-completed";
                                if ($ttktafter == "Hỏng") {
                                    $status_text = "Hỏng không sửa được";
                                    $status_class = "status-waiting";
                                } elseif ($ttktafter == "Chờ vật tư thay thế") {
                                    $status_text = "Chờ phụ tùng";
                                    $status_class = "status-pending";
                                } else {
                                    $status_text = "Hoàn thành - chờ bàn giao";
                                }
                                $ngaylv = $workManager->calculateWorkingDays($ngayth, $ngaykt);
                            }
                            
                            // Lấy ttktafterttktdb để check trạng thái đặc biệt
                            $ttktafterttktdb = "";
                            $result2 = mysqli_query($link, "SELECT ttktafter FROM hososcbd_iso WHERE mavt='$mavt' AND somay='$somay' AND model='$model'");
                            if ($result2) {
                                while ($row2 = mysqli_fetch_array($result2)) {
                                    if ($row2['ttktafter'] != "") {
                                        $ttktafterttktdb = $row2['ttktafter'];
                                    }
                                }
                            }
                            
                            if ($ttktafter == "TTKTDB" || $ttktafterttktdb == "TTKTDB") {
                                $status_class = "status-special";
                                $status_text = "Đặc biệt";
                            }
                            
                            // Lấy màu sắc từ logic chính xác
                            $row_color = $workManager->getStatusColor($ngayth, $ngaykt, $ttktafter, $ttktafterttktdb, $ngaylv);
                        ?>
                        <tr>
                            <td class="stt-cell" style="background-color: <?php echo $row_color; ?>;"><?php echo $stt; ?></td>
                            <td>
                                <a href="download.php?mavttlkt=<?php echo $mavt; ?>" class="equipment-link" title="Tải TLKT">
                                    <strong><?php echo $mamay; ?></strong><br>
                                    <small style="color: #7f8c8d;"><?php echo $tenvt; ?></small>
                                </a>
                            </td>
                            <td><strong><?php echo $somay; ?></strong></td>
                            <td>
                                <a href="formsc.php?edithoso=<?php echo $hoso; ?>&username=<?php echo $username; ?>" class="equipment-link">
                                    <?php echo $hoso; ?>
                                </a>
                            </td>

                            <td class="responsive-hide"><?php echo $ngayyc; ?></td>
                            <td class="responsive-hide"><?php echo $ngayth; ?></td>
                            <td class="responsive-hide"><?php echo $ngaykt; ?></td>
                            <td>
                                <a href="thongkegiolv.php?f=mahoso&s=<?php echo $hoso; ?>&from=all&to=all" class="equipment-link">
                                    <?php echo $nhomsc; ?>
                                </a>
                            </td>
                            <td>
                                <span class="status-badge <?php echo $status_class; ?>">
                                    <?php echo $status_text; ?>
                                </span>
                            </td>
                            <td class="responsive-hide">
                                <strong><?php echo isset($ngaylv) ? $ngaylv : ''; ?></strong>
                            </td>
                            <td class="responsive-hide"><?php echo $vitri; ?></td>
                            <td class="responsive-hide"><?php echo "$lo / $gieng"; ?></td>
                            <td>
                                <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#pauseModal" data-hoso="<?php echo $hoso; ?>">
                                    ⏸️
                                </button>
                                <?php
                                $pause_result = mysqli_query($link, "SELECT id, pause_start, pause_end, pause_reason FROM hososcbd_iso_pauses WHERE hoso='" . mysqli_real_escape_string($link, $hoso) . "' ORDER BY pause_start");
                                if ($pause_result && mysqli_num_rows($pause_result) > 0) {
                                    echo '<div class="mt-1">';
                                    echo '<button class="btn btn-link btn-sm p-0" type="button" data-bs-toggle="collapse" data-bs-target="#pauseList_' . $hoso . '" aria-expanded="false" aria-controls="pauseList_' . $hoso . '">';
                                    echo '<span class="badge bg-secondary">' . mysqli_num_rows($pause_result) . ' lần</span>';
                                    echo '</button>';
                                    echo '<div class="collapse" id="pauseList_' . $hoso . '"><ul class="list-group list-group-flush">';
                                    while ($pause = mysqli_fetch_assoc($pause_result)) {
                                        echo '<li class="list-group-item py-1 px-2 d-flex align-items-center justify-content-between">';
                                        echo '<span><b>' . htmlspecialchars($pause['pause_start']) . '</b> - <b>' . htmlspecialchars($pause['pause_end']) . '</b>';
                                        if (!empty($pause['pause_reason'])) {
                                            echo ' <span style="color:#888;">(' . htmlspecialchars($pause['pause_reason']) . ')</span>';
                                        }
                                        echo '</span>';
                                        echo '<span>';
                                        echo '<button type="button" class="btn btn-outline-primary btn-sm btn-icon btn-edit-pause" data-id="' . $pause['id'] . '" data-start="' . htmlspecialchars($pause['pause_start']) . '" data-end="' . htmlspecialchars($pause['pause_end']) . '" data-reason="' . htmlspecialchars($pause['pause_reason']) . '" title="Sửa"><i class="fas fa-edit"></i></button> ';
                                        echo '<button type="button" class="btn btn-outline-danger btn-sm btn-icon btn-delete-pause" data-id="' . $pause['id'] . '" title="Xóa"><i class="fas fa-trash"></i></button>';
                                        echo '</span>';
                                        echo '</li>';

                                    }
                                    echo '</ul></div></div>';
                                }
                                ?>
                            </td>
                        </tr>
                        <?php
                            $stt++;
                        }
                        ?>
                    </tbody>
                </table>
                        </div>

                        <!-- Modal nhập thông tin tạm dừng -->
                                    <div class="modal fade" id="pauseModal" tabindex="-1" aria-labelledby="pauseModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <form id="pauseForm" method="post" action="add_pause.php">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="pauseModalLabel">Thêm lần tạm dừng</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <input type="hidden" name="hoso" id="hosoInput">
                                                        <div class="mb-3">
                                                            <label class="form-label">Ngày bắt đầu</label>
                                                            <input type="date" name="pause_start" class="form-control" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label">Ngày kết thúc</label>
                                                            <input type="date" name="pause_end" class="form-control" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label">Lý do</label>
                                                            <textarea name="pause_reason" class="form-control"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-primary">Lưu</button>
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                                                    </div>
                                                </div>
                                            </form>
                                                <!-- Toast thông báo -->
                                                <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 9999">
                                                    <div id="pauseToast" class="toast align-items-center text-bg-success border-0" role="alert" aria-live="assertive" aria-atomic="true">
                                                        <div class="d-flex">
                                                            <div class="toast-body" id="pauseToastBody">
                                                                Thêm lần tạm dừng thành công!
                                                            </div>
                                                            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                    </div>

                        <script>
                        // Truyền số hồ sơ vào modal khi bấm nút tạm dừng (Bootstrap 5)
                        document.addEventListener('DOMContentLoaded', function() {
                            var pauseModal = document.getElementById('pauseModal');
                            var pauseForm = document.getElementById('pauseForm');
                            var pauseToast = document.getElementById('pauseToast');
                            var pauseToastBody = document.getElementById('pauseToastBody');
                            var toastInstance = null;
                            if (pauseToast) {
                                toastInstance = new bootstrap.Toast(pauseToast, { delay: 3000 });
                            }
                            if (pauseModal) {
                                pauseModal.addEventListener('show.bs.modal', function (event) {
                                    var button = event.relatedTarget;
                                    var hoso = button.getAttribute('data-hoso');
                                    var hosoInput = document.getElementById('hosoInput');
                                    if (hosoInput) hosoInput.value = hoso;
                                });
                            }
                            // Xử lý submit form thêm tạm dừng bằng AJAX
                            if (pauseForm) {
                                pauseForm.addEventListener('submit', function(e) {
                                    e.preventDefault();
                                    var formData = new FormData(pauseForm);
                                    fetch('add_pause.php', {
                                        method: 'POST',
                                        body: formData
                                    })
                                    .then(response => response.json())
                                    .then(data => {
                                        console.log('Kết quả trả về từ add_pause.php:', data);
                                        if (data.success) {
                                            // Đóng modal (dùng getOrCreateInstance để chắc chắn)
                                            var modal = bootstrap.Modal.getOrCreateInstance(pauseModal);
                                            if (modal) modal.hide();
                                            // Hiện toast thành công
                                            if (pauseToastBody) pauseToastBody.textContent = data.message;
                                            if (pauseToast) {
                                                pauseToast.classList.remove('text-bg-danger');
                                                pauseToast.classList.add('text-bg-success');
                                                if (toastInstance) toastInstance.show();
                                            }
                                            // Reset form
                                            pauseForm.reset();
                                            // Reload lại danh sách tạm dừng (nếu có hàm loadPauseList)
                                            if (typeof loadPauseList === 'function') {
                                                var hoso = document.getElementById('hosoInput').value;
                                                loadPauseList(hoso);
                                            } else {
                                                // Hoặc reload trang nếu không có AJAX load
                                                location.reload();
                                            }
                                        } else {
                                            // Hiện toast lỗi
                                            if (pauseToastBody) pauseToastBody.textContent = data.message;
                                            if (pauseToast) {
                                                pauseToast.classList.remove('text-bg-success');
                                                pauseToast.classList.add('text-bg-danger');
                                                if (toastInstance) toastInstance.show();
                                            }
                                        }
                                    })
                                    .catch(() => {
                                        // Thử log response text để debug lỗi JSON
                                        fetch('add_pause.php', {
                                            method: 'POST',
                                            body: formData
                                        })
                                        .then(resp => resp.text())
                                        .then(txt => {
                                            console.error('Lỗi parse JSON, response thực tế:', txt);
                                            if (pauseToastBody) pauseToastBody.textContent = 'Lỗi kết nối máy chủ!';
                                            if (pauseToast) {
                                                pauseToast.classList.remove('text-bg-success');
                                                pauseToast.classList.add('text-bg-danger');
                                                if (toastInstance) toastInstance.show();
                                            }
                                        });
                                    });
                                });
                            }
                        });
                        </script>
<script>
// Xóa tạm dừng bằng AJAX
document.addEventListener('DOMContentLoaded', function() {
    document.body.addEventListener('click', function(e) {
        if (e.target.closest('.btn-delete-pause')) {
            var btn = e.target.closest('.btn-delete-pause');
            var id = btn.getAttribute('data-id');
            if (!confirm('Xác nhận xóa lần tạm dừng này?')) return;
            fetch('delete_pause.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                body: 'id=' + encodeURIComponent(id)
            })
            .then(res => res.json())
            .then(data => {
                if (window.pauseToastBody) pauseToastBody.textContent = data.message;
                if (window.pauseToast) {
                    if (data.success) {
                        pauseToast.classList.remove('text-bg-danger');
                        pauseToast.classList.add('text-bg-success');
                    } else {
                        pauseToast.classList.remove('text-bg-success');
                        pauseToast.classList.add('text-bg-danger');
                    }
                    if (window.toastInstance) toastInstance.show();
                }
                if (typeof loadPauseList === 'function') {
                    var hoso = document.getElementById('hosoInput')?.value;
                    loadPauseList(hoso);
                } else {
                    location.reload();
                }
            })
            .catch(() => {
                if (window.pauseToastBody) pauseToastBody.textContent = 'Lỗi kết nối máy chủ!';
                if (window.pauseToast) {
                    pauseToast.classList.remove('text-bg-success');
                    pauseToast.classList.add('text-bg-danger');
                    if (window.toastInstance) toastInstance.show();
                }
            });
        }
    });
});
</script>
</body>
<!-- Bootstrap 5 CSS & JS (chèn nếu chưa có) -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
            
            <!-- Pagination -->
            <div class="pagination">
                <?php
                $current_page = ($start / $row_per_page) + 1;
                $search_params = !empty($search_query) ? "&search_query=" . urlencode($search_query) . "&search_type=" . urlencode($search_type) : "";
                for ($i = 1; $i <= $totalPages; $i++) {
                    $page_start = $row_per_page * ($i - 1);
                    if ($current_page != $i) {
                        echo "<a href='tiendocongviec_professional.php?start=$page_start&user=$username&nhomsc=$nhomsct$search_params'>$i</a>";
                    } else {
                        echo "<span class='current'>$i</span>";
                    }
                }
                ?>
            </div>
        </div>

        <!-- Maintenance Schedule Table -->
        <div class="card">
            <div class="card-header">
                <i class="fas fa-calendar-check"></i>
                Lịch Bảo Dưỡng Định Kỳ Tháng <?php echo date('m/Y'); ?>
                <span style="margin-left: auto; font-size: 0.9em; opacity: 0.9;">
                    (<?php echo $maintenanceTotal; ?> thiết bị)
                </span>
            </div>
            
            <!-- Color Legend cho bảng bảo dưỡng -->
            <!--
            <div class='color-legend' style="margin: 15px 20px;">
                <h4><i class='fas fa-palette'></i> Ý nghĩa màu sắc - Bảng Bảo Dưỡng:</h4>
                <div class='legend-items'>
                    <div class='legend-item'><div class='legend-color' style='background: #ff9a9a;'></div><span class='legend-text'>≤15 ngày (Khẩn cấp)</span></div>
                    <div class='legend-item'><div class='legend-color' style='background: #FFFF9A;'></div><span class='legend-text'>16-30 ngày (Cảnh báo)</span></div>
                    <div class='legend-item'><div class='legend-color' style='background: #00BFFF;'></div><span class='legend-text'>>30 ngày (An toàn)</span></div>
                </div>
            </div>
            -->
            <div class="table-container">
                <table class="modern-table">
                    <thead>
                        <tr>
                            <th style="width: 50px;">STT</th>
                            <th style="width: 150px;">Tên Viết Tắt</th>
                            <th style="width: 200px;">Tên Thiết Bị</th>
                            <th style="width: 120px;" class="responsive-hide">Chủ Sở Hữu</th>
                            <th style="width: 120px;" class="responsive-hide">Serial Number</th>
                            <th style="width: 100px;" class="responsive-hide">Ngày BD Gần Nhất</th>
                            <th style="width: 120px;">Ngày BD Tiếp Theo</th>
                            <th style="width: 100px;">Còn Lại (Ngày)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $stt = $start1 + 1;
                        $sql = $workManager->getMaintenanceSchedule($start1);
                        $today = date('d-m-Y');
                        
                        while ($row = mysqli_fetch_array($sql)) {
                            $id = $row['stt'];
                            $tenthietbi = $row['tenthietbi'];
                            $tenvt = $row['tenvt'];
                            $chusohuu = $row['chusohuu'];
                            $serialnumber = $row['serialnumber'];
                            $ngaykd = $row['ngaykd'];
                            $ngaykdtt = date("d-m-Y", strtotime($row['ngaykdtt']));
                            
                            // Tính số ngày còn lại
                            $date1 = date_create($today);
                            $date2 = date_create($ngaykdtt);
                            $ngaycl = date_diff($date1, $date2);
                            $ngaycl_num = $ngaycl->format("%R%a");
                            
                            $ngay1 = strtotime($ngaykdtt) >= strtotime($today) ? $today : $ngaykdtt;
                            $ngay2 = strtotime($ngaykdtt) >= strtotime($today) ? $ngaykdtt : $today;
                            
                            $ngaylv = $workManager->calculateWorkingDays($ngay1, $ngay2);
                            if (strtotime($ngaykdtt) < strtotime($today)) {
                                $ngaylv = -$ngaylv;
                            }
                            
                            // Lấy màu sắc từ logic bảo dưỡng (ngược với bảng sửa chữa)
                            $row_color = $workManager->getMaintenanceColor($ngaylv);
                            
                            // Xác định mức độ ưu tiên
                            $priority_class = "";
                            if ($ngaylv <= 7) {
                                $priority_class = "priority-high";
                            } elseif ($ngaylv <= 15) {
                                $priority_class = "priority-medium";
                            } else {
                                $priority_class = "priority-low";
                            }
                        ?>
                        <tr>
                            <td class="stt-cell" style="background-color: <?php echo $row_color; ?>;"><?php echo $stt; ?></td>
                            <td>
                                <a href="danhmuchotro.php?&start=0&ad=&sort=&s=&f=&mte_a=edit&id=<?php echo $id; ?>" class="equipment-link">
                                    <strong><?php echo $tenthietbi; ?></strong>
                                </a>
                            </td>
                            <td><?php echo $tenvt; ?></td>
                            <td class="responsive-hide"><?php echo $chusohuu; ?></td>
                            <td class="responsive-hide"><code><?php echo $serialnumber; ?></code></td>
                            <td class="responsive-hide"><?php echo $ngaykd; ?></td>
                            <td>
                                <strong style="color: <?php echo ($ngaylv <= 7) ? '#e74c3c' : (($ngaylv <= 15) ? '#f39c12' : '#27ae60'); ?>">
                                    <?php echo $ngaykdtt; ?>
                                </strong>
                            </td>
                            <td>
                                <span style="font-weight: bold; color: <?php echo ($ngaylv <= 0) ? '#e74c3c' : (($ngaylv <= 7) ? '#f39c12' : '#27ae60'); ?>">
                                    <?php 
                                    if ($ngaylv <= 0) {
                                        echo "QUÁ HẠN " . abs($ngaylv) . " ngày";
                                    } else {
                                        echo $ngaylv . " ngày";
                                    }
                                    ?>
                                </span>
                            </td>
                        </tr>
                        <?php
                            $stt++;
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            
            <!-- Maintenance Pagination -->
            <div class="pagination">
                <?php
                $current_page = ($start1 / $row_per_page) + 1;
                for ($i = 1; $i <= $maintenancePages; $i++) {
                    $page_start = $row_per_page * ($i - 1);
                    if ($current_page != $i) {
                        echo "<a href='tiendocongviec_professional.php?start1=$page_start&user=$username&nhomsc=$nhomsct'>$i</a>";
                    } else {
                        echo "<span class='current'>$i</span>";
                    }
                }
                ?>
            </div>
        </div>
    </div>

    <script>
        // Auto refresh every 5 minutes
        setTimeout(() => {
            location.reload();
        }, 300000);
        
        // Add loading animation
        document.addEventListener('DOMContentLoaded', function() {
            const tables = document.querySelectorAll('.modern-table');
            tables.forEach(table => {
                const rows = table.querySelectorAll('tbody tr');
                rows.forEach((row, index) => {
                    row.style.opacity = '0';
                    row.style.transform = 'translateY(20px)';
                    setTimeout(() => {
                        row.style.transition = 'all 0.3s ease';
                        row.style.opacity = '1';
                        row.style.transform = 'translateY(0)';
                    }, index * 50);
                });
            });
        });
        
        // Enhanced tooltips
        document.querySelectorAll('[title]').forEach(element => {
            element.addEventListener('mouseenter', function(e) {
                const tooltip = document.createElement('div');
                tooltip.textContent = this.getAttribute('title');
                tooltip.style.cssText = `
                    position: absolute;
                    background: #333;
                    color: white;
                    padding: 5px 10px;
                    border-radius: 5px;
                    font-size: 12px;
                    z-index: 1000;
                    pointer-events: none;
                `;
                document.body.appendChild(tooltip);
                
                const rect = this.getBoundingClientRect();
                tooltip.style.left = rect.left + 'px';
                tooltip.style.top = (rect.bottom + 5) + 'px';
                
                this.addEventListener('mouseleave', () => {
                    document.body.removeChild(tooltip);
                }, { once: true });
            });
        });
    </script>
    <!-- Modal sửa tạm dừng -->
<div class="modal fade" id="editPauseModal" tabindex="-1" aria-labelledby="editPauseModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form id="editPauseForm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editPauseModalLabel">Sửa lần tạm dừng</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id" id="editPauseId">
                    <div class="mb-3">
                        <label class="form-label">Ngày bắt đầu</label>
                        <input type="date" name="pause_start" id="editPauseStart" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Ngày kết thúc</label>
                        <input type="date" name="pause_end" id="editPauseEnd" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Lý do</label>
                        <textarea name="pause_reason" id="editPauseReason" class="form-control"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Lưu</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                </div>
            </div>
        </form>
    </div>
</div>
<script>
// Sửa tạm dừng bằng modal + AJAX
document.addEventListener('DOMContentLoaded', function() {
    var editPauseModal = document.getElementById('editPauseModal');
    var editPauseForm = document.getElementById('editPauseForm');
    var editPauseId = document.getElementById('editPauseId');
    var editPauseStart = document.getElementById('editPauseStart');
    var editPauseEnd = document.getElementById('editPauseEnd');
    var editPauseReason = document.getElementById('editPauseReason');
    var editModalInstance = null;
    if (editPauseModal) editModalInstance = new bootstrap.Modal(editPauseModal);

    document.body.addEventListener('click', function(e) {
        if (e.target.closest('.btn-edit-pause')) {
            var btn = e.target.closest('.btn-edit-pause');
            editPauseId.value = btn.getAttribute('data-id');
            editPauseStart.value = btn.getAttribute('data-start');
            editPauseEnd.value = btn.getAttribute('data-end');
            editPauseReason.value = btn.getAttribute('data-reason');
            if (editModalInstance) editModalInstance.show();
        }
    });

    if (editPauseForm) {
        editPauseForm.addEventListener('submit', function(e) {
            e.preventDefault();
            var formData = new FormData(editPauseForm);
            fetch('edit_pause.php', {
                method: 'POST',
                body: formData
            })
            .then(res => res.json())
            .then(data => {
                if (window.pauseToastBody) pauseToastBody.textContent = data.message;
                if (window.pauseToast) {
                    if (data.success) {
                        pauseToast.classList.remove('text-bg-danger');
                        pauseToast.classList.add('text-bg-success');
                    } else {
                        pauseToast.classList.remove('text-bg-success');
                        pauseToast.classList.add('text-bg-danger');
                    }
                    if (window.toastInstance) toastInstance.show();
                }
                if (data.success && editModalInstance) editModalInstance.hide();
                if (typeof loadPauseList === 'function') {
                    var hoso = document.getElementById('hosoInput')?.value;
                    loadPauseList(hoso);
                } else {
                    location.reload();
                }
            })
            .catch(() => {
                if (window.pauseToastBody) pauseToastBody.textContent = 'Lỗi kết nối máy chủ!';
                if (window.pauseToast) {
                    pauseToast.classList.remove('text-bg-success');
                    pauseToast.classList.add('text-bg-danger');
                    if (window.toastInstance) toastInstance.show();
                }
            });
        });
    }
});
</script>

</body>
</html>