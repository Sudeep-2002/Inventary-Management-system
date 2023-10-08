<?php
// Include the TCPDF library
require_once('tcpdf/tcpdf.php');

$connection = mysqli_connect("localhost", "username", "password", "database_name");

// Fetch the product and related data from the database
$product_id = $_GET['product_id'];
$query = "SELECT p.product_name, c.category_name, b.brand_name, p.price
          FROM products p
          JOIN categories c ON p.category_id = c.category_id
          JOIN brands b ON p.brand_id = b.brand_id
          WHERE p.product_id = $product_id";
// Execute the query and fetch the product data

// Create a new PDF document
$pdf = new TCPDF ('P', 'mm', 'A4', true, 'UTF-8');

// Set document information
$pdf->SetCreator('Your Company Name');
$pdf->SetAuthor('Your Name');
$pdf->SetTitle('Invoice');

// Add a page to the PDF
$pdf->AddPage();

// Output the product information to the PDF
$pdf->SetFont('Helvetica', 'B', 16);
$pdf->Cell(0, 10, 'Invoice', 0, 1, 'C');
$pdf->SetFont('Helvetica', '', 12);
$pdf->Cell(0, 10, '', 0, 1); // Add some space
$pdf->Cell(0, 10, 'Product Name: ' . $product_data['product_name'], 0, 1);
$pdf->Cell(0, 10, 'Category: ' . $product_data['category_name'], 0, 1);
$pdf->Cell(0, 10, 'Brand: ' . $product_data['brand_name'], 0, 1);
$pdf->Cell(0, 10, 'Price: $' . number_format($product_data['price'], 2), 0, 1);

// Output the PDF to the browser for download
$pdf->Output('invoice.pdf', 'D');
?>
