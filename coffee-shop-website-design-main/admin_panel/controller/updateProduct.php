<?php
include_once 'dbconnect.php';

// Kiểm tra nếu có dữ liệu gửi lên
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update_product'])) {
    // Lấy dữ liệu từ form
    $id = $_POST['id'];
    $name = $_POST['name'];
    $categoryID = $_POST['category_id'];
    $description = $_POST['description'];
    $updatedDate = date('Y-m-d H:i:s');

    // Cập nhật dữ liệu sản phẩm trong cơ sở dữ liệu
    $sql = "UPDATE products SET CategoryID = ?, Name = ?, Description = ?, UpdatedDate = ? WHERE ProductID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("isssi", $categoryID, $name, $description, $updatedDate, $id);
    if ($stmt->execute()) {
        echo "Cập nhật sản phẩm thành công.";
    } else {
        echo "Lỗi: Không thể cập nhật sản phẩm. Vui lòng thử lại.";
    }
    $stmt->close();
}
?>
