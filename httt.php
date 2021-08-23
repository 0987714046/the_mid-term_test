<?php
    include("db.php");
    
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>test</title>
</head>

<body style="background-color: rgb(155, 172, 187);">
    <nav class="navbar navbar-expand-lg navbar-light bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Tra cứu</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
            <div class="collapse navbar-collapse " id="navbarScroll">
                <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="khoacntt.php" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Khoa công nghệ thông tin
                      </a>
                      <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="#">Bộ môn hệ thống thông tin</a></li>
            
                    </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                     Phòng đào tạo
                   </a>

                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                     Phòng Quản trị
                   </a>

                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                     Trạm y tế
                   </a>

                    </li>

                </ul>
                <form class="d-flex" action="" method="POST">
                    <input class="form-control me-2" type="search" name="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit" name="submit" >Search</button>
                </form>
<?php
 $sql="SELECT * FROM personal_directory Order By id DESC ";
if(isset($_POST['submit'])){
    $s= $_POST['search'];
    $sql="SELECT * FROM personal_directory WHERE full_name LIKE '%$s%' Order By id DESC ";
}
$result = mysqli_query($conn,$sql);
?>




            </div>
        </div>
<button type="botton"   class="btn btn-light"><a href="login.php"> Đăng nhập </a></button>
    </nav>
    <nav class="container" style="background-color: rgb(155, 172, 187);">
    <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">S.N</th>
                            
                            <th scope="col">Full Name</th>
                            <th scope="col">Phone number</th>
                            <th scope="col">Address</th>
                            <th scope="col">Email</th>
                            <th scope="col">Position</th>
                            
                            
                        </tr>
                    </thead>
                    <tbody>
                       
                        <?php
                      
                         $sql = "SELECT * FROM personal_directory WHERE id_agency = '3'";
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
                                     
                                     
 
                                     //Display the Values in our Table
                                     ?>
                                     
                                     <tr>
                                         <td><?php echo $sn++; ?>. </td>
                                         
                                         <td><?php echo $name; ?></td>
                                         <td><?php echo $phonenumber; ?></td>
                                         <td><?php echo $address; ?></td>
                                         <td><?php echo $email; ?></td>
                                         <td><?php echo $position; ?></td>
                                         
                                         
                                         
                                   
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