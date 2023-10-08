//Connect to database
<?php
$connection = mysqli_connect("localhost", "username", "password", "database_name");

if ($_POST['submit']) {
    $product_name = $_POST['product_name'];
    $category_id = $_POST['category_id'];
    $brand_id = $_POST['brand_id'];
    $price = $_POST['price'];

    // Insert the product into the database
    $query = "INSERT INTO products (product_name, category_id, brand_id, price) 
              VALUES ('$product_name', $category_id, $brand_id, $price)";
    // Execute the query

    // Redirect to the product listing page or display a success message
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Add Product</title>
</head>
<body>
    <h2>Add Product</h2>
    <form method="post" action="add_product.php">
        <label>Product Name:</label>
        <input type="text" name="product_name" required><br>

        <label>Category:</label>
        <select name="category_id">
            <!-- Populate this dropdown with categories from the database -->
        </select><br>

        <label>Brand:</label>
        <select name="brand_id">
            <!-- Populate this dropdown with brands from the database -->
        </select><br>

        <label>Price:</label>
        <input type="text" name="price" required><br>

        <input type="submit" name="submit" value="Add Product">
    </form>
</body>
</html>