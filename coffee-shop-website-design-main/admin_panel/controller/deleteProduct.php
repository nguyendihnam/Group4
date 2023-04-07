<?php
include_once 'dbconnect.php';

// Kiểm tra nếu có dữ liệu gửi lên
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete_product'])) {
    // Lấy dữ liệu từ form
    $id = $_POST['id'];

    // Xóa sản phẩm trong cơ sở dữ liệu
    $sql = "DELETE FROM products WHERE ProductID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    if ($stmt->execute()) {
        echo "Xóa sản phẩm thành công.";
    } else {
        echo "Lỗi: Không thể xóa sản phẩm. Vui lòng thử lại
        .";
    }
    $stmt->close();
}
?>
