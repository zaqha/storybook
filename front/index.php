<?php 
    include "../admin/class/database.php";
    include "../admin/class/dd.php";
    include "../admin/class/story.php";
    session_start();

    if(empty($_SESSION['loginUser'])){
        $url = "./login.php";
        header ("Location:$url");
    }else{
        $user = $_SESSION['loginUser'];
    }

    $story = new Story();
    if(!empty($_GET['id'])){
        $id = $_GET['id'];
        $data = $story->getById($id);
        $storyFile = $data['file'];
    }else{
        $data = $story->getFirst();
    }


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>hello</title>
</head>

<body id="page-top">
    <h1 class="masthead-heading text-uppercase mb-0">welcome <?= $user;?></h1>
    <header class="masthead bg-primary text-white text-center">
        <div class="container d-flex align-items-center flex-column">
            <img class="masthead-avatar mb-5" src="../images/<?= $data['file'];?>" alt="<?= $data['file'];?>" />
            
        </div>
    </header>
</body>
</html>