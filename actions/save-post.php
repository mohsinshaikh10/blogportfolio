<?php

include '../includes/db.php';
include '../includes/auth.php';

requireAdmin();

$title =
trim($_POST['title']);

$content =
trim($_POST['content']);

$createdBy =
$_SESSION['user_id'];

$stmt =
$conn->prepare(
"INSERT INTO posts
(title,content,created_by)
VALUES (?,?,?)"
);

$stmt->bind_param(
"ssi",
$title,
$content,
$createdBy
);

$stmt->execute();

header(
"Location: ../admin/dashboard.php"
);

exit;
