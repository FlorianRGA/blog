<?php
require_once dirname(__DIR__, 1) . "/models/articles.php";
$errors = [
    "title" => "",
    "categorie" => "",
    "img_url" => "",
    "content" => ""
];
$success = "Votre article a été publié";


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // TITLE
    if (!mb_strlen($_POST['title']) == 0) {
        if (mb_strlen($_POST['title']) >= 4) {
            if (mb_strlen($_POST['title']) <= 80) {
                $_POST['title'] = filter_var($_POST['title'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            } else {
                $errors["title"] = "Votre titre ne doit pas exceder 80 caracteres";
            }
        } else {
            $errors['title'] = "Votre titre doit comporter au moins 4 caracteres";
        }
    } else {
        $errors['title'] = "Veuillez renter un titre d'article";
    }

    // CATEGORIE
    if (isset($_POST['categorie'])) {
        if (filter_var($_POST['categorie'], FILTER_VALIDATE_INT)) {
            $_POST['categorie'] = filter_var($_POST['categorie'], FILTER_SANITIZE_NUMBER_INT);
        } else {
            var_dump($errors);
            $errors['categorie'] = "Veuillez selectionnez une categorie";
        }
    } else {
        // var_dump($errors);
        $errors['categorie'] = "Veuillez selectionnez une categorie";
    }

    // CONTENT
    if (!mb_strlen($_POST['content']) == 0) {
        if (mb_strlen($_POST['content']) >= 4) {
            $_POST['content'] = filter_var($_POST['content'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        } else {
            // var_dump($errors);
            $errors['content'] = "Votre Contenu doit comporter au moins 4 caracteres";
        }
    } else {
        // var_dump($errors);
        $errors['content'] = "Veuillez renter du contenu pour l'article";
    }

    // IMG_URL
    if (!mb_strlen($_POST['img_url']) == 0) {
        if (mb_strlen($_POST['img_url']) >= 4) {
            $_POST['img_url'] = filter_var($_POST['img_url'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        } else {
            // var_dump($errors);
            $errors['img_url'] = "Votre lien doit comporter au moins 4 caracteres";
        }
    } else {
        // var_dump($errors);
        $errors['img_url'] = "Veuillez renter un lien pour illustrer l'article";
    }

    if ($errors['title'] === "" && $errors['categorie'] === "" && $errors['img_url'] === "" && $errors['content'] === "") {
        createArticle($_POST['title'], $_POST['content'], $_POST['img_url'], $_POST['categorie']);
    }
}
