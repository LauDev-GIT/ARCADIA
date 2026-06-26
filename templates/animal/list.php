<?php require_once _ROOTPATH_.'\templates\header.php'; 
/** @var \App\Entity\Animal $animal*/
if (isset($_GET["page"]))
    {
        $page =(int)$_GET["page"];
    } else{
        $page = 1;
    }
      $totalAnimaux = 5;
    $totalDePages =  ceil($totalAnimaux / ADMIN_ITEM_PER_PAGE);
    
?>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 18px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
.pagination{
display: flex;
}
</style>

<section class="section-two">
<div class="section-two__bloc text"  media="(min-width: 321px)">

<caption>
 
 <h1><?= $pageTitle; ?></h1>
 
    </caption>
 </div>

 <div class="section-two__bloc">
<table>
  <thead>
    <tr>
    <th>Nom</th>
    <th>Etat de Sante</th>
    <th>Action</th>
    </tr>
  </thead>
<tbody>
<?php foreach ($animaux as $animal) {
  /** @var \App\Entity\Animal $animal*/
    ?>
<tr>
    
    <td><?=$animal->getLastName();?></td>
    <td><?=$animal->getState();?></td>
    <td><a href="/#">Modifier </a> | <a href="?controller=animal&action=delete&id=<?=$animal->getId();?>">Supprimer </a></td>
    
  </tr>
  <?php } ?>
</tbody>
</table>

</div>

      </section>

<?php if ($totalDePages > 1 ){?>
<nav >
<ul class="pagination" >
    <?php for ($i=1; $i <= $totalDePages ;$i++){?>
        <li class="page-item" <?php if($i === $page) {echo 'active';} ?>><a class="page-link" href="?page=<?=$i; ?>"><?=$i; ?></a></li>
    </li>
    <?php }?>
</ul>
</nav>
<?php } ?>

<?php require_once _ROOTPATH_.'\templates\footer.php'; ?>