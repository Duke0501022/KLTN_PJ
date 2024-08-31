
<?php
include_once("Controller/cInfo.php");

$username = isset($_SESSION['username']) ? $_SESSION['username'] : null;
$info = new cInfo();
$result = $info->select_info($username);
?>

<body>
<style>
    .user-info {
    margin-top: 50px;
}

.user-image-container {
    display: flex;
    flex-direction: column;
    align-items: center;
    margin-right: 40px; /* Khoảng cách giữa hình ảnh và thông tin */
    padding: 10px;
    border-radius: 15px; /* Bo góc hình ảnh */
    overflow: hidden;
    background-color: transparent;
}

.user-image {
    width: 250px;
    height: 150px;
    object-fit: cover;
    border-radius: 15px;
}

.user-details {
    display: flex;
    flex-direction: column;
    justify-content: center;
    border-left: 2px solid #ddd; /* Đường phân cách giữa hình ảnh và thông tin */
    padding-left: 30px; /* Khoảng cách giữa hình ảnh và thông tin */
    text-align: center; /* Căn giữa văn bản */
}

.user-details h5 {
    margin-top: 0;
    margin-bottom: 5px;
}

.user-details p {
    margin-bottom: 5px;
}

.edit-btn {
    margin-top: 20px;
}

.modal-body form {
    margin-bottom: 0;
}

.modal-body form .form-group {
    margin-bottom: 10px;
}

.modal-body form .form-group label {
    display: block;
    margin-bottom: 5px;
}

.modal-body form .form-group input, 
.modal-body form .form-group select {
    width: 100%;
    padding: 10px;
    box-sizing: border-box;
}

    </style>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">
                    <h2>Thông tin tài khoản</h2>
                </div>
                <div class="card-body">
                        <?php
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo '<div class="d-flex align-items-start">';
                                echo '<div class="user-image-container">';
                                echo "<img src='admin/admin/assets/uploads/images/" . $row['hinhAnh'] . "' alt='' class='user-image'>";
                                echo "<br>";
                                echo '<h5>' . $row["hoTen"] . '</h5>';  // Name under the image
                                echo '</div>';
                                echo '<div class="user-details">';
                                echo '<p>Giới tính: ' . ($row["gioiTinh"] == 0 ? "Nam" : "Nữ") . '</p>';
                                echo '<p>Số điện thoại: ' . $row["soDienThoai"] . '</p>';
                                echo '<p>Email: ' . $row["email"] . '</p>';
                                echo '<p>Username: ' . $row["username"] . '</p>';
                                echo '</div>';
                                echo '</div>';
                                // Add the row to the form scope
                                $formRow = $row;
                            }
                        } else {
                            echo "0 results";
                        }
                        ?>
                    </div>
                <div class="card-footer text-center">
                    <button type="button" class="btn btn-primary edit-btn" data-toggle="modal" data-target="#editModal">Sửa thông tin</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Sửa thông tin</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="username">Username:</label>
        <input type='text' class='form-control' name='username' value="<?php echo isset($formRow["username"]) ? $formRow["username"] : ''; ?>" readonly>
    </div>
    <div class="form-group">
        <label for="hoTen">Họ tên:</label>
        <input type="text" class="form-control" id="hoTen" name="hoTen" value="<?php echo isset($formRow["hoTen"]) ? $formRow["hoTen"] : ''; ?>">
    </div>
    <div class="form-group">
        <label for="gioiTinh">Giới tính:</label>
        <select class="form-control" id="gioiTinh" name="gioiTinh">
            <option value="0" <?php echo isset($formRow["gioiTinh"]) && $formRow["gioiTinh"] == 0 ? 'selected' : ''; ?>>Nam</option>
            <option value="1" <?php echo isset($formRow["gioiTinh"]) && $formRow["gioiTinh"] == 1 ? 'selected' : ''; ?>>Nữ</option>
        </select>
    </div>
    <div class="form-group">
        <label for="soDienThoai">Số điện thoại:</label>
        <input type="text" class="form-control" id="soDienThoai" name="soDienThoai" value="<?php echo isset($formRow["soDienThoai"]) ? $formRow["soDienThoai"] : ''; ?>">
    </div>
    <div class="form-group">
        <label for="hinhAnh">Hình ảnh:</label>
        <input type="file" class="form-control" id="hinhAnh" name="txtHinhAnh">
    </div>
    <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" class="form-control" id="email" name="email" value="<?php echo isset($formRow["email"]) ? $formRow["email"] : ''; ?>">
    </div>
    <button type="submit" class="btn btn-primary" name="send">Lưu thay đổi</button>
</form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

<?php
if (isset($_POST["send"])) {
    $username = $_POST['username'];
    $hoTen = $_POST['hoTen'];
    $gioiTinh = $_POST['gioiTinh'];
    $soDienThoai = $_POST['soDienThoai'];
    $email = $_POST['email'];
    $hinhAnh = NULL;

    if (isset($_FILES['txtHinhAnh']) && $_FILES['txtHinhAnh']['size'] > 0) {
        $target_dir = "admin/admin/assets/uploads/images/";
        $target_file = $target_dir . basename($_FILES["txtHinhAnh"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        $check = getimagesize($_FILES["txtHinhAnh"]["tmp_name"]);
        if ($check !== false) {
            $uploadOk = 1;
        } else {
            echo "<script>alert('File không phải là hình ảnh.');</script>";
            $uploadOk = 0;
        }

        if ($_FILES["txtHinhAnh"]["size"] > 5000000) {
            echo "<script>alert('Xin lỗi, hình ảnh quá lớn.');</script>";
            $uploadOk = 0;
        }

        if ($uploadOk == 0) {
            echo "<script>alert('Xin lỗi, hình ảnh của bạn không được tải lên.');</script>";
        } else {
            if (move_uploaded_file($_FILES["txtHinhAnh"]["tmp_name"], $target_file)) {
                $hinhAnh = basename($_FILES["txtHinhAnh"]["name"]);
            } else {
                echo "<script>alert('Xin lỗi, đã có lỗi xảy ra khi tải lên file.');</script>";
            }
        }
    }

    $success = $info->update_info2($username, $hoTen, $gioiTinh, $soDienThoai, $hinhAnh, $email);

    if ($success) {
       
        echo "<script>alert('Cập nhật thành công');</script>";
        echo "<script>window.location.href='?info'</script>";
    } else {
        echo "<script>alert('Cập nhật không thành công');</script>";
    }
}
?>
