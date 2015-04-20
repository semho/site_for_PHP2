<!DOCTYPE html>
<html>
<head lang="ru">
    <meta charset="utf-8">
    <title>Сайт для второго курса PHP</title>
    <link rel="stylesheet" href="http://php2.loc/lesson_3_1/css/style.css" media="screen">
</head>
<body>
<section id="main">
    <h1>Новость</h1>
    <ul>
        <li><a href="/lesson_3_1/">Вернуться на главную страницу</a></li>
        <!--<li><a href="/lesson_3_1/?ctrl=admin&id=<?=$item['id']?>&title=<?=$item['title']?>&text=<?=$item['text']?>">Обновить данную новость</a></li>
        -->
    </ul>
    <div class ="page_news">
        <h3>
            <?=$items['title']; ?>
        </h3>
        <div>
            <?=$items['text']; ?>
        </div>
    </div>
</section>
<footer>
    <div>
        <copyright>
    </div>
</footer>

</body>
</html>