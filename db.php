<?php

    function clean_input($input) {
        $input = trim($input);
        $input = stripslashes($input);
        $input = htmlspecialchars($input);
        return $input;
    }


    function executequery($sql){
        $link = mysqli_connect("localhost", "root", "", "registration");

        if (!$link) {
            echo "Error: Unable to connect to MySQL." . PHP_EOL . " <br>" . " <br>";
            echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL . " <br>" . " <br>";
            echo "Debugging error: " . mysqli_connect_error() . PHP_EOL . " <br>" . " <br>";
            die("Connection failed: " . $link.connect_error());
            // exit;
        }
        
        $ret = mysqli_query($link, $sql)
                or die("Mysql query has failed");
        
        //echo var_dump($new_row) . "<br>";
        mysqli_close($link);
        return $ret;
    }

    function addToDatabase($username, $email, $password){
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $new_row = "INSERT INTO `MyUser` (USERNAME, EMAIL, PASSWORD)
                    VALUES ('$username', '$email', '$hash')";

        return executequery($new_row);
    }

    function checkIfUserExists($username){
        $sql = "SELECT * FROM `MyUser` WHERE 
                    USERNAME='$username'";

        return executequery($sql);
    }

    function checkIfEmailExists($email){
        $sql = "SELECT * FROM `MyUser` WHERE 
                    EMAIL='$email'";

        return executequery($sql);
    }

?>