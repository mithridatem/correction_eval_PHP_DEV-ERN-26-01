<?php
//import de la connexion BDD
include '../bdd/bdd_connect.php';

//Méthode pour ajouter un livre avec catégorie et éditeur
function add_book(array $book): void
{
    try {
        //Requête SQL
        $sql = "INSERT INTO book(title, summary, author, publish_at, category_id, editor_id) 
        VALUE (?,?,?,?,?,?)";
        //Préparation de la requête
        $req = connect_bdd()->prepare($sql);
        //Assignations des paramètres
        $req->bindValue(1, $book["title"], PDO::PARAM_STR);
        $req->bindValue(2, $book["summary"], PDO::PARAM_STR);
        $req->bindValue(3, $book["author"], PDO::PARAM_STR);
        $req->bindValue(4, $book["publish_at"], PDO::PARAM_STR);
        $req->bindValue(5, $book["category_id"], PDO::PARAM_INT);
        $req->bindValue(6, $book["editor_id"], PDO::PARAM_INT);
        //Exécution de la requête
        $req->execute();
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

//Méthode pour récupérer la liste de tous les livres avec éditeur et catégorie
function get_all_books() :array 
{
    try {
        //Requête SQL
        $sql = "SELECT b.id, b.title, b.summary, b.publish_at, b.author, c.id AS category_id, c.category_name, 
        e.id AS editor_id, e.editor_name FROM book AS b 
        INNER JOIN category AS c ON b.category_id = c.id 
        INNER JOIN editor As e ON b.editor_id = e.id 
        ORDER BY b.title";
        //Préparation de la requête
        $req = connect_bdd()->prepare($sql);
        //Exécution de la requête
        $req->execute();
        //Récupération des données
        $books = $req->fetchAll(PDO::FETCH_ASSOC);
    } catch(PDOException $e) {
        echo $e->getMessage();
    }
    return $books ?? [];
}
