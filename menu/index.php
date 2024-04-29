<?php include("../layout/header.php");

$sql = "SELECT menus.*, categories.name as category_name FROM menus inner join categories on menus.category_id=categories.id order by menus.name";
$query = mysqli_query($db, $sql);
?>

<h1 class="text-center">Menu List</h1>

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
                <th scope="col">Category</th>
                <th scope="col">Note</th>
                <th scope="col">Price</th>
                <th scope="col">Status</th>
                <th scope="col" width="10%">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 1;
while($menu = mysqli_fetch_array($query)) {
    ?>
            <tr>
                <td scope="row"><?= $i; ?></td>
                <td scope="row"><?= $menu["name"]; ?></td>
                <td scope="row"><?= $menu["category_name"]; ?></td>
                <td scope="row"><?= $menu["note"]; ?></td>
                <td scope="row" class="text-end"><?= number_format($menu["price"], 0, '.', '.'); ?></td>
                <td scope="row"><?= $menu["status"]; ?></td>
                <td scope="row">
                    <div class="d-flex justify-content-center">
                        <a type="button" href="form.php?id=<?= $menu["id"]; ?>"
                            class="btn btn-warning btn-sm me-2">Edit</a>
                        <form action="delete-process.php" method="post">
                            <input type="hidden" name="id" value="<?=  $menu["id"]; ?>">
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
