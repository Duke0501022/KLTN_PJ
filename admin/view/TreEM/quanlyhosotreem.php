<?php

include_once("controller/TreEm/cTreEm.php");
// session_start();

$p = new cHoSoTreEm();

// Lấy danh sách trẻ em theo username từ session
$table = $p->select_treem();

?>
<!-- Content Wrapper. Contains page content -->
<style>
    .rounded-image {
        border-radius: 10px;
        /* Bo góc hình ảnh */
        object-fit: cover;
        /* Đảm bảo hình ảnh được căn chỉnh và không bị vặn */
        transition: transform 0.3s ease;
        /* Hiệu ứng khi di chuột qua */
    }

    .rounded-image:hover {
        transform: scale(1.1);
        /* Phóng to hình ảnh khi di chuột qua */
    }
</style>

<body>

    <!-- Content Wrapper -->
    <div class="content-wrapper">

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Danh sách thông tin trẻ em</h3> <a href="?addtreem">Thêm trẻ em mới</a>
                                <div class="card-tools">
                                    <div class="input-group input-group-sm" style="width: 150px;">
                                        <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-default">
                                                <i class="fas fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                        <tr>
                                            <th style="text-align:center">STT</th>
                                            <th style="text-align:center">Mã hồ sơ</th>
                                            <th style="text-align:center">Họ tên trẻ em</th>
                                            <th style="text-align:center">Ngày sinh</th>
                                            <th style="text-align:center">Trẻ được sinh vào thai kỳ thứ</th>
                                            <th style="text-align:center">Tình trạng</th>
                                            <th style="text-align:center">Kết quả đánh giá</th>
                                            <th style="text-align:center">Tài khoản phụ huynh</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if ($table) {
                                            $stt = 1;
                                            if (mysqli_num_rows($table) > 0) {
                                                while ($row = mysqli_fetch_assoc($table)) {
                                                    echo "<tr>";
                                                    echo "<td style='text-align:center'>" . $stt++ . "</td>"; // Tăng giá trị của biến đếm và hiển thị nó
                                                    echo "<td style='text-align:center'>" . $row['idHoSo'] . "</td>";
                                                    echo "<td style='text-align:center'>" . $row['hoTen'] . "</td>";
                                                    echo "<td style='text-align:center'>" . $row['ngaySinh'] . "</td>";
                                                    echo "<td style='text-align:center'>" . $row['thaiKy'] . "</td>";
                                                    echo "<td style='text-align:center'>" . $row['tinhTrang'] . "</td>";
                                                    echo "<td style='text-align:center'>" . $row['noiDungKetQua'] . "</td>";
                                                    echo "<td style='text-align:center'>" . $row['username'] . "</td>";
                                                    echo "<td style='text-align:center'><a href='?updatetreem&&idHoSo=" . $row['idHoSo'] . "'><i class='fa fa-pen' aria-hidden='true'></i></a> | <a href='?deltreem&&idHoSo=" . $row['idHoSo'] . "' onclick='return confirm_delete();'><i class='fa fa-trash' aria-hidden='true'></i></a></td>";
                                                    echo "</tr>";
                                                }
                                            }
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- JavaScript -->
    <script>
        function confirm_delete() {
            return confirm('Bạn có chắc chắn muốn xóa?');
        }
    </script>
</body>
<!-- /.content-wrapper -->