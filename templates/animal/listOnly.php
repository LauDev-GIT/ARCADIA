<?php require_once _ROOTPATH_.'\templates\header.php'; 
/** @var \App\Entity\Animal $animal*/

    
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
<h1><?= $pageTitle; ?></h1>
<section class="section-two">
<div class="section-two__bloc text"  media="(min-width: 321px)">

<caption>
 
 <h2><?= $pageTitle1; ?></h2>
 
    </caption>
 </div>

 <div class="section-two__bloc">
<table>
  <thead>
    <tr>
    <th>Nom</th>
    <th>Cliquez sur l'image</th>
    
    </tr>
  </thead>
<tbody>
<?php foreach ($animaux as $animal) {
  /** @var \App\Entity\Animal $animal*/
    ?>
<tr>
    
    <td><?=$animal->getLastName();?></td>
    <td><a href="?controller=animal&action=only&id=<?=$animal->getId() ?>"><img src="././assets/images/image_svg/<?= $animal->getLastName();?>.svg" alt="photo d'un animal du zoo"></a></td>
    
    
  </tr>
  <?php } ?>
</tbody>
</table>

</div>

      </section>



<?php require_once _ROOTPATH_.'\templates\footer.php'; ?>