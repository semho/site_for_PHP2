<!DOCTYPE html>
<html >
<head lang="ru">
    <meta charset="utf-8">
    <title>Сайт для второго курса PHP</title>
    <link rel="stylesheet" href="css/style.css" media="screen">
</head>
<body>
<section id="main">
    <h1>Добавить новость</h1>
    <ul>
        <li><a href="/lesson_1/">Вернуться на главную страницу</a></li>
    </ul>
    <form method="post" id = "form_add_news" action="/Lesson_1/form.php">
        <span id = 'error'>
            <?=$error. '<br />'?>
        </span>
        <span id = 'message'>
            <?=$message.'<br />'?>
        </span

        <label>Заголовок новости<br>
            <input type="text" name="title" id = "title">
        </label><br>
        <label>Содержание новости<br>
            <textarea name="text"></textarea>
        </label><br>
        <input type="hidden" value="Y" name = "hidden">
        <input type="submit" value="Добавить" id = "submit"></button>
    </form>
</section>
<footer>
    <div>
        © Copyright 2015. All Rights Reserved.
    </div>
</footer>

</body>
</html>