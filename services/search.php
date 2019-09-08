<?php

  include '../includes/_conn.php';


  $queryResult = $conn->query("SELECT ID, L_NAME, F_NAME, M_NAME, PREFIX_NAME, SUFFIX_NAME, GENDER FROM tbl_patient
    WHERE (L_NAME LIKE '%" . $_POST['filter'] . "%' OR F_NAME LIKE '%" . $_POST['filter'] . "%' OR
      M_NAME LIKE '%" . $_POST['filter'] . "%' OR PREFIX_NAME LIKE '%" . $_POST['filter'] . "%' OR
      SUFFIX_NAME LIKE '%" . $_POST['filter'] . "%') AND 
      ('" . $_POST['gender'] . "' = '' OR GENDER = '" . $_POST['gender'] . "') AND 
      ('" . $_POST['nationality'] . "' = '' OR UCASE(NATIONALITY) LIKE UCASE('%" . $_POST['nationality'] . "%')) AND 
      ('" . $_POST['race'] . "' = '' OR UCASE(RACE) LIKE UCASE('%" . $_POST['race'] . "%')) AND 
      ('" . $_POST['birthPlace'] . "' = '' OR UCASE(BIRTHPLACE) LIKE UCASE('%" . $_POST['birthPlace'] . "%')) AND 
      ('" . $_POST['yearOfDeath'] . "' = '' OR YR_OF_DEATH LIKE '%" . $_POST['yearOfDeath'] . "%') AND 
      ('" . $_POST['dateAdmitted'] . "' = '' OR   DATE_ADMITTED LIKE '%" . $_POST['dateAdmitted'] . "%') AND 
      ('" . $_POST['durationOfLeprosy'] . "' = '' OR DUR_OF_LEP LIKE '%" . $_POST['durationOfLeprosy'] . "%') AND 
      ('" . $_POST['lastPlaceOfResidency'] . "' = '' OR LST_PLACE_OF_RES LIKE '%" . $_POST['lastPlaceOfResidency'] . "%') AND 
      ('" . $_POST['otherDiseases'] . "' = '' OR OTH_DISEASE LIKE '%" . $_POST['otherDiseases'] . "%')");

  $result = array();

  while ($fetchData = $queryResult->fetch_assoc()) {
    $result[] = $fetchData;
  }

  echo json_encode($result);
?>
