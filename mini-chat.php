<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Maximus'chat</title>
    <style>
   
    .form {
        text-align: center;
    }
    .chat {
        width: 40%;
        margin: auto;
        background-color: lightgray;
    }
    </style>
</head>
<body>
    <form class="form" action="./mini-chat_post.php" method="post">
    <label for="">Pseudo : <br> </label><input name="pseudo" type="text" 
    value="<?php echo(isset($_COOKIE["pseudo"]) ?  $_COOKIE['pseudo'] : null) ?>" > 
    <br> <br>
    <label for="">Message : <br> </label><textarea name="message" id="" cols="50" rows="10"></textarea> <br> 
    <input type="submit">
    </form>
    <div class="form"> <br>
    <h1>Les messages : </h1>
    <br>
    </div>
    <div class="chat">
    <?php 
    $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8','root','root');
    $req = $bdd->query('SELECT pseudo, message, DATE_FORMAT(date, "%d/%m/%Y %Hh%imin%ss") AS date FROM mini_chat ORDER BY id DESC LIMIT 0, 10');
    while($donnees = $req->fetch()){
        echo $donnees['date'].' | '.$donnees['pseudo'].' :   '.$donnees['message'].'<br>';
    };
    $req->closeCursor();
    
    ?>
    </div>
    
</body>
</html>