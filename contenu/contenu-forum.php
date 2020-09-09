<?php

    $link= mysqli_connect("127.0.0.1", "root", "", "forum");

    // AFFICHER LES TOPICS
    $query= mysqli_query($link, "SELECT * FROM `topics` ORDER BY id_topic DESC");
    $resultattopics= mysqli_fetch_all($query, MYSQLI_ASSOC);

?>

<?php foreach($resultattopics as $intitules): ?>
    <main class="topicapparence">
        <div class="orientation">
            <a href="discussion.php?topic=<?=$intitules['id_topic']?>"><?=$intitules['name']?> &nbsp &nbsp</a>
            <p><?=$intitules['date']?></p>
        </div>

        <div class="sujet">
            <br/>
            <p><?=$intitules['sujet']?></p>
        </div>
    </main>
<?php endforeach; ?>