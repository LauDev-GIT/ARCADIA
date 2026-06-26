<?php require_once _ROOTPATH_.'\templates\header.php';
/** @var \App\Entity\Animal $animal*/
?>
<section class="section-two">
 <div class="section-two__bloc text"  media="(min-width: 321px)">
<h1><?= $pageTitle; ?></h1>
</div>
<div class="section-two__bloc">
<table>
  <thead>
    <tr>
     <th>Animal</th>
    <th>Son etat de sante</th>
    </tr>
  </thead>
<tbody>
<tr>
    <td>
<?=$animal->getLastName(); ?>
</td>

<td>
<strong><?=$animal->getState(); ?></strong>
</td>
</tr>
  </tbody>
  </table>
  </div>
  
        </section>
<?php require_once _ROOTPATH_.'\templates\footer.php'; ?>