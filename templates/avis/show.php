<?php require_once _ROOTPATH_.'\templates\header.php';
/** @var  \App\Entity\Avis $avis */
?>
 <h1><?= $pageTitle; ?></h1>

<table>
  <thead>
    <tr>
    <th>Pseudo du Visiteur</th>
    <th>Commentaire</th>
    </tr>
  </thead>
<tbody>
    <td><?=$avis->getPseudo();?></td>
    <td><?=$avis->getComment();?></td> 
  </tr>
</tbody>
</table>

<?php require_once _ROOTPATH_.'\templates\footer.php'; ?>