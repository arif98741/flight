 <?php include('inc/header.php'); ?>

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

 		if (isset($_POST['problem_type_id']))
 		{
 			$problem_title 		= $_POST['problem_title'];
 			$ticket_id 			= rand(5000,9999);
 			$user_id 			= $_SESSION['user_id'];
 			$department_id 		= $_POST['department_id'];
 			$problem_type_id 	= $_POST['problem_type_id'];
 			$description 	    = $_POST['description'];
 			$statement 			= $db->pdo->prepare('insert into tickets(ticket_id,problem_title,user_id,department_id,problem_type_id,description) value(:ticket_id,:problem_title,:user_id,:department_id,:problem_type_id,:description)');
 			$statement->bindParam(':ticket_id',$ticket_id);
 			$statement->bindParam(':problem_title',$problem_title);
 			$statement->bindParam(':user_id',$user_id);
 			$statement->bindParam(':department_id',$department_id);
 			$statement->bindParam(':problem_type_id',$problem_type_id);
 			$statement->bindParam(':description',$description);
 			$statement->execute();
 			$message =  '<p class="alert alert-success">Ticket successfully added. Please wait for approve</p>';
 		}


 		?>

 		<div class="offset-md-2 col-md-8 mt-1" >
 			<?php echo $message; ?>
 			<div class="card" >
 				<div class="card-header">
 					<h3><i class="fa fa-plus"></i>&nbsp;Add Ticket</h3>
 				</div>
 				<div class="card-body">
 					<form action="" method="post">


 						<div class="form-group">
 							<label for="">Problem Title</label>
 							<input type="text" name="problem_title" class="form-control">
 						</div> 

 						<div class="form-group">
 							<label for="">Department</label>
 							<select name="department_id" id="" class="form-control">
 								<option value="" disabled="" selected="">Select Department</option>

 								<?php

 								$statement = $db->pdo->prepare('select * from departments order by department_name asc');
 								$statement->execute();
 								$departments = $statement->fetchAll(PDO::FETCH_OBJ);
 								foreach ($departments as $department){?>

 									<option value="<?php echo $department->id; ?>"><?php echo $department->department_name; ?></option>
 								<?php  }?>
 							</select>

 						</div> 

 						<div class="form-group">
 							<label for="">Problem Type</label>
 							<select name="problem_type_id" id="" class="form-control">
 								<option value="" disabled="" selected="">Select Type</option>
 								<?php

 								$statement = $db->pdo->prepare('select * from problem_type order by type_name asc');
 								$statement->execute();
 								$types = $statement->fetchAll(PDO::FETCH_OBJ);
 								foreach ($types as $type){?>

 									<option value="<?php echo $type->id; ?>"><?php echo $type->type_name; ?></option>
 								<?php  }?>
 							</select>

 						</div> 

 						<div class="form-group">
 							<label for="">Description</label>
 							<textarea name="description" id="" cols="30" rows="4" class="form-control"></textarea>
 						</div> 

 						<div class="form-group">
 							<input type="submit" name="save" value="Submit" class="btn btn-primary">
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
 <?php include('inc/footer.php'); ?>

