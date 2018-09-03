<?PHP
function ft_split($str)
{
	if ($str == NULL)
		return (NULL);
	$str = preg_replace('/\s+/', " ", trim($str));
	$tab = explode(" ", $str);
	sort($tab);
	return ($tab);
}
?>
