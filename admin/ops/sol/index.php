<?php	
	include ("../../db/DB.Class.php");
	include ("../db/func.php"); 
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8"/>
		<title></title>
		<?php getAllStyle(); ?>
	</head>
	<body>
		<div class="container-fluid">
			<div id="toolbar" class="row">
				<nav class="navbar navbar-default" role="navigation">
					<div class="navbar-header">
						<span class="navbar-brand">Tools</span>
					</div>
						<?php
						 showReload(); 
						?>
				</nav>
			</div>
			<div id="lists" class="row metro" style="with:100%;">
				<table class="table striped hovered dataTable" id="datatable">
					<thead>
				
					</thead>
					<tbody>
						<?php
							$sql="select * from solution";
						?>
					</tbody>
				</table>
			</div>
		</div>
	</body>
</html>
