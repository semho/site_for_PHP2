<?include("/template/header.php");?>
    <h1>Главная страница</h1>
        <ul>
            <li><a href="#">Добавить новость</a></li>
        </ul>

    <?
    if(!all_news()){
        die(mysql_error());
    }else{ ?>
            <div class ="news">
                <?foreach(all_news() as $key => $items){ ?>
                <h3><a href = "/page.php?id=<?=$items['id']?>" ><?=$items['title']?></a></h3>
                <?}?>
            </div>
    <?}?>
<?include("/template/footer.php");?>