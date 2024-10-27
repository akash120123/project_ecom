<?php
include("connection.inc.php");

function fuzzySearch($searchTerm, $products) {
    $results = [];
    foreach ($products as $product) {
        $similarity = 0;
        similar_text(strtolower($searchTerm), strtolower($product['name']), $similarity);
        // Only include products with a similarity greater than a threshold (e.g., 50%)
        if ($similarity > 50) {
            $results[] = $product;
        }
    }
    return $results;
}

// Fetch all products from the database
$query = "SELECT * FROM products";
$result = mysqli_query($con, $query);
$products = mysqli_fetch_all($result, MYSQLI_ASSOC);

// Check if a search term is provided
$searchTerm = $_GET['search'] ?? '';

if ($searchTerm) {
    $matchedProducts = fuzzySearch($searchTerm, $products);
    if (count($matchedProducts) > 0) {
        echo "Search results for '$searchTerm':<br>";
        foreach ($matchedProducts as $product) {
            echo "Product Name: " . htmlspecialchars($product['name']) . "<br>";
            echo "Price: $" . htmlspecialchars($product['price']) . "<br><br>";
        }
    } else {
        echo "No products found for '$searchTerm'.";
    }
}
?>
