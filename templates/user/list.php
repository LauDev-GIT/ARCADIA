
<?php require_once _TEMPLATEPATH_ . '/header.php';

/** @var \App\Entity\User $user */
 
?>
 <section class="section-two">

 <div class="section-two__bloc text"  media="(min-width: 321px)">
<h2> Tableau representant tous les utilisateurs de l'Applications</h2>
</div>



<div class="section-two__bloc">
<table>
  <thead>
    <tr>
    <th>Nom</th>
    <th>Prenom</th>
    <th>Action</th>
    </tr>
  </thead>
<tbody>

<div >
    <?php foreach ($users as $user) {
        /** @var App\Entity\User $user */
    ?>
                <tr>
    
    <td><?=$user->getFirstName();?></td>
    <td><?=$user->getLastName();?></td>
    
    

    <td>  <a href="index.php?controller=user&action=delete&username=<?= $user->getUsername() ?>">SUPPRIMER </a> | <a href="index.php?controller=user&action=show&username=<?= $user->getUsername() ?>">Voir l'Identite de l'utilisateur</a> </td>
  </tr>
  </tr>
  <?php } ?>
</tbody>
</table>

</div>

      </section>

<?php require_once _ROOTPATH_.'\templates\footer.php'; ?>