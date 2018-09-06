<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
            require 'chat.php';
            $chat = new Chat();
            if(isset($_POST['submit'])){
                $chat->luu();
            }            
            $chat->in();
        ?>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
            <div name="showBox" id="showBox"></div>
            <input name="content" id="content">
            <input type="submit" value="SEND" name="submit">
        </form>
    </body>
</html>
