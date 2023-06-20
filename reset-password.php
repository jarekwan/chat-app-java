<?php

session_start();
 

if(!isset($_SESSION["logged"]) || $_SESSION["logged"] !== true){
    header("location: zalog.php");
    exit;
}
 

require_once "konfiguracja.php";

$new_password = $confirm_password = "";
$new_password_err = $confirm_password_err = "";
 

if($_SERVER["REQUEST_METHOD"] == "POST"){
 

    if(empty(trim($_POST["new_password"]))){
        $new_password_err = "Prosze wprowadź nowe hasło.";     
    } elseif(strlen(trim($_POST["new_password"])) < 5){
        $new_password_err = "Hasło musi sie skladać z przynajmniej 5 znaków.";
    } else{
        $new_password = trim($_POST["new_password"]);
    }
    

    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Prosze potwierdź nowe hasło.";
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($new_password_err) && ($new_password != $confirm_password)){
            $confirm_password_err = "Hasło nie pasuje.";
        }
    }
        

    if(empty($new_password_err) && empty($confirm_password_err)){


        $sql = "UPDATE users SET password = ? WHERE id = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){

            mysqli_stmt_bind_param($stmt, "si", $param_password, $param_id);
            

            $param_password = password_hash($new_password, PASSWORD_DEFAULT);
            $param_id = $_SESSION["id"];

            if(mysqli_stmt_execute($stmt)){

                session_destroy();
                header("location: zalog.php");
                exit();
            } else{
                echo " coś nie tak sprobuj poźniej";
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
    <title>Reset Hasła</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }
    </style>
</head>
<body>
    <div class="wrapper">
        <h2>Reset Hasła</h2>
        <p>Wypełnij poniższe dane do resetowania hasła</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post"> 
            <div class="form-group">
                <label>Nowe Hasło</label>
                <input type="password" name="new_password" class="form-control <?php echo (!empty($new_password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $new_password; ?>">
                <span class="invalid-feedback"><?php echo $new_password_err; ?></span>
            </div>
            <div class="form-group">
                <label>Potwierdź hasło</label>
                <input type="password" name="confirm_password" class="form-control <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>">
                <span class="invalid-feedback"><?php echo $confirm_password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Wprowadź">
                <a class="btn btn-link ml-2" href="witam.php">Anuluj</a>
            </div>
        </form>
    </div>    
</body>
</html>