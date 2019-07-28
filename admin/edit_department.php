<?php include('lib/header.php'); ?>

<div class="container-fluid">

    <div class="row" style="margin-top: 80px !important;">
        <?php
        if (isset($_GET['action']) && $_GET['action'] == 'edit')
        {
            $id = $_GET['id'];
            $statement = $db->pdo->prepare('select * from departments where id=:id');
            $statement->bindParam(':id',$id);
            $statement->execute();
            $department = $statement->fetch(PDO::FETCH_OBJ);
        }

        ?>

        <div class="offset-md-3 col-md-6 mt-1" >
            <?php echo $message; ?>
            <div class="card" >
                <div class="card-header">
                    <h3><i class="fa fa-list-o"></i>&nbsp;Edit Department</h3>
                </div>
                <div class="card-body">
                    <form action="departments.php" method="post">


                        <div class="form-group">
                            <label for="">Department Name</label>
                            <input type="text" name="department_name" value="<?php echo $department->department_name ?>" class="form-control">
                            <input type="hidden" name="id" value="<?php echo $department->id ?>">
                        </div>
                        <div class="form-group">
                            <input type="submit" name="update" value="Update" class="btn btn-primary">
                        </div>
                    </form>
                    <small>errors</small>

                </div>
            </div>
        </div>

    </div>
</div>
<?php include('lib/footer.php'); ?>

