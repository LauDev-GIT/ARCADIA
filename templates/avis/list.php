<?php require_once _ROOTPATH_.'\templates\header.php'; 
/** @var \App\Entity\Avis $avis*/
/*if (isset($_GET["page"]))
    {
        $page =(int)$_GET["page"];
    } else{*/
        $page = 1;
    /*}*/
    $totalDePages = 6;
    //var_dump(getTotalAnimaux());
    var_dump($avies);
?>
<section class="section-two">

<div class="section-two__bloc text"  media="(min-width: 321px)">
<h1> Table representant les avis de l'ensemble des visiteurs</h1>
</div>
<div class="section-two__bloc">

<table>
  <thead>
    <tr>
    
    <th>Pseudo</th>
    <th>Commentaire</th>
    <th>Sa visibilite a l'ecran d'acceuil</th>
    <th>Action</th>
    </tr>
  </thead>
<tbody>
<?php foreach ($avies as $avis) {
  /** @var \App\Entity\Animal $animal*/  ?> 
<tr>
   
    <td><?=$avis->getPseudo();?></td>
    <td><?=$avis->getComment();?></td> 
    <td><?=$avis->getIsVisible();?></td>
    <td>MODIFIER | <a href="?controller=avis&action=delete&id=<?=$avis->getId();?>">SUPPRIMER </a> </td>
    
  </tr>
  <?php } ?>
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