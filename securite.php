<? php

/ * todo: emter utilisateur et mot de passe de la base de données * /
$ dbUser = 'root' ;
$ dbPassword = '' ;

essayez {
    $ dbh = new  PDO ( 'mysql: host = localhost; dbname = base-site- rooting ' , $ dbUser , $ dbPassword );
} catch ( PDOException  $ e ) {
    imprimer "Erreur:" . $ e -> getMessage ();
    die ();
}

if ( $ _POST [ 'password' ] && $ _POST [ 'login' ]) {
    $ rq = "select * from users where login = '" . $ _POST [ 'connexion' ]. "'" ;
    $ stmt = $ dbh -> requête ( $ rq );
    $ user = $ stmt -> fetch ();

    if ( $ user ) {
        if ( $ user [ 'password' ] === $ _POST [ 'password' ]) {
            session_start ();
            $ _SESSION [ "login" ] = $ utilisateur [ "login" ];
            $ _SESSION [ "img-path" ] = $ user [ "img-path" ];
            setcookie ( "login" , $ _SESSION [ "login" ]);
            setcookie ( "img-path" , $ _SESSION [ "img-path" ]);
            en-tête ( "Emplacement: mini-site-routing.php" );
        } else {
            echo "<p> Mauvais couple identifiant / mot de passe. </p>" ;
            echo  "<a href= mini-site-routing.php?page=connexion> lien connexion </a>" ;
        }
    }
} else {
    echo  "<p> Identifiant ou mot de passe vide." ;
}

?>