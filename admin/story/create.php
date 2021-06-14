<?php 
include "../class/database.php";
include "../class/dd.php";
include "../class/story.php";
    
    if(!empty($_POST['submit'])){
        $inputFile = $_FILES;
        dd($inputFile);
        $input = $_POST;
        dd($input);

        $target_dir = "../../images/"; //選擇目錄
        $target_file = $target_dir . $_FILES["file"]["name"]; //存放位置與檔名
        move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);
        $input['file'] = $_FILES["file"]["name"];

        $story = new Story();
        $story->addOne($input);
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
    <table class="center" >
        <tr>
            <th>id</th>
            <th>name</th>
            <th>file</th>
            <th>intro_chinese</th>
            <th>intro_english</th>
            <th>visible</th>
        </tr>
        <tr>
            <td>id</td>
            <td><input type="text" name="name" id="name"></td>
            <td><input type="file" name="file" id="file"></td>
            <td><input type="text" name="intro_chinese" id="intro_chinese"></td>
            <td><input type="text" name="intro_english" id="intro_english"></td>
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