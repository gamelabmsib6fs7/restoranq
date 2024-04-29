<?php include("../layout/header.php");
$id = isset($_GET['id']) ? $_GET['id'] : 0;

$sql = "SELECT * FROM users WHERE id=$id";
$result = mysqli_query($db, $sql);
$user = $result->num_rows > 0 ? mysqli_fetch_assoc($result) : null;
?>

<h1 class="mb-5"><?= $id ? "Update" : "Add"; ?> User</h1>
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
                <input type="text" class="form-control" name="name" value="<?= $user ? $user['name'] : "" ; ?>"
                    required>
            </div>
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" name="username" value="<?= $user ? $user['username'] : "" ; ?>"
                    required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" <?= $id ? "" : "required"; ?>>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            <a href="index.php" class="btn btn-secondary">Cancel</a>
        </div>
    </div>
</form>

<?php include("../layout/footer.php"); ?>