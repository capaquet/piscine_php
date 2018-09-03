<?php
function auth($login, $passwd)
{
  $file = file_get_contents("../private/passwd");
  $file = unserialize($file);
  foreach ($file as $user)
  {
    if ($user[login] === $login && $user[passwd] === hash(whirlpool, $passwd))
    {
      return (TRUE);
    }
  }
  return (FALSE);
}
?>
