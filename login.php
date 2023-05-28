<?php
    session_start();
    if(isset($_SESSION['username'])){
        header("Location: home.php");
        exit;
    }
    if(!empty($_POST["username"]) &&
        !empty($_POST["password"])){  
        $conn = mysqli_connect('localhost','root','','troina');
        $username = mysqli_real_escape_string($conn, $_POST["username"]);
        $query = "SELECT * FROM users WHERE username = '".$username."'";
        $res = mysqli_query($conn, $query);
        if (mysqli_num_rows($res) > 0) {
            $entry = mysqli_fetch_assoc($res);
            if (password_verify($_POST['password'], $entry['password'])) {
                // Imposto una sessione dell'utente
                $_SESSION["username"] = $entry['username'];
                $_SESSION["_agora_user_id"] = $entry['id'];
                header('Location: home.php');
                mysqli_free_result($res);
                mysqli_close($conn);
                exit;
            }
        }
        // Se l'utente non è stato trovato o la password non ha passato la verifica
        $error = "Username e/o password errati.";
    }
    else if (isset($_POST["username"]) || isset($_POST["password"])) {
        // Se solo uno dei due è impostato
        $error = "Inserisci username e password.";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <title>Document</title>
</head>
    <body id="box_grande">
        <main id ="box_login">
          <form method ="post" autocomplete="off">
                <div class="username">
                    <label for='username'>Username</label>
                    <input type='text' name='username' <?php if(isset($_POST["username"])){echo "value=".$_POST["username"];} ?>>
                </div>
                <div class="password">
                    <label for='password'>Password</label>
                    <input type='password' name='password' <?php if(isset($_POST["password"])){echo "value=".$_POST["password"];} ?>>
                </div>
                <label>&nbsp;<input id ="login" type='submit'></label>
          </form>
         
        <a href="register.php">Non ti sei ancora registrato?</a>
        <div class=overlay> <img src="../hw1/imgm/cordoni.jpg" alt=""></div>
        </main>
        <?php
                // Verifica la presenza di errori
                if (isset($error)) {
                    echo "<p class='error'>$error</p>";
                }
                
            ?>
    </body>
</html>
