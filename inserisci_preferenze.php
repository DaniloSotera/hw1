<?php
    session_start();
    if(!isset($_SESSION['username'])){
        header("Location: login.php");
        exit;
    }
    festa();
    function festa(){
        $conn = mysqli_connect('localhost','root','','troina');
        #costruisco la query
        $user = mysqli_real_escape_string($conn, $_SESSION['username']);
        $id = mysqli_real_escape_string($conn, $_POST['id']);
        #check if event is already present for user
        $query = "SELECT * FROM star WHERE user = '$user' AND id_festa = '$id'";
        $res = mysqli_query($conn, $query) or die(mysqli_error($conn));
        #if event is already present, do nothing
        if(mysqli_num_rows($res) > 0) {
            echo json_encode(array('ok' => true));
            exit;
        }
        #eseguo
        $query = "INSERT INTO star(user,id_festa) VALUES('$user','$id')";
        error_log($query);
        #se corretta, ritorna un JSON con {ok: true}
        if(mysqli_query($conn, $query) or die(mysqli_error($conn))) {
            echo json_encode(array('ok' => true));
            exit;
        }
        mysqli_close($conn);
        echo json_encode(array('ok' => false));
    }




?>
