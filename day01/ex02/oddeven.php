#!/usr/bin/php
<?PHP
while (1)
{
	echo "Entrez un nombre: ";
	if ($value = fgets(STDIN))
	{
		$value = trim($value);
		if (is_numeric($value))
		{
			$last_nbr = $value[strlen($value)- 1];
			if ($last_nbr % 2 == 0)
				echo "Le chiffre ".$value." est Pair\n";
			else
				echo "Le chiffre ".$value." est Impair\n";
		}
		else
			echo "'$value'"." n'est pas un chiffre\n";
	}
	else
		return;
}
?>
