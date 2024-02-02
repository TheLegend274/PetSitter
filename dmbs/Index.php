<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css files/index.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Nunito+Sans:opsz@6..12&display=swap"
      rel="stylesheet"
    />
    <title>Log in</title>
  </head>
  <body>
    <div class="header">
      <h1>Pet Sitter Response Tracking System</h1>
    </div>

    <div class="box">
      <form method="post" class="form" action="./index.php">
        <h2>Sign in</h2>
        <div class="inputBox">
          <input
            type="text"
            required="required"
            placeholder="Username"
            class="Username"

            id="ID_Username"
            name="ID_Username"
          />
          <span>Username</span>
          <i></i>
        </div>

        <div class="inputBox">
          <input
            type="password"
            required="required"
            placeholder="Password"
            class="Password"

            id="ID_Password"
            name="ID_Password"
          />
          <span>Password</span>
          <i></i>
        </div>
        <input type="submit" value="Login" class="btn" />

        <h2 name="ID_ErrorLabel" id="ID_ErrorLabel" class="ID_ErrorLabel">   </h2>

      </form>
    </div>
  </body>
</html>

<?php
  if (isset($_POST['username']))
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
        echo "<p> Databse Connected </p>";

        $enteredUsername = (string) $_POST["ID_Username"];
        $enteredPassword = (string) $_POST["ID_Password"];

        //At this point nothing was checked.
        $sqlConfirmUsername = "SELECT Username FROM Users WHERE Username='$enteredUsername' ; ";
        $returnedUsernameQuery = $conn->query($sqlConfirmUsername);
        $returnedUsername = $returnedUsernameQuery->fetch_assoc();
        if($returnedUsernameQuery->num_rows <= 0)
        {
          if($enteredUsername == "")
              {

              }
              else
              {
                ShowError();
              }
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
                    header("Location: sitter.php");
                    exit();
                }

                if($formatRole == 'C')
                {
                    session_start();
                    $_SESSION['sentUsername'] = $enteredUsername;
                    header("Location: Client.php");
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
              if($enteredUsername == "")
              {

              }
              else
              {
                ShowError();
              }
            }            
        }
    }

    function ShowError()
    {
      echo '<script src="SitterDB-Javascript.js"></script>';
      echo '<script>ShowErrorLabel();</script>';
    }

    $conn->close();
?>


