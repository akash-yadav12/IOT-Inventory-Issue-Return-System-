<?php
session_start();

if(isset($_POST["table"]) && isset($_POST["qty"])){
			$con=mysqli_connect("localhost","root","root12345","inventory");
			if($con){

				
				$data = json_decode($_POST["table"]);
				$qty = json_decode($_POST["qty"]);

				foreach($qty as $value)
				{
					if($value==0)
					{
						echo(2);
						exit();
					}
				}

				$grpid=$_POST["group2"];
				$rollid=$_POST["roll2"];
				$dept_name=$_POST["dept2"];
				$i=0;

				if(!empty($data)){
				foreach(array_combine($data, $qty) as $data => $qty)
				{
					$i=$i+$qty;
					if($dept_name=="IT"){
						$get=mysqli_query($con,"SELECT quantity_taken from issue where c_ID='$data' and g_id='$grpid' ORDER BY Rollno LIMIT 1");
					}
					else
					{
						$get=mysqli_query($con,"SELECT quantity_taken from issue where c_ID='$data' and Rollno='$rollid' and Dept_name='$dept'");
					}
					$get1=mysqli_fetch_assoc($get);
					$get_info=$get1["quantity_taken"];
					if($qty==$get_info)
					{
						if($dept_name=="IT"){
							$remove=mysqli_query($con,"DELETE FROM issue WHERE c_ID='$data' and g_id='$grpid' ORDER BY Rollno LIMIT 1");
						}
						else
						{
							$remove=mysqli_query($con,"DELETE FROM issue WHERE c_ID='$data' and Rollno='$rollid' and Dept_name='$dept'");
						}
						
						
					}else
					{
						if($dept_name=="IT")
						{
							$remove=mysqli_query($con,"UPDATE issue set quantity_taken=quantity_taken-$qty WHERE c_ID='$data' and g_id='$grpid' ORDER BY Rollno LIMIT 1");
						}
						else
						{
							$remove=mysqli_query($con,"UPDATE issue set quantity_taken=quantity_taken-$qty WHERE c_ID='$data' and Rollno='$rollid' and Dept_name='$dept'");
						}
					}
					$add=mysqli_query($con,"UPDATE components SET Quantity=Quantity+$qty WHERE C_ID='$data'");
					
					
				}
			/*	if($dept_name=="IT"){
					$txt="'".$i."' Component(s) were Successfully Returned by Group '".$grpid."' of Department '".$dept_name."'";
				}else
				{
					$txt="'".$i."' Component(s) were Successfully Returned by Roll No: '".$rollid."' of Department '".$dept_name."'";
				}
				
				file_put_contents("test.txt", $txt);*/

			}
		
		}	
	
	}	




?>


<?php

	if(isset($_POST["c_id1"]) && isset($_POST["req_qty1"]) && isset($_POST["roll1"]) && isset($_POST["dept1"]))
	{
		
		$con=mysqli_connect("localhost","root","root12345","inventory");
		if($con){
			$roll=$_POST["roll1"];
			$dept=$_POST["dept1"];
			$grp=$_POST["grp1"];
			$data1 = json_decode($_POST["c_id1"]);
			$data2 = json_decode($_POST["req_qty1"]);
			$date=date("Y/m/d");
		
			if(count($data1)!==count(array_unique($data1)))
			{
				echo(10);
				exit();
			}
			
			foreach($data1 as $value){
			if(empty($value))
			{
				echo(3);
				exit();
			}	
		}
		foreach($data2 as $value)
		{
			if($value==0)
			{
				echo(4);
				exit();
			}
		}
		$i=0;
			if(!empty($data1)){
			if($dept=="IT")
			{
				foreach(array_combine($data1, $data2) as $data1 => $data2)
				{
					$i=$i+$data2;
					$exists=mysqli_query($con,"SELECT quantity_taken from issue WHERE c_ID='$data1' and g_id='$grp' and Rollno='$roll' ");

					if(mysqli_num_rows($exists)>0)
					{
						$action=mysqli_query($con,"UPDATE issue SET quantity_taken=quantity_taken+$data2 WHERE c_ID='$data1' and g_id='$grp'");
					}
					if(mysqli_num_rows($exists)==0)
					{
						$sql1=mysqli_query($con,"INSERT INTO issue VALUES('$dept','$date','$data2','$roll','$grp','$data1')");
						
					}
					$sql2=mysqli_query($con,"UPDATE components set Quantity=Quantity-$data2 where C_ID='$data1'");
					/*
					$txt="'".$i."' Component(s) were Successfully Issued to Roll No: '".$roll."' of Department '".$dept."'";
					file_put_contents("test.txt", $txt);*/
				}
			}
			else{
				foreach(array_combine($data1, $data2) as $data1 => $data2)
				{
					$i=$i+$data2;
					$exists=mysqli_query($con,"SELECT quantity_taken from issue WHERE c_ID='$data1' and Rollno='$roll' and Dept_name='$dept'");

					if(mysqli_num_rows($exists)>0)
					{
						$action=mysqli_query($con,"UPDATE issue SET quantity_taken=quantity_taken+$data2 WHERE c_ID='$data1' and Rollno='$roll' and Dept_name='$dept'");
					}
					if(mysqli_num_rows($exists)==0)
					{
						$sql1=mysqli_query($con,"INSERT INTO issue VALUES('$dept','$date','$data2','$roll',NULL,'$data1')");
					}
					$sql2=mysqli_query($con,"UPDATE components set Quantity=Quantity-$data2 where C_ID='$data1'");
				}
				/*
				$txt="'".$i."' Component(s) were Successfully Issued to Roll No: '".$roll."' of Department '".$dept."'";
				file_put_contents("test.txt", $txt);*/
			
			}
				
		}
		
		
	}
}

?>