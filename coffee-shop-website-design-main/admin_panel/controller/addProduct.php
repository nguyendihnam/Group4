<?php
include_once 'dbconnect.php';

// Kiểm tra nếu có dữ liệu gửi lên
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_product'])) {
    // Lấy dữ liệu từ form
    $name = $_POST['name'];
    $categoryID = $_POST['category_id'];
    $description = $_POST['description'];
    $createdDate = date('Y-m-d H:i:s');
    $updatedDate = date('Y-m-d H:i:s');

    // Thêm dữ liệu vào cơ sở dữ liệu
    $sql = "INSERT INTO products (CategoryID, Name, Description, CreatedDate, UpdatedDate) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("issss", $categoryID, $name, $description, $createdDate, $updatedDate);
    if ($stmt->execute()) {
        echo "Thêm sản phẩm thành công.";
    } else {
        echo "Lỗi: Không thể thêm sản phẩm. Vui lòng thử lại.";
    }
    $stmt->close();
}
?>
