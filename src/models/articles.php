<?php
require_once('./db_connect.php');

$createArticle = $dbh->prepare('INSERT INTO article VALUES (DEFAULT,":title",":content",":img_url",":category_id"":created_at",DEFAULT)');
$getArticles = $dbh->prepare('SELECT * FROM articles');
$getArticleById = $dbh->prepare('SELECT * FROM articles WHERE id_article = :id');
$getArticleByCategory = $dbh->prepare('SELECT * FROM articles INNER JOIN categories ON category_id = :id_category');
$getCategories =  $dbh->prepare('SELECT * FROM categories');
$updateArticleById = $dbh->prepare('UPDATE categories SET title = :title , content = :content, img_url = :img_url, category_id = :category_id, updated_at = :updated_at WHERE id_articles = :id');
$deleteArticleById = $dbh->prepare('DELETE FROM articles WHERE id = :id');

function createArticle($title, $content, $img_url, $category_id)
{
    global $createArticle;
    date_default_timezone_set('Europe/Paris');
    $created_at = date('Y-m-d H:i:s');
    $createArticle->bindValue(":title", $title);
    $createArticle->bindValue(":content", $content);
    $createArticle->bindValue(":img_url", $img_url);
    $createArticle->bindValue(":category_id", $category_id);
    $createArticle->bindValue(":created_at", $created_at);
    $createArticle->execute();
}

function getArticles(): array
{
    global $getArticles;
    $getArticles->execute();
    $articles = $getArticles->fetchAll();
    return $articles;
}

function getArticleById($id): array
{
    global $getArticleById;
    $getArticleById->bindValue(":id", $id);
    $getArticleById->execute();
    $article = $getArticleById->fetchAll();
    return $article;
}

function getArticleByCategory($id_categorie): array
{
    global $getArticleByCategory;
    $getArticleByCategory->bindValue(":id_category", $id_categorie);
    $getArticleByCategory->execute();
    $articlesByCategory = $getArticleByCategory->fetchAll();
    return $articlesByCategory;
}
function getCategories(): array
{
    global $getCategories;
    $getCategories->execute();
    $Categories = $getCategories->fetchAll();
    return $Categories;
}

function updateArticleById($title, $content, $img_url, $category_id, $id)
{
    global $updateArticleById;
    date_default_timezone_set('Europe/Paris');
    $date = date('Y-m-d H:i:s');
    $updateArticleById->bindValue(":title", $title);
    $updateArticleById->bindValue(":content", $content);
    $updateArticleById->bindValue(":img_url", $img_url);
    $updateArticleById->bindValue(":category_id", $category_id);
    $updateArticleById->bindValue(":id", $id);
    $updateArticleById->bindValue(":updated_at", $date);
    $updateArticleById->execute();
}

function deleteArticleById($id)
{
    global $deleteArticleById;
    $deleteArticleById->bindValue(':id', $id);
    $deleteArticleById->execute();
}
