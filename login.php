<?php
    include("db.php");
    session_start();
    include("header.php")
    
?>
    <html>
    <head>
        <title>Login </title>
        <link rel="stylesheet" href="../css/admin.css">
    </head>

    <body style="background-color: rgb(166, 226, 226);">
        
        <div class="login" style="background-color: rgb(166, 226, 226);">
            <h1 class="text-center">Đăng Nhập</h1>
            <br><br>

            <?php 
                if(isset($_SESSION['login']))
                {
                    echo $_SESSION['login'];
                    unset($_SESSION['login']);
                }

                if(isset($_SESSION['no-login-message']))
                {
                    echo $_SESSION['no-login-message'];
                    unset($_SESSION['no-login-message']);
                }
            ?>
            <br><br>

            <!-- Login Form Starts HEre -->
            <form action="" method="POST" class="text-left" style=" width: 30%;margin : 0 35%;" >
            <h4>Tài khoản:</h4> <br>
            <input type="text" name="username"  placeholder="Nhập tài khoản" size="50"><br><br>

            <h4>Mật khẩu:</h4> <br>
            <input type="password" name="password" placeholder="Nhập mật khẩu" size="50"><br><br>
            <div >
            <input type="submit" name="submit" style="border-radius: 5px;margin : 0 10%;" value="Đăng nhập" class="btn-primary">
            
                <button type="button" style="border-radius: 5px;margin : 0 10%;" class="text-center  btn-primary">
            <a  style="color:white;" href="logup.php"> Đăng ký </a>
            </button>
            </div>
            <br><br>
            </form>
            

            <p class="text-center">Created By - <a href="https://www.facebook.com/profile.php?id=100004869885566">Cuong </a></p>
        </div>

    </body>
</html>

<?php 

    //CHeck whether the Submit Button is Clicked or NOt
    if(isset($_POST['submit']))
    {
        //Process for Login
        //1. Get the Data from Login form
        // $username = $_POST['username'];
        // $password = md5($_POST['password']);
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        
        $raw_password = md5($_POST['password']);
        $password = mysqli_real_escape_string($conn, $raw_password);

        //2. SQL to check whether the user with username and password exists or not
        $sql = "SELECT * FROM user WHERE user_name='$username' AND pass_word='$password'";

        //3. Execute the Query
        $res = mysqli_query($conn, $sql);

        //4. COunt rows to check whether the user exists or not
        $count = mysqli_num_rows($res);
     

        if($count==1 )
        {
            //User AVailable and Login Success
            $_SESSION['login'] = "<div class='success'>Login Successful.</div>";
            $_SESSION['user'] = $username; //TO check whether the user is logged in or not and logout will unset it

            //REdirect to HOme Page/Dashboard
            header('location:'.SITEURL.'/admin.php');
        }
        else
        {
            //User not Available and Login FAil
            $_SESSION['login'] = "<div class='error text-center'>Username or Password did not match.</div>";
            //REdirect to HOme Page/Dashboard
            header('location:'.SITEURL.'/login.php');
        }


    }
    ?>

    