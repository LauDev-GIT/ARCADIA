<?php require_once _TEMPLATEPATH_ . '/header.php';
/** @var \App\Entity\Avis $avis */
?>

<h1><?= $pageTitle; ?></h1>

<form method="POST">
<fieldset>
    <legend>
        <strong>Pseudo du Visiteur</strong>

    </legend>
     <div >
        <label for="pseudo" class="form-label">pseudo</label>
        <input type="text" class="form-control <?=(isset($errors['pseudo']) ? 'is-invalid': '') ?>" id="pseudo" name="pseudo" value="">
        <?php if(isset($errors['pseudo'])) { ?>
            <div class="invalid-feedback"><?=$errors['pseudo'] ?></div>
        <?php } ?>
    </div>
</fieldset>
   
<fieldset>
    <legend>
        <strong>Visibilite</strong>
    </legend>
    <div >
        <label for="isVisible" class="form-label">Visibilite sur la page d'acceuil</label>
        <input type="text" class="form-control <?=(isset($errors['isVisible']) ? 'is-invalid': '') ?>" id="isVisible" name="isVisible" value="">
        <?php if(isset($errors['isVisible'])) { ?>
            <div class="invalid-feedback"><?=$errors['isVisible'] ?></div>
        <?php } ?>
    </div>
</fieldset>
    
    <fieldset>
        <legend>
         <strong>Avis</strong>
        </legend>
        <label for="avis" class="form-control<?=(isset($errors['avis']) ? 'is-invalid':'')?>"id="avis" rows="10" cols="40">Veuillez saisir votre avis</label>
        
        <textarea name="comment" id="" rows="10" cols="40">
    ..... avis ici....
</textarea>
    </fieldset>
    <div >
    


<?php if(isset($errors['avis'])) { ?>
            <div class="invalid-feedback"><?=$errors['avis'] ?></div>
        <?php } ?>
</div>
<?php if ($messages) { ?>
    <?php foreach ($messages as $message) { ?>
        <div>
            <?=$message?>
            <button><a href="?controller=avis&action=add">ajouter un nouvel avis</a></button>
        </div>
   <?php }?>

<?php } ?>


<div>
  <input type="submit" name="saveAvis"  value="Enregistrer">
</div>
    
 
</form>


<?php require_once _TEMPLATEPATH_ . '/footer.php'; ?>