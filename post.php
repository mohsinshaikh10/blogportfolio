<?php

include 'includes/db.php';
include 'includes/header.php';

$id = intval($_GET['id']);

$stmt =
$conn->prepare(
"SELECT
 p.*,
 u.username
 FROM posts p
 INNER JOIN users u
 ON p.created_by=u.id
 WHERE p.id=?"
);

$stmt->bind_param(
"i",
$id
);

$stmt->execute();

$post =
$stmt->get_result()->fetch_assoc();

?>

<section class="single-post">

<h1>

<?php
echo htmlspecialchars(
$post['title']
);
?>

</h1>

<div class="post-meta">

By

<?php
echo htmlspecialchars(
$post['username']
);
?>

</div>

<div class="post-content">

<?php
echo nl2br(
htmlspecialchars(
$post['content']
)
);
?>

</div>

</section>

<?php
include 'includes/footer.php';
?>
