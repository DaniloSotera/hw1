<?php
    session_start();
    if(!isset($_SESSION['username'])){
        header("Location: login.php");
        exit;
    }
    $conn = mysqli_connect('localhost','root','','troina');
    $query = "SELECT * FROM star WHERE user='".$_SESSION['username']."' and id_festa='".$_POST['id']."'";
    $res = mysqli_query($conn, $query) or die(mysqli_error($conn));
    #if event is already not  present, do nothing
    if(mysqli_num_rows($res) == 0) {
        echo json_encode(array('ok' => true));
        exit;
    }
    $query = "DELETE FROM star WHERE user='".$_SESSION['username']."' and id_festa='".$_POST['id']."'";
    $res = mysqli_query($conn, $query) or die(mysqli_error($conn));
    error_log($query);
    #se corretta, ritorna un JSON con {ok: true}
    if($res) {
        echo json_encode(array('ok' => true));
        exit;
    }
    mysqli_close($conn);
    echo json_encode(array('ok' => false));
?>