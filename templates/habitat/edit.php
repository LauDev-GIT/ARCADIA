<?php require_once _ROOTPATH_.'\templates\header.php';
/** @var  \App\Entity\Habitat $habitat */
?>

 <section class="section-two">

 <div class="section-two__bloc text"  media="(min-width: 321px)">

<caption>
 
 <h1><?= $pageTitle; ?></h1>
 
    </caption>
 </div>
        <div class="section-two__bloc">
 <table>
   <thead>
   
     <tr>
     
       <th>Nom</th>
       <th>ACTION</th>
     </tr>
   </thead>
   <tbody>
   <?php foreach ($animaux as $animal){
                /** @var App\Entity\Animal $animal */
                ?>
     <div>
<tr>

<td><?=$animal->getLastName() ;?></td>

<td><img src="././assets/images/image_svg/<?= $animal->getLastName();?>.svg" alt="photo d'un animal du zoo"></td>
</tr>
<?php }?>
   </tbody>
 </table>

</div>
          </div>
      </section>
      
<?php require_once _ROOTPATH_.'\templates\footer.php'; ?>