<?php require_once _ROOTPATH_.'\templates\header.php';
/** @var  \App\Entity\User $user */
?>

<h2>Detail sur l'utilisateur de l'application: <strong>



<div>
<?php foreach ($users as $user){ ?>
    <!--c'est dans l'option que l'on va mettre les rôles qui proviennent de la BDD-->
    <?=$user->getUsername();?>
    <?php } ?>
</div>

    <div>
    <?php foreach($services as $service){ ?>
    <?=$service->getId();?>
    <?php }?>
    </div>
<?php require_once _ROOTPATH_.'\templates\footer.php'; ?>