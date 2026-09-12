<header class="main-header">
  <nav class="navbar navbar-static-top">
    <div class="container">
      <div class="navbar-header">
      <a href="#" class="navbar-brand d-flex align-items-center">
      <img src="images/image.png" alt="Logo" class="img-fluid brand-logo logo-spacing"> <b> SRC</b>VotingSystem
      </a>

        
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
          <i class="fa fa-bars"></i>
        </button>
      </div>

      <div class="collapse navbar-collapse pull-right " id="navbar-collapse">
        <ul class="nav navbar-nav">
          <?php
            if(isset($_SESSION['student'])){
              echo "
                <li><a href='index.php'>HOME</a></li>
                <li><a href='transaction.php'>TRANSACTION</a></li>
              ";
            } 
          ?>
       
          
          <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li class="user user-menu">
            <a href="">
              <img src="<?php echo (!empty($voter['photo'])) ? 'images/'.$voter['photo'] : 'images/profile.jpg' ?>" class="user-image" alt="User Image">
              <span class=""><?php echo $voter['firstname'].' '.$voter['lastname']; ?></span>
            </a>
          </li>
          <li class="logout-desktop">
            <a href="logout.php"><i class="fa fa-sign-out"></i>LOGOUT</a>
          </li> 
        </ul>
      </div>
        </ul>
        
      </div>

      
    </div>
  </nav>
</header>
<style>

 @media (min-width: 992px) {
  .navbar-toggle {
    display: none;
  }
 }


 @media (max-width: 991px) {
  .navbar-toggle {
    display: block;
  }
 }
 
</style>
