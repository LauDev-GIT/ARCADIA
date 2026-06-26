
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
    <title>Espace Employee</title>
    <style type="text/css">
      fieldset {
        border: double medium white;
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
      <!--Premier groupe de composants-->
      <fieldset>
        <legend><b>Espace Employee</b></legend>
        <button>CREATION</button>
        <button>AJOUT</button>
        <button>SUPPRESSION</button>
        <button>MODIFICATION</button><br /><br/>
        <!--  Corps du formulaire contenant les différents composants -->
        <fieldset>
          <legend></legend>
          <button>Animal</button>
          <button>Habitacle</button>
          <button>Service</button>
          <button>Horaire</button>
        </fieldset>

        <br />
        <fieldset>
          <legend>Animal</legend>
          <label>Nom :</label
          ><input type="text" name="Race" size="40" maxlength="256" />
          <label>Race:</label>
          <input type="text" name="Nom" size="40" maxlength="256" />
        </fieldset>

        <fieldset>
          <legend>Habitacle</legend>
          <label>Nom :</label
          ><input type="text" name="Race" size="40" maxlength="256" /> <br />
          <br />
          <textarea rows="10" cols="40" name="suggestions" id="">
.....Description ici .....
                                                        </textarea
          >
        </fieldset>

        <fieldset>
          <legend>
            <b>Service</b>
          </legend>

          <textarea rows="10" cols="40" name="suggestions" id="">
.....Service ici .....
              </textarea
          >
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
        </fieldset>
        <fieldset>
          <legend>Avis Receuilli des visiteurs</legend>
          <br />
          <textarea rows="10" cols="40" name="suggestions" id="">
.....Avis receuillis .....
                  </textarea
          >
        </fieldset>
      </fieldset>
    </form>
    <?php require_once _TEMPLATEPATH_ . '/footer.php'; ?>
