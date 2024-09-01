<?php

include_once("model/LichDay/mLichDay.php");
class cLichDay
{
    function getLatestMenu()
    {
        $p = new mLichDay();
        $tbl = $p->SelectLatestMenu();
        return  $tbl;
    }

    function getAlltMenu()
    {
        $p = new mLichDay();
        $tbl = $p->SelectAllMenu();
        return  $tbl;
    }

    
    function   getAllMenuDetailMenu()

    {
        $p = new mLichDay();
        $tbl = $p->SelectAllMenuDetailMenu();
        return  $tbl;
    }
    function InsertMenuDetails($idLichGD, $idGiaoVien)
    {
        $p = new mLichDay();
        $tbl = $p->InsertMenuDetails($idLichGD, $idGiaoVien);
        if ($tbl) {
            return 1;
        } else {
            return 0;
        }
    }

    function InsertMenu($ngayTao)
    {
        $p = new mLichDay();
        $tbl = $p->InsertMenu($ngayTao);
        return  $tbl;
    }

    function getMenuByDate($ngayTao)
    {

        $p = new mLichDay();
        $tbl = $p->SelectMenuByDate($ngayTao);
        return  $tbl;
    }
    function getOneMenuByDate($ngayTao)
    {

        $p = new mLichDay();
        $tbl = $p->SelectOneMenuByDate($ngayTao);
        return  $tbl;
    }

    function  DeletedDishByidMonAnAndByIdThucDon($idLichGD, $idGiaoVien)
    {

        $p = new mLichDay();
        $tbl = $p->DeletedDishByidMonAnAndByIdThucDon($idLichGD, $idGiaoVien);
        return  $tbl;
    }
}
