<?php
// import_export_excel.php
// Chức năng import/export Excel cho link_iso dùng PHPExcel (hỗ trợ PHP 5.6)
require_once 'Classes/PHPExcel.php';
require_once 'Classes/PHPExcel/IOFactory.php';

$servername = "localhost";
$username = "diavatly";
$password = "cntt2019";
$dbname = "diavatly_db";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) die("Kết nối thất bại: " . $conn->connect_error);

// Export
if (isset($_GET['export'])) {
    $objPHPExcel = new PHPExcel();
    $objPHPExcel->setActiveSheetIndex(0);
    $sheet = $objPHPExcel->getActiveSheet();
    $sheet->setCellValue('A1', 'ID');
    $sheet->setCellValue('B1', 'Tiêu đề');
    $sheet->setCellValue('C1', 'Link');
    $sql = "SELECT * FROM link_iso ORDER BY id DESC";
    $result = $conn->query($sql);
    $rowNum = 2;
    while ($row = $result->fetch_assoc()) {
        $sheet->setCellValue('A'.$rowNum, $row['id']);
        $sheet->setCellValue('B'.$rowNum, $row['title']);
        $sheet->setCellValue('C'.$rowNum, $row['link']);
        $rowNum++;
    }
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment; filename="link_iso_export.xlsx"');
    $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
    $objWriter->save('php://output');
    exit;
}

// Import
if (isset($_POST['import']) && isset($_FILES['excel_file'])) {
    $file = $_FILES['excel_file']['tmp_name'];
    $objPHPExcel = PHPExcel_IOFactory::load($file);
    $sheet = $objPHPExcel->getActiveSheet();
    $highestRow = $sheet->getHighestRow();
    for ($row = 2; $row <= $highestRow; $row++) {
        $title = $sheet->getCell('B'.$row)->getValue();
        $link = $sheet->getCell('C'.$row)->getValue();
        if ($title && $link) {
            $sql = "INSERT INTO link_iso (title, link) VALUES (?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ss", $title, $link);
            $stmt->execute();
            $stmt->close();
        }
    }
    header('Location: link_menu_iso.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Import/Export Excel Link ISO (PHPExcel)</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container" style="max-width:600px;margin-top:40px;">
    <h2>Import/Export Excel Link ISO (PHPExcel)</h2>
    <form method="get">
        <button type="submit" name="export" class="btn btn-success">Export Excel</button>
    </form>
    <hr>
    <form method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label>Import từ file Excel (.xlsx):</label>
            <input type="file" name="excel_file" accept=".xlsx" required class="form-control">
        </div>
        <button type="submit" name="import" class="btn btn-primary">Import Excel</button>
    </form>
</div>
</body>
</html>
<?php $conn->close(); ?>
