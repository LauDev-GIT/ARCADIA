<?php require_once _ROOTPATH_.'\templates\header.php'; 
/** @var \App\Entity\User $user */
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
    <th>Action</th>
    </tr>
  </thead>
<tbody>
                <tr>
    
    <td>RAPPORT</td>
    
    <td>  <a href="index.php?controller=veterinaryReport&action=add">Ajout </a> </td>
  </tr>
  </tr>
  
</tbody>
</table>

        </div>

      </section>






<?php require_once _TEMPLATEPATH_ . '/footer.php'; ?>