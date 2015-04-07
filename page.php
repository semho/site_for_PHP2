<?include("/template/header.php");?>
<? $id = $_GET['id']?>
<h1>Страница новости</h1>
    <ul>
        <li><a href="/index.php">Вернуться на главную страницу</a></li>
        <li><a href="/add_news.php">Добавить новость</a></li>
   </ul>

<?if(!view_new($id)){
    die(mysql_error());
}else{ ?>
    <div>
        <?php
        $array = view_new($id);
        ?>
        <h3><?=$array["title"]?></h3>
        <div><?=$array["text"]?></div>
    </div>
<?}?>
<?include("/template/footer.php");?>
