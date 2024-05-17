<?php
session_start();

include 'connect-edit.php';

$id = mysqli_real_escape_string($conn, $_POST['bookid']);

$sql = "DELETE FROM `book` WHERE BookID='$id'";

if (mysqli_query($conn, $sql)) {
    echo "Record deleted successfully.";
    $logMessage = "[" . date('Y-m-d H:i:s') . "] User ID: " . $_SESSION['ID'] . " have deleted Book $id.";
    file_put_contents('login_log.txt', $logMessage . PHP_EOL, FILE_APPEND);
    header("Location: admin_book_database.php");
    exit();
  } else {
    echo "Error deleting record: " . mysqli_error($conn);
  }
  
  mysqli_close($conn);
  ?>