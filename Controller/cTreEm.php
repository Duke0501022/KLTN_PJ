<?php

include_once("Model/mTreEm.php");

class cHoSoTreEm
{
    // Hàm thống kê số lượng trẻ em
    public function count_te()
    {
        $p = new mHoSoTreEM();
        $table = $p->count_te();
        return $table;
    }

    // Hàm lấy danh sách trẻ em theo username
    public function select_treem()
    {
        $p = new mHoSoTreEM();
        $table = $p->select_treem(); // Lọc theo username được thực hiện trong model
        return $table;
    }

    // Hàm lấy thông tin trẻ em theo ID
    public function select_treem_byid($idHoSo)
    {
        $p = new mHoSoTreEM();
        $table = $p->select_treem_id($idHoSo);
        return $table;
    }

    // Hàm thêm hồ sơ trẻ em
    public function add_TE($hoTen, $ngaySinh, $thaiKy, $tinhTrang, $noiDungKetQua)
    {
        $p = new mHoSoTreEM();
        $insert = $p->add_treem($hoTen, $ngaySinh, $thaiKy, $tinhTrang, $noiDungKetQua);
        if ($insert) {
            return 1; // Thêm thành công
        } else {
            return 0; // Thêm không thành công
        }
    }

    // Hàm xóa hồ sơ trẻ em
    public function delete_HSTE($idHoSo)
    {
        $p = new mHoSoTreEM();
        $table = $p->del_HSTE($idHoSo);
        if ($table) {
            return 1; // Xóa thành công
        } else {
            return 0; // Xóa không thành công
        }
    }
}