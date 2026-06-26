
<?php require_once _TEMPLATEPATH_ . '/header.php';

/** @var \App\Entity\User $user */


   
?>
 <section class="section-two">
 <div class="section-two__bloc text"  media="(min-width: 321px)">
<h1><?= $pageTitle; ?></h1>
<div >
  <a href="?controller=service&action=add">Ajouter un service</a>
<a href="?controller=animal&action=add">Ajouter un Animal</a>
</div>
</div>

<div class="section-two__bloc">
<table>
  <thead>
    <tr>
    <th>Animal</th>
    <th>Rapport du Veterinaire</th>
    <th>Avis du Visiteur</th>
    </tr>
  </thead>
<tbody>
   
                <tr>
    <td> <a href=" ?controller=animal&action=list">Liste des Animaux</a> </td>
    <td><a href="?controller=veterinaryReport&action=list">Liste des Rapports</a> </td>
    <td><a href="?controller=avis&action=list">liste des Avis du Visiteur</a> </td> 
    

  </tr>
  
  
</tbody>
</table>
</div>

      </section>

<?php require_once _ROOTPATH_.'\templates\footer.php'; ?>