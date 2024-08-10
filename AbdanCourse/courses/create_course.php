<?php
include '../db/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $duration = $_POST['duration'];

    $sql = "INSERT INTO courses (title, description, duration) VALUES ('$title', '$description', '$duration')";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Buat Kursus</title>
</head>
<body>
<div class="container">
    <h1>Buat Kursus Baru</h1>
    <form method="POST">
        <input type="text" name="title" placeholder="Judul Kursus" required><br>
        <textarea name="description" placeholder="Deskripsi Kursus" required></textarea><br>
        <input type="text" name="duration" placeholder="Durasi Kursus" required><br>
        <button type="submit">Buat Kursus</button>
    </form>
    <a href="index.php">Balik ke List Kursus</a>
</div>
</body>
</html>
