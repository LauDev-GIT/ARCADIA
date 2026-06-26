


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



<h2> Tableau representant tous les utilisateurs de l'Applications</h2>

<table>
  <thead>
    <tr>
    <th>username</th>
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
    <td><?=$user->getUsername();?></td>
    <td><?=$user->getFirstName();?></td>
    <td><?=$user->getLastName();?></td> 
    
    <td>  <a href="?controller=user&action=show&username=<?=$user->getUsername();?>">Editer  </a> | <a href="?controller=user&action=delete&username=<?=$user->getUsername();?>">SUPPRIMER</a> </td>
  </tr>
  </tr>
  <?php } ?>
</tbody>
</table>
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