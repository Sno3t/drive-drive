<?php
    // use strict typed programming

    if ($_SERVER['REQUEST_METHOD'] === "POST") {
        if(!empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['password_repeat']) && !empty($_POST['email'])){

        // Check if the values are correct
            if ($_POST['password'] !== $_POST['password_repeat']) {
               header("refresh:5;url=../views/register.html");
               echo 'de twee wachtwoorden komen niet overeen'; 
            }else{
                // Validation on input
                // ...
                $username = htmlspecialchars($_POST['username']);
                $password = htmlspecialchars($_POST['password']);
                $email = htmlspecialchars($_POST['email']);
                // Retrieve the login data:
                // ...
                $password_hash = password_hash($password, PASSWORD_BCRYPT); // htmlspecialchars()

                // Set the default values for the database (unsafe):
                    $host = 'localhost';
                    $db   = 'file_uploader';
                    $user = 'root';
                    $pass = 'root';
                    $charset = 'utf8';
        
                    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
                    $options = [
                        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                        PDO::ATTR_EMULATE_PREPARES   => false,
                    ];

                try {
                    // Create a database connection
                    $pdo = new PDO($dsn, $user, $pass, $options);
                    // Insert the user into to database, using prepare()

                    $stmt = $pdo->prepare("INSERT INTO `account`(`ID`, `Username`,`Hashpassword`,`email`,`bevoegtheid`) VALUES (NULL,?,?,?,1)");
                    $stmt->execute([$username,$password_hash,$email]);
                    if ($stmt->rowCount() === 1) {
                        //header("redirect:5;url=?");
                        echo "registratie is succesvol";
                    } else if ($stmt->errorCode === '23000') {
                        // Username already exists. Try another username.
                        throw new PDOException("deze gebruikersnaam bestaat al <a href='../views/register.html'>terug</a>");
                        // Create a link to the registration page.
                    } else {
                        // General error. Give a general message 
                        throw new PDOException("er is iets misgegaan <a href='../views/register.html'>terug</a><br>" . $stmt->errorInfo() . " " . $stmt->errorCode());
                        // Then give the errorInfo() and errorCode() in parenthesis.
                    }
                } catch (PDOException $e) {
                // Give an error message:
                 echo $e->getMessage();
                }
            }
        }
    }