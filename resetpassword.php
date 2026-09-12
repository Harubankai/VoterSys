<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" type="image/jpeg" href="images/srcs.jpg">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <title>RESET PASSWORD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="dcs.css">

</head>
<body>
    <?php

  
     require("includes/conn.php");
      
     if(isset($_GET['gmail']) && isset($_GET['reset_token']))
     {
        date_default_timezone_set('Asia/kolkata');
        $date=date("Y-m-d"); 
        $gmail_param = $_GET['gmail'];
        $token_param = $_GET['reset_token'];
        $stmt = $conn->prepare("SELECT * FROM voters WHERE gmail = ? AND resettoken = ? AND resettokenexpire = ?");
        $stmt->bind_param("sss", $gmail_param, $token_param, $date);
        $stmt->execute();
        $result = $stmt->get_result();
        if($result)
        {
           if(mysqli_num_rows($result)==1)
           {
            echo 
            "
        
	<div class='container'>
        <div class='login-content'>
            <form method='POST' class='form'>
            
				<h2 class='title'>CREATE NEW PASSWORD </h2>
           		<div class='input-div pass'>
           		   <div class='i'> 
           		    	<i class='fas fa-lock'></i>
           		   </div>
                      <div class='div'>
                     <input type='password' name='password' id='myInput' class='input' placeholder='Enter New Password'>
            	   </div>
                   </div> 
                   <div class='a'>
                     <input type='checkbox' onclick='myFunction()' >&nbsp;show password
                   	</div>
                   <button class='btn 'type='submit' name='UpdatePassword'>update</button>
                          <input type='hidden' name='gmail' value='$_GET[gmail]'> 
                          </div>
                  
                       </form>
                       </div>
                </div>";

           } 
           else
           {
            echo "<script>
            alert('Invalid or Expired Link');
            window.location.href='index.php';
            </script>";
           }
            
        }
        else
        {
         
            echo "<script>
            alert('sever down! try again later');
            window.location.href='index.php';
            </script>";
        }


     }
    ?>

    
<?php
if (isset($_POST['UpdatePassword'])) {
    // Get the posted values
    $gmail = $_POST['gmail'];
    $password = $_POST['password'];

    // Hash the new password before storing it
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Prepare the SQL statement to prevent SQL injection
    $sql = "UPDATE `voters` SET `password`=?, `resettoken`=NULL, `resettokenexpire`=NULL WHERE `gmail`=?";
    
    // Initialize a prepared statement
    if ($stmt = mysqli_prepare($conn, $sql)) {
        // Bind parameters
        mysqli_stmt_bind_param($stmt, 'ss', $hashedPassword, $gmail);
        
        // Execute the statement
        if (mysqli_stmt_execute($stmt)) {
            echo "<script>
                alert('PASSWORD UPDATED SUCCESSFULLY');
                window.location.href='index.php';
            </script>";
        } else {
            echo "<script>
                alert('Server down! Try again later.');
                window.location.href='index.php';
            </script>";
        }

        // Close the statement
        mysqli_stmt_close($stmt);
    } else {
        echo "<script>
            alert('Database query error! Try again later.');
            window.location.href='index.php';
        </script>";
    }
}
?>



        <script>
   function myFunction() {
  var x = document.getElementById("myInput");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}

</script>
<script type="text/javascript" src="login.js"></script>
</body>
</html>