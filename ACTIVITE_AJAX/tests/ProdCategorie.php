<?php

require 'config.php';

try {

    if (isset($_GET['category']) && !empty($_GET['category'])) {

        $sql = "SELECT p.id, p.name, p.price, c.nomCat as category FROM produits p
                INNER JOIN Categorie c ON p.idCat = c.idCat
                WHERE c.idCat = :category";
        $query = $pdo->prepare($sql);
        $query->bindValue(':category', $_GET['category'], PDO::PARAM_INT);
    } else {

        $sql = "SELECT p.id, p.name, p.price, c.nomCat as category FROM produits p
                INNER JOIN Categorie c ON p.idCat = c.idCat";
        $query = $pdo->query($sql);
    }


    $query->execute();


    $products = $query->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($products);
} catch (PDOException $e) {

    echo json_encode(['error' => 'An error occurred while fetching products: ' . $e->getMessage()]);
}
