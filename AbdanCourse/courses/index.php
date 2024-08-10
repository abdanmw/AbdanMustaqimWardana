<?php
include '../db/db.php';

$sql = "SELECT * FROM courses";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>List Kursus</title>
</head>
<body>
<div class="navbar"></div>
<div class="container">
    <h1>List Kursus</h1>
    <table>
        <tr>
            <th>Judul</th>
            <th>Deskripsi</th>
            <th>Durasi</th>
            <th>Aksi</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['title']; ?></td>
                <td><?php echo $row['description']; ?></td>
                <td><?php echo $row['duration']; ?></td>
                <td class="actions">
                    <a href="edit_course.php?id=<?php echo $row['id']; ?>">Edit</a>
                    <a href="delete_course.php?id=<?php echo $row['id']; ?>">Hapus</a>
                    <a href="../materials/index.php?course_id=<?php echo $row['id']; ?>">Lihat Materi</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>
    <a href="create_course.php">Buat Kursus Baru</a>
</div>
<div class="footer">
     Manajemen Kursus <b>Abdan Mustaqim Wardana</b>
</div>
</body>
</html>
