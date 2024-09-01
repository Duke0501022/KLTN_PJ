<?php

include_once("controller/LichDay/cLichDay.php");
include_once("Controller/GiaoVien/cGiaoVien.php");


$order = new  cGV();
$menu = new cLichDay();

$date =  new DateTime();
$date = $date->format('Y-m-d');


$ngayXemLich = $date;






$monday = strtotime('this week monday');
$thu2 = date('d/m/Y', $monday);

$tuesday = strtotime('this week tuesday');
$thu3  = date('d/m/Y', $tuesday);

$thursday = strtotime('this week wednesday');
$thu4  = date('d/m/Y', $thursday);

$thursday = strtotime('this week thursday');
$thu5  = date('d/m/Y', $thursday);

$friday = strtotime('this week friday');
$thu6  = date('d/m/Y', $friday);

$saturday = strtotime('this week saturday');
$thu7  = date('d/m/Y', $saturday);

$sunday = strtotime('this week sunday');
$thu8  = date('d/m/Y', $sunday);
if (!isset($_SESSION['t2'])) {

    $_SESSION['t2']  = $thu2;
    $_SESSION['t3']  = $thu3;
    $_SESSION['t4']  = $thu4;
    $_SESSION['t5']  = $thu5;
    $_SESSION['t6']  = $thu6;
    $_SESSION['t7']  = $thu7;
    $_SESSION['t8']  = $thu8;
}

if (isset($_POST['next'])) {
    $t2 = DateTime::createFromFormat('d/m/Y', $_SESSION['t2']);
    $t3 = DateTime::createFromFormat('d/m/Y', $_SESSION['t3']);
    $t4 = DateTime::createFromFormat('d/m/Y', $_SESSION['t4']);
    $t5 = DateTime::createFromFormat('d/m/Y', $_SESSION['t5']);
    $t6 = DateTime::createFromFormat('d/m/Y', $_SESSION['t6']);
    $t7 = DateTime::createFromFormat('d/m/Y', $_SESSION['t7']);
    $t8 = DateTime::createFromFormat('d/m/Y', $_SESSION['t8']);

    $t2->modify('+7 days');
    $t3->modify('+7 days');
    $t4->modify('+7 days');
    $t5->modify('+7 days');
    $t6->modify('+7 days');
    $t7->modify('+7 days');
    $t8->modify('+7 days');

    $_SESSION['t2'] = $t2->format('d/m/Y');
    $_SESSION['t3'] = $t3->format('d/m/Y');
    $_SESSION['t4'] = $t4->format('d/m/Y');
    $_SESSION['t5'] = $t5->format('d/m/Y');
    $_SESSION['t6'] = $t6->format('d/m/Y');
    $_SESSION['t7'] = $t7->format('d/m/Y');
    $_SESSION['t8'] = $t8->format('d/m/Y');


    $ngayXemLich  = $t2->format('Y-m-d');
} elseif (isset($_POST['prev'])) {
    $t2 = DateTime::createFromFormat('d/m/Y', $_SESSION['t2']);
    $t3 = DateTime::createFromFormat('d/m/Y', $_SESSION['t3']);
    $t4 = DateTime::createFromFormat('d/m/Y', $_SESSION['t4']);
    $t5 = DateTime::createFromFormat('d/m/Y', $_SESSION['t5']);
    $t6 = DateTime::createFromFormat('d/m/Y', $_SESSION['t6']);
    $t7 = DateTime::createFromFormat('d/m/Y', $_SESSION['t7']);
    $t8 = DateTime::createFromFormat('d/m/Y', $_SESSION['t8']);

    $t2->modify('-7 days');
    $t3->modify('-7 days');
    $t4->modify('-7 days');
    $t5->modify('-7 days');
    $t6->modify('-7 days');
    $t7->modify('-7 days');
    $t8->modify('-7 days');

    $_SESSION['t2'] = $t2->format('d/m/Y');
    $_SESSION['t3'] = $t3->format('d/m/Y');
    $_SESSION['t4'] = $t4->format('d/m/Y');
    $_SESSION['t5'] = $t5->format('d/m/Y');
    $_SESSION['t6'] = $t6->format('d/m/Y');
    $_SESSION['t7'] = $t7->format('d/m/Y');
    $_SESSION['t8'] = $t8->format('d/m/Y');

    $ngayXemLich  = $t2->format('Y-m-d');
} elseif (isset($_POST['current'])) {
    $_SESSION['t2'] = $thu2;
    $_SESSION['t3'] = $thu3;
    $_SESSION['t4'] = $thu4;
    $_SESSION['t5'] = $thu5;
    $_SESSION['t6'] = $thu6;
    $_SESSION['t7'] = $thu7;
    $_SESSION['t8'] = $thu8;
}

$t2 = $_SESSION['t2'];
$t3 = $_SESSION['t3'];
$t4 = $_SESSION['t4'];
$t5 = $_SESSION['t5'];
$t6 = $_SESSION['t6'];
$t7 = $_SESSION['t7'];
$t8 = $_SESSION['t8'];







?>

<style>
    .calendar [type="submit"] {
        padding: 8px 10px;
        font-weight: 600;
        background-color: #1da1f2;
        color: #fff;
        border-radius: 5px;
        border: none;
        font-size: 14px;

    }

    .calendar td p a {

        color: #000;
        padding: 5px;
        font-size: 12px;
        margin-left: 10px;



    }

    .calendar td .delete {
        padding: 0px 10px;
    }

    .calendarDish {
        margin-left: auto;
        margin-right: auto;
        border: 1px solid;
        width: 60%;
        margin-top: 20px;
        min-height: 125px;
        padding: 10px;
    }

    .calendarDish img {
        width: 100%;
        height: 100px;
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
    margin: 0;
    font-family: Arial, sans-serif;
    background-color: #f4f4f9;
}

.content-wrapper {
    flex: 1 0 auto;
    padding: 20px;
}

.header, .footer {
    background-color: #343a40;
    color: #fff;
    text-align: center;
    padding: 10px;
}

.footer {
    position: fixed;
    bottom: 0;
    width: 100%;
}

.card {
    margin: 20px 0;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0,0,0,0.1);
}

.card-header {
    background-color: #007bff;
    color: #fff;
    padding: 15px;
    border-bottom: 1px solid #dee2e6;
}

.card-body {
    padding: 20px;
}

.calendar {
    margin-bottom: 20px;
}

.calendar form {
    display: flex;
    align-items: center;
    margin-bottom: 20px;
}

.calendar [type="date"] {
    margin-right: 10px;
    padding: 6px;
    border-radius: 4px;
    border: 1px solid #ced4da;
}

.calendar [type="submit"] {
    padding: 10px 15px;
    font-weight: 600;
    background-color: #007bff;
    color: #fff;
    border-radius: 5px;
    border: none;
    font-size: 14px;
    margin-right: 5px;
    cursor: pointer;
    transition: background-color 0.3s;
}

.calendar [type="submit"]:hover {
    background-color: #0056b3;
}

.calendartable {
    width: 100%;
    border-collapse: collapse;
}

.calendartable th, .calendartable td {
    border: 1px solid #dee2e6;
    padding: 15px;
    text-align: center;
    vertical-align: top;
}

.calendartable th {
    background-color: #007bff;
    color: #fff;
}

.calendarDish {
    border: 1px solid #dee2e6;
    border-radius: 5px;
    background-color: #fff;
    box-shadow: 0 1px 3px rgba(0,0,0,0.1);
    padding: 10px;
    margin: 10px 0;
}

.calendarDish a {
    color: #007bff;
    text-decoration: none;
    font-weight: 600;
}

.calendarDish a:hover {
    text-decoration: underline;
}

.btn-danger {
    background-color: #dc3545;
    border-color: #dc3545;
    font-size: 12px;
}

.btn-danger:hover {
    background-color: #c82333;
    border-color: #bd2130;
}

footer p {
    margin: 0;
    font-size: 14px;
}

@media (max-width: 768px) {
    .calendar [type="date"] {
        width: 100%;
        margin-bottom: 10px;
    }
    
    .calendar [type="submit"] {
        width: 100%;
        margin: 5px 0;
    }
    
    .calendartable th, .calendartable td {
        padding: 10px;
    }
    
    .calendarDish {
        margin: 10px 0;
    }
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
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Lịch Giảng Dạy Tuần</h3>
                            </div>    
        <div class="card-body">

                <form action="" method="post">
                    <input type="date" id="selectedDate" name="date" value="<?php echo $ngayXemLich ?>">
                    <input type="submit" value="Trở về" name="prev">
                    <input type="submit" value="Hiện tại" name="current">
                    <input type="submit" value="Tiếp" name="next">
                </form>


    <div>
        <table class="calendartable">
            <tr>


                <th id="day">Thứ 2 <?php echo $t2;  ?></th>


                <th id="day">Thứ 3 <?php echo $t3; ?></th>


                <th id="day">Thứ 4 <?php echo $t4; ?></th>


                <th id="day">Thứ 5 <?php echo $t5; ?></th>


                <th id="day">Thứ 6 <?php echo $t6; ?></th>


                <th id="day">Thứ 7 <?php echo $t7; ?></th>


                <th id="day">Chủ nhật <?php echo $t8; ?></th>






            </tr>
            <tr>
                <td>
                    <?php
                    $newDate = date_format(date_create_from_format('d/m/Y', $t2), 'Y-m-d');
                    $list_menu = $menu->getMenuByDate($newDate);
                    if (!empty($list_menu)) {
                        foreach ($list_menu as $item) { ?>
                            <div class="calendarDish">
                         
                                <a><?php echo $item['hoTen'] ?></a>
                                <br>
                                <button class="btn btn-danger delete"> <a class="text-light" href="admin.php?mod=DeleteDishMenu&idLichGD=<?php echo $item['idLichGD'] ?>&idGiaoVien=<?php echo $item['idGiaoVien'] ?>&ngayLenMon=<?php echo $item['ngayTao'] ?>">Xóa</a></button>
                            </div>
                    <?php  }
                    } ?>
                </td>
                <td>
                    <?php
                    $newDate = date_format(date_create_from_format('d/m/Y', $t3), 'Y-m-d');
                    $list_menu = $menu->getMenuByDate($newDate);
                    if (!empty($list_menu)) {
                        foreach ($list_menu as $item) { ?>
                            <div class="calendarDish">
                          
                                <a><?php echo $item['hoTen'] ?></a>
                                <br>
                                <button class="btn btn-danger delete"> <a class="text-light" href="admin.php?mod=DeleteDishMenu&idLichGD=<?php echo $item['idLichGD'] ?>&idGiaoVien=<?php echo $item['idGiaoVien'] ?>&ngayLenMon=<?php echo $item['ngayTao'] ?>">Xóa</a></button>
                            </div>
                    <?php  }
                    } ?>
                </td>

                <td>
                    <?php
                    $newDate = date_format(date_create_from_format('d/m/Y', $t4), 'Y-m-d');
                    $list_menu = $menu->getMenuByDate($newDate);
                    if (!empty($list_menu)) {
                        foreach ($list_menu as $item) { ?>
                            <div class="calendarDish">
                           
                                <a><?php echo $item['hoTen'] ?></a>
                                <br>
                                <button class="btn btn-danger delete"> <a class="text-light" href="admin.php?mod=DeleteDishMenu&idLichGD=<?php echo $item['idLichGD'] ?>&idGiaoVien=<?php echo $item['idGiaoVien'] ?>&ngayLenMon=<?php echo $item['ngayTao'] ?>">Xóa</a></button>
                            </div>
                    <?php  }
                    } ?>
                </td>

                <td>
                    <?php
                    $newDate = date_format(date_create_from_format('d/m/Y', $t5), 'Y-m-d');
                    $list_menu = $menu->getMenuByDate($newDate);
                    if (!empty($list_menu)) {
                        foreach ($list_menu as $item) { ?>
                            <div class="calendarDish">
                           
                                <a><?php echo $item['hoTen'] ?></a>
                                <br>
                                <button class="btn btn-danger delete"> <a class="text-light" href="admin.php?mod=DeleteDishMenu&idLichGD=<?php echo $item['idLichGD'] ?>&idGiaoVien=<?php echo $item['idGiaoVien'] ?>&ngayLenMon=<?php echo $item['ngayTao'] ?>">Xóa</a></button>
                            </div>
                    <?php  }
                    } ?>
                </td>

                <td>
                    <?php
                    $newDate = date_format(date_create_from_format('d/m/Y', $t6), 'Y-m-d');
                    $list_menu = $menu->getMenuByDate($newDate);
                    if (!empty($list_menu)) {
                        foreach ($list_menu as $item) { ?>
                            <div class="calendarDish">
                           
                                <a><?php echo $item['hoTen'] ?></a>
                                <br>
                                <button class="btn btn-danger delete"> <a class="text-light" href="admin.php?mod=DeleteDishMenu&idLichGD=<?php echo $item['idLichGD'] ?>&idGiaoVien=<?php echo $item['idGiaoVien'] ?>&ngayLenMon=<?php echo $item['ngayTao'] ?>">Xóa</a></button>
                            </div>
                    <?php  }
                    } ?>
                </td>

                <td>
                    <?php
                    $newDate = date_format(date_create_from_format('d/m/Y', $t7), 'Y-m-d');
                    $list_menu = $menu->getMenuByDate($newDate);
                    if (!empty($list_menu)) {
                        foreach ($list_menu as $item) { ?>
                            <div class="calendarDish">
                          
                                <a><?php echo $item['hoTen'] ?></a>
                                <br>
                                <button class="btn btn-danger delete"> <a class="text-light" href="admin.php?mod=DeleteDishMenu&idLichGD=<?php echo $item['idLichGD'] ?>&idGiaoVien=<?php echo $item['idGiaoVien'] ?>&ngayLenMon=<?php echo $item['ngayTao'] ?>">Xóa</a></button>
                            </div>
                    <?php  }
                    } ?>
                </td>

                <td>
                    <?php
                    $newDate = date_format(date_create_from_format('d/m/Y', $t8), 'Y-m-d');
                    $list_menu = $menu->getMenuByDate($newDate);
                    if (!empty($list_menu)) {
                        foreach ($list_menu as $item) { ?>
                            <div class="calendarDish">
                                
                                <a><?php echo $item['hoTen'] ?></a>
                                <br>
                                <button class="btn btn-danger delete"> <a class="text-light" href="admin.php?mod=DeleteDishMenu&idLichGD=<?php echo $item['idLichGD'] ?>&idGiaoVien=<?php echo $item['idGiaoVien'] ?>&ngayLenMon=<?php echo $item['ngayTao'] ?>">Xóa</a></button>
                            </div>
                    <?php  }
                    } ?>
                </td>

            </tr>
        </table >
        
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
if (isset($_REQUEST['next'])) {
    $date =  new DateTime();
    $date = $date->modify('+7 days');
}


?>


<script>
    document.getElementById('selectedDate').addEventListener('change', function() {
        document.querySelector('form').submit();
    });
</script>