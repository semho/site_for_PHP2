<!DOCTYPE html>
<html >
<head lang="ru">
    <meta charset="utf-8">
    <title>Сайт для второго курса PHP</title>
    <link rel="stylesheet" href="css/style.css" media="screen">
</head>
<body>
<section id="main">
    <h1>Все новости</h1>
    <ul>
        <li><a href="/lesson_1/form.php">Добавить новость</a></li>
    </ul>
        <div class ="news">
            <?foreach($news as $article){ ?>
                <div>
                    <h3>
                        <a href = "/lesson_1/article.php?id=<?=$article['id']?>" >
                            <?=$article['title']?>
                        </a>
                    </h3>
                </div>
            <?}?>
        </div>
</section>
<footer>
    <div>
        © Copyright 2015. All Rights Reserved.
    </div>
</footer>

</body>
</html>