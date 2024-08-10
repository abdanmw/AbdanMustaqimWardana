<?php
include '../db/db.php';

$course_id = $_GET['course_id'];

$sql = "SELECT * FROM materials WHERE course_id='$course_id'";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>List Materi</title>
</head>
<body>
<div class="navbar"></div>
<div class="container">
    <h1>List Materi Web Developer</h1>
    <table>
        <tr>
            <th>Judul</th>
            <th>Deskripsi</th>
            <th>Link Materi</th>
            <th>Aksi</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['title']; ?></td>
                <td><?php echo $row['description']; ?></td>
                <td><?php echo $row['embed_link']; ?></td>
                <td class="actions">
                    <a href="edit_material.php?id=<?php echo $row['id']; ?>&course_id=<?php echo $course_id; ?>">Edit</a>
                    <a href="delete_material.php?id=<?php echo $row['id']; ?>&course_id=<?php echo $course_id; ?>">Hapus</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>
    <a href="create_material.php?course_id=<?php echo $course_id; ?>">Buat Materi Baru</a>
    <a href="../courses/index.php">Balik ke List Kursus</a>
</div>
<div class="footer">Manajemen Materi <b>Abdan Mustaqim Wardana</b></div>
</body>
</html>
