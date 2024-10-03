<?php

require 'config.php';

try {

    $sql = "SELECT * FROM Categorie";
    $query = $pdo->query($sql);


    $categories = $query->fetchAll(PDO::FETCH_ASSOC);


    echo json_encode($categories);
} catch (PDOException $e) {

    echo json_encode(['error' => 'An error occurred while fetching categories: ' . $e->getMessage()]);
}
?>
