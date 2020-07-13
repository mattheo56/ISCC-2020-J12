<!DOCTYPE html>
<html lang="fr">
<head>
<nav class="menu">
<ul>
<li><a href="mini-site-routing.php?page=1">accueil</a></li>
<li><a href="mini-site-routing.php?page=2">page 1</a></li>
<li><a href="mini-site-routing.php?page=3">page 2</a></li>
<li><a href="admin.php">admin</a></li>
</ul>
</nav>
<tilte>Mini-site-routing</tile>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>

<?php
if($page == 1)
echo "<h1> accueil ! </h1>";

if($page == 2)
echo "<h1> page 1 ! </h1>";

if($page == 3)
echo "<h1> page 2 ! </h1>";

?>

</body>
</html>