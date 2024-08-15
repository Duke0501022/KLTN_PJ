 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
     <div class="container-fluid">
       <div class="row mb-2">
         <div class="col-sm-6">
           <h1>Quản lý hồ sơ trẻ em</h1>
         </div>
         <div class="col-sm-6">
           <ol class="breadcrumb float-sm-right">
             <li class="breadcrumb-item"><a href="index.php">Trang chủ</a></li>
             <li class="breadcrumb-item active">Quản lý hồ sơ trẻ em</li>
           </ol>
         </div>
       </div>
     </div><!-- /.container-fluid -->
   </section>
   <!-- Main content -->
   <section class="content">
     <div class="container-fluid">
       <div class="row">
         <div class="col-md-6">
           <!-- /.card -->
         </div>
         <!-- /.col -->
         <div class="col-md-6">

         </div>
         <!-- /.col -->
       </div>
       <!-- /.row -->
       <div class="row">
         <div class="col-12">
           <div class="card">
             <div class="card-header">
               <!-- <h3 class="card-title">Danh sách thông tin khách hàng</h3>  | <a href="#">Thêm khách hàng mới</a> -->
               <!-- <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default">
                        <i class="fas fa-search"></i>
                      </button>
                    </div>
                  </div>
                </div>
              </div>-->
               <!-- /.card-header -->
               <h3 style="text-align:center">Thêm trẻ em mới</h3>
               <form action="#" method="post" onsubmit="return validateForm()">
                 <div class="row">
                   <div class="col">
                     <!-- <td>Mã vai trò</td> -->
                     <!-- <input type="text" class="form-control" id="mavaitro" placeholder="Enter Số điện thoại" name="mavaitro"></br> -->
                     <td>Họ tên</td>
                     <input type="text" class="form-control" id="hoTen" placeholder="Nhập họ tên trẻ em" name="hoTen"></br>
                     <td>Ngày sinh</td>
                     <input type="date" class="form-control" id="ngaySinh" placeholder="Nhập ngày sinh" name="ngaySinh"></br>
                      <td>Tình trạng</td>
                      <input type="text" class="form-control" id="tinhTrang" placeholder="Nhập tình trạng hiện tại của trẻ em" name="tinhTrang"></br>
                   </div>
                 </div>
                 </br>
                 <button type="submit" class="btn btn-primary" name="btnsubmit" style="margin-left:45%">Lưu</button>
                 <button type="reset" class="btn btn-primary">Hủy</button>
                 <!-- <input type="submit" value="Thêm Doanh Nghiệp" style="text-align:center"> -->
               </form>
               <!-- /.card-body -->
             </div>
             <!-- /.card -->
           </div>
         </div>
       </div>
       <!-- /.row -->
     </div><!-- /.container-fluid -->
   </section>
   <!-- /.content -->
 </div>
 <!-- /.content-wrapper -->
 <?php
  include("controller/TreEm/cTreEm.php");
  if (isset($_REQUEST["btnsubmit"])) {
    // $Role = $_REQUEST['role'];
    // echo $Mavaitro;
    $hoTen = $_REQUEST['hoTen'];
    $ngaySinh = $_REQUEST['ngaySinh'];
    $tinhTrang = $_REQUEST['tinhTrang'];
    $p = new cHoSoTreEm();
    $table = $p->add_TE($hoTen, $ngaySinh, $tinhTrang, $noiDungKetQua, $username);
    if ($table == 1) {
      echo "<script>alert('Tạo trẻ em thành công')</script>";
    } else {
      echo "<script>alert('Tạo trẻ em không thành công')</script>";
    }
  } 
  ?>
 <script>
  //  function validateForm() {
  //    var role = document.getElementById("role").value;
  //    var username = document.getElementById("username").value;
  //    var password = document.getElementById("password").value;

  //    // Kiểm tra xem các trường có rỗng không
  //    if (role == "" || username == "" || password == "") {
  //      alert("Vui lòng điền đầy đủ thông tin");
  //      return false;
  //    }

  //    // Kiểm tra độ dài tối thiểu/maksimum của username và password
  //    if (username.length < 6 || username.length > 20) {
  //      alert("Username phải từ 6 đến 20 ký tự");
  //      return false;
  //    }

  //    if (password.length < 8 || password.length > 20) {
  //      alert("Password phải từ 8 đến 20 ký tự");
  //      return false;
  //    }

  //    // Kiểm tra định dạng hợp lệ của password
  //    var passwordPattern = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/;
  //    if (!passwordPattern.test(password)) {
  //      alert("Password phải chứa ít nhất một chữ số, một chữ cái viết thường, một chữ cái viết hoa ");
  //      return false;
  //    }

  //    // Kiểm tra mã vai trò hợp lệ
  //    if (role != "2" && role != "3" && role != "4") {
  //      alert("Vui lòng chọn một mã vai trò hợp lệ");
  //      return false;
  //    }

  //    // Nếu tất cả điều kiện đều đúng, trả về true để submit form
  //    return true;
  //  }
  // viết hàm regex cho đoạn code trên, viết chuẩn với tất cả trường hợp
  function validateForm() {
    var hoTen = document.getElementById("hoTen").value;
    var ngaySinh = document.getElementById("ngaySinh").value;
    var tinhTrang = document.getElementById("tinhTrang").value;

    // Kiểm tra xem các trường có rỗng không
    if (hoTen == "" || ngaySinh == "" || tinhTrang == "") {
      alert("Vui lòng điền đầy đủ thông tin");
      return false;
    }

    // Kiểm tra định dạng hợp lệ của ngày sinh
    var datePattern = /^\d{4}-\d{2}-\d{2}$/;
    if (!datePattern.test(ngaySinh)) {
      alert("Ngày sinh phải có định dạng yyyy-mm-dd");
      return false;
    }

    // Nếu tất cả điều kiện đều đúng, trả về true để submit form
    return true;
  }
  
 </script>