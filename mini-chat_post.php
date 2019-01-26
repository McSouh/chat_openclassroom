<?php 
setcookie('pseudo', $_POST['pseudo'], time() + 365*24*3600, null, null, false, true);


try {
    $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', 'root');
} catch(Exception $e) {
    die('Erreur : '.$e->getMessage());
};

if(isset($_POST['pseudo']) && isset($_POST['message'])){
    $pseudo = htmlspecialchars($_POST['pseudo']);
    $message = htmlspecialchars($_POST['message']);
    
    $req = $bdd->prepare('INSERT INTO mini_chat(pseudo, message) VALUES (:pseudo, :message)');
    $req->execute(array(
        'pseudo' => $pseudo,
        'message' => $message
    ));
}
header('Location: mini-chat.php');

?>