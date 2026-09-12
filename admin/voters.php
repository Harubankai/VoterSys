<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php include 'includes/navbar.php'; ?>
  <?php include 'includes/menubar.php'; ?>

  
  <div class="content-wrapper">
  
    <section class="content-header">
      <h1>
        Voters List
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Voters</li>
      </ol>
    </section>
 
    <section class="content">
      <?php
        if(isset($_SESSION['error'])){
          echo "
            <div class='alert alert-danger alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-warning'></i> Error!</h4>
              ".$_SESSION['error']."
            </div>
          ";
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
      <div class="row">
        <div class="col-xs-12">
          <div class="box">

          <div class="box-header with-border">
           <a href="#addnew" data-toggle="modal" class="btn btn-primary btn-sm btn-flat">
           <i class="fa fa-plus"></i> New
           </a>
           <button id="deleteAllBtn" class="btn btn-danger btn-sm btn-flat">
           <i class="fa fa-trash"></i> Delete All
          </button>
          <button onclick="printTable()" class="btn btn-success btn-sm btn-flat">
            <i class="fa fa-print"></i> Print
             </button>

            <div class="box-body">
              <table id="example1" class="table table-bordered">
                <thead>
                  <th>Lastname</th>
                  <th>Firstname</th>
                  <th>Year</th>
                  <th>Department</th>
                  <th>Gmail</th>
                  <th>Photo</th>
                  <th>Voters ID</th>
                  <th>Tools</th>
                </thead>
                <tbody>
                  <?php
                    $sql = "SELECT * FROM voters";
                    $query = $conn->query($sql);
                    while($row = $query->fetch_assoc()){
                      $image = (!empty($row['photo'])) ? '../images/'.$row['photo'] : '../images/profile.jpg';
                      echo "
                        <tr>
                          <td>".$row['lastname']."</td>
                          <td>".$row['firstname']."</td>
                          <td>".$row['year']."</td>
                          <td>".$row['department']."</td>
                          <td>".$row['gmail']."</td>
                          <td>
                            <img src='".$image."' width='30px' height='30px'>
                            <a href='#edit_photo' data-toggle='modal' class='pull-right photo' data-id='".$row['id']."'><span class='fa fa-edit'></span></a>
                          </td>
                          <td>".$row['voters_id']."</td>
                          <td>
                            <button class='btn btn-success btn-sm edit btn-flat' data-id='".$row['id']."'><i class='fa fa-edit'></i> Edit</button>
                            <button class='btn btn-danger btn-sm delete btn-flat' data-id='".$row['id']."'><i class='fa fa-trash'></i> Delete</button>
                          </td>
                        </tr>
                      ";
                    }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>   
  </div>
    
<?php include 'includes/voters_modal.php'; ?>
</div>
<?php include 'includes/scripts.php'; ?>  

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>  
   document.getElementById('deleteAllBtn').addEventListener('click', function () {
    Swal.fire({
        title: "Are you sure?",
        text: "This will delete all voter records!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#d33",
        cancelButtonColor: "#3085d6",
        confirmButtonText: "Yes, delete all!"
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = "delete_all.php";
        }
    });
  });
</script>


<script>
 $(function(){
  $(document).on('click', '.edit', function(e){
    e.preventDefault();
    $('#edit').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

  $(document).on('click', '.delete', function(e){
    e.preventDefault();
    $('#delete').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

  $(document).on('click', '.photo', function(e){
    e.preventDefault();
    var id = $(this).data('id');
    getRow(id);
  });

 });

 function getRow(id){
  $.ajax({
    type: 'POST',
    url: 'voters_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      $('.id').val(response.id);
      $('#edit_firstname').val(response.firstname);
      $('#edit_lastname').val(response.lastname);
      $('#edit_year').val(response.year);
      $('#edit_department').val(response.department);
      $('#edit_password').val(response.password);
      $('#edit_gmail').val(response.gmail);
      $('.fullname').html(response.firstname+' '+response.lastname);
    }
  });
 }
</script>

<script>
    function printTable() {
    var content = `
        <html>
        <head>
            <title>Voter List Report</title>
            <style>
                body {
    font-family: Arial, sans-serif;
    margin: 0; /* Remove default margin to ensure full-width printing */
    padding: 0;
   }

    h2 {
    margin-bottom: 10px;
     }

    .print-container {
    width: 100%; /* Ensure full width */
    margin: auto;
    text-align: center;
      }

    table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
      }

    th, td {
    border: 1px solid black;
    padding: 5px;
    text-align: left;
    
    }

     th {
    background-color:rgb(28, 58, 231);
    color:white;
    text-align: center;
      }


    @media print {

    .no-print {
        display: none;
    }
    body {
        margin: 0;
    }
    table {
        width: 100%;
        page-break-inside: auto; /* Prevents table from breaking between pages */
    }
    tr {
        page-break-inside: avoid; /* Ensures rows don't split across pages */
    }
     th {
    color: black;
      }

     }

            </style>
        </head>
        <body>
            <div class="print-container">
                <h2>St. Rose College Educational Foundation Inc.</h2>
                <h3>Voter List Report</h3>
                <table>
                    <thead>
                        <tr>
                            <th>Voters ID</th>
                            <th>Lastname</th>
                            <th>Firstname</th>
                            <th>Year</th>
                            <th>Department</th>
                            <th>Email</th>
                            
                        </tr>
                    </thead>
                    <tbody>`;

       <?php
        $sql = "SELECT * FROM voters ORDER BY department ASC, year ASC, lastname ASC";
       $query = $conn->query($sql);
       while ($row = $query->fetch_assoc()) {
        $image = (!empty($row['photo'])) ? '../images/' . $row['photo'] : '../images/profile.jpg';
        ?>
        content += `<tr>
                        <td><?php echo $row['voters_id']; ?></td>
                        <td><?php echo $row['lastname']; ?></td>
                        <td><?php echo $row['firstname']; ?></td>
                        <td><?php echo $row['year']; ?></td>
                         <td><?php echo $row['department']; ?></td>
                        <td><?php echo $row['gmail']; ?></td>
                        
                    </tr>`;
    <?php } ?>

    content += `</tbody>
                </table>
            </div>
        </body>
        </html>`;

    var printWindow = window.open("", "", "width=900,height=600");
    printWindow.document.open();
    printWindow.document.write(content);
    printWindow.document.close();
    printWindow.print();
    }
</script>

<script>
    document.getElementById("gmail").addEventListener("input", function() {
    let email = this.value;
    if (!email.endsWith("@gmail.com")) {
        this.setCustomValidity("Only @gmail.com addresses are allowed.");
    } else {
        this.setCustomValidity(""); 
    }
    });
</script>

</body>
</html>
