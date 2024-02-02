<?php
    $servername = "localhost";
    $username = "root";
    $password = "rivalityroot";
    $dbname = "SitterDB";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection Failed: " . $conn->connect_error . "<br>");
    }
    else
    {
        $enteredUsername = (string) $_POST["ID_Username"];
        $enteredPassword = (string) $_POST["ID_Password"];

        //At this point nothing was checked.
        $sqlConfirmUsername = "SELECT Username FROM Users WHERE Username='$enteredUsername' ; ";
        $returnedUsernameQuery = $conn->query($sqlConfirmUsername);
        $returnedUsername = $returnedUsernameQuery->fetch_assoc();
        if($returnedUsernameQuery->num_rows <= 0)
        {
            echo("Invalid Username or Password.");
        }
        else
        {
            //At this point the user entered the correct username and password has not been checked.
            $sqlConfirmPassword = "SELECT Password FROM Users WHERE Username='$enteredUsername' ; ";
            $returnedPasswordQuery = $conn->query($sqlConfirmPassword);
            $returnedPassword = $returnedPasswordQuery->fetch_assoc();
            $formatReturnedPassed = $returnedPassword["Password"];

            $sqlConfirmUserQuery = "SELECT * FROM Users WHERE Username='$enteredUsername' AND Password='$enteredPassword' ; ";
            $sqlReturnedConfirmUser = $conn->query($sqlConfirmUserQuery);
            $returnedUser = $sqlReturnedConfirmUser->fetch_assoc();

            if($sqlReturnedConfirmUser->num_rows > 0)
            {
                //At this point the user entered the correct username and password.
                $sqlConfirmRole = "SELECT Role FROM Users WHERE Username='$enteredUsername' AND Password='$enteredPassword'; ";
                $returnedRoleQuery = $conn->query($sqlConfirmRole);
                $returnedRole = $returnedRoleQuery->fetch_assoc();
                $formatRole = $returnedRole["Role"];

                if($formatRole == 'S')
                {
                    header("Location: sitter.html");
                    exit();
                }

                if($formatRole == 'C')
                {
                    header("Location: client.html");
                    exit();
                }

                if($formatRole == 'H')
                {
                    header("Location: handler.html");
                    exit();
                }
            }
            else
            {
                echo("Invalid Username or Password.");
            }            
        }
    }
    $conn->close();
?>