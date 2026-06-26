<?php require_once _ROOTPATH_.'\templates\header.php';
 /** @var App\Entity\Image $image */
?>
 <h1><?= $pageTitle ?></h1>


 <section class="section-two">
        <picture class="section-two__bloc img">
          <source
            srcset="<?=$image->getImagePath()?>" alt="<?=$image->getImageData()?>"
            media="(min-width: 321px)"
          />
          <img src="<?=$image->getImagePath()?>" alt="<?=$image->getImageData()?>">
<!--<img src="/Arcadia_nouveau/assets/images/images_studi/illustration-section-2-small-screen.svg" alt="illustration">-->
        </picture>
        <div class="section-two__bloc">


        <div>
       
            <?php foreach ($habitats as $habitat){
                /** @var App\Entity\Habitat $habitat */
                ?> <span><?=$habitat->getName()?></span>
                
           <?php }?>
           <p>le span permettra d'inserer du css
             pour la description</p>
             <p>
              ajuster l'image en mettant a la place une image du ZOO 
             </p>
        </div>
        
        <div>
          coucou me voilà parti ailleurs
        </div>
        
 <div>
 <?php
                /** @var App\Entity\Habitat $habitat */
                
                ?>
 </div>
          
          <div>
                <span><?=$habitat->getDescription()?></span>
                </div>
                
                <div>
                   <span><?=$habitat->getHabitatCommentary()?></span>
                </div>
                
          <a href="index.php?controller=habitat&action=edit&id=<?= $habitat->getId() ?>">liste des animaux de l'environement appropriée</a>
          
        </div>
      </section>

    


 

 

<?php require_once _ROOTPATH_.'\templates\footer.php'; ?>