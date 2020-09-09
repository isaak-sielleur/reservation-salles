<?php

    session_start();

    $link= mysqli_connect("127.0.0.1", "root", "", "forum");

    echo 'blaa'.$_GET['topic'];
    

    if (!empty($topic) && isset($topic)) {
        $topic= $_GET['topic'];

        $query= mysqli_query($link, "SELECT * FROM `conversations` WHERE id_topic= $topic");
        $resultattopics= mysqli_fetch_all($query, MYSQLI_ASSOC);

    }
    else {
        header('location:../index.php');
    }

    // AFFICHER LES DISCUSSIONS
?>

<html>

    <head>
        <link rel="stylesheet" href="apparence/forum.css">
        <link href="https://fonts.googleapis.com/css2?family=Alice&family=Girassol&family=Josefin+Sans&display=swap" rel="stylesheet">
        <title>Forum Doctor Who</title>
        <link rel="shortcut icon" type="jpg" href="medias/icone.png"/>
    </head>

    <body class="forum">
        <?php include('header-footer/header.php'); ?>



        <?php include('header-footer/footer.php'); ?>
    </body>

</html>