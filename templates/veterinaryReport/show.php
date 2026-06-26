<?php require_once _ROOTPATH_.'\templates\header.php';
/** @var  \App\Entity\VeterinaryReport $veterinaryReport*/


?> 
 <h1><?= $pageTitle; ?></h1>
 <h2><?=$veterinaryReport->getId() ?></h2>
 
 <?php foreach ($users as $user){
                /** @var App\Entity\User $user */
                ?> <span><?= $user->getLastName();?></span>
                
           <?php }?>
           
          

  <div>

    <?=$veterinaryReport->getDetail(); ?>
  </div>

  <?php foreach ($animaux as $animal){
                /** @var App\Entity\Animal $animal */
                ?><span><?= $animal->getLastName();?></span>
                
           <?php }?>

           
  
  <div>
  <?php if ($veterinaryReport->getReleaseDate())
{
  echo $veterinaryReport->getReleaseDate()->format('Y/m/d');
}else
{
  echo "N/C";
 } ?>
 </div>

<?php require_once _ROOTPATH_.'\templates\footer.php'; ?>