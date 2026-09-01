<?php
include '../bdd/bdd_connect.php';

//méthode pour récupérer la liste des catégories
function get_all_editors(): array
{
    try {
        $sql = "SELECT e.id, e.editor_name FROM editor AS e";
        $req = connect_bdd()->prepare($sql);
        $req->execute();
        $editors = $req->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    return $editors ?? [];
}

//Méthode pour tester si un editeur existe déja en BDD
function is_editor_exists(string $name): bool
{
    try {
        $sql = "SELECT e.id, e.editor_name FROM editor AS e";
        $req = connect_bdd()->prepare($sql);
        $req->execute();
        $editors = $req->fetch(PDO::FETCH_ASSOC);
        if (!$editors) return true;
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    return false;
}

//Méthode pour ajouter un éditeur
function add_editor(array $editor): string
{
    try {
        $sql = "INSERT INTO editor(editor_name) VALUE(?)";
        $req = connect_bdd()->prepare($sql);
        $req->bindValue(1, $editor["edito_name"], PDO::PARAM_STR);
        $req->execute();
    } catch (PDOException $e) {
        echo $e->getMessage();
        return "Erreur d'enregistrement";
    }
    return "Editeur ajouté en BDD";
}
