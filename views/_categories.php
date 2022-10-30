<?php
require_once dirname(__DIR__, 1) . "/src/models/articles.php";
?>
<div class="p-medium dark-mode-secondary">
    <ul class="container d-flex justify-between">
        <?php $Categories = getCategories();
        foreach ($Categories as $Categorie) { ?>
            <li><a class="link-secondary regular" href="./index.php?id=<?= $Categorie['id_categorie'] ?>"><?= $Categorie['name'] ?></a></li>
        <?php } ?>
    </ul>
</div>