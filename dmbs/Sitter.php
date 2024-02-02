<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css files/sitter.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Nunito+Sans:opsz@6..12&display=swap"
      rel="stylesheet"
    />
    <title>Sitter</title>
  </head>
  <body>
    <div class="header">

      <h1>Pet Sitter Response Tracking System</h1>

      <h2 name="ID_DateLabel" id="ID_DateLabel" class="ID_DateLabel"> DATE  </h2>
      
      <?php
        echo '<script src="SitterDB-Javascript.js"></script>';
        echo '<script>ShowDate();</script>';
      ?>

      <h3>Sitter Home</h3>
      
      <div class="logoutbtn">
          <a href="index.php">  <button>Log Out</button>  </a>
      </div>

    </div>

    <div class="box">
      <h1>Assigned Request</h1>
      <div class="btn">
        <button>Accept</button>
        <button>Reject</button>
      </div>
    </div>

    <div class="box2">
      <div class="order">
        <h1>Completed Services</h1>
      </div>
    </div>
  </body>
</html>
