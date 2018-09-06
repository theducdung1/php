<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
    require "database.php";
    class Chat{
        public function luu(){
            $id = 1;
            $conn = Database::connect();
            $sql = "INSERT INTO chats (message, usernameID) VALUES (:message, :usernameID)";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':message', $message);
            $stmt->bindParam(':usernameID', $usernameID);
            $message = Database::test_input($_POST['content']);
            $usernameID = $id;
            $stmt->execute();
        }
        public function in(){
            $conn = Database::connect();
            $id = 1;
            $sql = "SELECT usernameID, message FROM chats";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
            foreach ($stmt->fetchAll() as $k => $v){
                foreach ($v as $key => $value){
                    echo $value;
                    echo " ";
                }
                echo "<br>";
            }            
        }
    }
?>