<?php

include '../includes/db.php';
include '../includes/auth.php';

requireAdmin();

include '../includes/header.php';

?>

<div class="form-container">

<h2>Create Blog Post</h2>

<form
method="POST"
action="../actions/save-post.php">

<input
type="text"
name="title"
placeholder="Post Title"
required>

<textarea
name="content"
rows="15"
placeholder="Write your blog post..."
required></textarea>

<button type="submit">

Publish Post

</button>

</form>

</div>

<?php
include '../includes/footer.php';
?>
