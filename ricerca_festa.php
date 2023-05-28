<?php
    session_start();
    if(!isset($_SESSION['username'])){
        header("Location: login.php");
        exit;
    }
    $conn=mysqli_connect("localhost","root","","troina");
    $username=$_SESSION['username'];
    $query = "SELECT * FROM info JOIN star ON titolo = '".$_POST['titolo']."' WHERE star.user = '$username'";

    $res=mysqli_query($conn,$query);
    if(mysqli_num_rows($res)>0){
        echo json_encode(array('ok' => true));
        mysqli_close($conn);
        exit;
    }
    echo json_encode(array('ok' => false));
    mysqli_close($conn);
?>