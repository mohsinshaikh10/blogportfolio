<?php

include 'includes/db.php';
include 'includes/header.php';

$sql = "
SELECT
    p.*,
    u.username
FROM posts p
INNER JOIN users u
ON p.created_by = u.id
ORDER BY p.created_at DESC
";

$result = $conn->query($sql);

?>

<section class="hero">

    <h1>
        Mohsin's Tech Blog
    </h1>

    <p>
        Cloud • Data Engineering • AI
    </p>

</section>

<section class="feed-container">

<?php

if($result->num_rows > 0)
{

while($post = $result->fetch_assoc())
{

$postId = $post['id'];

$likeCount =
$conn->query(
"SELECT COUNT(*) total
 FROM likes
 WHERE post_id=$postId"
)->fetch_assoc()['total'];

$commentCount =
$conn->query(
"SELECT COUNT(*) total
 FROM comments
 WHERE post_id=$postId"
)->fetch_assoc()['total'];

?>

<div class="post-card reveal">

    <h2>
        <?php
        echo htmlspecialchars(
            $post['title']
        );
        ?>
    </h2>

    <div class="post-meta">

        By
        <?php
        echo htmlspecialchars(
            $post['username']
        );
        ?>

        |

        <?php
        echo date(
            "F d, Y",
            strtotime(
                $post['created_at']
            )
        );
        ?>

    </div>

    <p>

        <?php

        echo nl2br(
            substr(
                $post['content'],
                0,
                250
            )
        );

        ?>

        ...

    </p>

    <div class="post-footer">

        <span>
            ❤️ <?php echo $likeCount; ?>
        </span>

        <span>
            💬 <?php echo $commentCount; ?>
        </span>

    </div>

    <a
    class="read-more-btn"
    href="post.php?id=<?php echo $post['id']; ?>">

    Read More

    </a>

</div>

<?php

}
}
else
{
?>

<div class="empty-state">

    No blog posts available yet.

</div>

<?php
}
?>

</section>

<?php
include 'includes/footer.php';
?>
