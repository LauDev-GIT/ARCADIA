<?php require_once _ROOTPATH_.'\templates\header.php';

/** @var \App\Entity\Animal $animal*/

?>

 <h1><?= $pageTitle; ?></h1>
 
 <form method="POST">
<fieldset>
    <legend>
<b>Animal</b>
    </legend>

    <label for="last_name" class="form-label">Prenom</label>
    <input type="text" name="last_name" id="last_name" class="form-control">

    </fieldset>

    <fieldset>
<legend>
   <label for="state" class="form-label">Etat de sante</label>
</legend>
<textarea name="state" id="state" cols="30" rows="10"></textarea>
    </fieldset>

<fieldset><legend>
<!--Selection de race je vais avoi besoin de recuperer les races depuis la base de donnees--> 
<label for="race_id" class="form-label">Categorie</label>
</legend>
<select name="race_id" id="race_id" class="form-select">
    <?php foreach ($races as $race){ ?>
    <!--c'est dans l'option que l'on va mettre les races qui proviennent de la BDD-->
    <option value="<?=$race->getRaceId()?>"><?=$race->getAbel()?></option>
    <?php } ?>
</select>
</fieldset>

<fieldset>

    <legend>
<!--Selection de race je vais avoir besoin de recuperer les habitats depuis la base de donnees-->
<label for="habitat_id" class="form-label">Habitat</label>
    </legend>
    <select name="habitat_id" id="habitat_id" class="form-select">
    <?php foreach ($habitats as $habitat){ ?>
    <!--c'est dans l'option que l'on va mettre les races qui proviennent de la BDD-->
    <option value="<?=$habitat->getId()?>"><?=$habitat->getName()?></option>
    <?php } ?>
</select>
</fieldset>

</fieldset>



<div>
    <input type="submit" value="Enregistrer" name="saveAnimal">
</div>

 </form>
<?php require_once _ROOTPATH_.'\templates\footer.php'; ?>