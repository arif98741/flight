<?php include '../class/DB.php';
session_start();
if (isset($_SESSION['admin_session']))
{
    header('location: index.php');
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
    <a class="navbar-brand" href="">Ticketing System</a>
    <button class="navbar-toggler p-0 border-0" type="button" data-toggle="offcanvas">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="navbar-collapse offcanvas-collapse" id="navbarsExampleDefault">
      <ul class="navbar-nav mr-auto">

         <li class="nav-item">
          <a class="nav-link" href="../admin" target="blank"><i class="fa fa-user-secret"></i>&nbsp;Admin Login </a>
        </li>

        

      </ul>
      
    </div>
  </nav>


<div class="container-fluid">

    <div class="row" style="margin-top: 80px !important;">
        <?php
       

        if (isset($_POST['login']))
        {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $statement = $db->pdo->prepare('select * from admin where username=:username and password=:password');
            $statement->bindParam(':username',$username);
            $statement->bindValue(':password',md5($password));
            $statement->execute();
            $row = $statement->rowCount();
            if ($row > 0) {
                $data = $statement->fetch(PDO::FETCH_OBJ);
                $_SESSION['admin_session'] = true;
                $_SESSION['admin_id']    = $data->id;
                $_SESSION['admin_name'] = $data->name;
                $_SESSION['admin_email'] = $data->username;
                $_SESSION['admin_mobile'] = $data->mobile;
                header('location: index.php');
            }else{
                array_push($error,'Username or password not matched');
            }

        }

        
        ?>

        <div class="offset-md-3 col-md-5 mt-1" >
            <?php echo $message; ?>
            <div class="card" >
                <div class="card-header">
                    <h3><i class="fa fa-user-secret"></i>&nbsp;Admin Login  Panel</h3>
                </div>
                <div class="card-body">
                    <form action="" method="post">


                        <div class="form-group">
                            <label for="">Username</label>
                            <input type="text" name="username" class="form-control">
                        </div> 

                        <div class="form-group">
                            <label for="">Password</label>
                            <input type="password" name="password" class="form-control">
                        </div> 

                        
                        <div class="form-group">
                            <input type="submit" name="login" value="login" class="btn btn-primary">
                        </div>
                    </form>
                    <?php if(count($error) !=0){ ?>
                        <?php
                        foreach ($error  as $item) { ?>
                            <p style="color: red;"><?php echo $item; ?></p>
                          <?php  }
                            ?>

                    <?php  }?>

                </div>
            </div>
        </div>

    </div>
</div>
<?php //include('inc/footer.php'); ?>

