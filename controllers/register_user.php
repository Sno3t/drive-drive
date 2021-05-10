<?php
    // use strict typed programming
    session_start();
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

                    $stmt = $pdo->query("SELECT COUNT(*) FROM account WHERE Username = $username OR email = $email;");
                    if($count = $stmt->fetchColumn() < 1){
                        $stmt2 = $pdo->prepare("INSERT INTO `account`(`ID`, `Username`,`Hashpassword`,`email`,`bevoegtheid`) VALUES (NULL,?,?,?,1);");
                        $stmt2->execute([$username,$password_hash,$email]);
                        if ($stmt2->rowCount() === 1) {
                            header("redirect:5;url=../views/overview.html");
                            $_SESSION["username"] = $username;
                            $_SESSION["loggedin"] = true;
                            echo "registratie is succesvol";
                        } else {
                            // General error. Give a general message 
                            throw new PDOException("er is iets misgegaan <a href='../views/register.html'>terug</a><br>" . $stmt->errorInfo() . " " . $stmt->errorCode());
                            // Then give the errorInfo() and errorCode() in parenthesis.
                        }
                    } else{
                        throw new PDOException("username or email is already in use <a href='../views/register.html'>terug</a>");
                    }
                } catch (PDOException $e) {
                // Give an error message:
                 echo $e->getMessage();
                }
            }
        }
    }