<?php
include "../class/database.php";
include "../class/dd.php";
include "../class/user.php";

$user = new User();
$data = $user->getAll();

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
<a href="../story/index.php">回story首頁</a>
<a href="./create.php">單筆新增</a>
<table>
    <tr>
      <th>id</th>
      <th>name</th>
      <th>password</th>
      <th>level</th>
      <th>visible</th>
      <th>修改/刪除</th>
    </tr>
    <?php foreach ($data as $key => $value) : ?>
      <tr>
        <td><?= $value['id']; ?></td>
        <td><?= $value['name']; ?></td>
        <td><?= $value['password']; ?></td>
        <td><?= $value['level']; ?></td>
        <td><?= $value['visible']; ?></td>
        <td>
        <!-- admin無法編輯刪除 -->
        <?php if($value['name'] != "admin"):?>
        <a href="edit.php?id=<?= $value['id']; ?>">編輯</a>
        /
        <a href="del.php?id=<?= $value['id']; ?>">刪除</a>
        <?php endif; ?>
        </td>
      </tr>
    <?php endforeach; ?>
  </table>
</body>
</html>