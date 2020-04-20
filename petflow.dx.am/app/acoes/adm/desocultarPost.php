<?php

    require_once '../../../vendor/autoload.php';
    
    if (isset($_POST['idPost'])) {
        $idPost = $_POST['idPost'];
    }

    \app\crud\PostDao::setPostVisivel($idPost);

?>