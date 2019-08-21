<?php
  try {
    $conn = new mysqli("localhost", "root", "", "test");
    if ($conn) {
      // echo "Connection Successful";
    } else {
      echo "<script type='text/javascript'>alert('Connection Failed');</script>";
      exit();
    }
  } catch (Exception $e) {
    echo $e->getMessage();
  }
?>
