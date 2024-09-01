<?php

include_once("model/GiaoVien/mGiaoVien.php");
class cGV
{
    function getAllGV()
    {
        $p = new mGV();
        $tbl = $p->SelectAllGV();
        return  $tbl;
    } 
}
?>