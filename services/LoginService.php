<?php
  include('../includes/_conn.php');
  function signin($conn, $username, $password) {
    $queryResult = $conn->query("SELECT * FROM tbl_admin WHERE user_id = '" .
      $username . "' AND password = AES_ENCRYPT('" . $password . "', 'pw')");

    $result = array();

    while ($fetchData = $queryResult->fetch_assoc()) {
      $result[] = $fetchData;
    }

    return count($result) > 0;
  }

  if (isset($_POST['action'])) {
    switch ($_POST['action']) {
      case 'SIGNIN':
        $success = signin($conn, $_POST['username'], $_POST['password']);
        $isValid = $success ? 'Y' : 'N';
        $message = $success ? '' : 'Invalid credentials!';

        $response = (object) array('isValid' => $isValid, 'message' => $message);
        echo json_encode($response);
        break;
      default:
        break;
    }
  }
?>
