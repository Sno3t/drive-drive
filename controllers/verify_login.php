<?php
    // use strict typed programming

    if ($_SERVER['REQUEST_METHOD'] === "POST") {

        // start the session

        // Retrieve the login data:

        // Set the default values for the database (unsafe):

        try {
            // Create a database connection

            // Get the hash_code for this user:

            // An empty array is returned if there are zero results to fetch, or FALSE on failure.
            if ($hash_code === false) {
                // Invalid login
            } else {
                // check the hash_code
                if (!password_verify($login_password, $hash_code)) {
                    // Invalid login
                } else {
                    // valid login
                    // store session variables
                    // redirect to the user menu
                }
            }
        } catch (PDOException $e) {
            // Give an error message:

        }
    }