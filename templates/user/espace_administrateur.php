

<?php require_once _TEMPLATEPATH_ . '/header.php';

/** @var \App\Entity\User $user */

if (isset($_GET["page"]))
    {
        $page =(int)$_GET["page"];
    } else{
        $page = 4;
    }
    $totalDePages = 6;
   
?>
<style>

</style>
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
    <th>Employee</th>
    <th>Animal</th>
    <th>Service</th>
    <th>Rapport du Veterinaire</th>
    
    </tr>
  </thead>
<tbody>



<tbody>

<div >
   
                <tr>
    <td> <a href="?controller=user&action=list">Liste des utilisateurs</a> </td>
    <td> <a href="?controller=animal&action=list">Liste des Animaux</a> </td>
    <td> <a href="?controller=service&action=list">Liste des Services</a></td>
    <td><a href="?controller=veterinaryReport&action=list">Liste des Rapports</a> </td>
  </tr>
  </tr>
  
</tbody>
</table>

</div>

      </section>

<?php if ($totalDePages > 1 ){?>
<nav >
<ul class="pagination" >
    <?php for ($i=1; $i <= 6 ;$i++){?>
        <li class="page-item" <?php if($i === $page) {echo 'active';} ?>><a class="page-link" href="?page=<?=$totalDePages; ?>"><?=$i; ?></a></li>
    </li>
    <?php }?>
</ul>
</nav>
<?php } ?>
  

<?php require_once _ROOTPATH_.'\templates\footer.php'; ?>