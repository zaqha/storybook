<?php
session_start();
include "../class/database.php";
include "../class/dd.php";
include "../class/user.php";

if (empty($_POST['submit'])) {
  // get要編輯的id
  $id = $_GET['id'];
  //update 先把get過來的id 抓過來修改
  $user = new User();
  $data = $user->getById($id);
} else {
  $input = $_POST;
  $user = new User();
  $data = $user->update($input);

  $url = "./index.php?msg=update_ok";
  header("Location: $url");

  // $_SESSION['msg'] = "edit $id _ok";
}
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
<h3>修改資料</h3>
  <a href="index.php">回首頁</a>
  <a href="add.php">新增單筆</a>

  <form action="" method="post">
    <table>
      <tr>
        <th>id</th>
        <th>name</th>
        <th>password</th>
        <th>level</th>
        <th>visible</th>
      </tr>
      <td><?= $data['id']?></td>
            <td><input type="text" name="name" id="name" value="<?= $data['name'];?>"></td>
            <td><input type="text" name="password" id="password" value="<?= $data['password'];?>"></td>
            <td><input type="text" name="level" id="level" value="<?= $data['level'];?>"></td>
            <td>
            <select name="visible" id="visible">
                <option value="<?= $data['visible'];?>"><?= $data['visible'];?></option>
                <option value="<?= $data['visible'];?>">----</option>
                <option value="Y">Y</option>
                <option value="N">N</option>
            </select>
            </td>
    </table>
    <!-- 回傳ID值 -->
    <input type="hidden" name="id" value="<?= $data['id'];?>">
    <input type="submit" value="submit" name="submit">

  </form>

</body>
</html>