<style type="text/css">
td.no_result {
    text-align: center;
    color: red;
    font-size: 20px;
}
button.btn.btn-info.dcs_book_again_btn {
    margin-top: 7px;
 padding: 1px;
    margin-left: 8px;
}
p.text-bellow-upcommingrides {
    text-align: right;
    padding: 7px;
    color: brown;
    font-size: 16px;
}
.text-bellow-upcommingrides-link
{
	color: brown;
}
.dcs-ride-heading {
    font-size: 17px;
    font-weight: 600;
    text-transform: uppercase;
}
.table-responsive .table{display: inherit !important; overflow: scroll;}
</style>

<section id="content"> <section class="vbox"> <section class="scrollable padder">
	<section class="panel panel-default">
	<header class="panel-heading dcs-ride-heading"> Previous Rides </header>
	
	<div class="table-responsive">
		<!-- <h1>Previous Rides</h1> -->
		<table class="table table-striped b-t b-light text-sm">
			<thead>
				<tr>					
					<!-- <th>id</th> -->
					<th>Name</th>
					<th>Email</th>
					<th>Pick Address</th>
					<th>Drop Address</th>
					<th>Date</th>
					<th>Action</th>
				</tr> 
			</thead> 
			<tbody>			
			<?php 
			if($users_previous_rides)
				{
				foreach ($users_previous_rides as $user) {
					$ride_id = $user->id;
					//echo $ride_id;
					$pick_address= $user->pickup_address." ".$user->pickup_city." ".$user->pickup_state." ".$user->pickup_zip; 
					$dropoff_address= $user->dropoff_address." ".$user->dropoff." ".$user->dropoff_state." ".$user->dropoff_zip; 
					echo "<tr>";
					// echo "<td>".$user->id."</td>";
					echo "<td>".$user->name."</td>";
					//echo "<td>".$user->email."<br> <a href='book_again/bookAgain/id/$ride_id' class='btn btn-info dcs_book_again_btn'>Book again</a></td>";
					echo "<td>".$user->email."</td>";
					echo "<td>".$pick_address."</td>";
					echo "<td>".$dropoff_address."</td>";
					echo "<td>".$user->date."</td>";
					echo "<td><a href='book_again/bookAgain/id/$ride_id' class='btn btn-info dcs_book_again_btn'>Book again</a></td>";
					echo "</tr>";
				}

			}
			else
			{
				echo "<tr>";
				echo "<td class='no_result' colspan='6'>No Rides found</td>";
				echo "</tr>";
			}
			?>
 			</tbody>
		</table>
	</div>

<header class="panel-heading dcs-ride-heading"> Upcomming Rides </header>

	<div class="table-responsive">
		<!-- <h1>Upcomming Rides</h1> -->
		<table class="table table-striped b-t b-light text-sm">
			<thead>
				<tr>					
					<!-- <th>id</th> -->
					<th>Name</th>
					<th>Email</th>
					<th>Pick Address</th>
					<th>Drop Address</th>
					<th>Date</th>
				</tr> 
			</thead> 
			<tbody>			
			<?php 

				if($users_upcomming_rides)
				{
				foreach ($users_upcomming_rides as $user) {
					$pick_address= $user->pickup_address." ".$user->pickup_city." ".$user->pickup_state." ".$user->pickup_zip; 
					$dropoff_address= $user->dropoff_address." ".$user->dropoff." ".$user->dropoff_state." ".$user->dropoff_zip; 
					echo "<tr>";
					// echo "<td>".$user->id."</td>";
					echo "<td>".$user->name."</td>";
					echo "<td>".$user->email."</td>";
					echo "<td>".$pick_address."</td>";
					echo "<td>".$dropoff_address."</td>";
					echo "<td>".$user->date."</td>";
					echo "</tr>";
				}
			}
			else
			{
				echo "<tr>";
				echo "<td class='no_result' colspan='6'>No Rides found</td>";
				echo "</tr>";
			}
			?>
 			</tbody>
		</table>
		<p class="text-bellow-upcommingrides">Edit your rides from <a class="text-bellow-upcommingrides-link" href="<?php echo base_url(); ?>">Calender</a>.</p>
	</div>
</section>
</section>
</section>
<a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen" data-target="#nav"></a> </section>