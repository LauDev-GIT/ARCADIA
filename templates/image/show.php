<?php require_once _ROOTPATH_.'\templates\header.php';
 /** @var App\Entity\Image $image */
?>
 


 <section class="section-two">
        <picture class="section-two__bloc img">
          
          <source
            srcset="<?=$image->getImagePath()?>" alt="<?=$image->getImageData()?>"
            media="(min-width: 321px)"
          />
          <img src="<?=$image->getImagePath()?>" alt="<?=$image->getImageData()?>">

        </picture>

        <div class="section-two__bloc">
        <table border = 1 width = 50% >
        <thead>
        <tr>
            <th>
                Nom de l'Habitat
            </th>
            <th>
                Description
            </th>
            <th>
                Commentaire
            </th>
            <th>Action</th>
           
        </tr>
    </thead>

    <tbody>
    <div>
       
       <?php foreach ($habitats as $habitat){
           /** @var App\Entity\Habitat $habitat */
           ?> 
           
      <?php }?>
      
   </div>
        <tr>
            <td><span><?=$habitat->getName()?></span></td> 
            <td><span><?=$habitat->getDescription()?></span></td>
            <td><span><?=$habitat->getHabitatCommentary()?></span></td>
            <td> <a href="index.php?controller=habitat&action=edit&id=<?= $habitat->getId() ?>">liste des animaux de l'environement appropriée</a></td>
        </tr>
     </tbody>

  </table>
                
          
          
        </div>
      </section>

    


 

 

<?php require_once _ROOTPATH_.'\templates\footer.php'; ?>