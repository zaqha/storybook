<?php 
include "../class/database.php";
include "../class/dd.php";
include "../class/user.php";
    
    if(!empty($_POST['submit'])){
        $input = $_POST;
        $user = new User();
        $user->addOne($input);
        dd($user);
        $url = "./index.php?msg=add_ok";
        header("Location: $url");
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
    <div class="center">
        <h3>新增資料</h3>
    </div>
    <div class="center">
        <a href="./index.php">回首頁</a>
    </div>
    <br>
    <form action="" method="post" enctype="multipart/form-data">
    <table>
        <tr>
            <th>id</th>
            <th>name</th>
            <th>password</th>
            <th>level</th>
            <th>visible</th>
        </tr>
        <tr>
            <td>id</td>
            <td><input type="text" name="name" id="name"></td>
            <td><input type="text" name="password" id="password"></td>
            <td><input type="number" name="level" id="level"></td>
            <td>
            <select name="visible" id="visible">
                <option value="Y">Y</option>
                <option value="N">N</option>
            </select>
            </td>
        </tr>
    </table>
    <input type="submit" value="submit" name="submit">
    </form>
</body>
</html>