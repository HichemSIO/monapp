<form method="post" action="index.php?ac=gerer&action=controledelete">
    <label for="id">Liste des membres : </label>
    <select id="id" name="id">
        <?php
       
        foreach ($lesMembres as $unVisiteur) { ?>
            <option type="text" value="<?php echo $unVisiteur['id']; ?>">
                <?php echo $unVisiteur['id'] ?>
                <?php echo $unVisiteur['prenom'] ?>
                <?php echo $unVisiteur['nom'] ?></option>
        <?php } ?>
    </select>
    <input type="submit" value="valider">
    <input type="submit" value="annuler">

</form>