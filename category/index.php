<?php include("../layout/header.php");

$sql = "SELECT * FROM categories order by name";
$query = mysqli_query($db, $sql);
?>

<h1 class="text-center">Category List</h1>

<?php
    if(isset($_GET["error"])) :  ?>
<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong><?= $_GET["error"]; ?></strong>
</div>
<?php endif;
if(isset($_GET["success"])) :
    ?>
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong><?= $_GET["success"]; ?></strong>
</div>
<?php endif;?>

<a href="form.php" class="btn btn-primary my-3" style="width:100px">Add</a>


<div class="table-responsive">
    <table id="data" class="table table-striped table-bordered" style="width:100%">

        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Note</th>
                <th scope="col" width="10%">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 1;
while($category = mysqli_fetch_array($query)) {
    ?>
            <tr>
                <td scope="row"><?= $i; ?></td>
                <td scope="row"><?= $category["name"]; ?></td>
                <td scope="row"><?= $category["note"]; ?></td>
                <td scope="row">
                    <div class="d-flex justify-content-center">
                        <a type="button" href="form.php?id=<?= $category["id"]; ?>"
                            class="btn btn-warning btn-sm me-2">Edit</a>
                        <form action="delete-process.php" method="post">
                            <input type="hidden" name="id" value="<?=  $category["id"]; ?>">
                            <button type="submit" name="submit"
                                onclick="return confirm('Anda yakin menghapus data ini?');"
                                class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </div>
                </td>
            </tr>
            <?php
        $i++;
} ?>

        </tbody>
    </table>
</div>

<?php include("../layout/footer.php");
