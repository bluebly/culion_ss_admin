<?php
  include('../includes/_conn.php');
  function search($conn, $referenceNumber, $requestorName, $requestedPatient, $dateRequested, $requestStatus) {
    $query = "SELECT A.REF_NO, CONCAT(A.REQ_FNAME, ' ', TRIM(CONCAT(A.REQ_MNAME, ' ', A.REQ_LNAME))) AS NAME, 
        CONCAT(TRIM(CONCAT(B.PREFIX_NAME, ' ', B.F_NAME)), ' ', TRIM(CONCAT(B.M_NAME, ' ')), ' ', TRIM(CONCAT(B.L_NAME, ' ', B.SUFFIX_NAME))) P_NAME,
        A.REQ_FNAME, A.REQ_MNAME, A.REQ_LNAME, A.REQ_RELATION, A.REQ_ADDRESS, A.REQ_MOBILE_NO, A.REQ_EMAIL_ADD, A.REQ_PURPOSE, A.DATE_REQUESTED, A.STATUS,
        CASE WHEN A.STATUS = 0 THEN 'Pending' 
        WHEN A.STATUS = 1 THEN 'Approved' 
        WHEN A.STATUS = 2 THEN 'Rejected' END AS STATUS 
      FROM tbl_request A, tbl_patient B 
      WHERE A.PATIENT_ID = B.ID AND 
        A.REF_NO LIKE '%" . $referenceNumber . "%' AND 
        (A.REQ_FNAME LIKE '%" . $requestorName . "%' OR 
          A.REQ_MNAME LIKE '%" . $requestorName . "%' OR 
          A.REQ_LNAME LIKE '%" . $requestorName . "%') AND
        (B.F_NAME LIKE '%" . $requestedPatient . "%' OR 
          B.M_NAME LIKE '%" . $requestedPatient . "%' OR 
          B.L_NAME LIKE '%" . $requestedPatient . "%' OR 
          B.PREFIX_NAME LIKE '%" . $requestedPatient . "%' OR 
          B.SUFFIX_NAME LIKE '%" . $requestedPatient . "%') AND
          (A.DATE_REQUESTED = '" . $dateRequested . "' OR COALESCE('" . $dateRequested . "', '') = '') AND
          (A.STATUS = '" . $requestStatus . "' OR COALESCE('" . $requestStatus . "', '') = '')";
    $queryResult = $conn->query($query);

    $result = array();

    while ($fetchData = $queryResult->fetch_assoc()) {
      $result[] = $fetchData;
    }

    return $result;
  }

  function respond($conn, $referenceNumber, $response) {
    $conn->query("UPDATE tbl_request SET status = '" . $response . "' WHERE REF_NO = '" . $referenceNumber . "'");

    return $conn->affected_rows;
  }

  if (isset($_POST['action'])) {
    switch ($_POST['action']) {
      case 'SEARCH':
        $result = search($conn, $_POST['referenceNumber'], $_POST['requestorName'], $_POST['requestedPatient'], $_POST['dateRequested'], $_POST['requestStatus']);
        echo json_encode($result);
        break;
      case 'RESPOND':
        $result = respond($conn, $_POST['referenceNumber'], $_POST['response']);
        $isSuccess = $result > 0 ? 'Y' : 'N';
        echo $isSuccess;
        break;
      default:
        break;
    }
  }
?>
