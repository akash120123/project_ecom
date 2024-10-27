<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Fuzzy Search Example</title>
</head>
<body>
    <h1>Product Search</h1>
    <form method="GET" action="">
        <input type="text" name="search" placeholder="Search for products..." required>
        <button type="submit">Search</button>
    </form>

    <!-- Include the PHP search functionality -->
    <?php include('your_php_file.php'); ?>
</body>
</html>
