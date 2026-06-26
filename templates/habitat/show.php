<?php require_once _ROOTPATH_.'\templates\header.php';
/** @var  \App\Entity\Habitat $habitat */
?>
 <h1><?= $pageTitle; ?></h1>
 
 <section class="section-two">
        <picture class="section-two__bloc img">
          <source
            srcset="./assets/images/images_studi/illustration-section-2.svg"
            media="(min-width: 321px)"
          />
          
          <img
            src="./asset/images/images_studi/illustration-section-2-small-screen.svg"
            alt="illustration de tous les services proposees"
          />
        </picture>
        <div class="section-two__bloc">
        <h2><?=$habitat->getName(); ?></h2>
        <p><?=$habitat->getDescription(); ?></p>
        <p><?=$habitat->getHabitatCommentary(); ?></p>

        
          <a href="index.php?controller=habitat&action=edit&id=<?= $habitat->getId() ?>">Voir la liste des animaux de l'Habitat <?=$habitat->getName(); ?></a> 
         
        </div>


       
      </section>






<?php require_once _ROOTPATH_.'\templates\footer.php'; ?>