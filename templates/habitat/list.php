<?php require_once _ROOTPATH_ . '/templates/header.php';
?>

<div class="row">
    <?php foreach ($habitats as $habitat) {
        /** @var App\Entity\Habitat $habitat */
    ?>
        <div class="col-md-4 my-2">
            <div class="card w-100">
                <img src="<?= $image->getImageDataPath() ?>" class="card-img-top" alt="<?= $habitat->getName() ?>">
                <div class="card-body">
                    <h5 class="card-title"><?= $habitat->getName() ?></h5>
                    <a href="index.php?controller=habitat&action=show&id=<?= $habitat->getId() ?>" class="btn btn-primary">Voir la liste des habitats</a>
                </div>
            </div>

        </div>
    <?php } ?>
</div>

<?php require_once _ROOTPATH_ . '/templates/footer.php'; ?>