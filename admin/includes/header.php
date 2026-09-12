<!DOCTYPE html>
<html>
<head>
  	<meta charset="utf-8">
  	<meta http-equiv="X-UA-Compatible" content="IE=edge">
  	<title>Voting System</title>
  	<link rel="icon" type="image/jpeg" href="../images/srcs.jpg">
  	<!-- Tell the browser to be responsive to screen width -->
  	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  	<!-- Bootstrap 3.3.7 -->
  	<link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="../plugins/iCheck/all.css">
  	<!-- Font Awesome -->
  	<link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css">
    
  	<!-- Theme style -->
  	<link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
  	<!-- DataTables -->
    <link rel="stylesheet" href="../bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <!-- daterange picker -->
    <link rel="stylesheet" href="../bower_components/bootstrap-daterangepicker/daterangepicker.css">
    <!-- Bootstrap time Picker -->
    <link rel="stylesheet" href="../plugins/timepicker/bootstrap-timepicker.min.css">
    <!-- bootstrap datepicker -->
    <link rel="stylesheet" href="../bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@0.7.0"></script>

  	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  	<!--[if lt IE 9]>
  	<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  	<![endif]-->

  	<!-- Google Font -->
  	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

  	<style type="text/css">
      .sir {
    font-family: 'Arial', sans-serif;
    background: linear-gradient(135deg, #d9e7f1, #b3c9e5);
    color: #333;
    margin: 0;
    padding: 0;
  }
    .sir::before {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-image: url('images/image.png');
    opacity: 0.50;
    z-index: -1;
   }
      .bold{
        font-weight:bold;
      }
      
      #candidate_list{
        margin-top:20px;
      }

      #candidate_list ul{
        list-style-type:none;
      }

      #candidate_list ul li{ 
        margin:0 30px 30px 0; 
        vertical-align:top
      }

      .clist{
        margin-left: 20px;
      }

      .cname{
        font-size: 25px;
      }

      .d-flex {
  display: flex;
}

.justify-content-between {
  justify-content: space-between; /* Spaces out the items */
}

.align-items-center {
  align-items: center; /* Vertically centers the items */
}

button {
  padding: 10px 20px; /* Button padding */
  font-size: 16px; /* Button text size */
  background-color: #007bff; /* Button color */
  border: none; /* Remove border */
  color: white; /* Button text color */
  cursor: pointer; /* Pointer cursor on hover */
  border-radius: 5px; /* Rounded corners */
  transition: background-color 0.3s ease; /* Smooth color transition */
}

button:hover {
  background-color: #0056b3; /* Darker color on hover */
}


      
      @media print {
  /* Apply a top margin for every printed page */
  @page {
    margin-top: 10mm; /* Adjust this value as needed (e.g., 5mm, 10mm, etc.) */
  }

  body {
    font-size: 12px; /* Adjust font size for printing */
  }

  .chart {
    width: 100% !important; /* Ensure chart uses full width */
    height: 300px !important; /* Adjust chart height for printing */
    margin: 0 !important; /* Remove extra margin around the chart */
    padding: 0 !important; /* Remove extra padding around the chart */
  }

  /* Ensure categories are grouped together */
  .box {
    page-break-inside: avoid !important; /* Prevent page breaks inside the box */
    margin-bottom: 10px; /* Adjust margin between categories */
  }

  .small-box {
   
  }

  /* Hide the print button during printing */
  button {
    display: none !important;
  }

  .navbar, .sidebar, .footer {
    display: none; /* Hide navigation bar and footer during printing */
  }

  /* Adjust the layout for better printing */
  .content-wrapper {
    padding: 0;
  }

  .box-header {
    font-size: 14px; /* Adjust header font size */
  }

  .box-body {
    padding: 10px; /* Adjust padding for content */
  }
}

  	</style>
</head>