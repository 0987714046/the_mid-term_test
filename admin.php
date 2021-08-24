<?php
    include("db.php");
    
    session_start();
    if(!isset($_SESSION['login']))
    {
        header('location:'.SITEURL.'/admin/login.php');  
    }
    $_SESSION['product_filter'] =$_POST;
    
    include("header.php");
?>

    <nav class="row flex-row">
        <div class="list-group col-3 bg-success">
            <button class="btn btn-success mt-2" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample1" aria-expanded="false" aria-controls="collapseExample">
                Quản lý Cơ Quan, Tổ Chức
              </button>
            <button class="btn btn-success mt-2" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample2" aria-expanded="false" aria-controls="collapseExample">
                Quản lý Cá Nhân
              </button>
           

        </div>
        <div data-bs-spy="scroll" data-bs-target="#list-example" data-bs-offset="0" class="scrollspy-example col-9" tabindex="0">
            <div class="nav-collapse collapse show" id="collapseExample1">
                <div class="text-center">
                    <h2>Quản lý Cơ Quan , Tổ Chức</h2>
                </div>

                <div>
                    <button type="button"  style="background-color: #00a651;border-radius: 7px;"><a href="add_agency.php"><i class="fa fa-plus"></i> Add agency </a> </button>

                </div>
                <div class="product-search">
                    <form id="product-search-form" action=" admin.php?action=search" method="POST">
                        <fieldset>
                            <legend>Tìm kiếm cơ quan ,tổ chức</legend>
                            ID: <input type="text" name="id" value="<?=!empty($id)?$id:""?>"/>
                            Tên cơ quan: <input type="text" name="name"value="<?=!empty($name)?$name:""?>"/>
                            <input type="submit" value="tìm">
                        </fieldset>
                    </form>
<?php
if(!empty($_SESSION['product_filter'])){
    $where ="";
    foreach($_SESSION['product_filter'] as $field => $value){
    if(!empty($value)){
        switch($field){
            case "name":
                $where.= (!empty($where))? "AND"."'".$field."' LIKE '%".$value."%'":"'".$field."' LIKE'%". $value."%'";
                break;
                default:
                $where.= (!empty($where))? "AND"."'".$field."'= ".$value."":"'".$field."'=". $value."";
                break;

        }
    }
}
extract(($_SESSION['product_filter']));
}
if(!empty($where)){
    $product =mysqli_query($conn, "SELECT * FROM 'agency_directory' WHERE (".$where.") ORDER BY 'id' DESC LIMIT");
}else{
    $product =mysqli_query($conn, "SELECT * FROM 'agency_directory' ORDER BY 'id' DESC LIMIT" );
}
?>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">S.N</th>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Phone number</th>
                            <th scope="col">Address</th>
                            <th scope="col">Email</th>
                            <th scope="col">Website</th>
                            <th scope="col">Update </th>
                        </tr>
                    </thead>
                    <tbody>
                       
                        <?php
                         $sql = "SELECT * FROM agency_directory";
                         //Execute the Query
                         $res = mysqli_query($conn, $sql);
 
                         //CHeck whether the Query is Executed of Not
                         if($res==TRUE)
                         {
                             // Count Rows to CHeck whether we have data in database or not
                             $count = mysqli_num_rows($res); // Function to get all the rows in database
 
                             $sn=1; //Create a Variable and Assign the value
 
                             //CHeck the num of rows
                             if($count>0)
                             {
                                 //WE HAve data in database
                                 while($rows=mysqli_fetch_assoc($res))
                                 {
                                     //Using While loop to get all the data from database.
                                     //And while loop will run as long as we have data in database
 
                                     //Get individual DAta
                                     $id=$rows['id'];
                                     $name=$rows['name'];
                                     
                                     $phonenumber=$rows['phone'];
                                     $address=$rows['address'];
                                     $email=$rows['email'];
                                     $website=$rows['website'];
                                     
                                     
 
                                     //Display the Values in our Table
                                     ?>
                                     
                                     <tr>
                                         <td><?php echo $sn++; ?>. </td>
                                         <td><?php echo $id; ?></td>
                                         <td><?php echo $name; ?></td>
                                         <td><?php echo $email; ?></td>
                                         <td><?php echo $phonenumber; ?></td>
                                         <td><?php echo $website; ?></td>
                                         <td><?php echo $address; ?></td>
                                         
                                         <td>
                                <div class="d-flex">
                                    
                                    <button class="btl_account" type="button"><a href="delete_agency.php"> Delete agency</a></button>
                                    <button class="btl_account" type="button">Change agency</button>
                                </div>
                            </td>
                                     </tr>
 
                                     <?php
 
                                 }
                             }
                             else
                             {
                                 //We Do not Have Data in Database
                             }
                         }

                        ?>
                    </tbody>
                </table>
            </div>
            <div class="nav-collapse collapse show" id="collapseExample2">
                <div class="text-center">
                    <h2>Quản lý cá nhân</h2>
                </div>
                <div>
                    <button type="button" style="background-color: #00a651;border-radius: 7px;"><i class="fa fa-plus"></i><a href="add_personal.php"> Add personal</a> </button>

                </div>
                <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">S.N</th>
                            <th scope="col">ID</th>
                            <th scope="col">Full Name</th>
                            <th scope="col">Phone number</th>
                            <th scope="col">Address</th>
                            <th scope="col">Email</th>
                            <th scope="col">Position</th>
                            <th scope="col">Agency</th>
                            <th scope="col">Update </th>
                        </tr>
                    </thead>
                    <tbody>
                       
                        <?php
                      
                         $sql = "SELECT * FROM personal_directory ";
                         //Execute the Query
                         $res = mysqli_query($conn, $sql);
 
                         //CHeck whether the Query is Executed of Not
                         if($res==TRUE)
                         {
                             // Count Rows to CHeck whether we have data in database or not
                             $count = mysqli_num_rows($res); // Function to get all the rows in database
 
                             $sn=1; //Create a Variable and Assign the value
 
                             //CHeck the num of rows
                             if($count>0)
                             {
                                 //WE HAve data in database
                                 while($rows=mysqli_fetch_assoc($res))
                                 {
                                     //Using While loop to get all the data from database.
                                     //And while loop will run as long as we have data in database
 
                                     //Get individual DAta
                                     $id=$rows['id'];
                                     $name=$rows['full_name'];
                                     
                                     $phonenumber=$rows['phone'];
                                     $address=$rows['address'];
                                     $email=$rows['email'];
                                     $position=$rows['position'];
                                     $idagency=$rows['id_agency'];
                                     
 
                                     //Display the Values in our Table
                                     ?>
                                     
                                     <tr>
                                         <td><?php echo $sn++; ?>. </td>
                                         <td><?php echo $id; ?></td>
                                         <td><?php echo $name; ?></td>
                                         <td><?php echo $phonenumber; ?></td>
                                         <td><?php echo $address; ?></td>
                                         <td><?php echo $email; ?></td>
                                         <td><?php echo $position; ?></td>
                                         <td><?php echo $idagency; ?></td>
                                         
                                         
                                         <td>
                                <div class="d-flex">
                                    
                                    <button class="btl_account" type="button"><a href="delete_personal.php"> Delete agency </a></button>
                                    <button class="btl_account" type="button">Change agency</button>
                                </div>
                            </td>
                                     </tr>
 
                                     <?php
 
                                 }
                             }
                             else
                             {
                                 //We Do not Have Data in Database
                             }
                         }

                        ?>
                    </tbody>
                </table>
            </div>
            
        </div>

    </nav>

  


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>