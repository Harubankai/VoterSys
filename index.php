<?php
  	session_start();

    if(isset($_SESSION['voter'])){
      header('location: home.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Student Login</title>
  <link rel="icon" type="image/jpeg" href="images/srcs.jpg">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="less.css">
</head>
<style>
    .navbar {
      background-color: blue;
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

    .navbar-logo {
    width: auto;
    height: 40px; 
    max-width: 100%; 
    border-radius: 50px;
     }

     .dcs-logo {
    width: auto;
    height: 35px; 
    max-width: 100%; 
    border-radius: 50px;
     }

     .ssc-logo {
    max-width: 150px;
    }

    .ssc-lg {
    max-width: 80px;
    }

    .modalS {
  display: none;
  position: fixed;
  z-index: 1000;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  overflow: auto;
  background: linear-gradient(to right top, rgba(32, 38, 57, 0.8), rgba(63, 76, 119, 0.8));
  backdrop-filter: blur(8px);
  animation: bgFade 0.5s ease-in-out;
 }

 .modal-contentS {
  background: rgba(255, 255, 255, 0.1);
  margin: 5% auto;
  padding: 2rem 2.5rem;
  border-radius: 20px;
  width: 90%;
  max-width: 600px;
  box-shadow: 0 12px 30px rgba(0, 0, 0, 0.3);
  backdrop-filter: blur(15px);
  border: 1px solid rgba(255, 255, 255, 0.2);
  animation: fadeIn 0.4s ease;
  position: relative;
  color: #fff;
  text-align: center;
 }

 .closeS {
  color: #fff;
  position: absolute;
  top: 20px;
  right: 25px;
  font-size: 28px;
  font-weight: bold;
  cursor: pointer;
  transition: color 0.3s ease;
 }
 .closeS:hover {
  color: #f05454;
 }

 .cardS img {
  width: 130px;
  height: 130px;
  border-radius: 50%;
  object-fit: cover;
  border: 3px solid #00bfff;
  margin-bottom: 15px;
  box-shadow: 0 0 15px rgba(0, 191, 255, 0.6);
  }

 .cardS .team-title {
  font-size: 20px;
  font-weight: 600;
  color: #00bfff;
  margin-bottom: 10px;
  text-shadow: 1px 1px 2px rgba(0,0,0,0.3);
 }

 .names-grid {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 5px 20px;
  margin-top: 15px;
  margin-bottom: 20px;
 }

 .names-grid h1 {
  font-size: 18px;
  color: #fff;
  font-style: italic;
  margin: 3px 0;
  transition: transform 0.2s;
 }
 .names-grid h1:hover {
  transform: scale(1.03);
  text-shadow: 0 0 5px rgba(255,255,255,0.3);
 }

 .cardS .year, .cardS .batch {
  font-size: 15px;
  font-style: italic;
  color: #ccc;
 }

 .lineS {
  width: 70%;
  height: 2px;
  background: linear-gradient(to right, #00bfff, #6a5acd);
  margin: 20px auto;
  border-radius: 4px;
 }

 @keyframes fadeIn {
  from { opacity: 0; transform: translateY(-20px); }
  to { opacity: 1; transform: translateY(0); }
 }

 @keyframes bgFade {
  from { background-color: rgba(0, 0, 0, 0); }
  to { background-color: rgba(0, 0, 0, 0.6); }
 }


    @media (max-width: 768px) {

      .names-grid {
      grid-template-columns: 1fr;
     }

      .modal-contentS {
       padding: 1.5rem;
      }

        .navbar-brand {
            font-size: 1.2rem;
        }

        .ssc-logo {
          max-width: 100px;
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

         .navbar {

           padding: 2.5px 5px;

                }

      }

    @media (max-width: 480px) {


      .names-grid {
      grid-template-columns: 1fr;
     }

      .modal-contentS {
       padding: 1.5rem;
      }
        .navbar {
            padding: 10px;
        }

        .navbar-brand {
            font-size: 1rem;
        }

        .navbar-logo {
        width: auto;
        height: 30px;
       }

       .ssc-logo {
          max-width: 100px;
         }

       .dcs-logo {
          width: auto;
          height: 25px; 
          max-width: 100%;
         }

       .navbar {
             padding: 2.5px 5px;

          }
    }

  html {
    scroll-behavior: smooth;
    scroll-padding-top: 60px;
  }
  #signin-section {
    min-height: 100vh;
    padding-top: 75px !important;
    padding-bottom: 40px !important;
    margin-top: 0 !important;
    box-sizing: border-box;
    scroll-margin-top: 0;
  }
</style>

<body>

<nav class="navbar navbar-expand-lg navbar-light">
    <a class="navbar-brand" href="https://www.facebook.com/officialstrosecollege2002">
    <img src="images/image.png" alt="Logo" class="navbar-logo"> SRC Online Voting System
    </a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <i class="fa fa-bars text-white"></i>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto align-items-center">
        <li class="nav-item me-2">
          <a class="nav-link text-white fw-bold me-2" href="#signin-section" style="color: #fff !important;">
            <i class="fa fa-sign-in-alt me-1"></i> Sign In
          </a>
        </li>
        <li class="nav-item me-2">
          <a class="nav-link text-white fw-bold me-2" href="voters.php" style="color: #fff !important;">
            <i class="fa fa-id-card me-1"></i> Voters Directory
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="https://www.facebook.com/profile.php?id=100092207244275"><img src="images/dcs.png" alt="Logo" class="dcs-logo"> Department of Computer Studies</a>
        </li>
       </ul>    
    </div>
</nav>

  <div id="signin-section" class="container-fluid d-flex justify-content-center align-items-center min-vh-100">
    <div class="row rounded-5 shadow-lg overflow-hidden login-signup-box">
  
      <div class="col-lg-6 col-md-12 left-section p-4 d-flex flex-column justify-content-center">
        <h2 class="text-center">Sign In</h2>
        <div class="d-flex justify-content-center mb-4">
        <button class="btn btn-light mx-1" onclick="window.location.href='https:////www.facebook.com/profile.php?id=61555879497148';"> 
            <i class="fab fa-facebook-f"></i>
        </button>
      
        <button class="btn btn-light mx-1" onclick="document.getElementById('profileModal').style.display='block'">
    <i class="fas fa-users"></i>
   </button>
    </div>
        <p class="text-center">Your Vote Counts.Vote Wisely.</p>
        <form action="login.php" method="POST">
          <div class="form-group mb-3">
          <input type="text" class="form-control" name="voter" placeholder="Voter's ID" required>
          </div>
          <div class="form-group mb-3" style="position: relative;">
          <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
								<span toggle="#password" class="fa fa-eye toggle-password" 
									style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%); cursor: pointer;">
								</span>
          </div>

          <div class="d-flex justify-content-between align-items-center">
            <a href="" data-toggle="modal" data-target="#forgotModal">Forgot Your Password?</a>
          </div>
          <button type="submit" name="login" class="btn btn-primary w-100 mt-3">SIGN IN</button>
         
        </form>
      </div>

      
      <div class="col-lg-6 col-md-12 right-section px-5 pb-5 d-flex flex-column justify-content-center text-center">
       <img src="images/ssc.png" alt="Voting Image" class="img-fluid mb-1 mx-auto ssc-logo">
       <h2>Hello, Voters!</h2>
       <p>Bad officials are the one elected by good student who do not vote.</p>
       <button class="btn btn-outline-light" data-toggle="modal" data-target="#registerModal">SIGN UP</button>
       <a href="totalvotes.php" class="btn btn-outline-light mt-3">VOTE TALLY</a>
  </div>

 <div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="registerModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="registerModalLabel">REGISTER NOW</h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
        </button>
      </div>
      <div class="modal-body">
       
        <form action="add_voters.php" method="POST" enctype="multipart/form-data">

        <div class="form-group">
        <label for="firstname">First Name</label>
        <input type="text" class="form-control" id="firstname" name="firstname" required oninput="this.value = this.value.replace(/[^a-zA-Z\s]/g, '')">
        </div>

        <div class="form-group">
          <label for="lastname">Last Name</label>
          <input type="text" class="form-control" id="lastname" name="lastname" required oninput="this.value = this.value.replace(/[^a-zA-Z\s]/g, '')">
         </div>


          <div class="form-group">
            <label for="year">Year</label>
            <select class="form-control" id="year" name="year" required>
                <option value=""></option>
                <option value="1ST">First Year</option>
                <option value="2ND">Second Year</option>
                <option value="3RD">Third Year</option>
                <option value="4TH">Fourth Year</option>
                </select>
          </div>

          <div class="form-group">
            <label for="department">Department</label>
            <select class="form-control" id="department" name="department" required>
                <option value=""></option>
                <option value="BSCS">BSCS</option>
                <option value="BSCRIM">BSCRIM</option>
                <option value="EDUC">EDUC</option>
                <option value="BSBA">BSBA</option>
                <option value="BSA">BSA</option>
                </select>
          </div>
         
          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password" required>
          </div>

          <div class="form-group">
           <label for="gmail">Gmail</label>
           <input type="email" class="form-control" id="gmail" name="gmail" required>
          </div>

          <div class="form-group mt-1">
          <label for="photo">Photo</label>
          <input type="file" id="photo" name="photo" accept="image/*">
          </div>

          <button type="submit" class="btn btn-primary w-100 mt-3" name="add" >Register</button>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="reminderModal" tabindex="-1" aria-labelledby="reminderModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content shadow rounded-4">
      
    
      <div class="modal-header bg-danger text-white position-relative justify-content-center">
        <img src="images/ssc.png" alt="SSC Logo" class="position-absolute start-0 ms-3" style="height: 50px; width: auto;" />
        <h5 class="modal-title fw-bold text-center w-100 mb-0" id="reminderModalLabel">SSC REMINDERS</h5>
        <button type="button" class="btn-close btn-close-white position-absolute end-0 me-3" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body bg-light text-center py-4 px-3">
        <p class="fs-5 fw-semibold mb-3">🕖 Voting is only allowed from <strong>7:00 AM to 5:00 PM</strong>.</p>
        <p class="fs-5 fw-semibold mb-3">🗳️ Your Vote Counts. <span class="text-primary">Vote Wisely!</span></p>
        <hr>
        <p class="fst-italic text-dark mb-2">"The vote is the most powerful nonviolent tool we have."</p>
        <p class="fst-italic text-dark mb-2">"Your vote is your voice. Make it heard."</p>
        <p class="fst-italic text-dark">"Voting is not only our right—it is our power."</p>
      </div>

    </div>
  </div>
</div>


<div class="modal fade" id="forgotModal" tabindex="-1" role="dialog" aria-labelledby="forgotModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header d-flex align-items-center">
        <img src="images/srcs.jpg" alt="SRC Logo" style="height: 40px; width: auto; margin-right: 10px; border-radius: 4px;">
        <h5 class="modal-title mb-0" id="forgotModalLabel">FORGOT PASSWORD</h5>
        <button type="button" class="btn-close ms-auto" data-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <!-- Step 1: Enter Email -->
        <div id="forgot-step-1">
          <p class="text-muted mb-3">Enter your Gmail address and we'll send you a verification code.</p>
          <div class="form-group">
            <label for="forgot-email">Gmail Address</label>
            <input type="email" class="form-control" id="forgot-email" placeholder="Enter your Gmail" required>
          </div>
          <div id="forgot-email-error" class="text-danger mt-2" style="display:none;"></div>
          <button class="btn btn-primary w-100 mt-3" id="btn-send-otp" onclick="sendOTP()">Send Verification Code</button>
        </div>

        <!-- Step 2: Enter OTP -->
        <div id="forgot-step-2" style="display:none;">
          <p class="text-muted mb-1">A 6-digit code was sent to <strong id="otp-email-display"></strong></p>
          <p class="text-muted mb-3" style="font-size:0.85rem;">Code expires in 10 minutes.</p>
          <div class="form-group">
            <label for="forgot-otp">Verification Code</label>
            <input type="text" class="form-control text-center" id="forgot-otp" maxlength="6" placeholder="000000" style="font-size:1.5rem; letter-spacing:8px; font-weight:bold;">
          </div>
          <div id="forgot-otp-error" class="text-danger mt-2" style="display:none;"></div>
          <button class="btn btn-success w-100 mt-3" id="btn-verify-otp" onclick="verifyOTP()">Verify Code</button>
          <div class="text-center mt-3">
            <span class="text-muted">Didn't receive it? </span>
            <button class="btn btn-link p-0" id="btn-resend-otp" onclick="resendOTP()" disabled>Resend Code</button>
            <span id="resend-timer" class="text-danger fw-bold"></span>
          </div>
          <div class="text-center mt-2">
            <button class="btn btn-link text-secondary p-0" onclick="goToStep(1)">← Change Email</button>
          </div>
        </div>

        <!-- Step 3: New Password -->
        <div id="forgot-step-3" style="display:none;">
          <p class="text-muted mb-3">OTP verified! Create your new password.</p>
          <input type="hidden" id="verified-email">
          <div class="form-group mb-3">
            <label for="new-password">New Password</label>
            <div style="position:relative;">
              <input type="password" class="form-control" id="new-password" placeholder="Enter new password" minlength="6">
              <span class="fa fa-eye" id="toggle-new-pass" style="position:absolute;right:12px;top:50%;transform:translateY(-50%);cursor:pointer;"></span>
            </div>
          </div>
          <div class="form-group mb-3">
            <label for="confirm-password">Confirm Password</label>
            <div style="position:relative;">
              <input type="password" class="form-control" id="confirm-password" placeholder="Confirm new password" minlength="6">
              <span class="fa fa-eye" id="toggle-confirm-pass" style="position:absolute;right:12px;top:50%;transform:translateY(-50%);cursor:pointer;"></span>
            </div>
          </div>
          <div id="forgot-pass-error" class="text-danger mt-1" style="display:none;"></div>
          <button class="btn btn-primary w-100 mt-2" id="btn-update-pass" onclick="updatePassword()">Update Password</button>
        </div>

      </div>
    </div>
  </div>
</div>


<div id="profileModal" class="modalS">
  <div class="modal-contentS">
    <span class="closeS" onclick="document.getElementById('profileModal').style.display='none'">&times;</span>
    <div class="cardS">
      <img src="images/dcs.png" alt="Charles Godwin P. Reyes">
      <p class="team-title">Team Voting System</p>
      <div class="names-grid">
        <h1>Charles Reyes</h1>
        <h1>Jaymor De Guzman</h1>
        <h1>Gwyneth Fontanilla</h1>
        <h1>John Emerson Vicente</h1>
        <h1>James Ellazar</h1>
        <h1>Carla Ulog</h1>
      </div>
      <p class="year">4th Year BSCS Student</p>
      <div class="lineS"></div>
      <p class="batch">BATCH 2025</p>
    </div>
  </div>
</div>
        

<script>
  window.onclick = function(event) {
    var modal = document.getElementById('profileModal');
    if (event.target == modal) {
      modal.style.display = "none";
    }
  }
</script>
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

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  <script src="includes/update.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
<?php include 'includes/scripts.php'?>
<?php include 'includes/alert.php' ?>

<script type="text/javascript">
  $(document).ready(function () {
    if (!sessionStorage.getItem("modalShown")) {
      $('#reminderModal').modal('show');
      sessionStorage.setItem("modalShown", "true");
    }
  });
</script>

<script>
// ========== FORGOT PASSWORD OTP FLOW ==========
let resendInterval = null;

function goToStep(step) {
  document.getElementById('forgot-step-1').style.display = step === 1 ? '' : 'none';
  document.getElementById('forgot-step-2').style.display = step === 2 ? '' : 'none';
  document.getElementById('forgot-step-3').style.display = step === 3 ? '' : 'none';
}

function startResendCountdown(seconds) {
  const btn    = document.getElementById('btn-resend-otp');
  const timer  = document.getElementById('resend-timer');
  btn.disabled = true;
  clearInterval(resendInterval);

  let remaining = seconds;
  timer.textContent = ' (' + remaining + 's)';

  resendInterval = setInterval(function() {
    remaining--;
    if (remaining <= 0) {
      clearInterval(resendInterval);
      btn.disabled = false;
      timer.textContent = '';
    } else {
      timer.textContent = ' (' + remaining + 's)';
    }
  }, 1000);
}

function sendOTP() {
  const email   = document.getElementById('forgot-email').value.trim();
  const errDiv  = document.getElementById('forgot-email-error');
  const btn     = document.getElementById('btn-send-otp');
  errDiv.style.display = 'none';

  if (!email || !email.endsWith('@gmail.com')) {
    errDiv.textContent = 'Please enter a valid @gmail.com address.';
    errDiv.style.display = 'block';
    return;
  }

  btn.disabled = true;
  btn.textContent = 'Sending...';

  const formData = new FormData();
  formData.append('gmail', email);

  fetch('send_otp.php', { method: 'POST', body: formData })
    .then(r => r.json())
    .then(data => {
      btn.disabled = false;
      btn.textContent = 'Send Verification Code';
      if (data.success) {
        document.getElementById('otp-email-display').textContent = email;
        document.getElementById('forgot-otp').value = '';
        goToStep(2);
        startResendCountdown(120);
      } else if (data.cooldown) {
        // Already on cooldown - still go to step 2 if session has it active
        errDiv.textContent = data.message;
        errDiv.style.display = 'block';
        document.getElementById('otp-email-display').textContent = email;
        goToStep(2);
        startResendCountdown(data.remaining);
      } else {
        errDiv.textContent = data.message;
        errDiv.style.display = 'block';
      }
    })
    .catch(() => {
      btn.disabled = false;
      btn.textContent = 'Send Verification Code';
      errDiv.textContent = 'Network error. Please try again.';
      errDiv.style.display = 'block';
    });
}

function resendOTP() {
  const email = document.getElementById('forgot-email').value.trim();
  const errDiv = document.getElementById('forgot-otp-error');
  errDiv.style.display = 'none';

  const btn = document.getElementById('btn-resend-otp');
  btn.disabled = true;

  const formData = new FormData();
  formData.append('gmail', email);

  fetch('send_otp.php', { method: 'POST', body: formData })
    .then(r => r.json())
    .then(data => {
      if (data.success) {
        document.getElementById('forgot-otp').value = '';
        errDiv.textContent = 'New code sent!';
        errDiv.className = 'text-success mt-2';
        errDiv.style.display = 'block';
        startResendCountdown(120);
        setTimeout(() => { errDiv.style.display = 'none'; errDiv.className = 'text-danger mt-2'; }, 3000);
      } else {
        errDiv.textContent = data.message;
        errDiv.className = 'text-danger mt-2';
        errDiv.style.display = 'block';
        if (data.cooldown) startResendCountdown(data.remaining);
      }
    })
    .catch(() => {
      errDiv.textContent = 'Network error. Please try again.';
      errDiv.style.display = 'block';
      btn.disabled = false;
    });
}

function verifyOTP() {
  const otp    = document.getElementById('forgot-otp').value.trim();
  const errDiv = document.getElementById('forgot-otp-error');
  const btn    = document.getElementById('btn-verify-otp');
  errDiv.style.display = 'none';

  if (otp.length !== 6) {
    errDiv.textContent = 'Please enter the 6-digit code.';
    errDiv.style.display = 'block';
    return;
  }

  btn.disabled = true;
  btn.textContent = 'Verifying...';

  const formData = new FormData();
  formData.append('otp', otp);

  fetch('verify_otp.php', { method: 'POST', body: formData })
    .then(r => r.json())
    .then(data => {
      btn.disabled = false;
      btn.textContent = 'Verify Code';
      if (data.success) {
        document.getElementById('verified-email').value = data.email;
        clearInterval(resendInterval);
        goToStep(3);
      } else {
        errDiv.textContent = data.message;
        errDiv.style.display = 'block';
      }
    })
    .catch(() => {
      btn.disabled = false;
      btn.textContent = 'Verify Code';
      errDiv.textContent = 'Network error. Please try again.';
      errDiv.style.display = 'block';
    });
}

function updatePassword() {
  const email    = document.getElementById('verified-email').value;
  const newPass  = document.getElementById('new-password').value;
  const confPass = document.getElementById('confirm-password').value;
  const errDiv   = document.getElementById('forgot-pass-error');
  const btn      = document.getElementById('btn-update-pass');
  errDiv.style.display = 'none';

  if (newPass.length < 6) {
    errDiv.textContent = 'Password must be at least 6 characters.';
    errDiv.style.display = 'block';
    return;
  }
  if (newPass !== confPass) {
    errDiv.textContent = 'Passwords do not match.';
    errDiv.style.display = 'block';
    return;
  }

  btn.disabled = true;
  btn.textContent = 'Updating...';

  const formData = new FormData();
  formData.append('gmail', email);
  formData.append('password', newPass);
  formData.append('UpdatePassword', '1');

  fetch('update_password.php', { method: 'POST', body: formData })
    .then(r => r.json())
    .then(data => {
      btn.disabled = false;
      btn.textContent = 'Update Password';
      if (data.success) {
        alert('Password updated successfully! Please log in.');
        // Close modal and reset
        $('#forgotModal').modal('hide');
        goToStep(1);
        document.getElementById('forgot-email').value = '';
      } else {
        errDiv.textContent = data.message;
        errDiv.style.display = 'block';
      }
    })
    .catch(() => {
      btn.disabled = false;
      btn.textContent = 'Update Password';
      errDiv.textContent = 'Network error. Please try again.';
      errDiv.style.display = 'block';
    });
}

// Password toggle for step 3
document.getElementById('toggle-new-pass').addEventListener('click', function() {
  const f = document.getElementById('new-password');
  if (f.type === 'password') { f.type = 'text'; this.classList.replace('fa-eye','fa-eye-slash'); }
  else { f.type = 'password'; this.classList.replace('fa-eye-slash','fa-eye'); }
});
document.getElementById('toggle-confirm-pass').addEventListener('click', function() {
  const f = document.getElementById('confirm-password');
  if (f.type === 'password') { f.type = 'text'; this.classList.replace('fa-eye','fa-eye-slash'); }
  else { f.type = 'password'; this.classList.replace('fa-eye-slash','fa-eye'); }
});

// Reset modal to step 1 when closed
$('#forgotModal').on('hidden.bs.modal', function() {
  goToStep(1);
  clearInterval(resendInterval);
  document.getElementById('forgot-email').value = '';
  document.getElementById('forgot-otp').value = '';
  document.getElementById('forgot-email-error').style.display = 'none';
  document.getElementById('forgot-otp-error').style.display = 'none';
  document.getElementById('forgot-pass-error').style.display = 'none';
  document.getElementById('resend-timer').textContent = '';
  document.getElementById('btn-resend-otp').disabled = true;
});
</script>

</body>
</html>
