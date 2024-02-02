<div class="total">
  <div class="drop">
    <form action="/action_page.php">
      <label for="sitters">Choose Sitter:</label>
      <select name="sitters" id="sitter">
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
            $sqlFirstNameQuery = "SELECT FirstName FROM Users WHERE Role = 'S' ; ";
            $firstNames = $conn->query($sqlFirstNameQuery);

            $sqlLastNameQuery = "SELECT LastName FROM Users WHERE Role = 'S' ; ";
            $lastNames = $conn->query($sqlLastNameQuery);

            if ($firstNames->num_rows > 0) 
            {
              while ($resultFirst = $firstNames->fetch_assoc()) 
              {
                $resultLast->fetch_assoc();
                echo "<option value='" . $resultFirst['FirstName'] . "'>" . $resultLast['LastName'] . "</option>";
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
    </form>
  </div>

  <div class="btn">
    <button>Submit Order</button>
  </div>
  
</div>