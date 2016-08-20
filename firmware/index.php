<?php
	
ini_set('default_charset', 'UTF-8');	

	//read the version text file located in power/firmware
	$myFile = "latest.txt";
	$fh = fopen($myFile, 'r') or die('did not open file');
	$stablev = trim(fread($fh, 10));
	fclose($fh);
	$stablesz = format_bytes(filesize('NetDISK_Power_v'.$stablev.'.img'));

	//read the version text file located in power/firmware
	$myFile = "testing.txt";
	$fh = fopen($myFile, 'r') or die('did not open file');
	$testingv = trim(fread($fh, 15));
	fclose($fh);
	$testingsz = format_bytes(filesize('NetDISK_Power_t'.$testingv.'.img'));

	//read the testing release notes 
	$myFile = "CHANGE_TEST.txt";
	$fh = fopen($myFile, 'r') or die('did not open change_test');
	$testch = nl2br( trim(fread($fh,filesize($myFile))) );
	fclose($fh);
	
	//read the version text file located in power/navigator 
	$myFile = "../navigator/latest.txt";
	$fh = fopen($myFile, 'r') or die('did not open navigator_latest.txt');
	$navigatorv = trim(fread($fh, 10));
	fclose($fh);
	

		
function format_bytes($bytes) {
   if ($bytes < 1024) return $bytes.' B';
   elseif ($bytes < 1048576) return round($bytes / 1024, 2).' KB';
   elseif ($bytes < 1073741824) return round($bytes / 1048576, 2).' MB';
   elseif ($bytes < 1099511627776) return round($bytes / 1073741824, 2).' GB';
   else return round($bytes / 1099511627776, 2).' TB';
}


?>

<h1>NetDISK Power Operating System Firmware</h1>

<b>Latest Stable .img:</b> <a href="NetDISK_Power_v<?php echo $stablev; ?>.img">NetDISK_Power_v<?php echo $stablev; ?>.img</a> (<?php echo $stablesz ?>)<br><br>
<b>Change Log:</b> <a href="CHANGE_LOG.txt">Open</a> (Right Click to download)<br><br>


<b>Latest Testing .img:</b> <a href="NetDISK_Power_t<?php echo $testingv; ?>.img">NetDISK_Power_t<?php echo $testingv; ?>.img</a> (<?php echo $testingsz ?>)<br><br>
<b>Testing Change Log:</b> <a href="CHANGE_TEST.txt"> (Right Click to download)</a><br><br>
<span charset="UTF-8">
<!--style="font-family: Code2000, 'TITUS Cyberbit Basic', 'Doulos SIL', 'Chrysanthi Unicode', 'Bitstream Cyberbit', 'Bitstream CyberBase', Thryomanes, Gentium, GentiumAlt, 'Lucida Grande', 'Arial Unicode MS', 'Microsoft Sans Serif', 'Lucida Sans Unicode';"-->
<?php
	echo $testch;
?>
</span>