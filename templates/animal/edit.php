<?php require_once _TEMPLATEPATH_ . '/header.php';
/** @var \App\Entity\Animal $animal*/
?>
<h1><?= $pageTitle; ?></h1>
<style>
  .picture_animal{
    height: 20%;
    width: 20%;
  }
</style>

    <section class="section-two">
        <picture class="section-two__bloc img">
         
        <source 
            srcset="././assets/images/image_svg/<?=$animal->getLastName();?>.svg" alt="photo d'un animal du zoo"
            media="(min-width: 321px)"
          />
         

          <img 
            src="././assets/images/image_svg/<?=$animal->getLastName();?>.svg"
            alt="photo d'un animal du zoo"
           
          />
        </picture>
        <div class="section-two__bloc">
        <div>
            <?php foreach ($races as $race){
                /** @var App\Entity\Race $race */
                ?>
                
           <?php }?>
        </div>

        <div>
       
<strong><?=$animal->getLastName();?></strong> est un animal qui fait partie de la catégorie <strong><?=$race->getAbel(); ?></strong>
        </div>
        <br>
       <div>
        Comment se sent-il à l'intérieur du ZOO:
        <strong><?=$animal->getState(); ?></strong></div>
      
      </div>
      </section>

    <?php require_once _TEMPLATEPATH_ . '/footer.php'; ?>