<?php require_once _ROOTPATH_.'\templates\header.php'; 
/** @var  \App\Entity\User $user*/
?>
 
 
 <section class="section-two">

 <div class="section-two__bloc text"  media="(min-width: 321px)">
 
 <caption>
 RECAPITULATIF
 <h1><?= $pageTitle; ?></h1>
    </caption>
 </div>

 <div class="section-two__bloc">

<!-- CREATION d'un Tableau en html-->
  <table border = 1 width = 50% >
   
    <!-- En tete du tableau-->
    <thead>
        <tr>
            <th>
                Pseudo de l'utilisateur
            </th>
            <th>
                Nom
            </th>
            <th>
                Prenom
            </th>
            <th>
                 Role
            </th>
            <th>
                Le service qui lui est attribue
            </th>
        </tr>
    </thead>
    <!-- Corps du tableau-->
     <tbody>
        <tr>
            <td><h2><?=$user->getUsername(); ?></h2></td> 
            <td><p><?=$user->getFirstName(); ?></p> </td>
            <td><p><?=$user->getLastName(); ?></p></td>

            <?php foreach ($roles as $role){
                /** @var App\Entity\Role $role */
                ?>
                
           <?php }?>
           <td><span><?=$role->getLabel(); ?></span></td>
            
            <?php foreach ($services as $service){
                /** @var App\Entity\Service $service */
                ?> 
                
           <?php }?>

           <td> <span><?=$service->getName(); ?></span></td>
        </tr>
     </tbody>

  </table>

</div>

      </section>
 


<?php require_once _ROOTPATH_.'\templates\footer.php'; ?>