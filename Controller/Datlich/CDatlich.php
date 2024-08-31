<?php 
include_once("Model/Datlich/mDatlich.php");
class cDatlich{
    public function select_lich($id_khoa){
        $info = new mDatlich();
        $res = $info->select_lich($id_khoa);
        return $res;
    }
    
}
?>