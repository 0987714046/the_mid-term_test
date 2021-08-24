<?php
    include("db.php");
    session_start();
    include("header.php");
?>
<body style="background-color: rgb(166, 226, 226);">
    

    <div id="main-main" class="container-fluid" style="background-color: rgb(166, 226, 226);" >
    <h1 class="text-center">Thêm cơ quan , tổ chức</h1>
        <main class="text-center" style="background-color: rgb(166, 226, 226);">
            <form method="POST" action="" style="background-color: rgb(166, 226, 226);width: 30%;margin : 6% 35%;">
                <table>
                <tr>
                        <td>ID</td>
                        <td>
                            <input type="text" name="id1" placeholder="Nhập mã cá nhân" size="50">
                        </td>
                    </tr>
                <tr>
                        <td>Full Name</td>
                        <td>
                            <input type="text" name="txtname" placeholder="Nhập họ và tên" size="50">
                        </td>
                    </tr>
                    <tr>
                        <td>Phone number</td>
                        <td>
                            <input type="int" name="txtphone" placeholder="Nhập số điện thoại" size="50">
                        </td>
                    </tr>
                   
                    <tr>
                        <td>Address</td>
                        <td>
                            <input type="int" name="txtaddress" placeholder="nhập địa chỉ" size="50">
                        </td>
                    </tr>
                    
                   
                    <tr>
                        <td>Email</td>
                        <td>
                            <input type="text" name="txtemail" placeholder="Nhập email" size="50">
                        </td>
                    </tr>
                    <tr>
                        <td>Position</td>
                        <td>
                            <input type="text" name="txtposition" placeholder="Nhập chức vụ" size="50">
                        </td>
                    </tr>
                    <tr>
                        <td>Id Agency</td>
                        <td>
                            <input type="int" name="txtid" placeholder="Nhập mã cơ quan trực thuộc" size="50">
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <input type="submit" name="btnAddUser" value="Thêm" class="btn btn-success" size="50">
                        </td>
                    </tr>
                    
                </table>
            </form>
            <?php
                if(isset($_POST['btnAddUser'])){
                    $name =  $_POST['txtname'];
                    $phone   = $_POST['txtphone'];
                    $email = $_POST['txtemail'];
                    $address = $_POST['txtaddress'];
                    $position = $_POST['txtposition'];
                    $id = $_POST['txtid'];
                    $id1 =$_POST['id1'];
                    //Kiểm tra: Dữ liệu người dùng nhập có đang BỎ TRỐNG trường nào KO?
                    //CSDL của chúng ta đã lưu Mật khẩu ở dạng THÔ
                    //Kiểm tra: Trước khi thêm Tài khoản, phải kiểm tra username và email này có tồn tại chưa?
                    //Nếu chưa tồn tại thì mới thêm;
                    //Bước 02: Thực hiện truy vấn 
                    $sql ="INSERT INTO personal_directory (ID,full_name, email, phone, position,id_agency, address  )  VALUES ( '$id1','$name', '$email','$phone', '$position', '$id','$address');";
              
                    
                    
                    
                    
                   
                    if(mysqli_query($conn,$sql)){
                        header('location:'.SITEURL.'/admin.php');
                    }
                    
                    
                }
               

            ?>
            
        </main>
    </div>
    </body>
   