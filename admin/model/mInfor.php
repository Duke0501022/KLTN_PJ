<?php
include_once("model/connect.php");

class mInfo
{
    public function select_info($username, $role){
        $p = new ketnoi();
        $conn = $p->moketnoi($conn); // Kết nối đến cơ sở dữ liệu
        if($conn){
            $string = "";
            if ($role == "3") {
                $string = "SELECT *, taikhoan1.Role FROM chuyenvien JOIN taikhoan1 ON chuyenvien.username = taikhoan1.username WHERE chuyenvien.username = '$username'";
            } elseif ($role == "4") {
                $string = "SELECT *, taikhoan1.Role FROM quantrivien JOIN taikhoan1 ON quantrivien.username = taikhoan1.username WHERE quantrivien.username = '$username'";
            } elseif ($role == "1") {
                $string = "SELECT *, taikhoan1.Role FROM admin JOIN taikhoan1 ON admin.username = taikhoan1.username WHERE admin.username = '$username'";
            }
            $table = mysqli_query($conn, $string);
            $p->dongketnoi($conn); // Đóng kết nối cơ sở dữ liệu
            return $table;
        } else {
            return false;
        }
    }
   


    public function update_info($username, $hoTen, $gioiTinh, $soDienThoai, $hinhAnh, $email)
    {
        
        $p = new clsketnoi();
        if ($p->ketnoiDB($conn)) {
            $string = "UPDATE phuhuynh SET hoTen = '$hoTen', gioiTinh = '$gioiTinh', soDienThoai = '$soDienThoai', hinhAnh = '$hinhAnh', email = '$email' WHERE username = '$username' ";
            $table = mysqli_query($conn, $string);
            $p->dongketnoi($conn);
            return $table;
        } else {
            return false;
        }
    }
  
    
}
