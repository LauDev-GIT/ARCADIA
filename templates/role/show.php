<?php require_once _ROOTPATH_.'\templates\header.php'; 
/** @var  \App\Entity\Role $role*/
?>
 <h1><?= $pageTitle; ?></h1>
<h2><?=$role->getId(); ?></h2>
 <p><?=$role->getlabel(); ?></p>
 

<?php require_once _ROOTPATH_.'\templates\footer.php'; ?>