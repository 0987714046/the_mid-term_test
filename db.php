<?php
    // Bước 01: Kết nối Server:
    //Định nghĩa Hằng số trong PHP
    define('SITEURL','http://localhost:8080/the_mid-term_test');
    define('HOST','localhost');
    define('USER','root');
    define('PASS','');
    define('DB_NAME','manage_contacts');
    define('PORT','3306');
    $conn = mysqli_connect(HOST,USER,PASS,DB_NAME);
    if(!$conn){
        die("Không thể kết nối: ".mysqli_connect_error());
    }
?>