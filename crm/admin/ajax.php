<?php 
session_start();
include_once "includes/conn.php";
include_once "includes/checklogin.php";
check_login();

if(isset($_POST['blog_upload']) && $_POST['blog_upload'] == 1){
    $data = $_POST;
   $title = $data['title'];
   $subject = $data['subject'];
   $description = $data['content'];
   $author = $data['author'];
   $date = $data['blog_date'];
   $filename = $_FILES['file']['name'];
   $time=  strtotime("now");
  $filename = $time.'_'.$filename;
   /* Location */
   $directory = dirname(__FILE__)."/uploads" ;
   $location = dirname(__FILE__)."/uploads/".$filename ;
   if(!is_dir($location))
		{
			mkdir($directory, 0777);
		}
    
    $uploadOk = 1;
    $imageFileType = pathinfo($location,PATHINFO_EXTENSION);
    /* Valid Extensions */
    $valid_extensions = array("jpg","jpeg","png");
    /* Check file extension */
    if( !in_array(strtolower($imageFileType),$valid_extensions) ) {
       $uploadOk = 0;
    }
    if($uploadOk == 0){
       echo 0;
    }else{
       /* Upload file */
       if(move_uploaded_file($_FILES['file']['tmp_name'],$location)){
          $imagename = $filename;
          $insertQuery = "INSERT INTO `blogs` (`title`,`subject`,`description`,`image`,`author`,`date`) VALUES('". $title ."','". $subject ."','". $description ."','". $imagename ."','". $author ."','". $date ."')";
          $insert = mysqli_query($con,$insertQuery);
          $insert_id = mysqli_insert_id($con);
          echo $insert_id; 
       }else{
          echo 0;
       }
    }
}


?>