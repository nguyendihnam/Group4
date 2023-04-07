<?php
include 'dbconnect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $categoryID = $_POST["categoryID"];
    $name = $_POST["name"];
    $thumbnail = $_POST["thumbnail"];
    $description = $_POST["description"];
    $createdDate = $_POST["createdDate"];
    $updatedDate = $_POST["updatedDate"];
    $deleted = $_POST["deleted"];
    $image = $_POST["image"];
    $s = $_POST["s"];
    $m = $_POST["m"];
    $l = $_POST["l"];

    $stmt = $conn->prepare("UPDATE Product SET CategoryID=?, Name=?, Thumbnail=?, Description=?, CreatedDate=?, UpdatedDate=?, Deleted=?, Image=?, S=?, M=?, L=? WHERE ID=?");
    $stmt->bind_param("isssssbssiiii", $categoryID, $name, $thumbnail, $description, $createdDate, $updatedDate, $deleted, $image, $s, $m, $l, $id);

    if ($stmt->execute()) {
        echo "Sửa sản phẩm thành công!";
    } else {
        echo "Sửa sản phẩm thất bại: " . $stmt->error;
    }
    $stmt->close();
}
$conn->close();
?>
