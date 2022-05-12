<?php


include_once 'resources/models/PlanningModel.php';
	$id=$_REQUEST['id'];




deletePlanning($id);
		print(
			'<script type="text/javascript">
				alert("Planning verwijdert!");
				location="index.php";
			</script>'
		);


?>