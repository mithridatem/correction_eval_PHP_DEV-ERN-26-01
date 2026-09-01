<?php
include 'model/editor.php';
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">
    <title>Ajouter un editeur</title>
</head>

<body>
    <?php include 'navbar.php'; ?>
    <main class="container-fluid">
        <form action="" method="post">
            <fieldset>
                <label>
                    Nom de l'éditeur
                    <input
                        name="editor_name"
                        placeholder="nom editeur"
                        autocomplete="given-name" />
                </label>
            </fieldset>
            <input type="submit" value="Ajouter" name="submit">
        </form>
        <p class="info"><?= insert_editor() ?? "" ?></p>
    </main>
</body>

</html>
<?php

function insert_editor(): string
{
    if (isset($_POST["submit"])) {
        //Test si le champs est remplis
        if (empty($_POST["editor_name"])) return "Veuillez remplir les champs du formulaire";
        //Test si l'éditeur existe déja en BDD
        if (is_editor_exists($_POST["editor_name"])) return "L'éditeur existe déja";
        //Ajout de l'éditeur en BDD
        add_editor($_POST);
        $message = "Editeur ajouté en BDD";
    }
    return $message ?? "";
}
