<?php
    session_start();
    if(!isset($_SESSION['username'])){
        header("Location: login.php");
        exit;
    }
    $conn = mysqli_connect('localhost','root','','troina');
    $query = "SELECT * FROM star WHERE user='".$_SESSION['username']."' AND id_festa='".$_POST['id']."'";
    $result = mysqli_query($conn, $query);
    // Conversione dei dati in un array di dati PHP 
    $data = array();
    while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
    }
    // Codifica dell'array di dati come JSON
    echo json_encode($data);
    mysqli_close($conn);
?>