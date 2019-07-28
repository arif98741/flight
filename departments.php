<?php include('inc/header.php'); ?>

<div class="container-fluid">

    <div class="row" style="margin-top: 80px !important;">
        
        <div class="offset-md-2 col-md-8 mt-1" >
            <?php echo $message; ?>
            <div class="card" >
                <div class="card-header">
                    <h3><i class="fa fa-list-o"></i>&nbsp;Department List</h3>
                </div>

                <div class="card-body">
                    <table class="table table-striped table-bordered" id="dataTable">
                        <thead>
                            <tr>
                                <th>Serial</th>
                                <th>Department Name</th>
                            </tr>
                        </thead>

                        <tbody>
                        <?php

                        $statement = $db->pdo->prepare('select * from departments order by department_name asc');
                        $statement->execute();
                        $departments = $statement->fetchAll(PDO::FETCH_OBJ);
                        $i = 1;
                       //echo "<pre>";
                        //print_r($departments); exit;
                        foreach ($departments as $department){?>

                            <tr>
                                <td><?php echo $i ?></td>
                                <td><?php echo $department->department_name; ?></td>
                                
                            </tr>
                        <?php $i++;} ?>
                        </tbody>

                    </table>

                </div>
            </div>
        </div>

    </div>
</div>
<?php include('inc/footer.php'); ?>

