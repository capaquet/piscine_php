<?PHP
function  ft_is_sort($arg1)
{
	$array = $arg1;
	$r_array = $arg1;
	sort($array);
	rsort($r_array);
	if (($array === $arg1) || ($r_array === $arg1))
		return (TRUE);
	return (FALSE);
}
?>
