<?php
//import de la connexion BDD
require_once 'bdd/bdd_connect.php';

//méthode pour récupérer la liste des catégories
function get_all_categories(): array
{
    try {
        $sql = "SELECT c.id, c.category_name FROM category AS c";
        $req = connect_bdd()->prepare($sql);
        $req->execute();
        $categories = $req->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    return $categories ?? [];
}
