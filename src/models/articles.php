<?php
require_once 'db_connect.php';

$createArticle = $dbh->prepare("INSERT INTO articles (title,content,img_url,categorie_id,created_at) VALUES (:title, :content, :imgurl, :categorieid,:createdat)");
$getArticles = $dbh->prepare('SELECT * FROM articles');
// $getArticleById = $dbh->prepare('SELECT * FROM articles WHERE id_article = :id');
// $getArticleBycategorie = $dbh->prepare('SELECT * FROM articles INNER JOIN categories ON categorie_id = :idcategorie');
$getCategories =  $dbh->prepare('SELECT * FROM categories');
// $updateArticleById = $dbh->prepare('UPDATE articles SET title = :title , content = :content, img_url = :imgurl, categorie_id = :categorie_id, updated_at = :updated_at WHERE id_articles = :id');
// $deleteArticleById = $dbh->prepare('DELETE FROM articles WHERE id = :id');

function createArticle($title, $content, $img_url, $categorie_id)
{
    global $createArticle;
    date_default_timezone_set('Europe/Paris');
    $created_at = date('Y-m-d H:i:s');
    $createArticle->bindValue(":title", $title);
    $createArticle->bindValue(":content", $content);
    $createArticle->bindValue(":imgurl", $img_url);
    $createArticle->bindValue(":categorieid", $categorie_id);
    $createArticle->bindValue(":createdat", $created_at);
    return $createArticle->execute();
}

function getArticles(): array
{
    global $getArticles;
    $getArticles->execute();
    $articles = $getArticles->fetchAll();
    return $articles;
}

// function getArticleById($id): array
// {
//     global $getArticleById;
//     $getArticleById->bindValue(":id", $id);
//     $getArticleById->execute();
//     $article = $getArticleById->fetchAll();
//     return $article;
// }

// function getArticleBycategorie($id_categorie): array
// {
//     global $getArticleBycategorie;
//     $getArticleBycategorie->bindValue(":id_categorie", $id_categorie);
//     $getArticleBycategorie->execute();
//     $articlesBycategorie = $getArticleBycategorie->fetchAll();
//     return $articlesBycategorie;
// }
function getCategories(): array
{
    global $getCategories;
    $getCategories->execute();
    $Categories = $getCategories->fetchAll();
    return $Categories;
}

// function updateArticleById($title, $content, $img_url, $categorie_id, $id)
// {
//     global $updateArticleById;
//     date_default_timezone_set('Europe/Paris');
//     $date = date('Y-m-d H:i:s');
//     $updateArticleById->bindValue(":title", $title);
//     $updateArticleById->bindValue(":content", $content);
//     $updateArticleById->bindValue(":img_url", $img_url);
//     $updateArticleById->bindValue(":categorie_id", $categorie_id);
//     $updateArticleById->bindValue(":id", $id);
//     $updateArticleById->bindValue(":updated_at", $date);
//     $updateArticleById->execute();
// }

// function deleteArticleById($id)
// {
//     global $deleteArticleById;
//     $deleteArticleById->bindValue(':id', $id);
//     $deleteArticleById->execute();
// }
