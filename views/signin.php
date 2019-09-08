<!doctype html>
<html lang="en">
  <head>
    <?php
      include('../includes/_common-styles.php');
      include('../includes/_utilities.php');
    ?>
    <link rel="stylesheet" href="../assets/css/signin.css">
  </head>

  <body class="text-center">
    <div class="form-signin">
      <div class="row mt-3 pt-3 pb-3 form-signin-body">
        <div class="offset-1 col-10">
          <div class="row align-items-center loginHeader">
            <div class="col-12 loginText">
              <span><?php echo $title; ?></span>
            </div>
          </div>
        </div>
        <div class="offset-2 col-8 mt-4">
          <div class="row align-baseline">
            <div class="col-3">
              <label for="inputEmail">Username</label>
            </div>
            <div class="col-9">
              <div class="inner-addon left-addon">
                <i class="fa fa-lg fa-user"></i>
                <input type="text" class="form-control" id="username">
              </div>
            </div>
          </div>
          <div class="row align-baseline">
            <div class="col-3">
              <label for="inputPassword">Password</label>
            </div>
            <div class="col-9">
              <div class="inner-addon left-addon">
                <i class="fa fa-lg fa-key"></i>
                <input type="password" class="form-control" id="password">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col text-right">
              <span class="text-danger mr-3" id="errorMsg"></span>
              <button class="btn btn-md btn-primary" id="btnLogin">
                Login<span class="fa fa-sign-in ml-3 text-white"></span>
              </button>
            </div>
          </div>
        </div>
      </div>
    <?php include('../includes/_footer.php'); ?>
    <script src="../assets/js/signin.js"></script>
  </body>
</html>
