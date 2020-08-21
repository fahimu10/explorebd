<?php

//fetch_data.php

include('database_connection.php');

if(isset($_POST["action"]))
{
	$query = "
				SELECT destinations.destinations_id,
					destinations.destinations_name,
					destinations.destinations_shortdes,
					destinations.destinations_des,
					destinations.destinations_cost,
					destinations.destinations_img,
					divisions.divisions_name
				FROM destinations JOIN divisions ON destinations.divisions_id = divisions.divisions_id WHERE 1
	";
	if(isset($_POST["minimum_price"], $_POST["maximum_price"]) && !empty($_POST["minimum_price"]) && !empty($_POST["maximum_price"]))
	{
		$query .= "
		 AND destinations_cost BETWEEN '".$_POST["minimum_price"]."' AND '".$_POST["maximum_price"]."'
		";
	}
	if(isset($_POST["division"]))
	{
		$division_filter = implode("','", $_POST["division"]);
		$query .= "
		 AND divisions_name IN('".$division_filter."')
		";
	}


	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	$total_row = $statement->rowCount();
	$output = '';
	if($total_row > 0)
	{
		foreach($result as $row)
		{
			$output .= '
			<div class="col-md-4">
				<div class="card">
				<img class="card-img-top img-responsive" src="admin/upload/'. $row['destinations_img'] .'" alt="Card image cap">
				<div class="card-body">
					<h5 class="card-title">'. $row['destinations_name'] .'</h5>
					<p class="card-text mb-1">'. $row['destinations_cost'] .' Taka</p>
					<p class="card-text mb-1">Division: '. $row['divisions_name'] .'</p>
					<p class="card-text mb-3">'. $row['destinations_shortdes'] .'</p>
					<a href="viewdestination.php?destinations_id='. $row['destinations_id'] .'" class="btn btn-primary">Know More</a>
				</div>
				</div>
			</div>
			';
		}
	}
	else
	{
		$output = '<h3>No Data Found</h3>';
	}
	echo $output;
}

?>