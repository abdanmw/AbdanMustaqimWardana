<?php
include '../db/db.php';

$id = $_GET['id'];
$course_id = $_GET['course_id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $embed_link = $_POST['embed_link'];

    $sql = "UPDATE materials SET title='$title', description='$description', embed_link='$embed_link' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php?course_id=$course_id");
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$sql = "SELECT * FROM materials WHERE id=$id";
$result = $conn->query($sql);
$material = $result->fetch_assoc();

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Edit Materi</title>
</head>
<body>
<div class="container">
    <h1>Edit Materi</h1>
    <form method="POST">
        <input type="text" name="title" value="<?php echo $material['title']; ?>" required><br>
        <textarea name="description" required><?php echo $material['description']; ?></textarea><br>
        <input type="text" name="embed_link" value="<?php echo $material['embed_link']; ?>" required><br>
        <button type="submit">Update Materi</button>
    </form>
    <a href="index.php?course_id=<?php echo $course_id; ?>">Balik ke List Materi</a>
</div>
</body>
</html>
