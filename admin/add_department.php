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

        if (isset($_POST['department_name']))
        {
            $department_name = $_POST['department_name'];
            $statement = $db->pdo->prepare('insert into departments(department_name) value(:department_name)');
            $statement->bindParam(':department_name',$department_name);
            $statement->execute();
            $message =  '<p class="alert alert-success">Department added</p>';
        }

        
        ?>

        <div class="offset-md-3 col-md-6 mt-1" >
            <?php echo $message; ?>
            <div class="card" >
                <div class="card-header">
                    <h3><i class="fa fa-list-o"></i>&nbsp;Add Department</h3>
                </div>
                <div class="card-body">
                    <form action="" method="post">


                        <div class="form-group">
                            <label for="">Department Name</label>
                            <input type="text" name="department_name" class="form-control">
                        </div> 
                        <div class="form-group">
                            <input type="submit" name="save" value="Save" class="btn btn-primary">
                        </div>
                    </form>

                    <small>errors</small>

                </div>
            </div>
        </div>

    </div>
</div>
<?php include('lib/footer.php'); ?>

