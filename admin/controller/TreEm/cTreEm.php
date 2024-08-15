<?php 

	include_once("model/TreEm/mTreEm.php");

	class cHoSoTreEm{
        //--------------THỐNG KÊ
        //
        #thong ke so luong tre em
        public function count_dn(){
            $p = new mHoSoTreEM();
            $table = $p -> count_te();
            return $table;
        }
        //
        //------------------------------------------
        #xem doanh nghiệp
		public function select_treem(){
			$p = new mHoSoTreEM();
			$table = $p -> select_treem();
			return $table;
		}
        public function select_treem_byid_xa($idHoSo){
            $p= new mHoSoTreEM();
            $table = $p->select_treem_id($idHoSo);
            return $table;
        }
        
        #Hiển thị  doanh nghiệp id
      
        #update doanh nghiệp
        // 
        // CẬP NHẬT KHÁCH HÀNG KHÔNG USERNAME
        // 
		// public function update_TE($idHoSo,$hoTen, $ngaySinh, $tinhTrang, $noiDungKetQua){
        //     $p = new mHoSoTreEM();
        //     $update = $p -> update_($idPhuHuynh,$email,$hinhAnh,$hoTen,$soDienThoai,$gioiTinh);
        //     // var_dump($update);
        //     if($update){
        //         return 1; //cập nhật thành công
        //     }else{
        //         return 0; //cập nhật không thành công
        //     }
        // }
        // #update doanh nghiệp có username
        // public function update_DN1($idPhuHuynh,$username){
        //     $p = new mKhachHangDoanhNghiep();
        //     $update = $p -> update_KHDN1($idPhuHuynh,$username);
        //     // var_dump($update);
        //     if($update){
        //         return 1; //cập nhật thành công
        //     }else{
        //         return 0; //cập nhật không thành công
        //     }
        // }
        // #update tài khoản
        // public function update_taikhoan($username,$usernamecu,$password){
        //     $p=new mtaikhoan;
        //     $update=$p->updatetaikhoan($username,$usernamecu,$password);
        //     // var_dump ($update);
        //     if($update){
        //         return 1; //update thành công
        //     }else {
        //         return 0; //update thất bại
        //     }
        // }
        #thêm doanh nghiệp
        public function add_TE($hoTen, $ngaySinh, $tinhTrang, $noiDungKetQua, $username){
            $p = new mHoSoTreEM();
            $insert = $p->add_treem($hoTen, $ngaySinh, $tinhTrang, $noiDungKetQua, $username);
            // var_dump($insert);
            if($insert){
                return 1;// thêm thành công
            }else {
                return 0;//thêm không thành công
            }
           
        }
        // #THÊM USERNAME CHO DOANH NGHIỆP CHƯA CÓ TÀI KHOẢN TRÊN BẢNG KHÁCH HÀNG
        // public function UPDATE_KHDN_USERNAME($idPhuHuynh,$username){
        //     $p = new mKhachHangDoanhNghiep();
        //     $update = $p->update_khdn_username($idPhuHuynh,$username);
        //     // var_dump($update);
        //     if($update){
        //         return 1;// thêm thành công
        //     }else {
        //         return 0;//thêm không thành công
        //     }
           
        // }

        // #kiem tra user có trong bảng tài khoản
        // public function check_user($username){
        //     $p= new mKhachHangDoanhNghiep();
        //     $table = $p -> checkuser($username);
		// 	return $table;
		// }
       
        #xóa khách hàng doanh nghiệp
        function delete_HSTE($idHoSo) {
            $p = new mHoSoTreEM();
            $table = $p->del_HSTE($idHoSo);
            if ($table) {
                return 1; // Xóa thành công
            } else {
                return 0; // Xóa không thành công
            }
        }
	}

 ?>