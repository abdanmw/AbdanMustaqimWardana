<?php
include '../db/db.php';

$id = $_GET['id'];
$course_id = $_GET['course_id'];

$sql = "DELETE FROM materials WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    header("Location: index.php?course_id=$course_id");
    exit;
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
