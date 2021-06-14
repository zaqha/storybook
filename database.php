<?php
// 連結資料庫
class Database{
  public function getConnection(){
    $servername = "localhost";
    $username = "root";
    $password = "123456";

    try {
      $conn = new PDO("mysql:host=$servername;dbname=db_story;port=3306;charset=utf8;", $username, $password);
      // set the PDO error mode to exception
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      //echo "Connected successfully";
    } catch(PDOException $e) {
      //echo "Connection failed: " . $e->getMessage();
    }
    return $conn;
  }
}

?>