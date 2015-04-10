<h1>Добавить новость</h1>
<ul>
    <li><a href="/index.php">Вернуться на главную страницу</a></li>
</ul>
<form method="post" id = "form_add_news">
    <?
    if ($_POST['hidden'] == "Y"){
        if($error){ ?>
    <span id = 'error'>
    <?
               echo $error."<br>";
    ?>
    </span>
    <?
        }
        if($message){ ?>
        <span id = 'message'>
          <?  echo $message."<br>";?>
        </span>
        <?}
    }
    ?>
    <label>Заголовок новости<br>
        <input type="text" name="title" id = "title">
    </label><br>
    <label>Содержание новости<br>
        <textarea name="text"></textarea>
    </label><br>
    <input type="hidden" value="Y" name = "hidden">
    <input type="submit" value="Добавить" id = "submit"></button>
</form>