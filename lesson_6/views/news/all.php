<!DOCTYPE html>
<html>
<head lang="ru">
    <meta charset="utf-8">
    <title>Сайт для второго курса PHP</title>
    <link rel="stylesheet" href="http://php2.loc/lesson_6/css/style.css" media="screen">
</head>
<body>
<section id="main">
    <?php if (!empty($_SESSION['user']['login'])){?>
    <div class="user">Привет, <?=$_SESSION['user']['login']?>!</div>
    <?php } ?>
    <h1>Все новости</h1>
    <ul class="links">
        <li><a href="/lesson_6/admin/ViewFormNews">Добавить новость</a></li>
    </ul>
    <div class = "auto">
        <span><a href = "/lesson_6/auto/Authentication">Авторизация</a></span> || <span><a href = "/lesson_6/auto/Reg">Регистрация</a></span> || <span><a href="/lesson_6/?logout=true">Выход</a></span>
    </div>
    <div class="clear"></div>
    <div class ="news">
        <?php foreach ($items as $item):?>
            <div>
                <h3>
                    <a href = "/lesson_6/news/OneShow?id=<?=$item->id?>" >
                        <?php echo $item->title; ?>
                    </a>
                </h3>
                <div><?php echo $item->text; ?></div>
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