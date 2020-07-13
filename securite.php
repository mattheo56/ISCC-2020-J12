<?php

/*todo: emter user and password of database*/
$dbUser = 'root';
$dbPassword = '';

try {
    $dbh = new PDO('mysql:host=localhost;dbname=base-site-rooting', $dbUser, $dbPassword);
} catch (PDOException $e) {
    print "Error : ".$e->getMessage();
    die();
}

if($_POST['password'] && $_POST['login']) {
    $rq = "select * from utilisateurs where login = '".$_POST['login']."'";
    $stmt = $dbh->query($rq);
    $user = $stmt->fetch(); 

    if($user) { 
        if($user['password'] === $_POST['password']) {
            session_start();
            $_SESSION["login"]=$user["login"];
            $_SESSION["img-path"]=$user["img-path"];
            setcookie("login", $_SESSION ["login"]);
            setcookie("img-path", $_SESSION ["img-path"]);
            header("Location: mini-site-routing.php");
        } else {
            echo"<p>Mauvais couple identifiant / mot de passe.</p>";
            echo "<a href= mini-site-routing.php?page=connexion> lien connexion </a>";
        }
    }
} else {
    echo "<p>Identifiant ou mot de passe vide.";
}

?>