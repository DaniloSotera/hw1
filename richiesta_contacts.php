<?php
     session_start();
     if(!isset($_SESSION['username'])){
         header("Location: login.php");
         exit;
     }
    $conn = mysqli_connect('localhost','root','','troina');
    $query = "SELECT * FROM contacts";
    $res = mysqli_query($conn, $query) or die(mysqli_error($conn));
    $data = array();
    while ($row = mysqli_fetch_assoc($res)) {
    $data[] = $row;
   }
    echo json_encode($data);
    mysqli_close($conn);
?>