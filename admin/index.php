			<?php
				session_start();
				if(isset($_SESSION['admin'])){
					header('location:home.php');
		}
			?>

			<!DOCTYPE html>
			<html lang="en">
			<head>
				<meta charset="UTF-8">
				<meta name="viewport" content="width=device-width, initial-scale=1.0">
				<title>Voting System - Admin Login</title>
				<link rel="icon" type="image/jpeg" href="../images/srcs.jpg">
				<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
				<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
			
			</head>

<style>
	 body {
    background: linear-gradient(135deg, #d9e7f1, rgb(216, 219, 223));    
    font-family: 'Arial', sans-serif;
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    color: white;
    text-align: center;
    margin: 0;
    padding: 0;
   }


    body::before {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-image: url('../images/image.png');
    opacity: 0.06;
    z-index: -1;
    }


    .navbar {
    background: blue;
    padding: 5px 10px;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    z-index: 1000;
    display: flex;
    justify-content: space-between;
    align-items: center;
    }

     .navbar-brand {
    font-weight: bold;
    font-size: 1.5rem;
    color: white;
    }

    .navbar-brand:hover {
    color: rgb(245, 248, 246); 
    text-decoration: none; 
    transition: color 0.3s ease; 
    }

     .navbar-nav .nav-link {
    color: white !important;
    font-weight: bold;    
    }

     .navbar-toggler {
    border: none !important;
    outline: none !important;
    background: transparent !important;
    box-shadow: none !important;
     }

     .navbar-toggler:focus,
     .navbar-toggler:active {
    border: none !important;
    outline: none !important;
    box-shadow: none !important;
     }


    .navbar-toggler .fa-bars {
        color: white;
    }


    .login-box {
     background: white;
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0px 0px 15px rgba(15, 15, 15, 0.2);
    width: 90%;
    max-width: 450px;
    color: #333;
    text-align: center;
    }

     .login-logo {
    font-size: 1.8rem;
    font-weight: bold;
    margin-bottom: 20px;
     }

     .login-box-body p {
    font-size: 1rem;
     }

     .login-box input {
    width: 100%;
    margin-bottom: 15px;
    padding: 10px;
    font-size: 1rem;
    border: 1px solid #ccc;
    border-radius: 5px;
     }

     .login-box button {
    width: 100%;
    background: blue;
    color: white;
    border: none;
    font-size: 1rem;
    padding: 12px;
    cursor: pointer;
    border-radius: 5px;
     }

     .login-box button:hover {
    background: rgb(36, 102, 243);
    }
   

     .footer {
    position: absolute;
    bottom: 20px;
    color: black;
    font-weight: bold;
    font-size: 0.9rem;
    text-align: center;
     }

     .navbar-logo {
    width: auto;
    height: 40px; /* Adjust the height as needed */
    max-width: 100%; /* Makes the image responsive */
    border-radius: 50px;
     }

     .dcs-logo {
    width: auto;
    height: 35px; /* Adjust the height as needed */
    max-width: 100%; /* Makes the image responsive */
    border-radius: 50px;
     }


     @media (max-width: 768px) {
       .navbar-brand {
        font-size: 1.2rem;
      }

     .login-box {
        width: 95%;
        padding: 20px;
    }

    .login-logo {
        font-size: 1.5rem;
    }

    .footer {
        font-size: 0.8rem;
    }

    .navbar-logo {
          width: auto;
          height: 30px; /* Adjust the height as needed */
          max-width: 100%; /* Makes the image responsive */
          border-radius: 50px;
         }

         .dcs-logo {
          width: auto;
          height: 25px; /* Adjust the height as needed */
          max-width: 100%; /* Makes the image responsive */
          border-radius: 50px;
         }
    }

     @media (max-width: 480px) {
    .navbar {
        padding: 10px;
    }

    .navbar-brand {
        font-size: 1rem;
    }

    .login-box {
        padding: 15px;
    }

    .login-logo {
        font-size: 1.3rem;
    }

            .footer {
                font-size: 0.7rem;
                bottom: 10px;
             }

             .navbar-logo {
          width: auto;
          height: 30px; /* Adjust the height as needed */
          max-width: 100%; /* Makes the image responsive */
          border-radius: 50px;
         }

         .dcs-logo {
          width: auto;
          height: 25px; /* Adjust the height as needed */
          max-width: 100%; /* Makes the image responsive */
          border-radius: 50px;
         }
           }

</style>
			<body>

			
				<nav class="navbar navbar-expand-lg">
                <a class="navbar-brand" href="#">
                  <img src="../images/image.png" alt="Logo" class="navbar-logo"> SRC Online Voting System
                    </a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
						<i class="fa fa-bars text-white"></i></span>
					</button>
					<div class="collapse navbar-collapse" id="navbarNav">
						<ul class="navbar-nav ml-auto">
							<li class="nav-item"><a class="nav-link" href="https://www.facebook.com/profile.php?id=100092207244275"><img src="../images/dcs.png" alt="Logo" class="dcs-logo"> Department of Computer Studies</a></li>
							
					</div>
				</nav>

				
				<h1 class="mb-8"></h1>
				<div class="login-box">
					<div class="login-logo"><b>ADMIN LOGIN</b></div>
					<div class="login-box-body">
						<p class="login-box-msg">Secure & Reliable Voting</p>
						<form action="login.php" method="POST">
							<div class="form-group has-feedback">
								<input type="text" class="form-control" name="username" placeholder="Username" required>
								<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
							</div>
							<div class="form-group has-feedback" style="position: relative;">
								<input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
								<span class="glyphicon glyphicon-lock form-control-feedback"></span>
								<span toggle="#password" class="fa fa-eye toggle-password" 
									style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%); cursor: pointer;">
								</span>
							</div>
							<button type="submit" class="btn	 btn-block" name="login">
								<i class="fa fa-sign-in-alt"></i> Sign In
							</button>
						</form>
					</div>
					<?php
					if(isset($_SESSION['error'])){
						echo "<div class='alert alert-danger mt-3 text-center'>".$_SESSION['error']."</div>";
						unset($_SESSION['error']);
					}
					?>
				</div>
				

			<script>
				document.querySelector(".toggle-password").addEventListener("click", function() {
					var passwordField = document.querySelector("#password");
					if (passwordField.type === "password") {
						passwordField.type = "text";
						this.classList.remove("fa-eye");
						this.classList.add("fa-eye-slash");
					} else {
						passwordField.type = "password";
						this.classList.remove("fa-eye-slash");
						this.classList.add("fa-eye");
					}
				});
			</script>
			<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

			</body>
			</html>
