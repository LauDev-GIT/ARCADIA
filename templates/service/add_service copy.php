<?php require_once _ROOTPATH_.'\templates\header.php';
   require_once 'App/Repository/ServiceRepository.php' 
/** @var  \App\Entity\Service $service*/


 ?>
<form method="POST">

<fieldset>
          <legend>
            <b>Service</b>
          </legend>
          <div >
        <label for="name" class="form-label">Nom du service</label>
        <input type="text" class="form-control <?=(isset($errors['name']) ? 'is-invalid': '') ?>" id="name" name="name" value="">
        <?php if(isset($errors['name'])) { ?>
            <div class="invalid-feedback"><?=$errors['name'] ?></div>
        <?php } ?>
    </div>
          <div>
          <label for="description" class="form-control<?=(isset($errors['description']) ? 'is-invalid':'')?>"id="description" rows="10" cols="40"><strong>Description</strong> </label>
<textarea name="description" id="description" rows="10" cols="40">
    ..... description du servcice ici....
</textarea>
<?php if(isset($errors['description'])) { ?>
            <div><?=$errors['description'] ?></div>
        <?php } ?>
</div>

<div>
<label for="service_id" class="form-label">Veuillez saisir le services</label>
<select name="service_id" id="service_id" form="form-select">
  <?php foreach($services as $service){ ?>
    <option value="<?=$service->getId();?>"><?=$service->getName()?></option>
    <?php }?>

</select>


</div>
        </fieldset>
        <div>
         <input type="submit" name="saveService"  value="Enregistrer">
        </div>
        
 
 </form>
 

<?php require_once _ROOTPATH_.'\templates\footer.php'; ?>