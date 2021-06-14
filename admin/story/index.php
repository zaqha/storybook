<?php
include "../class/database.php";
include "../class/dd.php";
include "../class/story.php";

$story = new Story();
$data = $story->getAll();
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

        <h3>story</h3>

        <a href="../user/index.php">回user首頁</a>
        <a href="./index.php">回首頁</a>
        <a href="./create.php">單筆新增</a>

    <table>
        <tr>
            <th>id</th>
            <th>name</th>
            <th>file_pic</th>
            <th>file</th>
            <th>intro_chinese</th>
            <th>intro_english</th>
            <th>visible</th>
            <th>修改/刪除</th>

        </tr>
        <?php foreach ($data as $key => $value) :?>
        <tr>
            <td><?= $value['id'];?></td>
            <td><?= $value['name'];?></td>
            <td><img src="../../images/<?= $value['file'];?>" alt="<?= $value['file'];?>" width="180px" height="120px"></td>
            <td><?= $value['file'];?></td>
            <td><?= $value['intro_chinese'];?></td>
            <td><?= $value['intro_english'];?></td>
            <td><?= $value['visible'];?></td>
            <td>
                <a href="./edit.php?id=<?= $value['id'];?>" class="btn btn-info btn-sm" role="button">修改</a>
                <a href="./del.php?id=<?= $value['id'];?>" class="btn btn-danger btn-sm" role="button">刪除</a>
            </td>
        </tr>
        <?php endforeach;?>
    </table>

</body>

</html>