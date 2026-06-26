<?php require_once _ROOTPATH_.'\templates\header.php'; 
/** @var  \App\Entity\Service $service*/
?>
 <section class="section-two">

 <div class="section-two__bloc text"  media="(min-width: 321px)">
 <h1><?= $pageTitle; ?></h1>
 </div>
 
 <div class="section-two__bloc">
<table>
  <thead>
    <tr>
    
    <th>Nom</th>
    <th>description</th>
    <th>Action</th>
    </tr>
  </thead>
<tbody>

<div >
    <?php foreach ($services as $service) {
        /** @var App\Entity\User $user */
    ?>
                <tr>
    <td><?=$service->getName();?></td>
    <td><?=$service->getDescription();?></td> 
    

    <td> <a href="?controller=service&action=delete&id=?id">SUPPRIMER</a> </td>
  </tr>
  </tr>
  <?php } ?>
</tbody>
</div>
</table>

</div>

      </section>

<?php require_once _ROOTPATH_.'\templates\footer.php'; ?>