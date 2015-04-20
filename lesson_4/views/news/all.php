<!DOCTYPE html>
<html>
<head lang="ru">
    <meta charset="utf-8">
    <title>Сайт для второго курса PHP</title>
    <link rel="stylesheet" href="http://php2.loc/lesson_3_1/css/style.css" media="screen">
</head>
<body>
<section id="main">
    <h1>Все новости</h1>
    <ul>
        <li><a href="/lesson_3_1/admin/ViewFormNews">Добавить новость</a></li>
    </ul>
    <div class ="news">
        <?php foreach ($items as $item): ?>
            <div>
                <h3>
                    <a href = "/lesson_3_1/news/OneShow?id=<?=$item['id']?>" >
                        <?php echo $item["title"]; ?>
                    </a>
                </h3>
                <div><?php echo $item["text"]; ?></div>
            </div>
        <?php endforeach; ?>
    </div>
</section>
<footer>
    <div>
        <copyright>
    </div>
</footer>

</body>
</html>