<?php
require "./models/agent.model.php";
if(isset($_POST['submit'])){
    // get values send from user
    $email = $_POST['email'];
    $password = $_POST['password'];
    // check for empty values
    if(empty($email) || empty($password)){
        $error = "The information that you have submitted are not enough!";
        include "./views/login.view.php";
    }else{
        // search for Agent in database
        $Agent = new Agent();
        $Agent->searchForAgent($email);

        // prepare Agent daya object
        $userData = (object)[];
        $userData->id = $Agent->getId();
        $userData->name = $Agent->getName();
        $userData->email = $Agent->getEmail();
        $userData->password = $Agent->getPassword();
        // verify password if a user found
        if(password_verify($password,$userData->password)){
            //generate a token to send it with the response 
            $key = "token";
            $token = generateToken($userData->id);

            // check if remember me is checked
            if(isset($_POST['rememberme'])){   

                // Set login cookie
                    $exp = time() + 86400 * 30;
                    setcookie($key,$token,$exp);
            }

            // Set login session
                session_start();
                $_SESSION[$key] = $token;
                /* $_SESSION['logged'] = 1;
                    $_SESSION['id'] = 1;*/
                // Got to home page
                header("location: ./");
        }else{
            $error = "That's not your password, please resubmit your correct password";
            include "./views/login.view.php";
        }
    }
}else{
    include "./views/login.view.php";
}