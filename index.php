<?php
require_once dirname(__FILE__) . "/views/_doctype.php";
?>
<title>The Super Blug</title>
<?php
require_once dirname(__FILE__) . "/views/_header.php";
require_once dirname(__FILE__) . "/views/_categories.php";
?>
<main class="dark-mode-primary">
    <div class="container flew-wrap ">
        <?php $articles = array_reverse(getArticles());
        foreach ($articles as $article) {
            $content = explode(" ", $article['content'], 33);
            array_pop($content); ?>
            <article class="card-position">
                <a href="/show-article.php?article=<?= $article['id_article'] ?>" class="card dark-mode-secondary">
                    <div class="card-image" style="background-image: url(<?= $article['img_url'] ?>);">
                    </div>
                    <div class=" card-text card-title">
                        <h3><?= $article['title'] ?></h3>
                    </div>
                    <div class="dark-mode-primary card-text card-desc">
                        <p><?= implode(" ", $content) ?> ...</p>
                    </div>
                    <p class="text-end text-fourth mt-large"><?= $article['created_at'] ?></p>

                </a>
            </article>
        <?php } ?>
    </div>
</main>

<?php
require_once dirname(__FILE__) . "/views/_footer.php";
?>