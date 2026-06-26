<?php require_once _ROOTPATH_.'\templates\header.php'; 
/** @var \App\Entity\VeterinaryReport $report*/
/*if (isset($_GET["page"]))
    {
        $page =(int)$_GET["page"];
    } else{*/
        $page = 1;
    /*}*/
    $totalDePages = 6;
    //var_dump(getTotalAnimaux());
     
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
    <th>Date</th>
    <th>Animal</th>
    <th>Detail</th>
    <th>lien</th>
    <th>Action</th>
    </tr>
  </thead>
<tbody>


<?php foreach ($veterinary_report as $veterinaryReport) {
  /** @var \App\Entity\VeterinaryReport $report*/
  ?>


<tr>
    
    <td><?php if ($veterinaryReport->getReleaseDate())
{
  echo $veterinaryReport->getReleaseDate()->format('Y/m/d');
}else
{
  echo "N/C";
 } ?>
</td>

    
    <td><a href="?controller=animal&action=show&id=<?= $veterinaryReport->getAnimalId(); ?>">Visualiser le detail</td>
    <td><?= $veterinaryReport->getDetail(); ?></td>
    <td> <a href="?controller=user&action=show&username=<?= $veterinaryReport->getUsername(); ?>">Identite de celui qui a pris soin de l'animal</a></td>
    <td><a href="?controller=veterinaryReport&action=delete&id=<?= $veterinaryReport->getId(); ?>">SUPPRIMER (facultatif)</a></td>
   
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