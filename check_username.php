<?php 
    if (!isset($_GET["q"])) {
        echo "Non dovresti essere qui";
        exit;
    }

    header('Content-Type: application/json');
    
    $conn = mysqli_connect('localhost','root','','troina');
    $username = mysqli_real_escape_string($conn, $_GET["q"]);

    $query = "SELECT username FROM users
                WHERE username = '$username'";

    $res = mysqli_query($conn, $query);

    echo json_encode(array('exists' => mysqli_num_rows($res) > 0 ? true : false));

    mysqli_close($conn);
?>