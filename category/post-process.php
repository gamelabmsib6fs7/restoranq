<?php

include("../config/database.php");

if(isset($_POST['submit'])) {

    $id = $_POST['id'];
    $name = $_POST['name'];
    $note = $_POST['note'];

    try {
        $sql = "";

        if ($id) {
            $sql = "update categories set name='$name', note='$note' where id= $id";
        } else {
            $sql = "insert into categories(name, note) values ('$name', '$note')";
        }

        $query = mysqli_query($db, $sql);

        if ($query) {
            header('Location: index.php?success=Data berhasil dieksekusi');
        } else {
            header('Location: form.php?error=Data gagal dieksekusi' . "&id=$id");
        }
    } catch(Exception $exception) {
        header('Location: form.php?error=' . $exception->getMessage() . "&id=$id");
    }
} else {
    die("akses dilarang...");
}
