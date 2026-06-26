<?php require_once _TEMPLATEPATH_ . '/header.php'; 

var_dump($_POST)
?>
<h1>Login</h1>



<?php foreach ($errors as $error) { ?>
    <div  role="alert">
        <?= $error; ?>
    </div>
<?php } ?>

<form method="POST">
    <div >
        <div >
            <label for="username" class="form-label">Nom de l'utilisateur</label>
            <input type="username" class="form-control" id="username" name="username">
        </div>
        <div >
            <label for="password" class="form-label">Mot de passe</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>

        <input type="submit" name="loginUser"  value="Se connecter">

</form>

<?php require_once _TEMPLATEPATH_ . '/footer.php'; ?>