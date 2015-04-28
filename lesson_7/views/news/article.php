<!DOCTYPE html>
<html>
<head lang="ru">
    <meta charset="utf-8">
    <title>Сайт для второго курса PHP</title>
    <link rel="stylesheet" href="http://php2.loc/lesson_7/css/style.css" media="screen">
</head>
<body>
<section id="main">
    <h1>Новость</h1>
    <ul>
        <li><a href="/lesson_7/">Вернуться на главную страницу</a></li>
        <?if (App::isAdmin($_SESSION['user']['id'])) {?>
        <li><a href="/lesson_7/admin/ViewFormNews?id=<?=$items->id?>">Редактировать новость</a></li>
        <li><a href="/lesson_7/admin/DeleteNews?id=<?=$items->id?>">Удалить новость</a></li>
        <?}?>
    </ul>
    <div class ="page_news">
        <h3>
            <?=$items->title; ?>
        </h3>
        <div>
            <?=$items->text; ?>
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