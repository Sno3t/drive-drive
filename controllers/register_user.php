<?php
    // use strict typed programming

    if ($_SERVER['REQUEST_METHOD'] === "POST") {

        // Check if the values are correct
        if ($_POST['password'] !== $_POST['password_repeat']) {
            // passwords are NOT identical
        }
        // Validation on input
        // ...

        // Retrieve the login data:
        // ...
        $password_hash = password_hash($_POST['password'], PASSWORD_BCRYPT); // htmlspecialchars()

        // Set the default values for the database (unsafe):

        try {
            // Create a database connection

            // Insert the user into to database, using prepare()

            $stmt = "";

            if ($stmt->rowCount() === 1) {
                // Successful registration!
                // Redirect to login page, after 5 seconds.
            } else if ($stmt->errorCode === '23000') {
                // Username already exists. Try another username.
                // Create a link to the registration page.
            } else {
                // General error. Give a general message.
                // Then give the errorInfo() and errorCode() in parenthesis.
            }
        } catch (PDOException $e) {
            // Give an error message:

        }

    }