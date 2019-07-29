<?php include('lib/header.php'); ?>

<div class="container-fluid">

    <div class="row" style="margin-top: 80px !important;">
        <?php
        if (isset($_GET['action']) && $_GET['action'] == 'delete')
        {
            $id = $_GET['id'];
            $statement = $db->prepare('delete from route where route_id=:id');
            $statement->bindParam(':id',$id);
            $statement->execute();
            $message =  '<p class="alert alert-success">Route Deleted Successfully</p>';
        }
        if (isset($_POST['update']))
        {
            $id                 = $help->validation($_POST['route_id']);
            $route_name         = $help->validation($_POST['route_name']);
            $start_destination  = $help->validation($_POST['start_destination']);
            $end_destination    = $help->validation($_POST['end_destination']);
            $sql = 'update route set route_name=:route_name,start_destination=:start_destination, end_destination=:end_destination where route_id=:id';
            $statement = $db->prepare($sql);
            $statement->bindParam(":route_name",$route_name);
            $statement->bindParam(":start_destination",$start_destination);
            $statement->bindParam(":end_destination",$end_destination);
            $statement->bindParam(":route_id",$id);
            $message =  '<p class="alert alert-success">Route updated successfully</p>';
        }

        ?>

        <div class="col-md-12 mt-1" >
            <?php echo $message; ?>
            <div class="card" >
                <div class="card-header">
                    <h3><i class="fa fa-list-o"></i>&nbsp;Booking List</h3>
                </div>

                <div class="card-body">
                    <table class="table table-striped table-bordered" id="dataTable">
                        <thead>
                        <tr>
                            <th>Flight ID</th>
                            <th>Plane Model </th>
                            <th>Passenger</th>
                            <th>Route</th>
                            <th>Booking Date</th>
                            <th>Flight Date</th>
                            <th>Flight Time</th>
                            <th>Status</th>
                        </tr>
                        </thead>

                        <tbody>
                        <?php


                        $routes = $db->fetchObject('select * from ticket t  join flight_table f on f.flight_id = t.flight_id join route r on f.route_id = r.route_id order by f.flight_id desc');
                        $i = 1;
                        foreach ($routes as $route){?>

                            <tr>
                                <td><?php echo $route->flight_id ?></td>
                                <td><?php echo $route->plane_model; ?></td>
                                <td><?php echo $route->name; ?></td>
                                <td><?php echo $route->route_name; ?></td>
                                <td><?php echo $route->date; ?></td>
                                <td><?php echo $route->flight_date; ?></td>
                                <td><?php echo $route->flight_time; ?></td>
                                <td><?php echo $route->flight_status; ?></td>

                            </tr>
                            <?php $i++;} ?>
                        </tbody>

                    </table>

                </div>
            </div>
        </div>

    </div>
</div>
<?php include('lib/footer.php'); ?>

