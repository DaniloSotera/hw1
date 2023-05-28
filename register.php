<?php
    session_start();
    if(isset($_SESSION['username'])){
        header("Location: home.php");
        exit;
    }
    if( !empty($_POST['username']) &&
        !empty($_POST['password']) &&
        !empty($_POST['confirm_password']) &&
        !empty($_POST['email']) && !empty($_POST["allow"])){
        $error = array();
        $conn = mysqli_connect('localhost','root','','troina');
        # USERNAME
        if(!preg_match('/^[a-zA-Z0-9_]{1,15}$/', $_POST['username'])) {
            $error[] = "Username non valido";
        } else {
            $username = mysqli_real_escape_string($conn, $_POST['username']);
            // Cerco se l'username esiste già o se appartiene a una delle 3 parole chiave indicate
            $query = "SELECT username FROM users WHERE username = '$username'";
            $res = mysqli_query($conn, $query);
            if (mysqli_num_rows($res) > 0) {
                $error[] = "Username già utilizzato";
            }
        }
        # PASSWORD
        if (strlen($_POST["password"]) < 8) {
            $error[] = "Caratteri password insufficienti";
        } 
        # CONFERMA PASSWORD
        if (strcmp($_POST["password"], $_POST["confirm_password"]) != 0) {
            $error[] = "Le password non coincidono";
        }
        # EMAIL
        if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $error[] = "Email non valida";
        } else {
            $email = mysqli_real_escape_string($conn, strtolower($_POST['email']));
            $res = mysqli_query($conn, "SELECT email FROM users WHERE email = '$email'");
            if (mysqli_num_rows($res) > 0) {
                $error[] = "Email già utilizzata";
            }
        }
        # REGISTRAZIONE NEL DATABASE
        if (count($error) == 0) {
            $username = mysqli_real_escape_string($conn, $_POST['username']);
            $password = mysqli_real_escape_string($conn, $_POST['password']);
            $password = password_hash($password, PASSWORD_BCRYPT);
            $email = mysqli_real_escape_string($conn, strtolower($_POST['email']));
            $query = "INSERT INTO users(username, password, email) VALUES('$username', '$password', '$email')";
            
            if (mysqli_query($conn, $query)) {
                $_SESSION["_agora_username"] = $_POST["username"];
                $_SESSION["_agora_user_id"] = mysqli_insert_id($conn);
                mysqli_close($conn);
                header("Location: home.php");
                exit;
            } else  {
                $error[] = "Errore di connessione al Database";
            }
        }

        mysqli_close($conn);
    } else if (isset($_POST["username"]) || isset($_POST["password"]) || isset($_POST["confirm_password"]) || isset($_POST["email"])) {
        $error = array("Compila tutti i campi");
    }


?>
<html>
    <head>
        <link rel='stylesheet' href='register.css'>
        <script src='register.js' defer></script>

        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <meta charset="utf-8">

        <title>Iscriviti - Musity</title>
    </head>
    <body>
        <main>
        <section class="main_right">
            <h1>Iscriviti gratuitamente per conoscere gli eventi di Troina</h1>
            <form name='signup' method='post' enctype="multipart/form-data" autocomplete="off">
                <div class="username">
                    <label for='username'>Nome utente</label>
                    <input type='text' name='username' <?php if(isset($_POST["username"])){echo "value=".$_POST["username"];} ?>>
                    <div><img src="../hw1/imgm//close.svg"/><span>Nome utente non disponibile</span></div>
                </div>
                <div class="email">
                    <label for='email'>Email</label>
                    <input type='text' name='email' <?php if(isset($_POST["email"])){echo "value=".$_POST["email"];} ?>>
                    <div><img src="../hw1/imgm//close.svg"/><span>Indirizzo email non valido</span></div>
                </div>
                <div class="password">
                    <label for='password'>Password</label>
                    <input type='password' name='password' <?php if(isset($_POST["password"])){echo "value=".$_POST["password"];} ?>>
                    <div><img src="../hw1/imgm//close.svg"/><span>Inserisci almeno 8 caratteri</span></div>
                </div>
                <div class="confirm_password">
                    <label for='confirm_password'>Conferma Password</label>
                    <input type='password' name='confirm_password' <?php if(isset($_POST["confirm_password"])){echo "value=".$_POST["confirm_password"];} ?>>
                    <div><img src="../hw1/imgm//close.svg"/><span>Le password non coincidono</span></div>
                </div>
                <div class="allow"> 
                    <input type='checkbox' name='allow' value="1" <?php if(isset($_POST["allow"])){echo $_POST["allow"] ? "checked" : "";} ?>>
                    <label for='allow'>Accetto i termini e condizioni d'uso.</label>
                </div>
                <?php if(isset($error)) {
                    foreach($error as $err) {
                        echo "<div class='errorj'><img src='../hw1/imgm//close.svg'/><span>".$err."</span></div>";
                    }
                } ?>
                <div class="submit">
                    <input type='submit' value="Registrati" id="submit">
                </div>
            </form>
            <div class="signup">Hai un account? <a href="login.php">Accedi</a>
        </section>
        
        <div class=overlay> <img src="../hw1/imgm/cordoni.jpg" alt=""></div>
        </main>
    </body>
</html>
