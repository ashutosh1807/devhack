<?php
	 $data = $_POST['param'];
	 $lang = $_POST['lang'];
	exec('~/anaconda3/bin/python3 script.py '.$lang." ". $data, $out, $status);
	echo implode(" ",$out);
?>