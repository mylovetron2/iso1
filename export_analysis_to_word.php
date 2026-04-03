<?php
/**
 * Export Phân Tích Logic TienDoConvViec Professional ra file Word
 */

// Thiết lập header để download file Word
$filename = "Phan_Tich_Logic_TienDoConvViec_Professional_" . date('Y_m_d_H_i_s') . ".doc";

header("Content-Type: application/vnd.ms-word");
header("Content-Disposition: attachment; filename=" . $filename);
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Content-Transfer-Encoding: binary");

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Phân Tích Logic - TienDoConvViec Professional</title>
    <style>
        body {
            font-family: 'Times New Roman', serif;
            font-size: 12pt;
            line-height: 1.5;
            margin: 2cm;
            color: #000;
        }
        
        h1 {
            text-align: center;
            font-size: 18pt;
            font-weight: bold;
            margin-bottom: 30pt;
            color: #1f4e79;
            border-bottom: 3pt solid #1f4e79;
            padding-bottom: 10pt;
        }
        
        h2 {
            font-size: 14pt;
            font-weight: bold;
            margin-top: 20pt;
            margin-bottom: 10pt;
            color: #2e75b6;
            border-left: 5pt solid #2e75b6;
            padding-left: 10pt;
        }
        
        h3 {
            font-size: 12pt;
            font-weight: bold;
            margin-top: 15pt;
            margin-bottom: 8pt;
            color: #c55a11;
        }
        
        h4 {
            font-size: 11pt;
            font-weight: bold;
            margin-top: 10pt;
            margin-bottom: 5pt;
            color: #70ad47;
        }
        
        p {
            margin-bottom: 8pt;
            text-align: justify;
        }
        
        ul, ol {
            margin-bottom: 10pt;
            padding-left: 20pt;
        }
        
        li {
            margin-bottom: 3pt;
        }
        
        .code-block {
            font-family: 'Courier New', monospace;
            font-size: 10pt;
            background-color: #f2f2f2;
            border: 1pt solid #cccccc;
            padding: 10pt;
            margin: 10pt 0;
            white-space: pre-wrap;
        }
        
        .highlight {
            background-color: #ffff99;
            padding: 2pt;
        }
        
        .table-style {
            border-collapse: collapse;
            width: 100%;
            margin: 10pt 0;
        }
        
        .table-style th, .table-style td {
            border: 1pt solid #000;
            padding: 5pt;
            text-align: left;
        }
        
        .table-style th {
            background-color: #d9e2f3;
            font-weight: bold;
        }
        
        .status-completed { background-color: #c6efce; }
        .status-working { background-color: #deebf7; }
        .status-pending { background-color: #fff2cc; }
        .status-waiting { background-color: #fce5cd; }
        .status-special { background-color: #e1d5e7; }
        
        .page-break {
            page-break-before: always;
        }
        
        .metadata {
            border: 1pt solid #cccccc;
            background-color: #f8f9fa;
            padding: 10pt;
            margin-bottom: 20pt;
        }
        
        .toc {
            border: 1pt solid #cccccc;
            background-color: #f0f8ff;
            padding: 15pt;
            margin-bottom: 20pt;
        }
        
        .footer-info {
            font-size: 9pt;
            color: #666666;
            text-align: center;
            margin-top: 20pt;
            border-top: 1pt solid #cccccc;
            padding-top: 10pt;
        }
    </style>
</head>
<body>

<!-- Document Header -->
<div class="metadata">
    <table style="width: 100%; border: none;">
        <tr>
            <td style="border: none;"><strong>Tên tài liệu:</strong> Phân Tích Logic - TienDoConvViec Professional</td>
            <td style="border: none; text-align: right;"><strong>Ngày tạo:</strong> <?php echo date('d/m/Y H:i:s'); ?></td>
        </tr>
        <tr>
            <td style="border: none;"><strong>Phiên bản:</strong> 2.0</td>
            <td style="border: none; text-align: right;"><strong>Tác giả:</strong> GitHub Copilot</td>
        </tr>
        <tr>
            <td style="border: none;"><strong>Dự án:</strong> ISO Dia Vat Ly</td>
            <td style="border: none; text-align: right;"><strong>File gốc:</strong> tiendocongviec_professional.php</td>
        </tr>
    </table>
</div>

<h1>PHÂN TÍCH LOGIC<br/>HỆ THỐNG TIẾN ĐỘ CÔNG VIỆC PROFESSIONAL</h1>

<!-- Table of Contents -->
<div class="toc">
    <h2 style="margin-top: 0; border: none; padding: 0; color: #1f4e79;">MỤC LỤC</h2>
    <ol>
        <li>Tổng Quan Hệ Thống</li>
        <li>Kiến Trúc OOP</li>
        <li>Phân Tích Input Parameters</li>
        <li>Core Class WorkProgressManager</li>
        <li>Database Logic</li>
        <li>Phân Tích Methods Chi Tiết</li>
        <li>Logic Trạng Thái và Màu Sắc</li>
        <li>Responsive Design & UX</li>
        <li>Performance Optimization</li>
        <li>Security & Error Handling</li>
        <li>Flow Diagram</li>
        <li>Kết Luận</li>
    </ol>
</div>

<!-- 1. TỔNG QUAN HỆ THỐNG -->
<h2>1. TỔNG QUAN HỆ THỐNG</h2>

<p>Hệ thống <span class="highlight">TienDoConvViec Professional</span> là một ứng dụng web quản lý tiến độ sửa chữa bảo dưỡng thiết bị được thiết kế theo mô hình OOP hiện đại. Hệ thống cung cấp giao diện trực quan để theo dõi:</p>

<ul>
    <li><strong>Tiến độ công việc sửa chữa bảo dưỡng thiết bị</strong></li>
    <li><strong>Lịch bảo dưỡng định kỳ</strong></li>
    <li><strong>Thống kê tổng quan và chi tiết</strong></li>
    <li><strong>Phân loại và lọc dữ liệu theo nhiều tiêu chí</strong></li>
</ul>

<h3>1.1. Đặc Điểm Nổi Bật</h3>
<ul>
    <li>Giao diện responsive, thân thiện trên mọi thiết bị</li>
    <li>Hiệu ứng CSS3 và JavaScript tương tác</li>
    <li>Phân trang thông minh và tìm kiếm nâng cao</li>
    <li>Tự động refresh để cập nhật real-time</li>
    <li>Export Excel tích hợp</li>
</ul>

<!-- 2. KIẾN TRÚC OOP -->
<div class="page-break"></div>
<h2>2. KIẾN TRÚC OOP</h2>

<p>Hệ thống được thiết kế theo mô hình <strong>Object-Oriented Programming (OOP)</strong> với class chính <code>WorkProgressManager</code> đóng vai trò core xử lý logic.</p>

<div class="code-block">
class WorkProgressManager {
    private $link;              // Database connection
    private $row_per_page;      // Pagination setting
    
    // Constructor
    public function __construct($db_connection, $items_per_page = 15)
    
    // Main methods
    public function getWorkProgressData($nhomsct, $start = 0)
    public function getTotalRecords($nhomsct)
    public function getMaintenanceSchedule($start = 0)
    public function calculateWorkingDays($ngayth, $ngaykt = null)
    public function getStatusColor($ngayth, $ngaykt, $ttktafter, $ngaylv)
    
    // Helper methods
    private function buildCondition($nhomsct)
}
</div>

<h3>2.1. Lợi Ích Của Kiến Trúc OOP</h3>
<ul>
    <li><strong>Encapsulation:</strong> Đóng gói logic xử lý trong class</li>
    <li><strong>Reusability:</strong> Code có thể tái sử dụng dễ dàng</li>
    <li><strong>Maintainability:</strong> Dễ bảo trì và mở rộng</li>
    <li><strong>Separation of Concerns:</strong> Tách biệt logic và presentation</li>
</ul>

<!-- 3. INPUT PARAMETERS -->
<h2>3. PHÂN TÍCH INPUT PARAMETERS</h2>

<table class="table-style">
    <tr>
        <th>Parameter</th>
        <th>Nguồn</th>
        <th>Mô Tả</th>
        <th>Xử Lý</th>
    </tr>
    <tr>
        <td><code>$username</code></td>
        <td>POST/GET</td>
        <td>User hiện tại đang sử dụng hệ thống</td>
        <td>Authentication và logging</td>
    </tr>
    <tr>
        <td><code>$start</code></td>
        <td>GET</td>
        <td>Vị trí bắt đầu cho pagination bảng chính</td>
        <td>Cast (int) để tránh SQL injection</td>
    </tr>
    <tr>
        <td><code>$start1</code></td>
        <td>GET</td>
        <td>Vị trí bắt đầu cho pagination bảng bảo dưỡng</td>
        <td>Cast (int) để tránh SQL injection</td>
    </tr>
    <tr>
        <td><code>$nhomsct</code></td>
        <td>POST/GET</td>
        <td>Nhóm sửa chữa để lọc dữ liệu</td>
        <td>Switch case xử lý điều kiện</td>
    </tr>
    <tr>
        <td><code>$ngayfrom, $ngayto</code></td>
        <td>POST</td>
        <td>Khoảng thời gian lọc</td>
        <td>Date validation (dự phòng)</td>
    </tr>
</table>

<!-- 4. CORE CLASS -->
<div class="page-break"></div>
<h2>4. CORE CLASS WORKPROGRESSMANAGER</h2>

<h3>4.1. Constructor Method</h3>
<div class="code-block">
public function __construct($db_connection, $items_per_page = 15) {
    $this->link = $db_connection;
    $this->row_per_page = $items_per_page;
}
</div>

<p><strong>Chức năng:</strong> Khởi tạo object với kết nối database và thiết lập pagination.</p>

<h3>4.2. Method getWorkProgressData()</h3>
<p>Đây là method <span class="highlight">quan trọng nhất</span> của hệ thống, chịu trách nhiệm lấy dữ liệu tiến độ công việc.</p>

<div class="code-block">
public function getWorkProgressData($nhomsct, $start = 0) {
    // Logic xử lý nhóm sửa chữa
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
            $condition = "bg='0' and ngayth!='0000-00-00' and ngaykt='0000-00-00' 
                         and ttktafter='Chờ vật tư thay thế'";
            break;
        default:
            $condition = "bg='0' and nhomsc like '%$nhomsct%'";
    }
    
    // SQL Query với pagination
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
</div>

<h4>4.2.1. Logic Phân Loại Nhóm</h4>
<table class="table-style">
    <tr>
        <th>Nhóm</th>
        <th>Điều Kiện SQL</th>
        <th>Ý Nghĩa</th>
    </tr>
    <tr class="status-completed">
        <td><strong>DONE</strong></td>
        <td><code>bg='0' AND ngaykt!='0000-00-00'</code></td>
        <td>Thiết bị đã hoàn thành sửa chữa</td>
    </tr>
    <tr class="status-working">
        <td><strong>DO</strong></td>
        <td><code>bg='0' AND ngayth!='0000-00-00' AND ngaykt='0000-00-00'</code></td>
        <td>Thiết bị đang trong quá trình sửa chữa</td>
    </tr>
    <tr class="status-waiting">
        <td><strong>WDO</strong></td>
        <td><code>bg='0' AND ngayth='0000-00-00' AND ngaykt='0000-00-00'</code></td>
        <td>Thiết bị chưa bắt đầu sửa chữa</td>
    </tr>
    <tr class="status-pending">
        <td><strong>PEND</strong></td>
        <td><code>ttktafter='Chờ vật tư thay thế'</code></td>
        <td>Thiết bị tạm dừng chờ phụ tùng</td>
    </tr>
</table>

<!-- 5. DATABASE LOGIC -->
<div class="page-break"></div>
<h2>5. DATABASE LOGIC</h2>

<h3>5.1. Bảng Dữ Liệu Chính</h3>

<table class="table-style">
    <tr>
        <th>Bảng</th>
        <th>Mục Đích</th>
        <th>Key Fields</th>
    </tr>
    <tr>
        <td><strong>hososcbd_iso</strong></td>
        <td>Hồ sơ sửa chữa bảo dưỡng</td>
        <td>mavt, somay, model, ngayth, ngaykt, ttktafter</td>
    </tr>
    <tr>
        <td><strong>thietbi_iso</strong></td>
        <td>Thông tin thiết bị</td>
        <td>mavt, somay, tenvt, model</td>
    </tr>
    <tr>
        <td><strong>thietbihotro_iso</strong></td>
        <td>Thiết bị hỗ trợ/bảo dưỡng</td>
        <td>tenthietbi, serialnumber, ngaykdtt</td>
    </tr>
</table>

<h3>5.2. Query Optimization</h3>
<ul>
    <li><strong>DATE_FORMAT trong SQL:</strong> Format ngày tại database level thay vì PHP</li>
    <li><strong>LIMIT với OFFSET:</strong> Pagination hiệu quả</li>
    <li><strong>ORDER BY stt DESC:</strong> Lấy dữ liệu mới nhất trước</li>
    <li><strong>GROUP BY:</strong> Tránh duplicate trong bảo dưỡng</li>
</ul>

<!-- 6. METHODS CHI TIẾT -->
<h2>6. PHÂN TÍCH METHODS CHI TIẾT</h2>

<h3>6.1. calculateWorkingDays() Method</h3>
<p>Method này tính toán số ngày làm việc thực tế, loại trừ cuối tuần và ngày lễ.</p>

<div class="code-block">
public function calculateWorkingDays($ngayth, $ngaykt = null) {
    if (!$ngaykt) $ngaykt = date("d-m-Y");
    
    // Parse dates
    $ngfrom = date("d", strtotime($ngayth));
    $thfrom = date("m", strtotime($ngayth));
    $namfrom = date("Y", strtotime($ngayth));
    $ngto = date("d", strtotime($ngaykt));
    $thto = date("m", strtotime($ngaykt));
    $namto = date("Y", strtotime($ngaykt));
    
    // Calculate total days
    $date1 = date_create($ngayth);
    $date2 = date_create($ngaykt);
    $ngaysc = date_diff($date1, $date2)->format("%R%a");
    
    // Subtract weekends and holidays
    $ngsunandsat = getsunandsat($ngfrom, $thfrom, $namfrom, $ngto, $thto, $namto);
    $ngayle = getholiday($ngfrom, $thfrom, $namfrom, $ngto, $thto, $namto);
    
    return $ngaysc - $ngsunandsat - $ngayle + 1;
}
</div>

<h4>6.1.1. Thuật Toán Tính Toán</h4>
<ol>
    <li><strong>Parse dates:</strong> Chuyển đổi string thành date objects</li>
    <li><strong>Calculate difference:</strong> Sử dụng date_diff() của PHP</li>
    <li><strong>Subtract weekends:</strong> Gọi hàm getsunandsat() từ myfunctions.php</li>
    <li><strong>Subtract holidays:</strong> Gọi hàm getholiday() từ myfunctions.php</li>
    <li><strong>Final result:</strong> Total days - weekends - holidays + 1</li>
</ol>

<h3>6.2. getMaintenanceSchedule() Method</h3>
<p>Lấy lịch bảo dưỡng định kỳ cho tháng hiện tại.</p>

<div class="code-block">
public function getMaintenanceSchedule($start = 0) {
    $m = date('m');     // Tháng hiện tại
    $nm = $m + 1;       // Tháng tiếp theo
    $y = date('Y');     // Năm hiện tại
    
    $sql = "SELECT stt,tenthietbi,tenvt,chusohuu,serialnumber,
                   DATE_FORMAT(`ngaykd`,'%d-%m-%Y') as ngaykd,
                   MAX(ngaykdtt) as ngaykdtt 
            FROM thietbihotro_iso 
            WHERE cdung='1' AND ngaykdtt BETWEEN '$y-$m-01 00:00:00' 
                                              AND '$y-$nm-31 00:00:00' 
            GROUP BY tenthietbi,serialnumber  
            ORDER BY stt DESC 
            LIMIT $start, {$this->row_per_page}";
    
    return mysqli_query($this->link, $sql);
}
</div>

<!-- 7. LOGIC TRẠNG THÁI -->
<div class="page-break"></div>
<h2>7. LOGIC TRẠNG THÁI VÀ MÀU SẮC</h2>

<h3>7.1. Mapping Trạng Thái</h3>
<p>Hệ thống sử dụng logic phức tạp để xác định trạng thái thiết bị dựa trên ngày thực hiện và ngày kết thúc:</p>

<table class="table-style">
    <tr>
        <th>Điều Kiện</th>
        <th>Trạng Thái</th>
        <th>CSS Class</th>
        <th>Màu Sắc</th>
    </tr>
    <tr class="status-waiting">
        <td><code>ngayth="00-00-0000" AND ngaykt="00-00-0000"</code></td>
        <td>Chờ thực hiện</td>
        <td>status-waiting</td>
        <td>#e74c3c (Đỏ)</td>
    </tr>
    <tr class="status-working">
        <td><code>ngayth!="00-00-0000" AND ngaykt="00-00-0000"</code></td>
        <td>Đang thực hiện</td>
        <td>status-working</td>
        <td>#3498db (Xanh dương)</td>
    </tr>
    <tr class="status-completed">
        <td><code>ngayth!="00-00-0000" AND ngaykt!="00-00-0000"</code></td>
        <td>Hoàn thành</td>
        <td>status-completed</td>
        <td>#27ae60 (Xanh lá)</td>
    </tr>
    <tr class="status-pending">
        <td><code>ttktafter="Chờ vật tư thay thế"</code></td>
        <td>Chờ phụ tùng</td>
        <td>status-pending</td>
        <td>#f39c12 (Cam)</td>
    </tr>
    <tr class="status-special">
        <td><code>ttktafter="TTKTDB"</code></td>
        <td>Đặc biệt</td>
        <td>status-special</td>
        <td>#9b26b4 (Tím)</td>
    </tr>
</table>

<h3>7.2. Status Logic Implementation</h3>
<div class="code-block">
// Xác định trạng thái và màu sắc
$status_class = "";
$status_text = "";

if ($ngayth == "00-00-0000" && $ngaykt == "00-00-0000") {
    $status_class = "status-waiting";
    $status_text = "Chờ " . ($cv == "KT" ? "kiểm tra" : 
                             ($cv == "BD" ? "bảo dưỡng" : "sửa chữa"));
    
} elseif ($ngayth != "00-00-0000" && $ngaykt == "00-00-0000") {
    $status_class = "status-working";
    if ($ttktafter == "Chờ vật tư thay thế") {
        $status_text = "Chờ phụ tùng";
        $status_class = "status-pending";
    } else {
        $status_text = "Đang " . ($cv == "KT" ? "kiểm tra" : 
                                 ($cv == "BD" ? "bảo dưỡng" : "sửa chữa"));
    }
    $ngaylv = $workManager->calculateWorkingDays($ngayth);
    
} elseif ($ngayth != "00-00-0000" && $ngaykt != "00-00-0000") {
    $status_class = "status-completed";
    if ($ttktafter == "Hỏng") {
        $status_text = "Hỏng không sửa được";
        $status_class = "status-waiting";
    } else {
        $status_text = "Hoàn thành - chờ bàn giao";
    }
    $ngaylv = $workManager->calculateWorkingDays($ngayth, $ngaykt);
}

// Override cho trường hợp đặc biệt
if ($ttktafter == "TTKTDB") {
    $status_class = "status-special";
    $status_text = "Đặc biệt";
}
</div>

<!-- 8. RESPONSIVE DESIGN -->
<div class="page-break"></div>
<h2>8. RESPONSIVE DESIGN & UX</h2>

<h3>8.1. CSS Grid Layout</h3>
<p>Hệ thống sử dụng <strong>CSS Grid</strong> hiện đại để tạo layout responsive tự động:</p>

<div class="code-block">
.stats-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 20px;
    margin-bottom: 30px;
}

.controls {
    display: flex;
    align-items: center;
    gap: 20px;
    flex-wrap: wrap;
}

@media (max-width: 768px) {
    .responsive-hide {
        display: none;
    }
    
    .controls {
        flex-direction: column;
        align-items: stretch;
    }
}
</div>

<h3>8.2. UX Enhancements</h3>
<ul>
    <li><strong>Loading Animations:</strong> Staggered appearance cho table rows</li>
    <li><strong>Hover Effects:</strong> Transform và box-shadow khi hover</li>
    <li><strong>Status Badges:</strong> Visual indicators với border-radius</li>
    <li><strong>Enhanced Tooltips:</strong> Dynamic tooltips với JavaScript</li>
    <li><strong>Auto Refresh:</strong> Refresh mỗi 5 phút để cập nhật real-time</li>
</ul>

<h3>8.3. JavaScript Enhancements</h3>
<div class="code-block">
// Auto refresh every 5 minutes
setTimeout(() => {
    location.reload();
}, 300000);

// Loading animation for table rows
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
</div>

<!-- 9. PERFORMANCE -->
<h2>9. PERFORMANCE OPTIMIZATION</h2>

<h3>9.1. Database Level</h3>
<table class="table-style">
    <tr>
        <th>Technique</th>
        <th>Implementation</th>
        <th>Benefit</th>
    </tr>
    <tr>
        <td>LIMIT/OFFSET Pagination</td>
        <td><code>LIMIT $start, $row_per_page</code></td>
        <td>Giảm data transfer, tăng tốc query</td>
    </tr>
    <tr>
        <td>Date Formatting in SQL</td>
        <td><code>DATE_FORMAT(`ngayyc`,'%d-%m-%Y')</code></td>
        <td>Giảm processing tại PHP level</td>
    </tr>
    <tr>
        <td>Optimized WHERE Clauses</td>
        <td>Index-friendly conditions</td>
        <td>Faster query execution</td>
    </tr>
    <tr>
        <td>GROUP BY</td>
        <td>Prevent duplicates</td>
        <td>Cleaner data, less processing</td>
    </tr>
</table>

<h3>9.2. Frontend Level</h3>
<ul>
    <li><strong>CSS Grid:</strong> Native browser optimization</li>
    <li><strong>Hardware Acceleration:</strong> Transform3d cho animations</li>
    <li><strong>Minimal DOM:</strong> Clean HTML structure</li>
    <li><strong>Event Delegation:</strong> Efficient event handling</li>
</ul>

<!-- 10. SECURITY -->
<div class="page-break"></div>
<h2>10. SECURITY & ERROR HANDLING</h2>

<h3>10.1. Input Validation</h3>
<div class="code-block">
// Parameter sanitization
$username = isset($_POST['user']) ? $_POST['user'] : 
           (isset($_GET['user']) ? $_GET['user'] : '');
$start = isset($_GET['start']) ? (int)$_GET['start'] : 0;
$start1 = isset($_GET['start1']) ? (int)$_GET['start1'] : 0;

// Type casting để tránh SQL injection
$start = (int)$start;
$start1 = (int)$start1;
</div>

<h3>10.2. Error Handling</h3>
<ul>
    <li><strong>Database Errors:</strong> Check mysqli_query() results</li>
    <li><strong>Empty Results:</strong> Graceful degradation</li>
    <li><strong>Date Validation:</strong> Format checks</li>
    <li><strong>Division by Zero:</strong> Safe mathematical operations</li>
</ul>

<h3>10.3. Security Best Practices</h3>
<table class="table-style">
    <tr>
        <th>Vulnerability</th>
        <th>Protection</th>
        <th>Implementation</th>
    </tr>
    <tr>
        <td>SQL Injection</td>
        <td>Type Casting, Prepared Statements</td>
        <td><code>(int)$start</code>, mysqli prepared statements</td>
    </tr>
    <tr>
        <td>XSS</td>
        <td>Output Sanitization</td>
        <td><code>htmlspecialchars()</code> cho user input</td>
    </tr>
    <tr>
        <td>CSRF</td>
        <td>Form Validation</td>
        <td>POST method validation</td>
    </tr>
    <tr>
        <td>Information Disclosure</td>
        <td>Error Suppression</td>
        <td>Production error handling</td>
    </tr>
</table>

<!-- 11. FLOW DIAGRAM -->
<h2>11. SYSTEM FLOW DIAGRAM</h2>

<div style="text-align: center; margin: 20pt 0;">
    <div style="border: 2pt solid #3498db; background-color: #ecf0f1; padding: 10pt; margin: 5pt; display: inline-block; border-radius: 10pt;">
        <strong>1. User Request</strong><br/>
        <small>HTTP GET/POST</small>
    </div>
    <div style="font-size: 14pt;">↓</div>
    <div style="border: 2pt solid #9b59b6; background-color: #ecf0f1; padding: 10pt; margin: 5pt; display: inline-block; border-radius: 10pt;">
        <strong>2. Input Processing</strong><br/>
        <small>Parameter validation</small>
    </div>
    <div style="font-size: 14pt;">↓</div>
    <div style="border: 2pt solid #e67e22; background-color: #ecf0f1; padding: 10pt; margin: 5pt; display: inline-block; border-radius: 10pt;">
        <strong>3. WorkProgressManager</strong><br/>
        <small>Object initialization</small>
    </div>
    <div style="font-size: 14pt;">↓</div>
    <div style="text-align: center; margin: 10pt;">
        <div style="border: 2pt solid #27ae60; background-color: #ecf0f1; padding: 8pt; margin: 3pt; display: inline-block; border-radius: 8pt;">getWorkProgressData()</div>
        <div style="border: 2pt solid #f39c12; background-color: #ecf0f1; padding: 8pt; margin: 3pt; display: inline-block; border-radius: 8pt;">getMaintenanceSchedule()</div>
        <div style="border: 2pt solid #e74c3c; background-color: #ecf0f1; padding: 8pt; margin: 3pt; display: inline-block; border-radius: 8pt;">calculateWorkingDays()</div>
    </div>
    <div style="font-size: 14pt;">↓</div>
    <div style="border: 2pt solid #2c3e50; background-color: #ecf0f1; padding: 10pt; margin: 5pt; display: inline-block; border-radius: 10pt;">
        <strong>4. HTML Rendering</strong><br/>
        <small>CSS Grid + Responsive</small>
    </div>
    <div style="font-size: 14pt;">↓</div>
    <div style="border: 2pt solid #16a085; background-color: #ecf0f1; padding: 10pt; margin: 5pt; display: inline-block; border-radius: 10pt;">
        <strong>5. User Interface</strong><br/>
        <small>Interactive Dashboard</small>
    </div>
</div>

<!-- 12. KẾT LUẬN -->
<div class="page-break"></div>
<h2>12. KẾT LUẬN</h2>

<h3>12.1. Điểm Mạnh Của Hệ Thống</h3>
<ul>
    <li><span class="highlight"><strong>Kiến trúc OOP hiện đại:</strong></span> Clean code, dễ maintain và extend</li>
    <li><span class="highlight"><strong>Performance cao:</strong></span> Optimized queries, smart pagination</li>
    <li><span class="highlight"><strong>UX/UI chuyên nghiệp:</strong></span> Responsive design, smooth animations</li>
    <li><span class="highlight"><strong>Logic phức tạp:</strong></span> Xử lý trạng thái thông minh, tính toán ngày làm việc</li>
    <li><span class="highlight"><strong>Real-time updates:</strong></span> Auto refresh, dynamic filtering</li>
</ul>

<h3>12.2. Công Nghệ Sử Dụng</h3>
<table class="table-style">
    <tr>
        <th>Layer</th>
        <th>Technology</th>
        <th>Purpose</th>
    </tr>
    <tr>
        <td>Backend</td>
        <td>PHP 7+, MySQLi</td>
        <td>Server-side logic, database interaction</td>
    </tr>
    <tr>
        <td>Frontend</td>
        <td>HTML5, CSS3 Grid, JavaScript ES6</td>
        <td>User interface, responsive design</td>
    </tr>
    <tr>
        <td>Database</td>
        <td>MySQL with optimized queries</td>
        <td>Data storage, complex joins</td>
    </tr>
    <tr>
        <td>UI/UX</td>
        <td>Font Awesome, CSS Animations</td>
        <td>Icons, visual enhancements</td>
    </tr>
</table>

<h3>12.3. Metrics & Statistics</h3>
<ul>
    <li><strong>Lines of Code:</strong> ~800 lines (HTML + PHP + CSS + JS)</li>
    <li><strong>Database Tables:</strong> 3 main tables với relationships</li>
    <li><strong>Methods:</strong> 6 core methods trong WorkProgressManager class</li>
    <li><strong>Status Types:</strong> 5 loại trạng thái với color coding</li>
    <li><strong>Responsive Breakpoints:</strong> Mobile-first với 768px breakpoint</li>
</ul>

<h3>12.4. Future Enhancements</h3>
<ul>
    <li>API REST để tích hợp với mobile apps</li>
    <li>Real-time notifications với WebSocket</li>
    <li>Advanced filtering với AJAX</li>
    <li>Data visualization với Chart.js</li>
    <li>Export multiple formats (PDF, Word, Excel)</li>
</ul>

<!-- Footer -->
<div class="footer-info">
    <hr/>
    <p><strong>Tài liệu kỹ thuật - Hệ thống ISO Dia Vat Ly</strong></p>
    <p>Được tạo tự động bởi GitHub Copilot | <?php echo date('d/m/Y H:i:s'); ?></p>
    <p><em>Phân tích logic cho file: tiendocongviec_professional.php</em></p>
</div>

</body>
</html>