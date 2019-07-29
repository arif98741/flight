<?php include('inc/header.php'); ?>
<?php
if (isset($_POST['submit']))
{

						//echo "<pre>";
						//print_r($_POST); exit; 
	$name         	= $help->validation($_POST['name']);
	$email  		= $help->validation($_POST['email']);
	$mobile   		= $help->validation($_POST['mobile']);
	$date    		= $help->validation($_POST['date']);
	$adult   		= $help->validation($_POST['adult']);
	$flight_id    	= $help->validation($_POST['flight_id']);
	$message   		= $help->validation($_POST['message']);
	$sql = 'insert into ticket(name,email,mobile,date,adult,flight_id,message) values(:name,:email,:mobile,:date,:adult,:flight_id,:message)';
	$statement = $db->pdo->prepare($sql);
	$statement->bindParam(":name",$name);
	$statement->bindParam(":email",$email);
	$statement->bindParam(":mobile",$mobile);
	$statement->bindParam(":date",$date);
	$statement->bindParam(":adult",$adult);
	$statement->bindParam(":flight_id",$flight_id);
	$statement->bindParam(":message",$message);
	$statement->execute();
	$message =  '<p class="alert alert-success">Flight booked successfully!</p>';
}
?>
<section class="banner_inner" id="home">
	<div class="banner_inner_overlay">
	</div>
</section>
<!-- //banner -->


<!-- Booking -->
<section class="contact py-5">
	<div class="container py-lg-5 py-sm-4">

		<h2 class="heading text-capitalize text-center mb-lg-5 mb-4"> Book Your Tour</h2>
		<div class="contact-grids">
			<div class="row">
				<div class="col-lg-7 contact-left-form">
					<?php echo $message; ?>
					
					<form action="" method="post" class="row">
						<div class="col-sm-6 form-group contact-forms">
							<input type="text" name="name" class="form-control" placeholder="Name" required="">
						</div>
						<div class="col-sm-6 form-group contact-forms">
							<input type="email" name="email" class="form-control" placeholder="Email" required="">
						</div>
						<div class="col-sm-6 form-group contact-forms">
							<input type="text" name="mobile" class="form-control" placeholder="Mobile" required=""> 
						</div>
						<div class="col-sm-6 form-group contact-forms">
							<input type="text" name="date" class="form-control" placeholder="Date" required=""> 
						</div>
						<div class="col-sm-6 form-group contact-forms">
							<select name="adult" class="form-control" id="adults">
								<option value="" disabled="" selected="">Adults</option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
								<option value="5">5 </option>
							</select>
						</div>
						<div class="col-sm-6 form-group contact-forms">
							<select name="flight_id" class="form-control">
								<option value="" disabled selected> Select Route</option>
								<?php
								$routes = $db->fetchObject('select * from flight_table f join route r on f.route_id = r.route_id order by f.flight_id desc');
								foreach ($routes as $route){
									?>
									<option value="<?php echo $route->flight_id; ?>"> <?php echo $route->route_name; ?></option>
								<?php  } ?>
							</select>
						</div>
						<div class="col-md-12 form-group contact-forms">
							<textarea name="message" class="form-control" placeholder="Message" rows="3" required=""></textarea>
						</div>
						<div class="col-md-12 booking-button">
							<button type="submit" name="submit" class="btn btn-block sent-butnn">Book Now</button>
						</div>
					</form>
				</div>
				<div class="col-lg-5 contact-right pl-lg-5">

					<div class="image-tour position-relative">
						<img src="images/banner1.jpg" alt="" class="img-fluid" />
						<p><span class="fa fa-tags"></span> <span>20$ - 15% off</span></p>
					</div>
					
					<h4>Tour Description</h4>
					<p class="mt-3">Duis nisi sapien, elementum finibus ferme ntum ed eget, aliquet et leo. Mauris hendrerit vel ex.
					vitae luctus massa. Phas ellus sed aliquam leo et dolor. Vestibulum ullamcorper massa eut sed fringilla.</p>
					
				</div>
			</div>
		</div>
	</div>
</section>
<!-- //Booking -->


<!--footer -->
<!-- destinations -->


<?php include('inc/footer.php'); ?>