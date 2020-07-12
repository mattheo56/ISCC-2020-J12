<! DOCTYPE html >
< html  lang = " fr " >
< tête >
< nav  class = " menu " >
< ul >
< Li > < a  href = " mini-site-routing.php? Page = 1 " > accueil </ a > </ li >
< Li > < a  href = " mini-site-routing.php? Page = 2 " > page 1 </ a > </ li >
< Li > < a  href = " mini-site-routing.php? Page = 3 " > page 2 </ a > </ li >
< Li > < a  href = " admin.php " > admin </ a > </ li >
</ ul >
</ nav >
< tilte > Mini-site-routing </ tile >
< meta  charset = " utf-8 " >
< meta  name = " viewport " content = " width = device-width, initial-scale = 1.0 " >
</ tête >
< corps >

<? php
si ( $ page == 1 )
echo  "<h1> accueil! </h1>" ;

si ( $ page == 2 )
echo  "<h1> page 1! </h1>" ;

si ( $ page == 3 )
echo  "<h1> page 2! </h1>" ;

?>

</ corps >
</ html >