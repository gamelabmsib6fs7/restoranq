<?php include("../layout/header.php");
$id = isset($_GET['id']) ? $_GET['id'] : 0;

$sql = "SELECT * FROM categories WHERE id=$id";
$result = mysqli_query($db, $sql);
$category = $result->num_rows > 0 ? mysqli_fetch_assoc($result) : null;
?>

<h1 class="mb-5"><?= $id ? "Update" : "Add"; ?> Category</h1>
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
                <input type="text" class="form-control" name="name" value="<?= $category ? $category['name'] : "" ; ?>"
                    required>
            </div>
            <div class="mb-3">
                <label for="note" class="form-label">Note</label>
                <input type="text" class="form-control" name="note" value="<?= $category ? $category['note'] : "" ; ?>"
                    required>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            <a href="index.php" class="btn btn-secondary">Cancel</a>
        </div>
    </div>
</form>

<?php include("../layout/footer.php"); ?>