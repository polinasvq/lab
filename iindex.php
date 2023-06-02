<?php
// стартуем сессии, для того чтобы мы могли пользоваться глобальным массивом SESSION, для передачи ошибок
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
   
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Авторизация</title>

   

</head>
<body>
    <body 
    style="background-image: url(img/tihiti.jpg);">
    </body>

    <h2>Авторизация</h2>
    <!-- 
        в параметре action, указываем относительный путь до файла обработчика, 
        который будет принимать все запросы от этой формы, а в параметре method, 
        указываем метод отправки данных в файл 
    -->
   

    <form action="./vendor/log.php" method="post">
        <input type="text" name="login" placeholder="Логин" required> 
        <input type="password" name="password" placeholder="Пароль" required> 
        <input type="submit" value="Войти">
    </form>
    <a href="./registr.php">Зарегистрироваться</a>
    <?php
    // если не сделает данной проверки, (что если данная переменная в глобальном массиве массиве, пустая,
    // то будет выводиться, иначе будет выводиться содержимое), 
    // то будет выведеная ошибка, что данная переменная не найдена
	if (($_SESSION['ErrMes'] ?? '') === ''); else {
	    print_r($_SESSION['ErrMes']);
        // закрываем сессию, чтобы сообщение об ошибке убиралось после перезагрузки страницы
		session_destroy();
	}
    ?>
</body>
</html>