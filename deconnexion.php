<?php
// Suppression du cookie sid en lui mettant un valeur dans le temps negative
setcookie('sid', NULL, -1);
// Redirection vers index.php
header("Location: index.php");
exit();
?>
