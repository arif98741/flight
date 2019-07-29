<?php include('inc/header.php'); ?>
<?php include('inc/slider.php'); ?>
<section class="about py-5">
	<div class="container py-lg-5 py-sm-4">
		<div class="row">
			<div class="col-lg-6 about-left">
				<h3 class="mt-lg-3">We will take you to the Top destination in the world, <strong>Explore with us!</strong></h3>
				<p class="mt-4">Duis nisi sapien, elementum finibus fermentum eget, aliquet leo et. Mauris hendrerit vel ex.
					Quisque vitae luctus massa. Phasellus sed aliquam leo. Vestibulum ullamcorper a massa eu fringilla. Integer ultrices finibus sed nisi.
				in convallis felis dapibus sit amet.</p>
				<p class="mt-3"> Donec a arcu et sapien hendrerit accumsan. Pellentesque sit amet eros iac, elementum 
				urna ipsum accumsan, iaculis ligula. Aenean quam eget maximus in convallis felis dapibus sit amet.</p>
			</div>
			<div class="col-lg-6 about-right text-lg-right mt-lg-0 mt-5">
				<img src="asset/front/images/about.jpg" alt="" class="img-fluid abt-image" />
			</div>
		</div>
		<div class="row mt-5 text-center">
			<div class="col-lg-3 col-6">
				<div class="counter">
					<span class="fa fa-smile-o"></span>
					<div class="timer count-title count-number">1000+</div>
					<p class="count-text text-uppercase">happy customers</p>
				</div>
			</div>
			<div class="col-lg-3 col-6">
				<div class="counter">
					<span class="fa fa-ship"></span>
					<div class="timer count-title count-number">2271</div>
					<p class="count-text text-uppercase">Tours & Travels </p>
				</div>
			</div>
			<div class="col-lg-3 col-6 mt-lg-0 mt-5">
				<div class="counter">
					<span class="fa fa-users"></span>
					<div class="timer count-title count-number">200</div>
					<p class="count-text text-uppercase">destinations</p>
				</div>
			</div>
			<div class="col-lg-3 col-6 mt-lg-0 mt-5">
				<div class="counter">
					<span class="fa fa-gift"></span>
					<div class="timer count-title count-number">20+<span>years</span></div>
					<p class="count-text text-uppercase">experience</p>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- //about -->

<!-- how to book -->
<section class="book py-5">
	<div class="container py-lg-5 py-sm-3">
		<h2 class="heading text-capitalize text-center"> How To Plan Your Trip</h2>
		<div class="row mt-5 text-center">
			<div class="col-lg-4 col-sm-6">
				<div class="grid-info">
					<div class="icon">
						<span class="fa fa-map-signs"></span>
					</div>
					<h4>Pick Destination</h4>
					<p class="mt-3">Vestibulum urna ligula, molestie at ante ut, finibus. Integer ultrices finibus sed nisi in convallis sed dolor.</p>
				</div>
			</div>
			<div class="col-lg-4 col-sm-6 mt-sm-0 mt-5">
				<div class="grid-info">
					<div class="icon">
						<span class="fa fa-calendar"></span>
					</div>
					<h4>Select Date</h4>
					<p class="mt-3">Vestibulum urna ligula, molestie at ante ut, finibus. Integer ultrices finibus sed nisi in convallis sed dolor.</p>
				</div>
			</div>
			<div class="col-lg-4 col-sm-6 mt-lg-0 mt-5">
				<div class="grid-info">
					<div class="icon">
						<span class="fa fa-gift"></span>
					</div>
					<h4>Enjoy the Trip</h4>
					<p class="mt-3">Vestibulum urna ligula, molestie at ante ut, finibus. Integer ultrices finibus sed nisi in convallis sed dolor.</p>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- //how to book -->

<!-- tour packages -->
<section class="packages py-5">
	<div class="container py-lg-4 py-sm-3">
		<h3 class="heading text-capitalize text-center"> Discover our latest flights</h3>
		<p class="text mt-2 mb-5 text-center">Vestibulum tellus neque, sodales vel mauris at, rhoncus finibus augue. Vestibulum urna ligula, molestie at ante ut, finibus vulputate felis.</p>
		<div class="row">
			<?php
			$flights = $db->fetchObject('select * from flight_table f join route r on f.route_id = r.route_id order by f.flight_id desc limit 4');
			$i = 1;
			foreach ($flights as $flight){?>
				<div class="col-lg-3 col-sm-6">
					<div class="image-tour position-relative">
						<img src="uploads/flight/<?php echo $flight->flight_image;?>" alt="" class="img-fluid" style="min-height: 380px;"/>
						<p><span class="fa fa-tags"></span> <span>20$</span></p>
					</div>
					<div class="package-info">
						<h6 class="mt-1"><span class="fa fa-map-marker mr-2"></span><?php echo $flight->end_destination; ?></h6>
						<h5 class="my-2"><?php echo $flight->route_name; ?></h5>
						<!-- <p class="">Vestibulum tellus neque, et velit mauris at, augue.</p> -->
						<ul class="listing mt-3">
							<li><span class="fa fa-clock-o mr-2"></span>Duration : <span>10 Days</span></li>
						</ul>
					</div>
				</div>
			<?php  } ?>
			
		</div>
		<div class="view-package text-center mt-4">
			<a href="flight_list.php">View All Flights</a>
		</div>
	</div>
</section>
<!-- tour packages -->

<!-- text -->
<section class="text-content">
	<div class="overlay-inner py-5">
		<div class="container py-md-3">
			<div class="test-info">
				<h4 class="tittle">Enjoy The Trip</h4>
				<p class="mt-3">Duis nisi sapien, elementum finibus fermentum eget, aliquet leo et. Mauris hendrerit vel ex. Quisque vitae luctus massa.
					Phasellus sed aliquam leo a massa eu fringilla. Integer ultrices finibus sed nisi. in convallis felis dapibus
				sit amet.</p>
				<div class="text-left mt-4">
					<a href="booking.php">Book Now</a>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- //text -->

<!-- destinations -->
<section class="destinations py-5" id="destinations">
	<div class="container py-xl-5 py-lg-3">
		<h3 class="heading text-capitalize text-center"> Popular Destinations</h3>
		<p class="text mt-2 mb-5 text-center">Vestibulum tellus neque, sodales vel mauris at, rhoncus finibus augue. Vestibulum urna ligula, molestie at ante ut, finibus vulputate felis.</p>
		<div class="row inner-sec-w3layouts-w3pvt-lauinfo">
			<?php
			$flights = $db->fetchObject('select * from flight_table f join route r on f.route_id = r.route_id order by rand() desc limit 4');
			$i = 1;
			foreach ($flights as $flight){?>
				<div class="col-md-3 col-sm-6 col-6 destinations-grids text-center">
					<h4 class="destination mb-3"><?php echo $flight->end_destination;  ?></h4>
					<div class="image-position position-relative">
						<img src="uploads/flight/<?php echo $flight->flight_image;?>" alt="" class="img-fluid" style="min-height: 380px;"/>
						<div class="rating">
							<ul>
								<li><span class="fa fa-star"></span></li>
								<li><span class="fa fa-star"></span></li>
								<li><span class="fa fa-star"></span></li>
								<li><span class="fa fa-star"></span></li>
								<li><span class="fa fa-star"></span></li>
							</ul>
						</div>
					</div>
					<div class="destinations-info">
						<div class="caption mb-lg-3">
							<h4><?php echo $flight->end_destination;  ?></h4>
							<a href="booking.php">Book Now</a>
						</div>
					</div>
				</div>
			<?php } ?>
		
		</div>
	</div>
</section>
<!-- destinations -->

<!--footer -->
<?php include('inc/footer.php'); ?>