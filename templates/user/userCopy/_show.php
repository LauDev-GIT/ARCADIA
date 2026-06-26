<?php require_once _ROOTPATH_.'\templates\header.php'; 
/** @var  \App\Entity\User $user*/
?>


  <div>
            Role:
            <?php foreach ($roles as $role){
                /** @var App\Entity\Role $role */
                ?> <span><?=$role->getlabel()?></span>
                
           <?php }?>
           <!--<p>le span permettra d'inserer du css pour la description</p>-->
        </div>

        <div>
            Service:
            <?php foreach ($services as $service){
                /** @var App\Entity\Service $service */
                ?> <span><?=$service->getName()?></span>pour pouvoir effectuer <strong><?=$service->getDescription()?></strong>
                
           <?php }?>
           <!--<p>le span permettra d'inserer du css pour la description</p>-->
        </div>


        <h2><?=$user->getUsername(); ?></h2>
            <p><?=$user->getFirstName(); ?></p> 
            <p><?=$user->getLastName(); ?></p>

<?php require_once _ROOTPATH_.'\templates\footer.php'; ?>