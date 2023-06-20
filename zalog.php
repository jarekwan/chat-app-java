<?php<?php


session_start();
 


if(isset($_SESSION["logged"]) && $_SESSION["logged"] === true){
    header("location: witam.php");
    exit;
}
 
require_once "konfiguracja.php";
 
$username = $password = "";
$username_err = $password_err = $login_err = "";
 
if($_SERVER["REQUEST_METHOD"] == "POST"){
 

    if(empty(trim($_POST["username"]))){
        $username_err = "Prosze wprowadź użytkownika";
    } else{
        $username = trim($_POST["username"]);
    }
    

    if(empty(trim($_POST["hasło"]))){
        $password_err = "Prosze wprowadź hasło";
    } else{
        $password = trim($_POST["hasło"]);
    }
    
    if(empty($username_err) && empty($password_err)){

        $sql = "SELECT id, username, password FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){

            mysqli_stmt_bind_param($stmt, "s", $param_username);
            

            $param_username = $username;
            

            if(mysqli_stmt_execute($stmt)){

                mysqli_stmt_store_result($stmt);
                

                if(mysqli_stmt_num_rows($stmt) == 1){                    
 
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
 
                            session_start();
                            
 
							
                            $_SESSION["logged"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;                            
                            
    
                            header("location: witam.php");
                        } else{

                            $login_err = "Nieprawidłowa nazwa uzytkownika albo hasło";
                        }
                    }
                } else{

                    $login_err = "Nieprawidłowa nazwa uzytkownika albo hasło.";
                }
            } else{
                echo "Coś poszło nie tak, spróbuj ponownie później";
            }

            mysqli_stmt_close($stmt);
        }
    }
    
    mysqli_close($link);

}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Logowanie</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }
    </style>
</head>
<body>
    <div class="wrapper">
        <h2>Logowanie</h2>
        <p>Prosze wypełnij dane logowania.</p>

        <?php 
        if(!empty($login_err)){
            echo '<div class="alert alert-danger">' . $login_err . '</div>';
        }        
        ?>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>"S>
                <span class="invalid-feedback"><?php echo $username_err; ?></span>
            </div>    
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="hasło" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>">
                <span class="invalid-feedback"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Zaloguj się">
            </div>
            <p>Nie masz konta? <a href="rejestracja.php">Zarejestruj się teraz</a>.</p>
        </form>
    </div>
</body>
</html>
</html>