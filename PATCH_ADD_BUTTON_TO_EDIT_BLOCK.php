// ==============================================
// CODE CẦN CHÈN VÀO formsc.php BLOCK EDIT
// Vị tr: Sau line 14551 (sau dấu } của if ($is_tamdung))
// Trước line 14553 (trước echo "<form...")
// ==============================================

// Hiển thị các nút tạm dừng/tiếp tục  
echo "<div style=\"margin-left:50px; margin-bottom:20px; padding:15px; background-color:#f5f5f5; border-radius:5px;\">";
if ($is_tamdung) {
    // Nếu đang tạm dừng → hiển thị nút tiếp tục
    echo "<h3 style=\"color:#e65100;\">⏸ Hồ sơ đang tạm dừng - Bạn có muốn tiếp tục?</h3>
    <form method=\"post\" action=\"formsc.php\" style=\"display:inline-block;\" onsubmit=\"return confirmTieptucEdit();\">
        <input type=\"hidden\" name=\"username\" value=\"$username\">
        <input type=\"hidden\" name=\"password\" value=\"$password\">
        <input type=\"hidden\" name=\"hosomay\" value=\"$edithoso\">
        <input type=\"hidden\" name=\"action_tamdung\" value=\"tieptuc\">
        <label for=\"ghichu_tieptuc_edit\"><strong>Ghi chú khi tiếp tục:</strong></label><br/>
        <textarea name=\"ghichu_tieptuc\" id=\"ghichu_tieptuc_edit\" rows=\"2\" cols=\"50\" placeholder=\"Nhập ghi chú (không bắt buộc)\" style=\"margin-top:5px;\"></textarea><br/>
        <button type=\"submit\" class=\"btn-tieptuc\" style=\"margin-top:10px;\">▶ TIẾP TỤC HỒ SƠ</button>
    </form>
    <script>
    function confirmTieptucEdit() {
        return confirm('Bạn có chắc muốn tiếp tục hồ sơ này?\\n\\nHồ sơ sẽ được đánh dấu là đã tiếp tục và bạn có thể làm việc bình thường.');
    }
    </script>";
} else {
    // Nếu chưa tạm dừng → hiển thị nút tạm dừng
    echo "<h3 style=\"color:#1976d2;\">⚙️ Quản lý trạng thái hồ sơ</h3>
    <form method=\"post\" action=\"formsc.php\" style=\"display:inline-block;\" onsubmit=\"return confirmTamdungEdit();\">
        <input type=\"hidden\" name=\"username\" value=\"$username\">
        <input type=\"hidden\" name=\"password\" value=\"$password\">
        <input type=\"hidden\" name=\"hosomay\" value=\"$edithoso\">
        <input type=\"hidden\" name=\"action_tamdung\" value=\"tamdung\">
        <label for=\"lydo_tamdung_edit\"><strong>Lý do tạm dừng:</strong> <span style=\"color:red;\">*</span></label><br/>
        <textarea name=\"lydo_tamdung\" id=\"lydo_tamdung_edit\" rows=\"2\" cols=\"50\" placeholder=\"VD: Chờ linh kiện, chờ phê duyệt, thiếu nhân lực...\" required style=\"margin-top:5px;\"></textarea><br/>
        <button type=\"submit\" class=\"btn-tamdung\" style=\"margin-top:10px;\">⏸ TẠM DỪNG HỒ SƠ</button>
    </form>
    <script>
    function confirmTamdungEdit() {
        var lydo = document.getElementById('lydo_tamdung_edit').value.trim();
        if (lydo === '') {
            alert('Vui lòng nhập lý do tạm dừng!');
            return false;
        }
        return confirm('Bạn có chắc muốn tạm dừng hồ sơ này?\\n\\nLý do: ' + lydo + '\\n\\nHồ sơ sẽ được đánh dấu là đang tạm dừng.');
    }
    </script>";
}
echo "</div>";
