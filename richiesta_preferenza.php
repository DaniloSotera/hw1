<?php
    session_start();
    if(!isset($_SESSION['username'])){
        header("Location: login.php");
        exit;
    }
    $conn = mysqli_connect('localhost','root','','troina');
    //join fra due tabelle di nome info e star
    $query = "SELECT id,titolo,path FROM info JOIN star ON id = star.id_festa WHERE star.user = '".$_SESSION['username']."'";
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
