<?php include('lib/header.php'); ?>

    <div class="container-fluid">

        <div class="row" style="margin-top: 80px !important;">
            <?php

            if (isset($_POST['name']))
            {


                $name = $_POST['name'];
                $username = $_POST['username'];
                $email = $_POST['email'];
                $password = md5($_POST['password']);
                $mobile = $_POST['mobile'];
                $address = $_POST['address'];


                $st1 = $db->pdo->prepare('select * from usertable where username=:username');
                $st1->bindParam(':username',$username);
                $st1->execute();
                $row1 = $st1->rowCount();

                $st2 = $db->pdo->prepare('select * from usertable where email=:email');
                $st2->bindParam(':email',$email);
                $st2->execute();
                $row2 = $st2->rowCount();

                $st3 = $db->pdo->prepare('select * from usertable where mobile=:mobile');
                $st3->bindParam(':mobile',$mobile);
                $st3->execute();
                $row3 = $st3->rowCount();

                if ($row1 > 0) {
                    array_push($error,'Username already exist');
                }elseif($row2 > 0)
                {
                    array_push($error,'Email already exist');
                }elseif($row3 > 0)
                {
                    array_push($error,'Mobile already exist');
                }else{
                    $statement = $db->pdo->prepare('insert into usertable(name,username,email,password,mobile,address) value(:name,:username,:email,:password,:mobile,:address)');
                    $statement->bindParam(':name',$name);
                    $statement->bindParam(':username',$username);
                    $statement->bindParam(':email',$email);
                    $statement->bindParam(':password',$password);
                    $statement->bindParam(':mobile',$mobile);
                    $statement->bindParam(':address',$address);
                    $statement->execute();
                    $message =  '<p class="alert alert-success">User added</p>';
                }
            }


            ?>

            <div class="offset-md-3 col-md-6 mt-1" >
                <?php echo $message; ?>
                <div class="card" >
                    <div class="card-header">
                        <h3><i class="fa fa-list-o"></i>&nbsp;Add User</h3>
                    </div>
                    <div class="card-body">
                        <form action="" method="post">


                            <div class="form-group">
                                <label for="">Name</label>
                                <input type="text" name="name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Username</label>
                                <input type="text" name="username" class="form-control">
                            </div>
                             <div class="form-group">
                                <label for="">Password</label>
                                <input type="password" name="password" class="form-control">
                            </div>

                             <div class="form-group">
                                <label for="">Email</label>
                                <input type="text" name="email" class="form-control">
                            </div>

                            

                            <div class="form-group">
                                <label for="">Mobile</label>
                                <input type="text" name="mobile" class="form-control">
                            </div>
                            
                            <div class="form-group">
                                <label for="">Address</label>
                                <textarea name="address" id="" class="form-control" cols="5" rows="4"></textarea>
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


