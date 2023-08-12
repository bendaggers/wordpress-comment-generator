<?php
$posts = get_posts(array(
    'post_type' => 'post',
    'post_status' => 'publish',
    'posts_per_page' => -1,
));
?>

<label for="post-dropdown">Select a Post:</label>
<select name="comment_post_id" id="post-id">
    <option value="">Select Published Post</option>
    <?php foreach ($posts as $post) : ?>
    <option value="<?php echo $post->ID; ?>"><?php echo $post->post_title; ?></option>
    <?php endforeach; ?>
</select>