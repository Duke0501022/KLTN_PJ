<?php
include_once("controller/LichDay/cLichDay.php");
include_once("Controller/GiaoVien/cGiaoVien.php");

$p = new cGV();
$menu = new cLichDay();
$list_loai  = $p->getAllGV();
$LatestMenu = $menu->getLatestMenu();
$list_menu = $menu->getAlltMenu();


?>
<style>
    .form-container {
        display: none;
    }
</style>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lịch Giảng Dạy</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        body {
    display: flex;
    flex-direction: column;
    min-height: 100vh;
    padding-bottom: 60px; /* Đảm bảo không bị che bởi footer */
    font-family: Arial, sans-serif;
    background-color: #f4f4f9;
}

.content-wrapper {
    flex: 1 0 auto;
    padding: 20px;
}

h1, h2 {
    color: #343a40;
}

h1 {
    margin-bottom: 20px;
}

h2 {
    margin-top: 20px;
    margin-bottom: 15px;
}

.card-body {
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    padding: 20px;
}

.table {
    width: 100%;
    border-collapse: collapse;
}

.table th, .table td {
    border: 1px solid #dee2e6;
    padding: 12px;
    text-align: center;
}

.table th {
    background-color: #f8f9fa;
}

.table td p a {
    color: #007bff;
    text-decoration: none;
    padding: 5px;
}

.table td p a:hover {
    text-decoration: underline;
}

.form-container {
    display: none;
}

.upload {
    margin-bottom: 20px;
}

.upload form {
    display: table;
    width: 100%;
}

.upload form th {
    text-align: left;
    padding-right: 15px;
}

.upload form input[type="date"] {
    padding: 6px;
    border-radius: 4px;
    border: 1px solid #ced4da;
}

.upload form input[type="submit"],
.upload form input[type="reset"] {
    padding: 10px 15px;
    font-weight: 600;
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 14px;
    margin: 5px;
    transition: background-color 0.3s;
}

.upload form input[type="submit"]:hover,
.upload form input[type="reset"]:hover {
    background-color: #0056b3;
}

.upload form .show-form {
    margin-right: 20px;
    float: right;
}

.calendarDish {
    border: 1px solid #dee2e6;
    border-radius: 5px;
    background-color: #fff;
    box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
    padding: 10px;
    margin: 10px 0;
}

.calendarDish label {
    display: block;
    margin-bottom: 5px;
}

.calendarDish a {
    color: #007bff;
    text-decoration: none;
}

.calendarDish a:hover {
    text-decoration: underline;
}

.btn-danger {
    background-color: #dc3545;
    border-color: #dc3545;
    font-size: 14px;
    color: #fff;
    border-radius: 4px;
    padding: 8px 12px;
    text-align: center;
}

.btn-danger:hover {
    background-color: #c82333;
    border-color: #bd2130;
}

footer {
    background-color: #343a40;
    color: #fff;
    text-align: center;
    padding: 15px;
    position: fixed;
    bottom: 0;
    width: 100%;
    font-size: 14px;
}
    </style>
</head>

<body>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Lịch Giảng Dạy</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                            <li class="breadcrumb-item active">Lịch Giảng Dạy</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <div class="card-body">
    <div class="upload">
        <h2 class="mt-4 m-3">Thêm giáo viên vào lịch</h2>
        <table class="admin_upload">
            <form action="" method="post">
                <tr>
                    <th>Chọn ngày lên lịch giảng dạy:</th>
                    <th><input type="date" name="date" id="date" value="<?php if (isset($_POST['date'])) echo $_POST['date'] ?>" required>
                        <input style="display: none;" type="submit" value="Submit" id="submitBtn" name="sub_date">
                    </th>
                </tr>
                <tr>
                    <th>Chọn giáo viên </th>
                    <th>
                        <div style="display: flex; flex-wrap:wrap">

                            <?php
                                if (isset($_POST['date'])) {
                                    $ngay = $_POST['date'];
                                    $date = new DateTime($ngay);
                                    $date = $date->format('Y-m-d H:i:s');
                                    
                                    $ngaymoi = (new DateTime($ngay))->modify('+1 day')->format('Y-m-d');
                                    $thu = date('l', strtotime($date));
                                    
                                    if ($thu == 'Monday') {
                                        $ngaycu = (new DateTime($ngay))->modify('-3 day')->format('Y-m-d');
                                    } else {
                                        $ngaycu = (new DateTime($ngay))->modify('-1 day')->format('Y-m-d');
                                    }
                                    
                                    $menu = new cLichDay();
                                    $cu = $menu->getMenuByDate($ngaycu);
                                    $moi = $menu->getMenuByDate($ngaymoi);
                                    $today = $menu->getMenuByDate($date);
                                    
                                    $ngayHientai = (new DateTime())->format('Y-m-d H:i:s');
                                    
                                    if ($thu == 'Saturday' || $thu == 'Sunday') {
                                        echo "<script>alert('Không được lên lịch cuối tuần')</script>";
                                    } elseif ($date <= $ngayHientai) {
                                        echo "<script>alert('Chỉ được phép lên lịch cho thời gian sau ngày hôm nay!')</script>";
                                    } else {
                                        // Display teachers
                                        foreach ($list_loai as $index => $giaovien) {
                                            $found = true;
                                            
                                            if (!empty($cu)) {
                                                foreach ($cu as $item) {
                                                    if ($giaovien['idGiaoVien'] == $item['idGiaoVien']) {
                                                        $found = false;
                                                    }
                                                }
                                            }
                                            
                                            if (!empty($moi)) {
                                                foreach ($moi as $item) {
                                                    if ($giaovien['idGiaoVien'] == $item['idGiaoVien']) {
                                                        $found = false;
                                                    }
                                                }
                                            }
                                            if (!empty($today)) {
                                                foreach ($today as $item) {
                                                    if ($giaovien['idGiaoVien'] == $item['idGiaoVien']) {
                                                        $found = false;
                                                    }
                                                }
                                            }
                                            
                                            if ($found) {
                                                ?>
                                                <div style="border-radius: 5px; padding:5px; margin: 5px 5px; border:1px solid; width:150px" class="dish_mon">
                                                    <label for="checkbox<?php echo $index ?>"><?php echo $giaovien['hoTen'] ?></label>
                                                    <input type="checkbox" class="show-form" data-form="form<?php echo $index ?>" id="checkbox<?php echo $index ?>" style="margin-right:20px; float: right; margin-top: 5px;" name="giaovien[]" value="<?php echo $giaovien['idGiaoVien'] ?>">
                                                </div>
                                                <?php
                                            }
                                        }
                                    }
                                }
                           
                            ?>
                        </div>
                    </th>
                </tr>




                <tr>

                    <td>


                    </td>
                    <td>
                        <input type="submit" value="Thêm" id="submit" name="btn_addmenu" onclick="return validateCheckbox()">
                        <input type="reset" value="Hủy" id="reset" name="" >


                    </td>
                </tr>

                <tr>
                    <?php
                    // Xử lý insert thêm thực đơn khi chọn ngày
                    $menu = new cLichDay();
                    if (isset($_POST['sub_date'])) {
                        if (isset($_POST['date'])) {
                            $isAllowed = true;

                            if (!empty($list_menu)) {
                                foreach ($list_menu as $index => $item) {
                                    $as = (new DateTime($item['ngayTao']))->format('Y-m-d');

                                    if ($_POST['date'] == $as) {
                                        $isAllowed = false;
                                        break;
                                    }
                                }
                            }
                            if ($isAllowed && $_POST['date'] >  $ngayHientai  && $thu != 'Saturday' && $thu != 'Sunday') {
                                $ngayTao = (new DateTime($_POST['date']))->format('Y-m-d H:i:s');
                                $menu->InsertMenu($ngayTao);
                            } else {
                                $isAllowed = false;
                            }
                        }
                    }



                    ?>

                </tr>
            </form>
        </table>
        </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

  

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
<?php
//Thêm món ăn và idThucDon và chitietthucdon


if (isset($_POST['btn_addmenu'])) {
    $idGiaoVien = array();
    $idGiaoVien =  $_POST['giaovien'];
    $ngayTao = $_POST['date'];

    $menu = new cLichDay();
    $LichGD = $menu->getOneMenuByDate($ngayTao);
    $idLichGD =  $LichGD['idLichGD'];
   
    $ins = $menu->InsertMenuDetails($idLichGD, $idGiaoVien);
    if ($ins == 1) {
        echo '<script>alert("thêm món thành công")</script>';
        echo header("refresh: 0; url='?qlgd'");
    } else {
        echo '<script>alert("thêm món thất bại")</script>';
    }
}


?>