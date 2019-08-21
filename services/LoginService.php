<?php
  include('../includes/_conn.php');
  function signin($conn, $username, $password) {
    $queryResult = $conn->query("SELECT * FROM users WHERE username = '" .
      $username . "' AND password = '" . $password . "'");

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
        $message = $success ? '' : 'Invalid credentials';

        $response = (object) array('isValid' => $isValid, 'message' => $message);
        echo json_encode($response);
        break;
      default:
        break;
    }
  }
?>
