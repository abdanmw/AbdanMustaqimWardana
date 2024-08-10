<?php
include '../db/db.php';

$course_id = $_GET['course_id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $embed_link = $_POST['embed_link'];

    $sql = "INSERT INTO materials (course_id, title, description, embed_link) VALUES ('$course_id', '$title', '$description', '$embed_link')";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php?course_id=$course_id");
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
    <title>Buat Materi</title>
</head>
<body>
<div class="container">
    <h1>Buat Materi Baru</h1>
    <form method="POST">
        <input type="text" name="title" placeholder="Judul Materi" required><br>
        <textarea name="description" placeholder="Deskripsi Materi" required></textarea><br>
        <input type="text" name="embed_link" placeholder="Link Materi" required><br>
        <button type="submit">Buat Materi</button>
    </form>
    <a href="index.php?course_id=<?php echo $course_id; ?>">Balik ke List Materi</a>
</div>
</body>
</html>
