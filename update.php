<?php
include 'db.php';

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $grade = $_POST['grade'];

    $conn->query("UPDATE students SET name='$name', email='$email', grade='$grade' WHERE id=$id");
}

header("Location: index.php");
?>
