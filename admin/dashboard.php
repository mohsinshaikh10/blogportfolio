<?php

include '../includes/db.php';
include '../includes/auth.php';

requireAdmin();

include '../includes/header.php';

?>

<h1 class="page-title">
    Admin Dashboard
</h1>

<div class="admin-actions">

    <a
    href="create-post.php"
    class="admin-btn">

        Create New Post

    </a>

</div>

<?php

$sql =
"SELECT *
 FROM posts
 ORDER BY created_at DESC";

$result =
$conn->query($sql);

?>

<div class="admin-posts">

<?php while($post = $result->fetch_assoc()) { ?>

<div class="admin-post-card">

    <h3>

        <?php
        echo htmlspecialchars(
        $post['title']
        );
        ?>

    </h3>

    <p>

        <?php
        echo date(
        "M d, Y",
        strtotime(
        $post['created_at']
        ));
        ?>

    </p>

    <a
    href="edit-post.php?id=<?php echo $post['id']; ?>">
        Edit
    </a>

    |

    <a
    href="delete-post.php?id=<?php echo $post['id']; ?>"
    onclick="return confirm('Delete this post?')">
        Delete
    </a>

</div>

<?php } ?>

</div>

<?php
include '../includes/footer.php';
?>
