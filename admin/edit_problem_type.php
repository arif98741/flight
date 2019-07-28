<?php include('lib/header.php'); ?>

<div class="container-fluid">

    <div class="row" style="margin-top: 80px !important;">
        <?php

        if (isset($_GET['action']) && $_GET['action'] == 'edit')
        {
            $id = $_GET['id'];
            $statement = $db->pdo->prepare('select * from problem_type where id=:id');
            $statement->bindParam(':id',$id);
            $statement->execute();
            $problem_type = $statement->fetch(PDO::FETCH_OBJ);
        }

        ?>

        <div class="offset-md-3 col-md-6 mt-1" >
            <?php echo $message; ?>
            <div class="card" >
                <div class="card-header">
                    <h3><i class="fa fa-list-o"></i>&nbsp;Update Problem Type</h3>
                </div>
                <div class="card-body">
                    <form action="problem_types.php" method="post">

                        <div class="form-group">
                            <label for="">Type Name</label>
                            <input type="text" name="type_name" value="<?php echo $problem_type->type_name; ?>" class="form-control">
                            <input type="hidden" name="id" value="<?php echo $problem_type->id; ?>" class="form-control">
                        </div>

                        <div class="form-group">
                            <input type="submit" name="update" value="Upate" class="btn btn-primary">
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
