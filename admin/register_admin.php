<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta content="initial-scale=1, minimum-scale=1, width=device-width" name="viewport">
  <meta name="robots" content="all,follow">
  <title>Register</title>
  <link rel="icon" href="images/logo.png" sizes="32x32">
  <!-- inject:css -->
  <link rel="stylesheet" href="vendors/fomantic-ui/semantic.min.css">
  <link rel="stylesheet" href="css/main.css">
  <!-- endinject -->
</head>

<body>
  <div class="right floated thirteen wide computer sixteen wide phone column" id="content">
  <div class="ui container grid">
    <div class="row">
      <div class="fifteen wide computer sixteen wide phone centered column center-table">
        <div class="ui divider"></div>
        <div class="ui grid">
          <div class="sixteen wide computer sixteen wide phone centered column">
            <!-- BEGIN DATATABLE -->
            <div class="ui stacked segment">
              <div class="ui blue ribbon icon label">Register User</div>
              <br><br>
              <?php
              // echo var_dump($result);
              ?>
                <form action="admin.php?acc=register_account" method="POST">
                    <label>Name</label>
                    <input type="text" name="name" placeholder="Enter you name"></input>
                    <label>Address</label>
                    <input type="text" name="address" placeholder="Enter your address"></input>
                    <label>Email</label>
                    <input type="text" name="mail" placeholder="Enter your email" ></input>
                    <label>User</label>
                    <input type="text" name="user" placeholder="Enter User Name"></input>
                    <label>Password</label>
                    <input type="password" name="password" placeholder="Enter password"></input>
                    <input type="hidden" name="role" value="1">
                    <input type="submit" name="submit" value="Register"></input>
                    <br>
                    <input type="submit" name="submit" value="Back Page"></input>
                </form>
            </div>
            <!-- END DATATABLE -->
          </div>
        </div>
      </div>
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