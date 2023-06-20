<?php

require_once "konfiguracja.php";
 

$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";
 

if($_SERVER["REQUEST_METHOD"] == "POST"){
 


	
    if(empty(trim($_POST["username"]))){
        $username_err = "Prosze wprowadź nazwę użytkownika";
    } else{

        $sql = "SELECT id FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){

            mysqli_stmt_bind_param($stmt, "s", $param_username);
            

            $param_username = trim($_POST["username"]);
            

            if(mysqli_stmt_execute($stmt)){

                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "Ta nazwa użytkownika jest w tej chwili zajęta";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Coś poszło nie tak spróbuj ponownie później.";
            }


            mysqli_stmt_close($stmt);
        }
    }
    
	
	
    if(empty(trim($_POST["password"]))){
        $password_err = "Prosze wprowadź hasło";     
    } elseif(strlen(trim($_POST["password"])) < ){
        $password_err = "Hasło musi miec przynajmniej 5 znaków";
    } else{
        $password = trim($_POST["password"]);
    }
    


    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm password.";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Hasło nie pasuje";
        }
    }
    


    if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){
        

        $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){

            mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);
            
            // Set parameters            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); 
            

            if(mysqli_stmt_execute($stmt)){

                header("location: zalog.php");
            } else{
                echo "Coś poszło ne tk spróbuj ponownie później";
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
    <title>Rejestracja</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }
    </style>
</head>
<body>
    <div class="wrapper">
        <h2>Zarejestruj się</h2>
        <p>Prosze wypełnij dane potrzebne do rejestracji.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label>Użytkownik</label>
                <input type="text" name="username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
                <span class="invalid-feedback"><?php echo $username_err; ?></span>
            </div>    
            <div class="form-group">
                <label>Hasło</label>

 
				
                <input type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $password; ?>">

			
			
                <span class="invalid-feedback"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group">
                <label>Potwierdź hasło</label>
                <input type="password" name="confirm_password" class="form-control <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $confirm_password; ?>">
                <span class="invalid-feedback"><?php echo $confirm_password_err; ?></span>
            </div>
            <div class="form-group">



			
                <input type="submit" class="btn btn-primary" value="wprowadź">
                <input type="reset" class="btn btn-secondary ml-2" value="anuluj">
            </div>
            <p>Masz juz konto? <a href="zalog.php">Zaloguj się</a>.</p>
        </form>
    </div>    
</body>
</html>