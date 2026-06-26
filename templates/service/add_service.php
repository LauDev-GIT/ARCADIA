<?php require_once _ROOTPATH_.'\templates\header.php';
   require_once 'App/Repository/ServiceRepository.php' 
/** @var  \App\Entity\Service $service*/


 ?>
<form method="POST">

<fieldset>
          <legend>
           <label for="name" class="form-label"><strong>Nom du service</strong></label>
          </legend>

        <input type="text" class="form-control <?=(isset($errors['name']) ? 'is-invalid': '') ?>" id="name" name="name" value="">
        <?php if(isset($errors['name'])) { ?>
            <div class="invalid-feedback"><?=$errors['name'] ?></div>
        <?php } ?>
    <fieldset>
      <legend>
<label for="description" class="form-control<?=(isset($errors['description']) ? 'is-invalid':'')?>"id="description" rows="10" cols="40"><strong>Description</strong> </label>
    </legend>
<textarea name="description" id="description" rows="10" cols="40">
..... description du servcice ici....
</textarea>
<?php if(isset($errors['description'])) { ?>
            <div><?=$errors['description'] ?></div>
        <?php } ?>
  </fieldset>
        <div>
         <input type="submit" name="saveService"  value="Enregistrer">
        </div>
        
 
 </form>
 

<?php require_once _ROOTPATH_.'\templates\footer.php'; ?>