<?php 
include('includes/db.php');
include('includes/categorie.php');
?>

<label class="mt-3" for="sel1">Categories :</label>
<select class="form-control  w-25 mt-2" id="sel1" name='categorie'>
    <option selected>Categorie</option>
    <?php foreach ($cat as $categorie) { ?>
        <option value='<?= $categorie['nom'] ?>'><?= $categorie['nom'] ?></option>
    <?php }; ?>
    <option value="Autre">Autre</option>
</select>