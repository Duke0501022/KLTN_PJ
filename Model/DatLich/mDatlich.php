
<?php
include_once("Model/Connect.php");
    class mDatlich {
        public function select_lich($id_khoa)
    {
        $p = new clsketnoi();
        $conn = $p->ketnoiDB($conn); // Thêm $conn vào đây
        if ($conn) { // Kiểm tra kết nối
            $string = "SELECT * FROM khoa WHERE  id_khoa = '$id_khoa'";
            $table = mysqli_query($conn, $string);
            $p->dongketnoi($conn);
            return $table;
        } else {
            return false;
        }
    }

        
    }
?>
