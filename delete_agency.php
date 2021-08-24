<?php 
    

    include("db.php");
    session_start();
    include("header.php");
?>
<body style="background-color: rgb(166, 226, 226);">
    

    <div id="main-main" class="container-fluid" style="background-color: rgb(166, 226, 226);" >
    <h1 class="text-center">Xóa cơ quan , tổ chức</h1>
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
                        <td></td>
                        <td>
                            <input type="submit" name="btnAddUser" value="Xóa" class="btn btn-success" size="50">
                        </td>
                    </tr>
                    
                </table>
            </form>
            <?php
                if(isset($_POST['btnAddUser'])){
                 
                    $id1 =$_POST['id'];
                   
                    $sql = "DELETE FROM agency_directory WHERE id='$id'";
        
                    $res = mysqli_query($conn, $sql);
            
                  
                    if($res==true)
                    {
                       
                        $_SESSION['delete'] = "<div class='success'>Deleted Successfully.</div>";
                        header('location:'.SITEURL.'/admin.php');
                    }
                    else
                    {
                        
                        $_SESSION['delete'] = "<div class='error'>Failed to Delete .</div>";
                        header('location:'.SITEURL.'/admin.php');
                    }
            
                    
                    
                }
               

            ?>
            
        </main>
    </div>
    </body>
   