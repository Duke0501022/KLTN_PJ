<?php

include_once("Model/Connect.php");

class mHoSoTreEM
{
    //--------------THỐNG KÊ
    //
    #thống kê số lượng trẻ em
    public function count_te()
    {

        $p = new clsketnoi();
        if ($p->ketnoiDB($conn)) {
            $string = "SELECT count(*) FROM hosotreem";
            $table = mysqli_query($conn, $string);
            $p->dongketnoi($conn);
            //
            return $table;
        } else {
            return false;
        }
    }
    //
    public function select_treem()
    {
        $p = new clsketnoi();
        if ($p->ketnoiDB($conn)) {
            // Lấy username từ session
            $username = isset($_SESSION['username']) ? $_SESSION['username'] : '';

            if ($username) {
                $string = "SELECT * FROM hosotreem WHERE username = '" . $username . "'";
            } else {
                return false; // Không có username trong session, trả về false
            }

            $table = mysqli_query($conn, $string);
            $p->dongketnoi($conn);
            return $table;
        } else {
            return false;
        }
    }


    #thêm thông tin trẻ em
    public function add_treem($hoTen, $ngaySinh, $thaiKy, $tinhTrang, $noiDungKetQua)
    {
        $p = new clsketnoi();
        if ($p->ketnoiDB($conn)) {
            // Lấy username từ session của phụ huynh đã đăng nhập
            $username = $_SESSION['username'];

            // Nếu username tồn tại trong session
            if ($username != "") {
                $string = "INSERT INTO hosotreem(hoTen, ngaySinh, thaiKy, tinhTrang, noiDungKetQua, username) 
                       VALUES ('" . $hoTen . "','" . $ngaySinh . "','" . $thaiKy . "','" . $tinhTrang . "','" . $noiDungKetQua . "','" . $username . "')";
            } else {
                // Trường hợp này sẽ không xảy ra vì username luôn phải tồn tại khi phụ huynh đăng nhập
                return false;
            }

            $table = mysqli_query($conn, $string);
            $p->dongketnoi($conn);
            return $table;
        } else {
            return false;
        }
    }
    #Hiển thị trẻ em theo id
    public function select_treem_id($idHoSo)
    {

        $p = new clsketnoi();
        if ($p->ketnoiDB($conn)) {
            $string = "SELECT * FROM hosotreem
						WHERE idHoSo ='" . $idHoSo . "'";
            // echo $string;
            $table = mysqli_query($conn, $string);
            $p->dongketnoi($conn);
            // var_dump($table);
            return $table;
        } else {
            return false;
        }
    }

    #XÓA TRẺ EM
    function del_HSTE($idHoSo)
    {

        $p = new clsketnoi();
        if ($p->ketnoiDB($conn)) {
            $string = "Delete FROM hosotreem where idHoSo ='" . $idHoSo . "'";
            // echo $string;
            $table = mysqli_query($conn, $string);
            $p->dongketnoi($conn);
            // var_dump($table);
            return $table;
        } else {
            return false;
        }
    }
}