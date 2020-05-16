<?php
// $connect = mysqli_connect("localhost", "root", "", "iot_inventory");
include 'DB.php';
$output = '';
if(isset($_POST["query"]))
{
	$search = mysqli_real_escape_string( $con,$_POST["query"]);
	$query = "
	SELECT * FROM components 
	WHERE Description LIKE '%".$search."%'
	OR Size LIKE '%".$search."%' 
	OR Price LIKE '%".$search."%'
	";
}
else
{
	$query = "
	SELECT * FROM components ORDER BY C_ID";
}
$result = mysqli_query($con, $query);
if(mysqli_num_rows(mysqli_query($con,$query)) > 0)
{
	$output .= '<div class="table-responsive">
					<table class="table table bordered">
						<tr>
							<th>C_ID</th>
							<th>Description</th>
							<th>Size</th>
							<th>Quantity</th>
							<th>Total Quantity</th>
							<th>Price</th>
						</tr>';
	while($row = mysqli_fetch_array($result))
	{
		$output .= '
			<tr>
				<td>'.$row["C_ID"].'</td>
				<td style="width:300px">'.$row["Description"].'</td>
				<td>'.$row["Size"].'</td>
				<td style="width:150px">'.$row["Quantity"].'</td>
				<td style="width:150px">'.$row["Total_Quantity"].'</td>
				<td>'.$row["Price"].'</td>
			</tr>
		';
	}
	echo $output;
}
else
{
	echo 'Data Not Found';
}
?>