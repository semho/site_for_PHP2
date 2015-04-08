<?include("/template/header.tpl");?>
<?
if(!empty($_POST['title']) && !empty($_POST['text'])){
    $title = $_POST['title'];
    $text = $_POST['text'];
    if(add_new($title, $text)){
        $message = "Новость успешно добавлена";
    }
}else{
    $error = "Поля не заполненны";
}
?>

<?include("template/add_news.tpl")?>
<?include("/template/footer.tpl");?>