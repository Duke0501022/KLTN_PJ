<?php 

	include_once("model/connect.php");

	class mHoSoTreEM{
		//--------------THỐNG KÊ
		//
		#thống kê số lượng trẻ em
		public function count_te(){
			
			$p = new ketnoi();
			if($p -> moketnoi($conn)){
				$string = "SELECT count(*) FROM hosotreem";
				$table = mysqli_query($conn,$string);
				$p -> dongketnoi($conn);
				//
				return $table;
			}else{
				return false;
			}
		}
		//
		//------------------------------------------
		#xem thông tin trẻ em
		public function select_treem(){
			$p = new ketnoi();
			$username = isset($_SESSION['username']) ? $_SESSION['username'] : '';
			if($p -> moketnoi($conn)){
				$string = "SELECT * FROM hosotreem";
				$table = mysqli_query($conn,$string);
				$p -> dongketnoi($conn);
				return $table;
			}else{
				return false;
			}
		}
		
		#thêm thông tin trẻ em
		public function add_treem($hoTen, $ngaySinh,$thaiKy,$tinhTrang, $noiDungKetQua,$username){
			
			$p = new ketnoi();
			if($p->moketnoi($conn)){
				if ($username !="") {
					$string="insert into hosotreem(hoTen, ngaySinh, thaiKy,tinhTrang, noiDungKetQua, username) values";
                	$string .= "('".$hoTen."','".$ngaySinh."','".$thaiKy."','".$tinhTrang."','".$noiDungKetQua."','".$username."')";
				}else {
					$string="insert into hosotreem(hoTen, ngaySinh,thaiKy ,tinhTrang, noiDungKetQua, username) values";
                	$string .= "('".$hoTen."','".$ngaySinh."','".$thaiKy."','".$tinhTrang."','".$noiDungKetQua."','".$username."')";
				}
				
                $table=mysqli_query($conn,$string);
                // echo $string;
                $p->dongketnoi($conn);
				// var_dump($table);
                return $table;
            }else{
                return false;
            }
		}
		#
		// public function update_khdn_username($idPhuHuynh,$username){
			
		// 	$p = new ketnoi();
		// 	if($p->moketnoi($conn)){
		// 			$string ="update khachhang";
		// 			$string .= " set username='".$username."'";
		// 			$string .= " Where idPhuHuynh='".$idPhuHuynh."'";
        //         $table=mysqli_query($conn,$string);
        //         // echo $string;
        //         $p->dongketnoi($conn);
		// 		// var_dump($table);
        //         return $table;
        //     }else{
        //         return false;
        //     }
		// }
		#Hiển thị doanh nghiệp theo MAKH
		public function select_treem_id($idHoSo){
			
			$p= new ketnoi();
			if($p->moketnoi($conn)){
				$string="SELECT * FROM hosotreem
						WHERE idHoSo ='".$idHoSo."'";
				// echo $string;
				$table=mysqli_query($conn,$string);
				$p->dongketnoi($conn);
				// var_dump($table);
				return $table;
						
			}else{
				return false;
			}
			
		}
		#UPDATE KHACH HANG DOANH NGHIEP
		// public function update_KHDN($idPhuHuynh,$email,$hinhAnh,$hoTen,$soDienThoai,$gioiTinh){
			
		// 	$p= new ketnoi();
		// 	if($p->moketnoi($conn)){
		// 		// if($username !=""){
		// 			$string ="update phuhuynh";
		// 			$string .= " set idPhuHuynh='".$idPhuHuynh."', email='".$email."', hinhAnh='".$hinhAnh."', hoTen='".$hoTen."', soDienThoai='".$soDienThoai."', gioiTinh='".$gioiTinh."'";
		// 			$string .= " Where idPhuHuynh='".$idPhuHuynh."'";
		// 		// }else {
		// 			// $string ="update khachhang";
		// 			// $string .= " set MaKH='".$MaKH."', TenKH='".$TenKH."', Diachi='".$DiaChi."', SDT='".$SDT."', Email='".$Email."', GioiTinh='".$GioiTinh."', TenDoanhNghiep='".$TenDoanhNghiep."', GioiThieu='".$GioiThieu."', MaXa='".$MaXa."'";
		// 			// $string .= " Where MaKH='".$MaKH."'";
		// 		// }
		// 		// echo $string;
		// 		// echo $username;
		// 		$table =mysqli_query($conn,$string);
		// 		$p->dongketnoi($conn);
		// 		// var_dump($table);
		// 		return $table;

		// 	}else {
		// 		return false;
		// 	}
		// }
		#UPDATE KHACH HANG DOANH NGHIEP CO USERNAME
		// public function update_KHDN1($idPhuHuynh,$username){
			
		// 	$p= new ketnoi();
		// 	if($p->moketnoi($conn)){
				
		// 			$string ="update phuhuynh";
		// 			$string .= " set username='".$username."'";
		// 			$string .= " Where idPhuHuynh='".$idPhuHuynh."'";
				
		// 		// echo $string;
		// 		// echo $username;
		// 		$table =mysqli_query($conn,$string);
		// 		$p->dongketnoi($conn);
		// 		// var_dump($table);
		// 		return $table;

		// 	}else {
		// 		return false;
		// 	}
		// }
		#UPDATE TAI KHOAN KHACH HANG
		// public function updatetaikhoan($username,$password){
           
        //     $p=new ketnoi();
        //     if($p->moketnoi($conn)){
        //         // $password=md5('1');
        //         $string="update taikhoan1";
        //         $string .=" set username='".$username."', password='".$password."'";
        //         $string .= "where username='".$username."'";
        //         // echo $string;
        //         $table = mysqli_query($conn, $string);
		// 		// var_dump($table);
        //         $p->dongketnoi($conn);
        //         return $table;
        //     }else {
        //         return false;
        //     }
        // }
		#KIEM TRA TAI KHOAN DOANH NGHIEP Có Trong bảng tài khoản
		// public function checkuser($username){
		// 	$conn;
		// 	$p= new ketnoi();
		// 	if($p->moketnoi($conn)){
		// 		$string="SELECT * FROM khachhang WHERE username IN (SELECT username FROM taikhoan) && username = '".$username."'";
		// 		echo $string;
		// 		$table= mysqli_query($conn,$string);
		// 		$p->dongketnoi($conn);
		// 		var_dump($table);
		// 		return $table;
		// 	}else {
		// 		return false;
		// 	}
		// }
		
		#XÓA TRẺ EM
		function del_HSTE($idHoSo){
			
			$p = new ketnoi();
			if($p -> moketnoi($conn)){
				$string = "Delete FROM hosotreem where idHoSo ='".$idHoSo."'";
				// echo $string;
				$table = mysqli_query($conn,$string);
				$p -> dongketnoi($conn);
				// var_dump($table);
				return $table;
			}else{
				return false;
			}
		}
	}	
?>