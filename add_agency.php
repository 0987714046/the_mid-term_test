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
                            <input type="text" name="id" placeholder="Nhập mã cơ quan" size="50">
                        </td>
                    </tr>
                <tr>
                        <td>Name</td>
                        <td>
                            <input type="text" name="txtname" placeholder="Nhập tên cơ quan" size="50">
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
                        <td>Website</td>
                        <td>
                            <input type="text" name="txtweb" placeholder="Nhập website" size="50">
                        </td>
                    </tr>
                    <tr>
                        <td>Id affiliated units</td>
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
                    $web = $_POST['txtweb'];
                    $id = $_POST['txtid'];
                    $id1 =$_POST['id'];
                   
                    $sql ="INSERT INTO agency_directory (ID,name, address, phone, email, website,id_affiliated_units  )  VALUES ( '$id1','$name','$address', '$phone','$email', '$web', '$id');";
              
                    
                    
                    
                    
                   
                    if(mysqli_query($conn,$sql)){
                        header('location:'.SITEURL.'/admin.php');
                    }
                    
                    
                }
               

            ?>
            
        </main>
    </div>
    </body>
   