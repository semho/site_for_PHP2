<?include("/template/header.tpl");?>
    <h1>Главная страница</h1>
        <ul>
            <li><a href="/add_news.php">Добавить новость</a></li>
        </ul>

    <?
    if(!all_news()){
        die(mysql_error());
    }else{ ?>
            <div class ="news">
                <?foreach(all_news() as $key => $items){ ?>
                <div>
                    <h3><a href = "/page.php?id=<?=$items['id']?>" ><?=$items['title']?></a></h3>
                </div>
                <?}?>
            </div>
    <?}?>
<?include("/template/footer.tpl");?>