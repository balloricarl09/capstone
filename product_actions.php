<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

include 'db.php';

// LIST PRODUCTS (AJAX)
if (isset($_GET['action']) && $_GET['action'] === 'list') {
  $result = mysqli_query($conn, "
    SELECT p.*, c.cat_name 
    FROM product p
    LEFT JOIN category c ON p.category_id = c.cat_id
  ");

  if (!$result) {
    die('Query failed: ' . mysqli_error($conn));
  }

  $products = [];

  while ($row = mysqli_fetch_assoc($result)) {
    // Build category dropdown options
    $cat_result = mysqli_query($conn, "SELECT * FROM category");
    $category_options = "";

    while ($cat = mysqli_fetch_assoc($cat_result)) {
      $selected = ($cat['cat_id'] == $row['category_id']) ? 'selected' : '';
      $category_options .= "<option value='{$cat['cat_id']}' $selected>{$cat['cat_name']}</option>";
    }

    $row['category_options'] = $category_options;
    $products[] = $row;
  }

  header('Content-Type: application/json');
  echo json_encode($products);
  exit;
}

// ADD PRODUCT
if (isset($_POST['action']) && $_POST['action'] === 'add') {
  $product_name = $_POST['product_name'];
  $category_id = $_POST['category_id'];
  $unit_type = $_POST['unit_type'];
  $stock_quantity = $_POST['stock_quantity'];
  $reorder_level = $_POST['reorder_level'];
  $supplier_name = $_POST['supplier_name'];

  $sql = "INSERT INTO product (product_name, category_id, unit_type, stock_quantity, reorder_level, supplier_name)
          VALUES (?, ?, ?, ?, ?, ?)";
  $stmt = mysqli_prepare($conn, $sql);
  mysqli_stmt_bind_param($stmt, "sisdds", $product_name, $category_id, $unit_type, $stock_quantity, $reorder_level, $supplier_name);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_close($stmt);

  header("Location: products.php?status=added");
  exit;
}

// UPDATE PRODUCT
if (isset($_POST['action']) && $_POST['action'] === 'update') {
  $product_id = $_POST['product_id'];
  $product_name = $_POST['product_name'];
  $category_id = $_POST['category_id'];
  $unit_type = $_POST['unit_type'];
  $stock_quantity = $_POST['stock_quantity'];
  $reorder_level = $_POST['reorder_level'];
  $supplier_name = $_POST['supplier_name'];

  $sql = "UPDATE product SET product_name=?, category_id=?, unit_type=?, stock_quantity=?, reorder_level=?, supplier_name=? WHERE product_id=?";
  $stmt = mysqli_prepare($conn, $sql);
  mysqli_stmt_bind_param($stmt, "sisdssi", $product_name, $category_id, $unit_type, $stock_quantity, $reorder_level, $supplier_name, $product_id);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_close($stmt);

  header("Location: products.php?status=updated");
  exit;
}

// DELETE PRODUCT
if (isset($_GET['delete'])) {
  $product_id = $_GET['delete'];

  $sql = "DELETE FROM product WHERE product_id=?";
  $stmt = mysqli_prepare($conn, $sql);
  mysqli_stmt_bind_param($stmt, "i", $product_id);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_close($stmt);

  header("Location: products.php?status=deleted");
  exit;
}
?>
