<?php include('../config/constants.php') ?>

<html>
    <head>
        <title>Login - Online Resturant</title>
        <link rel="stylesheet" href="../css/admin.css">
    </head>

    <body>
        <div class="login">
            <h1 class="text-center">Login</h1>
            <br/><br/>


            <?php
                if(isset($_SESSION['login'])){
                    echo $_SESSION['login'];
                    unset($_SESSION['login']);
                }

                if(isset($_SESSION['no-login-message'])){
                    echo $_SESSION['no-login-message'];
                    unset($_SESSION['no-login-message']);
                }
                
            ?>

            <br/><br/>

            <!--Login form start-->
            <form action="" method="POST" class="text-center">
            Username:
            <br/>
            <input type="text" name="username" placeholder="Enter username">
            <br/><br/>
            Password:
            <br/>
            <input type="password" name="password" placeholder="Enter pawssord">
            <br/><br/>
            <input type="submit" name="submit" value="Login" class="btn-primary">
            <br/><br/>
            </form>

            <!--Login form end-->


            <p class="text-center">Created By - <a href="www.passwordcreators.com">Sick Security</a></p>
            
        </div>
    </body>

</html>

<?php
    if(isset($_POST['submit'])){
        $username = $_POST['username'];
        $password = md5($_POST['password']);

        $sql = "SELECT * FROM tbl_admin WHERE username='$username' AND password='$password'";
        $res = mysqli_query($conn, $sql);
        
        $count = mysqli_num_rows($res);

        if($count==1){
            $_SESSION['login'] = "<div class='text-center'> Login Sucessful!</div>";
            $_SESSION['user'] = $username;
            header('location:'.SITEURL.'admin/index.php');
            
        }
        else{
            $_SESSION['login'] = "Username or Password dose not match!";
            header('location:'.SITEURL.'admin/login.php');
        }

    }
?>