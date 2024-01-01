
<?php
    session_start();
    ob_start();
    include "../model/connectdb.php";
    include "../model/userdb.php";
    if((isset($_POST['user_check']))&&($_POST['user_check']))
    {
        $user=$_POST['username'];
        $pass=$_POST['password'];
        $role= check_user($user,$pass);
        $_SESSION['name']=$user;
        $_SESSION['role']=$role;
        // var_dump($role);
        if($role==1)
        {
            header('location: admin.php?act=statistic');
        }
        else 
        {
            $txt_erro="Username or Password wrong or account dosen't exist!";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta content="initial-scale=1, minimum-scale=1, width=device-width" name="viewport">
  <meta name="robots" content="all,follow">
  <title>Login</title>
  <link rel="icon" href="images/logo.png" sizes="32x32">
  <!-- inject:css -->
  <link rel="stylesheet" href="vendors/fomantic-ui/semantic.min.css">
  <link rel="stylesheet" href="css/main.css">
  <!-- endinject -->
</head>

<body>
  <div class="ui container centered grid">
    <div class="five wide computer sixteen wide tablet sixteen wide phone column" style="margin-top: 10%;">
        <div class="ui segment">
          <img class="ui centered medium image" src="images/login-logo.png" alt=""><br>
          <div class="ui form">
            <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
              <div class="field">
                <label>User name</label>
                <input name="username" placeholder="username" type="text">
              </div>
              <div class="field">
                <label>Password</label>
                <input name="password" placeholder="password" type="password">
              </div>
              <!-- <a href="" style="width: 100%;" class="ui blue button">
              <i class="sign in alternate icon"></i>
              LOGIN
              </a> -->
              <input class="ui blue button" type="submit" name="user_check" value="Login">
              <br>

              <?php
                if(isset($txt_erro)&&($txt_erro!=""))
                {
                  echo "<font color='red'>".$txt_erro."</font>";
                }
              ?>
            </form>
            <br>
            <!-- <a href="admin.php?acc=regis" style="width: 100%;" class="ui blue button">
            <i class="fingerprint icon"></i>
            REGISTER
            </a> -->
          </div>
        </div>
      <div>
</div>
    </div>
  </div>
</body>
<!-- inject:js -->
<script src="vendors/jquery/jquery.min.js"></script>
<script src="vendors/fomantic-ui/semantic.min.js"></script>
<script src="js/main.js"></script>
<!-- endinject -->

</html>