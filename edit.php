<?php
include 'db.php';
$id = $_GET['id'];
$result = $conn->query("SELECT * FROM students WHERE id = $id");
$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Student</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="container mt-5">
    <h2>Edit Student</h2>
    <form method="POST" action="update.php">
        <input type="hidden" name="id" value="<?= $row['id'] ?>">
        <input type="text" name="name" value="<?= $row['name'] ?>" required class="form-control mb-2">
        <input type="email" name="email" value="<?= $row['email'] ?>" required class="form-control mb-2">
        <input type="text" name="grade" value="<?= $row['grade'] ?>" required class="form-control mb-2">
        <button type="submit" name="update" class="btn btn-success">Update Student</button>
    </form>
</body>
</html>
