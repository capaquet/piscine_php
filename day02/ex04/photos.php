#!/usr/bin/php
<?php
if ($argc > 1)
{
	$formats = array(".jpg", ".gif", ".png", ".svg", ".jpeg");
	$dir = preg_replace('/^(https?:\/\/)/', '', $argv[1]);
	$ch = curl_init($argv[1]);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	if (($page_content = curl_exec($ch)) == FALSE)
	{
		echo "Link error.";
		return (0);
	}
	curl_close($ch);

	if (!file_exists($dir))
	{
		mkdir ($dir);
	}

	preg_match_all('/<img.*src="(.*)".*>/Ui', $page_content, $decoup);

	foreach($decoup[1] as $img_url)
	{
		if (stristr($img_url, "www") == FALSE && stristr($img_url, "http") == FALSE)
		{
			if ($img_url[0] != '/')
				$img_url = '/'.$img_url;
			$img_url = "http://".$dir.$img_url;
		}
		$urls_names = explode('/', $img_url);
		$img_name = end ($urls_names);
		$fullpath = $dir."/".$img_name;
		foreach($formats as $elem)
		{
			if (stristr($img_url, $elem))
			{
				download_image($img_url, $fullpath);
			}
		}
	}
}

function download_image($img_url, $fullpath){
  $ci = curl_init ($img_url);
  curl_setopt($ci, CURLOPT_RETURNTRANSFER, 1);
  $img_dl = curl_exec($ci);
  curl_close ($ci);
  if(file_exists($fullpath))
  {
	unlink($fullpath);
  }
  $file = fopen($fullpath, 'x');
  fwrite($file, $img_dl);
  fclose($file);
}
?>
