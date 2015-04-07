<?include("/template/header.php");?>
<?
if(!empty($_POST['title']) && !empty($_POST['text'])){
    $title = $_POST['title'];
    $text = $_POST['text'];
    if(add_new($title, $text)){
        $message = ("Новость успешно добавлена");
    }
}else{
    $error = "Поля не заполненны";
}
?>
    <h1>Добавить новость</h1>
    <ul>
        <li><a href="/index.php">Вернуться на главную страницу</a></li>
    </ul>
    <form method="post">
        <?
        if ($_POST['hidden'] == "Y"){
            if($error){
               echo $error."<br>";
            }
            if($message){
                echo $message."<br>";
            }
        }
        ?>
        <label>Заголовок новости<br>
            <input type="text" name="title">
        </label><br>
        <label>Содержание новости<br>
            <textarea name="text"></textarea>
        </label><br>
        <input type="hidden" value="Y" name = "hidden">
        <input type="submit" value="Добавить"></button>
    </form>
<?include("/template/footer.php");?>