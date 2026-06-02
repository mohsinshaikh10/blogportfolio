<?php

include '../includes/db.php';
include '../includes/auth.php';

requireAdmin();

$id =
intval($_GET['id']);

$stmt =
$conn->prepare(
"SELECT *
 FROM posts
 WHERE id=?"
);

$stmt->bind_param(
"i",
$id
);

$stmt->execute();

$post =
$stmt->get_result()->fetch_assoc();

if(
$_SERVER['REQUEST_METHOD']
== 'POST'
)
{
    $title =
    trim($_POST['title']);

    $content =
    trim($_POST['content']);

    $update =
    $conn->prepare(
    "UPDATE posts
     SET title=?,
         content=?
     WHERE id=?"
    );

    $update->bind_param(
    "ssi",
    $title,
    $content,
    $id
    );

    $update->execute();

    header(
    "Location: dashboard.php"
    );

    exit;
}

include '../includes/header.php';

?>

<div class="form-container">

<h2>Edit Post</h2>

<form method="POST">

<input
type="text"
name="title"
value="<?php echo htmlspecialchars($post['title']); ?>"
required>

<textarea
name="content"
rows="15"
required><?php

echo htmlspecialchars(
$post['content']
);

?></textarea>

<button type="submit">

Update Post

</button>

</form>

</div>

<?php
include '../includes/footer.php';
?>
