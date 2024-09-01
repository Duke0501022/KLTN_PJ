<?php
include_once("model/connect.php");

class mLichDay
{
    function SelectLatestMenu()
    {
        $p = new ketnoi();
        if ($p->moketnoi($conn)) {
            $string = "SELECT * FROM lichgiangday 
                       JOIN chitietgiangday ON lichgiangday.idLichGD = chitietgiangday.idLichGD
                       JOIN giaovien ON chitietgiangday.idGiaoVien = giaovien.idGiaoVien
                       ORDER BY lichgiangday.NgayTao DESC LIMIT 1";
            $table = mysqli_query($conn, $string);
            $p->dongketnoi($conn);

            $list_users = array();
            if (mysqli_num_rows($table) > 0) {
                while ($row = mysqli_fetch_assoc($table)) {
                    $list_users[] = $row;
                }
                return $list_users;
            }
            return false;
        } else {
            return false;
        }
    }

    function SelectAllMenuDetailMenu()
    {
        $p = new ketnoi();
        if ($p->moketnoi($conn)) {
            $string = "SELECT * FROM lichgiangday 
                       JOIN chitietgiangday ON lichgiangday.idLichGD = chitietgiangday.idLichGD";
            $table = mysqli_query($conn, $string);
            $p->dongketnoi($conn);

            $list_users = array();
            if (mysqli_num_rows($table) > 0) {
                while ($row = mysqli_fetch_assoc($table)) {
                    $list_users[] = $row;
                }
                return $list_users;
            }
            return false;
        } else {
            return false;
        }
    }

    function SelectAllMenu()
    {
        $p = new ketnoi();
        if ($p->moketnoi($conn)) {
            $string = "SELECT * FROM lichgiangday";
            $table = mysqli_query($conn, $string);
            $p->dongketnoi($conn);

            $list_users = array();
            if (mysqli_num_rows($table) > 0) {
                while ($row = mysqli_fetch_assoc($table)) {
                    $list_users[] = $row;
                }
                return $list_users;
            }
            return false;
        } else {
            return false;
        }
    }

    function SelectMenuByDate($ngayTao)
    {
        $p = new ketnoi();
        if ($p->moketnoi($conn)) {
            $string = "SELECT * FROM lichgiangday 
                       JOIN chitietgiangday ON lichgiangday.idLichGD = chitietgiangday.idLichGD
                       JOIN giaovien ON chitietgiangday.idGiaoVien = giaovien.idGiaoVien 
                       WHERE lichgiangday.ngayTao = '$ngayTao'";
            $table = mysqli_query($conn, $string);
            $p->dongketnoi($conn);

            $list_users = array();
            if (mysqli_num_rows($table) > 0) {
                while ($row = mysqli_fetch_assoc($table)) {
                    $list_users[] = $row;
                }
                return $list_users;
            }
            return false;
        } else {
            return false;
        }
    }

    function SelectOneMenuByDate($ngayTao)
    {
        $p = new ketnoi();
        if ($p->moketnoi($conn)) {
            $string = "SELECT * FROM lichgiangday WHERE ngayTao = '$ngayTao'";
            $table = mysqli_query($conn, $string);
            $p->dongketnoi($conn);

            if (mysqli_num_rows($table) > 0) {
                $list_users = mysqli_fetch_assoc($table);
                return $list_users;
            }
            return false;
        } else {
            return false;
        }
    }

    function InsertMenuDetails($idLichGD, $idGiaoVien)
    {
        $p = new ketnoi();
        if ($p->moketnoi($conn)) {
            $string = "INSERT INTO chitietgiangday (idLichGD, idGiaoVien) VALUES ";
            foreach ($idGiaoVien as $item) {
                $string .= "('$idLichGD', '$item'), ";
            }
            $string = rtrim($string, ", ");
            $kq = mysqli_query($conn, $string);
            $p->dongketnoi($conn);
            return $kq;
        } else {
            return false;
        }
    }

    function InsertMenu($ngayTao)
    {
        $p = new ketnoi();
        if ($p->moketnoi($conn)) {
            $string = "INSERT INTO lichgiangday (ngayTao) VALUES ('$ngayTao')";
            $kq = mysqli_query($conn, $string);
            $p->dongketnoi($conn);
            return $kq;
        } else {
            return false;
        }
    }

    function DeletedDishByidMonAnAndByIdThucDon($idLichGD, $idGiaoVien)
    {
        $p = new ketnoi();
        if ($p->moketnoi($conn)) {
            $string = "DELETE FROM chitietgiangday WHERE idLichGD = $idLichGD AND idGiaoVien = $idGiaoVien";
            $kq = mysqli_query($conn, $string);
            $p->dongketnoi($conn);
            return $kq;
        } else {
            return false;
        }
    }
}
?>
