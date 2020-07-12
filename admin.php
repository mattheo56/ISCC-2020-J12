<? php
session_start ();
$ message = '' ;

if ( $ _SESSION [ 'login' ]! == 'admin' ) {
    header ( "Location: connexion.php" );
}

fonction  checkFile () {
    $ tabExt = array ( 'jpg' , 'gif' , 'png' , 'jpeg' );
    $ infosImg = array ();

    if (! empty ( $ _FILES [ 'userFile' ] [ 'name' ]))
    {
        $ extension   = pathinfo ( $ _FILES [ 'userFile' ] [ 'nom' ], PATHINFO_EXTENSION );
    
        if ( in_array ( strtolower ( $ extension ), $ tabExt ))
        {
            $ info = pathinfo ( $ _FILES [ 'userFile' ] [ 'name' ]);
            $ ext = $ info [ 'extension' ]; // récupère l'extension du fichier
            $ name = $ _FILES [ 'userFile' ] [ 'name' ];

            $ target = './img/' . $ nom ;
            move_uploaded_file ( $ _FILES [ 'userFile' ] [ 'tmp_name' ], $ target );
        }
        autre
        {
        $ message = 'L \' extension du fichier est incorrecte! ' ;
        }
    } else {
        $ message = 'Veuillez remplir le formulaire svp!' ;
    }

}

fonction  save ( $ path ) {
    $ dbUser = 'root' ;
    $ dbPassword = '' ;
    $ imgpath = 'img /' . $ path ;
    
    essayez {
        $ dbh = new  PDO ( 'mysql: host = localhost; dbname = base-site- rooting ' , $ dbUser , $ dbPassword );
    } catch ( PDOException  $ e ) {
        imprimer "Erreur:" . $ e -> getMessage ();
        die ();
    }

    $ stmt = $ dbh -> query ( "select * from utilisateurs where login = '" . $ _POST [ ' login ' ]. "'" );
    $ user = $ stmt -> fetch ();

    if ( $ user ) {
        $ stm = $ dbh -> query ( "UPDATE utilisateurs SET` password` = '" . $ _POST [ ' password ' ]. "', `img-path` = '" . $ imgpath . "' WHERE login = '" . $ _POST [ 'login' ]. "'" ) Ou mourir ( ' Impossible de mettre à jour l'utilisateur ' );
    } else {
        $ stm = $ dbh -> query ( "INSERT INTO` utilisateurs` (`login`,` password`, `img-path`) VALUES ('" . $ _POST [ ' login ' ]. "', '" . $ _POST [ 'mot de passe' ]. "','" . $ Imgpath . "')" ) Ou mourir ( ' Impossible d'insérer l'utilisateur ' ) ;;

    }
}

if (! empty ( $ _POST [ 'envoyer' ])) {
    if ( $ _FILES && $ _FILES [ 'userFile' ]) {
        checkFile ();
        save ( $ _FILES [ 'userFile' ] [ 'name' ]);
    }
}

?>

< h1 > <? php  echo  $ _SESSION [ "login" ] ?> </ h1 >
< img  src = " <? php  echo  $ user [ 'img-path' ] ?> " alt = ' Image utilisateur ' />

< p  style = " color: red " > <? php  echo  $ message ?> </ p >


< form  enctype = " multipart / form-data " action = " <? php  echo  $ _SERVER [ 'PHP_SELF' ]; ?> " method = " post " >
  < p > Connexion: < input  type = " text " name = " login " requis > </ p >
  < p > Mot de passe: < input  type = " password " name = " password " required > </ p >
  < input  type = " hidden " name = " MAX_FILE_SIZE " value = " 2097152 " required />
  Envoyer un fichier: < input  name = " userFile " type = " file " />    
  < p > < input  type = " submit " value = " Save " name = " envoyer " > </ p >
</ formulaire >