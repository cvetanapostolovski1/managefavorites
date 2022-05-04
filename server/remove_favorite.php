<?php
	require('db.php');
	
	$res = array();

	if(isset($_POST['row_id'])){

		$query = "DELETE FROM `favorites` WHERE id = ".$_POST['row_id'];
		$result = mysqli_query($con, $query);

		$res['message'] = 'Sucessfully removed' ;

      	echo json_encode($res);
	}


?>