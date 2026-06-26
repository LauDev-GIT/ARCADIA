<?php require_once _ROOTPATH_.'\templates\header.php'; 
/** @var $veterinaryReport \App\Entity\VeterinaryReport */ 
?> 
 <h1><?= $pageTitle; ?></h1>

 
<form method="POST"> 
<fieldset><legend>
  <!--
                  date de repas de avec le composant date

                  Création d'un champ de saisie de date au format AAA-MM-JJ. 
                  Cretains navigateurs affichent un calendrier qui permet d'éviter les erreurs de saisie. 
                  En ajoutant les attributs min et max, on peut définir les dates minimale et maximale 
                  comme ci-dessous par exmple.

-->
<label for="release_date" class="form-label"><strong>Date :</strong> </label
        >
</legend>
<input
          type="date"
          class="form-control<?=(isset($errors['release_date']) ? 'is-invalid':'')?>"id="release_date" name="release_date" value=""
        /><?php if(isset($errors['release_date'])){ ?>
          <div><?=$errors['release_date'] ?></div>
       <?php } ?>
        </fieldset>
 <br />
      <!--Premier groupe de composants-->
      <fieldset>
        <!-- 
                       l'élément <fieldset permet, a l'intérieur d'un même formulaire, 
                        de créer des blocs visuels contenus entre les balises 
                        <fieldset> et </fieldset> et donc structurer le formulaire 
                        en fonction des champs
                        qu'il contient, ce qui améliore la présentation.-->
                   
        <legend> 
          <!--
                      l'élément <legend> contient le titre de chacun de ces blocs.
                      A l'intérieur de chaque bloc se trouvent les éléments HTML qui 
                      créent les champs visibles ou invisibles du formulaire -->
            Identification de l'animal :
        </legend>
        
        <label for="animal_id" class="form-label"><strong>Numero :</strong></label
        ><input type="number" class="form-control<?=(isset($errors['animal_id']) ? 'is-invalid':'')?>"id="animal_id" name="animal_id" value="" />
        <?php if(isset($errors['animal_id'])){ ?>
          <div><?=$errors['animal_id'] ?></div>
       <?php } ?>
        <br />
        <!--<label>Race :</label
        ><input type="text" name="Race" size="40" maxlength="256" />
        <br />
        <label>Nourriture :</label
        ><input type="text" name="Nourriture" size="40" maxlength="256" />
        <br />
        <label>Grammage:</label
        ><input type="text" name="Grammage" size="4" maxlength="20" /> <label for="">kg</label>
        <br /> -->
      </fieldset>
      <br />
      <!-- Deuxieme groupe de composants......-->

      <fieldset>
        
        <legend>
         
          <label for="detail" class="form-label"><strong>Compte Rendu</strong> </label>
        </legend>
          
          <textarea name="detail" class="form-control<?=(isset($errors['detail']) ? 'is-invalid':'')?>"id="detail" rows="10" cols="40">
.....Commentaire ici .....
          </textarea>
          <?php if(isset($errors['detail'])){ ?>
          <div><?=$errors['detail'] ?></div>
       <?php } ?>
   
        
      </fieldset>
        <br />
      <fieldset>
<legend><strong>Utilisateur :</strong> </legend>
<label for="username" class="form-label">Nom de l'utilisateur</label>
<input type="text" class="form-control<?=(isset($errors['username']) ? 'is-invalid':'')?>"id="username" name="username" value="">
<?php if(isset($errors['username'])){ ?>
          <div><?=$errors['username'] ?></div>
       <?php } ?>
   
        <br />
      </fieldset>
      <input type="submit" name="saveVeterinaryReport" value="Enregistrer">
    </form>

<?php require_once _TEMPLATEPATH_ . '/footer.php'; ?>