<?php require_once _TEMPLATEPATH_ . '/header.php'; 


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
.hero__searchout
{
  background-color: white;
  border-radius: 10px;
  padding: 20px;
  column-gap: 30px;
}



</style>



<section class="hero">
<?php foreach ($errors as $error) { ?>
    <div  role="alert">
        <?= $error; ?>
    </div>
<?php } ?>

<form class="hero__searchout"  method="POST">
      <div class="hero__field">
        <!--regarder la documentation  un nom salon et un adresse ou une ville pas des donnees sensible-->
        <label class="hero__label" for="username"> Votre nom utilisateur ? (obligatoire)</label>
        <!--obligatoire va avec rerequired   -->

        <input class="hero__input" type="username" id="username" name="username" value="" placeholder="Nom de l'utilisateur" required="">
      </div>


      <label class="hero__field"  for="password">
        <span class="hero__label">Et ? Mot de Passe</span>
        <!--ou estassocier a mon Input juste en dessous-->
        <!-- on peut le ou dans un span 
                                                                         tel que
                                                                        <span> Ou ? </span>-->
        <input class="hero__input" type="password" name="password" value="" placeholder="Mot de passe">
      </label>
      <button class="button button--black" type="submit" name="loginUser" value="Se connecter">Enregister</button>
      <!--J utilise le bouton de type submit voir doc pourquoi, penser a retirer le / dans form
                                                                        je peut mettre https://wwww.google.fr-->
    </form>


</section>

<?php require_once _TEMPLATEPATH_ . '/footer.php'; ?>