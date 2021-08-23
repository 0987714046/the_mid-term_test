<?php 
    
    include('db.php');

    

    if(isset($_GET['id']))
    {
        

       
        $id = $_GET['id'];
   

       
      

        
        $sql = "DELETE FROM agency_directory WHERE id=$id";
        
        $res = mysqli_query($conn, $sql);

      
        if($res==true)
        {
           
            $_SESSION['delete'] = "<div class='success'>Deleted Successfully.</div>";\
            header('location:'.SITEURL.'admin.php');
        }
        else
        {
            
            $_SESSION['delete'] = "<div class='error'>Failed to Delete .</div>";\
            header('location:'.SITEURL.'admin.php');
        }

        

    }
    else
    {
        
        $_SESSION['unauthorize'] = "<div class='error'>Unauthorized Access.</div>";
        header('location:'.SITEURL.'admin.php');
    }

?>