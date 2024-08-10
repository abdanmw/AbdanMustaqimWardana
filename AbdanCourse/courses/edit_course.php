<?php
include '../db/db.php';

$id = $_GET['id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $duration = $_POST['duration'];

    $sql = "UPDATE courses SET title='$title', description='$description', duration='$duration' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$sql = "SELECT * FROM courses WHERE id=$id";
$result = $conn->query($sql);
$course = $result->fetch_assoc();

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Edit Kursus</title>
</head>
<body>
<div class="container">
    <h1>Edit Kursus</h1>
    <form method="POST">
        <input type="text" name="title" value="<?php echo $course['title']; ?>" required><br>
        <textarea name="description" required><?php echo $course['description']; ?></textarea><br>
        <input type="text" name="duration" value="<?php echo $course['duration']; ?>" required><br>
        <button type="submit">Update Kursus</button>
    </form>
    <a href="index.php">Balik ke List Kursus</a>
</div>
</body>
</html>
