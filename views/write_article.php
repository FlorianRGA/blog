<?php
require_once dirname(__DIR__, 1) . "/src/controller/create_article.php";
require_once dirname(__DIR__, 1) . "/views/_doctype.php";
?>
<title>The Super Blug - Créer un article</title>
<?php
require_once dirname(__DIR__, 1) . "/views/_header.php";
?>
<div class="p-medium dark-mode-secondary">
    <ul class="container d-flex justify-between">
        <li><a class="link-secondary regular" href="/"><i class="fa-solid fa-angles-left"></i> Retour</a></li>
    </ul>
</div>
<main class="dark-mode-primary d-flex justify-center items-center">
    <div class="form-card dark-mode-secondary">
        <h1 class="text-white text-center text-primary mt-large">Créer un article</h1>
        <form class="d-flex column p-large" action="./write_article.php" method="post">
            <div class="d-flex justify-between w-100 mt-large">
                <div class="d-flex column w-50 mb-large ">
                    <label class="mb-small text-white" for="title">Titre de l'article</label>
                    <input type="text" name="title" id="title">
                </div>
                <div class="d-flex column w-25 mb-large ">
                    <label class="mb-small text-white" for="categorie">Catégorie de l'article</label>
                    <select class="mb-medium " name="categorie" id="categorie">
                        <option value="null" disabled selected>--Sélectionner une catégorie--</option>
                        <?php $categories = getCategories();
                        foreach ($categories as $categorie) { ?>
                            <option value="<?= $categorie['id_categorie'] ?>"><?= $categorie['name'] ?></option>
                        <?php }
                        ?>
                    </select>
                </div>
            </div>
            <label class="mb-small mt-large text-white" for="content">Contenu de l'article</label>
            <textarea class="mb-large w-100 h-25" name="content" id="content"></textarea>
            <label class="mb-small mt-large text-white w" for="img_url">Lien d'une image</label>
            <input class="mb-large w-50" type="text" name="img_url" id="img_url">

            <div class="d-flex flex-end mb-medium">
                <button class="button" type="submit">Valider l'article</button>
            </div>
        </form>
    </div>
</main>