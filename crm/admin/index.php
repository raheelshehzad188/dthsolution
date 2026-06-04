<?php

session_start();
include_once "includes/header.php";
include_once "includes/conn.php";
if(isset($_POST['login']))
{
        $query=mysqli_query($con,"SELECT * FROM admin WHERE name='".$_POST['email']."' ");
        $fetch=mysqli_fetch_array($query);
		$password=mysqli_real_escape_string($con,$_POST['password']);
		$hash=$fetch['password'];
		if(password_verify($password,$hash)){
		    $extra="home.php";
            $_SESSION['alogin']=$_POST['email'];
            $_SESSION['id']=$fetch['id'];
            echo "<script>window.location.href='".$extra."'</script>";
            exit();
		}else
        {
        $_SESSION['action1']="*Invalid username or password";
        $extra="index.php";
        
        echo "<script>window.location.href='".$extra."'</script>";
        exit();
        }
        // $num=mysqli_fetch_array($ret);
        // if($num>0)
        // {
        // $extra="home.php";
        // $_SESSION['alogin']=$_POST['email'];
        // $_SESSION['id']=$num['id'];
        // echo "<script>window.location.href='".$extra."'</script>";
        // exit();
        // }
        // else
        // {
        // $_SESSION['action1']="*Invalid username or password";
        // $extra="index.php";
        
        // echo "<script>window.location.href='".$extra."'</script>";
        // exit();
        // }
}
?>
<div class="admin-login">
<div class="container">
    <!--<img  src="https://markethubland.com/crm/assets/img/logo.png" />-->
    <h1 class="title"><b>Web-Craft-Pro</b></h1>
    <div class="card">
        <form id="login-form" class="login-form" action="" method="post">
            <p style="color: #F00"><?php echo $_SESSION['action1'];?><?php echo $_SESSION['action1']="";?></p>
            <input type="text" name="email" id="txtusername" class="form-control">         
           <input type="password" name="password" id="txtpassword" class="form-control"> 
            <div class="buttons">
              <!--<a href="#" class="register-link">Register</a>-->
                <button class="btn btn-primary btn-cons pull-right" name="login" type="submit">Login</button>
            </div>
        </form>
      
    </div>
    </div>
</div>
<?php
    include_once "includes/footer.php";
?>