<!doctype html>
<html lang="en">
  <head>
<meta name="viewport" content="width=device-width, initial-scale=1">
    <?php
      include('../includes/_common-styles.php');
      include('../includes/_utilities.php');
    ?>
    <link rel="stylesheet" href="../assets/css/home.css">
  </head>

  <body>
    <nav class="navbar navbar-dark justify-content-between mb-2" style="background-color: #337E9B;">
      <span class="navbar-brand">Culion Search Engine Admin</span>
      <form class="form-inline">
        <button class="btn btn-outline-danger my-2 my-sm-0" type="submit">Logout</button>
      </form>
    </nav>
    <div class="row">
      <div class="col-12">
        <div class="tab">
          <button class="tablinks" def="ra" id="defaultOpen">Request Approval</button>
          <button class="tablinks" def="pm">Patient's Maintenance</button>
          <button class="tablinks" def="fb">Feedback</button>
        </div>

        <div id="ra" class="tabcontent">
          <div id="requestApprovalPage">
            <?php include('requestApproval.php'); ?>
          </div>
          <div id="requestDetailsPage">
            <?php include('requestDetails.php'); ?>
          </div>
        </div>

        <div id="pm" class="tabcontent">
          <?php include('patientsMaintenance.php'); ?>
        </div>

        <div id="fb" class="tabcontent">
          <?php include('feedback.php'); ?>
        </div>
      </div>
    </div>

    <?php include('../includes/_footer.php'); ?>
    <script src="../assets/js/home.js"></script>
  </body>
</html>
