<?php
include 'model/editor.php';
include 'model/category.php';
include 'model/book.php';
include 'tools.php';
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">
    <title>Ajouter un Livre</title>
</head>

<body>
    <?php include 'navbar.php'; ?>
    <main class="container-fluid">
        <form action="" method="post">
            <fieldset>
                <label>
                    Titre du livre
                    <input
                        name="title"
                        placeholder="titre du livre"
                        autocomplete="given-title" />
                </label>
                <label>
                    Résumé du livre
                    <textarea
                        name="summary"
                        placeholder="Résumé du livre..."
                        aria-label="given-summary-book">
                    </textarea>
                </label>
                <label>
                    Auteur du livre
                    <input
                        name="author"
                        placeholder="auteur du livre"
                        autocomplete="given-author" />
                </label>
                <label>
                    Date de publication du livre
                    <input type="date" name="publish_at" aria-label="Publish_Date">
                </label>
                <select name="category_id" aria-label="Sélectionner une catégorie..." required>
                    <option selected disabled value="">
                        Sélectionner une catégorie...
                    </option>
                    <?php foreach (get_all_categories() as $category) : ?>
                        <option value="<?= $category["id"] ?>"><?= $category["category_name"] ?></option>
                    <?php endforeach ?>
                </select>
                <select name="editor_id" aria-label="Sélectionner un éditeur..." required>
                    <option selected disabled value="">
                        Sélectionner un éditeur...
                    </option>
                    <?php foreach (get_all_editors() as $editor) : ?>
                        <option value="<?= $editor["id"] ?>"><?= $editor["editor_name"] ?></option>
                    <?php endforeach ?>
                </select>
            </fieldset>
            <input
                type="submit"
                value="Ajouter"
                name="submit" />
        </form>
        <p class="info"><?= htmlspecialchars(insert_book()) ?? "" ?></p>
    </main>
</body>

</html>
<?php

function insert_book(): string
{
    if (isset($_POST["submit"])) {
        //Nettoyage des données du formulaire
        $_POST = sanitize_array($_POST);
        //Test si les champs sont remplis
        if (
            empty($_POST["title"]) ||
            empty($_POST["summary"]) ||
            empty($_POST["author"]) ||
            empty($_POST["publish_at"]) ||
            empty($_POST["category_id"]) ||
            empty($_POST["editor_id"])
        ) {
            return "Veuillez remplir les champs du formulaire";
        }
        //Ajout du livre en base de données
        add_book($_POST);
        $message = "Livre ajouté en BDD";
    }
    return $message ?? "";
}
