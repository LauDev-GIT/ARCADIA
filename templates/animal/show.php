<?php require_once _ROOTPATH_.'\templates\header.php';
/** @var \App\Entity\Animal $animal*/
?>
<section class="section-two">
 <div class="section-two__bloc text"  media="(min-width: 321px)">
<h1><?= $pageTitle; ?></h1>
</div>
<div class="section-two__bloc">
<table>
  <thead>
    <tr>
     <th> Nom de l'animal</th>
    <th> Habitat</th>
    <th>Race</th>
    <th>Son etat de sante</th>
    <th>Detail sur l'animal</th> 
    </tr>
  </thead>
<tbody>
<tr>
    <td>
<h2><?=$animal->getLastName(); ?></h2>
</td>
<?php foreach ($habitats as $habitat){
                /** @var App\Entity\Habitat $habitat */
                ?>
                
           <?php }?>
<td>
<span><?=$habitat->getName()?></span>
</td>
<?php foreach ($races as $race){
                /** @var App\Entity\Race $race */
                ?> 
                
           <?php }?>
<td>
<span><?=$race->getAbel()?></span>
</td>

<td>
<strong><?=$animal->getState(); ?></strong>
</td>
<?php foreach ($veterinaryReports as $veterinaryReport ){
                /** @var App\Entity\VeterinaryReport $veterinaryReport*/
                ?> 
                
           <?php }?>
           <td> <span><?=$veterinaryReport->getDetail();?></span></td>
</tr>

  
  </tbody>
  </table>
  </div>
  
        </section>
<?php require_once _ROOTPATH_.'\templates\footer.php'; ?>