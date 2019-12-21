<?php require("inc/header.php") ?>

    <?php

        require("db.php");
        

        $errors = [];
        $redirectToLogin = false;
        
        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            // echo '<pre>' , print_r($_POST) . '</pre>';
            
            if (!empty($_POST["signup"])) {
                
                $username  = clean_input($_POST["username"]);
                $email     = clean_input($_POST["email"]);
                $password1 = clean_input($_POST["password1"]);
                $password2 = clean_input($_POST["password2"]);
    
                if (empty($email)){
                    $errors[] = "email field is empty";
                }
                if (!empty($email) && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $errors[] = "Invalid email format";
                }
                if (empty($password1)){
                    $errors[] = "password field is empty";
                }
                if (empty($password2)){
                    $errors[] = "second password field is empty";
                }
                if (!empty($password1) && !empty($password2) && 
                $password1  != $password2){
                    $errors[] = "passwords do not match";
                }
                
                if (sizeof($errors) == 0){
                    $o = checkIfUserExists($username);
                    $o2 = checkIfEmailExists($email);

                    if ($o->num_rows > 0){
                        $errors[] = "Username already taken";
                    }
                    if ($o2->num_rows > 0){
                        $errors[] = "Email already taken";
                    }
                    if (sizeof($errors) == 0){
                        addToDatabase($username, $email, $password1);
                    }
                }
            } else if (!empty($_POST["signin"])){
                // echo "hi<br>";
                $username  = clean_input($_POST["username"]);
                $password = clean_input($_POST["password"]);

                $userObject = checkIfUserExists($username);
                if ($userObject->num_rows > 0){
                    // echo '<pre>' , print_r($user) . '</pre>';
                    // echo '<pre>' , print_r($user->fetch_assoc()) . '</pre>';
                    $user = $userObject->fetch_assoc();
                    $encryptedPassword = $user["password"];
                    // echo "{$encryptedPassword}<br>";

                    if (!password_verify($password, $encryptedPassword)) {
                        $errors[] = "Wrong password";
                    }
                } else {
                    $errors[] = "Username does not exist";
                }
            } 
        } //END POST
        else {
            $errors[] = "ERROR: You didn't get here via POST! You will be redirected!";
            $redirectToLogin = true;
        }

        $successful = empty($errors);

    ?>

    <?php 
        if (!$successful) {
            
            echo "<div id='error_div' class='alert alert-danger'>";
            
            foreach ($errors as $error) {
                echo "<strong>$error</strong><br>";
            }
            
            echo "</div>";

        }
        if ($successful) {

            echo "<div id='error_div' class='alert alert-success'>";
            echo "Welcome <strong>{$_POST['username']}</strong>";
            echo "</div>";

        }

        if ($redirectToLogin) {
            echo "<script>
                setInterval(function(){
                    window.location.replace('login.php');
                },3000);
            </script>"; 
        }
    ?>

<?php require("inc/footer.php") ?>