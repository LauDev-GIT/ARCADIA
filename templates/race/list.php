<?php require_once _ROOTPATH_.'\templates\header.php'; 
/** @var \App\Entity\Race $race*/

?>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 18px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
.pagination{
display: flex;
}
</style>


<h2> Table des races du zoo</h2>

<table>
  <thead>
    <tr>
    <th>id</th>
    <th>Categorie</th>
    
    </tr>
  </thead>
<tbody>
<?php foreach ($races as $race) {
  /** @var \App\Entity\Animal $animal*/
    ?>
<tr>
    <td><?=$race->getRaceId();?></td>
    <td><?=$race->getAbel();?></td>
    
    
  </tr>
  <?php } ?>
</tbody>
</table>
<form method="POST">
<div>
    <label for="last_name" class="form-label">Prenom</label>
    <input type="text" name="last_name" id="last_name" class="form-control"> 
</div>

<div>

<label for="state" class="form-label">Etat de sante</label>
<textarea name="state" id="state" cols="30" rows="10"></textarea>
</div>


<div>
<!--Selection de race je vais avoi besoin de recuperer les races depuis la base de donnees-->
<label for="race_id" class="form-label">Race</label>
<select name="race_id" id="race_id" class="form-select">
    <?php foreach ($races as $race){ ?>
    <!--c'est dans l'option que l'on va mettre les races qui proviennent de la BDD-->
    <option value="<?=$race->getRaceId() ?>"><?=$race->getAbel() ?></option>
    <?php } ?>
</select>
</div>

 </form>

<?php require_once _ROOTPATH_.'\templates\footer.php'; ?>