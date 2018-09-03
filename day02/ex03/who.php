#!/usr/bin/php
<?PHP
$fd = fopen("/var/run/utmpx", 'r');
$tab = [];
while($utmpx = fread($fd, 628))
{
	$unpack = unpack("a256User/a4Id/a32Line/iPid/iType/I2Time/a256Host/i16Pad", $utmpx);
	$tab[] = $unpack;
}
date_default_timezone_set('Europe/Paris');
foreach ($tab as $log)
{
	if ($log['Type'] == 7)
	{
		echo $log['User']."  ";
		echo $log['Line']."  ";
		echo date("M d H:i", $log['Time1']);
		echo "\n";
	}
}
?>
