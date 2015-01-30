<?php
	include ('../db/func.php');
	include ('../../conf.php');
	$msg = '';
	$pid = 0;
	if (isset($_GET['pid'])) $pid = $_GET['pid'];
	if (isset($_POST['pid'])){
		$pid = $_POST['pid'];
		$title=$_POST['name'];
		$in = $_POST['in'];
		$out = $_POST['out'];
		$path = DATA_PATH . '/' . $pid;
		$scan = scandir($path);
		$i = $path . '/' . $title . '.in';
		file_put_contents($i, $in) or die("Error for Input file.") ;
		$o = $path . '/' . $title . '.out';
		file_put_contents($o, $out) or die("Error for Output file.");
		$msg = "Create success.";
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title></title>
	<?php getMetroStyle(); ?>
    <script src="../js/addData.js"></script>
</head>
<body class="metro">
	<div>
		<form action="addData.php" method="post" onsubmit="return addDataSubmitCheck() ">
			<input type="hidden" name="pid" value="<?php echo $pid; ?>" />
			<label><?php echo $msg; ?></label>
			<div id="div_title" class="input-control textarea">
				<label for="title">Title:</label>
				<div class="input-control text span8">
				<input type="text" id="txt_name" name="name"></textarea>
				</div>
			</div>
			<div id="div_in" class="input-control textarea">
<!--div error-state -->
				<label for="in">Input Data:</label>
				<textarea name="in" id="txt_in"></textarea>
			</div>
			<div id="div_out" class="input-control textarea">
				<label for="out">Output Data:</label>
				<textarea name="out" id="txt_out"></textarea>
			</div>
			<div class="place-right">
				<button type="submit" class="primary">Submit</button>
				<?php
					echo "<a href='data.php?pid=$pid'><button type='button' class=''>Cancel</button></a>"
				?>
			</div>
		</form>
	</div>
</body>
</html>
