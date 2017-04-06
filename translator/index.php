<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Yandex Translator</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <h1><a class="yandex" target="_blank" href="http://translate.yandex.com">Powered by Yandex.Translate</a></h1>
    <form name="myform" action="index.php" method="post">
    <tr>
        <td><label for="en">English</label></td>
        <td>
            <textarea name="en" style="font-size: 21px;" cols="15" rows="5" autofocus></textarea>
        </td>
    </tr>
    <tr>
        <td><label for="ru">Russian</label></td>
        <td>
            <?php if(isset($_POST["translate"])): ?>
            <?php $txt = urlencode($_POST["en"]);
                  $txt = htmlspecialchars($txt);
             ?> 
            <?php $data = file_get_contents("https://translate.yandex.net/api/v1.5/tr.json/translate?key=trnsl.1.1.20170404T173438Z.9da8960de5e20711.4344eb7a73a05032d819c59cc32642a4ed5cc62b&text=$txt&lang=en-ru&format=plain&options=1");
            $json = json_decode($data);?>
            <?php foreach($json->text as $text): ?>
            <textarea name="ru" style="font-size: 21px;" cols="15" rows="5"><?php echo $text; ?></textarea>
            <?php endforeach ?>
            <?php else: ?>
            <textarea name="ru" style="font-size: 21px;" cols="15" rows="5"></textarea>
            <?php endif ?>
        </td>
    </tr>
    <input type="submit" name="translate" value="Translate">
    </form>
</body>
</html>