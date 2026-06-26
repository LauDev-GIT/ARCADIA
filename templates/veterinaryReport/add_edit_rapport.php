<?php require_once _ROOTPATH_.'\templates\header.php'; 
/** @var $veterinaryReport \App\Entity\VeterinaryReport */ 
?> 
<style>

label {
  display: flex;
  align-items: center;
}

span::after {
  padding-left: 5px;
}

input:invalid + span:after {
  content: "✖";
}

input:valid + span:after {
  content: "✓";
}

</style>

 <h1><?= $pageTitle; ?></h1>

 
<form method="POST"> 
<fieldset>
  <legend>
  <!--
                  date de repas de avec le composant date

                  Création d'un champ de saisie de date au format AAA-MM-JJ. 
                  Cretains navigateurs affichent un calendrier qui permet d'éviter les erreurs de saisie. 
                  En ajoutant les attributs min et max, on peut définir les dates minimale et maximale 
                  comme ci-dessous par exmple.-->
                  
                  <strong>Date :</strong>
                  </legend>
<label > 
selectionner une date:
<input for="date"
          type="date"

          min="2025-01-01"
          max="2025-12-31"
         
          class="form-control<?=(isset($errors['release_date']) ? 'is-invalid':'')?>"id="date" name="release_date" required pattern="\d{4}-\d{2}-\d{2}"
        /><?php if(isset($errors['release_date'])){ ?>
          <div><?=$errors['release_date'] ?></div>
       <?php } ?>
       <span class="validity"></span>
       </label>
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
                      Animal:
        </legend>
        
        <div>
<!--Selection de race je vais avoi besoin de recuperer les races depuis la base de donnees--> 
<label for="animal_id" class="form-label">Nom de l'animal</label>
<select name="animal_id" id="animal_id" class="form-select">
    <?php foreach ($animaux as $animal){ ?>
    <!--c'est dans l'option que l'on va mettre les races qui proviennent de la BDD-->
    <option value="<?=$animal->getId()?>"><?=$animal->getLastName()?></option>
    <?php } ?>
</select>
</div>
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