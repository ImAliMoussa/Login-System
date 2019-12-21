<?php
    require("db.php");
    $link = mysqli_connect("localhost", "root", "", "registration");

    if (isset($_POST['username']) && isset($_POST['email'])){
        $user = checkIfUserExists($_POST['username']); 
        $email = checkIfEmailExists($_POST['email']);
        echo ($user->num_rows);
        echo ($email->num_rows);
    } else if (isset($_POST['username']) && isset($_POST['password'])){
        $username  = $_POST["username"];
        $password = $_POST["password"];

        $userObject = checkIfUserExists($username);
        if ($userObject->num_rows > 0){
            $user = $userObject->fetch_assoc();
            $encryptedPassword = $user["password"];

            if (!password_verify($password, $encryptedPassword)) {
                echo "1";
            } else {
                echo "0";
            }
        } else {
            echo "2";
        }
    }

    mysqli_close($link); 
?>