<?php include('inc/header.php'); ?>
<div class="container-fluid">

	<div class="row" style="margin-top: 80px !important;">
		
		

		<div class="col-md-12 mt-1" >
			<div class="card" >
				<div class="card-header">
	 				<h3><i class="fa fa-list-o"></i>&nbsp;My Ticket List</h3>
				</div>

				<div class="card-body">
					<table class="table table-striped table-bordered" id="dataTable">
						<thead>
							<tr>
								<th>Serial</th>
								<th>Ticket ID</th>
								<th>Title</th>
								<th>Department</th>
								<th>Type</th>
								<th>Details</th>
								<th>Date</th>
								<th>Status</th>
							</tr>
						</thead>

						<tbody>
							<?php

							$statement = $db->pdo->prepare('select tickets.*,department_name, type_name from tickets 
								join departments on departments.id = tickets.department_id 
								join problem_type on problem_type.id = tickets.problem_type_id where user_id=:user_id  order by tickets.id desc');
							$statement->bindParam(':user_id',$_SESSION['user_id']);
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
									<td><?php echo $ticket->problem_title; ?></td>
									<td><?php echo $ticket->department_name; ?></td>
									<td><?php echo $ticket->type_name; ?></td>
									<td><?php echo $ticket->description; ?></td>
									<td><?php echo date('d-m-Y, h:iA',strtotime($ticket->added_date)); ?></td>
									<td><?php echo $ticket->status; ?></td>
								</tr>
								<?php $i++;}?>
							</tbody>
						</table>

					</div>
				</div>
			</div>

		</div>
	</div>
	<?php include('inc/footer.php'); ?>

