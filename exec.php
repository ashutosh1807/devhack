 <?php
 	$data = $_POST['param'];
	exec('/usr/local/bin/python3 script.py ' . $data, $out, $status);
	echo implode(" ",$out);
?>