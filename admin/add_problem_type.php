<?php include('lib/header.php'); ?>

<div class="container-fluid">

    <div class="row" style="margin-top: 80px !important;">
        <?php

        if (isset($_POST['type_name']))
        {
            $type_name = $_POST['type_name'];

            $st1 = $db->pdo->prepare('select * from problem_type where type_name=:type_name');
            $st1->bindParam(':type_name',$type_name);
            $st1->execute();
            $row1 = $st1->rowCount();


            if ($row1 > 0) {
                array_push($error,'Problem type already exist');
            }else{
                $statement = $db->pdo->prepare('insert into problem_type(type_name) values(:type_name)');
                $statement->bindParam(':type_name',$type_name);

                $statement->execute();
                $message =  '<p class="alert alert-success">Probel Type added</p>';
            }
        }

        ?>

        <div class="offset-md-3 col-md-6 mt-1" >
            <?php echo $message; ?>
            <div class="card" >
                <div class="card-header">
                    <h3><i class="fa fa-list-o"></i>&nbsp;Add Problem Type</h3>
                </div>
                <div class="card-body">
                    <form action="" method="post">

                        <div class="form-group">
                            <label for="">Type Name</label>
                            <input type="text" name="type_name" class="form-control">
                        </div>

                        <div class="form-group">
                            <input type="submit" name="save" value="Save" class="btn btn-primary">
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
