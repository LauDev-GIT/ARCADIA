<?php require_once _TEMPLATEPATH_ . '/header.php';
/** @var \App\Entity\User $user */
?>
<h1><?= $pageTitle; ?></h1>

<!--Exemple 
Formulaire type-->
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>formulaire Admin</title>
    <style type="text/css">
      fieldset {
        border: double medium #ac5834b4;
      }
    </style>
  </head>
  <body>
    <!-- 
                        L'attribut action="nom de fichier.php" repère 1 , 
                      il désigne le fichier qui va traiter, sur le serveur
                        les informations saisies dans le formulaire.


                      Pour que le fichier qui traite les données soit a coup sûr 
                      celui qui contient le formulaire,  
                      on peut utiliser la variable $_SERVER["PHP_SELF"], 
                      qui contient le nom du fichier en cours d'éxecution 
                      comme valeur de l'attribut action.
                    -->
    <form
      method="post"
      action="formulaire.php"
      enctype="application/x-www-form-urlencoded"
    >
      <fieldset>
        <!-- 
                       l'élément <fieldset permet, a l'intérieur d'un même formulaire, 
                        de créer des blocs visuels contenus entre les balises 
                        <fieldset> et </fieldset> et donc structurer le formulaire 
                        en fonction des champs
                        qu'il contient, ce qui améliore la présentation.
                    -->
        <legend>
          <!--
                      l'élément <legend> contient le titre de chacun de ces blocs.
                      A l'intérieur de chaque bloc se trouvent les éléments HTML qui 
                      créent les champs visibles ou invisibles du formulaire 
                    -->
          <b>Espace Admin</b>
          <!--  Corps du formulaire contenant les différents composants -->
        </legend>

        <button >Liste des animaux</button>
        <button>Liste des Habitats</button>
        <button>Liste des rapports Veterinaires</button>
     <button>
            Avis du visiteur
          </button> <br /><br/>
        <fieldset>
          
        </fieldset>

        <fieldset>
          <legend><b>Espace Employee</b></legend>
          <label>Employe(e) :</label
          ><input type="text" name="Employe" size="40" maxlength="256" />
          <label>Nom :</label
          ><input type="text" name="Nom" size="40" maxlength="256" />

          <label>Mot de Passe:</label
          ><input type="text" name="mdp" size="40" maxlength="256" />
          <a href="/#">AJOUTER</a>
        </fieldset>
        <br />
        <fieldset>
          <legend><b>Espace vétérinaire</b></legend>
          <label>Veterinaire :</label
          ><input type="text" name="Veterinaire" size="40" maxlength="256" />
          <label>Nom :</label
          ><input type="text" name="Nom" size="40" maxlength="256" />
          <label>Mot de Passe:</label
          ><input type="text" name="mdp" size="40" maxlength="256" />
          <a href="/#">AJOUTER</a>
        </fieldset>

        <br />

        <fieldset>
          <legend><b>Espace ZOO</b></legend>

          <!--  Corps du formulaire contenant les différents composants -->
          <br />
          <fieldset>
            <legend>Animal</legend>
            <label>Nom :</label
            ><input type="text" name="Race" size="40" maxlength="256" />
            <label>Race:</label>
            <input type="text" name="Nom" size="40" maxlength="256" />
            <a href="/#">MODIFIER</a>   |   <a href="/#">AJOUTER</a>
          </fieldset>
          <br>
          <fieldset>
            <legend>Habitacle</legend>
            <label>Nom :</label
            ><input type="text" name="Race" size="40" maxlength="256" /> <br />
            <br />
            <textarea rows="10" cols="40" name="suggestions" id="">
.....Description ici .....
                                                              </textarea
            >
            <a href="/#">MODIFIER</a>
           
          </fieldset>
 <br>
          <fieldset>
            <legend>
              <b>Service</b>
            </legend>

            <textarea rows="10" cols="40" name="suggestions" id="">
.....Service ici .....
                    </textarea
            >
            <a href="/#">MODIFIER</a>
          </fieldset>
          <fieldset>
            <legend>
              <b>Horaire</b>
            </legend>
            <br />
            <label>Le :</label
            ><input
              type="date"
              name="date"
              min="1974_12_02"
              max="2024_02_05"
            /><br />
            <textarea rows="10" cols="40" name="suggestions" id="">
.....Horaire ici .....
                        </textarea
            >
            <a href="/#">MODIFIER</a>
          </fieldset>
        </fieldset>
      </fieldset>
    </form>
  
<?php require_once _TEMPLATEPATH_ . '/footer.php'; ?>