<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <title>Сайт для второго курса PHP</title>
    <link rel="stylesheet" href="css/style.css" media="screen">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js">
    </script>
    <!--[if IE]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js">
    </script>
    <![endif]-->
</head>

<body>
<header>
    <?
    require_once("config.php")
    ?>
</header>

<section id="main">
    <h1>Главная страница</h1>
        <ul>
            <li><a href="#">Добавить новость</a></li>
            <li><a href="#">Просмотреть все новости</a></li>
        </ul>

    <?
    $resultat = mysql_query("SELECT * FROM news ORDER BY data_a DESC",$db);
    $array = mysql_fetch_array($resultat);
    if(!$array){
        die(mysql_error());
    }else{
        do
        {?>
            <div class ="news">
                <h3><a href = "/page.php?id=<?=$array['id']?>" ><?=$array['title']?></a></h3>
                <div><?=$array['text']?></div>
            </div>
        <?
        }
        while($array = mysql_fetch_array($resultat));
    }
    ?>
</section>

<footer>
    <div>
    © Copyright Year by Author. All Rights Reserved.
    </div>
</footer>

</body>
</html>