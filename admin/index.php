<?php include('lib/header.php'); ?>
<div class="container-fluid">

	<div class="row" style="margin-top: 80px !important;">
		<?php
		if (isset($_GET['action']) && $_GET['action'] == 'delete')
		{
			$id = $_GET['id'];
			$statement = $db->pdo->prepare('delete from tickets where id=:id');
			$statement->bindParam(':id',$id);
			$statement->execute();
			$message =  '<p class="alert alert-success">Ticket Successfully Deleted</p>';
		}

		if (isset($_GET['action']) && $_GET['action'] == 'approve')
		{
			$id = $_GET['id'];
			$statement = $db->pdo->prepare("update tickets set status='approved' where id=:id");
			$statement->bindParam(':id',$id);
			$statement->execute();
			$message =  '<p class="alert alert-success">Ticket Successfully Approved</p>';
		}



		?>
		
		

		<div class="col-md-11 mt-1" >
			<?php echo $message; ?>
			<div class="card" >
				<div class="card-header">
					<h3><i class="fa fa-list-o"></i>&nbsp;Ticket List</h3>
				</div>

				<div class="card-body">
					
					<table class="table table-striped table-bordered" id="dataTable">
						<thead>
							<tr>
								<th>SL</th>
								<th>Ticket ID</th>
								<th>User</th>
								<th>Title</th>
								<th>Department</th>
								<th>Type</th>
								<th>Details</th>
								<th>Date</th>
								<th>Status</th>
								<th>Action</th>
							</tr>
						</thead>

						<tbody>
							<?php

							$statement = $db->pdo->prepare('select tickets.*,department_name, type_name,usertable.name from tickets 
								join usertable on usertable.id = tickets.user_id 
								join departments on departments.id = tickets.department_id 
								join problem_type on problem_type.id = tickets.problem_type_id order by tickets.id desc');
							$statement->execute();
							$tickets = $statement->fetchAll(PDO::FETCH_OBJ);
							$i = 1;
                      // echo "<pre>";
                       // print_r($departments); exit;
							$i = 1;
							foreach ($tickets as $ticket){ ?>
								<tr>
									<td><?php echo $i; ?></td>
									<td><?php echo $ticket->ticket_id; ?></td>
									<td><?php echo $ticket->name; ?></td>
									<td><?php echo $ticket->problem_title; ?></td>
									<td><?php echo $ticket->department_name; ?></td>
									<td><?php echo $ticket->type_name; ?></td>
									<td><?php echo $ticket->description; ?></td>
									<td><?php echo date('d-m-Y, h:iA',strtotime($ticket->added_date)); ?></td>
									<td><?php echo $ticket->status; ?></td>
									<td>
										<?php if($ticket->status == 'approved'): ?>
											<a href="#" class="btn btn-success  btn-sm"><i class="fa fa-check"></i></a>

											<?php else: ?>
												<a href="?action=approve&id=<?php echo $ticket->id ?>" class="btn btn-primary  btn-sm"><i class="fa fa-pencil"></i></a>

											<?php endif ?>



											&nbsp;<a href="?action=delete&id=<?php echo $ticket->id ?>" onclick="return(confirm('are you sure to delete?'))" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a></td>
										</tr>
										<?php $i++;}?>
									</tbody>
								</table>


							</div>
						</div>
					</div>
					<div class="col-md-1 mt-1" >
						<div class="card mt-1" >
							<div class="card-header">
								<?php

								$statement = $db->pdo->prepare('select * from tickets');
								$statement->execute();
								$total = $statement->rowCount();
								?>
								<small></i>&nbsp;Total</small>
							</div>

							<div class="card-body">

								<h4 class="text-center"><?php echo $total; ?></h4>
							</div>
						</div>

						<div class="card mt-1" >
							<div class="card-header">
								<?php

								$statement = $db->pdo->prepare("select * from tickets where status='pending'");
								$statement->execute();
								$total = $statement->rowCount();
								?>
								<small></i>&nbsp;Pending</small>
							</div>

							<div class="card-body">

								<h4 class="text-center"><?php echo $total; ?></h4>
							</div>
						</div>

						<div class="card mt-1" >
							<div class="card-header">
								<?php

								$statement = $db->pdo->prepare("select * from tickets  where status='approved'");
								$statement->execute();
								$total = $statement->rowCount();
								?>
								<small></i>&nbsp;Approved </small>
							</div>

							<div class="card-body">

								<h4 class="text-center"><?php echo $total; ?></h4>
							</div>
						</div>

						
					</div>

				</div>
			</div>
		</div>
		<?php include('lib/footer.php'); ?>

