<?php

require_once './vendor/connect.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Админка</title>
</head>
<body> 

<form action="./CreateBook.php" method="post">
  <p>Добавить новую книгу</p>
  <p>имя книги</p> <input type="text" name= "name">
  <p>автор книги</p> <input type="text" name = "author">
  <p>жанр книги</p><input type="text"  name = "genre">
  <p>описание книги</p> <input type="text"  name = "description">
 <p></p> <button type="sumbit" > создать </button>
</form>

<style>
  th, td {
    padding: 10px;
  }

  th {
    background: #606060;
    color: #fff;
  }

  td {
    background: #b5b5b5;
  }
</style>
    <table>
        <tr>
            <th>айди</th>
            <th>почта</th>
            <th>имя</th>
            <th>пароль</th>
            <th>статус</th>
            <th>управление</th>
        </tr>

        <?php
            $sql = "SELECT * FROM `users`";

            $users = mysqli_query($connect, "SELECT * FROM `users`");
            $users = mysqli_fetch_all($users);
            
            foreach ($users as $users) {
            ?>
            <tr>
                <td><?= $users[0] ?></td>
                <td><?= $users[1] ?></td>
                <td><?= $users[3] ?></td>
                <td><?= $users[2] ?></td>
                <td><?= $users[4] ?></td>
                <td><a href="update.php?id=<?= $users[0] ?>">Обновить</a></td>
            </tr>




                
            <?php
        }
        ?>
    </table>
  
    <!-- <P>Вы в админке, здравствуйте моя госпожа</P> -->
</body>
</html>
