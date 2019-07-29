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

		if (isset($_POST['save']))
		{

			$route_id           = $help->validation($_POST['route_id']);
			$flight_date  = $help->validation($_POST['flight_date']);
			$flight_time        = $help->validation($_POST['flight_time']);
			$plane_model        = $help->validation($_POST['plane_model']);
            $price        = $help->validation($_POST['price']);
            $description        = $help->validation($_POST['description']);
			$status         = $help->validation($_POST['plane_model']);

			$sql = 'insert into flight_table(route_id,flight_date, flight_time,plane_model,price,flight_description,flight_status) values(:route_id,:flight_date, :flight_time,:plane_model,:price,:description,:flight_status)';
			$statement = $db->pdo->prepare($sql);
			$statement->bindParam(":route_id",$route_id);
			$statement->bindParam(":flight_date",$flight_date);
			$statement->bindParam(":flight_time",$flight_time);
			$statement->bindParam(":plane_model",$plane_model);
            $statement->bindParam(":price",$price);
            $statement->bindParam(":description",$description);
			$statement->bindValue(":flight_status",'active');
			$statement->execute();

			$prostmt = $db->prepare("select flight_id from flight_table order by flight_id desc limit 1");
			$prostmt->execute();
			$data    = $prostmt->fetch(PDO::FETCH_OBJ);

			/*feature image 1*/
			if (!empty($_FILES["flight_image"]["tmp_name"])) {

                    if($_FILES['flight_image']['size'] > 524288) { //10 MB (size is also in bytes)
                    	$message = '<p id="message" class="alert alert-error">Featured Image is too big. Please select small picture</p>';
                    } else{
                    	$temp = explode(".", $_FILES["flight_image"]["name"]);
                    	$newfilename = "flight_image-".round(microtime(true)) . '.' . end($temp);
                    	move_uploaded_file($_FILES["flight_image"]["tmp_name"], "../uploads/flight/" . $newfilename);
                    	$stmt = $db->prepare("update flight_table set flight_image =:flight_image where flight_id=:id");
                    	$stmt->bindParam(':flight_image',$newfilename);
                       // echo $data->id;
                    	$stmt->bindParam(':id',$data->flight_id);
                    	$stmt->execute();
                    }
                }

                $message =  '<p class="alert alert-success">Flight added successfully!</p>';
            }

            ?>

            <div class="offset-md-3 col-md-6 mt-1" >
            	<?php echo $message; ?>
            	<div class="card" >
            		<div class="card-header">
            			<h3><i class="fa fa-list-o"></i>&nbsp;Add Route</h3>
            		</div>
            		<div class="card-body">
            			<form action="" method="post" enctype="multipart/form-data">


            				<div class="form-group">
            					<label for="">Select Route</label>
            					<select name="route_id" class="form-control">
            						<option value="" disabled selected> Select Route</option>
            						<?php
            						$routes = $db->fetchObject('select * from route order by route_name asc');
            						foreach ($routes as $route){
            							?>
            							<option value="<?php echo $route->route_id; ?>"> <?php echo $route->route_name; ?></option>
            						<?php  } ?>
            					</select>
            				</div>
            				<div class="form-group">
            					<label for="">Flight Date</label>
            					<input type="date" name="flight_date" class="form-control">
            				</div>



            				<div class="form-group">
            					<label for="">Flight Time</label>
            					<input type="time" name="flight_time" class="form-control">
            				</div>
            				<div class="form-group">
            					<label for="">Price</label>
            					<input type="text" name="price" class="form-control">
            				</div>

            				<div class="form-group">
            					<label for="">Plane Model</label>
            					<input type="text" name="plane_model" class="form-control">
            				</div>

            				<div class="form-group">
            					<label for="">Thumbnail</label>
            					<input type="file" name="flight_image" class="form-control">
            				</div>

            				<div class="form-group">
            					<label for="">Description</label>
            					<textarea name="description" id="" cols="30" rows="3" class="form-control"></textarea>
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

    <?php

