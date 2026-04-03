<?php
include("select_data.php");
session_start();

// Xử lý thêm mới thiết bị
if (isset($_POST['add_device'])) {
    $tenthietbi = mysqli_real_escape_string($link, $_POST['tenthietbi']);
    $tenvt = mysqli_real_escape_string($link, $_POST['tenvt']);
    $chusohuu = mysqli_real_escape_string($link, $_POST['chusohuu']);
    $serialnumber = mysqli_real_escape_string($link, $_POST['serialnumber']);
    $ngaykd = mysqli_real_escape_string($link, $_POST['ngaykd']);
    $ngaykdtt = mysqli_real_escape_string($link, $_POST['ngaykdtt']);
    $cdung = isset($_POST['cdung']) ? 1 : 0;
    $hankd = mysqli_real_escape_string($link, $_POST['hankd']);
    $tlkt = mysqli_real_escape_string($link, $_POST['tlkt']);
    $hosomay = mysqli_real_escape_string($link, $_POST['hosomay']);
    $thly = isset($_POST['thly']) ? 1 : 0;
    
    $sql = "INSERT INTO thietbihotro_iso (tenthietbi, tenvt, chusohuu, serialnumber, ngaykd, ngaykdtt, cdung, hankd, tlkt, hosomay, thly) 
            VALUES ('$tenthietbi', '$tenvt', '$chusohuu', '$serialnumber', '$ngaykd', '$ngaykdtt', $cdung, '$hankd', '$tlkt', '$hosomay', '$thly')";
    
    if (mysqli_query($link, $sql)) {
        $success_msg = "Thêm thiết bị thành công!";
    } else {
        $error_msg = "Lỗi: " . mysqli_error($link);
    }
}

// Xử lý xóa thiết bị
if (isset($_GET['delete'])) {
    $id = intval($_GET['delete']);
    $sql = "DELETE FROM thietbihotro_iso WHERE stt = $id";
    if (mysqli_query($link, $sql)) {
        $success_msg = "Xóa thiết bị thành công!";
    }
}

// Xử lý cập nhật thiết bị
if (isset($_POST['update_device'])) {
    $stt = intval($_POST['stt']);
    $tenthietbi = mysqli_real_escape_string($link, $_POST['tenthietbi']);
    $tenvt = mysqli_real_escape_string($link, $_POST['tenvt']);
    $chusohuu = mysqli_real_escape_string($link, $_POST['chusohuu']);
    $serialnumber = mysqli_real_escape_string($link, $_POST['serialnumber']);
    $ngaykd = mysqli_real_escape_string($link, $_POST['ngaykd']);
    $ngaykdtt = mysqli_real_escape_string($link, $_POST['ngaykdtt']);
    $cdung = isset($_POST['cdung']) ? 1 : 0;
    $hankd = mysqli_real_escape_string($link, $_POST['hankd']);
    $tlkt = mysqli_real_escape_string($link, $_POST['tlkt']);
    $hosomay = mysqli_real_escape_string($link, $_POST['hosomay']);
    $thly = isset($_POST['thly']) ? 1 : 0;
    
    $sql = "UPDATE thietbihotro_iso SET 
            tenthietbi='$tenthietbi', tenvt='$tenvt', chusohuu='$chusohuu', 
            serialnumber='$serialnumber', ngaykd='$ngaykd', ngaykdtt='$ngaykdtt', 
            cdung=$cdung, hankd='$hankd', tlkt='$tlkt', hosomay='$hosomay', thly='$thly'
            WHERE stt = $stt";
    
    if (mysqli_query($link, $sql)) {
        $success_msg = "Cập nhật thiết bị thành công!";
    } else {
        $error_msg = "Lỗi: " . mysqli_error($link);
    }
}

// Lấy danh sách thiết bị
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
$limit = 10;
$offset = ($page - 1) * $limit;

$search = isset($_GET['search']) ? mysqli_real_escape_string($link, $_GET['search']) : '';
$where = $search ? "WHERE tenthietbi LIKE '%$search%' OR tenvt LIKE '%$search%' OR serialnumber LIKE '%$search%'" : '';

$total_result = mysqli_query($link, "SELECT COUNT(*) as total FROM thietbihotro_iso $where");
$total_row = mysqli_fetch_assoc($total_result);
$total_pages = ceil($total_row['total'] / $limit);

$result = mysqli_query($link, "SELECT * FROM thietbihotro_iso $where ORDER BY stt DESC LIMIT $limit OFFSET $offset");

// Lấy dữ liệu để edit
$edit_data = null;
if (isset($_GET['edit'])) {
    $edit_id = intval($_GET['edit']);
    $edit_result = mysqli_query($link, "SELECT * FROM thietbihotro_iso WHERE stt = $edit_id");
    $edit_data = mysqli_fetch_assoc($edit_result);
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh Mục Thiết Bị Hỗ Trợ</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body { background: #f5f5f5; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
        .container-fluid { max-width: 1400px; margin-top: 20px; }
        .card { box-shadow: 0 2px 8px rgba(0,0,0,0.1); margin-bottom: 20px; }
        .card-header { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; font-weight: bold; }
        .tabs { display: flex; gap: 10px; margin-bottom: 20px; }
        .tab { padding: 12px 24px; background: white; border-radius: 8px 8px 0 0; cursor: pointer; transition: all 0.3s; text-decoration: none; color: #333; }
        .tab:hover { background: #f0f0f0; text-decoration: none; color: #333; }
        .tab.active { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; }
        .form-label { font-weight: 600; color: #555; }
        .required:after { content: " *"; color: red; }
        .btn-custom { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; border: none; }
        .btn-custom:hover { background: linear-gradient(135deg, #764ba2 0%, #667eea 100%); color: white; }
        .table th { background: #f8f9fa; font-weight: 600; }
        .badge-chuyen-dung { background: #28a745; }
        .badge-binh-thuong { background: #6c757d; }
        @media print {
            .no-print { display: none !important; }
            .card { box-shadow: none; }
        }
        .checkbox-custom { width: 20px; height: 20px; cursor: pointer; }
        .checkbox-label { display: flex; align-items: center; gap: 10px; padding: 10px; background: #f8f9fa; border-radius: 5px; cursor: pointer; }
        .checkbox-label:hover { background: #e9ecef; }
    </style>
</head>
<body>
    <div class="container-fluid">
        <!-- Tabs -->
        <div class="tabs no-print">
            <a href="Danhmucsc.php" class="tab">
                <i class="fas fa-tools"></i> DANH MỤC THIẾT BỊ SC-BD
            </a>
            <a href="danhmuchotro_modern.php" class="tab active">
                <i class="fas fa-laptop"></i> DANH MỤC THIẾT BỊ HỖ TRỢ
            </a>
        </div>

        <!-- Thông báo -->
        <?php if (isset($success_msg)): ?>
            <div class="alert alert-success alert-dismissible fade show no-print">
                <i class="fas fa-check-circle"></i> <?php echo $success_msg; ?>
                <button type="button" class="close" data-dismiss="alert">&times;</button>
            </div>
        <?php endif; ?>
        
        <?php if (isset($error_msg)): ?>
            <div class="alert alert-danger alert-dismissible fade show no-print">
                <i class="fas fa-exclamation-circle"></i> <?php echo $error_msg; ?>
                <button type="button" class="close" data-dismiss="alert">&times;</button>
            </div>
        <?php endif; ?>

        <!-- Form Thêm/Sửa Thiết Bị -->
        <div class="card no-print">
            <div class="card-header">
                <i class="fas fa-<?php echo $edit_data ? 'edit' : 'plus-circle'; ?>"></i>
                <?php echo $edit_data ? 'SỬA THIẾT BỊ' : 'THÊM MỚI THIẾT BỊ'; ?>
            </div>
            <div class="card-body">
                <form method="post" action="">
                    <?php if ($edit_data): ?>
                        <input type="hidden" name="stt" value="<?php echo $edit_data['stt']; ?>">
                    <?php endif; ?>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label required">Tên viết tắt</label>
                                <input type="text" name="tenthietbi" class="form-control" 
                                       value="<?php echo $edit_data ? htmlspecialchars($edit_data['tenthietbi']) : ''; ?>" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Tên Thiết Bị</label>
                                <input type="text" name="tenvt" class="form-control" 
                                       value="<?php echo $edit_data ? htmlspecialchars($edit_data['tenvt']) : ''; ?>">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Chủ sở hữu</label>
                                <input type="text" name="chusohuu" class="form-control" 
                                       value="<?php echo $edit_data ? htmlspecialchars($edit_data['chusohuu']) : ''; ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Serial Number</label>
                                <input type="text" name="serialnumber" class="form-control" 
                                       value="<?php echo $edit_data ? htmlspecialchars($edit_data['serialnumber']) : ''; ?>">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Ngày KD/BD</label>
                                <input type="date" name="ngaykd" class="form-control" 
                                       value="<?php echo $edit_data ? $edit_data['ngaykd'] : ''; ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Ngày KD/BD kế tiếp</label>
                                <input type="date" name="ngaykdtt" class="form-control" 
                                       value="<?php echo $edit_data ? $edit_data['ngaykdtt'] : ''; ?>">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Hạn KD/BD</label>
                                <input type="text" name="hankd" class="form-control" 
                                       value="<?php echo $edit_data ? htmlspecialchars($edit_data['hankd']) : ''; ?>" 
                                       placeholder="Ví dụ: 12 tháng">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">TLKT</label>
                                <input type="text" name="tlkt" class="form-control" 
                                       value="<?php echo $edit_data ? htmlspecialchars($edit_data['tlkt']) : ''; ?>">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Hồ sơ máy</label>
                                <input type="text" name="hosomay" class="form-control" 
                                       value="<?php echo $edit_data ? htmlspecialchars($edit_data['hosomay']) : ''; ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <!-- Placeholder để căn chỉnh layout -->
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="checkbox-label">
                                    <input type="checkbox" name="cdung" value="1" class="checkbox-custom" 
                                           <?php echo ($edit_data && $edit_data['cdung'] == 1) ? 'checked' : ''; ?>>
                                    <span>
                                        <i class="fas fa-check-square" style="color: #667eea;"></i>
                                        <strong>Check nếu là thiết bị chuyên dụng của Xưởng</strong>
                                    </span>
                                </label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="checkbox-label" style="background: #ffebee;">
                                    <input type="checkbox" name="thly" value="1" class="checkbox-custom" 
                                           <?php echo ($edit_data && $edit_data['thly'] == 1) ? 'checked' : ''; ?>>
                                    <span>
                                        <i class="fas fa-trash" style="color: #dc143c;"></i>
                                        <strong>Thiết bị đã thanh lý</strong>
                                    </span>
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group text-right">
                        <?php if ($edit_data): ?>
                            <a href="danhmuchotro_modern.php" class="btn btn-secondary">
                                <i class="fas fa-times"></i> Hủy
                            </a>
                            <button type="submit" name="update_device" class="btn btn-custom">
                                <i class="fas fa-save"></i> Cập nhật
                            </button>
                        <?php else: ?>
                            <button type="reset" class="btn btn-secondary">
                                <i class="fas fa-redo"></i> Làm mới
                            </button>
                            <button type="submit" name="add_device" class="btn btn-custom">
                                <i class="fas fa-plus"></i> Thêm mới
                            </button>
                        <?php endif; ?>
                    </div>
                </form>
            </div>
        </div>

        <!-- Tìm kiếm -->
        <div class="card no-print">
            <div class="card-body">
                <form method="get" class="form-inline">
                    <div class="input-group" style="width: 100%; max-width: 500px;">
                        <input type="text" name="search" class="form-control" 
                               placeholder="Tìm kiếm theo tên, serial..." 
                               value="<?php echo htmlspecialchars($search); ?>">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-custom">
                                <i class="fas fa-search"></i> Tìm kiếm
                            </button>
                        </div>
                    </div>
                    <?php if ($search): ?>
                        <a href="danhmuchotro_modern.php" class="btn btn-secondary ml-2">
                            <i class="fas fa-times"></i> Xóa tìm kiếm
                        </a>
                    <?php endif; ?>
                </form>
            </div>
        </div>

        <!-- Danh sách thiết bị -->
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span><i class="fas fa-list"></i> DANH SÁCH THIẾT BỊ HỖ TRỢ</span>
                <span class="badge badge-light"><?php echo $total_row['total']; ?> thiết bị</span>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover table-bordered mb-0">
                        <thead>
                            <tr>
                                <th style="width: 50px;">STT</th>
                                <th>Tên viết tắt</th>
                                <th>Tên Thiết Bị</th>
                                <th>Serial Number</th>
                                <th>Chủ sở hữu</th>
                                <th style="width: 120px;">Ngày KD/BD</th>
                                <th style="width: 120px;">Ngày KD/BD kế tiếp</th>
                                <th style="width: 100px;">Loại TB</th>
                                <th style="width: 100px;">Thanh lý</th>
                                <th class="no-print" style="width: 120px;">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (mysqli_num_rows($result) > 0): ?>
                                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                                    <tr>
                                        <td class="text-center"><?php echo $row['stt']; ?></td>
                                        <td><strong><?php echo htmlspecialchars($row['tenthietbi']); ?></strong></td>
                                        <td><?php echo htmlspecialchars($row['tenvt']); ?></td>
                                        <td><?php echo htmlspecialchars($row['serialnumber']); ?></td>
                                        <td><?php echo htmlspecialchars($row['chusohuu']); ?></td>
                                        <td class="text-center"><?php echo $row['ngaykd'] ? date('d/m/Y', strtotime($row['ngaykd'])) : ''; ?></td>
                                        <td class="text-center"><?php echo $row['ngaykdtt'] ? date('d/m/Y', strtotime($row['ngaykdtt'])) : ''; ?></td>
                                        <td class="text-center">
                                            <?php if ($row['cdung'] == 1): ?>
                                                <span class="badge badge-chuyen-dung">
                                                    <i class="fas fa-star"></i> Chuyên dụng
                                                </span>
                                            <?php else: ?>
                                                <span class="badge badge-binh-thuong">Bình thường</span>
                                            <?php endif; ?>
                                        </td>
                                        <td class="text-center">
                                            <?php if ($row['thly'] == 1): ?>
                                                <span class="badge" style="background:#dc143c;">
                                                    <i class="fas fa-check"></i> Đã thanh lý
                                                </span>
                                            <?php else: ?>
                                                <span class="badge" style="background:#6c757d;">Chưa thanh lý</span>
                                            <?php endif; ?>
                                        </td>
                                        <td class="text-center no-print">
                                            <a href="?edit=<?php echo $row['stt']; ?>" class="btn btn-sm btn-info" title="Sửa">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="?delete=<?php echo $row['stt']; ?>" class="btn btn-sm btn-danger" 
                                               onclick="return confirm('Bạn có chắc muốn xóa thiết bị này?')" title="Xóa">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php endwhile; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="10" class="text-center text-muted">
                                        <i class="fas fa-inbox"></i> Chưa có dữ liệu
                                    </td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Phân trang -->
        <?php if ($total_pages > 1): ?>
            <nav class="no-print">
                <ul class="pagination justify-content-center">
                    <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                        <li class="page-item <?php echo $i == $page ? 'active' : ''; ?>">
                            <a class="page-link" href="?page=<?php echo $i; ?><?php echo $search ? '&search=' . urlencode($search) : ''; ?>">
                                <?php echo $i; ?>
                            </a>
                        </li>
                    <?php endfor; ?>
                </ul>
            </nav>
        <?php endif; ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Auto hide alerts after 3 seconds
        setTimeout(function() {
            $('.alert').fadeOut('slow');
        }, 3000);
    </script>
</body>
</html>
<?php mysqli_close($link); ?>
