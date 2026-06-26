<?php require_once _ROOTPATH_.'\templates\header.php'; 
 /** @var App\Entity\Race $race */ 
?>
 <h1><?= $pageTitle; ?></h1>
 <h2><?=$race->getAbel()?></h2>
<h2><?=$race->getRaceId(); ?></h2>
 

<?php require_once _ROOTPATH_.'\templates\footer.php'; ?>