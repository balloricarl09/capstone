<!-- Add Product Modal -->
<div class="modal fade" id="addProductModal" tabindex="-1">
  <div class="modal-dialog">
    <form method="POST" action="product_actions.php" class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add Product</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <input type="hidden" name="action" value="add">

        <div class="mb-3">
          <label class="form-label">Product Name</label>
          <input type="text" name="product_name" class="form-control" required>
        </div>

        <div class="mb-3">
          <label class="form-label">Category</label>
          <select name="category_id" class="form-select" required>
            <option value="">-- Select Category --</option>
            <?php foreach ($categories as $cat): ?>
              <option value="<?= $cat['cat_id'] ?>"><?= htmlspecialchars($cat['cat_name']) ?></option>
            <?php endforeach; ?>
          </select>
        </div>

        <div class="mb-3">
          <label class="form-label">Unit Type</label>
          <select name="unit_type" class="form-select" required>
            <option value="kg">kg</option>
            <option value="g">g</option>
            <option value="piece">piece</option>
            <option value="pack">pack</option>
          </select>
        </div>

        <div class="mb-3">
          <label class="form-label">Stock Quantity</label>
          <input type="number" step="0.01" name="stock_quantity" class="form-control" required>
        </div>

        <div class="mb-3">
          <label class="form-label">Reorder Level</label>
          <input type="number" step="0.01" name="reorder_level" class="form-control">
        </div>

        <div class="mb-3">
          <label class="form-label">Supplier Name</label>
          <input type="text" name="supplier_name" class="form-control">
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Add Product</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
      </div>
    </form>
  </div>
</div>
