<?php
include("controller/TreEm/cTreEm.php"); 
include_once("controller/TaiKhoan/ctaikhoan.php");

if (isset($_REQUEST['idHoSo']) && isset($_REQUEST['username'])) {
    $idHoSo = $_REQUEST['idHoSo'];
    $username = $_REQUEST['username'];
    $p = new cHoSoTreEm();
    $tk = new ctaikhoan();
    $delete = $p->delete_HSTE($idHoSo);
    if ($delete == 1) { // Corrected here
        $delete = $tk->delete_taikhoan($username);
        if ($delete == 1) { // Corrected here
            echo "<script>alert('Xóa thành công');</script>";
            echo "<script>window.location.href='?quanlyhosotreem'</script>";
        } else {
            echo "<script>alert('Xóa không thành công');</script>";
            echo "<script>window.location.href='?quanlyhosotreem'</script>";
        }
    }
}
?>