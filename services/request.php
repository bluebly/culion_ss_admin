<?php

  include '../includes/_conn.php';

  $queryResult = $conn->query("INSERT INTO `tbl_request`(`PATIENT_ID`, `REQ_FNAME`, `REQ_MNAME`, `REQ_LNAME`, `REQ_ADDRESS`, `REQ_MOBILE_NO`, `REQ_EMAIL_ADD`, `REQ_PURPOSE`, `REQ_RELATION`, `STATUS`) VALUES ('" . $_POST['patientId'] . "', '" . $_POST['firstName'] . "', '" . $_POST['middleName'] . "', '" . $_POST['lastName'] . "', '" . $_POST['address'] . "', '" . $_POST['mobileNo'] . "', '" . $_POST['emailAddress'] . "', '" . $_POST['purpose'] . "' , '" . $_POST['relation'] . "', '0')");

  $referenceResult = $conn->query("SELECT REF_NO FROM tbl_request WHERE ID = '" . $conn->insert_id . "'");
  $refNo = '';

  if (mysqli_num_rows($referenceResult) > 0) {
    while($row = $referenceResult->fetch_assoc()) {
      $refNo = $row["REF_NO"];
    }
  }

  echo json_encode((object) array('refNo' => $refNo));
?>
