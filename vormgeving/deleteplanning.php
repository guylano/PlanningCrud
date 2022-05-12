<?php
	include_once 'resources/models/PlanningModel.php';
	$id=$_REQUEST['id'];


	print('<form id="Cancel" action="showplanning.php" method="post" class="inline">
                                <input type="hidden" name="id" value="'.$id.'">
                                <input type="submit"  value="submit">
                                </form>');

	print('<form id="Delete" action="confirmdeleteplanning.php" method="post" class="inline">
                                <input type="hidden" name="id" value="'.$id.'">
                                <input type="submit"  value="submit">
                                </form>');



	
	print(
		'<script type="text/javascript">
			var tf = false;
			while(tf != "true"){
				var validate = prompt("Typ JA om te verwijderen typ NEE om terug te gaan");
				if(validate === "JA"|| validate === "NEE"){
					var tf = "true";
					if(validate === "NEE"){
						var form =document.getElementById("Cancel");
						form.submit();
						//window.stop();	
					}else{
						var form =document.getElementById("Delete");
						form.submit();
						//window.stop();
					}
				}else{
					alert("we hebben alleen JA of NEE");
				}
			}
			
		</script>'
	);
	
	
?>