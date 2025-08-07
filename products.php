<?php
include 'db.php';

// Fetch categories
$categories = [];
$cat_result = mysqli_query($conn, "SELECT * FROM category");
while ($row = mysqli_fetch_assoc($cat_result)) {
  $categories[] = $row;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Product Management</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <style>
    body { background-color: #DDDBDE; color: #3B373B; }
    .table thead th { background-color: #CAD4DF; }
  </style>
</head>
<body>

<div class="container py-4">
  <h2 class="mb-4">📦 Product Management</h2>

  <div class="d-flex justify-content-between align-items-center mb-3">
    <input type="text" id="searchInput" class="form-control w-25" placeholder="🔍 Search...">
    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addProductModal">➕ Add Product</button>
  </div>

  <div class="table-responsive">
    <table class="table table-bordered table-sm align-middle" id="productTable">
      <thead>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Category</th>
          <th>Unit</th>
          <th>Quantity</th>
          <th>Reorder Level</th>
          <th>Supplier</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody id="productData">
        <!-- Filled by AJAX -->
      </tbody>
    </table>
  </div>
</div>

<!-- Modals will be dynamically generated -->
<div id="modalsContainer"></div>

<?php include 'product_modals.php'; ?>

<script>
function loadProducts() {
  $.get('product_actions.php?action=list', function(data) {
    console.log("AJAX response:", data); // ✅ DEBUG
    const products = data;

    let tableRows = '';
    let modals = '';
    products.forEach(product => {
      tableRows += `
        <tr>
          <td>${product.product_id}</td>
          <td>${product.product_name}</td>
          <td>${product.cat_name}</td>
          <td>${product.unit_type}</td>
          <td>${product.stock_quantity}</td>
          <td>${product.reorder_level}</td>
          <td>${product.supplier_name}</td>
          <td>
            <button class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editProductModal${product.product_id}">✏️</button>
            <button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal${product.product_id}">🗑️</button>
          </td>
        </tr>
      `;
      modals += generateModals(product);
    });
    $('#productData').html(tableRows);
    $('#modalsContainer').html(modals);
  });
}

function generateModals(product) {
  return `
    <div class="modal fade" id="editProductModal${product.product_id}" tabindex="-1">
      <div class="modal-dialog">
        <form method="POST" action="product_actions.php" class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Update Product</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
          </div>
          <div class="modal-body">
            <input type="hidden" name="action" value="update">
            <input type="hidden" name="product_id" value="${product.product_id}">
            <div class="mb-3">
              <label class="form-label">Product Name</label>
              <input type="text" name="product_name" class="form-control" value="${product.product_name}" required>
            </div>
            <div class="mb-3">
              <label class="form-label">Category</label>
              <select name="category_id" class="form-select" required>
                ${product.category_options}
              </select>
            </div>
            <div class="mb-3">
              <label class="form-label">Unit Type</label>
              <select name="unit_type" class="form-select">
                <option value="kg" ${product.unit_type === 'kg' ? 'selected' : ''}>kg</option>
                <option value="g" ${product.unit_type === 'g' ? 'selected' : ''}>g</option>
                <option value="piece" ${product.unit_type === 'piece' ? 'selected' : ''}>piece</option>
                <option value="pack" ${product.unit_type === 'pack' ? 'selected' : ''}>pack</option>
              </select>
            </div>
            <div class="mb-3">
              <label class="form-label">Stock Quantity</label>
              <input type="number" name="stock_quantity" class="form-control" value="${product.stock_quantity}" required>
            </div>
            <div class="mb-3">
              <label class="form-label">Reorder Level</label>
              <input type="number" name="reorder_level" class="form-control" value="${product.reorder_level}">
            </div>
            <div class="mb-3">
              <label class="form-label">Supplier</label>
              <input type="text" name="supplier_name" class="form-control" value="${product.supplier_name}">
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-success">Update</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          </div>
        </form>
      </div>
    </div>

    <div class="modal fade" id="deleteModal${product.product_id}" tabindex="-1">
      <div class="modal-dialog">
        <form method="GET" action="product_actions.php" class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Confirm Delete</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
          </div>
          <div class="modal-body">
            <p>Delete <strong>${product.product_name}</strong>?</p>
            <input type="hidden" name="delete" value="${product.product_id}">
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-danger">Delete</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          </div>
        </form>
      </div>
    </div>
  `;
}

// Filter search
$('#searchInput').on('keyup', function() {
  const value = $(this).val().toLowerCase();
  $("#productTable tbody tr").filter(function() {
    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
  });
});

$(document).ready(function() {
  loadProducts();
});
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
