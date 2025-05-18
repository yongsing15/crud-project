<?php include 'db.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Student CRUD</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="container mt-5">

    <h2>Student Management</h2>

    <form method="POST" class="mb-4">
        <input type="text" name="name" placeholder="Name" required class="form-control mb-2">
        <input type="email" name="email" placeholder="Email" required class="form-control mb-2">
        <input type="text" name="grade" placeholder="Grade" required class="form-control mb-2">
        <button type="submit" name="add" class="btn btn-primary">Add Student</button>
    </form>

    <?php
    if (isset($_POST['add'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $grade = $_POST['grade'];
        $conn->query("INSERT INTO students (name, email, grade) VALUES ('$name', '$email', '$grade')");
        header("Location: index.php");
    }

    $result = $conn->query("SELECT * FROM students");
    ?>

    <table class="table table-bordered">
        <tr>
            <th>Name</th><th>Email</th><th>Grade</th><th>Actions</th>
        </tr>
        <?php while($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?= $row['name'] ?></td>
            <td><?= $row['email'] ?></td>
            <td><?= $row['grade'] ?></td>
            <td>
                <a href="edit.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                <a href="delete.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Delete this student?')">Delete</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>
