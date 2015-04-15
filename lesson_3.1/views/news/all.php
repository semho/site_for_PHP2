<!DOCTYPE html>
<html>
<head lang="ru">
    <meta charset="utf-8">
    <title>Сайт для второго курса PHP</title>
    <link rel="stylesheet" href="css/style.css" media="screen">
</head>
<body>
<section id="main">
    <h1>Все новости</h1>
    <ul>
        <li><a href="/lesson_3.1/?ctrl=admin">Добавить новость</a></li>
    </ul>
    <div class ="news">
        <?php foreach ($items as $item): ?>
            <div>
                <h3>
                    <a href = "/lesson_3.1/?ctrl=article&act=OneShow&id=<?=$item['id']?>" >
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
        © Copyright 2015. All Rights Reserved.
    </div>
</footer>

</body>
</html>