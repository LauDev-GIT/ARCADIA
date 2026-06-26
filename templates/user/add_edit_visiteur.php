<?php require_once _TEMPLATEPATH_ . '/header.php';
/** @var \App\Entity\User $user */
?>

<h1><?= $pageTitle; ?></h1>

<form method="POST">

    <div class="mb-3">
        <label for="first_name" class="form-label">Pseudo</label>
        <input type="text" class="form-control <?=(isset($errors['first_name']) ? 'is-invalid': '') ?>" id="first_name" name="first_name" value="">
        <?php if(isset($errors['first_name'])) { ?>
            <div><?=$errors['first_name'] ?></div>
        <?php } ?>
    </div>

    <div class="mb-3">
        <label for="last_name" class="form-label">Nom</label>
        <input type="text" class="form-control <?=(isset($errors['last_name']) ? 'is-invalid': '') ?>" id="last_name" name="last_name" value="">
        <?php if(isset($errors['last_name'])) { ?>
            <div><?=$errors['last_name'] ?></div>
        <?php } ?>
    </div>

<div class="mb-3">
<label for="avis" class="form-label">Veuillez saisir vos commentaires ici</label>
<textarea name="suggestions" id="" rows="10" cols="40">
    .....Commentaires ici....
</textarea>
<input type="text" class="form-control <?=(isset($errors['avis']) ? 'is-invalid': '') ?>" id="avis" name="avis" value="">
<?php if(isset($errors['avis'])) { ?>
            <div><?=$errors['avis'] ?></div>
        <?php } ?>
</div>


<div>
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control <?=(isset($errors['email']) ? 'is-invalid': '') ?>" id="email" name="email" value="">
        <?php if(isset($errors['email'])) { ?>
            <div><?=$errors['email'] ?></div>
        <?php } ?>
    </div>

    <input type="submit" name="saveUser"  value="Enregistrer">

</form>


<?php require_once _TEMPLATEPATH_ . '/footer.php'; ?>