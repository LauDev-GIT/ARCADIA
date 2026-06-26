<?php require_once _TEMPLATEPATH_ . '/header.php';
/** @var \App\Entity\User $user */
?>

<h1><?= $pageTitle; ?></h1>



<form method="POST">

<div >
        <label for="username" class="form-label">Nom d'utilisateur</label>
        <input type="text" class="form-control <?=(isset($errors['username']) ? 'is-invalid': '') ?>" id="username" name="username" value="">
        <?php if(isset($errors['username'])) { ?>
            <div class="invalid-feedback"><?=$errors['username'] ?></div>
        <?php } ?>
    </div>
    <div >
        <!--Pour etre plus sur essaye d'utiliser un strlen pour verifier la longuur du mot de passe , essaye d'utiliser des expressions reguliere-->
        <label for="password" class="form-label">Mot de passe</label>
        <input type="password" class="form-control <?=(isset($errors['password']) ? 'is-invalid': '') ?>" id="password" name="password" value="">
        <?php if(isset($errors['password'])) { ?>
            <div class="invalid-feedback"><?=$errors['password'] ?></div>
        <?php } ?> 
    </div>

    
    <div >
        <label for="first_name" class="form-label">Nom</label>
        <input type="text" class="form-control <?=(isset($errors['first_name']) ? 'is-invalid': '') ?>" id="first_name" name="first_name" value="">
        <?php if(isset($errors['first_name'])) { ?>
            <div class="invalid-feedback"><?=$errors['last_name'] ?></div>
        <?php } ?>
    </div>
    <div >
        <label for="last_name" class="form-label">Prénom</label>
        <input type="text" class="form-control <?=(isset($errors['last_name']) ? 'is-invalid': '') ?>" id="last_name" name="last_name" value="">
        <?php if(isset($errors['last_name'])) { ?>
            <div class="invalid-feedback"><?=$errors['last_name'] ?></div>
        <?php } ?>
    </div>


    <div>
<!--Selection de race je vais avoi besoin de recuperer les races depuis la base de donnees-->
<label for="role_id" class="form-label">Rôle</label>
<select name="role_id" id="role_id" class="form-select">
    <?php foreach ($roles as $role){ ?>
    <!--c'est dans l'option que l'on va mettre les rôles qui proviennent de la BDD-->
    <option value="<?=$role->getId()?>"><?=$role->getLabel()?></option>
    <?php } ?>
</select>
</div>


<div>
<label for="service_id" class="form-label">Veuillez saisir le service</label>
<select name="service_id" id="service_id" class="form-select">
  <?php foreach($services as $service){ ?>
    <option value="<?=$service->getId()?>"><?=$service->getName()?></option>
    <?php }?>

</select>
</div>
<br>

    <input type="submit" name="saveUser"  value="Enregistrer">

</form>


<?php require_once _TEMPLATEPATH_ . '/footer.php'; ?>