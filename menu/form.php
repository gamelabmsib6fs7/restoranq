<?php include("../layout/header.php");
$id = isset($_GET['id']) ? $_GET['id'] : 0;

$sql = "SELECT * FROM menus WHERE id=$id";
$result = mysqli_query($db, $sql);
$menu = $result->num_rows > 0 ? mysqli_fetch_assoc($result) : null;

$sql = "SELECT * FROM categories";
$query = mysqli_query($db, $sql);

?>

<h1 class="mb-5"><?= $id ? "Update" : "Add"; ?> Menu</h1>
<?php
    if(isset($_GET["error"])) :  ?>
<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong><?= $_GET["error"]; ?></strong>
</div>
<?php endif;?>

<form method="post" action="post-process.php">
    <div class="row">
        <input type="hidden" name="id" value="<?= $id; ?>">
        <div class="col-md-6">
            <div class="mb-3">
                <label for="name" class="form-label">Nama</label>
                <input type="text" class="form-control" name="name" value="<?= $menu ? $menu['name'] : "" ; ?>"
                    required>
            </div>
            <div class="mb-3">
                <label for="note" class="form-label">Note</label>
                <input type="text" class="form-control" name="note" value="<?= $menu ? $menu['note'] : "" ; ?>"
                    required>
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select name="status" class="form-control">
                    <option value="Aktif" <?= $menu && $menu['status'] == "Aktif" ? "selected" : "" ; ?>>Aktif</option>
                    <option value="Non Aktif" <?= $menu && $menu['status'] == "Non Aktif" ? "selected" : "" ; ?>>Non
                        Aktif</option>
                </select>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            <a href="index.php" class="btn btn-secondary">Cancel</a>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label for="category" class="form-label">Category</label>
                <select name="category_id" class="form-control">
                    <?php while ($category = mysqli_fetch_array($query)) { ?>
                    <option value="<?= $category['id']; ?>"
                        <?= $menu && $menu['category_id'] == $category['id'] ? "selected" : "" ; ?>>
                        <?= $category['name']; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="note" class="form-label">Price</label>
                <input type="number" class="form-control" name="price" value="<?= $menu ? $menu['price'] : "0" ; ?>"
                    required>
            </div>
        </div>
    </div>
</form>

<?php include("../layout/footer.php"); ?>