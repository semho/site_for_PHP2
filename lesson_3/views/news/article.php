<!DOCTYPE html>
<html>
<head lang="ru">
    <meta charset="utf-8">
    <title>Сайт для второго курса PHP</title>
    <link rel="stylesheet" href="css/style.css" media="screen">
</head>
<body>
<section id="main">
    <h1>Новость</h1>
    <ul>
        <li><a href="/lesson_3/">Вернуться на главную страницу</a></li>
        <li><a href="/lesson_3/form.php?id=<?=$item['id']?>&title=<?=$item['title']?>&text=<?=$item['text']?>">Обновить данную новость</a></li>
    </ul>
    <div class ="page_news">
        <h3>
            <?=$item['title']; ?>
        </h3>
        <div>
            <?=$item['text']; ?>
        </div>
    </div>
</section>
<footer>
    <div>
        © Copyright 2015. All Rights Reserved.
    </div>
</footer>

</body>
</html>