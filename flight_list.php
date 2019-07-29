<?php include('inc/header.php'); ?>
<!-- banner -->
<section class="banner_inner" id="home">
	<div class="banner_inner_overlay">
	</div>
</section>
<!-- //banner -->


<!-- tour packages -->

<!-- tour packages -->

<!-- destinations -->
<section class="destinations py-5" id="destinations">
	<div class="container py-xl-5 py-lg-3">
		<h3 class="heading text-capitalize text-center"> Flight list</h3>
		<p class="text mt-2 mb-5 text-center">Vestibulum tellus neque, sodales vel mauris at, rhoncus finibus augue. Vestibulum urna ligula, molestie at ante ut, finibus vulputate felis.</p>
		<div class="row inner-sec-w3layouts-w3pvt-lauinfo">
			<table class="table table-bordered">
				<thead>
					<tr>
						<th>Serial</th>
						<th>Route Name</th>
						<th>Plane</th>
						<th>Journey From </th>
						<th>Destination</th>
						<th>Price</th>
					</tr>
				</thead>
				<tbody>
					<?php

					$flights = $db->fetchObject('select * from flight_table f join route r on f.route_id = r.route_id order by f.flight_id desc');
					$i = 1;
					foreach ($flights as $flight){?>
						<tr>
							<td><?php echo $i; ?></td>
							<td><?php echo $flight->route_name; ?></td>
							<td><?php echo $flight->plane_model; ?></td>
							<td><?php echo $flight->start_destination; ?></td>
							<td><?php echo $flight->end_destination; ?></td>
							<td><?php echo $flight->price; ?></td>

						</tr>
						<?php  $i++;} ?>
					</tbody>
				</table>
			</div>
		</div>
	</section>
	<!-- destinations -->


	<?php include('inc/footer.php'); ?>