<?php include 'class/DB.php';
session_start();
if (!isset($_SESSION['user_session']))
{
    header('location: login.php');
}
$db = new Database();
$message = '';
$error = [];
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Tickting System</title>

  <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/offcanvas/">

  <!-- Bootstrap core CSS -->
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha256-eZrrJcwDc/3uDhsdt61sL2oOBY362qM3lon1gyExkL0=" crossorigin="anonymous" />
</head>

<body class="bg-light">

  <nav class="navbar navbar-expand-md fixed-top navbar-dark bg-dark">
    <a class="navbar-brand" href="index.php">Ticketing System</a>
    <button class="navbar-toggler p-0 border-0" type="button" data-toggle="offcanvas">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="navbar-collapse offcanvas-collapse" id="navbarsExampleDefault">
      <ul class="navbar-nav mr-auto">
       
        <li class="nav-item">
          <a class="nav-link" href="index.php"><i class="fa fa-list-alt"></i>&nbsp;Ticket List</a>
        </li>

         <li class="nav-item">
          <a class="nav-link" href="add_ticket.php"><i class="fa fa-plus"></i>&nbsp;Add Ticket</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="departments.php"><i class="fa fa-list"></i>&nbsp; Department</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="problem_types.php"><i class="fa fa-list"></i>&nbsp; Problem Types</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="logout.php" target="blank"><i class="fa fa-arrow-right"></i>&nbsp;Logout</a>
        </li>


      </ul>
      
    </div>
  </nav>
