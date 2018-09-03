#!/usr/bin/php
<?PHP
if ($argc < 2)
	return;
date_default_timezone_set('CET');
if (preg_match("/^([Ll]undi|[Mm]ardi|[Mm]ercredi|[Jj]eudi|[Vv]endredi) ([0-9]{1,2}) ([Jj]anvier|[Ff]evrier|[Mm]ars|[Aa]vril|[Mm]ai|[Jj]uin|[Jj]uillet|[Aa]out|[Ss]eptembre|[Oo]ctobre|[Nn]ovembre|[Dd]ecembre) ([0-9]{4}) ([0-9]{2}):([0-9]{2}):([0-9]{2})$/", $argv[1], $tab) == 0)
{
		echo "Wrong format\n";
		exit;
}
$month = array("janvier", "fevrier", "mars", "avril", "mai", "juin", "juillet", "aout", "septembre", "octobre", "novembre", "decembre");
foreach ($month as $key => $value)
	if (strcasecmp($value, $tab[3]) == 0)
		$tab[3] = $key + 1;

echo mktime($tab[5], $tab[6], $tab[7], $tab[3], $tab[2], $tab[4])."\n";
?>
