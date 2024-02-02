<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="CSS Files\client.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Nunito+Sans:opsz@6..12&display=swap"
      rel="stylesheet"
    />
    <title>Client</title>
  </head>
  <body>
    <div class="header">

      <h1>Pet Sitter Response Tracking System</h1>

      <h2 name="ID_DateLabel" id="ID_DateLabel" class="ID_DateLabel"> DATE  </h2>
      
      <h3 name="ID_ClientHome" id="ID_ClientHome" class="ID_ClientHome">Client Home</h3>

      <div class="logoutbtn">
          <a href="index.php">  <button>Log Out</button>  </a>
      </div>

    </div>

    <div class="box">

      <h1>Request A Sitter</h1>

      <div class="total">

        <div class="drop">

          <form action="Client.php" method="post">

          <div class="commentTop">
            <div class="commentBox">
              <input type="text" class="comment" name="comment" id="comment" placeholder="Enter a comment" />
            </div>
          </div>
          
          

          <label for="sitters">Choose Sitter:</label>

            <select name="chosenSitter" id="chosenSitter">

              <?php
                $servername = "localhost";
                $username = "root";
                $password = "rivalityroot";
                $dbname = "SitterDB";

                $conn = new mysqli($servername, $username, $password, $dbname);

                if ($conn->connect_error) 
                {
                  die("Connection Failed: " . $conn->connect_error . "<br>");
                } 
                else
                {
                  $sqlNamesStatement = "SELECT FirstName, LastName FROM Users WHERE Role = 'S' ; ";
                  $sqlNamesQuery = $conn->query($sqlNamesStatement);

                  if ($sqlNamesQuery->num_rows > 0) 
                  {
                    while ($row = $sqlNamesQuery->fetch_assoc()) 
                    {
                      $FullName = $row['FirstName'] . " " . $row['LastName'];
                      
                      echo "<option value='" . $FullName . "'>" . $FullName . "</option>";
                    }
                  }
                  else
                  { 
                    echo "<option value=''>No options available</option>";
                  }
                }
                $conn->close();
              ?>
              
            </select>

            <label for="sitters">Choose Service:</label>

            <select name="chosenService" id="chosenService">
              <option value="Grooming">Grooming</option>
              <option value="Walking">Walking</option>
              <option value="Sitting">Sitting</option>
            </select>

              <input type="submit" value="Submit" class="btn" />

          </form>

          <?php
            echo '<script src="SitterDB-Javascript.js"></script>';
            echo '<script>ShowDate();</script>';
          ?>

        </div>

      </div>

    </div>

    <div class="box2">
      <div class="order">
        <h1>Order Status</h1>
      </div>

              <?php
                $servername = "localhost";
                $username = "root";
                $password = "rivalityroot";
                $dbname = "SitterDB";

                $conn = new mysqli($servername, $username, $password, $dbname);

                if ($conn->connect_error) 
                {
                  die("Connection Failed: " . $conn->connect_error . "<br>");
                } 
                else
                {
                  session_start();
                  $recievedUsername = $_SESSION['sentUsername'];

                  $sqlGetUserID = "SELECT UserID FROM Users WHERE Username='$recievedUsername'; ";
                  $returnedUserIDQuery = $conn->query($sqlGetUserID);
                  $returnedUserID = $returnedUserIDQuery->fetch_assoc();
                  $formatReturnedUserID = $returnedUserID["UserID"];

                  $sqlGetClientID = "SELECT ClientID FROM Clients WHERE UserID='$formatReturnedUserID'; ";
                  $returnedClientIDQuery = $conn->query($sqlGetClientID);
                  $returnedClientID = $returnedClientIDQuery->fetch_assoc();
                  $formatReturnedClientID = $returnedClientID["ClientID"];


                  $sqlDataQuery = "SELECT * FROM Requests WHERE ClientID = $formatReturnedClientID ; ";
                  $sqlRequests = $conn->query($sqlDataQuery);

                  if ($sqlRequests->num_rows > 0) {
                    echo "<table border='1' class='RequestTable' overflow-y:auto;>
                            <tr>
                                <th>Request ID</th>
                                <th>Type Of Request</th>
                                <th>Date</th>
                                <th>Service State</th>
                            </tr>";
                
                    while ($row = $sqlRequests->fetch_assoc()) {
                        echo "<tr>
                                <td>" . $row['RequestNumber'] . "</td>
                                <td>" . $row['TypeOfRequest'] . "</td>
                                <td>" . $row['Date'] . "</td>
                                <td>" . $row['ServiceState'] . "</td>
                              </tr>";
                    }
                
                    echo "</table>";
                  }
                  else
                  { 
                    echo "No Orders.";
                  }
                }
                $conn->close();
              ?>

    </div>
  </body>
</html>

<?php
  $recievedUsername = $_SESSION['sentUsername'];

  if ($_SERVER["REQUEST_METHOD"] == "POST") 
  {
    processFormData($recievedUsername);
  }

  function processFormData($passedUsername)
  {
    $servername = "localhost";
    $username = "root";
    $password = "rivalityroot";
    $dbname = "SitterDB";
  
    $conn = new mysqli($servername, $username, $password, $dbname);
  
    if ($conn->connect_error) 
    {
        die("Connection Failed: " . $conn->connect_error . "<br>");
    }
    else
    {
        $typeOfRequest = (string) $_POST["chosenService"];

        $comment = (string) $_POST["comment"];
  
        $serviceState = 'P';
  
        $sitterName = (string) $_POST["chosenSitter"];
        $sitterNameExpanded = explode(" ", $sitterName);
  
        $sqlGetSitterUserID = "SELECT UserID FROM Users WHERE FirstName='$sitterNameExpanded[0]' AND LastName='$sitterNameExpanded[1]'; ";
        $returnedSitterUserIDQuery = $conn->query($sqlGetSitterUserID);
        $returnedSitterUserID = $returnedSitterUserIDQuery->fetch_assoc();
        $formatReturnedSitterUserID = $returnedSitterUserID["UserID"];
  
        $sqlGetSitterID = "SELECT SitterID FROM Sitters WHERE UserID='$formatReturnedSitterUserID'; ";
        $returnedSitterIDQuery = $conn->query($sqlGetSitterID);
        $returnedSitterID = $returnedSitterIDQuery->fetch_assoc();
        $formatReturnedSitterID = $returnedSitterID["SitterID"];
  
        $sitterID = $formatReturnedSitterID;
  
        $sqlGetUserID = "SELECT UserID FROM Users WHERE Username='$passedUsername'; ";
        $returnedUserIDQuery = $conn->query($sqlGetUserID);
        $returnedUserID = $returnedUserIDQuery->fetch_assoc();
        $formatReturnedUserID = $returnedUserID["UserID"];

        $sqlGetClientID = "SELECT ClientID FROM Clients WHERE UserID='$formatReturnedUserID'; ";
        $returnedClientIDQuery = $conn->query($sqlGetClientID);
        $returnedClientID = $returnedClientIDQuery->fetch_assoc();
        $formatReturnedClientID = $returnedClientID["ClientID"];
  
        $clientID = $formatReturnedClientID;
  
        date_default_timezone_set('America/New_York');
        $date = date("Y-m-d");

        $sqlInsert = "INSERT INTO Requests (`TypeOfRequest`, `Date`, `ServiceState`, `SitterID`, `ClientID`) VALUES
                      ('$typeOfRequest', '$date', '$serviceState', $sitterID, $clientID);";
  
        $conn->query($sqlInsert);

        $sqlGetLastRowQueryRequestNumber = "SELECT RequestNumber FROM Requests ORDER BY RequestNumber DESC LIMIT 1;";
        $lastRowRequestNumberQuery = $conn->query($sqlGetLastRowQueryRequestNumber);
        $returnedRequestNumber = $lastRowRequestNumberQuery->fetch_assoc();
        $formatReturnedRequestNumber = $returnedRequestNumber["RequestNumber"];

        $sqlInsert2 = "INSERT INTO Comments (`Comment`, `UserID`, `RequestNumber`) VALUES
                      ('$comment', '$formatReturnedUserID', '$formatReturnedRequestNumber');";
  
        $conn->query($sqlInsert2);

        header("Refresh:0");
    }
    $conn->close();
  }
?>