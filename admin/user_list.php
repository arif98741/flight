<?php include('lib/header.php'); ?>

<div class="container-fluid">

    <div class="row" style="margin-top: 80px !important;">
        <?php
        if (isset($_GET['action']) && $_GET['action'] == 'delete')
        {
            $id = $_GET['id'];
            $statement = $db->pdo->prepare('delete from departments where id=:id');
            $statement->bindParam(':id',$id);
            $statement->execute();
            $message =  '<p class="alert alert-success">Department Deleted</p>';
        }
        if (isset($_POST['update']))
        {
            $department_name = $_POST['department_name'];
            $id = $_POST['id'];
            $statement = $db->pdo->prepare('update departments set department_name=:department_name where id=:id');
            $statement->bindParam(':department_name',$department_name);
            $statement->bindParam(':id',$id);
            $statement->execute();
            $message =  '<p class="alert alert-success">Department updated</p>';
        }

        ?>

        <div class="offset-md-1 col-md-10 mt-1" >
            <?php echo $message; ?>
            <div class="card" >
                <div class="card-header">
                    <h3><i class="fa fa-list-o"></i>&nbsp;User List</h3>
                </div>

                <div class="card-body">
                    <table class="table table-striped table-bordered" id="dataTable">
                        <thead>
                        <tr>
                            <th>Serial</th>
                            <th>Name</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Mobile</th>
                            <th>Address</th>
                            <th>Action</th>
                        </tr>
                        </thead>

                        <tbody>
                        <?php

                        $statement = $db->pdo->prepare('select * from usertable order by name asc');
                        $statement->execute();
                        $departments = $statement->fetchAll(PDO::FETCH_OBJ);
                        $i = 1;
                        //echo "<pre>";
                        //print_r($departments); exit;
                        foreach ($departments as $department){?>

                            <tr>
                                <td><?php echo $i ?></td>
                                <td><?php echo $department->name; ?></td>
                                <td><?php echo $department->username; ?></td>
                                <td><?php echo $department->email; ?></td>
                                <td><?php echo $department->mobile; ?></td>
                                <td><?php echo $department->address; ?></td>
                                <td><a href="../admin/edit_user.php?action=edit&id=<?php echo $department->id;?>" class="btn btn-primary">Edit</a> || <a href="?action=delete&id=<?php echo $department->id;?>" onclick="return(confirm('are you sure to delete?'))" class="btn btn-warning">Delete</a></td>
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

