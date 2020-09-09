<?php

    session_start();

    if (!empty($_GET['topic']) && isset($_GET['topic'])) {

        $topic= $_GET['topic'];

        $link= mysqli_connect("127.0.0.1", "root", "", "forum");

        $query= mysqli_query($link, "SELECT id_topic FROM `topics` WHERE id_topic= $topic");
        $resultattopic= mysqli_fetch_all($query, MYSQLI_ASSOC);
        var_dump($resultattopic);

        if (empty($resultattopic)) {
            header('location:index.php');
        }
    }
    else {
        header('location:index.php');
    }

    $query= mysqli_query($link, "SELECT * FROM `conversations` WHERE id_topic= $topic");
    $resultatconv= mysqli_fetch_all($query, MYSQLI_ASSOC);

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