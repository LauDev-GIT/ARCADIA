<?php require_once _ROOTPATH_ . '/templates/header.php';

/** @var App\Entity\Image $image */
?>
 
        <div>
            Habitats:
            <?php foreach ($habitats as $habitat){
                /** @var App\Entity\Habitat $habitat */
                echo $habitat->getName();
            }?>
        </div>
            <div >
                <img src="<?= $image->getImagePath() ?>" class="" alt="<?= $image->getImageData() ?>">
                 </div>

                <div>
                    
                    <a href="index.php?controller=image&action=show&id=<?= $image['id'] ?>">Voir la liste des habitats</a>
                
            </div>

       
  




<?php require_once _ROOTPATH_ . '/templates/footer.php'; ?>