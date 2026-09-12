<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>

<style>

 .brand-logo {
  max-height: 40px;
  border-radius: 50px;

 }

 .logo-spacing {
  margin-right: 3px; 
 }

   .navbar-brand {
  display: flex;
  align-items: center;
  white-space: nowrap; 
 }	

  .candidate-photo {
        border-radius: 5px;
        border: 2px solid grey; 
    }

	.candidate-photo:hover {
        transform: scale(1.05);
        transition: all 0.5s ease;
	
    }

    #plat_view {
        font-weight: bold;
        font-size: 1.1em;
        font-family: 'Arial', sans-serif;
    }


   .modal-content {
        border-radius: 15px; 
        overflow: hidden; 
    }

  
    .modal-header {
        background-color:rgb(71, 74, 219);
        color: white;
        font-weight: bold;
        border-bottom: 2px solidrgb(31, 231, 24);
    }

    .modal-header{
        color: white;
        font-size: 1.5em;
    }

    .modal-title {
        font-size: 1.25em;
        font-family: 'Arial', sans-serif;
    }

    .modal-body {
        padding: 20px;
    }

    .modal-footer {
        background-color:rgb(223, 221, 221);
        border-top: 2px solid #ddd;
        justify-content: center;
    }

    .modal-body img:hover {
        transform: scale(1.05);
        transition: all 0.3s ease;
	
    }

    .modal-body img {
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

	@media screen and (max-width: 768px) { 

     .clist.platform {
	     margin-left: 10px; 
        }

	 .clist{
        margin-left: 0px;
      }

    #candidate_list ul {
        text-align: center; 
    }

	.brand-logo {
    max-height: 30px;
    }

    .candidate-photo {
		
        display: block;
        margin: 0 auto; 
    }

	.platform {
        margin-bottom: 5px;
    }

    .cname {
		display: block;
        text-align: center;
        font-weight: bold;
        font-size: 16px; 

    }

	.title{
        font-size: 25px;
        color: white;
        background: linear-gradient(0deg, rgba(38, 221, 32, 0.81) 0%, rgb(37, 184, 17) 6%, rgba(10, 241, 87, 0.66) 100%);
        border-radius: 5px;
      }

    }

   @media screen and (max-width: 1024px) {

	#modalImage {
            max-width: 320px;
			max-height: 320px;
			
        }

	.clist.platform {
	     margin-left: 10px; 
        }

	.clist{
        margin-left: 0px;
      }

	.platform {
        margin-bottom: 5px;
    }

	#candidate_list ul {
        text-align: center; 
    }

    .candidate-photo {
        display: block;
        margin: 0 auto; 
    }

    .cname {
        font-size: 18px; 
		display: block;
        text-align: center;
        font-weight: bold;
        
    }
  }

   @media screen and (max-width: 480px) {

	#modalImage {
            max-width: 320px;
			max-height: 320px;
			
        }
	.clist.platform {
	     margin-left: 10px; 
        }

	.clist{
        margin-left: 0px;
      }

	.brand-logo {
    max-height: 30px;
    }

	.platform {
        margin-bottom: 5px; 
    }

	#candidate_list ul {
        text-align: center;
    }

    .candidate-photo {
        display: block;
        margin: 0 auto; 
    }

    .cname {
        font-size: 14px;
        text-align: center;
        display: block;
        font-weight: bold;
    
    }

	.title{
        font-size: 25px;
        color: white;
        background: linear-gradient(0deg, rgba(38, 221, 32, 0.81) 0%, rgb(37, 184, 17) 6%, rgba(10, 241, 87, 0.66) 100%);
        border-radius: 5px;
      }
   }

   @media screen and (max-width: 320px) {

	#modalImage {
            max-width: 300px;
			max-height: 300px;
			
        }

	.clist.platform {
	     margin-left: 10px; 
        }

	.clist{
        margin-left: 0px;
      }

	.brand-logo {
    max-height: 30px;
    }

	.platform {
        margin-bottom: 5px; 
    }

	#candidate_list ul {
        text-align: center; 
    }

    .candidate-photo {
        display: block;
        margin: 0 auto; 
    }

    .cname {
        font-size: 12px; 
        text-align: center;
        display: block;
        font-weight: bold;
         
    }

	.title{
        font-size: 25px;
        color: white;
        background: linear-gradient(0deg, rgba(38, 221, 32, 0.81) 0%, rgb(37, 184, 17) 6%, rgba(10, 241, 87, 0.66) 100%);
        border-radius: 5px;
      }

  }

 
</style>

<body class="hold-transition skin-blue layout-top-nav">
	
<div class="wrapper">

	<?php include 'includes/navbar.php'; ?>
	 
	  <div class="content-wrapper">
	    <div class="container">

	      <section class="content">
	      	<?php
	      		$parse = parse_ini_file('admin/config.ini', FALSE, INI_SCANNER_RAW);
    			$title = $parse['election_title'];
	      	?>
	      	<h1 class="page-header text-center title"><b><?php echo strtoupper($title); ?></b></h1>
	
	        <div class="row">
	        	<div class="col-sm-10 col-sm-offset-1">
	        		<?php
				        if(isset($_SESSION['error'])){
				        	?>
				        	<div class="alert alert-danger alert-dismissible">
				        		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					        	<ul>
					        		<?php
					        			foreach($_SESSION['error'] as $error){
					        				echo "
					        					<li>".$error."</li>
					        				";
					        			}
					        		?>
					        	</ul>
					        </div>
				        	<?php
				         	unset($_SESSION['error']);

				        }
				        if(isset($_SESSION['success'])){
				          	echo "
				            	<div class='alert alert-success alert-dismissible'>
				              		<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
				              		<h4><i class='icon fa fa-check'></i> Success!</h4>
				              	".$_SESSION['success']."
				            	</div>
				          	";
				          	unset($_SESSION['success']);
				        }

				    ?>
 
				    <div class="alert alert-danger alert-dismissible" id="alert" style="display:none;">
		        		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			        	<span class="message"></span>
			        </div>

				    <?php
				    	$sql = "SELECT * FROM votes WHERE voters_id = '".$voter['id']."'";
				    	$vquery = $conn->query($sql);
				    	if($vquery->num_rows > 0){
				    		?>
				    		<div class="text-center">
                           <h3>You have already voted for this election.</h3>
                          <a href="#view" data-toggle="modal" class="btn btn-flat btn-primary btn-lg">View Ballot</a>
						  
						  <hr style="border-top: 1px solid #ccc; margin-bottom: 20px; width: 80%;">
	                     
						  <div class="mt-4 p-4 text-center" style="background-color: #ffffff; border: 1px solid #dee2e6; border-radius: 12px; box-shadow: 0 4px 8px rgba(0,0,0,0.05);">
                         <img src="images/ssc.png" alt="SSC Logo" class="img-fluid mb-1" style="max-width: 200px; height: auto; border-radius: 6px;">
						
						 <h4 class="text-dark mb-1" style="font-weight: 600;">Benefits of Being an SSC Officer</h4>
						
						 <p class="mt-3 text-secondary" style="font-style: italic; font-size: 1.8rem;">
                             “SSC experience looks great on job or scholarship applications.”
                         </p>
						
						 <p class="mt-3 text-secondary" style="font-style: italic; font-size: 1.8rem;">
                             “You'll gain real experience in leading, planning, and decision-making.”
                         </p>
						 <p class="mt-3 text-secondary" style="font-style: italic; font-size: 1.8rem;">
                             “Public speaking, organizing events, and engaging with students builds confidence.”
                         </p>
                           </div>

                             </div>

				    		<?php
				    	}
				    	else{
				    		?>
			    			
						    <form method="POST" id="ballotForm" action="submit_ballot.php">
				        		<?php
				        			include 'includes/slugify.php';

				        			$candidate = '';
				        			$sql = "SELECT * FROM positions ORDER BY priority ASC";
									$query = $conn->query($sql);
									while($row = $query->fetch_assoc()){
										$sql = "SELECT * FROM candidates WHERE position_id='".$row['id']."'";
										$cquery = $conn->query($sql);
										while($crow = $cquery->fetch_assoc()){
											$slug = slugify($row['description']);
											$checked = '';
											if(isset($_SESSION['post'][$slug])){
												$value = $_SESSION['post'][$slug];

												if(is_array($value)){
													foreach($value as $val){
														if($val == $crow['id']){
															$checked = 'checked';
														}
													}
												}
												else{
													if($value == $crow['id']){
														$checked = 'checked';
													}
												}
											}
											$input = ($row['max_vote'] > 1) ? '<input type="checkbox" class="flat-red '.$slug.'" name="'.$slug."[]".'" value="'.$crow['id'].'" '.$checked.'>' : '<input type="radio" class="flat-red '.$slug.'" name="'.slugify($row['description']).'" value="'.$crow['id'].'" '.$checked.'>';
											$image = (!empty($crow['photo'])) ? 'images/'.$crow['photo'] : 'images/profile.jpg';
											$candidate .= '
												<li>
													'.$input.'<button type="button" class="btn btn-primary btn-sm btn-flat clist platform" data-platform="'.$crow['platform'].'" data-fullname="'.$crow['firstname'].' '.$crow['lastname'].'"><i class="fa fa-search"></i> Platform</button>
													  <img src="'.$image.'" height="150px" width="150px" class="clist candidate-photo" data-toggle="modal" data-target="#photoModal" data-src="'.$image.'"><span class="cname clist">'.$crow['firstname'].' '.$crow['lastname'].'</span>
												</li>
											';
										}

										$instruct = ($row['max_vote'] > 1) ? 'You may select up to '.$row['max_vote'].' candidates' : 'Select only one candidate';

										echo '
											<div class="row">
												<div class="col-xs-12">
													<div class="box box-solid" id="'.$row['id'].'">
														<div class="box-header with-border">
															<h3 class="box-title"><b>'.$row['description'].'</b></h3>
														</div>
														<div class="box-body">
															<p>'.$instruct.'
																<span class="pull-right">
																	<button type="button" class="btn btn-success btn-sm btn-flat reset" data-desc="'.slugify($row['description']).'"><i class="fa fa-refresh"></i>Reset</button>
																</span>
															</p>
															<div id="candidate_list">
																<ul>
																	'.$candidate.'
																</ul>
															</div>
														</div>
													</div>
												</div>
											</div>
										';

										$candidate = '';

									}	

				        		?>
				        		<div class="text-center">
					        		<button type="button" class="btn btn-success btn-flat" id="preview"><i class="fa fa-file-text"></i> Preview</button> 
					        		<button type="submit" class="btn btn-primary btn-flat" name="vote"><i class="fa fa-check-square-o"></i> Submit</button>
					        	</div>
				        	</form>
				        
				    		<?php
				    	}

				    ?>

	        	</div>
	        </div>
	      </section>
	     
	    </div>
	  </div>


  
  	<?php include 'includes/ballot_modal.php'; ?>
</div>

<?php include 'includes/scripts.php'; ?>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        document.querySelectorAll('.candidate-photo').forEach(img => {
            img.addEventListener('click', function() {
                document.getElementById('modalImage').src = this.getAttribute('data-src');
            });
        });
    });
</script>

<script>
 $(function(){
	$('.content').iCheck({
		checkboxClass: 'icheckbox_flat-green',
		radioClass: 'iradio_flat-green'
	});

	$(document).on('click', '.reset', function(e){
	    e.preventDefault();
	    var desc = $(this).data('desc');
	    $('.'+desc).iCheck('uncheck');
	});

	$(document).on('click', '.platform', function(e){
		e.preventDefault();
		$('#platform').modal('show');
		var platform = $(this).data('platform');
		var fullname = $(this).data('fullname');
		$('.candidate').html(fullname);
		$('#plat_view').html(platform);
	});

	$('#preview').click(function(e){
		e.preventDefault();
		var form = $('#ballotForm').serialize();
		if(form == ''){
			$('.message').html('You must vote atleast one candidate');
			$('#alert').show();
		}
		else{
			$.ajax({
				type: 'POST',
				url: 'preview.php',
				data: form,
				dataType: 'json',
				success: function(response){
					if(response.error){
						var errmsg = '';
						var messages = response.message;
						for (i in messages) {
							errmsg += messages[i]; 
						}
						$('.message').html(errmsg);
						$('#alert').show();
					}
					else{
						$('#preview_modal').modal('show');
						$('#preview_body').html(response.list);
					}
				}
			});
		}
		
	});

   });
</script>



</body>
</html>