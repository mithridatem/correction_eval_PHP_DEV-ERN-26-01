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
    <title>Liste des livres</title>
</head>
<body>
    <?php include 'navbar.php'; ?>
    <main class="container-fluid">
        <section>
            <h1>Liste des livres</h1>
            <?php foreach (get_all_books() as $book) : ?>
                <article>
                    <h2><?= htmlspecialchars($book["title"]) ?></h2>
                    <p><?= htmlspecialchars($book["summary"]) ?></p>
                    <p>Auteur: <?= htmlspecialchars($book["author"]) ?></p>
                    <p>Date de publication: <?= htmlspecialchars($book["publish_at"]) ?></p>
                    <p>Catégorie: <?= htmlspecialchars($book["category_name"]) ?></p>
                    <p>Éditeur: <?= htmlspecialchars($book["editor_name"]) ?></p>
                </article>
            <?php endforeach ?>
        </section>
    </main>
</body>
</html>