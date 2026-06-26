<?php require_once _TEMPLATEPATH_ . '/header.php';
/** @var \App\Entity\User $user */
?>

<?php foreach ($errors as $error) { ?>
    <div  role="alert">
        <?= $error; ?>
    </div>

<?php } ?>

<style>
.hero {
  /*
 background-color: #88bc90;
 */
  background: linear-gradient(
    to left,

    #6975a6 4%,
    #88bc90 44%,
    #d68614 84%
  );
  height: 100vh;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  padding-bottom: 100px;
  row-gap: 20px;
}
.hero__description {
  color: white;
}
.hero__search {
  background-color: white;
  border-radius: 10px;
  padding: 20px;
  display: flex;
  column-gap: 30px;
}
.hero__field {
  display: flex;
  flex-direction: column;
  row-gap: 5px;
}
.hero_label {
  color: grey;
  font-size: 14px;
}
.hero__input {
  color: black;
  font-size: 18px;
  width: 300px;
}
.hero__input::placeholder {
  opacity: 1;
}
.button--black {
  background: linear-gradient(
    to left,

    #6975a6 4%,
    #88bc90 44%
  );
  /*background-color: #818181;*/
  color: white;
  border-radius: 5px;
  
}
.hero__searchout{
    background-color: white;
  border-radius: 10px;
  padding: 20px;
  column-gap: 30px;
}
</style>
<section class="hero" >
<form class="hero__searchout"  method="POST">


    <!--1ere div-->
      <div class="hero__field">
        <label class="hero__label" for="username"> Votre nom utilisateur ? (obligatoire)</label>
        <input class="hero__input" type="username" id="username" name="username" value="" placeholder="Nom de l'utilisateur" required="">
      </div>
      <label class="hero__field"  for="password">
        <span class="hero__label">Et ? Mot de Passe</span>
        
     <input class="hero__input" type="password" name="password" value="" placeholder="Mot de passe">
      </label>
      <button class="button button--black" type="submit" name="saveUser" value="Enregistrer">Enregister</button>
      
       <!-- <input type="submit" name="saveUser"  value="Enregistrer">-->
      
      


      
      <!--2ieme div-->
      
      <div class="hero__field">
<label class="hero__label" for="first_name"> Votre nom  ? (obligatoire)</label>
        <input class="hero__input" type="text" class="form-control <?=(isset($errors['first_name']) ? 'is-invalid': '') ?>" id="first_name" name="first_name" value="" placeholder="Nom" required="">
        <?php if(isset($errors['first_name'])) { ?>
            <div class="invalid-feedback"><?=$errors['first_name'] ?>
        
        
        </div>
        <?php } ?>
</div>
<label class="hero__field"  for="last_name">
        <span class="hero__label">Et ? Votre Prenom</span>
        <!--ou estassocier a mon Input juste en dessous-->
        <!-- on peut le ou dans un span 
                                                                         tel que
                                                                        <span> Ou ? </span>-->
        <input class="hero__input"  type="text" class="form-control <?=(isset($errors['last_name']) ? 'is-invalid': '') ?>" id="last_name" name="last_name" value="" placeholder="Prenom">
        <?php if(isset($errors['first_name'])) { ?>
            <div class="invalid-feedback"><?=$errors['last_name'] ?>
        
        
        </div>
        <?php } ?>
      </label>
   



<!--3ieme div-->

<div class="hero__field">
<label class="hero__label" for="role_id" class="form-label">les rôles</label>
<select name="role_id" id="role_id" class="form-select">
    <?php foreach ($roles as $role){ ?>
    <!--c'est dans l'option que l'on va mettre les rôles qui proviennent de la BDD-->
    <option value="<?=$role->getId()?>"><?=$role->getLabel()?></option>
    <?php } ?>
</select>
</div>


<!--4ieme div-->

    <div class="hero__field">
<label class="hero__field"  for="service_id">
        <span class="hero__label">les services</span>
        <select name="service_id" id="service_id" class="form-select">
  <?php foreach($services as $service){ ?>
    <option value="<?=$service->getId()?>"><?=$service->getName()?></option>
    <?php }?>
    </select>
    </div>
    </form>
</section>



<?php require_once _TEMPLATEPATH_ . '/footer.php'; ?>