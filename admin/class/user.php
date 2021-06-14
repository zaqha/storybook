<?php

class User{
        private $table = "user";
        public $dbConnect;
        private $id;
        private $name;
        private $password;
        private $level;
        private $visible;

        public function __construct(){
            $db = new Database();
            $this->dbConnect = $db->getConnection();
        }

        // 【所有資料】================================
        public function getAll(){
          $sql = "SELECT * FROM $this->table";
          $getData = $this->dbConnect->prepare($sql);
          $getData->execute();
          $data = $getData->fetchAll(PDO::FETCH_ASSOC);
          return $data;            
        }


      // 【新增資料】================================
      // $name = $input['name'];
      // $location = $input['location'];
      // $price = $input['price'];
      // $people = $input['people'];
      // $sql = "INSERT INTO stores (id, name , location, price, people) 
      // VALUE (NULL, '$name', '$location', '$price', '$people')";
  
      // $insertData = $conn->prepare($sql);  預處理
      // $insertData->execute();  執行

        public function addOne($input){
          $this->name = $input['name'];
          $this->password = $input['password'];
          $this->level = $input['level'];
          $this->visible = $input['visible'];

          $sql = "INSERT INTO $this->table (name,password,level,visible)
          -- :表示變數
          VALUES (:name, :password,:level, :visible)";
          
          $addData = $this->dbConnect->prepare($sql);
          $addData->bindParam(':name', $this->name);
          $addData->bindParam(':password', $this->password);
          $addData->bindParam(':level', $this->level);
          $addData->bindParam(':visible', $this->visible);
          $addData->execute();
        }

        // 【編輯資料】
        // (1)把 getByid data 放到form表單內
        // $id = $input['id'];
        // $sql = "SELECT * FROM stores WHERE id = '$id'";
        // $getData = $conn->prepare($sql);
        // $getData->execute();
        // $editdata = $getData->fetch(PDO::FETCH_ASSOC);

        public function getByid($id){
          $this->id = $id;
          
          // $sql = "SELECT * FROM stories";
          $sql = "SELECT * FROM $this->table WHERE id = :id";
          $getData = $this->dbConnect->prepare($sql);
          $getData->bindParam(':id', $this->id);
          $getData->execute();
          $data = $getData->fetch(PDO::FETCH_ASSOC);
          return $data;            
        }

        // (2)編輯資料後更新
        // $id = $_GET['id'];
        // $name = $input['name'];
        // $location = $input['location'];
        // $price = $input['price'];
        // $people = $input['people'];
      
        // $sql = "UPDATE `stores` SET `name`='$name',`location`='$location',`price`='$price',`people`='$people' WHERE id = '$id'";
        // $updateData = $conn->prepare($sql);
        // $updateData->execute();

        public function update($input){
          $this->id = $input['id'];
          $this->name = $input['name'];
          $this->password = $input['password'];
          $this->level = $input['level'];
          $this->visible = $input['visible'];            
          
          $sql = "UPDATE $this->table SET name = :name , password = :password , level = :level , visible = :visible WHERE id = :id";

          $addData = $this->dbConnect->prepare($sql);
          $addData->bindParam(':name', $this->name);
          $addData->bindParam(':password', $this->password);
          $addData->bindParam(':level', $this->level);
          $addData->bindParam(':visible', $this->visible);
          $addData->bindParam(':id', $this->id);
          $addData->execute();            
        }

        // 【刪除】
        
        public function delete($id){
          $this->id = $id;
          $sql = "DELETE FROM $this->table WHERE id = :id";
          $delData = $this->dbConnect->prepare($sql);
          $delData->bindParam(':id', $this->id);
          $delData->execute();            
        }

        // 帳號check
        public function check($input){
            $this->name = $input['name'];
            $this->password = $input['password'];
            $sql = "SELECT * FROM $this->table WHERE name = :name AND 
            password = :password";
            //echo "$sql";
            $getData = $this->dbConnect->prepare($sql);
            $getData->bindParam(':name', $this->name);
            $getData->bindParam(':password', $this->password);
            $getData->execute();
            $data = $getData->fetch(PDO::FETCH_ASSOC);
            if ($data) {
                return $data;
            } else {
                return "error";
            }
        }
      }
?>