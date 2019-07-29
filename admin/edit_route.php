<?php include('lib/header.php'); ?>

<div class="container-fluid">

    <div class="row" style="margin-top: 80px !important;">
        <?php
        if (isset($_GET['action']) && $_GET['action'] == 'edit')
        {
            $id = $_GET['id'];
            $statement = $db->pdo->prepare('select * from route where route_id=:id');
            $statement->bindParam(':id',$id);
            $statement->execute();
            $route = $statement->fetch(PDO::FETCH_OBJ);
            //echo "<pre>";
            //print_r($route); exit;
            //$message =  '<p class="alert alert-success">Department Deleted</p>';
        }

        if (isset($_POST['save']))
        {
            $route_name         = $help->validation($_POST['route_name']);
            $start_destination  = $help->validation($_POST['start_destination']);
            $end_destination    = $help->validation($_POST['end_destination']);
            $sql = 'insert into route(route_name,start_destination, end_destination) values(:route_name,:start_destination,:end_destination)';
            $statement = $db->pdo->prepare($sql);
            $statement->bindParam(":route_name",$route_name);
            $statement->bindParam(":start_destination",$start_destination);
            $statement->bindParam(":end_destination",$end_destination);
            $statement->execute();
            $message =  '<p class="alert alert-success">Route added successfully!</p>';
        }

        ?>

        <div class="offset-md-3 col-md-6 mt-1" >
            <?php echo $message; ?>
            <div class="card" >
                <div class="card-header">
                    <h3><i class="fa fa-list-o"></i>&nbsp;Update Route</h3>
                </div>
                <div class="card-body">
                    <form action="route_list.php" method="post">


                        <div class="form-group">
                            <label for="">Route Name</label>
                            <input type="text" name="route_name" value="<?php echo $route->route_name ?>" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Start Destination</label>
                            <input type="text" name="start_destination"  value="<?php echo $route->start_destination ?>"  class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">End Destination</label>
                            <input type="text" name="end_destination"  value="<?php echo $route->end_destination ?>"  class="form-control">
                            <input type="hidden"  name="route_id" value="<?php echo $route->route_id; ?>" >
                        </div>

                        <div class="form-group">
                            <input type="submit" name="update" value="update" class="btn btn-primary">

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
<?php include('lib/footer.php'); ?>


