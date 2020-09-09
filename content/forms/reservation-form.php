<!-- MICHAEL -->

<section class="form-reservation"> 

    <form action="planning.php" method="post">

        <div>
            <label for="name">Nom de votre évènement :</label>
            <input type="text" name="name" autocomplete="off" required>
        </div>

        <div>
            <label for="password">Description de votre évènement :</label>
            <input type="text" name="descrip" autocomplete="off" required>
        </div>

        <div>
            <label class="type" for="type">Sélectionnez votre type d'evenement :</label>
            <select name="type_event" id="">
                <option value="prive">Privé</option>
                <option value="public">Ouvert au public</option>
                <option value="entreprise">Evènement d'entreprise</option>
            </select>
        </div>

        <div>
            <label class="salle" for="salle">Choisissez votre salle :</label>
            <select name="salle" id="">
                <option value="petite">Malmont (100 personnes)</option>
                <option value="moyenne">La verriere (200 personnes)</option>
                <option value="grande">Mira (500 personnes)</option>
                <option value="tresgrande">Gargantua (1 000 personnes)</option>
            </select>
        </div>

        <div>
            <label>Horaire début :</label>
            <input type="date" name="datedeb" required>
            <input type="time" name="timedeb" value="08:00" step="3600" min="08:00" max="18:00" required>
        </div>

        <div>
            <label>Horaire fin :</label>
            <input type="time" name="timefin" value="09:00" step="3600" min="09:00" max="19:00" required>
        </div>
        
        <div>
            <button type="submit" name="reserver" >Reserver</button>
        </div>

    </form>

</section>