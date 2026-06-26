<?php require_once _ROOTPATH_.'\templates\header.php'; 
/** @var  \App\Entity\Service $service*/
?>
 <h1><?= $pageTitle; ?></h1>
<h2><?=$service->getName(); ?></h2>
 <p><?=$service->getDescription(); ?></p>
 

<?php require_once _ROOTPATH_.'\templates\footer.php'; ?>