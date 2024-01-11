<?php 

declare(strict_types=1);

// add gallary
function add_gallary(object $pdo, string $gal_img)
{
    $query = "INSERT INTO gallary (img) VALUES (:img);";

    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":img", $gal_img);

    $stmt->execute();
}