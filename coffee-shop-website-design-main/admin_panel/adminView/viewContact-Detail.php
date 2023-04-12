<?php
		 
	include_once '../config/dbconnect.php';
	
	// if (isset($_REQUEST['id'])) {
			
	// 	$id = intval($_REQUEST['id']);
	// 	$query = "SELECT * FROM contact WHERE ID=:id";
	// 	$stmt = $DBcon->prepare( $query );
	// 	$stmt->execute(array(':id'=>$id));
	// 	$row=$stmt->fetch(PDO::FETCH_ASSOC);
	// 	extract($row);	
    if (isset($_REQUEST['id'])) {

        $id = mysqli_real_escape_string($conn, $_REQUEST['id']);
        $query = "SELECT * FROM contact WHERE ID=?";
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, "i", $id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $row = mysqli_fetch_assoc($result);	

        if ($row) {
?>
			
            <form enctype='multipart/form-data' method="POST">
            <div class="form-group">
                <label for="c_name">Name:</label>
                <input type="text" class="form-control" value="<?= $row['Name'] ?>" readonly>
            </div>
            <div class="form-group">
                <label for="c_name">Email:</label>
                <input type="text" class="form-control" value="<?= $row['Email'] ?>" readonly>
            </div>
            <div class="form-group">
                <label for="c_name">PhoneNumber:</label>
                <input type="text" class="form-control" value="<?= $row['PhoneNumber'] ?>" readonly>
            </div>
            <div class="form-group">
                <label for="c_name">Subject Name:</label>
                <input type="text" class="form-control" value="<?= $row['SubjectName'] ?>" readonly>
            </div>
            <div class="form-group">
                <label for="c_name">Message:</label>
                <textarea class="form-control" cols="30" rows="10" readonly><?= $row['Message'] ?></textarea>
            </div>
        </form>
    <?php
        } else {
            echo "Record not found.";
        }			
    }